<?php
// THIS FILE CONTAINES ALL VARIABLES USED AS LINKS (should go after path.php)

//images
$logo = ROOTURL."/assets/img/logo2.png";
$libraryEmpty = ROOTURL."/assets/img/library/empty_library.png";
$libraryLoggedout = ROOTURL."/assets/img/library/library_loggedout.png";
$imgSlideshow = "http:///unsplash.it/1000/350?gravity=center";

//links
$linkstoJS = array(
    '<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>',
    '<script src="'.ROOTURL.'/assets/js/script.js"></script>',
    '<script src="'.ROOTURL.'/assets/js/collapsableFilters.js"></script>',
);
$linktoCSS = ROOTURL.'/assets/styles/style.css';
$linktoIcon = ROOTURL.'/assets/img/icon32x32.png';
$gotoNewReleases = '#releases'; 
$gotoAccount = '#account';
$gotoCart = '#cart';
$gotoHome = ROOTURL.'/index.php';
$gotoAbout = '#about';
$gotoCreators = '#creators';
$gotoHistory = '#history';
$gotoLibrary = ROOTURL.'/app/library/library0.php';
$gotoProduct = '#product';
$gotoLogin = '#login';
$gotoSignUp = '#signup';
?>