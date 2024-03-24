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
        <?php
        require 'connect.php';

        $threadId = isset($_GET['thread_id']) ? $_GET['thread_id'] : null;

        // Dynamically display correct thread based on threadId
        // We get our thread.php?thread_id="Unique Thread ID" 

        $sql = "SELECT thread.*, section.sname, thread.likes 
                    FROM thread 
                    INNER JOIN section ON thread.sectionid = section.sectionid
                    WHERE thread.threadid = ?";
                    
        $preparedStmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($preparedStmt, "i", $threadId);
        mysqli_stmt_execute($preparedStmt);
        $result = mysqli_stmt_get_result($preparedStmt);
        $thread = mysqli_fetch_assoc($result);

        if ($thread) {
            ?>
            <div class="card mb-4 main-post-card">
                <div class="user-info">
                    <img src="../images/user2.png" class="user-profile">
                    <p>
                        u/<?php echo "USERNAME VARIABLE GOES HERE"; ?>
                    </p>
                </div>
                <div class="card-body">
                    <h5 class="cr-light" style="font-size: 12px;">c/<?php echo $thread['sname']; ?></h5>
                    <h5 class="card-title"><?php echo $thread['title']; ?></h5>
                    <p class="card-text"><?php echo $thread['content']; ?></p>
                </div>
                <img src="<?php echo $thread['threadImage']; ?>" class="card-img-top" alt="Image Description">

                <div class="post-buttons">
                    <button class="like-button" onclick="likeThread(<?php echo $thread['threadid']; ?>)">
                        <img src="../icons/like.png" alt="Like Icon"> Like
                    </button>
                    <button class="comment-button">
                        <img src="../icons/comment.png" alt="Comment Icon"> Comment
                    </button>
                    <button class="share-button">
                        <img src="../icons/share.png" alt="Share Icon"> Share
                    </button>
                </div>
            </div>
            
            <div class="leave-comment">
                <textarea rows="1" type="text" class="comment-text" placeholder="Leave a Comment"></textarea>
                <button type="submit" class="btn btn-primary post">Post</button>
            </div>
            
            <div class="comment-container">
                <?php
                $comments = array(
                    array(
                        'username' => 'User1',
                        'date' => '2024-03-24',
                        'content' => 'Comment 1'
                    ),
                    array(
                        'username' => 'User2',
                        'date' => '2024-03-25',
                        'content' => 'Comment 2'
                    ),
                );

                foreach ($comments as $comment) {
                    ?>
                    <div class="comment">
                        <div class="comment-info">
                            <div class="username"><?php echo $comment['username']; ?></div>
                            <div class="date"><?php echo $comment['date']; ?></div>
                        </div>
                        <div class="comment-content"><?php echo $comment['content']; ?></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php
        } else {
            echo "<p>No thread found.</p>";
        }
        ?>
    </div>
</body>

</html>
