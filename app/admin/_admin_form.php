<?php
    require ROOTPATH."/scripts/checkAdmin.php";
    // $tables = require dirname(__DIR__)."/scripts/get_all_tables.php";

    // Access denied if table is not specified
    if (empty($_GET["table"])) {
        header("Location: " . $gotoAdmin);
    }
     
    // Import database
    require_once ROOTPATH ."/scripts/db.php";
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
        header("Location: " . $gotoAdmin);
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
            header("Location: " . $gotoAdmin);
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


        <section class="py-5">
            <div class="container vstack gap-2">
                <form method="post" action="<?=ROOTURL?>scripts/process_admin_form.php" class="vstack gap-3 needs-validation" novalidate enctype='multipart/form-data'>    
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
                    if ($input_name == 'id') {
                        if ($is_update) echo "<p class='py-0 my-0'>Id: {$record[$input_name]}</p>";
                        continue;
                    }
                    // Check if column is mandatory
                    $required_attr = $columns[$col]['Null'] == "YES" ? "" : "required";
                    // Identify the column type and print an according input
                    switch (explode("(", $columns[$col]['Type'], 2)[0]) {
                        case 'int':
                        case 'float':
                            // If the column is a foreign key
                            if ($columns[$col]['Key'] == 'MUL') {
                                // Get the name of the foreign table from the foreign key field
                                $foreign_table = explode('_', $columns[$col]['Field'], 2)[1];
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
                                        <option hidden disabled selected 
                                            value='{$record[$input_name]}'
                                            class='text-dark'>
                                            {$input_value}
                                        </option>
                                ";
                                // List records from the foreign table
                                foreach ($foreign_records as $foreign_record) {
                                    // Identify how to show the foreign key record
                                    if (isset($foreign_record['title'])) $title = $foreign_record['title'];
                                    elseif (isset($foreign_record['login'])) $title = $foreign_record['login'];
                                    else $title = $foreign_record['id'];
                                    echo "<option class='text-dark' value='{$foreign_record['id']}'>{$foreign_record['id']} - {$title}</option>";
                                }
                                echo 
                                "
                                    </select>
                                    <label class='text-secondary' for='floatingSelect'>".ucfirst(explode('_', $input_name, 2)[0])."</label>
                                </div>";
                            }
                            // If the column is just a number
                            else {
                                echo
                                "<div class='form-floating'>
                                    <input {$required_attr} min='0' type='number' class='form-control' name='{$input_name}' value='{$record[$input_name]}' id='{$input_name}' placeholder='{$input_name}'>
                                    <label class='text-secondary' for='login'>".ucfirst($input_name)."</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                            }
                            break;
                        case 'varchar':
                            // If the input is image, show file selection
                            if ($input_name == 'image_link'){
                                echo
                                "
                                    <div class='d-flex align-items-center justify-content-start'>                                    
                                        <figure>
                                            <img src='".ROOTURL."{$record[$input_name]}' alt='{$input_name}' class='img-fluid me-3 object-fit-contain' style='max-height:150px; max-width:150px'>
                                            <figcaption>Current image</figcaption>
                                        </figure>
                                        Update: <input type='file' id='filename' name='filename' size='10' value='123123'>
                                    </div>
                                ";

                                // echo
                                // "
                                // <div class='form-floating'>
                                //     <textarea class='form-control' placeholder='Image link' name='{$input_name}' id='floatingTextarea2' style='height: 100px'>{$record[$input_name]}</textarea>
                                //     <label class='text-secondary' for='floatingTextarea2'>Image link</label>
                                // </div>
                                // ";
            
                            }
                            
                            elseif ($input_name == 'password_hash') {
                                echo
                                "<p class='p-0 m-0'>Current password hash: {$record[$input_name]}</p>
                                <div class='form-floating'>
                                    <input {$required_attr} type='password' class='form-control' name='password' id='password' placeholder='password'>
                                    <label class='text-secondary' for='password'>Password</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>
                                <div class='form-floating'>
                                    <input {$required_attr} type='password' class='form-control' name='password_confirm' id='password_confirm' placeholder='password_confirm'>
                                    <label class='text-secondary' for='password'>Repeat password</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                                
                            }
                            elseif ($input_name == 'email') {
                                echo
                                "<div class='form-floating'>
                                    <input {$required_attr} type='email' class='form-control' name='{$input_name}' value='{$record[$input_name]}' id='{$input_name}' placeholder='{$input_name}'>
                                    <label class='text-secondary' for='{$input_name}'>".ucfirst($input_name)."</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                            }
                            else {
                                echo
                                "<div class='form-floating'>
                                    <input {$required_attr} type='text' class='form-control' name='{$input_name}' value='{$record[$input_name]}' id='{$input_name}' placeholder='{$input_name}'>
                                    <label class='text-secondary'  for='{$input_name}'>".ucfirst($input_name)."</label>
                                    <div class='invalid-feedback'>Invalid input</div>
                                </div>";
                            }
                            
                            break;
                        case 'text':
                            // If the input type is 'text', show textarea
                            echo
                            "
                            <div class='form-floating'>
                                <textarea class='form-control' placeholder='{$input_name}' name='{$input_name}' id='{$input_name}' style='height: 100px;'>{$record[$input_name]}</textarea>
                                <label class='text-secondary' class='text-secondary' for='{$input_name}'>{$input_name}</label>
                            </div>
                            ";
                            break;
                        
                        case 'timestamp':
                            // If product is updated, then timestamp already exists, so print it
                            if ($is_update) {
                                echo
                                "<p>{$input_name}: {$record[$input_name]}</p>";
                            }
                            break;
                        
                        case 'tinyint':
                            $is_checked = $record[$input_name] ? "checked" : Null;
                            echo
                            "<div class='form-check'>
                                <input {$required_attr} class='form-check-input' type='checkbox' name='{$input_name}' value='' id='flexCheckDefault' ".$is_checked.">
                                <label class='text-secondary' class='form-check-label' for='flexCheckDefault'>
                                $input_name
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
                                    <option class='text-dark' hidden disabled selected value='{$input_value}'>".$input_value."</option>
                            ";
                            // List records from the foreign table
                            foreach ($options as $option) {
                                $option = trim($option, "')");
                                echo "<option class='text-dark' name='{$input_name}' value='{$option}'>{$option}</option>";
                            }
                            echo 
                            "
                                </select>
                                <label class='text-secondary' for='floatingSelect'>".ucfirst(explode('_', $input_name, 2)[0])."</label>
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




