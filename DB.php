<?php
session_start();
$conn = new mysqli('localhost', 'root', '', null);

if($conn->connect_error){
    die('Connect error: ' . $conn->connect_error);
}

$sql = "CREATE database if not exists crud";
$result = $conn->query($sql);
if($result){
    $_SESSION["message"]= "Database created successfully";
} else {
    $_SESSION["message"]= "Error creating database: " . $conn->error;
}

$conn->select_db('crud');

$sql = "CREATE table if not exists admins(
    id int primary key not null auto_increment,
    fullname varchar(100),
    username varchar(50) not null unique,
    email varchar(50) not null unique,
    phone varchar(11),    
    password varchar(40) not null
)";

$result = $conn->query($sql);
if($result){
    $_SESSION["message"]= "Table admins created successfully";
} else {
    $_SESSION["message"]= "Error creating table: " . $conn->error;
}

$sql = "CREATE table if not exists users (
    id int primary key not null auto_increment,
    name varchar(100) not null,
    email varchar(50) not null unique,
    passwords varchar(20)
)";

$result = $conn->query($sql);

if($result){
    $_SESSION["message"]= "Table users created successfully";
}else{
    $_SESSION["message"]= "Error creating table: " . $conn->error;
}


class DB{
    static private $connection;
    const DB_TYPE = "mysql";
    const DB_HOST = "localhost";
    const DB_NAME = "crud";
    CONST USER_NAME = "root";
    CONST USER_PASSWORD = "";

    static public function getConnection(){
        if(static::$connection == null){
            try{
            static::$connection = new PDO(self::DB_TYPE.":host=".self::DB_HOST.";dbname=".self::DB_NAME, self::USER_NAME, self::USER_PASSWORD);
            }catch(Exception $exception){
                throw new Exception("connection fail");
            }
        }
        return static::$connection;
    }
    static public function execute($sql,$data=[]){
        $statement = DB::getConnection()->prepare($sql);
        $statement -> setFetchMode(PDO::FETCH_ASSOC);

        $statement->execute($data);
        $result =[];

        while ($item = $statement->fetch()){
            $result[]=$item;
        }
return $result;
    }
}


