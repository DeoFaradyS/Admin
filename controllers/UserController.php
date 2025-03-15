<?php
require_once __DIR__ . '/../models/User.php';

$user = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $user->createUser($_POST['name'], $_POST['password']);
    } elseif (isset($_POST['update'])) {
        $user->updateUser($_POST['id'], $_POST['name'], $_POST['password']);
    }
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['delete'])) {
    $user->deleteUser($_GET['delete']);
    header('Location: ../index.php');
    exit();
}

