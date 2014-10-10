<?php
session_start();
require_once 'lib.php';

if (isset($_POST) && !empty($_POST))
{
    addTask($_SESSION['name'], $_POST['task']);
    Header ('Location: todo.php');
}