<?php
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';

require_once '../model/products-model.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dashboard/acme/css/normalize.css">
    <link rel="stylesheet" href="/dashboard/acme/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
    <title> New Product | Acme Inc.</title>
</head>

<body>
    <div class="content">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/modules/header.php'; ?>
        </header>

        <nav id="navigation" class="">
            <?php echo $navList; ?>
        </nav>

        <main id="main">
            <h1>You are in the product page!</h1> 
            <form method="POST" class="products" action="../products/">
                <fieldset>
                    <label> Category </label><br/>
                    <?PHP     
                        echo $catList;               
                    ?><br>
            
                    <label for="invName">Product Name</label> <br/>
                    <input type="text" name="invName" id="invName" <?php 
                    if(isset($invName)){
                        echo "value='$invName'";
                    }
                    ?> required > <br/>
                    <label for="invDescription">Product Description</label> <br/>
                    <textarea name="invDescription" id="invDescription" title="Description" maxlength="50" required><?php 
                    if(isset($invDescription)){
                        echo "value='$invDescription'";
                    }
                    ?> </textarea><br/>
                    <label for="invImage">Product Image(path to image)</label> <br/>
                    <input type="text" name="invImage" id="invImage" title="Image" <?php 
                    if(isset($invImage)){
                        echo "value='$invImage'";
                    }
                    ?> required> <br/>
                    <label for="invThumbnail">Product Thumbnail(path to thumbnail</label> <br/>
                    <input type="text" name="invThumbnail" id="invThumbnail" title="Thumbnail" <?php 
                    if(isset($invThumbnail)){
                        echo "value='$invThumbnail'";
                    }
                    ?> required><br/>
                    <label for="invPrice">Product Price</label> <br/>
                    <input name="invPrice" id="invPrice" title="Product Price" placeholder="Price $" type="number" min="0" step="0.01" <?php 
                    if(isset($invPrice)){
                        echo "value='$invPrice'";
                    }
                    ?> required ><br/>
                    <label for="invStock"># In Stock</label> <br/>
                    <input name="invStock" id="invStock" title="Amount in Stock" placeholder="Inventory" type="number" <?php 
                    if(isset($invStock)){
                        echo "value='$invStock'";
                    }
                    ?> required><br/>
                    <label for="invSize">Shipping Size(W x H x L in inches</label> <br/>
                    <input name="invSize" id="invSize" title="Shipping Size"  type="number" min="0"  <?php 
                    if(isset($invSize)){
                        echo "value='$invSize'";
                    }
                    ?> required> <br/>
                    <label for="invWeight">Weight(lbs)</label> <br/>
                    <input name="invWeight" id="invWeight" title="Weight" placeholder="Lbs" type="number" min="0"  step="0.01"  <?php 
                    if(isset($invWeight)){
                        echo "value='$invWeight'";
                    }
                    ?> required><br/>
                    <label for="invLocation">Location(city name)</label> <br/>
                    <input name="invLocation" id="invLocation" type="text" <?php 
                    if(isset($invLocation)){
                        echo "value='$invLocation'";
                    }
                    ?> required> <br/>
                    <label for="invVendor">Vendor Name</label> <br/>
                    <input name="invVendor" id="invVendor" title="Vendor Name"  type="text" <?php 
                    if(isset($invVendor)){
                        echo "value='$invVendor'";
                    }
                    ?> required > <br/>
                    <label for="invStyle">Primary Material</label> <br/>
                    <input name="invStyle" id="invStyle" type="text" <?php 
                    if(isset($invStyle)){
                        echo "value='$invStyle'";
                    }
                    ?> required > <br/>
                    <input type="submit" name="submit" value="Submit" class="log"/>       
                    <input type="hidden" name="action" value="prod">
                </fieldset>
            </form>    
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
</body>

</html>