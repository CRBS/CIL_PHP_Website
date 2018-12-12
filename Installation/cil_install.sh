#!/bin/bash

# INSTALLATION SCRIPT FOR CIL
# Ports: 22, 80, 443, 9200
# CentOS Linux 7 x86_64 HVM EBS ENA 1805_01-b7ee8a69-ee97-4a49-9e68-afaee216db2e-ami-77ec9308.4 (ami-3ecc8f46)

# SYSTEM TYPES

# TYPE		CPU(s)	MEMORY(GiB)
# t2.small   	1  		2
# t2.medium  	2  		4
# t2.large   	2  		8
# t2.xlarge  	4  		16
# t2.2xlarge 	8  		32

# ELASTIC SEARCH

sudo yum check-update
sudo yum -y update
sudo yum -y install java-1.8.0-openjdk.x86_64 wget unzip git
sudo rpm --import https://artifacts.elastic.co/GPG-KEY-elasticsearch
cd ~
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-5.6.9.rpm
sudo yum -y localinstall elasticsearch-5.6.9.rpm
sudo /bin/systemctl daemon-reload
sudo /bin/systemctl enable elasticsearch.service
sudo mkdir -p /var/elasticsearch_backup
sudo mkdir -p /var/log/elasticsearch/cil
sudo mkdir -p /var/lib/elasticsearch/cil
sudo chown -R elasticsearch:elasticsearch /var/elasticsearch_backup/
sudo chown -R elasticsearch:elasticsearch /var/lib/elasticsearch/cil
sudo chown -R root:elasticsearch /var/log/elasticsearch/cil
sudo systemctl start elasticsearch.service
rm -f elasticsearch-5.6.9.rpm

# ELASTIC RECONFIGURE
cd ~
echo "cluster.name: cil-template
network.host: 0.0.0.0
node.name: aws-cil-template
path.data: \"/var/lib/elasticsearch/cil\"
path.logs: \"/var/log/elasticsearch/cil\"
path.repo: \"/var/elasticsearch_backup\"
" > elasticsearch.yml
sudo rm -f /etc/elasticsearch/elasticsearch.yml
sudo mv ./elasticsearch.yml /etc/elasticsearch/
sudo chown root:elasticsearch /etc/elasticsearch/elasticsearch.yml
sudo chmod 660 /etc/elasticsearch/elasticsearch.yml
sudo systemctl restart elasticsearch.service

sleep 10 # Make sure we're started

curl -XPUT http://localhost:9200/_snapshot/cil_es_backup -d '
{
   "type": "fs",
   "settings": {
       "compress" : true,
       "location": "/var/elasticsearch_backup/cil_es_backup"
   }
}'
wget https://cildata.crbs.ucsd.edu/cil_elasticsearch_backup/cil_es_backup.zip
sleep 30 # SOMETIMES WGET IS STILL BUILDING THE FILE SINCE IT IS PRETTY LARGE SO TAKE A NAP
unzip cil_es_backup.zip
sudo mv cil_es_backup.tar /var/elasticsearch_backup
cd /var/elasticsearch_backup/
sudo tar -xvf cil_es_backup.tar
curl -XPOST http://localhost:9200/_snapshot/cil_es_backup/cil_v1_0/_restore?wait_for_completion=true

# APACHE, PHP AND POSTGRES

sudo yum -y install epel-release
sudo yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
sudo yum -y install yum-utils
sudo yum-config-manager --enable remi-php72
sudo yum update
sudo yum -y install httpd
sudo systemctl enable httpd
sudo systemctl start httpd
sudo touch /var/www/html/index.html
sudo yum -y install postgresql-server postgresql-contrib
# SETUP POSTGRES
sudo postgresql-setup initdb
sudo systemctl enable postgresql
sudo systemctl start postgresql
# GEN A RANDOM PASSWORD
postgres_user_pass=`date +%s | sha256sum | base64 | head -c 32 ; echo`
sleep 10
new_pass=`date +%s | sha256sum | base64 | head -c 32 ; echo`
# SET POSTGRES USER PASSWORD
echo "$postgres_user_pass" | sudo passwd postgres --stdin
# SETUP DATABASE USER PASSWORD
sudo su -c "psql -d template1 -c \"ALTER USER postgres WITH PASSWORD '$new_pass';\"" postgres
echo "Postgres system user pass: $postgres_user_pass" >> ~/README.txt
echo "Postgres db user (postgres) password: $new_pass" >> ~/README.txt
sudo yum -y install php php-pgsql php-pear php72-php-fpm php72-php-gd.x86_64 php72-php-pecl-memcache.x86_64 php72-php-pecl-memcached.x86_64 php72-php-pgsql.x86_64

# CIL REST INSTALLATION

cd ~
git clone https://github.com/CRBS/CIL_RS.git
sudo mv CIL_RS/CIL_RS /var/www/html
sudo touch /var/www/cil_service_config.json

key_string=`date +%s | sha256sum | base64 | head -c 32 ; echo`
echo "CIL KEY String: $key_string" >> ~/README.txt

sudo chmod 777 /var/www/cil_service_config.json
echo "{
  \"cil_service_users\":[
        {
           \"username\":\"cil\",
           \"key\":\"$key_string\",
           \"can_write\":true
        }
  ],
  \"cil_pgsql_db\":\"host=localhost port=5432 dbname=cil_db user=postgres password=$new_pass\",
  \"cil_unit_tester\":\"cil:$key_string\",
  \"elasticsearch_host_stage\":\"http://localhost:9200\",
  \"elasticsearch_host_prod\":\"http://localhost:9200\"
}" > /var/www/cil_service_config.json
sudo chmod 444 /var/www/cil_service_config.json
cd ~
echo "CREATE SEQUENCE general_sequence
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE cil_download_statistics
(
  id bigint NOT NULL,
  ip_address text,
  image_id text,
  url text,
  size bigint,
  download_time timestamp without time zone,
  CONSTRAINT cil_download_statistics_pk PRIMARY KEY (id)
)
" >> create.sql
chmod 777 create.sql
mv create.sql /tmp
sudo su -c "createdb cil_statistics" postgres
sudo su -c "psql -f /tmp/create.sql cil_statistics" postgres
rm -f /tmp/create.sql

sudo sed -i -e '/\$cil_config_file \= \"C\:\/data\/cil_service_config.json\"\;/d' /var/www/html/CIL_RS/application/config/config.php
sudo sed -i 's/\/\/\$cil_config_file \= \"\/var\/www\/cil_service_config.json\"\;/\$cil_config_file \= \"\/var\/www\/cil_service_config.json\"\;/g' /var/www/html/CIL_RS/application/config/config.php
sudo sed -i -e '/\$cil_config_file \= \"C\:\/data\/cil_service_config.json\"\;/d' /var/www/html/CIL_RS/application/config/rest.php
sudo sed -i 's/\/\/\$cil_config_file \= \"\/var\/www\/cil_service_config.json\"\;/\$cil_config_file \= \"\/var\/www\/cil_service_config.json\"\;/g' /var/www/html/CIL_RS/application/config/rest.php
cd ~

sudo sed -i 's/memory_limit \= 128M/memory_limit \= 1024M/g' /etc/php.ini

# CIL WEBSITE INSTALLATION

cd ~
git clone https://github.com/slash-segmentation/CIL_PHP_Website.git
cd /var/www
sudo mv ~/CIL_PHP_Website/CIL/* ./html
sudo touch cil_config.json
sudo chmod 777 cil_config.json
echo "{
  \"cil_auth\":\"cil:$key_string\",
  \"base_url_dev\":\"http://localhost\",
  \"base_url_stage\":\"http://localhost\",
  \"base_url_prod\":\"http://localhost\",
  \"service_api_host_dev\":\"http://localhost:8080\",
  \"service_api_host_stage\":\"https://localhost:8080\",
  \"service_api_host_prod\":\"https://localhost:8080\",
  \"cil_data_host\":\"https://localhost\",
  \"elasticsearchHost_dev\":\"http://localhost:9200\",
  \"elasticsearchHost_stage\":\"http://localhost:9200\",
  \"elasticsearchHost_prod\":\"http://localhost:9200\"
}" > cil_config.json

sudo chmod 444 cil_config.json
sudo sed -i -e '/\$cil_config_file \= \"C\:\/data\/cil_config.json\"\;/d' /var/www/html/application/config/config.php
sudo sed -i 's/\/\/\$cil_config_file \= \"\/var\/www\/cil_config.json\"\;/\$cil_config_file \= \"\/var\/www\/cil_config.json\"\;/g' /var/www/html/application/config/config.php
la=`cat -n /var/www/html/application/config/config.php | grep base_url_dev | awk '{print $1}'`d
sudo sed -i -e "$la" /var/www/html/application/config/config.php
lb=`cat -n /var/www/html/application/config/config.php | grep base_url_prod | awk '{print $1}'`s
sudo sed -i "$lb/\/\///" /var/www/html/application/config/config.php
lc=`cat -n /var/www/html/application/config/config.php | grep elasticsearchHost_prod | awk '{print $1}'`s
sudo sed -i "$lc/\/\///" /var/www/html/application/config/config.php
ld=`cat -n /var/www/html/application/config/config.php | grep elasticsearchHost_stage | awk '{print $1}'`d
sudo sed -i -e "$ld" /var/www/html/application/config/config.php
le=`cat -n /var/www/html/application/config/config.php | grep service_api_host_prod | awk '{print $1}'`s
sudo sed -i "$le/\/\///" /var/www/html/application/config/config.php
lf=`cat -n /var/www/html/application/config/config.php | grep service_api_host_stage | awk '{print $1}'`d
sudo sed -i -e "$lf" /var/www/html/application/config/config.php

sudo chmod -R 755 /var/www/html

# HTTPD.CONF
sudo rm -f /etc/httpd/conf/httpd.conf
cd ~

echo "ServerRoot \"/etc/httpd\"
Listen 80
Include conf.modules.d/*.conf
User apache
Group apache
ServerAdmin root@localhost

<Directory />
    AllowOverride none
    Require all denied
</Directory>

DocumentRoot \"/var/www/html\"

<Directory \"/var/www\">
    AllowOverride None
    # Allow open access:
    Require all granted
</Directory>

<IfModule dir_module>
    DirectoryIndex index.html
</IfModule>

<Files \".ht*\">
    Require all denied
</Files>

ErrorLog \"logs/error_log\"
LogLevel warn

<IfModule log_config_module>
    LogFormat \"%h %l %u %t \\\"%r\\\" %>s %b \\\"%{Referer}i\\\" \\\"%{User-Agent}i\\\"\" combined
    LogFormat \"%h %l %u %t \\\"%r\\\" %>s %b\" common
    <IfModule logio_module>
      LogFormat \"%h %l %u %t \\\"%r\\\" %>s %b \\\"%{Referer}i\\\" \\\"%{User-Agent}i\\\" %I %O\" combinedio
    </IfModule>
    CustomLog \"logs/access_log\" combined
</IfModule>

<IfModule alias_module>
    ScriptAlias /cgi-bin/ \"/var/www/cgi-bin/\"
</IfModule>

<Directory \"/var/www/cgi-bin\">
    AllowOverride None
    Options None
    Require all granted
</Directory>

<IfModule mime_module>
    TypesConfig /etc/mime.types
    AddType application/x-compress .Z
    AddType application/x-gzip .gz .tgz
    AddType text/html .shtml
    AddOutputFilter INCLUDES .shtml
</IfModule>

AddDefaultCharset UTF-8

<IfModule mime_magic_module>
    MIMEMagicFile conf/magic
</IfModule>

EnableSendfile on
IncludeOptional conf.d/*.conf" > httpd.conf

sudo mv ./httpd.conf /etc/httpd/conf/
sudo chmod 644 /etc/httpd/conf/httpd.conf
sudo chown root:root /etc/httpd/conf/httpd.conf

echo "Listen 8080
<VirtualHost *:8080>

  DocumentRoot \"/var/www/html/CIL_RS\"

  <Directory \"/var/www/html/CIL_RS\">
    AllowOverride All
    Require all granted
    DirectoryIndex index.html
    # Rewrite rules
    RewriteEngine On
    RewriteCond \$1 ^(application|system|private|logs)
    RewriteRule ^(.*)$ index.php/access_denied/\$1 [PT,L]
    RewriteCond \$1 ^(index\.php|index\.html|robots\.txt|favicon\.ico)
    RewriteRule ^(.*)$ - [PT,L]
    RewriteRule ^(.*)$ index.php/\$1 [PT,L]
  </Directory>

  ErrorLog \"/var/log/httpd/rest_service.log\"
  ServerSignature Off
  CustomLog \"/var/log/httpd/rest_access.log\" combined
  ServerAlias *
</VirtualHost>" > 25-rest.conf

echo "<VirtualHost *:80>
  ServerName localhost
  DocumentRoot \"/var/www/html\"

  <Directory \"/var/www/html\">
    AllowOverride All
    Require all granted
    RedirectMatch ^/$ /home
    DirectoryIndex index.html
    # Rewrite rules
    RewriteEngine On
    RewriteCond \$1 ^(application|system|private|logs)
    RewriteRule ^(.*)$ index.php/access_denied/\$1 [PT,L]
    RewriteCond \$1 ^(index\\.php|index\\.html|robots\\.txt|favicon\\.ico|public|assets|css|js|resources|Knowledge_Space_files|img|static|pic|pix|swf|assets|videos|template|old_cil|fonts|display_images|docs)
    RewriteRule ^(.*)$ - [PT,L]
    RewriteRule ^(.*)$ index.php/\$1 [PT,L]
  </Directory>

  ErrorLog \"/var/log/httpd/cil.log\"
  ServerSignature Off
  CustomLog \"/var/log/httpd/cil_access.log\" combined

  ServerAlias *
</VirtualHost>" > 30-cil.conf

sudo mv 25-rest.conf /etc/httpd/conf.d
sudo mv 30-cil.conf /etc/httpd/conf.d
sudo chmod 644 /etc/httpd/conf.d/25-rest.conf
sudo chmod 644 /etc/httpd/conf.d/30-cil.conf
sudo chown root:root /etc/httpd/conf.d/25-rest.conf
sudo chown root:root /etc/httpd/conf.d/30-cil.conf

sudo chcon -t httpd_config_t /etc/httpd/conf.d/25-rest.conf
sudo chcon -t httpd_config_t /etc/httpd/conf.d/30-cil.conf
sudo chcon -t httpd_config_t /etc/httpd/conf/httpd.conf
sudo setsebool -P httpd_can_network_connect 1
sudo /sbin/restorecon -R /var/www/

sudo systemctl restart elasticsearch.service
sudo service httpd restart