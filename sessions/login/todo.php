<!DOCTYPE html>
<html>
<?php session_start();?>
<?php require 'datas.php'?>
<head>

  <meta charset="UTF-8">

  <title>Sign Up/Login Box - CodePen</title>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
<?php if (isset($_SESSION['name']) && isset($_SESSION['pass'])):?>
<div id="logmsk" style="display: block;">
    <p style="background-color: gray; color: white"> Welcome: <?php echo $_SESSION['name']?></p>
    <div id="userbox" class="form-group">
        
        <h1 id="signup" style="background-color: rgb(118, 171, 219); background-position: initial initial; background-repeat: initial initial;">To Do Tasks</h1>
        <form action="addTask.php" method="POST" id="formlogin">
            <input id="task" name="task" class="inline-input" placeholder="task">
            <button class="inline-button">Add</button>
        </form>
        <ul>
            <?php foreach ( $task as $item):?>
                <li><?php echo $item['name'].' > '.$item['status'] ?>
                    <a href="delete.php?task=<?php echo $item['taskid']?>" class="action-task">Delete!</a>
                   
                
                </li>
            <?php endforeach?>
                     
        </ul>
        <a class="logout" href="logout.php">Logout</a>
    </div>
    
</div>
<script src="js/index.js"></script>
<?php else: ?>
<?php Header('Location: index.php') ?>
<?php endif; ?>
</body>

</html>
