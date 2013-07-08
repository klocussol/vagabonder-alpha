<?php renderNav();
?>

<?php $n = 1 ?>

<?php var_dump($_POST); ?>
<?php var_dump($_GET); ?>

<div class="row upcoming-trips">
	<div class="large-12 columns">
		<h1>All upcoming trips</h1>
		<div class="section-container accordion" data-section="accordion">
			<?php foreach($trips as $specificTrip) { ?>
				<section>
    				<p class="title" data-section-title>
    					<a href="#">
    						<?php echo $specificTrip->getName(); ?>
	    					<form method="post">
	    						<a href="#<?php echo $n ?>" class="update button" name="update">Update</a>
	    						<a href="#<?php echo $n ?>" class="delete button" name="delete">Delete</a>
	    					</form>
    					</a>
    				</p>
    				<div class="content" data-section-content>
    					<p><?php echo "From: ".$specificTrip->getStartDate(); ?></p>
    					<p><?php echo "To: ".$specificTrip->getEndDate(); ?></p>
    				</div>
  				</section>
			<?php 
				$n++;
			} ?>
		</div>
	</div>
</div>

<?php renderScript(); ?>

