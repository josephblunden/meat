
    <footer>

		<aside>
		  <div class="outer-close toggle-overlay">
		    <a class="close"><span></span></a>
		  </div>
		  <nav>
		    <ul>
		      <li><a href="createusers.php">Stofna notanda</a></li>
		      <li><a href="users.php">Breyta notendum</a></li>
		      <li><a href="createevent.php">Stofna viðburð</a></li>
		      <li><a href="#!">About</a></li>
		    </ul>
		  </nav>
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