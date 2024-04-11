<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the file is a PDF
if(isset($_POST["submit"])) {
    $check = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
    if($check == 'application/pdf') {
        echo "File is a PDF.";
        $uploadOk = 1;
    } else {
        echo "File is not a PDF. Detected type: " . $check;
        $uploadOk = 0;
    }
}

// Allow only PDF file formats
if($fileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

