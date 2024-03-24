<?php
require 'connect.php';

//Get Thread URL - for now, set to 0 for sample
//$thread_id = isset($_GET['thread_id']) ? $_GET['thread_id'] : null;
$threadid = 7;

$sql_thread = "SELECT * FROM thread WHERE threadid = ?";
$prep_stmt = mysqli_prepare($connection, $sql_thread);
mysqli_stmt_bind_param($prep_stmt, "i", $threadid);
mysqli_stmt_execute($prep_stmt);
$result_thread = mysqli_stmt_get_result($prep_stmt);
$thread = mysqli_fetch_assoc($result_thread);


if ($thread) {
    // Output thread details
    echo "<h1>{$thread['title']}</h1>";
    echo "<p>{$thread['content']}</p>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/thread.css">
    <title>Fanpit</title>
</head>

<body>
    <div class="container">
        <div class="card mb-4 main-post-card">
            <div class="user-info">
                <img src="/images/user3.png" class="user-profile">
                <p>
                    u/<?php echo "USERNAME VARIABLE GOES HERE"; ?>
                </p>
            </div>

            <div class="card-body">
                <h5 class="cr-light" style="font-size: 12px;">c/<?php echo "CATEGORY NAME GOES HERE"; ?></h5>
                <h5 class="card-title"><?php echo $thread['title']; ?></h5>
                <p class="card-text"><?php echo $thread['content']; ?></p>
            </div>
            <img src="<?php echo $main_post_image; ?>" class="card-img-top" alt="Image Description">

            <div class="post-buttons">
                <button class="like-button">
                    <img src="../icons/like.png" alt="Like Icon"> Like
                </button>
                <button class="comment-button">
                    <img src="../icons/comment.png" alt="Comment Icon"> Comment
                </button>
                <button class="share-button">
                    <img src="../icons/share.png" alt="Share Icon"> Share
                </button>
            </div>

            <div class="comment-container">
                <textarea rows="1" type="text" class="comment-text" placeholder="Leave a Comment"></textarea>
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </div>
    </div>
</body>

</html>