
    <footer>

		<aside>
		<div class="menu-vinstri"></div>
		<div class="menu-haegri">
			  <!-- <div class="outer-close toggle-overlay">
			    <a class="close"><span></span></a>
			    <a class="close open-menu">CLOSE</a>
			  </div> -->
			  <nav>
			    <ul>
			    <li class="ofar"><a class="outer-close toggle-overlay close">CLOSE</a></li>
			      <li><a href="createuser.php">Stofna notanda</a></li>
			      <li><a href="users.php">Breyta notendum</a></li>
			      <li><a href="createevent.php">Stofna viðburð</a></li>
			      <li><a href="#!">About</a></li>
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
</html>