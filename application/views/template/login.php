<div class="container">
<?php 
echo validation_errors('<div class="alert alert-danger">', '</div>');
?> 
<div class="panel panel-default">	
  <div class="panel-heading"><h4>Login</h4></div>   
	<form class="form-horizontal" method="post" id="login-user" action="<?php echo base_url('login'); ?>"> 
  	<?php 
  	$hash_name  = $this->security->get_csrf_token_name(); 
  	$hash_val	= $this->security->get_csrf_hash();
  	?>  	
	  	  <div class="panel-body">	 	
			<label for="username">Username</label>
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1">@</span>
			  <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username" id="username" aria-describedby="basic-addon1">
			  <input type="hidden" value="<?php echo $hash_val; ?>" name="<?php echo $hash_name; ?>">	
			</div>	
			
			<label for="password">Password</label>
			<div class="input-group">
			  <span class="input-group-addon">&lowast;</span>
			  <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" id="password">  
			</div>		
			<div class="input-group">
			  <br/> 
			  <button type="submit" class="btn btn-default">Submit</button>
			</div>	
		  </div>	 
  	</form>  
	</div>
	</div>
</div>