<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.css?v=<?php echo time(); ?>">
    <title>Environmental Dashboard</title>
  </head>
  <body>
    <div class="container">
      <?php include 'includes/header.php'; ?>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" style="top: 10px">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-welcome1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-our-mission.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-project1.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-resources1.jpg" alt="Fourth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-schools1.jpg" alt="Fifth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-digital-signage1.jpg" alt="Sixth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-community-voices1.jpg" alt="Seventh slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://environmentaldashboard.org/wp-content/uploads/2015/07/homepage-slider2-building-dbs2.jpg" alt="Eighth slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
        <div class="col-12 col-sm-4 text-center">
          <a href="citywide-dashboard">
            <img src="http://environmentaldashboard.org/wp-content/uploads/2015/07/icons-cleveland1-300x300.png" alt="" class="img-fluid" onmouseover="this.src='http://environmentaldashboard.org/wp-content/uploads/2015/07/cwd_icon_hr-300x300.png'" onmouseout="this.src='http://environmentaldashboard.org/wp-content/uploads/2015/07/icons-cleveland1-300x300.png'">
          </a>
          <h4 style="color: #5aba50;margin-top: 10px">Citywide Dashboard</h4>
          <p style="text-align: initial;padding: 0px 15px;">An animated display of current electricity and water use and environmental conditions in the entire community. “Flash” the energy squirrel and “Walley the Walleye” narrate the dynamic story.</p>
        </div>
        <div class="col-12 col-sm-4 text-center">
          <a href="building-dashboards">
            <img src="http://environmentaldashboard.org/wp-content/uploads/2015/07/icons-town1-300x300.png" alt="" class="img-fluid" onmouseover="this.src='http://environmentaldashboard.org/wp-content/uploads/2015/07/building_dashboard_icon_ed_hr-300x300.png'" onmouseout="this.src='http://environmentaldashboard.org/wp-content/uploads/2015/07/icons-town1-300x300.png'">
          </a>
          <h4 style="color: #5aba50;margin-top: 10px">Building Dashboards</h4>
          <p style="text-align: initial;padding: 0px 15px;">Measure electricity and water consumption in schools, businesses, public facilities and homes and translate this into animated displays.</p>
        </div>
        <div class="col-12 col-sm-4 text-center">
          <a href="community-voices">
            <img src="http://environmentaldashboard.org/wp-content/uploads/2015/07/icons-home-family-300x300.png" alt="" class="img-fluid" onmouseover="this.src='http://environmentaldashboard.org/wp-content/uploads/2015/07/cv_logo_hr-300x300.png'" onmouseout="this.src='http://environmentaldashboard.org/wp-content/uploads/2015/07/icons-home-family-300x300.png'">
          </a>
          <h4 style="color: #5aba50;margin-top: 10px">Community Voices</h4>
          <p style="text-align: initial;padding: 0px 15px;">Combines images thoughts, ideas and actions of community members and groups to celebrate and empower positive action.</p>
        </div>
      </div>
      <?php include 'includes/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
/*!
 * Bootstrap 4 multi dropdown navbar ( https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-navbar/ )
 * Copyright 2017.
 * Licensed under the GPL license
 */
// $(document).ready(function() {
//   $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
//     var $el = $(this);
//     var $parent = $(this).offsetParent(".dropdown-menu");
//     if (!$(this).next().hasClass('show')) {
//       $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
//     }
//     var $subMenu = $(this).next(".dropdown-menu");
//     $subMenu.toggleClass('show');

//     $(this).parent("li").toggleClass('show');

//     $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
//       $('.dropdown-menu .show').removeClass("show");
//     });

//     if (!$parent.parent().hasClass('navbar-nav')) {
//       $el.next().css({
//         "top": $el[0].offsetTop,
//         "left": $parent.outerWidth() - 4 // CHANGE THIS TO REPOSITION DROPDOWN
//       });
//     }

//     return false;
//   });

  // $('#hover1').on('mouseenter', function() {
  //   $('#hover_target1').dropdown('toggle');
  // });
  // $('#hover1').on('mouseleave', function() {
  //   $('#hover_target1').dropdown('toggle');
  // });
// });

    </script>
  </body>
</html>