<?php
// AWS SDK for PHP
require 'vendor/autoload.php';

use Aws\S3\S3Client;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // AWS credentials
    $accessKey = 'Your Access Key';
    $secretKey = 'Your Secret Key';

    // Create an S3Client
    $s3 = new S3Client([
        'version' => 'latest',
        'region' => 'us-east-1', // Replace with your desired AWS region
        'credentials' => [
            'key' => $accessKey,
            'secret' => $secretKey,
        ],
    ]);

    // Check if the file was uploaded without errors
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file']['tmp_name']; // Temporary file path
        $fileName = $_FILES['file']['name'];

        // Upload the file to your S3 bucket
        $bucketName = 'YOUR BUCKET NAME';
        $s3->putObject([
            'Bucket' => $bucketName,
            'Key' => $fileName,
            'SourceFile' => $file,
        ]);

        // Redirect back to the main page after successful upload
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $uploadError = 'Error uploading file.';
    }
}

// List uploaded files
// AWS credentials
$accessKey = 'Your Access Key';
$secretKey = 'Your Secret Key';

// Create an S3Client
$s3 = new S3Client([
    'version' => 'latest',
    'region' => 'us-east-1', // Replace with your desired AWS region
    'credentials' => [
        'key' => $accessKey,
        'secret' => $secretKey,
    ],
]);

// Get list of files from your S3 bucket
$bucketName = 'YOUR BUCKET NAME';
$objects = $s3->listObjects(['Bucket' => $bucketName]);
$uploadedFiles = [];
foreach ($objects['Contents'] as $object) {
    $uploadedFiles[] = $object['Key'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Amazon S3 File Upload</title>
</head>
<body>
    <h2>Upload a file to Amazon S3</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload File">
        <?php
        if (isset($uploadError)) {
            echo "<p>$uploadError</p>";
        }
        ?>
    </form>

    <h2>Uploaded Files</h2>
    <ul>
        <?php
        foreach ($uploadedFiles as $file) {
            echo '<li>' . $file . '</li>';
        }
        ?>
    </ul>
</body>
</html>
