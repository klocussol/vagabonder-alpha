<head>
	<title>Vagabonder</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/styles.css" />
</head>

<?php renderNav(); ?>

<div id="find-traveler" class="main-content">
	<div class="row">
		<div class="large-12 columns panel">
			<h1>Going somewhere?</h1>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<div class="section-container vertical-tabs" data-section="vertical-tabs">
				  <section>
				    <div class="title" data-section-title><a href="#"><h3>C</h3><img src="img/compass-nav.png" /><h3>LLECT</h3></a></div>
				    <div class="content" data-section-content>
				      <h4>Give us a couple hints, and we'll help you find the best travel partners.</h4>
				        
				        <form class="custom" action="/" method="post">
						  <fieldset>
						    <legend>THE BASICS</legend>

						    <div class="large-4">
						    	<label for="destination">Destination</label>
						    	<input name="destination" id="destination" type="text" placeholder="Anywhere">
						    </div>

							<div class="large-2 left">
						    	<label for="start-date">Leaving: </label>
						    	<input name="start-date" id="start-date" type="date" placeholder="Start">
							</div>

							<div class="large-2 left">
						    	<label for="end-date">Returning: </label>
						    	<input name="end-date" id="end-date" type="date" placeholder="End">
							</div>

							<div class="left" id="num-of-travelers">
								<p>Currently traveling:</p>
								<label for="radio1">
								    <input name="radio1" type="radio" id="radio1" style="display:none;">
								    <span class="custom radio"></span> alone
								</label>
								<label for="radio2">
								    <input name="radio2" type="radio" id="radio2" style="display:none;">
								    <span class="custom radio"></span> with one other person
								</label>
								<label for="radio3">
								    <input name="radio3" type="radio" id="radio3" style="display:none;">
								    <span class="custom radio"></span> with a group of other people
								</label>
							</div>
							
							<div class="left" id="num-of-travelers-wanted">
								<p>Looking to travel with:</p>
								<label for="radio1">
								    <input name="radio1" type="radio" id="radio1" style="display:none;">
								    <span class="custom radio"></span> one other person
								</label>
								<label for="radio2">
								    <input name="radio2" type="radio" id="radio2" style="display:none;">
								    <span class="custom radio"></span> a couple
								</label>
								<label for="radio3">
								    <input name="radio3" type="radio" id="radio3" style="display:none;">
								    <span class="custom radio"></span> a group of other people
								</label>
							</div>

							<div class="left" id="age-range">
								<p>Age-range</p>
								<div class="left">
									<label for="radio1">
									    <input name="radio1" type="radio" id="radio1" style="display:none;">
									    <span class="custom radio"></span> 20s
									</label>
									<label for="radio2">
									    <input name="radio2" type="radio" id="radio2" style="display:none;">
									    <span class="custom radio"></span> 30s
									</label>
									<label for="radio3">
									    <input name="radio3" type="radio" id="radio3" style="display:none;">
									    <span class="custom radio"></span> 40s
									</label>
								</div>
								<div class="left">
									<label for="radio4">
									    <input name="radio4" type="radio" id="radio4" style="display:none;">
									    <span class="custom radio"></span> 50s
									</label>
									<label for="radio5">
									    <input name="radio5" type="radio" id="radio5" style="display:none;">
									    <span class="custom radio"></span> 60s
									</label>
									<label for="radio6">
									    <input name="radio6" type="radio" id="radio6" style="display:none;">
									    <span class="custom radio"></span> 70+
									</label>
								</div>
							</div>
						  </fieldset>
						  <input id="submit" name="submit" type="submit" class="button radius"></input>
						</form>
				    </div>
				  </section>
				  <section>
				    <div class="title" data-section-title><a href="#"><h3>C</h3><img src="img/compass-nav.png" /><h3>NNECT</h3></a></div>
				    <div class="content" data-section-content>
				      <p>Content of section 2.</p>
				    </div>
				  </section>
				  <section>
				    <div class="title" data-section-title><a href="#"><h3>C</h3><img src="img/compass-nav.png" /><h3>ORDINATE</h3></a></div>
				    <div class="content" data-section-content>
				      <p>Content of section 3.</p>
				    </div>
				  </section>
				</div>
			</div>
		</div>
	</div>
</div>

<?php renderScript(); ?>
