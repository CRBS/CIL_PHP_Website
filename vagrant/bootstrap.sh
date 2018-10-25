#!/usr/bin/env bash

echo "Install crayfishx/firewalld"
/opt/puppetlabs/bin/puppet module install crayfishx-firewalld --version 3.3.0

echo "Running puppet apply"
/opt/puppetlabs/bin/puppet apply /vagrant/puppet-cil/open.pp

echo ""
echo "End of install, if everything worked go to http://localhost:4568"
echo "on machine you invoked the 'vagrant up' command"
echo "and you should see the codeigniter welcome page."
echo "Happy coding!!!!"
echo " "
echo " "
