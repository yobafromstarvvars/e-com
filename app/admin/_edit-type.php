<?php

$mysqli = require DB_CONNECT;

// GET CATEGORIES
$sql = "SELECT * FROM subcategory";
$result = mysqli_query($mysqli, $sql);
$subcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// GET TYPES
$sql = "SELECT * FROM type WHERE id = {$_POST['id']}";
$result = mysqli_query($mysqli, $sql);
$type = mysqli_fetch_assoc($result);
?>

<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_edit-type-process.php" method="post">
<h1>Edit type "<?=$type["name"]?>"</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required
            value="<?= htmlspecialchars($type["name"]) ?>">

            <label for="subcategory">subcategory</label>
            <select id="subcategory" name='subcategory_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
              <?php foreach($subcategories as $subcategory) {
                if($subcategory["id"]==$type["id_subcategory"]) echo "<option selected value='{$subcategory['id']}'>{$subcategory['name']}</option>";
                else echo "<option value='{$subcategory['id']}'>{$subcategory['name']}</option>";
              
              
              }?>
</select>

    <input type="hidden" name="id" value="<?=$type["id"]?>">
    <button type="submit">Edit type</button>        
    
</form>
</div>