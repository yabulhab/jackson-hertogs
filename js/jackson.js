// Classie.js
/* ------------------------------------------------------------ *\
|* ------------------------------------------------------------ *|
|* Classie.js
|* https://github.com/desandro/classie/blob/master/classie.js
|* ------------------------------------------------------------ *|
\* ------------------------------------------------------------ */
( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );

// End classie.js


console.log("Working!");

$(document).ready(function(){
   var scroll_start = 0;
   var startchange = $('.nav');
   var offset = startchange.offset();
   $(document).scroll(function() {
     	var headerClass = $('#change-header').attr('class');
     	console.log("headerClass ", headerClass);
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) { // was transparent, turn white
      	var headerClass = $('#change-header').attr('class');
      	if(headerClass != undefined){
      		$('#change-header').attr('class', 'white-header');
      		$('#label').attr('class', 'white-header');

          $('#change-header #brand-large').attr('src', '/wp-content/themes/mytheme/images/jhLogoColor.png');
          $('#change-header #brand-small').attr('src', '/wp-content/themes/mytheme/images/jhLogoSmallColor.png');
      	}

       } else { //was white
       		if($('#change-header').attr('class') != undefined){
       			$('#change-header').attr('class', 'transparent-header');
       			$('#label').attr('class', 'transparent-header');

	          $('#change-header #brand-large').attr('src', '/wp-content/themes/mytheme/images/jhLogoWhite.png');
	          $('#change-header #brand-small').attr('src', '/wp-content/themes/mytheme/images/jhLogoSmallWhite.png');
        	}
       }
   });
});

// EXPANDY STUFF FROM THE INTERNET

window.onload = function(){

	//bind click events
	var $cell = $('.image__cell');

	$cell.find('.image--basic').click(function() {
	  var $thisCell = $(this).closest('.image__cell');

	  if ($thisCell.hasClass('is-collapsed')) {
	    $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed');
	    $thisCell.removeClass('is-collapsed').addClass('is-expanded');
	  } else {
	    $thisCell.removeClass('is-expanded').addClass('is-collapsed');
	  }
	});

	$cell.find('.expand__close').click(function(){

	  var $thisCell = $(this).closest('.image__cell');

	  $thisCell.removeClass('is-expanded').addClass('is-collapsed');
	});


	// SEARCH BAR
	// get vars
    var searchEl = document.querySelector("#input");
    var labelEl = document.querySelector("#label");

    // register clicks and toggle classes
    labelEl.addEventListener("click",function(){
        if (classie.has(searchEl,"focus")) {
            classie.remove(searchEl,"focus");
            classie.remove(labelEl,"active");
        } else {
            classie.add(searchEl,"focus");
            classie.add(labelEl,"active");
        }
    });

    // register clicks outisde search box, and toggle correct classes
    document.addEventListener("click",function(e){
        var clickedID = e.target.id;
        if (clickedID != "search-terms" && clickedID != "search-label") {
            if (classie.has(searchEl,"focus")) {
                classie.remove(searchEl,"focus");
                classie.remove(labelEl,"active");
            }
        }
    });


    // News Archive dropdown
    $(".newsArchiveHeader").click(function () {
    	console.log("toggling!")

    	$newsArchiveHeader = $(this);
	    //getting the next element
	    $newsArchiveContent = $newsArchiveHeader.next();
	    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.

	    var indicator = $(this).find("img");
	    var current = indicator.attr("src");
	    var swap = indicator.attr("data-swap");
	    indicator.attr('src', swap).attr("data-swap",current);

    $newsArchiveContent.slideToggle(500);

});



} //end window onload




