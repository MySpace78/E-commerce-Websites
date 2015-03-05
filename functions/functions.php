<?php
//This function file hold all functions

//making connection to database
$conn = mysqli_connect("localhost","root","","Ebusiness")or die(mysqli_error());


function Categories(){
	//Categories function is use to bring Categories data from database dynamically
	global $conn;
	$query = mysqli_query($conn,"select * from category"); // to select all record from categoy table
	while($row = mysqli_fetch_array($query)){
	$id = $row['cat_id'];
	$title = $row['cat_title'];
	echo "<li><a href='index.php?cat_id=$id'>$title</a></li>";
		
	}
	}
	
	
// Function use to Product by categories
function Category_By_Product()
			{
			global $conn;	
				
			if(isset($_GET['cat_id'])){
				$cat_id = $_GET['cat_id'];
			
				$query = "select * from products where id='$cat_id'";
			  	$result = mysqli_query($conn, $query);
			  
			 	$count_category = mysqli_num_rows($result);
				if($count_category ===0){
			 	echo "<p> There is no product found under this category";
				}
				else{
							 
			  while($row = mysqli_fetch_array($result)){
				  $id = $row['id'];
				  $category = $row['category'];
				  $title = $row['title'];
				  $price = $row['price'];
				  $image = $row['image'];
				  
				  echo "	

						   <div id='Product_Ind'>
							  <h2>$title</h2>
						   <img src='Admin/images/$image' width='210' height='170' />
						   <p><b>Price: $ $price</b></p>
						   <p><a href='details.php?id=$id' style='float:left'>Details</a></p>
						   <a href='index.php?cat_id=$id'><button style='float:right'>Add to Cart</button></a>
						  </div>
						  ";
				  
				}
			}
			
			}
		}



function Brands(){
	//Brands function is use to bring Brands data from database dynamically
	global $conn;
	$query = mysqli_query($conn,"select * from brand"); // to select all record from categoy table
	while($row = mysqli_fetch_array($query)){
	$id = $row['brand_id'];
	$title = $row['brand_title'];
	echo "<li><a href='index.php?brand_id=$id'>$title</a></li>";
		
		}
	} 
	
	
//Function use to bring product by brands using database
function Brand_By_Product()
			{
			global $conn;	
				
			if(isset($_GET['brand_id'])){
				$brand_id = $_GET['brand_id'];
			
				$query = "select * from products where id='$brand_id'";
			  	$result = mysqli_query($conn, $query);
			  
			 	$count_category = mysqli_num_rows($result);
				if($count_category ===0){
			 	echo "<p> There is no product found under this category";
				}
				else{
							 
			  while($row = mysqli_fetch_array($result)){
				  $id = $row['id'];
				  $category = $row['category'];
				  $title = $row['title'];
				  $price = $row['price'];
				  $image = $row['image'];
				  
				  echo "	

						   <div id='Product_Ind'>
							  <h2>$title</h2>
						   <img src='Admin/images/$image' width='210' height='170' />
						   <p><b>Price: $ $price</b></p>
						   <p><a href='details.php?id=$id' style='float:left'>Details</a></p>
						   <a href='index.php?brand_id=$id'><button style='float:right'>Add to Cart</button></a>
						  </div>
						  ";
				  
				}
			}
			
			}
		}


//To bring all products from database to show on pages
function Products(){
	global $conn;
	$query =" SELECT * FROM products ORDER BY title LIMIT 0,5";
	$result =mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$category = $row['category'];
			$title = $row['title'];
			$price = $row['price'];
			$image = $row['image'];
			
		echo "	
		
		 <div id='Product_Ind'>
			<h2>$title</h2>
		 <img src='Admin/images/$image' width='210' height='170' />
		 <p><b>Price: $ $price</b></p>
		 <p><a href='details.php?id=$id' style='float:left'>Details</a></p>
		 <a href='index.php?cart_id=$id'><button style='float:right'>Add to Cart</button></a>
		</div>
		";
		}
}


//Seaching function to search different products
function search(){
	global $conn;
	if(isset($_GET['search'])){
	$search = $_GET['user_query'];	
		
	$query =" SELECT * FROM products where keywords like '%$search%'";
	$result =mysqli_query($conn,$query);
	$seach_count = mysqli_num_rows($result);
	
	if($seach_count ==0){
		echo " No search result found! Try again? ";
		
		}else
		
		{
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$category = $row['category'];
			$title = $row['title'];
			$price = $row['price'];
			$image = $row['image'];
			
		echo "	
		
		 <div id='Product_Ind'>
			<h2>$title</h2>
		 <img src='Admin/images/$image' width='210' height='170' />
		 <p><b>Price: $ $price</b></p>
		 <p><a href='details.php?id=$id' style='float:left'>Details</a></p>
		 <a href='index.php?cart_id=$id'><button style='float:right'>Add to Cart</button></a>
		</div>
		";
		}
}

}
}


//Detailed about prodcuts function

function Product_detail($id){
	global $conn;
	$query =" SELECT * FROM products where id='$id'";
	$result =mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$category = $row['category'];
			$title = $row['title'];
			$price = $row['price'];
			$image = $row['image'];
			$description= $row['description'];
			
		echo "	
		
		 <div id='Product_Ind'>
			<h2>$title</h2>
		 <img src='Admin/images/$image' width='700' height=450' />
		 <p><b>Price:$ $price</b></p>
		 <p>$description</p>
		 <p><a href='index.php?id=$id' style='float:left'>Go Back</a></p>
		 <a href='index.php?cart_id=$id'><button style='float:right'>Add to Cart</button></a>
		</div>
		";
		}
}




//to get ip address of user to display different products ordered by specific customers
	function get_ip() {



		//Just get the headers if we can or else use the SERVER global

		if ( function_exists( 'apache_request_headers' ) ) {



			$headers = apache_request_headers();



		} else {



			$headers = $_SERVER;



		}



		//Get the forwarded IP if it exists

		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {



			$the_ip = $headers['X-Forwarded-For'];



		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )

		) {



			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];



		} else {

			

			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );



		}

		return $the_ip;

}



//insert into cart by user
function Insert_Cart(){
				
				global $conn;
				$user_ip = get_ip();
				 
				if(isset($_GET['cart_id'])){
				$cart_id =$_GET['cart_id'];	
				
				$query = "select * from cart where p_id = '$cart_id' AND user_ip='$user_ip'";
				$record = mysqli_query($conn, $query);
				$count = mysqli_num_rows($record);
				if($count>0){
					echo "<script>window.open('index.php','_self')</script>";
					
				}else{
				$insert = "insert into cart(p_id, user_ip) values('$cart_id','$user_ip')";
				if(mysqli_query($conn, $insert))
				echo "<script>window.open('index.php','_self')</script>";
				
				
				}
				}
	
	}
	

//getting item using ip of user
	
function getItem(){
		global $conn;
		$ip = get_ip();
		if(isset($_GET['cart_id'])){
		$query = "select * from cart where user_ip= '$ip'";
		$record = mysqli_query($conn, $query);
		$total_item = mysqli_num_rows($record);
			
		}else
		
		{
			
		$query = "select * from cart where user_ip= '$ip'";
		$record = mysqli_query($conn, $query);
		$total_item = mysqli_num_rows($record);
			
			
			}
			
	
	echo $total_item;
	
	
	}
	
	
// getting pricce of all products	
function Price_totle(){
	global $conn;
	$totale =0;
	$ip = get_ip();
		
		$query = "select * from cart where user_ip='$ip'";
		$price = mysqli_query($conn, $query);
		
		while($single_price= mysqli_fetch_array($price)){
			$p_id = $single_price['p_id'];
			
			$p_query = "select * from products where id = '$p_id'";
			
			$p_record =mysqli_query($conn, $p_query);
			
			while($price_index = mysqli_fetch_array($p_record)){
				
				 $pro_price =array($price_index['price']);
				
				$sum = array_sum($pro_price);
				
				 $totale +=$sum; 
				
				}
			
			
			}
		echo $totale;
		
		
		}
	
	
	
	
//how to display item in cart
	
function Display_Cart(){ 



?>
	  <form action="cart.php" method="post" enctype="multipart/form-data">
       <table style="width:790px; height:540px; border:1px solid #999">
       <tr>
        <th>Remove</th>
        <th>Product(S)</th>
        <th>Quantity</th>
        <th>Price</th>
       </tr>
        
	
	
	
	<?php 
	global $conn;
	$totale =0;
	$ip = get_ip();
		
		$query = "select * from cart where user_ip='$ip'";
		$price = mysqli_query($conn, $query);
		
		while($single_price= mysqli_fetch_array($price)){
			$p_id = $single_price['p_id'];
			
			$p_query = "select * from products where id = '$p_id'";
			
			$p_record =mysqli_query($conn, $p_query);
			
			while($price_index = mysqli_fetch_array($p_record)){
				
				 $pro_price =array_sum(array($price_index['price']));
				 $pro_title = $price_index['title'];
				 $pro_image = $price_index['image'];
				 $pro_price = $price_index['price'];
				 //$sum =array_sum($pro_price);
				
				 $totale +=$pro_price; 
				
			
			?>    
       <tr>
       <td><br /><input type="checkbox" name="remove" /></td>
       <td><?php echo $pro_title; ?> <br />
       <img src="images/<?php echo $pro_image; ?>"  width="90" height="50"/>
       </td>
       <td><br /><input type="text" name="quantity" size="4" /> </td>
       <td><br /><?php echo $pro_price; ?></td>
       </tr>
                  
       <?php }}   ?>
       
      <tr><td colspan="4" align="right" style="padding-right:60px; ">Total Price: $<?php echo $totale; ?> </td></tr>
        </table>
        </form>     
         
        <?php    } ?> 

	
	
 