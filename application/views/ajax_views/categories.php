<option value="-1">Select Sub Category</option>
<?php if ($categories): ?>
    <?php foreach($categories as $category): ?>
        <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
    <?php endforeach; ?>
<?php endif; ?>             
                    