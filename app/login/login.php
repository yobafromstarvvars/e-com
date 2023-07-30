<?php 
require "../../config/loadConfig.php";
$is_invalid = False;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $mysqli = require DB_CONNECT;
        $sql = sprintf("SELECT * FROM user WHERE email = '%s'", 
                        $mysqli->real_escape_string(strtolower($_POST["email"])));
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        if ($user) {
            if ($user["is_active"])
                {if (password_verify($_POST['password'], $user["password_hash"])) {
                    
                    session_regenerate_id();
                    $_SESSION["user_id"] = $user["id"];

                    header('Location: ' . $gotoHome);
                }}
        }
        $is_invalid = True;
    }
    
?>
    <body>
        <?php
            // Fixed position settings are in _searchbar.scss
            echo '<div class="fixed-at-top">';
                require SEARCHBAR;       
                require FILTERSROW;
            echo '</div>';

            require SIDEPANEL;

            echo '<div id="main">';
                require LOGIN1;
                //require FOOTER;         
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
            // JustValidate library. It handles form validation
            echo '<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>';
            echo "<script defer src='". ROOTURL . "/assets/js/login_validation.js" ."'></script>";
        ?>
    </body>
</html>
