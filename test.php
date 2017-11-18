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

    var_dump( $db->table("test")->a );

    $tbl = $db->table("test");
    $tbl->a = array("a"=>"4", "b"=>"5");
    $tbl->save();

