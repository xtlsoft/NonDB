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

    
