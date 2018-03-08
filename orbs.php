<?php
require '../includes/db.php';
$rv_descriptions = ['very high', 'high', 'normal', 'low', 'very low'];
$rv_colors = ['#F44336', 'orange', '#eee', '#8BC34A', '#4CAF50'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://environmentaldashboard.org/css/bootstrap.css?v=<?php echo time(); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
    <link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
    <link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
    <meta name="theme-color" content="#000000">
    <title>Environmental Dashboard</title>
  </head>
  <body>
    <div class="modal fade" id="rvModal" tabindex="-1" role="dialog" aria-labelledby="rvModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rvModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <?php include 'includes/header.php'; ?>
      <div style="padding: 30px">
        <h1>Orbs</h1>
        <p>Glowing orbs installed in buildings around Oberlin College provide occupants ambient feedback about their electricity and water consumption. Each orb is listed here with an explanation of its color.</p>
        <ul class="list-unstyled">
          <?php foreach ($db->query('SELECT building_id, GROUP_CONCAT(name) AS name_csv, GROUP_CONCAT(elec_uuid) AS elec_uuid_csv, GROUP_CONCAT(elec_rvid) AS elec_rvid_csv, GROUP_CONCAT(water_uuid) AS water_uuid_csv, GROUP_CONCAT(water_rvid) AS water_rvid_csv FROM orbs WHERE disabled = 0 AND building_id != 0 GROUP BY building_id') as $orb_array) { // SELECT id, name, building_type, address, area, occupancy, floors, custom_img FROM buildings WHERE id IN (SELECT building_id FROM orbs WHERE building_id != 0 AND disabled = 0)
            $orb_elec_uuids = explode(',', $orb_array['elec_uuid_csv']);
            $orb_water_uuids = explode(',', $orb_array['water_uuid_csv']);
            $orb_elec_rvids = explode(',', $orb_array['elec_rvid_csv']);
            $orb_water_rvids = explode(',', $orb_array['water_rvid_csv']);
            $building = $db->query("SELECT name, building_type, address, area, occupancy, floors, custom_img FROM buildings WHERE id = ".intval($orb_array['building_id']))->fetch();
            ?>
          <li class="media my-4 row">
            <div class='col-12 col-sm-3'><img class="mr-3 img-thumbnail" <?php echo "src='{$building['custom_img']}' alt='{$building['name']}'"; ?>></div>
            <div class="media-body col-12 col-sm-9">
              <h3 class="mt-0 mb-1"><?php echo $building['name'] ?></h3>
              <ul class="list-unstyled">
                <?php
                foreach (explode(',', $orb_array['name_csv']) as $i => $orb_name) {
                  echo "<li class='media row'>";
                  if (is_numeric($orb_elec_rvids[$i])) {
                    $rv = round(($db->query("SELECT relative_value FROM relative_values WHERE id = ".intval($orb_elec_rvids[$i]))->fetchColumn()/100)*4);
                    echo "<div class='col'><div style='height: 100px;width: 100px;border-radius: 100%;background: {$rv_colors[$rv]};margin-right: 10px;margin:0 auto;'></div><div class='media-body'><p style='text-align:center'>Electricity use in {$orb_name} is {$rv_descriptions[$rv]}</p><p style='text-align:center'><a data-meter='{$orb_elec_uuids[$i]}' class='btn btn-primary btn-sm' href='#'>View calculation</a></p></div></div>";
                  }
                  if (is_numeric($orb_water_rvids[$i])) {
                    $rv = round(($db->query("SELECT relative_value FROM relative_values WHERE id = ".intval($orb_water_rvids[$i]))->fetchColumn()/100)*4);
                    echo "<div class='col'><div style='height: 100px;width: 100px;border-radius: 100%;background: {$rv_colors[$rv]};margin-right: 10px;margin:0 auto;'></div><div class='media-body'><p style='text-align:center'>Water use in {$orb_name} is {$rv_descriptions[$rv]}</p><p style='text-align:center'><a data-meter='{$orb_water_uuids[$i]}' class='btn btn-primary btn-sm' href='#'>View calculation</a></p></div></div>";
                  }
                  echo "</li>";
                } ?>
              </ul>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
    <script>
      $('#rvModal').on('shown.bs.modal', function () {
        $.post( "includes/rv_calc.php", { meter: this.data('meter') }, function( json ) {
          if (json.constructor === Array) {
            json.forEach(function(entry) {
              console.log(entry);
            });
          }
        }, "json");
      });
    </script>
  </body>
</html>php
