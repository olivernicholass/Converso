<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "update_user_data.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fanpit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/media.css">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
</head>

<body>

<?php include '../components/header.php'; ?>
<?php include '../components/sidebar.php'; ?>

    <div class="container">
        <div class="row">
            
            


            <div class="col-lg-8 main-posts">

                <div class="col-lg-8 main-posts">
                    <?php
                    echo "Hello, <b>&nbsp;" . @$_SESSION['username'] . "&nbsp;</b> Welcome to Fanpit!";
                    ?>
                    <?php if ($_SESSION["loggedin"] === true && isset($_SESSION["loggedin"])) : ?>
                        <a href="post.php" class="btn btn-primary view-post" style="margin: 15px;">share your moment</a>
                    <?php else : ?>
                        <a href="login.php" class="btn btn-primary view-post" style="margin: 15px;">share your moment</a>
                    <?php endif; ?>
                    <?php
                    require 'connect.php';

                    $sql = "SELECT thread.*, section.sname 
                            FROM thread 
                            INNER JOIN section ON thread.sectionid = section.sectionid";

                    $result = $connection->query($sql);


                    // DYNAMICALLY APPEND EACH POST TO MAIN PAGE
                    // SELECTING SAID THREAD -> /thread.php?thread_id="THREAD ID"

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="card mb-4 main-post-card">';

                            if (!empty($row["threadImage"])) {
                                echo '<img src="' . $row["threadImage"] . '" class="card-img-top" alt="Post Image">';
                            }

                            echo '<div class="card-body">';
                            echo '<h5 class="cr-light" style="font-size: 12px;">' . $row["sname"] . '</h5>';
                            echo '<h5 class="card-title">' . $row["title"] . '</h5>';
                            echo '<p class="card-text">' . $row["content"] . '</p>';
                            echo '</div>';

                            echo '<a href="thread.php?thread_id=' . $row["threadid"] . '" class="btn btn-primary view-post">View Thread</a>';

                            echo '</div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $connection->close();
                    ?>
                </div>
            </div>
            <div class="col-lg-4 recent-posts">
                <div class="recent-posts">
                    <h2 class="section-title cr-light" style="font-size: 12px;">RECENT POSTS</h2>

                    <div class="post">
                        <h5 class="post-title">The MVP Race: Top Contenders in the NBA</h5>
                        <hr class="post-divider">
                    </div>

                    <div class="post">
                        <h5 class="post-title">Soccer's Rising Stars: Young Talents Making an Impact</h5>
                        <hr class="post-divider">
                    </div>

                    <div class="post">
                        <h5 class="post-title">Memorable Moments in Baseball History</h5>
                        <hr class="post-divider">
                    </div>
                </div>
            </div>
        </div>

</body>

</html>