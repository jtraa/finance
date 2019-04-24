<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo_r_resumme.png" type="image/x-icon" />
    <title>Sign Up</title>
    <script src="resources/js/particles.js"></script>
    <script src="resources/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="resources/css/main.css">
  </head>
  <body>

  <?php

  if($_POST){
      spl_autoload_register(function($className) {
	    include_once $_SERVER['DOCUMENT_ROOT'] . '/finance/classes/' . $className . '.php';
            });
          
            $database = new Database();
            $db = $database->getConnection();
            $user = new User($db);
          
          
            $user->name=$_POST['username'];
            $user->email=$_POST['email'];
            $user->password=$_POST['password'];
          
            if ($user->CreateUser()){
                $redirect = new Redirect;
                $redirect->Gotologin();
                
                
            }
              // if username does not exist or password is wrong
          else{
              echo "<div class='alert alert-danger margin-top-40' role='alert'>
              Access Denied.<br /><br />
              Your username or password maybe incorrect </div>";
          }   
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
          
    <form class="form-register" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method='post'>
          <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-right">
              <input name="username" class="input" type="text" autocomplete="off">
              <span class="icon is-small is-right">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-right">
              <input name="email" class="input" type="text" autocomplete="off">
              <span class="icon is-small is-right">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>
         

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-right">
              <input name="password" class="input" type="password">
              <span class="icon is-small is-right">
                <i class="fa fa-key"></i>
              </span>
            </div>
          </div>
          
          <div class="has-text-centered">
            <input type="submit" value="Register" class="button is-vcentered is-primary is-outlined">
          </div>
    </form>
          <div class="has-text-centered">
            <a href="login.php"> Already have an account? Log in now!</a>
          </div>
         
        </section>
        
      </div>

      
    </div>

  </body>
</html>


