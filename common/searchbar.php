<?php

//session started already
if (isset($_SESSION['user_id'])) {
   if (! isset($user)){ 
    $mysqli = require DB_CONNECT;
        $sql = "SELECT * FROM user WHERE id = {$_SESSION['user_id']}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        
        }
}

?>

<header class="header">
    <a href="<?php echo $gotoHome ?>" id="logo">
        <img id="logo-img" src="<?php echo $logo ?>" alt="Music House Logo"/>
    </a>
    <form action="" class="search-bar">
        <input type="search" class="search-input" placeholder="Search" aria-label="Search" maxlength="100">
        <button type="submit" class="search-btn">
            <span class="material-icons">search</span>
        </button>
        <button type="button" class="open-filters-btn">
            <span class="material-icons">tune</span>
        </button>
    </form>
    
    <?php if (isset($_SESSION["user_id"])): // if user is logged in?>

        <div class="menu-icons">
        <a class="menu-cart-btn menu-btn" href="<?php echo $gotoCart ?>">
            <span class="material-icons" alt="Cart">local_mall</span>
        </a>
        <a class="menu-btn" href="<?php echo $gotoProfile ?>">
            <img class="menu-account-picture" src="<?= ROOTURL.$user["image_path"] ?>" alt="Profile">
        </a>
        <a class="menu-btn" href="<?php echo $logout ?>">
        <span class="material-icons">logout</span>
</a>
        </div>

    <?php else: // if user is NOT logged in ?>

        <div class="menu-icons">
        <a class="menu-cart-btn menu-btn" href="<?php echo $gotoLogin ?>">
            <span class="material-icons" alt="Cart">local_mall</span>
        </a>
        <a class="menu-account-btn menu-btn" href="<?php echo $gotoLogin ?>">
            <span class="material-icons menu-account-icon">account_circle</span>
            <span class="menu-account-label">SIGN IN</span>
        </a>
        
        </div>

    <?php endif; ?>
</header>
