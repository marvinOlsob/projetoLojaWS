<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}


$size = sizeof($_POST["input"]);

for($x = 0; $x < $size; $x++) {
        
    $suppNam = $_POST["input"][$x];
        
    $sql = "INSERT INTO supplier (suppNam) VALUES ('$suppNam')";
    
    if ($conn->query($sql) !== TRUE) {
                
        die("Oops! Something unexpected happened. Please try again.");
                
    }
        
}
echo '<section>';
echo '<p>Suppliers added sucessfully.</p>';
                
                echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
echo '</section>';
?>