<?php
$servername = "sql300.infinityfree.com";
$username = "if0_39537344";
$password = "tqNH8M01IQ9u";
$dbname = "if0_39537344_Dakogtiyan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mods ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Mods</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .mod-card {
            background: #1e1e1e;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 12px;
            box-shadow: 0 0 5px rgba(0,255,247,0.3);
        }
        img {
            max-width: 100%;
            border-radius: 8px;
        }
        a {
            color: #00fff7;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2 style="color:#00fff7;">Uploaded Mods</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='mod-card'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Mod Image'><br><br>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<strong>Features:</strong><p>" . nl2br(htmlspecialchars($row['features'])) . "</p>";
            echo "<a href='" . htmlspecialchars($row['download_link']) . "' target='_blank'>Download</a>";
            if (!empty($row['youtube_link'])) {
                echo " | <a href='" . htmlspecialchars($row['youtube_link']) . "' target='_blank'>YouTube</a>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>No mods uploaded yet.</p>";
    }
    $conn->close();
    ?>
</body>
</html>