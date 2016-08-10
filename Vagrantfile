# -*- mode: ruby -*-
# vi: set ft=ruby :
# encoding: utf-8-unix
VAGRANTFILE_API_VERSION = '2'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'bento/ubuntu-14.04'
  config.vm.network "forwarded_port", guest: 80, host: 8888
  config.vm.network "forwarded_port", guest: 3306, host: 8889
  config.vm.hostname = "pve.local"
  config.vm.synced_folder '.', '/var/www/zf'
  #config.vm.provision "shell", path: "vagrant-conf/provision-apache.sh"
  config.vm.provision "shell", path: "vagrant-conf/provision-nginx.sh"
  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

end
