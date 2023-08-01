<?php

// Import database
require_once ROOTPATH . "/scripts/db.php";
$db = new db(dbname: DATABASE);

if (isset($_GET['table'])) {
    // Create an array with the table name from GET
    // in the same format when fetching from the DB
    $res = [["table name" => $_GET['table']]];
    // How many rows in a table
    $sql_limit = 200;
} else {
    // Get a list of tables in the database
    $sql = "SHOW TABLES";
    $res = $db->query($sql)->fetchAll();
    // How many rows in a table
    $sql_limit = 5;
}
// Initialize empty to add tables later
$tables = array();
$columns = array();

// Get info about all tables
foreach ($res as $key => $value) {
    $table_name = array_values($value)[0];
    // Get fields from a table
    $sql = "SHOW COLUMNS FROM {$table_name}";
    $table_columns = $db->query($sql)->fetchAll();
    // Get records from the table
    $sql = "SELECT * FROM {$table_name}";
    $records = $db->query($sql)->fetchAll();
    // Save table info
    $tables[$table_name] = $records;
    $columns[$table_name] = $table_columns;
}

// Get fields from a table
// $sql = "SHOW COLUMNS FROM category";
// $accounts = $db->query($sql)->fetchAll();

// // Get records from a table
// $sql = "SELECT * FROM user";
// $records = $db->query($sql)->fetchAll();


// print_r($columns);
// print_r($columns);
// echo "<br>"."exiting program...";
// exit;
?>



<div class="main py-5">
    <div class="container">
    
        <?php
        // Display all tables from the database
        foreach ($tables as $table => $records):
            ?>
            <!-- table -->
            <div class="table-responsive">
                <div class="d-flex">
                    <form method="GET" action="admin_form.php" class="d-flex align-items-center">
                        <h4 id="<?= $table ?>"><?= $table ?></h4>
                        <input type="hidden" name="table" value="<?= $table ?>">
                        <button class="btn text-center">
                            <span class="material-icons">add_circle_outline</span>
                        </button>
                    </form>
                    <form method="GET" action="admin.php" class="d-flex align-items-center">
                        <?php
                            // Print link to the table page + show table length
                            if (!isset($_GET['table'])) {
                                echo "<button class='btn text-light'>See all (" . count($records) . ")</button>";
                                echo "<input type='hidden' name='table' value='{$table}'>";
                            } else { // Show elements count
                                echo count($records) . " record(s)";
                            }
                        ?>
                    </form>
                </div>

                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <?php
                            // Display column names
                            echo "<th scope='row'></th>";
                            echo "<th scope='row'></th>";
                            for ($col = 0; $col < count($columns[$table]); $col++) {
                                $col_name = $columns[$table][$col]['Field'];
                                echo "<th scope='row'>{$col_name}</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <!-- Records -->
                    <tbody>
                        <?php
                        // Print all records
                        if (count($records) == 0) {
                            echo
                                "<tr>
                                            <td class='text-center' colspan='" . (count($columns[$table]) + 2) . "'>Table is empty</td>
                                        </tr>";
                        } else
                            foreach (array_slice($records, 0, $sql_limit) as $record => $fields):
                                
                                ?>
                                <tr>
                                    <?php
                                    // Print delete & update buttons
                                    echo
                                        "<td class='admin-controls-cell'>
                                                <form action='" . ROOTURL . "scripts/process_admin_form.php' method='post' class='p-0 m-0'>
                                                    <button class='link-danger btn btn-link p-0' type='submit'>Delete</button>
                                                    <input type='hidden' name='action' value='delete'>
                                                    <input type='hidden' name='table' value='" . $table . "'>
                                                    <input type='hidden' name='id' value='" . $fields['id'] . "'>
                                                </form>
                                            </td>
                                            <td class='admin-controls-cell pe-3'>
                                                <form action='" . ROOTURL . "app/admin/admin_form.php' method='get' class='p-0 m-0'>
                                                    <button class='btn btn-link p-0' type='submit'>Update</button>
                                                    <input type='hidden' name='table' value='" . $table . "'>
                                                    <input type='hidden' name='id' value='" . $fields['id'] . "'>
                                                </form>
                                            </td>";

                                    // Print all record columns
                                    $is_col_id = True;
                                    foreach ($fields as $field) {
                                        if ($is_col_id) {
                                            echo "<th scope='row' class='w-5'>{$field}</th>";
                                            $is_col_id = False;
                                        } else {
                                            echo "<td>{$field}</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                            <?php
                                // End records
                            endforeach;
                        ?>

                    </tbody>
                </table>
            </div>
        <?php
            // End table
        endforeach;
        ?>
    </div>




</div>

</html>