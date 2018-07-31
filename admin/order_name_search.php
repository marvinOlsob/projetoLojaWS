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


$sql= "SELECT orderFinal.ordeFinId, orderFinal.ordeFinCus, orderFinal.ordeFinDat, orderFinal.ordeFinDis, orderFinal.ordeFinIte, orderFinal.ordeFinTot, customer.custId, customer.custNam, customer.custAdd FROM orderFinal INNER JOIN customer ON customer.custId = orderFinal.ordeFinCus WHERE customer.custNam LIKE '%$_POST[customer_name]%' ORDER BY customer.custNam ASC";

$result = $conn->query($sql);

$totalOrder = 0;
$totalItems = 0;
$totalSold = 0;

if ($result->num_rows > 0){
                
        echo "
            <p>Orders with customer '$_POST[customer_name]':</p>
        
            <table border='1'>
                <tr>
                    <td>ID</td>
                    <td>Date</td>
                    <td>Customer</td>
                    <td>Address</td>
                    <td>Items</td>
                    <td>Total</td>
                    <td>Dispatched</td>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            
            echo " 
            
                <tr>
                    <td>" . $row["ordeFinId"] . "</td>
                    <td>" . $row["ordeFinDat"] . "</td>
                    <td>" . $row["custNam"] . "</td>
                    <td>" . $row["custAdd"] . "</td>
                    <td>" . $row["ordeFinIte"] . "</td>
                    <td>&pound; " . $row["ordeFinTot"] . "</td>
                    <td>" . $row["ordeFinDis"] . "</td>
                </tr>";
            
            //$totalOrder = $totalOrder + 1;
            //$totalItems = $totalItems + $row["ordeFinIte"];
            //$totalSold = $totalSold + $row["ordeFinTot"];
            
        }
        
        echo "</table><br/>";
    
        //echo "<p>Total number of orders: " .$totalOrder. ".</p>";
        //echo "<p>Total number of items sold: " .$totalItems. ".</p>";
        //echo "<p>Total sold: &pound; " .$totalSold. ".</p>";
                
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