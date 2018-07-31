<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}


$name = $_FILES['prodPho']['name'];
$size = $_FILES['prodPho']['size'];
$type = $_FILES['prodPho']['type'];
$tmp_name = $_FILES['prodPho']['tmp_name'];

if (isset($name)) {
        
    if(($type == 'image/jpeg' || $type == 'image/jpg' || $type = 'image/png') && ($size <= 3145728)) {
            
        $path = '../prod_photo/';
            
        if (move_uploaded_file($tmp_name, $path.$name)) {
                
            $sql = "INSERT INTO product (prodCat, prodDes, prodNam, prodPho, prodPri, prodSto, prodSup) VALUES ('$_POST[prodCat]', '$_POST[prodDes]', '$_POST[prodNam]', '$name', '$_POST[prodPri]', '$_POST[prodSto]', '$_POST[prodSup]')";
                
            if ($conn->query($sql) === TRUE) {
                echo '<section>';  
                echo '<p>Product added sucessfully.</p>';
                
                echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
                    
            }
                
            else {
                echo '<section>';
                echo "<p>Error trying to add product: " . $conn->error . "</p>";
                echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
                echo '</section>';
        
            }
                
        }
            
    }
        
    else {
        echo '<section>';
        echo '<p>Please choose a valid photo.</p>';
        echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
        echo '</section>';
            
    }
        
}

$conn->close();

?>