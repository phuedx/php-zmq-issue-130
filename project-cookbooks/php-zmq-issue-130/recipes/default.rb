#
# Cookbook Name:: php-zmq-issue-130
# Recipe:: default
#
# Copyright (C) 2015 YOUR_NAME
#
# All rights reserved - Do Not Redistribute
#

node.default['php']['configure_options'] << '--enable-maintainer-zts'

include_recipe 'php'
include_recipe 'zeromq'
include_recipe 'git'
