<?php
echo "All upcoming trips";
?>

<ul>
	<?php foreach($trips as $specificTrip) {
		echo "<li>".$specificTrip->getName()."</li>";
	} ?>
</ul>