<?php

ob_start();
date_default_timezone_set('Europe/Istanbul');
$rawReq = $_SERVER['QUERY_STRING'];
$request = substr($rawReq, 2);

// print_r($_SERVER['QUERY_STRING']);
if ($request === 'test') {
    echo 'testtesin';
    exit;
} else if ($request === 'api' || $request === 'api/') {
    echo 'api';
} else if($request === 'api/login') {
    echo 'api login';
}