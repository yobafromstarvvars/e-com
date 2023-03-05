<style>
#main{
    margin:0;
    padding:0;
}

body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<!-- Side nav -->
<div class="sidenav">
    <a href="<?=$gotoAdmin?>">Admin panel</a>
    <a href="<?=$gotoHome  ?>">Main page</a>
    <hr>
    <a href="<?=$gotoAdminOrders  ?>">Orders</a>
    <a href="<?=$gotoAdminUser ?>">Users</a>
    <a href="<?=$gotoAdminProduct?>">Products</a>
    <a href="<?=$gotoAdminCategory ?>">Categories</a>
    <a href="<?=$gotoAdminSubcategory ?>">Subcategories</a>
    <a href="<?=$gotoAdminType ?>">Types</a>
    <a href="<?=$gotoAdminBrand ?>">Brands</a>
</div>


<?php 
// PROCESS THE FORM
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  if (empty($_POST["name"])) {
    die("Name is required.");
  }
  $category_name = strtolower($_POST["name"]);

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
        // Get next record id
        /*
        $mysqli = require DB_CONNECT;
        $sql = "SELECT id FROM category ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($mysqli, $sql);
        // Add 1 to the received id OR if no records in the table, set next id to 1
        $current_id = mysqli_fetch_assoc($result);
        $next_id = ($current_id) ? $current_id["id"] : "1";
        */
        // Copy file to project folder
        $newname = $category_name."-".date("Y-m-d-h-i-s").".".$ext;
        $newpath = realpath(ROOTPATH."/assets/img/category").DIRECTORY_SEPARATOR;
        $image_path_db = "/assets/img/category/".$newname;
        if (move_uploaded_file($_FILES['filename']['tmp_name'], $newpath.$newname)) {
            // Upload to database
            $sql = "INSERT INTO category (name, image_link) VALUES (?,?)";
            $stmt = $mysqli->stmt_init();
            if (! $stmt->prepare($sql)) {
                die("SQL error: ". $mysqli->error);
            }
            $stmt->bind_param("ss", $category_name, $image_path_db);
            if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
            $is_success_upload = True;
            header("Location: ".$gotoAdminCategory);
        }
    }
    die("Wrong image format");
  } else {
    $sql = "INSERT INTO category (name) VALUES (?)";       
    $stmt = $mysqli->stmt_init();
    if (! $stmt->prepare($sql)) {
        die("SQL error: ". $mysqli->error);
    }
    $stmt->bind_param("s", $category_name);
    if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
    header("Location: ".$gotoAdminCategory);
  }
  
}
?>


<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" method="post" enctype='multipart/form-data'>
<h1>Add category</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required>

    <label for="filename">Image link</label>
    <input id="filename" 
     name="filename"
            type="file" 
            maxlength="128" 
            aria-label="E-mail" 
            placeholder="E-mail">
            
    <button type="submit">Create category</button>        
    
</form>
</div>