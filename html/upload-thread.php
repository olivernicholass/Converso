<?php
// VERIFY FORM SUBMISSION
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['sectionid']) && isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['image'])) {
        require_once 'connect.php';

    
        $preparedStmt = $connection->prepare("INSERT INTO thread (sectionid, userid, title, content, ttime, threadImage) VALUES (?, ?, ?, ?, ?, ?)");
        $preparedStmt->bind_param("iissss", $sectionid, $userid, $title, $content, $ttime, $threadImage);

        // THREAD PARAMETERS

        $sectionid = $_POST['sectionid']; 
        $userid = 1; // TEST USER ID
        $title = $_POST['title'];
        $content = $_POST['content'];
        $ttime = date('Y-m-d'); 
        $threadImage = ''; 

        // UPLOADING IMAGE TO thread_images/

        if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $direc = 'thread_images/';
            $file = $direc . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $threadImage = $file;
            } else {
                echo "Failed to upload image.";
                exit;
            }
        }

        // REDIRECT TO INDEX.PHP TO SEE NEW POST 
        if ($preparedStmt->execute()) {
            header("Location: index.php");
            exit; 
        } else {
            echo "Error creating thread: " . $preparedStmt->error;
        }
        
        $preparedStmt->close();
        $connection->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>