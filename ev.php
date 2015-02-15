<?php

define('ENDPOINT', 'inproc://publisher');

$context = new ZMQContext();

$subscriber = $context->getSocket(ZMQ::SOCKET_SUB);
$subscriber->connect(ENDPOINT);
$subscriber->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, '');

$publisher = $context->getSocket(ZMQ::SOCKET_PUB);
$publisher->bind(ENDPOINT);
$publisher->send('EvIo');

$io = new EvIo(
    $subscriber->getSockOpt(ZMQ::SOCKOPT_FD),
    Ev::READ,
    function ($watcher, $events) {
        $watcher->stop();
    }
);

Ev::run();
