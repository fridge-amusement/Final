<?php include'head.php' ?>
<?php 	
	if ( !empty($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
	}	
	else {
		header("Location: index.php");
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
						<a href=""><img class="img-responsive" src="images/ad2.jpg" alt="Ad 1"/></a>
					</div>
                    
              </div>
              <div class="col-xs-12 col-md-9">
				<div class="panel panel-primary panel-product">
				<div class="panel-heading">Search Result(s)</div>
							
							<div class="row">
							<?php 
							$pdo = Database::connect();	
						
							if (!isset($_GET['page'])) {
							$page = 1;
							}
							else
							{
								$page = $_REQUEST['page'];
							}
							$n = 4; //number product on a page
							$vitri = ($page - 1) * $n;	
			              	$sql1 = 'select * from attractions where attraction_name like "%'.$keyword.'%"';
			              	if($result = $pdo->query($sql1))
							{
							    //đếm số trang lấy được
							    $recordnumber = $result->rowCount();
							    if ($recordnumber%$n ==0)
							    {
							    	$pagenumber = $recordnumber/$n;
							    }	
							    else{
							    	$pagenumber = floor($recordnumber/$n) + 1;								    		 	
							    }
							    
							}							
							$sql = 'select * from attractions where attraction_name like "%'.$keyword.'%" ORDER BY attraction_ID DESC limit '.$vitri.','.$n;
							if($result1 = $pdo->query($sql))
							{
							    //đếm số trang lấy được
							    $recordnumber = $result1->rowCount();
							    if ($recordnumber ==0)
							    {
							    	echo '<h5>No attraction found with keyword(s) "<span style="color: red">'.$keyword.'</span>"</h5>';
							    }
							}	
							foreach ($pdo ->query($sql) as $row) {
								echo '<div class="col-xs-6 col-md-3 products">';
								echo '<a href="attraction.php?id='.$row['attraction_ID'].'" title="'.$row['attraction_name'].'">';
								echo '<img class="img-responsive product" src="images/attractions/'.$row['image'].'" alt="'.$row['attraction_name'].'"/>';
								echo '</a>';
								echo '<a href="attraction.php?id='.$row['attraction_ID'].'"class="title_product">';
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
								
									echo '<span class="price_product">'.number_format($row['price']).'đ</span>';
									echo '</div>';
									echo '<div id="product_footer">';
								
								echo '<a class="btn btn-success btn-xs add_cart" href="cart.php?id='.$row['attraction_ID'].'" role="button">Add to Cart</a>';
								echo '</div>';
								echo '</div>';
							}
							Database::disconnect();	
						?>

								
					
					</div>
					
				</div>
					
				<?php 
		            	if($page>1){echo '<a class="btn btn-success" href="search.php?keyword='.$keyword.'&&page='.($page-1).'">Previous Page</a>';}
		            	echo '&nbsp;';
						for ($i=1 ; $i<=$pagenumber ; $i++) {
							if ($i == $page) {
							       echo $i;
							       echo '&nbsp;';
							} 
							else {
							      echo '<a class="btn btn-info" href="search.php?keyword='.$keyword.'&&page='.$i.'">'.$i.'</a>';
							      echo '&nbsp;';
							}
						}
						if($page<$pagenumber){echo '<a class="btn btn-success" href="search.php?keyword='.$keyword.'&&page='.($page+1).'"">Next page</a>';}
					?>	
			  </div>
           </div>

        </div>
    </section>
	<?php include'bottom.php' ?>