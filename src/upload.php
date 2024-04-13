<?php
$target_dir = "uploads/";
$original_filename = $_FILES["fileToUpload"]["name"];
$base64_encoded_filename = base64_encode($original_filename); // base64 for the file name
$base64_encoded_filename = rtrim(strtr($base64_encoded_filename, '+/', '-_'), '='); // make url safe
$original_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
$target_file = $target_dir . $base64_encoded_filename . '.' . $original_extension;
$uploadOk = 1;
$fileType = $original_extension;

// Check if the file is a PDF by MIME type and magic number
if (isset($_POST["submit"])) {
    $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
    $check_mime = mime_content_type($file_tmp);
    $file = fopen($file_tmp, 'rb');
    $first_bytes = fgets($file, 5); // Read first 5 bytes to check for %PDF-
    fclose($file);

    if ($check_mime == 'application/pdf' && $first_bytes === "%PDF") {
        echo "File is a verified PDF.";
        $uploadOk = 1;
    } else {
        echo "File is not a PDF. Detected MIME type: " . $check_mime . ", Magic number: " . bin2hex($first_bytes);
        $uploadOk = 0;
    }
}

// check if $uploadOk is set to 0
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded.";
    } else {
        echo "There was an error uploading your file.";
    }
}
