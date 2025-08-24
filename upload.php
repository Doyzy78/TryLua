<?php
$servername = "sql300.infinityfree.com";
$username = "if0_39537344";
$password = "tqNH8M01IQ9u";
$dbname = "if0_39537344_Dakogtiyan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $features = $conn->real_escape_string($_POST['features']);
    $download_link = $conn->real_escape_string($_POST['download_link']);
    $youtube_link = $conn->real_escape_string($_POST['youtube_link']);

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $image_name = basename($_FILES["mod_image"]["name"]);
    $target_file = $target_dir . uniqid() . "_" . $image_name;

    if (move_uploaded_file($_FILES["mod_image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO mods (title, description, features, download_link, youtube_link, image)
                VALUES ('$title', '$description', '$features', '$download_link', '$youtube_link', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 style='color:green;text-align:center;'>Mod uploaded successfully!</h3>";
            echo "<p style='text-align:center;'><a href='display.php'>View Mods</a></p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}
$conn->close();
?>