<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "update_user_data.php"; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/media.css">
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
  <title>Fanpit</title>
</head>

<body>


    <!-- Navbar -->
 
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

    <!-- Sidebar -->
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

            <!-- Username/Profile Picture -->
        <div class="profile-container-wrapper">
            <div class="profile-container">
                <img src="<?php echo "../uploads/".$_SESSION["userid"]."-pfp.png"; ?>" alt="Profile Picture" class="profile-picture">
                <div>
                    <div class="profile-username"><?php echo $_SESSION["nickname"]; ?></div>
                    <div class="profile-subname">f/<?php echo $_SESSION["username"]; ?></div>
                </div>
            </div>

            <!-- Buttons Underneath Profile Picture/Username -->
            <div class="profile-sections">
                <button class="profile-section">Overview</button>
                <button class="profile-section">Posts</button>
                <button class="profile-section">Comments</button>
                <button class="profile-section">Liked</button>
                <button class="profile-section">Disliked</button>
                <button class="profile-section"><a href="edit-profile.php">Edit Profile</a></button>
            </div>

            <!-- Create Post Button -->
            <button class="create-post-button">
                <img src="../icons/create.png" alt="Create" style="width: 25px; height: 25px; margin-right: 10px;">
                <span>New Post</span>
            </button>

            <hr class="separator">

            <div class="activity-section">
                <img src="../images/sleeping.png" alt="Activity Image">
                <p class="text">This user has no recent activity...</p>
            </div>
        </div>
</body>
</html>