<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../css/post.css"/>
    
    <title>Create Post</title>
</head>
<body>
<nav class="navbar sticky-top navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img class="fanpit-logo" src="../images/fanpit.png" alt="fanpit"></a>

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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
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
    </div>
    <div class="post-container">
        <div class="row">
        <div class="col-md-5">
                <h3>Create Post</h3>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-12">
                <form action="upload-thread.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sport-dropdown">Select a sport</label>
                        <select name="sectionid" id="sport-dropdown" class="post form-control">
                            <option value="">Select a sport</option>
                            <?php
                            $sportsSections = array(
                                "Basketball" => 1,
                                "Football" => 2,
                                "Hockey" => 3,
                                "Motorsports" => 4,
                                "Baseball" => 5
                            );

                            foreach ($sportsSections as $sport => $sectionID) {
                                echo '<option value="' . $sectionID . '">' . $sport . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="post form-control" name="title" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Post body</label>
                        <textarea id="text-body" name="content" rows="5" class="post form-control" placeholder="Enter Text (Optional)"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Add Image</label>
                        <input type="file" name="image" class="post-file form-control-file" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #212529; border: 2px solid steelblue;">Post</button>
                        <button class="btn btn-default">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
