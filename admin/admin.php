<link href="../css/index.css" rel="stylesheet" type="text/css"/>
<script src="../script/image_preview.js" type="text/javascript"></script>
<?php

include '../config_db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
        
    die("Oops! Could not connect: " . $conn->connect_error);
        
}

if (isset($_GET['search'])) {
 
    $prodId = $_GET['search'];
    
    $sql= "SELECT prodPho, prodNam FROM product WHERE prodId = $prodId ";

$result = $conn->query($sql);
    
    if ($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()) {
            echo '<section>';
            echo "<div id='top' style='overflow:hidden;display: inline-flex;'>";
            echo '<div id="wrapSearchResult">';
            echo "<div style='float:left;margin: auto 5px;'><img src='../prod_photo/" . $row["prodPho"] . "' width='50' height='50'/></div>";
            echo "<div style='float:left;margin-top: 15px;'>" . $row["prodNam"] . "</div>";
            echo "</div>";
            echo "</div>";
            
        }
    
}
    
        echo '
            <div id="wrapper">
                <div id="left">
                    <form action="index.php?opt=22" enctype="multipart/form-data" method="post">
                        
                        <div id="title">
                            <p>Name:<br/><input name="prodNam" type="text"/></p>
                        </div>
                        <div id="facebook">
                            <p>Price:<br/><input name="prodPri" type="text"/></p>
                        </div>
                        <div id="flickr">
                            <p>Stock:<br/><input name="prodSto" type="text"/></p>
                        </div>
                        <div id="googleplus">
                            <p>Description:<br/><textarea name="prodDes" rows="5"></textarea></p>
                        </div>
                        <div id="pinterest">
                            <p>'; 
    
    include_once "list_category.php";
    
    echo '</p>
                        </div>
                        <div id="twitter">
                            <p>'; 
    
    include_once "list_supplier.php";
    
    echo '</p>
                        </div>
                </div>
                <div id="right">
                    <div id="logo">
                        <p>Photo:<br/><input id="prodPho" name="prodPho" onchange="loadPhoto(event)" type="file"/></p>
                    </div>
                    <div id="conditions">
                        <p>* The photo must be in jpeg, jpg or png format.</p>
                        <p>* The photo can not have more than 3 Mb in size.</p>
                        <p>* The resolution of the photo should be 1:1.</p>
                    </div>
                    <div id="logoPreview">
                        <p></p>
                        <img id="preview" width="195" height="195"/>
                    </div>
                    <div id="title">
                        <input name="prodId" type="text" value=" '.$prodId.'" hidden/>
                        </div>
                </div>
                <div class="clear"></div>
                <div id="bottom">
                    <div id="next_btn">
                        <input id="submit" type="submit" value="Next"/>
                    </form>
                    </div>
                </div>
            </div>
            <div id="copyright">
                <p>Copyright &copy; 2014 - 2015 ezCart</p>
            </div>
        </section>';
}


else {

if (! isset($_GET['opt'])) {
        
    include_once 'home.php';
        
}

else {
    
    $opt = $_GET['opt'];
    
    switch ($opt) {
        
        case 1:
        
        include_once 'add_prod.html';

        break;
        
        case 2:
        
        include_once 'edit_prod.html';

        break;
        
        case 3:
        
        include_once 'add_cat.html';
        
        break;
        
        case 4:
        
        include_once 'add_supp.html';
        
        break;
        
        case 5:
        
        include_once 'orders.html';

        break;
        
        case 6:
        
        include_once 'statistics.html';
        
        break;
        
        case 7:
        
        include_once 'settings.html';

        break;
        
        case 8:
        
        include_once 'statistics.php';

        break;
        
        case 9:
        
        include_once 'order_date_search.php';

        break;
        
        case 10:
        
        include_once 'order_id_search.php';

        break;
        
        case 11:
        
        include_once 'order_name_search.php';

        break;
        
        case 12:
        
        include_once 'order_address_search.php';

        break;
        
        case 13:
        
        include_once 'database.html';

        break;
        
        case 14:
        
        include_once 'create_db.php';

        break;
        
        case 15:
        
        include_once 'insert_data.php';

        break;
        
        case 16:
        
        include_once 'delete_db.php';

        break;
        
        case 17:
        
        include_once 'add_prod.php';

        break;
        
        case 18:
        
        include_once 'add_cat.php';

        break;
        
        case 19:
        
        include_once 'add_supp.php';

        break;
        
        case 20:
        
        include_once 'home.php';

        break;
        
        case 21:
        
        include_once 'settings.php';

        break;
        
        case 22:
        
        include_once 'edit_prod.php';

        break;
        
        case 23:
        
        include_once 'stock.html';

        break;
        
        case 24:
        
        include_once 'stock_id_search.php';

        break;
        
        case 25:
        
        include_once 'stock_name_search.php';

        break;
        
        case 26:
        
        include_once 'stock_category_search.php';

        break;
        
        case 27:
        
        include_once 'stock_number_search.php';

        break;
        
        case 28:
        
        include_once 'stock_supplier_search.php';

        break;
        
    }
    
}
    
}

?>
        
        