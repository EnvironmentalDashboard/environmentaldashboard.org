<?php require '../../includes/db.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo time(); ?>">
    <title>Environmental Dashboard</title>
  </head>
  <body>
    <div class="container">
      <?php include '../includes/header.php'; ?>
      <div class="row">
        <div class="col">
          <div class="h1">Community Voices Articles</div>
          <p>The Community Voices component of Environmental Dashboard is designed to celebrate and promote thought and action that build stronger, more sustainable and more resilient communities. Community members representing the diversity of this community are being interviewed to share their perspectives. Click below to view recent interviews or search by subject name, interviewer or any keyword or topic to view associated stories. Many of the quotes used for Community Voices slides are taken from these interviews.</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <ul class="list-unstyled">
            <?php foreach ($db->query('SELECT post_date, title, img, content, slug FROM cv_posts ORDER BY post_date DESC LIMIT 5') as $row) { ?>
            <li class="media">
              <img class="mr-3" <?php echo "src='{$row['img']}' alt='{$row['slug']}'" ?>>
              <div class="media-body">
                <h5 class="mt-0 mb-1"><?php echo $row['title'] ?></h5>
                <?php echo explode('</p>', $row['content'])[3] . '</p>'; ?>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>