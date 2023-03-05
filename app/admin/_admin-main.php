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
    // connect to db
    $conn = require DB_CONNECT;
    $tables = array(
        "product" => "", 
        "category" => "", 
        "subcategory" => "", 
        "type" => "", 
        "brand" => "", 
        "user" => "", 
        "orders" => "",
    );

    // Get all data
    foreach($tables as $table => $data) {
        $sql = "SELECT * FROM {$table} LIMIT 5";
        $result = mysqli_query($conn, $sql);
        $tables[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
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

<!-- Main content -->
<div class="main">


<!-- Print tables from db -->
<?php foreach($tables as $table => $records): ?>
    <!-- Table Title -->
    <h2 style="display:inline-block;"><?= ucfirst(strtolower($table)) ?></h2>

   
            <a href="add-<?=$table?>.php" class="btn">
            <span class="material-icons">add_circle_outline</span>
            </a>
     

        <?php 
            // Generate link to a particular table page 
            $linkName = 'gotoAdmin'.ucfirst(strtolower($table)); 
            // Records count
            $sql = "SELECT COUNT(id) FROM {$table}";
            if (! $result = mysqli_query($conn, $sql))  die("Query error: ". $mysqli->error);
            if (! $count = mysqli_fetch_assoc($result)) die("Fetch error: ". $mysqli->error);
            // Print link to the table page + show table length
            echo "<a href='{$$linkName}'>See all ({$count["COUNT(id)"]})</a>";
        ?>
    

    <!-- Table -->
    <div class="table-responsive">
    <table class="table table-sm table-dark table-hover">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
        <?php
            // Get column names from the table
            $sql = "DESCRIBE {$table}";
            $result = mysqli_query($conn, $sql);
            $columns = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // Print columns to the table
            foreach($columns as $column) {
                echo '<th scope="col">'.$column["Field"].'</th>';
            }
        ?>    
        </tr>
    </thead>
    <tbody>
        <?php foreach($records as $record): // Print rows in the table ?>
            <tr>
                <!-- Print edit and delete functions -->
                <?php if (isset($record["is_admin"]) and $record["is_admin"]): // Disallow to delete admin user?>
                    <th scope="row" style="width: 1%; white-space: nowrap;">
                        <button class="btn" type="button" onclick="return alert('You cannot delete admin user through this admin panel.');">
                            <span class="material-icons">clear</span>
                        </button>
                    </th>
                <?php else:?>
                    <form 
                    action="_delete-record.php" 
                    method="post" 
                    onsubmit="return confirm('Do you really want to delete the record with id <?= $record['id'].' from '.$table?> table?');">
                        <input type="hidden" name="id" value="<?=$record["id"]?>">
                        <input type="hidden" name="table" value="<?=$table?>">
                        <th scope="row" style="width: 1%; white-space: nowrap;">
                            <button class="btn">
                                <span class="material-icons">clear</span>
                            </button>
                        </th>
                    </form> 
                <?php endif; ?>
                <th scope="row" style="width: 1%; white-space: nowrap; border-right: 1px solid white">
                <form 
                    action="edit-<?=$table?>.php" 
                    method="post" >
                    <button class="btn">
                        <span class="material-icons">edit</span>
                    </button>
                    <input type="hidden" name="id" value="<?=$record["id"]?>">
                    <input type="hidden" name="table" value="<?=$table?>">
                </form>
                </th>    
                  
                <!-- Print id field as heading of the row -->
                <th scope="row"><?= $record["id"] ?></th>
                <?php 
                $is_id = True;
                foreach($record as $field) {
                if (! $is_id) { // Print fields in the row
                    echo "<td>{$field}</td>";
                }
                $is_id = False;
            }
            ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
        </div>
        

<?php endforeach; ?>




</div>