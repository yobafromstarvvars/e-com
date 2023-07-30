<?php
// CONTAINS CONSTANTS OF PATHS TO WEBSITE FILES (CSS, JS PATHS ARE IN links.php)

    // Initialize the php file
    define('ROOTPATH', dirname(__DIR__));
    define('ROOTURL', '/other/music_house');

    define("DB_CONNECT", realpath(__DIR__."/db_connect.php"));

    // For checking is_admin
    define("CHECK_ADMIN",   realpath(ROOTPATH.'/app/admin/check-admin.php'));

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
 
    define ('CATEGORYHOME', realpath(ROOTPATH.'/app/catalog/_catalog-home.php'));
    define ('CATEGORY_SUBCAT',realpath(ROOTPATH.'/app/catalog/_catalog-subcat.php'));

    define ('CATEGORY_PAGE',     realpath(ROOTPATH.'/app/catalog/catalog-cat.php'));
    define ('CATEGORY_INFO',     realpath(ROOTPATH.'/app/catalog/_catalog-cat.php'));

    define ('CATALOGFILTERS',realpath(ROOTPATH.'/app/catalog/_catalog-filters.php'));
    define ('PRODUCTINFO',  realpath(ROOTPATH.'/app/catalog/_product-info.php'));
    define ('LOGIN1',       realpath(ROOTPATH.'/app/login/_login-form1.php'));
    define ('SIGNUP1',      realpath(ROOTPATH.'/app/signup/_signup-form1.php'));
    define ('ABOUTMAIN',    realpath(ROOTPATH.'/app/about/_about-main.php'));
    define ('PROFILEMAIN',  realpath(ROOTPATH.'/app/profile/_profile-main.php'));
    define ('CARTMAIN',     realpath(ROOTPATH.'/app/profile/_cart-main.php'));
    define ('CHECKOUTMAIN', realpath(ROOTPATH.'/app/profile/_checkout.php'));
    define ('ADMIN_MAIN',   realpath(ROOTPATH.'/app/admin/_admin-main.php'));
    
    //pages
    define ('LIBRARY0CONTENT', realpath(ROOTPATH.'/app/library/_library0.php'));


?>