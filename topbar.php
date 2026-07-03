<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex; align-items:center; gap:.75rem;">
  			<span id="sidebar-toggle"><i class="fa fa-bars"></i></span>
  			<div class="logo">
  				<i class="fa fa-poll-h"></i>
  			</div>
  			<span class="text-white" style="font-weight:700; font-size:14.5px; letter-spacing:-.01em; white-space:nowrap;">Voting System</span>
  		</div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
</nav>
<div id="sidebar-backdrop"></div>
<script>
	$('#sidebar-toggle').click(function(){
		$('body').toggleClass('sidebar-open');
	});
	$('#sidebar-backdrop').click(function(){
		$('body').removeClass('sidebar-open');
	});
</script>
