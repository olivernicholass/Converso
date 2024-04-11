<?php
session_start();
require 'connect.php';

$threadid = isset($_GET['thread_id']) ? $_GET['thread_id'] : '';
$parent_postid = isset($_GET['parent_postid']) ? $_GET['parent_postid'] : '';

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
    <link href="../css/post.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
<link rel="stylesheet" href="../css/header.css">
    <title>Create Reply</title>
</head>

<body>
    <?php include '../components/header.php'; ?>

    <div class="row">
        <?php include '../components/sidebar.php'; ?>
    </div>




    <div class="post-container">
        <div class="row">
            <div class="col-md-5">
                <h3>Create Reply</h3>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-12">
                <form action="upload-post.php" method="POST">

                    <input type="hidden" name="threadid" value="<?php echo $threadid; ?>">
                    <input type="hidden" name="parent_postid" value="<?php echo $parent_postid; ?>">

                    <?php
                    echo "logged in as: " . @$_SESSION['username'];
                    ?>

                    <div class="form-group">
                        <label for="description">Post body</label>
                        <textarea id="text-body" name="content" rows="5" type="text" class="post form-control" placeholder="Enter Text"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #212529; border: 2px solid steelblue;">Post</button>
                        <a href="index.php" style="color: black; text-decoration: none;">Back</button>

                    </div>
                    


                </form>
            </div>
        </div>

    </div>
    </div>


</body>

</html>