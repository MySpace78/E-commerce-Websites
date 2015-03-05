<?php include_once("functions/functions.php"); ?>

<!DOCTYPE html>

<head>
<link rel="stylesheet" href="styles_business/style_business.css" type="text/css" media="all">
<title>Online E Business</title>
</head>

<body>
<div clas="wrapper"><!-- wrapper start-->
	
    	<div class="header"><!-- header start-->
    		<img  id="logo" src="images/logo.png" height="117" width="300">
    		<img  id="banner" src="images/banner.jpg" width="700" height="117">
    	</div><!-- header end-->

		<div id="menu"><!-- Menu start-->
    			<ul>
                	<li><a href="index.php">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Contact</a></li>
                
                
                <form id="search" action="search.php" method="get">
                <input type="text" name="user_query" placeholder="Enter your search here">
                <input type="submit" name="search" value="Search">
                </form>
                </ul>
    	</div><!-- Menu End-->
    		<div class="content_wrap"><!-- content_wrap start-->
            						
   					 		<div id="content">
                            		<div id="Cart">
                                	<span style="float:right; font-size:18px; color:#F60; line-height:30px; padding-right:25px;">Cart || <b>Total Itme() : 	                                               Total Price() <a href="cart.php">Go To Cart</a></b></span>
                                </div>
                            		
                           			<div id="Product_Area">
                                    
										<?php 
										 
											search();  
											  
										
										?>
                                    
                            			
                            		</div>
    
    						</div><!-- Content End-->
                    
    						<div id="sidebar"><!-- wrapper start-->
                    			<div id="Title">Categories
                        			<ul>
                          			<?php echo Categories(); ?>
                            		</ul>
                            	</div>
                         		<div id="Title">Brands
                        			<ul>
                          			<?php echo Brands(); ?>
                            		</ul>
                        		</div>
                    	
    						</div><!-- sidebar End-->
                    
    	</div><!-- content_wrap End-->
    
    <div class="footer"><!--footer start-->
      <h2 style="text-align:center; font-size:18px">Copyright @ 2015</h2>
    </div><!-- footer End-->
</div><!-- wrapper End-->
</body>
</html>