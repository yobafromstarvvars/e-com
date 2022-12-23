<!-- Initialized in index.html -->
<?php
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
    define ('COMICS',       realpath(ROOTPATH.'/common/_comictemp.php'));
    define ('SLIDE',        realpath(ROOTPATH.'/app/index/_slidetemp.php'));

    //help files
    define ('HOMECONTENT',  realpath(ROOTPATH.'/app/index/_index.php'));
    define ('SLIDESHOW',    realpath(ROOTPATH.'/app/index/_slideshow.php'));
    define ('CAROUSEL',     realpath(ROOTPATH.'/app/index/_carousel.php'));
    define ('NEWRELEASES',  realpath(ROOTPATH.'/_newreleases.php'));

    //pages
    define ('LIBRARY0CONTENT', realpath(ROOTPATH.'/app/library/_library0.php'));
?>