<?php

define('ENDPOINT', 'inproc://publisher');

$context = new ZMQContext();

$subscriber = $context->getSocket(ZMQ::SOCKET_SUB);
$subscriber->connect(ENDPOINT);
$subscriber->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, '');

$publisher = $context->getSocket(ZMQ::SOCKET_PUB);
$publisher->bind(ENDPOINT);
$publisher->send('ZMQPoll');

$poller = new ZMQPoll();
$poller->add($subscriber, ZMQ::POLL_IN);

$readable = $writable = [];
$poller->poll($readable, $writable);
