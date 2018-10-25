class cil::open
{
  #epel repo
  exec { 'install_epel':
    command => '/bin/yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm',
    creates => '/etc/yum.repos.d/epel.repo'
  }
 
  # install webtatic repo
  exec { 'install_webtatic_php_repo':
    command => '/bin/yum install -y https://mirror.webtatic.com/yum/el7/webtatic-release.rpm',
    creates => '/etc/yum.repos.d/webtatic.repo'
  }

  Package { ensure => 'installed' }
  $http_deps = [ 'httpd', 'php56w', 'php56w-opcache', 'unzip', 'wget', 'java-1.8.0-openjdk.x86_64' ]
  package { $http_deps: }
  
  # install code igniter
  exec { 'install_codeigniter':
    command => '/bin/wget https://github.com/bcit-ci/CodeIgniter/archive/3.1.4.zip;
                /usr/bin/mv 3.1.4.zip /var/www/.;cd /var/www;
                /usr/bin/unzip 3.1.4.zip;
                /usr/bin/cp /var/www/CodeIgniter-3.1.4/index.php /var/www/html/.;
                /usr/bin/sed -i "s/system_path = \'system\';/system_path =\'\/var\/www\/CodeIgniter-3.1.4\/system\';/" /var/www/html/index.php;
                /usr/bin/sed -i "s/application_folder = \'application\';/application_folder = \'\/var\/www\/CodeIgniter-3.1.4\/application\';/" /var/www/html/index.php',
    subscribe => Package[$http_deps],
    refreshonly => true,
    creates => '/var/www/html/index.php'
  }

  # install code igniter rest controller
  exec { 'install_codeigniterrest':
    command => '/bin/wget https://github.com/chriskacerguis/codeigniter-restserver/archive/3.0.0.zip;
                /usr/bin/mv 3.0.0.zip /var/www/.;cd /var/www;
                /usr/bin/unzip 3.0.0.zip;
                /usr/bin/cp /var/www/codeigniter-restserver-3.0.0/application/controllers/Rest_server.php /var/www/CodeIgniter-3.1.4/application/controllers/.;
                /usr/bin/cp /var/www/codeigniter-restserver-3.0.0/application/libraries/*.php /var/www/CodeIgniter-3.1.4/application/libraries/.;
                /usr/bin/cp -r /var/www/codeigniter-restserver-3.0.0/application/language/* /var/www/CodeIgniter-3.1.4/application/language/.;
                /usr/bin/cp /var/www/codeigniter-restserver-3.0.0/application/config/rest.php /var/www/CodeIgniter-3.1.4/application/config/.;
                /usr/bin/cp -r /var/www/codeigniter-restserver-3.0.0/application/controllers/api /var/www/CodeIgniter-3.1.4/application/controllers/.',
    subscribe => Exec['install_codeigniter'],
    refreshonly => true,
    creates => '/var/www/CodeIgniter-3.1.4/application/controllers/Rest_server.php'
  }
 
  service { 'httpd':
    ensure => 'running',
  }

  firewalld_service { 'Allow http from public zone':
     ensure  => 'present',
     service => 'http',
     zone    => 'public',
  }
}

# Run cil open class
class { 'cil::open': }

