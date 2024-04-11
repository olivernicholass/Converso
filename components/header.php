<nav class="navbar sticky-top navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img class="fanpit-logo" src="../images/fanpit.png" alt="fanpit"></a>

    <input class="form-control" type="search" placeholder="Search for posts..." aria-label="Search">

    <div class="navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="messages.php"><img class="icon" src="../icons/message.png" alt="Contact"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notifications.php"><img class="icon" src="../icons/notification.png" alt="Notifications"></a>
            </li>
            <li class="nav-item profile">
                <div class="profile-container">
                    <div class="nav-link profile-icon">
                        <img class="icon" src="../icons/usericon.png" alt="User">
                    </div>
                    <ul class="profile-menu">
                        <?php
                        if ($_SESSION["loggedin"] === true && isset($_SESSION["loggedin"])) {
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='logout.php'>Logout</a></li>";
                        } else {
                            echo "<li><a href='login.php'>Login</a></li>";
                            echo "<li><a href='register.php'>Register</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>