<?php
    /**
     * Test
     * 
     * @package NonDB
     * 
     */
    
    require_once "vendor/autoload.php";

    $driver = \NonDB\NonDB::driver('LocalDriver:'. urlencode(__DIR__ .'/data/'));

    var_dump( $driver->getData('test') );
