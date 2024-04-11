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
  <link rel="stylesheet" type="text/css" href="../css/media.css">
  <link rel="stylesheet" type="text/css" href="../css/messages.css">
  <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  <title>Fanpit</title>
</head>

<body>
  <?php include '../components/header.php'; ?>
  <?php include '../components/sidebar.php'; ?>


  <div class="messages-container">
    <div class="people-container">
        <div class="username">
            fanpitADMINISTRATOR
            <img src="../icons/createmessage.png" alt="Icon" class="icon">
          </div>
      <div class="person-box-highlighted">
        <img src="../images/user1.png" alt="Profile Picture 1" class="profile-picture"> Lebron James </div>
      <div class="person-box">
        <img src="../images/user2.png" alt="Profile Picture 2" class="profile-picture"> Lionel Messi </div>
    <div class="person-box">
        <img src="../images/user3.png" alt="Profile Picture 1" class="profile-picture"> Neymar Junior </div>
      <div class="person-box">
        <img src="../images/user4.png" alt="Profile Picture 2" class="profile-picture"> Michael Jordan </div>
        <div class="person-box">
            <img src="../images/user1.png" alt="Profile Picture 1" class="profile-picture"> Serena Williams </div>
        <div class="person-box">
            <img src="../images/user2.png" alt="Profile Picture 2" class="profile-picture"> Usain Bolt </div>
        <div class="person-box">
            <img src="../images/user3.png" alt="Profile Picture 1" class="profile-picture"> Rafael Nadal </div>
        <div class="person-box">
            <img src="../images/user4.png" alt="Profile Picture 2" class="profile-picture"> Simone Biles </div>
        
    </div>
    <div class="user-messages-container">
        <div class="message-input-container">
          <input type="text" placeholder="Message..." class="message-input">
          <button class="send-button">Send</button>
        </div>
      </div>
  </div>

</body>

</html>
