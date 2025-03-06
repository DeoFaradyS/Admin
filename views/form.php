<?php
require_once __DIR__ . '/../models/User.php';

$user = new User($pdo);
$edit = false;

if (isset($_GET['id'])) {
    $edit = true;
    $data = $user->getUserById($_GET['id']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $edit ? 'Edit' : 'Tambah' ?> User</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <h1><?= $edit ? 'Edit' : 'Tambah' ?> User</h1>
    <form method="post" action="../controllers/UserController.php">
        <input type="hidden" name="id" value="<?= $edit ? $data['id'] : '' ?>">
        <label>Nama</label>
        <input type="text" name="name" value="<?= $edit ? $data['name'] : '' ?>" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit" name="<?= $edit ? 'update' : 'create' ?>" class="button button--primary">
            <?= $edit ? 'Update' : 'Tambah' ?>
        </button>
        <a href="../index.php" class="button button--secondary">Kembali</a>
    </form>
</body>

</html>