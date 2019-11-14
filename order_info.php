
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
					<div class="panel-heading">ORDER INFORMATION</div>
					<div class="row product_detail">
						<div class="col-xs-12 col-md-12">
							(*) is required.
						</div>
					</div>

					<div class="row">
	    			<form class="form-horizontal" role="form" action="attraction_add.php" enctype="multipart/form-data" method="post">						 
						  
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Full name (*)</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="product" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Customer ID (*)</label>
						    <div class="col-sm-10">
						      	<input type="number" class="form-control" name="ID" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Email (*)</label>
						    <div class="col-sm-10">
						      	<input type="Email" class="form-control" name="address" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Address (*)</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="address" id="inputEmail3">
						      	
						    </div>
						  </div>

						   <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Phone number</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="phone" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="row product_detail">
							<div class="col-xs-12 col-md-12">
							PAYMENT
							</div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Card Number (*)</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="phone" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Cardholder's Name (*)</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="phone" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Expiration Date (*)</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="phone" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Security Code (*)</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="phone" id="inputEmail3">
						      	
						    </div>
						  </div>

						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" class="btn btn-success">Place Order</button>
				  				<a class="btn" href="index.php">Go Back</a>
						    </div>
						  </div>
						  
					</form>
	    		</div>

				</div>
					
			  </div>
           </div>

        </div>
    </section>
	<?php include'bottom.php' ?>