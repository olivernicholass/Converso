<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/post.css" rel="stylesheet">
    <title>Create Post</title>
</head>

<body>
    <div class="title-container">
        <img src="../images/fanpit_inverted.png">
        <h3>Create Reply</h3>
        <hr>
    </div>
    <div class="post-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="upload.php" method="POST">

                    <div class="form-group">
                        <label for="description">Post body</label>
                        <textarea id="text-body" name="content" rows="5" type="text" class="form-control" placeholder="Enter Text"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #212529; border: 2px solid steelblue;">Post</button>
                        <button class="btn btn-default" >Back</button>
                    </div>



                </form>
            </div>
        </div>

    </div>



</body>

</html>
