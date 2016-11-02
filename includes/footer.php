
    <footer>

		<aside>
		<div class="menu-vinstri"></div>
		<div class="menu-haegri">
			  <nav>
			    <ul>
			    <li class="ofar"><a class="outer-close toggle-overlay close">CLOSE</a></li>
			      <li><a href="createuser.php">Stofna notanda</a></li>
			      <li><a href="users.php">Breyta notendum</a></li>
			      <li><a href="createevent.php">Stofna viðburð</a></li>
			      <li><a href="login.php?logout=true">Signout</a></li>
			    </ul>
			  </nav>
		  </div>

		</aside>
    </footer>
  </body>

  <script>
  	(function($) {
  	  $(function() {
  	    $('.toggle-overlay').click(function() {
  	      $('aside').toggleClass('open');
  	    });
  	  });
  	})(jQuery);
  </script>
  <script src="js/script.js"></script>

</html>
