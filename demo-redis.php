<?php
require 'vendor/autoload.php';

//集群
//$parameters = ['tcp://r-xxx.redis.rds.aliyuncs.com'];
//单机
$parameters = 'tcp://r-xxx.redis.rds.aliyuncs.com';


$options = [
    'parameters' => [
        'password' => 'ps',
        'database' => 8,
    ],
];

$client = new Predis\Client($parameters, $options);



$pipe = $client->pipeline();
$pipe->ping();
$pipe->flushdb();
$pipe->incrby('counter', 10);
$pipe->exists('counter');
$pipe->mget('does_not_exist', 'counter');
$replies = $pipe->execute();

$cmdScan = $client->createCommand('scan');
$cmdScan->setRawArguments(array('0','match','test*','count','1000'));
$cmdScanReply = $client->executeCommand($cmdScan);
echo json_encode($cmdScanReply);


