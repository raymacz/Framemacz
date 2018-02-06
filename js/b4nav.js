

(function($) {
/*
* Bootstrap 4 multilevel dropdown inside navigation
*/

var wheight = $(window).height(); //get the height of the window

var $childrenli = $('.navbar-nav>li'),
    $navbarnav = $('.navbar-nav');
// initialize it with bootstrap 4 classes - rbtm
$childrenli.children('ul').parent('li').addClass('dropdown');
$childrenli.addClass('nav-item').children('a').addClass('nav-link');
$childrenli.children('ul').siblings('a').attr('id', 'navbarDropdownMenuLink').attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');
$navbarnav.find('ul a').addClass('dropdown-item');
$navbarnav.find('ul').addClass('dropdown-menu').siblings('a').addClass('dropdown-toggle').parent('li').addClass('dropdown-submenu');
$navbarnav.children('li').removeClass('dropdown-submenu');
// add custom <a> classes to contrac
$childrenli.find('a').addClass('js-scroll-trigger');


// Nav dropdown functionality

  $('ul a.dropdown-toggle').on('click', function(e) {
    //var $nav_ctnr = $('nav div.collapse.navbar-collapse');
    var $nav_ctnr = $('#navbarResponsive');
    //console.log(e.currentTarget);
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });
      $nav_ctnr.addClass('show');    // rbtm
    return false;
  });

/*
console.log(wheight);
  $('header').css('height', wheight); //set to window tallness   027

    //adjust height of .fullheight elements on window resize 027
    $(window).resize(function() {
      wheight = $(window).height(); //get the height of the window
      $('header').css('height', wheight); //set to window tallness
    });
*/
})(jQuery);
