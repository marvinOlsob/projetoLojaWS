<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}


$sql = 'SELECT suppId, suppNam FROM supplier ORDER BY suppNam ASC';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        
    echo 'Supplier:<br /><select name="prodSup"><option value="">Select</option>';
        
    while($row = $result->fetch_assoc()) {
            
        echo '<option value="' . $row[suppId] . '">' . $row['suppNam'] . '</option>';
            
    }
        
    echo '</select>';
        
}

$conn->close();

?>