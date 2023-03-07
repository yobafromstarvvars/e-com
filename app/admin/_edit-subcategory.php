<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_edit-subcategory-process.php" method="post" enctype='multipart/form-data'>
<h1>Edit subcategory "<?=$subcategory["name"]?>"</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required
            value="<?= htmlspecialchars($subcategory["name"]) ?>">

            <label for="category">Category</label>
            <select id="category" name='category_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
              <?php foreach($categories as $category) {
                if($category["id"]==$subcategory["id_category"]) echo "<option selected value='{$category['id']}'>{$category['name']}</option>";
                else echo "<option value='{$category['id']}'>{$category['name']}</option>";
              
              
              }?>
</select>

    <img style="width:150px; height: 150px;" src="<?=ROOTURL.$subcategory["image_link"]?>" alt="subcategory image"><br>

    <label for="filename">Upload image</label>
    <input id="filename" 
     name="filename"
            type="file" >
     
    <input type="hidden" name="id" value="<?=$subcategory["id"]?>">
    <button type="submit">Edit subcategory</button>        
    
</form>
</div>