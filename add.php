<?php
include './components/header.php';

// ensure that an image has been submitted too
if (
    !isset($_FILES["image"]) ||
    empty($_FILES["image"]["tmp_name"])
) {
    exit("You must submit an image");
}



// $title = htmlspecialchars($_POST["title"]);
// $description = htmlspecialchars($_POST["description"]);

// check the mime type
$finfo = new finfo(FILEINFO_MIME_TYPE);
$uploadedFile = $_FILES['image']['tmp_name'];
$fileMimeType = $finfo->file($uploadedFile);
$file_name = $_FILES['image']['name'];

$isAcceptedMimeType = in_array($fileMimeType, ['image/jpeg']);

if ($isAcceptedMimeType === false) {
    exit('You must upload an image in jpg format');
}

$imagesDir = __DIR__ . DIRECTORY_SEPARATOR . 'assets\imgs\portfolio-images' . DIRECTORY_SEPARATOR;

// create the images directory if it doesn't already exist
if (!file_exists($imagesDir) && !mkdir($imagesDir, 0777, true)) {
    exit('Failed to create image directory');
}

if (!is_writeable($imagesDir)) {
    exit('Cannot write to image directory');
}

//Send the URL to portolfio_image table
$url = 'assets/imgs/portfolio-images/' . $file_name; 

echo $url;

$sql =  "INSERT INTO portfolio_image (url) VALUES ('$url')";

$query = $conn->query($sql);

// Make sure the query has sent
if (!$query) {
    exit('There was an error when adding your image '. mysqli_error($conn).'');
}



// move the file to the images directory
$success = move_uploaded_file($uploadedFile, $imagesDir.$file_name);

if (!$success) {
    exit("Error moving image - file $uploadedFile");
}

include './components/footer.php';

header('Location: /photography-portfolio/portfolio');
exit;
?>