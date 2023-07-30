<?php
    require_once "../config/config.php";
    require dirname(__DIR__)."/scripts/checkAdmin.php";
    // $tables = require dirname(__DIR__)."/scripts/get_all_tables.php";

    // Access denied if table is not specified
    if (empty($_GET["table"])) {
        header("Location: " . URL_ADMIN);
    }
     
    // Import database
    require_once dirname(__DIR__)."/scripts/db.php";
    $db = new db(dbname:DATABASE);

    $columns = array();
    // Get a list of tables in the database
    $sql = "SHOW TABLES";
    $res = $db->query($sql)->fetchAll();
    $tables = array();
    foreach ($res as $key => $value){
        $table_name = array_values($value)[0];
        array_push($tables, $table_name);
    }
    // Check if GET request is valid
    $table_name = $_GET["table"];
    if (! in_array($table_name, $tables)) {
        header("Location: " . URL_ADMIN);
    }
    // Get fields from a table
    $sql = "SHOW COLUMNS FROM {$table_name}";
    $columns = $db->query($sql)->fetchAll();
    // Get record data when updating it
    $is_update = False;
    $record = array();
    if (! empty($_GET["id"])) {
        // Check if GET request is valid
        if (! intval($_GET['id'])){
            header("Location: " . URL_ADMIN);
        }
        $is_update = True;
        // Get record data
        $sql = "SELECT * FROM {$table_name} WHERE id={$_GET['id']}";
        $record = $db->query($sql)->fetchArray();
    } else {
        foreach($columns as $column) {
            $record[$column['Field']] = Null;
        }
    }
    
    



    // Get fields from a table
    // $sql = "SHOW COLUMNS FROM category";
    // $accounts = $db->query($sql)->fetchAll();

    // // Get records from a table
    // $sql = "SELECT * FROM user";
    // $records = $db->query($sql)->fetchAll();


    // print_r($records);
    // print_r($columns);
    // echo "<br>"."exiting program...";
    // exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/bootstrap.css">
    <script defer src="../assets/js/bootstrap.bundle.js"></script>
    <script defer src="../assets/js/validateForm.js"></script>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Contacts</title>
</head>
<body class="min-vh-100 d-flex flex-column">
    <header>
        <!-- Navbar -->
        <?php include_once "../common/navbar.php" ?>
    </header>
    
    <main class="flex-grow-1">
        <section class="py-5">
            <div class="container vstack gap-2">
                <form method="post" action="<?=URL_ROOT?>scripts/process_admin_form.php" class="vstack gap-3 needs-validation" novalidate enctype='multipart/form-data'>    
                <input type="hidden" name="table" value="<?=$table_name?>">
                <?php
                
                $form_title = "Create ";
                if ($is_update) {
                    $form_title = "Update ";
                    echo "<input type='hidden' name='action' value='update'>";
                    echo "<input type='hidden' name='id' value='{$record['id']}'>";
                } else {
                    echo "<input type='hidden' name='action' value='create'>";
                }
                
                echo "<h2>". $form_title . $_GET['table'] . " record</h2>";
                for ($col=0; $col < count($columns); $col++) { 
                    $input_name = strtolower($columns[$col]['Field']);
                    if ($input_name == 'id') continue;
                    // Check if column is mandatory
                    $required_attr = $columns[$col]['Null'] == "YES" ? "" : "required";
                    // Identify the column type and print an according input 
                    switch (explode("(", $columns[$col]['Type'], 2)[0]) {
                        case 'int':
                        case 'float':
                            // If the column is a foreign key
                            if ($columns[$col]['Key'] == 'MUL') {
                                // Get the name of the foreign table from the foreign key field
                                $foreign_table = explode('_', $columns[$col]['Field'], 2)[0];
                                // Get records from the foreign table
                                $sql = "SELECT * FROM {$foreign_table}";
                                $foreign_records = $db->query($sql)->fetchAll();
                                // Value that is selected in select when the form loads (created out of the column name)
                                $input_value = "Choose " . explode('_', $input_name, 2)[0];
                                // Change $input_value if changing a record
                                if ($is_update) {
                                    foreach ($foreign_records as $foreign_record) {
                                        if ($foreign_record['id'] == $record[$columns[$col]['Field']]) {
                                            $input_value = "{$foreign_record['id']} - " . array_values($foreign_record)[1];
                                            break;
                                        }
                                    }   
                                }
                                echo
                                "<div class='form-floating'>
                                    <select {$required_attr} class='form-select' name='{$input_name}' id='floatingSelect' aria-label='Floating label select example'>
                                        <option hidden disabled selected value='{$record[$input_name]}'>{$input_value}</option>
                                ";
                                // List records from the foreign table
                                foreach ($foreign_records as $foreign_record) {
                                    // Identify how to show the foreign key record
                                    if (isset($foreign_record['title'])) $title = $foreign_record['title'];
                                    elseif (isset($foreign_record['login'])) $title = $foreign_record['login'];
                                    else $title = $foreign_record['id'];
                                    echo "<option value='{$foreign_record['id']}'>{$foreign_record['id']} - {$title}</option>";
                                }
                                echo 
                                "
                                    </select>
                                    <label for='floatingSelect'>".ucfirst(explode('_', $input_name, 2)[0])."</label>
                                </div>";
                            }
                            // If the column is just a number
                            else {
                                echo
                                "<div class='form-floating'>
                                    <input {$required_attr} min='0' type='number' class='form-control' name='{$input_name}' value='{$record[$input_name]}' id='{$input_name}' placeholder='{$input_name}'>
                                    <label for='login'>".ucfirst($input_name)."</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                            }
                            break;
                        case 'varchar':
                            // If the input is image, show file selection
                            if ($input_name == 'image_link'){
                                // echo
                                // "
                                //     Picture: <input type='file' id='filename' name='filename' size='10'>
                                //     <input style='color:black;' type='submit' value='Upload'>
                                //     <input type='hidden' name='action' value='create'>
                                // ";

                                echo
                                "
                                <div class='form-floating'>
                                    <textarea class='form-control' placeholder='Image link' name='{$input_name}' id='floatingTextarea2' style='height: 100px'>{$record[$input_name]}</textarea>
                                    <label for='floatingTextarea2'>Image link</label>
                                </div>
                                ";
            
                            }
                            elseif ($input_name == 'password_hash') {
                                echo
                                "<p class='p-0 m-0'>Current password hash: {$record[$input_name]}</p>
                                <div class='form-floating'>
                                    <input {$required_attr} type='password' class='form-control' name='password' id='password' placeholder='password'>
                                    <label for='password'>Password</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>
                                <div class='form-floating'>
                                    <input {$required_attr} type='password' class='form-control' name='password_confirm' id='password_confirm' placeholder='password_confirm'>
                                    <label for='password'>Repeat password</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                                
                            }
                            elseif ($input_name == 'email') {
                                echo
                                "<div class='form-floating'>
                                    <input {$required_attr} type='email' class='form-control' name='{$input_name}' value='{$record[$input_name]}' id='{$input_name}' placeholder='{$input_name}'>
                                    <label for='{$input_name}'>".ucfirst($input_name)."</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                            }
                            else {
                                echo
                                "<div class='form-floating'>
                                    <input {$required_attr} type='text' class='form-control' name='{$input_name}' value='{$record[$input_name]}' id='{$input_name}' placeholder='{$input_name}'>
                                    <label for='{$input_name}'>".ucfirst($input_name)."</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                            }
                            
                            break;

                        case 'timestamp':
                            // If product is updated, then timestamp already exists, so print it
                            if ($is_update) {
                                echo
                                "<p>Created: {$record[$input_name]}</p>";
                            }
                            break;
                        
                        case 'tinyint':
                            $is_checked = $record[$input_name] ? "checked" : Null;
                            echo
                            "<div class='form-check'>
                                <input {$required_attr} class='form-check-input' type='checkbox' name='{$input_name}' value='' id='flexCheckDefault' ".$is_checked.">
                                <label class='form-check-label' for='flexCheckDefault'>
                                    Administrator
                                </label>
                            </div>";
                            break;

                        case "enum":
                            $options_string = explode("(", $columns[$col]['Type'], 2)[1];
                            $options = explode(",", $options_string);
                            $input_value = $is_update ? $record[$input_name] : "Choose ".explode('_', $input_name, 2)[0];
                            echo
                            "<div class='form-floating'>
                                <select class='form-select' name='{$input_name}' id='floatingSelect' aria-label='Floating label select example'>
                                    <option hidden disabled selected value='{$input_value}'>".$input_value."</option>
                            ";
                            // List records from the foreign table
                            foreach ($options as $option) {
                                $option = trim($option, "')");
                                echo "<option name='{$input_name}' value='{$option}'>{$option}</option>";
                            }
                            echo 
                            "
                                </select>
                                <label for='floatingSelect'>".ucfirst(explode('_', $input_name, 2)[0])."</label>
                            </div>";
                            break;

                        default:
                            echo "Undefined input: " . $input_name;
                            break;
                    }
                }
                ?>

                    <button type="submit" class="btn btn-primary">
                        <?php 
                        echo $is_update ? "Update" : "Create";
                        ?>
                    </button>
                </form>
                
               
            </div>
        </section>


    </main>
    <!-- Footer -->
    <?php include_once "../common/footer.html" ?>
</body>
</html>

