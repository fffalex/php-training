<?php
function connect()
{
    $connect = mysqli_connect('localhost', 'ffalex', '1234', 'user_tasks');
    if (!$connect) 
    {
        throw new Exception('Fatal Error! Cannot connet to ' . mysqli_connect_error());
    }
    
    return $connect;
    
}

function getUser($name)
{
  
    $link = connect();
    $result = mysqli_query($link , 'SELECT * FROM users where name="'.$name.'"'); 
  
    return mysqli_fetch_array($result);
}

function getTask($username)
{
    $user = getUser($username);
    
    $link = connect();
    $result = mysqli_query($link, 'select * from tasks where user_id='.$user['user_id']);
    //var_dump($result);
    return ($result);
    
}

function addTask ($username, $taskname)
{
    $user = getUser($username);
    $userId = $user['user_id'];
    $link = connect();
    $result = mysqli_query($link, "INSERT INTO tasks (name, user_id, estimated_time, status) VALUES ('$taskname',$userId,'4 Hour', 'Incomplete')");
    return mysqli_fetch_array($result);
    
}

function deleteTask($id)
{
    $link = connect();
    $resutl = mysqli_query($link, 'DELETE FROM tasks WHERE taskid=' . $id);
    
    return $resutl;
}

function addUser($name, $pass)
{
    $link = connect();
    //For encript passwords with md5
    $pass = md5($pass);
    $result = mysqli_query($link, 'INSERT INTO users (name, password) VALUES ("' . $name . '", "' . $pass . '")');
}

function blockUser($id)
{
    $link = connect();
    $result = mysqli_query($link, 'UPDATE users SET blocked = TRUE WHERE user_id =' . $id);
    
}