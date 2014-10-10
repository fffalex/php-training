<!DOCTYPE html>
<html>
<?php session_start();?>
<head>

  <meta charset="UTF-8">

  <title>Sign Up/Login Box - CodePen</title>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
<?php if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])):?>
<div id="logmsk" style="display: block;">
    
    <div id="userbox" class="form-group">
        <h1 id="signup" style="background-color: rgb(118, 171, 219); background-position: initial initial; background-repeat: initial initial;">Log In</h1>
        <?php if (isset($_GET['error'])):?>
        <p style="color: #FFA622"> <?php echo $_GET['error'] ?></p>
        <?php endif?>
        <form action="login.php" method="POST" id="formlogin">
            <input id="name" name="name" placeholder="ID" style="opacity: 1; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
            <input id="pass" name="password" type="password" placeholder="Password" style="opacity: 1; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
            <input type="submit" id="signupb" style="cursor: default; text-align: center" value="Log in"/>
            
        <a href="register.php" class="signup">Signup</a>    
        </form>
    </div>
</div>
<script src="js/index.js"></script>
<?php else: ?>
  <p>Ya estas logueado!</p>;
<?php Header('Location: todo.php')?>
<?php endif; ?>
</body>

</html>
