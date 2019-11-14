<?php include'head.php' ?>
    <section>
        <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>
                
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img class="img-responsive" src="images/slides/slide1.jpg"  alt="slide1"/>
                      <div class="carousel-caption">
                       
                      </div>
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="images/slides/slide2.jpg" alt="slide2"/>
                      <div class="carousel-caption">
                       
                      </div>
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="images/slides/slide3.jpg" alt="slide3"/>
                      <div class="carousel-caption">
                        
                      </div>
                    </div>
                  </div>
                
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
        </div>
    </section>
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
					
              </div>
              <div class="col-xs-12 col-md-9">
				<div class="panel panel-primary panel-product">
					<div class="panel-heading">Offers & Benefits</div>
					<div class="row">
						<img style="margin-top:10px; margin-left: 15px; height: 300px; width: 850px" class="img-responsive" src="images/offer1.jpg" alt="Ad 1"/>
						<img style="margin-top:10px; margin-left: 15px; height: 300px; width: 850px" class="img-responsive" src="images/offer2.png" alt="Ad 1"/>
					
					</div>
				</div>
					<div class="panel panel-primary panel-product">
						<div class="panel-heading">Experiences</div>
						<div class="row">							
								<img style="margin-top:10px; margin-left: 15px; height: 380px; width: 850px" class="img-responsive" src="images/ad.png" alt="Ad 1"/>				
						</div>
					</div>
					
			  </div>
           </div>

        </div>
    </section>
	<?php include'bottom.php' ?>