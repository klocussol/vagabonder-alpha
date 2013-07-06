<?php renderNav(); ?>

<div class="row main-content">
	<div class="large-12 columns">
		<?php
		echo "<h1>All users</h1>";
		?>
		<ul>
			<?php foreach($vagabonds as $vagabond) {
				echo "<li>".$vagabond->getName()."</li>";
				echo "<ul><li>".$vagabond->getGender()."</li>";
				echo "<li>".$vagabond->getAge(new DateTime("now", new DateTimeZone('AMERICA/New_York')))."</li></ul>";
			} ?>
		</ul>
	<div>
</div>