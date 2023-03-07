<?php 
$table = "subcategory";


$mysqli = require DB_CONNECT;

require "_admin-add-process.php";

// Get file extension
die(var_dump($_FILES));
if ($ext = getFileExt($_FILES['filename']['type'])) {
  if ($image_path_db = getImgPathDB($_POST["table"], $_POST["table_id"], $ext, False)) {
    // Upload to database
    $sql = "INSERT INTO $table (name, image_link, id_category) VALUES (?,?,?)";
    $stmt = $mysqli->stmt_init();
    if (! $stmt->prepare($sql)) {
        die("SQL error: ". $mysqli->error);
    }
    $stmt->bind_param("ssi", strtolower($_POST["name"]), $image_path_db, $_POST["category_id"]);
    $image_path_server = getImgPathDB($_POST["table"], $_POST["table_id"], $ext, True);
    if (move_uploaded_file($_FILES['filename']['tmp_name'], $image_path_server)) {
      if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
            $is_success_upload = True;
            header("Location: ".$gotoAdminSubcategory);
    }
  }
}



// GET CATEGORIES
$sql = "SELECT * FROM category";
$result = mysqli_query($mysqli, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_admin-add-process.php" method="post" enctype='multipart/form-data'>
<h1>Add <?=$table?></h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required>

            <label for="category">Category</label>
            <select id="category" name='category_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
              <?php foreach($categories as $category) {
              echo "<option value='{$category['id']}'>{$category['name']}</option>";
              
              }?>
</select>

    <label for="filename">Image link</label>
    <input id="filename" 
     name="filename"
            type="file" 
            maxlength="128" 
            aria-label="E-mail" 
            placeholder="E-mail">
            
    <button type="submit">Create <?=$table?></button>        
    
</form>
</div>