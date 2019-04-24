<?php

// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties -> public, privated, protected: waarom welke?
    public $id;
    public $name;
    public $email;
    public $password;
 
    public function __construct($db){
        $this->conn = $db;
    }
    public function CreateUser(){
    
        $query = "INSERT INTO
                    " . $this->table_name . "
                   (`UserID`,`UserName`,`UserEmail`, `UserPassword`)
                   VALUES (null, :name, :email, :password)";

                          // prepare the query
           $stmt = $this->conn->prepare($query);

            // sanitize
           $this->name=htmlspecialchars(strip_tags($this->name));
           $this->email=htmlspecialchars(strip_tags($this->email));

           // bind the values
           $stmt->bindParam(':name', $this->name);
           $stmt->bindParam(':email', $this->email);
           $stmt->bindParam(':password', $this->password);

           // execute the query, also check if query was successful
           if($stmt->execute()){
               return true;
           }else{
               $this->showError($stmt);
               return false;
           }
       }  

    public function login($email, $password){

        $query = "SELECT UserEmail, UserName, UserPassword, UserID
        FROM users
        WHERE (UserEmail = '$email' OR UserName = '$email')
        AND UserPassword = '$password'";

        $db_result = $this->conn->query($query);

        if ($db_result->rowCount()==1){
            foreach($db_result as $row){
                $email = $row['UserEmail'];
                $_SESSION['UserEmail']=$row['UserEmail'];
                $_SESSION['UserName']=$row['UserName'];
                $_SESSION['UserID']=$row['UserID'];

            }

            return true;
        
        } else{
           return false;

        }

    }
}
