<div classs="row">
	<div class="col-md-8 col-md-offset-2">
		 
		<?php foreach($posts as $post): ?>
		<a href="<?php echo base_url('/post/show/'.$post->id); ?>"><h2><?php echo $post->title; ?></h2></a>
		<p><?php echo $post->body; ?></p>
		<p>
			<strong>Created At: </strong><span class="small"><?php echo $post->created_at; ?></span>
			<strong>Updated At: </strong><span class="small"><?php echo $post->updated_at; ?></span>
		</p>				
		<?php if ($this->session->userdata('id') == $post->user_id): ?>
			<p>			
				<a href="<?php echo base_url('/post/edit/'.$post->id); ?>" class="btn btn-primary">Edit</a> | <a href="<?php echo base_url('/post/delete/'.$post->id); ?>" class="btn btn-danger">Delete</a> 
			</p>
		<?php endif; ?>	
		<?php endforeach; ?>
		<nav aria-label="Page navigation">
			<?php echo $links; ?>	
		</nav>	
		
	</div>	
</div>	