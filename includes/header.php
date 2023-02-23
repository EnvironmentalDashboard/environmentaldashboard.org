<?php if (posix_uname()['nodename'] === 'environmentaldashboard' && !isset($_COOKIE['token'])) { ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-65902947-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-65902947-1');
  </script>
<?php } ?>
<div class="row">
  <div class="col banner-col">
    <a href="/"><img src="../images/oberlin-banner.jpg" alt="" class="img-fluid"></a>
  </div>
</div>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background: #21a7df;padding-top: 0px;padding-bottom: 0px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown" id="hover1">
        <a class="nav-link dropdown-toggle" href="/cwd" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Citywide Dashboard
      </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1" id="hover_target1">
          <a class="dropdown-item" href="/cwd">Citywide View</a>
          <!-- <a class="dropdown-item" href="http://buildingdashboard.net/oberlincity/#/oberlincity/cityelectricity/">Electricity</a>
          <a class="dropdown-item" href="http://buildingdashboard.net/oberlincity/#/oberlincity/citywateruse">Water Flow</a>
          <a class="dropdown-item" href="http://buildingdashboard.net/oberlincity/#/oberlincity/citywaterquality">Water Quality</a>
          <a class="dropdown-item" href="http://buildingdashboard.net/oberlin/#/oberlin/spearpoint">10 Acre Solar Array</a> -->
          <a class="dropdown-item" href="/gauges-explained">Gauges explained</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/building-dashboard-explained" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Building Dashboard
      </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
          <a class="dropdown-item" href="/building-dashboard-explained">Building Dashboard Explained</a>

          <div class="dropdown">
            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Oberlin City</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
              <!-- <li><a class="dropdown-item" href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1390">Eastwood Elementary</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1391">Prospect Elementary</a></li> -->
              <li><a class="dropdown-item" href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1392">Langston Middle School</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1393">Oberlin High School</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1394">Langston Board Office</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1395">Oberlin Public Library</a></li>
            </ul>
          </div>

          <div class="dropdown">
            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Oberlin College</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
              <li><a class="dropdown-item" href="https://buildingos.com/reports/dashboards/282f6022666d11e7a61b525400d1fc46">College Dormitories</a></li>
              <li><a class="dropdown-item" href="https://palmer.buildingos.com/reports/dashboards/9cb16078634111e7985c525400e84168">AJLC</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/reports/dashboards/bc9d7c1a664c11e784ef525400d1fc46">Bosworth</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/reports/dashboards/75d11a74664e11e78654525400ac4414">Cox Administration</a></li>
              <li><a class="dropdown-item" href="https://buildingos.com/reports/dashboards/12ef3f22634b11e79136525400ac67dc">Alumni Office</a></li>
            </ul>
          </div>
          <!-- <a href="https://palmer.buildingos.com/reports/dashboards/c59fde5ec0db11e7aff5525400391da3" class="dropdown-item" target="_blank">Toledo Public Schools</a> -->
        </div>
      </li>
      <li class="nav-item">
        <!--<a class="nav-link" href="/community-voices/"></!--a> <-->
        <a class="nav-link" href="https://oberlin.communityhub.cloud/community-voices/">Community Voices</a>
      </li>
      <li class="nav-item">
        <!--<a class="nav-link" href="/calendar/">Events Calendar</a> <-->
        <a class="nav-link" href="https://oberlin.communityhub.cloud/calendar/">Events Calendar</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        More
      </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink6" style="left: -250%">
          <a class="dropdown-item" href="/resources-explained">Resources Explained</a>
          <a class="dropdown-item" href="/story-of-dashboard">Story of Dashboard</a>
          <a class="dropdown-item" href="/bring-dashboard-to-your-community">Bring Dashboard to Your Community</a>
          <a class="dropdown-item" href="/press-page">Press/Media</a>


          <div class="dropdown">
            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Instructor Toolkit</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink7">
              <li><a class="dropdown-item" href="/edresources">About</a></li>
              <li><a class="dropdown-item" href="/edresources/searchedresources">Search</a></li>
              <!-- <li><a class="dropdown-item" href="/edresources/workshops">Teacher Workshop</a></li> -->
            </ul>
          </div>

          <div class="dropdown">
            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink8">
              <li><a class="dropdown-item" href="/mission">Mission</a></li>
              <li><a class="dropdown-item" href="/meet-the-team">Meet the Team</a></li>
              <!-- <li><a class="dropdown-item" href="#">In the News</a></li> -->
            </ul>
          </div>

        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- start eco olympic banner -->
<div class="banner">
  <a class="nav-link" href="/ecolympics" title="Ecolympics 2023 April 10th - 23th">
    <img src="../images/ecolympics/ecolympicslogo.svg" alt="ecolympics logo" sizes="" class="ecolympics-logo">
    <div class="title">
      Ecolympics 2023 April 10th - 23th
    </div>
    <div class="sub-title">
      Think Global, Act Local
    </div>
  </a>
</div>
<!--end eco olympic banner-->