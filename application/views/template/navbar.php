<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url().'about' ?>">About</a></li>
        <li><a href="<?php echo base_url().'contact' ?>">Contact</a></li>
        <li><a href="<?php echo base_url().'services' ?>">Services</a></li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if ($this->session->userdata('username')): ?>
            	<li><a href="<?php echo base_url().'logout' ?>">Logout</a>
            <?php else: ?>	
            	<li><a href="<?php echo base_url().'user/register' ?>">Register</a></li>
            	<li role="separator" class="divider"></li>
            	<li><a href="<?php echo base_url().'user/login' ?>">Login</a></li>            
          	<?php endif; ?>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
	if ($this->session->flashdata('success')):
?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success'); ?>						 
					</div>	
				</div>	
			</div>	
		</div>	
<?php
	endif;
?>
<?php 
	if ($this->session->flashdata('error')):
?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('error'); ?>
					</div>	
				</div>	
			</div>	
		</div>	
<?php
	endif;
?> 
