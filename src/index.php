<?php
// Check if the referer is from umass.edu
if (isset($_SERVER['HTTP_REFERER']) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'umass.edu') {
    // Allowed, show the HTML content
    ?>
    <html>
    <body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        Select PDF file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload PDF" name="submit">
    </form>

    <form action="verify.php" method="POST">
        Enter the flag:
        <label>
            <input type="text" name="flagInput" required>
        </label>
        <input type="submit" value="Verify Flag">
    </form>

    <!-- hint -->
    <p style="color: #666; font-size: small;">Hint: The flag is securely stored where system configurations reside.</p>

    </body>
    </html>
    <?php
} else {
    // Not allowed, display an error or redirect
    echo 'Access denied. You must be referred from UMass.edu to access this page.';
}
?>
