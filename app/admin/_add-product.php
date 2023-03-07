<?php 
$mysqli = require DB_CONNECT;


// GET CATEGORIES
$sql = "SELECT * FROM subcategory";
$result = mysqli_query($mysqli, $sql);
$subcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// GET BRAND
$sql = "SELECT * FROM brand";
$result = mysqli_query($mysqli, $sql);
$brands = mysqli_fetch_all($result, MYSQLI_ASSOC);

// GET TYPE
$sql = "SELECT * FROM type";
$result = mysqli_query($mysqli, $sql);
$types = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_add-product-process.php" method="post" enctype='multipart/form-data'>
  <h1>Add product</h1>
  <label for="Name">Name</label>
  <input id="Name" name="name" type="text" maxlength="128" aria-label="Name" placeholder="Name" required>

  <label for="description">Description</label>
  <textarea id="description" name="description" placeholder="Description"></textarea>

  <fieldset>
    <label for="Price">Price</label>
    <input id="Price" name="price" type="number" min="0" aria-label="Price" placeholder="Price">

    <label for="Rating">Rating</label>
    <input id="Rating" name="rating" type="number" max="5" min="0" aria-label="Rating" placeholder="Rating">

    <label for="amount">Amount</label>
    <input id="amount" name="amount" type="number" min="0" aria-label="Amount" placeholder="Amount">
</fieldset>

  <label for="brand">Brand</label>
  <select id="brand" name='brand_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
    <?php foreach($brands as $brand) {
      echo "<option value='{$brand['id']}'>{$brand['name']}</option>";
    }?>
  </select>

  <label for="type">Type</label>
  <select id="type" name='type_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
    <?php foreach($types as $type) {
      echo "<option value='{$type['id']}'>{$type['name']}</option>";
    }?>
  </select>

  <label for="subcategory">Subcategory</label>
  <select id="subcategory" name='subcategory_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
    <?php foreach($subcategories as $subcategory) {
      echo "<option value='{$subcategory['id']}'>{$subcategory['name']}</option>";
    }?>
  </select>

  <label for="filename">Image link</label>
  <input id="filename" name="filename" type="file">
              
      <button type="submit">Create product</button>        
      
</form>
</div>