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
        <a href="index.php" class="btn-home">Return Home</a>
        <?php
        require 'connect.php';

        $threadId = isset($_GET['thread_id']) ? $_GET['thread_id'] : null;

        // Dynamically display correct thread based on threadId
        // We get our thread.php?thread_id="Unique Thread ID" 

        $sql = "SELECT thread.*, section.sname, thread.likes, user.username 
                    FROM thread 
                    JOIN user ON thread.userid = user.userid
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
                        u/<?php echo $thread['username']; ?>
                    </p>
                </div>
                <div class="card-body">
                    <h5 class="cr-light" style="font-size: 12px;">c/<?php echo $thread['sname']; ?></h5>
                    <h5 class="card-title"><?php echo $thread['title']; ?></h5>
                    <p class="card-text"><?php echo $thread['content']; ?></p>
                </div>
                <img src="<?php echo $thread['threadImage']; ?>" class="card-img-top">

                <div class="post-buttons">
                    <button class="like-button" onclick="likeThread(<?php echo $thread['threadid']; ?>)">
                        <img src="../icons/like.png" alt="Like Icon"> Like
                    </button>

                    <button class="share-button">
                        <img src="../icons/share.png" alt="Share Icon"> Share
                    </button>

                    <?php
                    
                    if (@$_SESSION["loggedin"] === true && isset($_SESSION["loggedin"])){
                        echo '<a href="reply.php?thread_id=' . $threadId . '&parent_postid=-1" class="btn btn-primary view-post">reply</a>';
                    }
                    else{
                        echo '<a href="login.php" class="btn btn-primary">Reply</a>';
                    }
                    ?>
                </div>
            </div>

            
            <div class="comment-container">
                <h3>Replies</h3>
                <?php

                function displayPosts($conn, $thread, $parent_postid = -1, $indent = 0){
                    $sql = "SELECT * FROM post JOIN user ON post.userid = user.userid WHERE threadid = {$thread['threadid']} AND parent_postid = $parent_postid";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
                        while($post = $result->fetch_assoc()){
                            echo '<div class="comment" style="margin-left: ' . ($indent * 20) . 'px;">';
                            echo    '<div class="comment-info">';
                            echo        '<div class="username">' . ($post['username']) . '</div>';
                            echo        '<div class="date">' . ($post['ptime']) . '</div>';
                            echo    '</div>';
                            echo       '<div class="comment-content">';
                            echo        '<p>' . $post['content'] . '</p>';
                            if (@$_SESSION["loggedin"] === true && isset($_SESSION["loggedin"])){
                                echo        '<a href="reply.php?thread_id=' . $thread['threadid'] . '&parent_postid=' . $post['postid'] . '" class="btn-reply">Reply</a>';
                            }
                            else{
                                echo        '<a href="login.php" class="btn-reply">Reply</a>';
                            }
                                
                            echo    '</div>';
                            echo '</div>';
                            displayPosts($conn, $thread, $post['postid'], $indent + 1); // Recursive call for nested replies
                        }
                    }
                }

                displayPosts($connection, $thread);

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
