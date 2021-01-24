<?php

require 'Predis/Autoloader.php';

Predis\Autoloader::register();

define('FC_LOG_TAIL_START_PREFIX', 'FC Invoke Start RequestId: '); // Start of log tail mark

define('FC_LOG_TAIL_END_PREFIX', 'FC Invoke End RequestId: '); // End of log tail mark

$http = new swoole_http_server("0.0.0.0", 9000);

$options = [
    'worker_num' => 4,
];

$http->set($options);

$http->on("start", function ($server) {
    echo "FC customruntime Swoole http server is started at http://0.0.0.0:9000" . PHP_EOL;
});

$http->on('shutdown', function ($server) {
    echo "FC customrutime Swoole http server shutdown" . PHP_EOL;
});

$http->on("request", function ($request, $response) {
//    try {
//        $client = new Predis\Client([
//            'host' => '127.0.0.1',
//            'port' => 6379
//        ]);
//
//        $count = $client->GET('count');
//        if (!$count)
//        {
//            $count = 1;
//        }
//        $client->SET('count', $count + 1);
//
//        $response->end($count);
//        echo $request->rawContent();
//    } catch (Error $e) {
//        $response->end($e);
//        echo $e;
//    }
    $response->end(123);
    echo $request->rawContent();
});

$http->start();
