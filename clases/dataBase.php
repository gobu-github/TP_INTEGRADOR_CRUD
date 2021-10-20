<?php

    class dataBase {
        protected $serverName = "localhost";
        protected $userName = "root";
        protected $password = "password";
        protected $dbName = "bbdd";

        public $mysqli;


        function __construct(){
            $this->conectar();
        }
        
        function conectar(){
            $this->mysqli = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);

            if ($this->mysqli->connect_error) {
                die("Fallo de coneccion: " . $this->mysqli->connect_error);
            }
        }
        
        function ejecutar($sql){
            if ($this->mysqli->query($sql) === TRUE) {
    
            }
        }

    }
