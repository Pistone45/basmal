<?php

class Connection{

    public function  dbConnection(){

        try{

            $conn = new PDO("mysql:host=localhost; dbname=basmal_db; port=3306",  'basmal_admin', 'basketball2019');
            //var_dump($conn);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $conn;
        }catch (PDOException $e){
            echo 'ERROR: '. $e->getMessage();
        }

}

	
}

?>