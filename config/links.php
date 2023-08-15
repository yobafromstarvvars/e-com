<?php
// THIS FILE CONTAINES ALL VARIABLES USED AS LINKS (should go after path.php)

//images
$linktoIcon = ROOTURL.'assets/img/icon64x64.png';
$logo = ROOTURL . "assets/img/logo5.png";
$libraryEmpty = ROOTURL . "assets/img/library/empty_library.png";
$libraryLoggedout = ROOTURL . "assets/img/library/library_loggedout.png";
$imgSlideshow = "http:///unsplash.it/1000/350?gravity=center";
$aboutAddressMap = ROOTURL . "assets/img/about-address-map.jpg";
//images - catalog
$product_placeholder_img = ROOTURL. 'assets/img/catalog/not-available.png';


// Default javascript files
$linkstoJS = array(
    '<script defer src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>',
    '<script defer src="'.ROOTURL.'assets/js/script.js"></script>',
    '<script defer src="'.ROOTURL.'assets/js/collapsableFilters.js"></script>',
);
$linkstoCSS = array(
    
    '<link rel="stylesheet" href="'.ROOTURL.'assets/styles/style.css"/>',
);

$linktoCSS = ROOTURL.'assets/styles/style.css';
$gotoNewReleases = '#releases'; 
$gotoProfile = ROOTURL. 'app/profile/profile.php';
$gotoChangeProfileInfo = ROOTURL. 'app/profile/change-profile-info.php';
$gotoCart = ROOTURL. 'app/profile/cart.php';
$gotoHome = ROOTURL.'index.php';
$gotoAbout = ROOTURL. 'app/about/about.php';
$gotoCreators = '#creators';
$gotoHistory = '#history';

$gotoCatalog = ROOTURL. 'app/catalog/catalog-home.php'; // catalog main
$gotoCategory = ROOTURL. 'app/catalog/catalog-cat.php'; // catalog category
$gotoSubcat = ROOTURL. 'app/catalog/catalog-subcat.php'; // subcategory
$gotoProduct = ROOTURL. 'app/catalog/product.php'; // product page

$gotoLibrary = ROOTURL. 'app/library/library0.php';
$gotoLogin = ROOTURL. 'app/login/login.php';
$gotoSignUp = ROOTURL. 'app/signup/signup.php';
$gotoAdmin = ROOTURL. 'app/admin/admin.php';
$logout = ROOTURL. 'logout.php';
$addRemoveToCart = ROOTURL. 'addRemoveToCart.php';

// Admin panel links
$gotoAdminOrders = ROOTURL. 'app/admin/admin-order.php';
$gotoAdminUser = ROOTURL. 'app/admin/admin-user.php';
$gotoAdminProduct = ROOTURL. 'app/admin/admin-product.php';
$gotoAdminCategory = ROOTURL. 'app/admin/admin-category.php';
$gotoAdminSubcategory = ROOTURL. 'app/admin/admin-subcategory.php';
$gotoAdminType = ROOTURL. 'app/admin/admin-type.php';
$gotoAdminBrand = ROOTURL. 'app/admin/admin-brand.php';

?>