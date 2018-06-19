<?php

class DataHandler
{
    public $conn;

    function __construct($servername, $username, $password, $database_naam)
    {


        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$database_naam", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //        echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }


    // vanaf hier verder gaan

   function Create($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();


    }


    function Delete($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }


    function ReadData($sql){

        //Via $this->conn kan je de PDO connection var ophalen uit de construct method
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

}


?>