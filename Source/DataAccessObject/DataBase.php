<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class DataBase{

    public function connect($dbName){

        // db credentials
        $db = getJson('database');

        // create the mysqli object
        $mysqli = new mysqli($db['host'], $db['user'], $db['pass'], $dbName);

        // set the utf-8 charset
        $mysqli->set_charset('UTF8');
        
        // check connection
        if($mysqli->connect_error){
            echo 'ERROR AL CONECTAR A LA BASE DE DATOS';
            exit;
        }
        return $mysqli;

    }

}