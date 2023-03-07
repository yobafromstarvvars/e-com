

<?php
    // connect to db
    $conn = require DB_CONNECT;
   
    // Show 200 records if one table is shown, 5 records each if all shown
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql_limit = 200;
        $tables = array(
            $_POST["table"] => "", 
        );
    } else {
        $sql_limit = 5;
        $tables = array(
            "product" => "", 
            "category" => "", 
            "subcategory" => "", 
            "type" => "", 
            "brand" => "", 
            "user" => "", 
            "orders" => "",
        );
    }
    // Get data for every table
    foreach($tables as $table => $data) {
        $sql = "SELECT * FROM {$table} LIMIT {$sql_limit}";
        $result = mysqli_query($conn, $sql);
        $tables[$table] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>



<!-- Main content -->
<div class="main">


<!-- Print tables from db -->
<?php foreach($tables as $table => $records): ?>
    <!-- Table Title -->
    <form method='post'>
    <h2 style="display:inline-block;"><?= ucfirst(strtolower($table)) ?></h2>
            <a href="add-<?=$table?>.php" class="btn">
            <span class="material-icons">add_circle_outline</span>
            </a>
        <?php 
            // Records count
            $sql = "SELECT COUNT(id) FROM {$table}";
            if (! $result = mysqli_query($conn, $sql))  die("Query error: ". $mysqli->error);
            if (! $count = mysqli_fetch_assoc($result)) die("Fetch error: ". $mysqli->error);

            // Print link to the table page + show table length
            if ($_SERVER["REQUEST_METHOD"] !== "POST") {
   
            echo "<button style='display:inline; background: transparent; border:none;'>See all ({$count["COUNT(id)"]})</button>";
            echo "<input name='table' value='$table' type='hidden'>";

            } else { // Show elements count
                echo $count["COUNT(id)"]." record(s)";
            }
        ?>
    </form>

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