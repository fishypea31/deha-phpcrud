<?php
include_once "./DB.php";

class admins{

    static public function register($dataRegister){
        $sql= "insert into admins (fullname, username, email, phone, password) value (:fullname, :username, :email, :phone, :password)";
        $admin = DB::execute($sql,$dataRegister);
    }
    static public function login($dataLogin){
        $sql= "SELECT * FROM admins WHERE username = :username AND password = :password";
        $admin = DB::execute($sql,$dataLogin);
    }
}