<?php
// THIS FILE CONTAINES ALL VARIABLES USED AS LINKS (should go after path.php)

//images
$linktoIcon = ROOTURL.'/assets/img/icon64x64.png';
$logo = ROOTURL."/assets/img/logo5.png";
$libraryEmpty = ROOTURL."/assets/img/library/empty_library.png";
$libraryLoggedout = ROOTURL."/assets/img/library/library_loggedout.png";
$imgSlideshow = "http:///unsplash.it/1000/350?gravity=center";
$aboutAddressMap = ROOTURL."/assets/img/about-address-map.jpg";
//images - catalog
$instruments_section = ROOTURL.'/assets/img/catalog/instruments-section.jpg'; //how to insert to scss?
$electro_guitar_subcat = ROOTURL.'/assets/img/catalog/guitar/electro-guitar/item2(horiz).jpeg';
$electro_guitar = ROOTURL.'/assets/img/catalog/electric-guitar-category.jpg';
$acoustic_guitar = ROOTURL.'/assets/img/catalog/product-gallery.jpg';

//links
$linkstoJS = array(
    '<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>',
    '<script src="'.ROOTURL.'/assets/js/script.js"></script>',
    '<script src="'.ROOTURL.'/assets/js/collapsableFilters.js"></script>',
);
$linktoCSS = ROOTURL.'/assets/styles/style.css';
$gotoNewReleases = '#releases'; 
$gotoAccount = ROOTURL.'/app/signin/signin.php';
$gotoProfile = ROOTURL.'/app/profile/profile.php';
$gotoCart = ROOTURL.'/app/profile/cart.php';
$gotoHome = ROOTURL.'/index.php';
$gotoAbout = ROOTURL.'/app/about/about.php';
$gotoCreators = '#creators';
$gotoHistory = '#history';
$gotoCatalog = ROOTURL.'/app/catalog/catalog-home.php';
$gotoCatCat = ROOTURL.'/app/catalog/catalog-cat.php';
$gotoCatSubcat = ROOTURL.'/app/catalog/catalog-subcat.php';
$gotoCatSS = ROOTURL.'/app/catalog/catalog-ss.php';
$gotoCatSSS = ROOTURL.'/app/catalog/catalog-sss.php';
$gotoProduct = ROOTURL.'/app/catalog/product.php';
$gotoLibrary = ROOTURL.'/app/library/library0.php';
$gotoLogin = '#login';
$gotoSignUp = '#signup';
$gotoAdmin = ROOTURL.'/app/admin/admin.php';

?>