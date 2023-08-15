<?php

// Retrieve user information
$mysqli = require DB_CONNECT;
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

$is_invalid_ext = False;
$is_success_upload = False;
// Upload picture
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
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
            // Copy file to project folder
            $newname = "id".$user["id"]."-".date("Y-m-d-h-i-s").".".$ext;
            $newpath = realpath(ROOTPATH . "assets/img/profiles").DIRECTORY_SEPARATOR;
            $image_path_db = "/assets/img/profiles/".$newname;
            if (move_uploaded_file($_FILES['filename']['tmp_name'], $newpath.$newname)) {
                // Upload to database
                $sql = "UPDATE user SET image_link = (?) WHERE id = {$user['id']}";
                
                $stmt = $mysqli->stmt_init();
                if (! $stmt->prepare($sql)) {
                    die("SQL error: ". $mysqli->error);
                }
                $stmt->bind_param("s", $image_path_db);
                if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
                $is_success_upload = True;
                header("Location: ".$gotoProfile);
            }
        }
        else $is_invalid_ext = True;
    }    
}
?>

<div class="profile-main">
    <h1>Profile</h1>
    <h2>Contents</h2> 
    <ul>
        <li><a href="#description">Profile information</a></li>
        <li><a href="#settings">Settings</a></li>
        <?php if ($user["is_admin"] == True): ?>
            <li><a href="#admin">Access admin</a></li>
        <?php endif; ?>
        <li><a href="#order_history">Order history</a></li>
    </ul>
    <h2 id="description">Profile information</h2>
    <form method="post" enctype='multipart/form-data'>
    Update picture: <input type="file" id="filename" name="filename" size='10'>
    <input style="color:black;" type='submit' value="Upload">
    
</form>
    <?php if ($is_invalid_ext): ?>
        <p>Invalid extension. Acceptable: png, jpg/jpeg</p>
    <? elseif ($is_success_upload): ?>
        <p>Successful upload. Refresh the page to see results</p>
    <?php endif; ?>

    <img src='<?= ROOTURL.$user["image_link"]?>' style='width:100px; height:100px; border-radius:100px;'>
    <ul>
        <li><b>Name: </b><?= ucwords($user["name"])?></li>
        <li><b>Email: </b><?= strtolower($user["email"])?></li>
        <li><b>Joined: </b><?= $user["joined_date"]?></li>
    </ul>
    <h2 id="settings">Settings</h2>
    <ul>
        <li><a href="<?=$gotoChangeProfileInfo?>">Change profile information</a></li>
        <li><a href="delete_profile_confirm.php">Delete account</a></li>
    </ul>
    <?php if ($user["is_admin"] == True): ?>
        <h2 id="admin">Access admin</h2>
        <a class="goto-admin-panel-btn" href="<?php echo $gotoAdmin ?>">Go to admin panel</a>
    
    <?php endif; ?>
    <hr>

    <section>
        <h2 id="order_history">Order history</h2>
        <p>No order history</p>
    </section>

</div>