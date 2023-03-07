<?php 
$mysqli = require DB_CONNECT;
// PROCESS THE FORM
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  if (empty($_POST["name"])) {
    die("Name is required.");
  }
  $type_name = strtolower($_POST["name"]);


    $sql = "INSERT INTO type (name, id_subcategory) VALUES (?,?)";       
    $stmt = $mysqli->stmt_init();
    if (! $stmt->prepare($sql)) {
        die("SQL error: ". $mysqli->error);
    }
    $stmt->bind_param("si", $type_name, $_POST["subcategory_id"]);
    if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
    header("Location: ".$gotoAdmin);
  
  
}

// GET CATEGORIES
$sql = "SELECT * FROM subcategory";
$result = mysqli_query($mysqli, $sql);
$subcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" method="post" enctype='multipart/form-data'>
<h1>Add type</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required>

            <label for="subcategory">Subcategory</label>
            <select id="subcategory" name='subcategory_id' style="background-color: #121212; color: white; margin-bottom: 2rem;" class="form-select form-select-sm">
              <?php foreach($subcategories as $subcategory) {
              echo "<option value='{$subcategory['id']}'>{$subcategory['name']}</option>";
              
              }?>
</select>

    
            
    <button type="submit">Create type</button>        
    
</form>
</div>