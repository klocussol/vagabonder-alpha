<head>
	<title>Vagabonder</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/styles.css" />
</head>

<header class="fixed">
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name">
				<h1><a href="#">Vagabonder</a>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
		      <li class="divider hide-for-small"></li>
		      <li class="has-dropdown"><a href="#profile">Me</a>
		      	<ul class="dropdown">
		      	  <li class="divider"></li>
		          <li><a href="/?page=my-profile">My profile</a></li>
		          <li class="divider"></li>
		          <li><a href="#">My settings</a></li>
		          <li class="divider"></li>
		          <li><a href="#">My bonds</a></li>
		          <li class="divider"></li>
		          <li><a href="#">My reviews</a></li>
		        </ul>
		      </li>
		      <li class="divider hide-for-small"></li>
		      <li class="has-dropdown"><a href="#">Survey</a>
		      	<ul class="dropdown">
		      	  <li class="divider"></li>
		          <li><a href="#">Personality</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Trips</a></li>
		          <li class="divider"></li>
		        </ul>
		      </li>
			  <li class="divider hide-for-small"></li>
	          <li class="has-dropdown"><a href="#">Connect</a>
	      		<ul class="dropdown">
	      			<li class="divider"></li>
	       			<li><a href="#">With a local</a><li>
	       			<li class="divider"></li>
	        		<li><a href="#find-traveler">With a traveler</a></li>
	        		<li class="divider"></li>
	          		<li><a href="#">With both</a></li>
	        	</ul>
		      </li>
		      <li class="divider hide-for-small"></li>
		      <li class="has-dropdown"><a href="#">Comment</a>
	      		<ul class="dropdown">
	      			<li class="divider"></li>
	       			<li><a href="#">On a vagabonder</a><li>
	       			<li class="divider"></li>
	        		<li><a href="#">On a place</a></li>
	        	</ul>
		      </li>
		      <li class="divider hide-for-small"></li>
		      <li class="has-dropdown"><a href="#">Check out</a>
	      		<ul class="dropdown">
	      			<li class="divider"></li>
	       			<li><a href="#">Vagabonds</a><li>
	       			<li class="divider"></li>
	        		<li><a href="#">Locals</a></li>
	        		<li class="divider"></li>
	        		<li><a href="/?page=all-users">Both</a></li>
	        	</ul>
		      </li>
		      <li class="divider"></li>
		      <li class="has-form">
		        <form>
		          <div class="row collapse">
		            <div class="small-8 columns">
		              <input type="text">
		            </div>
		            <div class="small-4 columns">
		              <a href="#" class="button">
		              	<img src="img/binocular.png" />
		              </a>
		            </div>
		          </div>
		        </form>
		      </li>
		      <li class="divider show-for-small"></li>
			</ul>
		</section>
	</nav>
</header>

<div id="main-content" class="row">
	<h1>Wanna vagabond?</h1>
	<div class="large-12 columns" id="profile">
		<div class="large-8 left">
			<nav>
				<ul>
					<li class="left"><a href="/?page=bonds">64<br />Bonds</a></li>
					<li class="left"><a href="/?page=upcoming-trips">3<br />Upcoming Trips</a></li>
					<li class="left"><a href="#">15<br />Footprints</a></li>
					<li class="left"><a href="#">21<br />Comments</a></li>
					<li class="left"><a href="#">54<br />Uploads</a></li>
				</ul>
			</nav>
		</div>
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
</div>