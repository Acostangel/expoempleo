<!--movergrid start here-->
<div class="flex-slider  wow bounceInLeft" data-wow-delay="0.4s">
	<div class="container">
	<ul id="flexiselDemo4">
				<li>
				    <div class="grid">
						<h3>NULLAM ANISL EGET</h3>
								<div class="mov-bwn">
									<a href="#">07-08-2014</a>
								</div>
								<p>Mauris gravida libero at massa hendrerit eutincidunt massa vestibulum....</p>
						</div>
				</li>
				<li>
				    <div class="grid">
						<h3>NULLAM ANISL EGET</h3>
								<div class="mov-bwn">
									<a href="#">07-08-2014</a>
								</div>
								<p>Mauris gravida libero at massa hendrerit eutincidunt massa vestibulum....</p>
						</div>
				</li>
				<li>
				   <div class="grid">
						<h3>NULLAM ANISL EGET</h3>
								<div class="mov-bwn">
									<a href="#">07-08-2014</a>
								</div>
								<p>Mauris gravida libero at massa hendrerit eutincidunt massa vestibulum....</p>
						</div>
				</li>
	</ul>
	</div>
	<script type="text/javascript">
				 $(window).load(function() {
					$("#flexiselDemo4").flexisel({
						visibleItems: 3,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
				    	responsiveBreakpoints: { 
				    		portrait: { 
				    			changePoint:480,
				    			visibleItems: 1
				    		}, 
				    		landscape: { 
				    			changePoint:640,
				    			visibleItems: 2
				    		},
				    		tablet: { 
				    			changePoint:768,
				    			visibleItems: 3
				    		}
				    	}
				    });
				    
				});
			   </script>
			   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
</div>
<!--movegrid end here-->