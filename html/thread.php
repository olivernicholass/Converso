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


$replies = array(
    array(
        'username' => 'f/Carlos',
        'date' => '2024-02-05 at 4:44pm',
        'content' => 'Sample reply text 1'
    ),
    array(
        'username' => 'f/Carlos',
        'date' => '2024-02-05 at 4:44pm',
        'content' => 'Sample reply text 2'
    ),
    // Add more reply data as needed
);

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

        <div class="col-lg-4 custom-sidebar">
            <div class="button-section">
                <button class="button">
                    <img src="../icons/home2.png" alt="Home" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> Home
                </button>
                <button class="button">
                    <img src="../icons/popular.png" alt="Popular" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> Popular
                </button>
                <button class="button">
                    <img src="../icons/suggested.png" alt="All" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> Suggested
                </button>
            </div>

            <div class="button-section">
                <h2 class="cr-light" style="font-size: 12px;">RECENT</h2>
                <button class="button cr-light" style="font-size: 12px;">c/sports</button>
                <button class="button cr-light" style="font-size: 12px;">c/tech</button>
                <button class="button cr-light" style="font-size: 12px;">c/computerscience</button>
            </div>

            <div class="button-section">
                <h2 class="cr-light" style="font-size: 12px;">COMMUNITIES</h2>
                <button class="button">
                    <img src="../icons/community.png" alt="Community" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> Join a Community!
                </button>
            </div>

            <div class="button-section">
                <h2 class="cr-light" style="font-size: 12px;">RESOURCES</h2>
                <button class="button">
                    <img src="../icons/about.png" alt="About" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> About Converso
                </button>
                <button class="button">
                    <img src="../icons/help.png" alt="Help" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> Help
                </button>
                <button class="button">
                    <img src="../icons/contact.png" alt="Contact" style="width: 25px; height: 25px; color:black; margin-right: 5px;" /> Contact Information
                </button>
            </div>
        </div>

        <div class="col-lg-8 main-posts">
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
            <div class="replies">
    <?php foreach ($replies as $reply): ?>
        <div class="reply-container">
            <div class="reply-main">
                <div class="post-header">
                    <img src="/images/user2.png" class="user-profile">
                    <div class="post-info">
                        <div class="username"><?php echo $reply['username']; ?></div>
                        <div class="date"><?php echo $reply['date']; ?></div>
                    </div>
                </div>
                <div class="content"><?php echo $reply['content']; ?></div>
                <div class="reply-link-container">
                    <a class="reply-link" href="#">Reply</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        </div>
    </div>

</body>

</html>