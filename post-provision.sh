#!/bin/bash

pushd /tmp

# Install zmq extension
git clone https://github.com/mkoppanen/php-zmq

cd php-zmq

git checkout feature-global-context
phpize
./configure
make
sudo make install
sudo echo "extension=zmq.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`

cd .. # cd php-zmq

# Install ev extension
sudo pecl install ev
sudo echo "extension=ev.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`

popd # pushd /tmp
