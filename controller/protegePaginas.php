<?php
session_start();

if (!isset($_SESSION['funcional'])) {
    header('Location: ../form/FormLogin.php');
    exit();
}