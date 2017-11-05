<?php
    /**
     * Test
     * 
     * @package NonDB
     * 
     */
    
    require_once "vendor/autoload.php";

    echo \NonDB\Components\Tool::checkImplement("\\NonDB\\Exceptions\\CoreException", "Throwable");

    $db = new \NonDB\NonDB(\NonDB\NonDB::driver('LocalDriver:./data/'));

    $db->setAsync(true);

    $tbl = $db->table('test');

    $tbl->fetchAll(function ( \NonDB\Components\Data $data ){

        var_dump($data);

    });