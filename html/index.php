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
</head>

<body>

    <nav class="navbar sticky-top navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img class="fanpit-logo" src="../images/fanpit.png" alt="fanpit"></a>

        <input class="form-control" type="search" placeholder="Search for posts..." aria-label="Search">

        <div class="navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img class="icon" src="../icons/message.png" alt="Contact"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img class="icon" src="../icons/notification.png" alt="Notifications"></a>
                </li>
                <li class="nav-item profile">
                    <div class="nav-link profile-icon">
                        <img class="icon" src="../icons/usericon.png" alt="User">
                    </div>
                    <ul class="profile-menu">
                        <?php
                            if($_SESSION["loggedin"] === true && isset($_SESSION["loggedin"])) {
                                echo "<li><a href='profile.php'>Profile</a></li>";
                                echo "<li><a href='logout.php'>Logout</a></li>";
                            } else {
                                echo "<li><a href='login.php'>Login</a></li>";
                                echo "<li><a href='register.php'>Register</a></li>";
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
        <div class="col-lg-4 custom-sidebar">
            <div class="button-section">
                <button class="button">
                <img src="../icons/home2.png" alt="Home" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> Home
                </button>
                <button class="button">
                <img src="../icons/popular.png" alt="Popular" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> Popular
                </button>
                <button class="button">
                <img src="../icons/suggested.png" alt="All" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> Suggested
                </button>
            </div>

            <div class="button-section">
                <h2 class="cr-light" style="font-size: 12px;">RECENT</h2>
                <button class="button" style="font-size: 12px;">f/basketball</button>
                <button class="button" style="font-size: 12px;">f/football</button>
                <button class="button" style="font-size: 12px;">f/tennis</button>
            </div>

            <div class="button-section">
                <h2 class="cr-light" style="font-size: 12px;">COMMUNITIES</h2>
                <button class="button">
                <img src="../icons/community.png" alt="Community" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> Join a Community!
                </button>
            </div>

            <div class="button-section">
                <h2 class="cr-light" style="font-size: 12px;">RESOURCES</h2>
                <button class="button">
                <img src="../icons/about.png" alt="About" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> About Fanpit
                </button>
                <button class="button">
                <img src="../icons/help.png" alt="Help" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> Help
                </button>
                <button class="button">
                <img src="../icons/contact.png" alt="Contact" style="width: 25px; height: 25px; color:black; margin-right: 5px;"/> Contact Information
                </button>
            </div>
            </div>

            <div class="col-lg-8 main-posts">
            
            <div class="col-lg-8 main-posts">
            <a href="post.php" class="btn btn-primary view-post" style="margin: 15px;">share your moment</a>
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