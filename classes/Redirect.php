<?php

class Redirect{

    public function Gotologin(){

    
        $gotologin = true;
        if(isset($gotologin)){
            include_once 'login.php';
        
        }else{
            echo "<br><br><center><h3> ERROR 404 </h3></center>";
            }
        }

    }
?>
