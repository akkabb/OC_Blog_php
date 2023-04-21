<?php
// src/controllers/logout.php
require_once 'src/lib/database.php';

function logout()
{
    session_destroy();
    header('location: index.php');
}