<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the post id exists, for example update.php?id=1 will get the post with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $post_title = isset($_POST['post_title']) ? $_POST['post_title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $post_at = isset($_POST['post_at']) ? $_POST['post_at'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE posts SET id = ?, post_title = ?, description = ?, post_at = ? WHERE id = ?');
        $stmt->execute([$id, $post_title, $description, $post_at, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$post) {
        exit('Post does not exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<!DOCTYPE html>
<html><head>
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
	<h2>Update Post #<?=$post['id']?></h2>
    <form action="update.php?id=<?=$post['id']?>" method="post">

              <label for="id">ID</label>
            <input type="text" name="id" placeholder="1" value="<?=$post['id']?>" id="id">

            <label for="title">Title</label>
            <input type="text" name="post_title"  id="post_title" value="<?=$post['post_title']?>" >

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="39" rows="3"  > <?php echo $post['description'];?></textarea>

            <label for="date">Date</label>
            <input type="datetime-local" name="post_at" value="<?=date('Y-m-d\TH:i', strtotime($post['post_at']))?>" id="post_at">
			<input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div></body></html>