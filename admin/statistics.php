<!doctype html>
<html>
    <head>
<link href="../css/index.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <section>
<div id="wrapper3">
<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}


$sql = "SELECT * FROM orderFinal WHERE ordeFinDat BETWEEN '$_POST[date0]' AND '$_POST[dateF] 23:59:59.999' ORDER BY ordeFinDat";

$result = $conn->query($sql);

$totalOrder = 0;
$totalItems = 0;
$totalSold = 0;

if ($result->num_rows > 0){
            
        echo "
        
            <p>Orders between '$_POST[date0]' and '$_POST[dateF]':</p>
        
            <table border='1'>
                <tr>
                    <td>ID</td>
                    <td>Date</td>
                    <td>Items</td>
                    <td>Total</td>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            
            echo " 
            
                <tr>
                    <td>" . $row["ordeFinId"] . "</td>
                    <td>" . $row["ordeFinDat"] . "</td>
                    <td>" . $row["ordeFinIte"] . "</td>
                    <td>&pound; " . $row["ordeFinTot"] . "</td>
                </tr>";
            
            $totalOrder = $totalOrder + 1;
            $totalItems = $totalItems + $row["ordeFinIte"];
            $totalSold = $totalSold + $row["ordeFinTot"];
            
        }
        
        echo "</table>";
    
        echo "<p>Total number of orders: " .$totalOrder. ".</p>";
        echo "<p>Total number of items sold: " .$totalItems. ".</p>";
        echo "<p>Total sold: &pound; " .$totalSold. ".</p>";
                
        echo "
        
                <p><button onclick='goBack()'>Back to search</button>

                <script>
                    function goBack() {
                    window.history.back()
                    }
                    </script></p>";
        
    }

    else {
        
        echo "<p>0 results found.</p>";
        
        echo "
        
                <p><button onclick='goBack()'>Back to search</button>

                <script>
                    function goBack() {
                    window.history.back()
                    }
                    </script></p>";

    }

$conn->close();

?>
    </div>
            </section>
        </body>
</html>