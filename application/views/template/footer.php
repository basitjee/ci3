<div class="row">
	<div class="col-md-4 col-md-offset-4" align="center">
	<br/><br/>	
	</div>
</div>	
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!------- Including  jQuery library from Google------>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-------Including jQuery file in form------>
<script src="<?php echo base_url(). "js/submit.js" ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(function() {
$("#subcat0, #subcat1").hide();

    $('#fromshowpost').on('submit', function(e) {
       e.preventDefault(); 
    });    

});

function getSub1($id) {    
$('#cat').val($id);
$('#subcat1').hide();

    $.ajax({
        url: '<?php echo base_url('post/getCategories') ?>?cat_id='+$id,
        type: 'GET',
        datatype: 'html',        
    })
    .done(function($data){
        if ($id == -1 || $data == 0) {
            $("#subcat0, #subcat1").hide();
        } else {
            $("#subcat0").show();
        }
    $('#subcat0').empty().append($data);    
    })
    .fail(function() {
        console.log("error");
    })
    
}

function getSub2($id) {     
    $('#cat').val($id); 
    
    $.ajax({
        url: location.href+"post/getCategories?cat_id="+$id,
        type: 'GET',
        dataType: 'html',
    })
    .done(function($data){
        console.log($data);
            if ($id == -1 || $data == 0) {
                $("#subcat1").hide();    
            } else {
                $("#subcat1").show();
            }
        $('#subcat1').empty().append($data);    
    })
    .fail(function() {
        console.log("error");
    })
        
}


function showPosts() {
    
var $id = ($('#cat').val() >= 0) ? $('#cat').val() : 0;
// alert("I am in showPosts: "+$id);
    
    $.ajax({
        url: '<?php echo base_url('post/getPosts') ?>',
        type: 'POST',
        dataType: 'html',
        data: {cat_id: $id, "<?php echo $this->security->get_csrf_token_name(); ?>":window.hash_key},    
    })
    .done(function($data){
        console.log($data);
        $("#showposts").empty().append($data);    
    })
    .fail(function($data) {
        console.log("error"+$data);   
    })
    
}
   
</script>
</body>		
</html>