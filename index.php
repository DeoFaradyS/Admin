<?php
require_once __DIR__ . '/models/User.php';

$user = new User($pdo);
$users = $user->getAllUsers();
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD User</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="header">
        <h1>User List</h1>
        <a href="views/form.php" class="button button--primary">Add User</a>
    </div>

    <table>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['name']) ?></td>
                <td>
                    <a href="views/form.php?id=<?= $u['id'] ?>">Edit</a>
                    <a href="controllers/UserController.php?delete=<?= $u['id'] ?>"
                        onclick="return confirm('Hapus user?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>