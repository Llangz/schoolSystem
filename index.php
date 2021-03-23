<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dash Group of Schools</title>
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
require 'authentication/register.php';
?>

<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Dash Group of Schools</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="public/about.php">About Us</a></li>
      <li><a href="public/view_courses">View Courses</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="authenticationDiv"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="authenticationDiv"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

</div>
<br>
<div class="container">
  <div class="jumbotron">
  <div class="row">
    <div class="col" style="text-align:center;">
        <img src="images/icon.jpg" style="width: 200px; height:200px;">

    </div>
    <div class="col" style="text-align:center;">
            <p>The Dash Group of Schools meet societal challenges with a wide range of knowledge. 
            Strong research and appealing study programmes attract scientists and students from around the world. 
            We are environmentally certified and work actively for sustainable development. 
            </p>
            <a href="" class="btn btn-warning">View as Guest</a>


    </div>
    
    </div>



  
  </div>  
</div>
<br>
<div class="container">
  <div class="jumbotron">
  <div class="row">
    <div class="col" style="text-align:center;">
    <p class="alert alert-<?php 
                        if (isset($_GET['registered'])) {
                           # code...
                          echo $_SESSION['classTypeSuccess'];
                          session_unset();
                          session_destroy();
                       } elseif (isset($_GET['notreg'])) {
                           # code...
                               # code...
                          echo $_SESSION['classTypeError'];
                          session_unset();
                          session_destroy();
                       } elseif (isset($_GET['wrongCred'])){
                          echo $_SESSION['classTypeError'];
                          session_unset();
                          session_destroy();
                       }
                 ?>">
                    <?php
                       if (isset($_GET["registered"])) {
                           # code...
                          if (isset($_SESSION["reg"])) {
                            # code
                          echo $_SESSION["reg"];
                          session_unset();
                          session_destroy();
                          } else {
                            echo "registration successfull";
                          }
                     

                       } elseif (isset($_GET["notreg"])) {
                           # code...
                               # code...
                         if (isset($_SESSION["noreg"])) {
                           # code...
                          echo $_SESSION["noreg"];
                          session_unset();
                          session_destroy();
                         } else
                          {
                            echo "not registered";
                          }
                       
                       } elseif (isset($_GET['wrongCred'])) {
                         # code...
                         if (isset($_SESSION['userTaken'])) {
                           # code...
                           echo $_SESSION['userTaken'];
                           session_unset();
                           session_destroy();

                         } else {
                           echo "Credentials are already in use by another user, try another combination";
                         }
                       }

                    ?>


                </p>

        <h3>Create Account</h3>
        

        <hr style="margin-right:26px; margin-left:26px;">
        <form action="authentication/register.php" method="post">
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
            
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
            
            </div>
            <div class="form-group">
         				<input type="password" onkeyup="check();" name="password" id="password" class="form-control" placeholder="Enter password">
         			</div>
         			<div class="form-group">
         				<input type="password" onkeyup="check();" name="conpass" id="conpass" class="form-control" placeholder="Confirm password">
         				<span id="message"></span>
         			</div>
            <div class="row">
                <div class="col" dtyle: text-align: center;>
                <input type="submit" name="save" id="save" class="btn btn-success btn-block" value="Create Account">
                </div>

                <div class="col" dtyle: text-align: center;>
                <input type="reset" name="reset" id="reset" class="btn btn-danger btn-block" value="Reset Details">
                </div>
    
            </div>
            <div class="form-group" style="text-align:center;">
                <p> have an Account? Proceed to Login</p>
                </div>
        </form>
    </div>
    
    
    <body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
        <form class="border shadow p-3 rounded"
              action="php/check-login.php" 
              method="post" 
              style="width: 450px;">
              <h1 class="text-center p-3">LOGIN</h1>
              <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
          <?=$_GET['error']?>
        </div>
        <?php } ?>
      <div class="mb-3">
        <label for="username" 
               class="form-label">User name</label>
        <input type="text" 
               class="form-control" 
               name="username" 
               id="username">
      </div>
      <div class="mb-3">
        <label for="password" 
               class="form-label">Password</label>
        <input type="password" 
               name="password" 
               class="form-control" 
               id="password">
      </div>
      <div class="mb-1">
        <label class="form-label">Select User Type:</label>
      </div>
      <select class="form-select mb-3"
              name="role" 
              aria-label="Default select example">
        <option selected value="user">User</option>
        <option value="admin">Student</option>
      </select>
     
      <button type="submit" 
              class="btn btn-primary">LOGIN</button>
    </form>
      </div>
</body>
                
    
            </div>
        </form>


    </div>
    
    </div>



  
  </div>  
</div>

<script type="text/javascript">
		 function check(){
		 	if (document.getElementById('password').value === document.getElementById('conpass').value) {
                   
                   document.getElementById('message').style.color = "green";
                   document.getElementById('message').innerHTML = "passwords match";
                   document.getElementById('save').disabled = false;
		 	} else {

                   document.getElementById('message').style.color = "red";
                   document.getElementById('message').innerHTML = "passwords do not match";
                   document.getElementById('save').disabled = true;
		 	}
		 }



	</script>



<script type="text/javascript" src="bootstrap/jsbootstrap.js"></script>
<script type="text/javascript" src="bootstrap/jsbootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>



</body>

</html>
