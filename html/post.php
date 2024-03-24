<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/post.css" rel="stylesheet">
    <title>Create Post</title>
    <script>

        // JS VALIDATION instead of REQUIRED tags
        function postValidation(){
            var sportDropdown = document.getElementById("sport-dropdown");
            var titleInput = document.getElementsByName("title")[0];
            var descInput = document.getElementsByName("content")[0];
            var imageInput = document.getElementsByName("image")[0];

            if (sportDropdown.value === "") {
                alert("Please select a sport..");
                return false;
            }

            if (titleInput.value === "") {
                alert("Please enter a title..");
                return false;
            }

            if (descInput.value === "") {
                alert("Please describe your thread..");
                return false;
            }

            if (imageInput.value === "") {
                alert("Please upload an image for your thread..");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<script src="/js/post.js"></script>
    <div class="title-container">
        <img src="../images/fanpit_inverted.png">
        <h3>Create Post</h3>
        <hr>
    </div>
    <div class="post-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="upload-thread.php" method="POST" enctype="multipart/form-data" onsubmit="return postValidation();">
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
                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Post body</label>
                        <textarea id="text-body" name="content" rows="5" class="form-control" placeholder="Enter Text (Optional)"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Add Image</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #212529; border: 2px solid steelblue;">Post</button>
                        <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
