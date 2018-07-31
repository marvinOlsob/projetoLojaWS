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

$sql= "SELECT product.prodNam, product.prodId, product.prodCat, product.prodPho, product.prodSto, product.prodSup, product.prodPri, product.prodDes, category.cateNam, supplier.suppNam FROM product INNER JOIN category ON category.cateId = product.prodCat INNER JOIN supplier ON supplier.suppId = product.prodSup WHERE product.prodSto BETWEEN '$_POST[stock_minimum]' AND '$_POST[stock_maximum]' ORDER BY prodSto DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0){
                
        echo "
            <p>Products with stock between '" . $_POST["stock_minimum"] . "' and '" . $_POST["stock_maximum"] . "':</p>
        
            <table border='1'>
                <tr>
                    <td>Photo</td>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Description</td>
                    <td>Category</td>
                    <td>Supplier</td>
                    <td>Stock</td>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            
            echo " 
            
                <tr>
                    <td><img src='../prod_photo/" . $row["prodPho"] . "' width='35' height='35'/></td>
                    <td>" . $row["prodId"] . "</td>
                    <td>" . $row["prodNam"] . "</td>
                    <td>&pound; " . $row["prodPri"] . "</td>
                    <td>" . $row["prodDes"] . "</td>
                    <td>" . $row["cateNam"] . "</td>
                    <td>" . $row["suppNam"] . "</td>
                    <td>" . $row["prodSto"] . "</td>
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