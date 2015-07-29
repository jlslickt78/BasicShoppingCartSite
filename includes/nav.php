<!--header and nav-->
<nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!--begin brand-->
			<div class="navbar-brand">
				<!--<a href="../index.php">Spokanabis</a>-->
				<a href="../index.php">Pizza.com</a>
			</div>
			<!--end brand-->
		</div>
		<!--end header-->

		<!-- Collection of nav links and other content for toggling -->
		<div id="navbarCollapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li id="liHome"><a href="../index.php">Home</a></li>
				<li id='liMenu'><a href='../menu.php'>Menu</a></li>
				<li id="liOrder"><a href="../order.php">Order</a></li>
				<li id="liLocation"><a href="../location.php">Location</a></li>
				<li id="liContact-us"><a href="../contact_us.php">Contact</a></li>
				<?php
					if(isset($_SESSION['first_name'])){
						echo "<li id='liMyAccount'><a href='../my_account.php'>My Account</a></li>";
					}
				?>

			</ul>

			<?php
				if(isset($_SESSION['admin_user'])){
					echo "<ul id='nav-login' class='nav navbar-nav pull-right'>" .
							"<li><a href='#' class='session'>" . $_SESSION['admin_user'] . "</a></li>" .
							"<li class='logout'><a href='../logout.php' id='logout'>Logout</a></li>" .
							"</ul>";

				}elseif(isset($_SESSION['first_name'])) {
					echo "<ul id='nav-login' class='nav navbar-nav pull-right'>" .
							"<li><a href='#' class='session'>" . $_SESSION['first_name'] . "</a></li>" .
							"<li class='logout'><a href='../logout.php' id='logout'>Logout</a></li>" .
							"</ul>";
				}else{
					echo"<ul class='nav navbar-nav pull-right'>" .
							"<li id='liLogin'><a href='../login_form.php'>Login</a></li>" .
							"</ul>";
				}
			?>

		</div>
	</div>
</nav>
<!--end navigation-->


