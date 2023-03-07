<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_edit-category-process.php" method="post" enctype='multipart/form-data'>
<h1>Edit category "<?=$category["name"]?>"</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required
            value="<?= htmlspecialchars($category["name"]) ?>">

    <img style="width:150px; height: 150px;" src="<?=ROOTURL.$category["image_link"]?>" alt="category image"><br>

    <label for="filename">Upload image</label>
    <input id="filename" 
     name="filename"
            type="file" >
     
    <input type="hidden" name="id" value="<?=$_POST['id']?>">
    <button type="submit">Edit category</button>        
    
</form>
</div>