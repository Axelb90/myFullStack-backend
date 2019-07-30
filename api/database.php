<?php
    //Cabeceras para habilitar CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
    
    //Credenciales para conectarse a la MySQL DB
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'admin');
    define('DB_NAME', 'mydb');

    //Funcion para conectarse a MySQL
    function connect(){
        $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

        if (mysqli_connect_errno($connect)) {
            die("Failed to connect:" . mysqli_connect_error());
        }

        mysqli_set_charset($connect, "utf8");

        return $connect;
    }

    $con = connect();
?>