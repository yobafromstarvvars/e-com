<?php 
$mysqli = require DB_CONNECT;
// PROCESS THE FORM
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  if (empty($_POST["name"])) {
    die("Name is required.");
  }
  $subcategory_name = strtolower($_POST["name"]);

  // Uploadimage
  if ($_FILES["filename"]["name"]) {
    $name = $_FILES['filename']['name'];
    switch($_FILES['filename']['type'])
    {
        case 'image/jpeg': $ext = 'jpg'; break;
        case 'image/png': $ext = 'png'; break;
        default: $ext = ''; break;
    }
    if ($ext)
    {
        // Copy file to project folder
        $newname = $subcategory_name."-".date("Y-m-d-h-i-s").".".$ext;
        $newpath = realpath(ROOTPATH."/assets/img/subcategory").DIRECTORY_SEPARATOR;
        $image_path_db = "/assets/img/subcategory/".$newname;
        if (move_uploaded_file($_FILES['filename']['tmp_name'], $newpath.$newname)) {
            // Upload to database
            $sql = "INSERT INTO brand (name, image_link, id_category) VALUES (?,?,?)";
            $stmt = $mysqli->stmt_init();
            if (! $stmt->prepare($sql)) {
                die("SQL error: ". $mysqli->error);
            }
            $stmt->bind_param("ssi", $subcategory_name, $image_path_db, $_POST["category_id"]);
            if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
            $is_success_upload = True;
            header("Location: ".$gotoAdminSubcategory);
        }
    }
    die("Wrong image format");
  } else {
    $sql = "INSERT INTO subcategory (name, id_category) VALUES (?,?)";       
    $stmt = $mysqli->stmt_init();
    if (! $stmt->prepare($sql)) {
        die("SQL error: ". $mysqli->error);
    }
    $stmt->bind_param("si", $subcategory_name, $_POST["category_id"]);
    if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
    header("Location: ".$gotoAdmin);
  }
  
}

// GET CATEGORIES
$sql = "SELECT * FROM category";
$result = mysqli_query($mysqli, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" method="post" enctype='multipart/form-data'>
<h1>Add brand</h1>
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
            
    <button type="submit">Create brand</button>        
    
</form>
</div>