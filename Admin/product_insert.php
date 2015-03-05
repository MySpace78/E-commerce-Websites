<?php include_once("functions/functions.php"); ?>
<!DOCTYPE>

<head>

<title>Insert Products in your Admin Area</title>
<head>
<!-- CDN hosted by Cachefly -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>

<body>

<form action="product_insert.php" method="post" enctype="multipart/form-data">
	<table align="center" width="800" bgcolor="#CCCCCC" >
    	<tr align="center"><td colspan="8"><h3>Add New Products</h3></td></tr>
        <tr >
        <td align="center">Product Title</td>
        <td><input type="text" name="product_title" style="width:200px; height:25px" required/></td>
        </tr>
        <tr>
        <td align="center">Product Category</td>
        <td>
        		<select name="product_category" required>
                <option>Select Category</option>
                <?php Categories(); ?>
                
                </select>
        
        </td>
        </tr>
        <tr>
        <td align="center">Product Brand</td>
        		<td>
        		<select name="product_brand" required>
                <option>Select Category</option>
                <?php Brands(); ?>
                
                </select>
                </td>
        </tr>
        <tr>
        <td align="center">Product Keyword</td>
        <td><input type="text" name="product_keyword" style="width:200px; height:25px" required/></td>
        </tr>
        <tr>
        <td align="center">Product Price</td>
        <td><input type="text" name="product_price"style="width:200px; height:25px" required/></td>
        </tr>
        <tr>
        <td align="center">Product Image</td>
        <td><input type="file" name="product_image" style="width:200px; height:25px" required/></td>
        </tr>
        <tr>
        <td align="center">Product Description</td>
        <td>
        <textarea name="product_description" cols="20" rows="15">
        </textarea>
        
        </td>
        </tr>
        <tr>
        
        <td colspan="8" align="center"><input type="submit" name="submit" value="Add Item Now" /></td>
        </tr>
    
    </table>
</form>

</body>
</html>
<?php
if(isset($_POST['submit'])){
	$product_title = $_POST['product_title'];
	$product_category = $_POST['product_category'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_keyword = $_POST['product_keyword'];
	$product_description = $_POST['product_description'];
	
	//image uploaded
	$product_image = $_FILES['product_image']['name'];
	$temp_image = $_FILES['product_image']['tmp_name'];
	move_uploaded_file($temp_image,"images/$product_image");
	
	$query = "insert into products(category,brand,title,price,image, description,keywords)values
	('$product_category','$product_brand','$product_title','$product_price','$product_image','$product_description','$product_keyword')";
	
	if(mysqli_query($conn,$query)){
		echo "<script>alert('Item has been successfully added in database')</script>";
		echo "<script>window.open('product_insert.php','_self')</script>";
		
		}
	
	
	}


?>