<?php
    /**
     * Test
     * 
     * @package NonDB
     * 
     */
    
    require_once "vendor/autoload.php";

    use \NonDB\NonDB;

    $driver = NonDB::driver('LocalDriver:./data/');
    $db = new NonDB($driver);

    $tbl = $db->table("test");

    $tbl->files = $tbl->files->sort(function(){return "desc";}, "NaturalSort");

    $tbl->save();
