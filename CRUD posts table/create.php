<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $post_title = isset($_POST['post_title']) ? $_POST['post_title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $post_at = isset($_POST['post_at']) ? $_POST['post_at'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO posts VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $post_title, $description, $post_at]);
    // Output message
    $msg = 'Post Added Successfully!';
}
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
            <h1>Blog Posts </h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>
            <a href="read.php"><i class="fas fa-blog"></i>Posts</a>
        </div>
    </nav>
    <div class="content update">
        <h2>Create Post</h2>
        <form action="create.php" method="post">
            <label for="id">ID</label>
            <input type="text" name="id" value="auto" id="id">

            <label for="title">Title</label>
            <input type="text" name="post_title"  id="post_title">

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="39" rows="3"></textarea>

            <label for="date">Date</label>
            <input type="datetime-local" name="post_at" value="<?= date('Y-m-d\TH:i') ?>" id="post_at">

            <input type="submit" value="Post">
        </form>
        <?php if ($msg) : ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </div>

</body>

</html>