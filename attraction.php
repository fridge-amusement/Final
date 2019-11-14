<?php include'head.php' ?>
<?php 
	//require 'admin/database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id || !(is_numeric($id))) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select attractions.* from attractions where attraction_ID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>
    
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
				<div class="panel panel-primary panel-product">
					<div class="panel-heading">Attraction Information</div>
					<div class="row product_detail">
						<div class="col-xs-12 col-md-4">

							<img src="images/attractions/ticket.png" class="img-responsive image_detail"  height="450px" width="250px" alt="">
						</div>
						<div class="col-xs-12 col-md-8">
						<ul class="information">						
							<li><h1 class="title"><?php echo $data['attraction_name'];?></h1></li>
							<li>Hours:<span class="name"> <?php echo $data['hours'];?></span></li>
							<li>Location:<span class="name"> <?php echo $data['location'];?></span></li>
							<?php 
								
									echo '<li>Price: $<span class="name price"> '.number_format($data['price']).'</span></li>';	
								
							 ?>							
							<li>Attraction Information: <span class="description">
								<?php 
									if($data['info']!=null) {
										echo $data['info'];
									}
									else{
										echo "Updating";
									}
									?>
								</span></li>
							<li><a href="cart.php?id=<?php echo $data['attraction_ID'];?>" class="btn btn-success">Add to Cart</a></li>							
						</ul>
						</div>
								
					
					</div>
				</div>
					<div class="panel panel-primary panel-product">
						<div class="panel-heading" style="margin-top: 75px">Other Attractions</div>
						<div class="row">
						
							<ul class="nav nav-pills nav-stacked">
								<?php 				
										$pdo = Database::connect();			
										$sql = 'select * from attractions ORDER BY attraction_ID DESC LIMIT 4';
										foreach ($pdo ->query($sql) as $row) {
											echo '<div class="col-xs-6 col-md-3 products">';
											echo '<a href="#" title="'.$row['attraction_name'].'">';
											echo '<img class="img-responsive product" src="images/attractions/'.$row['image'].'" alt="'.$row['attraction_name'].'"/>';
											echo '</a>';
											echo '<a href="#"class="title_product">';
											if (strlen($row['attraction_name'])<30)
											{
												echo $row['attraction_name'];
											}
											else
											{
												echo substr($row['attraction_name'], 0, 30).'...';
											}
											
											echo '</a>	<br/>';
											echo '<div id="price">';
											
												echo '$<span class="price_product">'.number_format($row['price']).'</span>';
												echo '</div>';
												echo '<div id="product_footer">';
											
											echo '<a class="btn btn-success btn-xs add_cart" href="#" role="button">Add to Cart</a>';
											echo '</div>';
											echo '</div>';
										}
								?>
							</ul>
						</div>
					</div>
					
			  </div>
           </div>

        </div>
    </section>
	<?php include'bottom.php' ?>