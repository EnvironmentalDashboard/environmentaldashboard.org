<!doctype html>
<html lang="en">

<head>
  <meta name="description" content="Environmental Dashboard. A technology & approach for organizations and whole communities that combines feedback, through real-time public displays of resource use and environmental conditions, with thoughts and actions of community to engage, motivate, empower & celebrate sustainable thought and action.">
  <?php include 'includes/html-head.php'; ?>
</head>
<style>
  .brand-item-container {
    display: flex;
    justify-content: center;
  }

  .brand-items {
    text-align: center;
  }

  .brand-item-container .img-fluid {
    /* max-width: 255px;
    height: 255px;
    width: 100%; */
    aspect-ratio: 1;
    background: #dfdfdf;
    border-radius: 0.75vw;
    border-color: transparent;
  }

  .brand-items:hover .face-image {
    display: none;
  }

  .brand-items:hover .hover-image {
    display: block;
  }

  .brand-items .hover-image {
    display: none;
  }
</style>
<script>
  function removeBackground(image) {
    image.style.backgroundColor = 'transparent'
  }
</script>

<body>
  <!-- isEmbedded is defined in header.php-->
  <?php include 'includes/header.php'; ?>

  <div class="container p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators" style="top: 10px; height: 5px">
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
          <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-welcome1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <a href="<?= $generateURL('mission') ?>">
            <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-our-mission.jpg" alt="Second slide">
          </a>
        </div>
        <div class="carousel-item">
          <a href="<?= $generateURL('story-of-dashboard') ?>">
            <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-project1.jpg" alt="Third slide">
          </a>
        </div>
        <div class="carousel-item">
          <a href="<?= $generateURL('resources-explained') ?>">
            <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-resources1.jpg" alt="Fourth slide">
          </a>
        </div>
        <div class="carousel-item">
          <a href="https://oberlin.communityhub.cloud/dh-public/ops-embed?active-page=exploreData" <?= $target ?>>
            <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-schools1.jpg" alt="Fifth slide">
          </a>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-digital-signage1.jpg" alt="Sixth slide">
        </div>
        <div class="carousel-item">
          <a href="<?= $generateURL('community-voices') ?>">
            <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-community-voices1.jpg" alt="Seventh slide">
          </a>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://environmentaldashboard.org/images/uploads/2015/07/homepage-slider2-building-dbs2.jpg" alt="Eighth slide">
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
    <div class="row" style="margin-top: 20px;margin-bottom: 20px;padding-right: 15px;padding-left: 15px">
      <div class="col-12 col-lg-3 col-md-6 brand-items">
        <a class="brand-item-container" href="<?= $generateURL('cwd') ?>">
          <img onload="removeBackground(this)" src="https://environmentaldashboard.org/images/uploads/2015/07/icons-cleveland1-300x300.png" class="face-image img-fluid">
          <img onload="removeBackground(this)" src="https://environmentaldashboard.org/images/uploads/2015/07/cwd_icon_hr-300x300.png" class="hover-image img-fluid">
        </a>
        <h4 class="primary-heading">Citywide Dashboard</h4>
        <p class="primary-heading-content">An animated display of current electricity and water use and environmental conditions in the entire community. “Flash” the energy squirrel and “Walley the Walleye” narrate the dynamic story.</p>
      </div>
      <div class="col-12 col-lg-3 col-md-6 brand-items">
        <a class="brand-item-container" href="<?= $generateURL('building-dashboard-explained') ?>">
          <img onload="removeBackground(this)" src="https://environmentaldashboard.org/images/uploads/2015/07/icons-town1-300x300.png" class="face-image img-fluid">
          <img onload="removeBackground(this)" src="https://environmentaldashboard.org/images/uploads/2015/07/building_dashboard_icon_ed_hr-300x300.png" class="hover-image img-fluid">
        </a>
        <h4 class="primary-heading">Building Dashboards</h4>
        <p class="primary-heading-content">Measure electricity and water consumption in schools, businesses, public facilities and homes and translate this into animated displays.</p>
      </div>
      <div class="col-12 col-lg-3 col-md-6 brand-items">
        <a class="brand-item-container" href="<?= $generateURL('community-voices') ?>">
          <img onload="removeBackground(this)" src="https://environmentaldashboard.org/images/uploads/2015/07/icons-home-family-300x300.png" class="face-image img-fluid">
          <img onload="removeBackground(this)" src="https://environmentaldashboard.org/images/uploads/2015/07/cv_logo_hr-300x300.png" class="hover-image img-fluid">
        </a>
        <h4 class="primary-heading">Community Voices</h4>
        <p class="primary-heading-content">Combines images thoughts, ideas and actions of community members and groups to celebrate and empower positive action.</p>
      </div>
      <div class="col-12 col-lg-3 col-md-6 brand-items">
        <a class="brand-item-container" href="<?= $generateURL('calendar') ?>">
          <img onload="removeBackground(this)" src="images/Homepageonhovercalendarcovericon.png" class="face-image img-fluid">
          <img onload="removeBackground(this)" src="images/Homepageonhover.png" class="hover-image img-fluid">
        </a>
        <h4 class="primary-heading">Community Calendar</h4>
        <p class="primary-heading-content">The Community Calendar is a free, public website, where events submitted by community members are displayed both on this site and on digital signs installed in Oberlin.</p>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/js.php'; ?>
</body>

</html>