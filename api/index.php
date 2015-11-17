<?php

require 'vendor/autoload.php';
require "database/KanjiDB.php";
require "functions.php";

$app = new \Slim\Slim();

$app->get('/parsestr/:str', function ($str) {
    
    $resp_arr = array();

    $arr = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);

    $db = new KanjiDB();

    if( ! $db) {
        $msg = $db->lastErrorMsg();
        echo "Couldn't open database: $msg";
    } else {
        foreach($arr as $a) {
            if(is_kanji($a)) {
                $resp_arr []= $db->get_kanji_info($a);
            }
        }
    }

    echo json_encode($resp_arr);
});

$app->run();