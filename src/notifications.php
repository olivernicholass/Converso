<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../css/notifications.css">
  <title>Fanpit | Notifications</title>
</head>

<body>
    
  <?php include '../components/header.php'; ?>
  <?php include '../components/sidebar.php'; ?>

    <div class="wrapper">
        <div class="notifpage">
            <h2>Notifications</h2>
            <p class="new">New</p>
            <hr class="new-line-break">

            <button class="button">
                <div class="notification-container">
                    <div class="unread"></div>
                    <div class="notification-title">New Feature: Dark Mode</div>
                    <div class="notification-body">We've listened to your feedback! Dark mode is now available in your settings. Give your eyes a rest and try it today.</div>
                    <div class="notification-time">2 hours ago</div>
                
            </div>
            </button>
            
            <button class="button">
                <div class="notification-container">
                    <div class="unread"></div>
                    <div class="notification-title">Recommended on: c/basketball</div>
                    <div class="notification-body">[Highlight] Daniel Gafford grabs a rebound among all the Thunder players inside the paint, and makes the putback lay-in for the And-One (with a replay). The crowd is cheering, and he is converting the free throw.</div>
                    <div class="notification-time">7 hours ago</div>
                </div>
            </button>

            <p class="new">Old</p>
            <hr class="new-line-break">
            <button class="button">
                <div class="notification-container">
                    <div class="notification-title">f/rogerman305 commented on your post</div>
                    <div class="notification-body">Awesome!</div>
                    <div class="notification-time">1 day ago</div>
                </div>
            </button>

            <button class="button">
                <div class="notification-container">
                    <div class="notification-title">f/coolbeans123 replied to you comment</div>
                    <div class="notification-body">I haven't don't the research, but I'd be surprised if anyone near the top of the all time win list has moved around the league as much as he has. 
                                                    All he does is win and yet somehow every team he plays for is constantly looking for his replacement.</div>
                    <div class="notification-time">2 days ago</div>
                </div>
            </button>
            <button class="button">
                <div class="notification-container">
                    <div class="notification-title">ADMIN: Welcome to Our Website!</div>
                    <div class="notification-body">Thank you for joining our community. Start exploring our features now.</div>
                    <div class="notification-time">4 days ago</div>
                </div>
            </button>

            <button class="button">
                <div class="notification-container">
                    <div class="notification-title">ADMIN: System Update Completed</div>
                    <div class="notification-body">Our scheduled system update has been completed successfully. Enjoy the new features and improvements.</div>
                    <div class="notification-time">4 days ago</div>
                </div>   
            </button>

</body>
</html>