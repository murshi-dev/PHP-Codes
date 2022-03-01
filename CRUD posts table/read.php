<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM posts ORDER BY id');
$stmt->execute();
// Fetch the records so we can display them in our template.
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
    <nav class="navtop">
        <div>
            <h1>Blog Management</h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>
            <a href="read.php"><i class="fas fa-blog"></i>Posts</a>
        </div>
    </nav>

    <div class="content read">
        <h2>Read Posts</h2>
        <a href="create.php" class="create-contact">Create Post</a>
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Date</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['post_title'] ?></td>
                        <td><?= $post['description'] ?></td>
                        <td><?= $post['post_at'] ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $post['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="delete.php?id=<?= $post['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>