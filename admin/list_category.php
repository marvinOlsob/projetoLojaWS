<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}


$sql = 'SELECT cateId, cateNam FROM category ORDER BY cateNam ASC';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        
    echo 'Category:<br /><select name="prodCat"><option value="">Select</option>';
        
    while($row = $result->fetch_assoc()) {
            
        echo '<option value="' . $row[cateId] . '">' . $row['cateNam'] . '</option>';
            
    }
        
    echo '</select>';
        
}

$conn->close();

?>