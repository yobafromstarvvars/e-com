<?php
// CONTAINS CONSTANTS OF PATHS TO WEBSITE FILES (CSS, JS PATHS ARE IN links.php)

    // Initialize the php file
    define('ROOTPATH', dirname(__DIR__));
    define('ROOTURL', '/root');

    //common
    define ('SIDEPANEL',    realpath(ROOTPATH.'/common/sidepanel.php'));
    define ('SEARCHBAR',    realpath(ROOTPATH.'/common/searchbar.php'));
    define ('FILTERSROW',   realpath(ROOTPATH.'/common/filters.php'));
    define ('FOOTER',       realpath(ROOTPATH.'/common/footer.html'));
    define ('HEAD',         realpath(ROOTPATH.'/common/head.php'));

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
    define ('PATH',         realpath(ROOTPATH.'/common/path.php'));
    
    //pages
    define ('LIBRARY0CONTENT', realpath(ROOTPATH.'/app/library/_library0.php'));


?>