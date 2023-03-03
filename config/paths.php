<?php
// CONTAINS CONSTANTS OF PATHS TO WEBSITE FILES (CSS, JS PATHS ARE IN links.php)

    // Initialize the php file
    define('ROOTPATH', dirname(__DIR__));
    define('ROOTURL', '/root');

    define("DB_CONNECT", realpath(__DIR__."/db_connect.php"));

    //common
    define ('SIDEPANEL',    realpath(ROOTPATH.'/common/sidepanel.php'));
    define ('SEARCHBAR',    realpath(ROOTPATH.'/common/searchbar.php'));
    define ('FILTERSROW',   realpath(ROOTPATH.'/common/filters.php'));
    define ('FOOTER',       realpath(ROOTPATH.'/common/footer.html'));
    define ('HEAD',         realpath(ROOTPATH.'/common/head.php'));
    define ('PATH',         realpath(ROOTPATH.'/common/path.php'));

    //temps
    define ('CAROUSELTEMP', realpath(ROOTPATH.'/app/index/_carouseltemp.php'));
    define ('FILTER',       realpath(ROOTPATH.'/common/_filtertemp.php'));
    define ('PRODUCTS',     realpath(ROOTPATH.'/common/_producttemp.php'));
    define ('SLIDE',        realpath(ROOTPATH.'/app/index/_slidetemp.php'));

    //sections
    define ('HOMECONTENT',  realpath(ROOTPATH.'/app/index/_index.php'));
    define ('SLIDESHOW',    realpath(ROOTPATH.'/app/index/_slideshow.php'));
    define ('CAROUSEL',     realpath(ROOTPATH.'/app/index/_carousel.php'));
    define ('NEWRELEASES',  realpath(ROOTPATH.'/app/new-releases/new-releases.php'));
    define ('CATEGORY',     realpath(ROOTPATH.'/app/catalog/_category.php'));
    define ('CATEGORIES',   realpath(ROOTPATH.'/app/catalog/_categories.php'));
    define ('SUBCATEGORIES',realpath(ROOTPATH.'/app/catalog/_subcategories.php'));
    define ('SUBSUBCATS',   realpath(ROOTPATH.'/app/catalog/_ss-categories.php'));
    define ('SUBSUBSUBCATS',realpath(ROOTPATH.'/app/catalog/_sss-categories.php'));
    define ('SUBFILTERS',   realpath(ROOTPATH.'/app/catalog/_sub-filters.php'));
    define ('PRODUCTINFO',  realpath(ROOTPATH.'/app/catalog/_product-info.php'));
    define ('LOGIN1',       realpath(ROOTPATH.'/app/login/_login-form1.php'));
    define ('SIGNUP1',      realpath(ROOTPATH.'/app/signup/_signup-form1.php'));
    define ('ABOUTMAIN',    realpath(ROOTPATH.'/app/about/_about-main.php'));
    define ('PROFILEMAIN',  realpath(ROOTPATH.'/app/profile/_profile-main.php'));
    define ('CARTMAIN',     realpath(ROOTPATH.'/app/profile/_cart-main.php'));
    define ('CHECKOUTMAIN',   realpath(ROOTPATH.'/app/profile/_checkout.php'));
    define ('ADMIN_MAIN',   realpath(ROOTPATH.'/app/admin/_admin-main.php'));
    
    //pages
    define ('LIBRARY0CONTENT', realpath(ROOTPATH.'/app/library/_library0.php'));


?>