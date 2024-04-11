<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../css/post.css" />
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Create Post</title>
</head>

<body>
    
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>

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

                    <input type="hidden" name="userid" value="<?php echo @$_SESSION['userid']; ?>">

                    <?php
                    echo "logged in as: " . @$_SESSION['username'];
                    ?>

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
                                echo '<option value="' . $sectionID . '" name="sectionid">' . $sport . '</option>';
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
                        <input type="file" name="image" class="post-file form-control-file" accept="image/*">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #212529; border: 2px solid steelblue;">Post</button>
                        <a href="index.php" style="color: black; text-decoration: none;">Back</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>