<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Voting System</title>
 	

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>

</head>
<style>
	html,body{
		width: 100%;
	    height: 100%;
	    background:#fff;
	}
	main#main{
		width:100%;
		height: 100%;
		background:white;
		display:flex;
		align-items:stretch;
	}
	#login-right{
		position: absolute;
		right:0;
		width:44%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
		justify-content:center;
		padding:2rem;
	}
	#login-left{
		position: absolute;
		left:0;
		width:56%;
		height: calc(100%);
		display: flex;
		flex-direction:column;
		align-items: flex-start;
		justify-content:center;
		padding:6vw;
		color:#fff;
	}
	#login-left .brand-eyebrow{
		font-size:12.5px; letter-spacing:.14em; text-transform:uppercase; font-weight:700;
		color:rgba(255,255,255,.65); margin-bottom:1.25rem;
	}
	#login-left h1{
		color:#fff; font-size:clamp(1.9rem,3vw,2.7rem); line-height:1.15; max-width:20ch; margin-bottom:1rem;
	}
	#login-left p{
		color:rgba(255,255,255,.72); font-size:15px; max-width:36ch; line-height:1.6; margin-bottom:0;
	}
	#login-right .card{
		margin: auto;
		width:100%;
		max-width:380px;
	}
	#login-right .login-eyebrow{
		font-size:12px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:#64748b; margin-bottom:.35rem;
	}
	#login-right h2{
		font-size:1.6rem; margin-bottom:1.75rem; color:#0f1522;
	}
	.logo {
    margin: 0 0 2rem;
    font-size: 2rem;
    width:4.2rem; height:4.2rem;
    display:flex;
    align-items:center;
    justify-content:center;
    background: rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.16);
    border-radius: 16px;
    color: #ffffff;
}
</style>

<body>


  <main id="main">
  		<div id="login-left">
  			<div class="logo">
  				<i class="fa fa-poll-h"></i>
  			</div>
  			<div class="brand-eyebrow">Voting Management System</div>
  			<h1>Secure, transparent elections — from setup to results.</h1>
  			<p>Manage candidates, categories and voters in one place, and watch results update in real time.</p>
  		</div>
  		<div id="login-right">
  			<div class="card">
  				<div class="card-body">
  					<div class="login-eyebrow">Welcome back</div>
  					<h2>Sign in to your account</h2>
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control" autocomplete="username">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control" autocomplete="current-password">
  						</div>
  						<button class="btn-sm btn-block btn-wave btn-primary" style="margin-top:1.5rem;">Login</button>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>
