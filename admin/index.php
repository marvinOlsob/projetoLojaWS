<!doctype html>
<html>
    <head>
        <title>ezCart - Admin</title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav>
            <div id="cssmenu">
                <ul>
                    <li id="home"><a href="index.php?opt=20"><i class="fa fa-home"></i></a></li>
                    <li><a href="index.php?opt=1">Add Product</a></li>
                    <li><a href="index.php?opt=2">Edit Product</a></li>
                    <li><a href="index.php?opt=3">Add Category</a></li>
                    <li><a href="index.php?opt=4">Add Supplier</a></li>
                    <li><a href="index.php?opt=5">Orders</a></li>
                    <li><a href="index.php?opt=6">Statistics</a></li>
                    <li><a href="index.php?opt=23">Stock</a></li>
                    <li><a href="index.php?opt=7">Settings</a></li>
                    <li id="store"><a href="../store/index.php" target="_blank">Store</a></li>
                </ul>
            </div>
        </nav>
        <div id="secAdmin">
            <?php include_once 'admin.php'; ?>
        </div>
        <footer>
        </footer>
    </body>
</html>