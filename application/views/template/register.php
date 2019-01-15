<div class="container">
<?php 
echo validation_errors('<div class="alert alert-danger">', '</div>');
?>
<div class="panel panel-default">	
  <div class="panel-heading"><h4>Registration Form</h4></div>   
  <?php
  echo form_open(base_url('register'), array('method'=>'post', 'class'=>'form-horizontal', 'id'=>'register-form'));
  ?>
  <div class="panel-body">	 	
	<label for="username">Username</label>
	<div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username" id="username" aria-describedby="basic-addon1">
	</div>
	<label for="email">Email</label>
	<div class="input-group">
	  <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" id="email" aria-describedby="basic-addon2">
	  <span class="input-group-addon" id="basic-addon2">@example.com</span>
	</div>
	<label for="password">Password</label>
	<div class="input-group">
	  <span class="input-group-addon">&lowast;</span>
	  <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" id="password">  
	</div>
	<label for="password_confirmation">Confirm Password</label>
	<div class="input-group">
	  <span class="input-group-addon">&lowast;</span>
	  <input type="password" name="password_confirmation" value="<?php echo set_value('password_confirmation'); ?>" id="password_confirmation" class="form-control" placeholder="Confirm Password">  
	</div>	
	<div class="input-group">
	  <br/> 
	  <button type="submit" class="btn btn-default">Submit</button>
	</div>	
  </div>
  <?php	  
  echo form_close();
  ?>
	</div>
	</div>
</div>