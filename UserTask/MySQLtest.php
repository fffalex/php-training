<?php

//$mysqli = mysqli_connect("localhost", "root", "", "user_tasks");
$mysqli = mysqli_connect("localhost", "ffalex", "1234", "user_tasks");
$res = mysqli_query($mysqli, "SELECT * FROM  `users` WHERE name = 'Roberto'");
$row = mysqli_fetch_assoc($res);

while (!is_null($row)){
    echo '<pre>' . var_dump($row) . '</pre>';
    $row = mysqli_fetch_assoc($res);
}

function addUser ($name, $lastName){
    $mysqli = mysqli_connect("localhost", "ffalex", "1234", "user_tasks");
    if (!$mysqli){
        throw new Exception(mysqli_error($mysqli));
    }
    
    $query = "INSERT INTO users(name, lastname) VALUES ('$name', '$lastName')";
    
    if (mysqli_query($mysqli,$query)){
        echo 'Se agrego un nuevo Usuario';
    }else{
        throw new Exception(mysqli_error($mysqli));
    }
    
      
}

function addTask ($name, $userid, $estimated){
    $mysqli = mysqli_connect("localhost", "ffalex", "1234", "user_tasks");
    $query = "INSERT INTO tasks (name, user_id, estimated_time, status) VALUES ('$name', $userid, '$estimated', 'Incomplete')";
    if (mysqli_query($mysqli,$query)){
        echo 'Se agrego una tarea';
    }else{
        echo 'No se grabo nada nieri';
    }
   
}

//LLAMADA A LOS METODOS COPADOS

//addTask("Design WebSite 2 part", 2, "5 hour");
try{
    addUser("Saulito", "Menem");
}
 catch (Exception $e){
    echo 'Se produjo un error al grabar :<br>';
    echo $e->getMessage();
 }






