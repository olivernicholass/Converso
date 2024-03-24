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
        <h3>Create Post</h3>
        <hr>
    </div>
    <div class="post-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="upload-thread.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sport-dropdown">Select a sport</label>
                        <select name="sectionid" id="sport-dropdown" class="form-control">
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
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Post body</label>
                        <textarea id="text-body" name="content" rows="5" class="form-control" placeholder="Enter Text (Optional)"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Add Image</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
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
