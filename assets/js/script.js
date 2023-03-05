
//
//DROPLISTS --- script for resizing format drop lists --- make loop for a number imported from DB instead of static number
//
$(document).ready(function() {
  $('#instrument').change(function(){
    $("#width_tmp_option").html($('#instrument option:selected').text());
    $(this).width($("#width_tmp_select").width());  
  });
  
  $('#manufacturer').change(function(){
    $("#width_tmp_option").html($('#manufacturer option:selected').text()); 
    $(this).width($("#width_tmp_select").width());  
  });

  $('#country').change(function(){
    $("#width_tmp_option").html($('#country option:selected').text()); 
    $(this).width($("#width_tmp_select").width());  
  });

  $('#type').change(function(){
    $("#width_tmp_option").html($('#type option:selected').text()); 
    $(this).width($("#width_tmp_select").width());  
  });
});




//
//SLIDESHOW
//
/*
var slideIndex = 1;
showSlides(slideIndex);

function plusSlide(n) {
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1); 
  }
  
}

function plusSlides(n) {
	clearInterval(myTimer);
    if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1); 
  }
	if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 10000);
  } 
  else {
    myTimer = setInterval(function(){plusSlides(n + 1)}, 10000);
  }
}

function currentSlide(n) {
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(n + 1)}, 10000);
  showSlides(slideIndex = n);
}

function showSlides(n) {
  pause = () => {
    clearInterval(myTimer);
  }

  resume = () =>{
    clearInterval(myTimer);
    myTimer = setInterval(function(){plusSlides(slideIndex)}, 7000);
  }

  var i;
  var slides = document.getElementsByClassName("slideshow-slide");
  var dots = document.getElementsByClassName("slideshow-dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      //dots[i].className = dots[i].className.replace(" active", "");
      dots[i].textContent = 'radio_button_unchecked';
  }
  slides[slideIndex-1].style.display = "block";
  //dots[slideIndex-1].className += " active";
  dots[slideIndex-1].textContent = 'circle';
}

window.addEventListener("load",function() {
    showSlides(slideIndex);
    myTimer = setInterval(function(){plusSlides(1)}, 10000);
})

var slideshowContainer = document.getElementsByClassName('slideshow-container')[0];slideshowContainer.addEventListener('mouseenter', pause)
slideshowContainer.addEventListener('mouseleave', resume)
*/

function bulletHover(dot) {
  if (dot.textContent != 'circle'){
    dot.textContent = 'adjust';
  }
}

function bulletOut(dot) {
  if (dot.textContent != 'circle'){
    dot.textContent = 'radio_button_unchecked';
  }
}

//
//
//SIDEBAR HIGHLIGHT FOR CURRENT PAGE
////
// 
$(function(){
    $('a').each(function(){
        if ($(this).prop('href') == window.location.href) {
            $(this).addClass('active'); $(this).parents('a').addClass('active');
        }
    });
});







