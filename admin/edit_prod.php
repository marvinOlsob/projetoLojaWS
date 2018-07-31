<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}

$prodId = $_POST['prodId'];

if (trim($_POST['prodCat']) == '') {
    
    $sql = "SELECT prodCat FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $prodCat = $row[0];
    
}

else {
    
    $prodCat = $_POST['prodCat'];
    
}

if (trim($_POST['prodDes']) == '') {
    
    $sql = "SELECT prodDes FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $prodDes = $row[0];
    
}

else {
    
    $prodDes = $_POST['prodDes'];
    
}

if (trim($_POST['prodNam']) == '') {
    
    $sql = "SELECT prodNam FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $prodNam = $row[0];
    
}

else {
    
    $prodNam = $_POST['prodNam'];
    
}

if (trim($_POST['prodPri']) == '') {
    
    $sql = "SELECT prodPri FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $prodPri = $row[0];
    
}

else {
    
    $prodPri = $_POST['prodPri'];
    
}

if (trim($_POST['prodSto']) == '') {
    
    $sql = "SELECT prodSto FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $prodSto = $row[0];
    
}

else {
    
    $prodSto = $_POST['prodSto'];
    
}

if (trim($_POST['prodSup']) == '') {
    
    $sql = "SELECT prodSup FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $prodSup = $row[0];
    
}

else {
    
    $prodSup = $_POST['prodSup'];
    
}

if ($_FILES['prodPho']['size'] == 0) {
    
    $sql = "SELECT prodPho FROM product WHERE prodId = '$prodId'";

    $result = $conn->query($sql);

    $row = $result->fetch_row();
    
    $name = $row[0];
    
$sql = "UPDATE product SET prodCat = '$prodCat', prodDes = '$prodDes', prodNam = '$prodNam', prodPri = '$prodPri', prodSto = '$prodSto', prodSup = '$prodSup', prodPho = '$name' WHERE prodId = '$prodId'";
            
                
if ($conn->query($sql) === TRUE) {
                    
    echo '<section>';
    echo '<p>Product updated sucessfully.</p>';
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
                    
}
                
else {
        
    echo '<section>';
    echo "<p>Error trying to update product: " . $conn->error . "</p>";
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
        
}
                
}   

else {
    
$name = $_FILES['prodPho']['name'];
$size = $_FILES['prodPho']['size'];
$type = $_FILES['prodPho']['type'];
$tmp_name = $_FILES['prodPho']['tmp_name'];
    
$path = '../prod_photo/';
            
if (move_uploaded_file($tmp_name, $path.$name)) {
    
$sql = "UPDATE product SET prodCat = '$prodCat', prodDes = '$prodDes', prodNam = '$prodNam', prodPri = '$prodPri', prodSto = '$prodSto', prodSup = '$prodSup', prodPho = '$name' WHERE prodId = '$prodId'";
            
                
if ($conn->query($sql) === TRUE) {
    echo '<section>';                    
    echo '<p>Product updated sucessfully.</p>';
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';          
}
                
else {
    echo '<section>';
    echo "<p>Error trying to update product: " . $conn->error . "</p>";
    echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
}
    
}
    
    else {
        echo '<section>';
        echo "<p>Error uploading photo.</p>";
        echo "<p><button onclick='goBack()'>Go Back</button><script>function goBack() {window.history.back()}</script></p>";
                echo '</section>';
    }
    
}

$conn->close();

?>