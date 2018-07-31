<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}

if (trim($_POST['settTit']) == '') {
    
    $sql = "SELECT settTit FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $settTit = $row[0];
    
}

else {
    
    $settTit = $_POST['settTit'];
    
}

if (trim($_POST['settFac']) == '') {
    
    $sql = "SELECT settFac FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $settFac = $row[0];
    
}

else {
    
    $settFac = $_POST['settFac'];
    
}

if (trim($_POST['settFli']) == '') {
    
    $sql = "SELECT settFli FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $settFli = $row[0];
    
}

else {
    
    $settFli = $_POST['settFli'];
    
}

if (trim($_POST['settGog']) == '') {
    
    $sql = "SELECT settGog FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $settGog = $row[0];
    
}

else {
    
    $settGog = $_POST['settGog'];
    
}

if (trim($_POST['settPin']) == '') {
    
    $sql = "SELECT settPin FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $settPin = $row[0];
    
}

else {
    
    $settPin = $_POST['settPin'];
    
}

if (trim($_POST['settTwi']) == '') {
    
    $sql = "SELECT settTwi FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $settTwi = $row[0];
    
}

else {
    
    $settTwi = $_POST['settTwi'];
    
}

if ($_FILES['settLog']['size'] == 0) {
    
    $sql = "SELECT settLog FROM setting WHERE settId = '1'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $name = $row[0];
    
$sql = "UPDATE setting SET settTit = '$settTit', settFac = '$settFac', settFli = '$settFli', settGog = '$settGog', settPin = '$settPin', settTwi = '$settTwi', settLog = '$name' WHERE settId = '1'";
            
                
if ($conn->query($sql) === TRUE) {
    
    echo '<section>';                
    echo '<p>Settings updated sucessfully.</p>';
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
                    
}
                
else {
    echo '<section>';    
    echo "<p>Error trying to update : " . $conn->error . "</p>";
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
        
}
                
}   

else {
    
$name = $_FILES['settLog']['name'];
$size = $_FILES['settLog']['size'];
$type = $_FILES['settLog']['type'];
$tmp_name = $_FILES['settLog']['tmp_name'];
    
$path = '../image/';
            
if (move_uploaded_file($tmp_name, $path.$name)) {
    
$sql = "UPDATE setting SET settTit = '$settTit', settFac = '$settFac', settFli = '$settFli', settGog = '$settGog', settPin = '$settPin', settTwi = '$settTwi', settLog = '$name' WHERE settId = '1'";
            
                
if ($conn->query($sql) === TRUE) {
    echo '<section>';
    echo '<p>Settings updated sucessfully.</p>';
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
    echo '</section>';
                    
}
                
else {
    echo '<section>';    
    echo "<p>Error trying to product: " . $conn->error . "</p>";
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
    echo '</section>';   
}
    
}
    
    else {
        echo '<section>';
        echo "<p>Error uploading photo.</p>";
        echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
        echo '</section>';
    }
    
}

$conn->close();

?>