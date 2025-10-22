<?php
/* ------------------------------------------------------------
  Module "Bootstrap 5 Template-Manager" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

/* --------------------------------------------------------------

https://github.com/andycaygill/scroll-entrance
The MIT License (MIT)

Add required CSS in the <head> of your page

This is required to make sure the elements are hidden while the JavaScript is loading

<style>
      // Ensure elements are hidden while ScrollEntrance is loading
      [data-entrance] { visibility: hidden; }
</style>

Note: It is recommended you use detect for JavaScript using Modernizr and add the .js css, this will ensure the elements aren't hidden if JavaScript is disabled.

<style>
      // Ensure elements are hidden while ScrollEntrance is loading
      .js [data-entrance] { visibility: hidden; }
</style>

4. Add the 'data-entrance=' attribute to the elements you want to animate

Example:

<div class="panel" data-entrance="fade">
      <p>This will fade the element in</p>
</div>

You can use the following preset transitions to animate elements into view.

data-entrance="fade"
data-entrance="from-left"
data-entrance="from-right"
data-entrance="from-top"
data-entrance="from-bottom"

Advanced Usage:
Delaying a transition

Add the 'data-entrance-delay' attribute to delay a transition, for example:

<div class="panel" data-entrance="from-left" data-entrance-delay="1000">
      <p>This will fade the element in from the left after 1000 milleseconds</p>
</div>

Defining custom animations

Set the 'data-entrance' attribute to the name of your animation

<div class="panel" data-entrance="my-custom-animation">
      <p>This will animate the element in using a custom animation, defined in your css file</p>
</div>

Define the behaviour of your custom animation in your css file

// This is the initial state before animating
[data-entrance="my-custom-animation"]{
	transform: rotate(180deg);
    opacity: 0;
}
// This is the state after animating
[data-entrance="my-custom-animation"].has-animated{
	transform: rotate(0deg);
    opacity: 1;
}
   --------------------------------------------------------------*/

if (BS5_USE_SCROLL_ENTRANCE_JS == 'true') {
?>
<script>
!function(){entrance={},entrance.duration="1000",entrance.distance="100",entrance.heightOffset=100,entrance.isElemInView=function(e){var t=e.getBoundingClientRect();return t.top+entrance.heightOffset>=0&&t.top+entrance.heightOffset<=window.innerHeight||t.bottom+entrance.heightOffset>=0&&t.bottom+entrance.heightOffset<=window.innerHeight||t.top+entrance.heightOffset<0&&t.bottom+entrance.heightOffset>window.innerHeight},entrance.setInitialStyles=function(e){document.body.style.overflowX="hidden";e.classList.add('js');var t=e.getAttribute("data-entrance"),n=e.getAttribute("data-entrance-delay");e.style.transition="all "+entrance.duration/1e3+"s ease",n&&(e.style.transitionDelay=n/1e3+"s"),"fade"==t&&(e.style.opacity="0"),"from-left"==t&&(e.style.opacity="0",e.style.transform="translate(-"+entrance.distance+"px, 0)"),"from-right"==t&&(e.style.opacity="0",e.style.transform="translate("+entrance.distance+"px, 0)"),"from-top"==t&&(e.style.opacity="0",e.style.transform="translate(0, -"+entrance.distance+"px)"),"from-bottom"==t&&(e.style.opacity="0",e.style.transform="translate(0, "+entrance.distance+"px)")},entrance.enter=function(e){e.style.visibility="visible",e.style.opacity="1",e.style.transform="translate(0, 0)",e.className+=" has-entered"},entrance.viewportChange=function(){Array.prototype.map.call(entrance.elements,function(e){if(entrance.isElemInView(e)){var t=e.classList.contains("has-entered");t||entrance.enter(e)}})},entrance.init=function(){entrance.elements=document.querySelectorAll("[data-entrance]"),Array.prototype.map.call(entrance.elements,function(e){entrance.setInitialStyles(e),entrance.isElemInView(e)&&addEventListener("load",function(){entrance.enter(e)},!1)});addEventListener("scroll",entrance.viewportChange,!1);addEventListener("resize",entrance.viewportChange,!1)},addEventListener("DOMContentLoaded",entrance.init,!1)}();
</script>
<?php }