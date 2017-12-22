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

    var_dump( $db->table("test")->find(function($val) {

        if(!@$val->a || !@$val->b ){
            return false;
        }
    
        if(pow(@$val->a, 2) == @$val->b){
            return true;
        }else{
            return false;
        }

    })[1] );

    // $tbl = $db->table("test");
    // $tbl->a = array("a"=>"4", "b"=>"16");
    // $tbl->b = array("a"=>"3", "b"=>"9");
    // $tbl->c = array("a"=>"2", "b"=>"4");
    // $tbl->d = array("a"=>"1", "b"=>"1");
    // $tbl->save();

