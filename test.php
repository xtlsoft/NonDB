<?php
    /**
     * Test
     * 
     * @package NonDB
     * 
     */
    
    require_once "vendor/autoload.php";

    use \NonDB\NonDB;

    $driver = NonDB::driver('LocalDriver:'. urlencode(__DIR__ .'/data/'));
    $db = new NonDB($driver);

    var_dump( $db->table("test")[0] );
