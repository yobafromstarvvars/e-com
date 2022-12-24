<header class="header">
    <form action="" class="search-bar">
        <input type="search" class="search-input" placeholder="Search" aria-label="Search" maxlength="100">
        <button type="submit" class="search-btn" onclick="myFunction()">
            <span class="material-icons">search</span>
        </button>
        <button type="button" class="open-filters-btn">
            <span class="material-icons">tune</span>
        </button>
    </form>
    
    <div class="menu-icons">
        
        <a class="menu-cart-btn menu-btn" href="<?php echo $gotoCart ?>">
            <span class="material-icons" alt="Cart">local_mall</span>
        </a>
        <a class="menu-account-btn menu-btn" href="<?php echo $gotoAccount ?>">
            <span class="material-icons menu-account-icon">account_circle</span>
            <span class="menu-account-label">SIGN IN</span>
        </a>
    </div>
</header>
