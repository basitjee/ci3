<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/navbar'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">             
            <select name="parent" onchange="getSub1(this.value)" class="form-control">
                <option value="-1">Select a Category</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id ?>"><?php echo $category->title; ?></option>
                    <?php endforeach; ?>        
            </select>    
        </div>
        
        <div class="form-group col-md-8 col-md-offset-2">
        </br>    
            <select name="" id="subcat0" class="form-control" onchange="getSub2(this.value)">
            </select>            
        </div>
        <div class="form-group col-md-8 col-md-offset-2">
            <select name="" id="subcat1" class="form-control" onchange="document.getElementById('cat').value = this.value">
            </select>    
        </div>       
        <form class="form-horizontal" id="frmshowposts">       
            <div class="form-group">
                <input type="hidden" id="cat" name="category" value="-1" />
                <button type="button" class="btn btn-primary" onclick="showPosts()">Show Posts</button> 
            </div>  
        </form> 
    </div>    
</div>    
<h1 class="text-center">Home Page</h1>
<div class="container">
    <div class="row">
        <div id="showposts" class="col-md-8 col-md-offset-2">             
        </div>
    </div>
</div>    
<?php $this->load->view('template/footer'); ?> 