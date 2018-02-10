<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
  .dropdown-submenu {
    position: relative;
  }

  a.dropdown-item:hover {
    /*background-color: green; */
  }

  .dropdown-submenu a::after {
    transform: rotate(-90deg);
    position: absolute;
    right: 6px;
    top: .8em;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-left: .1rem;
    margin-right: .1rem;
  }
</style>

<body>
  <h1>Hello, world!</h1>


<!-- search php code -->
  <div id="mysearch-3" class="widget-odd widget-first widget-1 searchclass widget widget_search card bg-light mb-3">
        <h5 class="card-header">Search </h5>
          <div class="card-body">

           <form role="search" method="get" class="search-form bd-search d-flex align-items-center" action=" <?php echo get_site_url(); ?>">
    					  <input type="search" class="search-field form-control ds-input" placeholder="Find … "  value="" autocomplete="off"  name="s" aria-label="Search">
                <input type="submit" class="search-submit d-md-none  btn btn-secondary " value="Search">
    			</form>
        </div>
        </div>

<!-- recent blog php code  -->
<div id="my-recent-blog"  class="card bg-light mb-3">
  <h5 class="card-header">Recent Posts</h5>
  <div class="card-body">
    <ul>
      <?php

      $args = array(
        'numberposts' => 8,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'category__not_in' => 7,

      );

      $recent_posts = wp_get_recent_posts($args);
      foreach ($recent_posts as $recent) {
        printf(
          '<li ><a class="my_anchor" href="%1$s">%2$s</a></li>',
          esc_url(get_permalink($recent['ID'])),
          $recent['post_title']
        );
      }
      wp_reset_query();
      ?>
    </ul>
  </div>
</div>









      <!-- navbar 1 -->

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <!--
      <ul id="primary-menu" class="navbar-nav mr-auto">
        <li id="menu-item-1725" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1725 nav-item"><a href="#" class="nav-link">Home</a></li>
        <li id="menu-item-1726" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1726 dropdown nav-item"><a href="#" class="nav-link dropdown-toggle">Blog</a>
          <ul class="sub-menu dropdown-menu">
            <li id="menu-item-1727" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1727"><a href="#" class="dropdown-item">Blog 1</a></li>
            <li id="menu-item-1728" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1728"><a href="#" class="dropdown-item">Blog 2</a></li>
            <li id="menu-item-1729" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1729 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Blog 3</a>
              <ul class="sub-menu dropdown-menu">
                <li id="menu-item-1731" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1731 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Bsub3</a>
                  <ul class="sub-menu dropdown-menu">
                    <li id="menu-item-1732" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1732 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Bsub3a</a>
                      <ul class="sub-menu dropdown-menu">
                        <li id="menu-item-1733" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1733"><a href="#" class="dropdown-item">Bsub3b</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li id="menu-item-1730" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1730 nav-item"><a href="#" class="nav-link">Contact</a></li>
      </ul>
-->
          <ul id="primary-menu" class="navbar-nav mr-auto">

            <li id="menu-item-1726" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1726 dropdown nav-item"><a href="#" class="nav-link dropdown-toggle">Blog</a>
              <ul class="sub-menu dropdown-menu">

                <li id="menu-item-1729" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1729 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Blog 3</a>
                  <ul class="sub-menu dropdown-menu">
                    <li id="menu-item-1731" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1731 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Bsub3</a>
                      <ul class="sub-menu dropdown-menu">
                        <li id="menu-item-1732" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1732 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Bsub3a</a>
                          <ul class="sub-menu dropdown-menu">
                            <li id="menu-item-1733" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1733"><a href="#" class="dropdown-item">Bsub3b</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li id="menu-item-1730" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1730 nav-item"><a href="#" class="nav-link">Contact</a></li>
          </ul>


          <ul id="primary-menu" class="navbar-nav mr-auto">


            <li id="menu-item-1712" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1712"><a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">Level 1</a>
              <ul class="sub-menu">


                <li id="menu-item-1715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1715"><a href="#">Level 2</a>
                  <ul class="sub-menu">


                    <li id="menu-item-1715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1715"><a href="#">Level 3c</a>
                      <ul class="sub-menu">
                        <li id="menu-item-1719" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1719"><a href="#">Level 4b</a></li>
                        <li id="menu-item-1720" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1720"><a href="#">Level 4a</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>

          <!--
      <ul id="primary-menu" class="navbar-nav mr-auto">
        <li class="active"> <a href="#">Home <span class="sr-only">(current)</span></a> </li>
        <li id="menu-item-1705" class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-1705"><a href="#">Crap </a></li>
        <li id="menu-item-1712" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1712"><a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">Level 1</a>
          <ul class="sub-menu">
            <li id="menu-item-1713" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1713"><a href="#">Level 2b</a></li>
            <li id="menu-item-1714" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1714"><a href="#">Level 2a</a></li>
            <li id="menu-item-1715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1715"><a href="#">Level 2</a>
              <ul class="sub-menu">
                <li id="menu-item-1716" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1716"><a href="#">Level 3b</a></li>
                <li id="menu-item-1717" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1717"><a href="#">Level 3a</a></li>
                <li id="menu-item-1715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1715"><a href="#">Level 3c</a>
                  <ul class="sub-menu">
                    <li id="menu-item-1719" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1719"><a href="#">Level 4b</a></li>
                    <li id="menu-item-1720" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1720"><a href="#">Level 4a</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
-->
        </div>
      </nav>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script>
        var $childrenli = $('.navbar-nav.mr-auto>li'),
          $mrauto = $('.navbar-nav.mr-auto');
        // initialize to bootstrap classes - rbtm
        $childrenli.children('ul').parent('li').addClass('dropdown');
        $childrenli.addClass('nav-item').children('a').addClass('nav-link');
        $childrenli.children('ul').siblings('a').attr('id', 'navbarDropdownMenuLink').attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');
        $mrauto.find('ul a').addClass('dropdown-item');
        $mrauto.find('ul').addClass('dropdown-menu').siblings('a').addClass('dropdown-toggle').parent('li').addClass('dropdown-submenu');
        $mrauto.children('li').removeClass('dropdown-submenu');

        // multilevel
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
          if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
          }
          var $subMenu = $(this).next(".dropdown-menu");
          $subMenu.toggleClass('show');


          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
          });


          return false;
        });
      </script>
</body>

</html>
