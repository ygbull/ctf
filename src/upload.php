<?php
$target_dir = "uploads/";
$random_bytes = openssl_random_pseudo_bytes(16); // Generate 16 random bytes
$random_filename = rtrim(strtr(base64_encode($random_bytes), '+/', '-_'), '='); // Base64 encode and make URL-safe
$original_extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
$target_file = $target_dir . $random_filename . '.' . $original_extension;
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

// Allow only PDF file formats
//if ($fileType != "pdf") {
//    echo "Sorry, only PDF files are allowed.";
//    $uploadOk = 0;
//}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
