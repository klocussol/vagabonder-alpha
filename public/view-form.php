<head>
	<title>Vagabonder</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/styles.css" />
</head>

<?php renderNav(); ?>

<div class="main-content row">
	<h1>Wanna vagabond?</h1>
	<div class="large-12 columns">
		<form class="custom" name="vagabonder-form" action="/" method="post">
			<div class="large-4">
		    	<label for="destination">Destination:</label>
		    	<input name="destination" id="destination" type="text" placeholder="Anywhere">
		    </div>

		    <br />

			<div class="large-1 left">
		    	<label for="start-date">Leaving: </label>
		    	<input id="start-date" name="start-date" type="date" placeholder="Start">
			</div>

			<div class="large-1 left" id="end-date-input">
		    	<label for="end-date">Returning: </label>
		    	<input id="end-date" name="end-date" type="date" placeholder="End">
			</div>
			<input type="submit" id="submit">Submit</input>
		</form>
	</div>
</div>