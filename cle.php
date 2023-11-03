<!doctype html>
<html lang="en">
  <head>
    <meta name="description" content="Citywide Dashboard. An animated display of current electricity and water use and environmental conditions. “Flash” the energy squirrel and “Walley” the Walleye narrate dynamic resource use.">
    <?php include 'includes/html-head.php'; ?>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
      <iframe src="https://environmentaldashboard.org/digital-signage/display/4/present" frameborder="0" style="width: 80%;height: 80vh;display: inline"></iframe>
      <iframe src="https://environmentaldashboard.org/digital-signage/remote/3" frameborder="0" style="height: 80vh;width: 19%;display: inline"></iframe>
      <h4>Cleveland Dashboard:</h4>
      <h4>Empowering the community, conserving resources</h4>
      <p>Cleveland’s Environmental Dashboard is designed to help NE Ohio’s urban residents see and understand how decisions affect Cleveland communities and the natural environment.</p>
      <p>Starting with Great Lakes Science Center, digital signs are being installed in public spaces to engage, educate, motivate and empower smarter choices that protect the environment and improve community.  Core components include:</p>
      <ul class="list-unstyled">
        <li class="media">
          <img src="https://lh6.googleusercontent.com/NHTXoxUHI9Sn4l8ejNoZUM11eSJdejRwPAkoeUmDOTFL3DpP0tIq2PKa0VNShuSiZGx-hLHRrsVEqtbeqf0b05lGs9nq-ItRxQDDihaAwsDv7M-L78fUaEd5cKdEWRvOMgjEJEpP" class="mr-3">
          <div class="media-body">
            <h5 class="mt-0 mb-1">1. Building Dashboard</h5>
            Makes visible the real-time patterns of electricity and water use in monitored buildings like the Great Lakes Science Center and certain public schools.
          </div>
        </li>
        <li class="media my-4">
          <img src="https://lh4.googleusercontent.com/0Fa38HMbP6Gsa8IvFFmFLMNCNz3E6YRyKbxVHN-8O-NmXFjSguXnOKl0vkssxM_101Yxk3CRf3Pe7uXLcG8i99UGf9qNkBvwJQ_X4grUy81hrMCe50_9pAKJsWLy8p5U9oZcyrXX" class="mr-3">
          <div class="media-body">
            <h5 class="mt-0 mb-1">2. Citywide Dashboard</h5>
            Translates air and quality data gathered from automated environmental sensors managed by partner organizations into an animated display of current environmental conditions on land, in rivers, and in Lake Erie.
          </div>
        </li>
        <li class="media">
          <img src="https://lh3.googleusercontent.com/wT5IB7oiL_LQFIhge8n2KIx92BIFJmScub3mMtmHBNhphoiuVlnooZs9bdrFSTcO739LETbhDEyICww8M2DIflOAxYKruFExfX5MrDBcreJPDs-SNOCf0jrU6eNBCvpgmJr0-x2D" class="mr-3">
          <div class="media-body">
            <h5 class="mt-0 mb-1">3. Community Voices</h5>
            Celebrates the thought and action that kids, neighbors, workers, businesses, civic organizations, and NE Ohio municipalities are taking to build a stronger, and more sustainable region.
          </div>
        </li>
      </ul>
      <p>Partner organizations: Oberlin College, Great Lakes Science Center, Cleveland Metroparks, Northeast Ohio Sewer and Water District ,Cleveland 2030, Mayor's Office of Sustainability, Cleveland Water Alliance</p>
      <p>We welcome your engagement -- Click the “Contact Us” link below!</p>
      <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
  </body>
</html>