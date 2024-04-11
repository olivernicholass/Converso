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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/media.css">
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
  <link rel="stylesheet" href="../css/sidebar.css">
<link rel="stylesheet" href="../css/header.css">

  <title>Fanpit</title>
</head>

<body>

  <?php include '../components/header.php'; ?>
  <?php include '../components/sidebar.php'; ?>

  <div class="profile-container-wrapper">
    <div class="profile-container">
      <img src="<?php echo "../uploads/" . $_SESSION["userid"] . "-pfp.png"; ?>" alt="Profile Picture" class="profile-picture">
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