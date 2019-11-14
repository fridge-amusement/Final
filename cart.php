<?php 	
	// Add to cart
	session_start();
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
			$count = count($_SESSION['cart']);
			$flag = false;
			for ($i = 0; $i < $count; $i++){
				if($_SESSION['cart'][$i]['id']==$id){
					$_SESSION['cart'][$i]['number']+=1;
					$flag = true;
					break;
				}
			}
			if($flag == false){
				$_SESSION['cart'][$count]['id'] = $id;
				$_SESSION['cart'][$count]['number'] = 1;
			}
		}
		else
		{
			$_SESSION['cart'] = array();
			$_SESSION['cart'][0]['id'] = $id;
			$_SESSION['cart'][0]['number'] = 1;

		}
	}
	// Delete cart
	if(isset($_GET['del'])){
		$del = $_GET['del'];
		if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){			
			for ($i = 0; $i < count($_SESSION['cart']); $i++){
				if($_SESSION['cart'][$i]['id']==$del){
					unset($_SESSION['cart'][$i]);				
					break;
				}
			}			
		}
	
	}
	// Update cart
	if(isset($_POST['submit']))
	{
	 foreach($_POST['qty'] as $key=>$value)
	 {

	  if(($value == 0) and (is_numeric($value)))
	  {
	   unset ($_SESSION['cart'][$key]);
	  }
	  elseif(($value > 0) and (is_numeric($value)))
	  {
	   $_SESSION['cart'][$key]['number']=$value;
	  }
	 }
	 header("location:cart.php");
	}
	
?> 
<?php include'head.php' ?>   
    <section>
        <div class="container">
           <div class="row">
              <div class="col-xs-12 col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading">Attractions</div>
						<ul class="nav nav-pills nav-stacked">
							<?php 
							include 'menu_left.php';
							
						 ?>	
						</ul>
					</div>
					<div class="promotion">
						<a href=""><img class="img-responsive" src="images/ad1.jpg" alt="Ad 1"/></a>
						<a href=""><img style="margin-top: 35px" class="img-responsive" src="images/ad2.png" alt="Ad 2"/></a>
					</div>
                    
              </div>
              <div class="col-xs-12 col-md-9">
				<div class="panel panel-primary panel-product ">
					<div class="panel-heading">Your Cart</div>
					<div class="row product_detail">
						<div class="col-xs-12 col-md-12">
							<h5 style="float:left">You have 
							<?php 
							$sosanpham = 0;		              
		                	if(isset($_SESSION['cart']))
		                		{
		                			$sosanpham = count($_SESSION['cart']);
		                			echo $sosanpham;		                			
		                		}
		                	else 
		                		{
		                			echo '0';
		                		} 
		                	?> Item(s) in cart</h5>
		                	<form action="cart.php" method="post">
		                		<?php 
								if ($sosanpham!=0) {
																
							 	?>
								<table class="table table-striped table-bordered">
					              <thead>
					                <tr>
					                  <th>Image</th>
					                  <th>Product Name</th>
					                  <th>Price</th>
					                  <th>Amount</th>
					                  <th>Total</th>			                 
					                </tr>
					              </thead>
					              <tbody>
					              <?php
					              	//require 'admin/database.php';
					              	$pdo = Database::connect();	
					              	$total = 0;
					              	for ($i = 0; $i < count($_SESSION['cart']); $i++){					            
							              	$sql = 'select * from attractions where attraction_ID ='.$_SESSION['cart'][$i]['id'];
							              	foreach ($pdo->query($sql) as $row){
							              		echo '<tr class="warning">';
							              			echo  '<td>';
							              			echo '<img src="images/attractions/'.$row['image'].'" class="img-responsive image_product"  alt="image product">';
							              			echo '</td>';		              			
							              			echo '<td>'.$row['attraction_name'];
							              			echo '<br>';
							              			echo '<a class="btn" href="cart.php?del='.$row["attraction_ID"].'">Delete</a>';
							              			echo '</td>';		              			
							              			echo '<td style="text-align: right;">'.number_format($row['price']).'</td>';		              					              	
							              			echo '<td width="100px">';
							              			echo '<input type="text" name="qty['.$i.']" class="form-control" value="'.$_SESSION['cart'][$i]['number'].'">';
							              			echo '</td>';	
							              			echo '<td>$';
							              			$money = $row['price']*$_SESSION['cart'][$i]['number'];
							              			$total +=$money;
							              			echo number_format($money);
							              			echo '</td>';		              			
							              		echo '</tr>';
							              	}
							            
					              	}
					              	Database::disconnect();	
					               ?>
					              </tbody>
				            </table>
						</div>						
						<div class="col-xs-12 col-md-12">
							<input type='submit' class="btn btn-success btn_left" name='submit' value='Update Cart' />							
							<div class="info_right">
								Total: $<span class="price info_right"><?php echo number_format($total); ?></span><br>
							</div>
						</div>						
						</form>
						<div class="col-xs-12 col-md-12">
							<a href="index.php" class="btn btn-lg btn-warning btn_left">Continue Shopping</a>							
							<div class="info_right">
								<a href="order_info.php" class="btn btn-lg btn-warning">Checkout</a>
							</div>
							<?php } ?>
						</div>
						<?php 
							if ($sosanpham==0) {
								echo '<a href="index.php" class="btn btn-lg btn-warning btn_left">Go Back to Homepage</a>';
							}
															
						 	?>
					</div>
				</div>
					
			  </div>
           </div>

        </div>
    </section>
	<?php include'bottom.php' ?>