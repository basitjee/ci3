<nav class="navbar navbar-default">
  <div class="container-fluid">
         
    <!-- Collect the nav links, forms, and other content for toggling -->
    <?php     
	    if ($this->uri->segment(1) == "") {
	    	$class_home = 'class="active"';
	    } else {
	    	$class_home = '';
	    }
	    if ($this->uri->segment(1) == "about") {
	    	$class_about = 'class="active"';
	    } else {
	    	$class_about = '';
	    }		
		if ($this->uri->segment(1) == "contact") {
	    	$class_contact = 'class="active"';
	    } else {
	    	$class_contact = '';
	    }
		if ($this->uri->segment(1) == "services") {
	    	$class_services = 'class="active"';
	    } else {
	    	$class_services = '';
	    }
    ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo $class_home; ?> ><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home_menu'); ?> </a></li>
        <li <?php echo $class_about; ?>><a href="<?php echo base_url().'about' ?>"><?php echo $this->lang->line('about_menu'); ?></a></li>
        <li <?php echo $class_contact; ?>><a href="<?php echo base_url().'contact' ?>"><?php echo $this->lang->line('contact_menu'); ?></a></li>
        <li <?php echo $class_services; ?> ><a href="<?php echo base_url().'services' ?>"><?php echo $this->lang->line('services_menu'); ?></a></li>                 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('welcome_menu'); ?> <?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if ($this->session->userdata('id')): ?>
            	<li><a href="<?php echo base_url('user/dashboard') ?>">Dashboard</a></li>
            	<li><a href="<?php echo base_url().'user/editProfile' ?>">Edit Profile</a></li>
            	<li role="separator" class="divider"></li>
            	<li><a href="<?php echo base_url().'user/logout' ?>">Logout</a></li>
            <?php else: ?>	
            	<li><a href="<?php echo base_url().'user/register' ?>"><?php echo $this->lang->line('reg_menu'); ?></a></li>
            	<li role="separator" class="divider"></li>
            	<li><a href="<?php echo base_url().'user/login' ?>"><?php echo $this->lang->line('login_menu'); ?></a></li>            
          	<?php endif; ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Language<span class="caret"></span></a>
          <ul class="dropdown-menu">            	
          	<?php
          	$last 			= $this->uri->total_segments();
			$redirect_page	= $this->uri->segment($last);
          	?>
            <li><a href="<?php echo base_url('/lang/eng/'.$redirect_page) ?>">English</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('/lang/ur/'.$redirect_page) ?>">Urdu</a></li>
            
          </ul>
        </li>
      </ul>       
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
