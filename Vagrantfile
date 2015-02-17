# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/precise64"

  config.vm.provider "virtualbox" do |v|
    v.memory = 2048
  end

  config.vm.provision "chef_solo" do |chef|
    chef.cookbooks_path = ["cookbooks", "project-cookbooks"]
    chef.add_recipe "php-zmq-issue-130"
    chef.json = {
      "php" => {
        "install_method" => "source",
        "version" => "5.6.4",
        "checksum" => "9c318f10af598e3d0b306a00860cfeb13c34024a9032a59ff53e3cd3c7791e97"
      },
      "zeromq" => {
        "version" => "4.1.0-rc1",
        "sha256_sum" => "e8e6325abe2ede0a9fb3d1abbe425d8a7911f6ac283652ee49b36afbb0164d60"
      }
    }
  end

  config.vm.provision "shell", path: "post-provision.sh"
end
