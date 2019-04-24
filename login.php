<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo_r_resumme.png" type="image/x-icon" />
    <title>Log In</title>
    <script src="resources/js/particles.js"></script>
    <script src="resources/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="resources/css/main.css">
  </head>
  <body>

  <?php
  spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/finance/classes/' . $className . '.php';
        });

        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
     
       
        $email=$_POST['UserEmail'];
        $password=$_POST['UserPassword'];

        if ($user->login($email, $password)){

          $logged_in = true;
          var_dump ($_SESSION);
          
          echo "Login Success!";
          }
          // if username does not exist or password is wrong
      else{
        $access_denied=true;
          echo "<div class='alert alert-danger margin-top-40' role='alert'>
          Access Denied.<br /><br />
          Your username or password maybe incorrect </div>";
  }   


        ?>



  <div id="particles-js" class="leftinteractive interactive-bg column is-20">
      </div>
    <div class="columns is-vcentered">
    
      <div class="login column is-4 ">
        <section class="section">
          <div class="has-text-centered">
              <img class="login-logo" src="resources/img/accountlogin-icon.png">
          </div>
          
          <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-right">
              <input class="input" type="text">
              <span class="icon is-small is-right">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>
         

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-right">
              <input class="input" type="password">
              <span class="icon is-small is-right">
                <i class="fa fa-key"></i>
              </span>
            </div>
          </div>
          
          <div class="has-text-centered">
            <a class="button is-vcentered is-primary is-outlined">Login</a>
          </div>
          <div class="has-text-centered">
            <a href="signup.html"> Don't you have an account? Sign up now!</a>
          </div>
         
        </section>
        
      </div>

      
    </div>

  </body>
</html>


