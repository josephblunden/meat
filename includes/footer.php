
    <footer>

		<aside>
		<div class="menu-vinstri"></div>
		<div class="menu-haegri">
			  <nav>
			    <ul>
			    <li class="ofar"><a class="outer-close toggle-overlay close">LOKA</a></li>
			      <li><a href="dashboard.php">Dashboard</a></li>
			      <li><a href="events.php">Viðburðir</a></li>
			      <li><a href="createevent.php">Stofna viðburð</a></li>
			      
			    </ul>
			  </nav>
			  <nav>
			  	<?php if(loginSuperCheck() == true) {
			    	echo '<ul><li><a href="createuser.php">Stofna notanda</a></li>
			      <li><a href="users.php">Notendur og tímaskráning</a></li></ul>';
				} 
			    ?>
			  </nav>
			  <nav class="menu-signout">
			  	<ul>
			  		<li>
			  			<?php
							  if (!stripos($_SERVER['REQUEST_URI'], 'login.php')) {
							    echo '
							    <p class="menu-signout-username">'.$_SESSION['firstname'].'</p>';
							  }
						?>
			  		</li>
			  		<li class="menu-signout"><a href="login.php?logout=true">Signout</a></li>
			  	</ul>
			  </nav>
		  </div>

		</aside>
    </footer>
  </body>

  <script src="js/script.js"></script>

</html>
