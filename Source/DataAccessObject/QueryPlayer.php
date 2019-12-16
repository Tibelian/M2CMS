<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class QueryPlayer{


    // devuelve lista completa de cuentas
    public function getFullList(){

        global $account_conn;
        $sql = "SELECT * FROM player";

        if($result = $account_conn->query($sql)){

            $list = array();
            if($result->num_rows > 0){
                while($data = $result->fetch_assoc()){
                    $list[] = new Player($data);
                }
            }
            return $list;

        }else{
            throw new ExceptionCMS($account_conn->error, $account_conn->errno);
        }

    }


    //


}