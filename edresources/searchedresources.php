<?php
require '../../includes/db.php';
if (isset($_GET['submit'])) {
  $query = true;
  $sql = 'WHERE ';
  foreach ($_GET as $key => $value) {
    if ($value === 'all' || $key === 'submit' || $key === 'query') {
      continue;
    }
    $sql .= "(`key` = ? AND value = ?) OR ";
  }
  // $stmt = $db->prepare('SELECT title, pdf, gmt FROM cv_lessons WHERE id IN (SELECT lesson_id FROM cv_lesson_meta WHERE key =?');
} else {
  $query = false;
}
?>
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
      <?php include '../includes/header.php'; ?>
      <div class="row" style="padding: 30px">
        <div class="col-12">
          <h1 class="text-center">Search K-12 Instructor Toolkit</h1>
          <p>The Search table below allows you to search through our entire library of lessons easily and efficiently. Use the search box to search lesson titles or one of our logical operators to refine your search. On this site, you will be able to search for Environmental Dashboard specific lessons as well as external teaching resources that utilize Environmental Dashboard as a tool.</p>
          <p>For example, you could search for a lesson with the keyword "electricity" to see all lessons tagged or titled "electricity" with their respective sub data for quick assessment. You could also add use any of the other search parameters such as "grade" and "author(s)". To reset your search, simply click "reset" icon. The number in the brackets indicate the total quantity of lessons for each specific field you include in a search.</p>
          <form action="" method="GET">
            <div class="card border-success mb-3">
              <div class="card-header bg-transparent border-success">Search Lessons</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12" style="margin-bottom: 10px">
                    <label for="query">Search</label>
                    <input type="text" class="form-control" id="query" name="query" placeholder="Enter search terms">
                  </div>
                  <?php foreach ($db->query('SELECT DISTINCT `key` FROM cv_lesson_meta ORDER BY `key` ASC') as $row) {
                    echo "<div class='col-12 col-sm-6 col-md-4'><p>{$row['key']}</p>";
                    echo "<select name='{$row['key']}' class='custom-select'>";
                    $stmt = $db->prepare('SELECT DISTINCT value FROM cv_lesson_meta WHERE `key` = ? ORDER BY value ASC');
                    $stmt->execute([$row['key']]);
                    echo "<option value='all'>All</option>";
                    foreach ($stmt->fetchAll() as $row2) {
                      $encoded = str_replace(' ', '$WS$', $row2['value']);
                      echo "<option value='{$encoded}'>{$row2['value']}</option>";
                    }
                    echo "</select></div>";
                  } ?>
                </div>
              </div>
              <div class="card-footer bg-transparent border-success"><input type="submit" name="submit" value="Search" class="btn btn-primary"></div>
            </div>
          </form>
        </div>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>