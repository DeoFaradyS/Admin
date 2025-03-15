<?php
require_once __DIR__ . '/../models/User.php';

$user = new User($pdo);
$edit = false;
$error = '';

if (isset($_GET['id'])) {
    $edit = true;
    $data = $user->getUserById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($password)) {
        $error = 'Nama dan password tidak boleh kosong.';
    } else {
        // Proses data jika valid
        header('Location: ../index.php');
        exit;
    }
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

    <?php if ($error): ?>
        <div class="error-message"> <?= $error ?> </div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $edit ? $data['id'] : '' ?>">
        <label>Nama</label>
        <input type="text" name="name" value="<?= $edit ? $data['name'] : '' ?>">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit" name="<?= $edit ? 'update' : 'create' ?>" class="button button--primary">
            <?= $edit ? 'Update' : 'Tambah' ?>
        </button>
        <a href="../index.php" class="button button--secondary">Kembali</a>
    </form>
</body>

</html>
