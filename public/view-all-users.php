<head>
	<title>Vagabonder</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/styles.css" />
</head>

<div class="row">
	<div class="large-12 columns">
		<?php
		echo "<h1>All users</h1>";
		?>
		<ul>
			<?php foreach($users as $user) {
				echo "<li>".$user->getName()."</li>";
				echo "<ul><li>".$user->getGender()."</li>";
				echo "<li>".$user->getAge(new DateTime("now", new DateTimeZone('AMERICA/New_York')))."</li></ul>";
			} ?>
		</ul>
	<div>
</div>