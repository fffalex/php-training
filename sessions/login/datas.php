<?php
require 'lib.php';

if (!isset ($_SESSION))
    {
    session_start();
    }

$task = getTask($_SESSION['name']);
