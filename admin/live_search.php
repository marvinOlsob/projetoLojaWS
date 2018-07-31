<style type="text/css">
    
    #image{
        box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    padding: 5px;
    float: left;
        width: 45px;
        
    }
    
    #name{
        box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    padding: 5px;
    float: left;
        margin-top: 8px;
    }
    
    #wrapper{
        box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    padding: 5px;
    display: table;
        width: 100%;
    }
    
    a{
        color: #000;
        text-decoration: none;
    }
    
    a:hover{
        color: #0f71ba;
        text-decoration: none;
    }

    
</style>

<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}


$word = strval($_GET['q']);

$sql= "SELECT prodId, prodNam, prodPho FROM product WHERE prodNam LIKE '%$word%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()) {
            
            echo "<div id='wrapper'>";
            echo "<div id='image'><img src='../prod_photo/" . $row["prodPho"] . "' width='30' height='30'/></div>";
            echo "<a href='index.php?search=" . $row["prodId"] . "'><div id='name'>" . $row["prodNam"] . "</div></a>";
            echo "</div>";
            
        }
    
}

else {
    
    echo "<div id='livesearch'><p>Sorry, no results found.</p></div>";
    
}

$conn->close();


?>