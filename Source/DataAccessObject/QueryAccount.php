<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

require_once 'App/DataAccessObject/DataBase.php';
require_once 'App/DataAccessObject/ExceptionCMS.php';

class QueryAccount{


    // devuelve lista completa de cuentas
    public function getFullList(){

        global $connAccount;
        $sql = "SELECT * FROM account";

        if($result = $connAccount->query($sql)){

            $list = array();
            if($result->num_rows > 0){
                while($data = $result->fetch_assoc()){
                    $list[] = new Account($data);
                }
            }
            return $list;

        }else{
            throw new ExceptionCMS($account_conn->error, $account_conn->errno);
        }

    }









    ///////////////////////
    // CONTROLAR USUARIO //
    ///////////////////////

    // iniciar sesión - devuelve objeto Account
    public function login($username, $password){

        $sql = "
            SELECT * 
            FROM account 
            WHERE login = ? 
            AND password = PASSWORD(?)
        ";
        $mysqli = DataBase::connect('account');

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if($stmt->execute()){

            $result = $stmt->get_result();
            if($result->num_rows == 1){

                return new Account($result->fetch_assoc());
                
            }else{
                throw new ExceptionCMS('User not found', 404);
            }

        }else{
            throw new ExceptionCMS($stmt->error, $stmt->errno);
        }

    }


}