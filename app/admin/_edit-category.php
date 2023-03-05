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

<?php
// Retrieve data to fill info in the input fields
$conn = require DB_CONNECT;
$sql = "SELECT id, name, image_link FROM category WHERE id = {$_POST['id']}";
$result = mysqli_query($conn, $sql);
$category = mysqli_fetch_assoc($result);
?>

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