<?php
    if ($posts):
        foreach($posts as $post):
            echo "<hr> $post->title </h2>";
            echo "<p> $post->body</p>";
        endforeach;
    else:
        echo "<h2> No Posts Found...</h2>";
    endif;
?>
<script>
window.hash_key = "<?php echo $this->security->get_csrf_hash(); ?>";
</script>                   
