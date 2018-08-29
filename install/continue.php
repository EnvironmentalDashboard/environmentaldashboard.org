<?php
error_reporting(-1);
ini_set('display_errors', 'On');
// redirect if a param isnt present
if (!isset($_POST['name']) || !isset($_POST['pass']) || !isset($_POST['slug'])) {
  header('Location: /');
  exit();
}

require '../../includes/db.php';
$orgs_selected = (isset($_POST['orgs']) && count($_POST['email']) > 0);
$need_org_selection = (isset($_POST['need_org_selection']) && $_POST['need_org_selection'] === '1');
if (!$need_org_selection || $orgs_selected) { // if no bos orgs need to be selected or they already are
  $slug = preg_replace('/[^a-zA-Z0-9_-]/i', '', $_POST['slug']); // only allow alphanumeric charachters, dash, underscore
  for ($i = 0; $i < strlen($slug); $i++) { // also make sure first char is letter/number
    $ord = ord($slug[$i]);
    if (($ord >= 65 && $ord <= 90) || ($ord >= 97 && $ord <= 122) || ($ord >= 48 && $ord <= 57)) {
      break;
    }
    $slug[$i] = '';
  }
  if (strlen($slug) === 0) {
    die('URL slug must have at least one alphanumeric charachter');
  }
  // the name column will be used to match the url, see ~/includes/db.php
  $token = bin2hex(random_bytes(127));
  $stmt = $db->prepare('INSERT INTO users (slug, name, password, token) VALUES (?, ?, ?, ?)');
  $stmt->execute(array(
    $slug,
    $_POST['name'],
    password_hash($_POST['pass'], PASSWORD_DEFAULT),
    $token
  ));
  $user_id = $db->lastInsertId();

  if ($orgs_selected) {
    $stmt = $db->prepare('INSERT INTO api (user_id, client_id, client_secret, username, password) VALUES (?, ?, ?, ?, ?)'); // the all the records in the api table will be
    $stmt->execute(array($user_id, $_POST['client_id'], $_POST['client_secret'], $_POST['email'], $_POST['password']));
    $api_id = $db->lastInsertId();
    foreach ($_POST['orgs'] as $org) {
      $explode = explode('$SEP$', $org);
      $org_id = explode('/', $explode[0]);
      $org_id = $org_id[count($org_id)-1];
      $stmt = $db->prepare('SELECT COUNT(*) FROM orgs WHERE id = ?');
      $stmt->execute(array($org_id));
      if ($stmt->fetchColumn() === '0') {
        $stmt = $db->prepare('INSERT INTO orgs (id, api_id, name, url) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($org_id, $api_id, $explode[1], $explode[0]));
        // get meta data from buildingos
        // exec('bash -c "exec nohup setsid php /var/www/html/oberlin/scripts/sync_org.php -o'.$org_id.' > /dev/null 2>&1 &"');
      }
      $stmt = $db->prepare('INSERT INTO users_orgs_map (user_id, org_id) VALUES (?, ?)');
      $stmt->execute(array($user_id, $org_id));
    }
  }
  $new_hex_color = ltrim($_POST['cal_bg'], '#');
  if ((strlen($new_hex_color) !== 3 && strlen($new_hex_color) !== 6) || !ctype_xdigit($new_hex_color)) {
    $new_hex_color = '3F51B5';
  }
  // Create new symlink
  shell_exec(
    'ln -s /var/www/repos/environmentaldashboard.org '.escapeshellarg("/var/www/repos/environmentaldashboard.org/{$slug}").
    " && mkdir ".escapeshellarg("/var/www/repos/environmentaldashboard.org/symlinks/{$slug}").
    " && ln -s /var/www/repos/calendar ".escapeshellarg("/var/www/repos/environmentaldashboard.org/symlinks/{$slug}/calendar").
    " && cp -r /var/www/repos/calendar/css/repos ".escapeshellarg("/var/www/repos/calendar/css/{$slug}").
    " && sed -ie 's/3F51B5/{$new_hex_color}/g' ".escapeshellarg("/var/www/repos/calendar/css/{$slug}")
  );
  // create new time series/cwd config using oberlins settings as default
  $db->exec("INSERT INTO cwd_bos (user_id, squirrel, fish, water_speed, electricity_speed, landing_messages, electricity_messages, gas_messages, stream_messages, water_messages, weather_messages) SELECT {$user_id}, squirrel, fish, water_speed, electricity_speed, landing_messages, electricity_messages, gas_messages, stream_messages, water_messages, weather_messages FROM cwd_bos WHERE user_id = 1");
  $db->exec("INSERT INTO cwd_landscape_components (user_id, component, pos, widthxheight, title, link, img, `text`, text_pos, `order`, removable, hidden) SELECT {$user_id}, component, pos, widthxheight, title, link, img, `text`, text_pos, `order`, removable, hidden FROM cwd_landscape_components WHERE user_id = 1");
  $db->exec("INSERT INTO cwd_messages (user_id, resource, message, prob1, prob2, prob3, prob4, prob5) SELECT {$user_id}, resource, message, prob1, prob2, prob3, prob4, prob5 FROM cwd_messages WHERE user_id = 1");
  $db->exec("INSERT INTO cwd_states (resource, user_id, gauge1, gauge2, gauge3, gauge4, `on`) SELECT resource, {$user_id}, gauge1, gauge2, gauge3, gauge4, `on` FROM cwd_states WHERE user_id = 1");
  $db->exec("INSERT INTO time_series (name, user_id, length, bin1, bin2, bin3, bin4, bin5) SELECT name, {$user_id}, length, bin1, bin2, bin3, bin4, bin5 FROM time_series WHERE user_id = 1");
  $db->exec("INSERT INTO timing (user_id, message_section, delay, `interval`) SELECT {$user_id}, message_section, delay, `interval` FROM timing WHERE user_id = 1");
  // write files for calendar
  copy('/var/www/repos/calendar/includes/snippets/detail/repos_bottom.php', "/var/www/repos/calendar/includes/snippets/detail/{$slug}_bottom.php");
  copy('/var/www/repos/calendar/includes/snippets/detail/repos_top.php', "/var/www/repos/calendar/includes/snippets/detail/{$slug}_top.php");
  copy('/var/www/repos/calendar/includes/snippets/detail-calendar/repos_bottom.php', "/var/www/repos/calendar/includes/snippets/detail-calendar/{$slug}_bottom.php");
  copy('/var/www/repos/calendar/includes/snippets/detail-calendar/repos_top.php', "/var/www/repos/calendar/includes/snippets/detail-calendar/{$slug}_top.php");
  copy('/var/www/repos/calendar/includes/snippets/event-form/repos_bottom.php', "/var/www/repos/calendar/includes/snippets/event-form/{$slug}_bottom.php");
  copy('/var/www/repos/calendar/includes/snippets/event-form/repos_top.php', "/var/www/repos/calendar/includes/snippets/event-form/{$slug}_top.php");
  copy('/var/www/repos/calendar/includes/snippets/index/repos_bottom.php', "/var/www/repos/calendar/includes/snippets/index/{$slug}_bottom.php");
  copy('/var/www/repos/calendar/includes/snippets/index/repos_top.php', "/var/www/repos/calendar/includes/snippets/index/{$slug}_top.php");
  setcookie('token', $token, time()+60*60*24*30, "/{$slug}/");
  header("Location: /{$slug}/prefs/account.php");
  exit();
} // end add user code

// Get list of orgs for form
$data = array(
  'client_id' => $_POST['client_id'],
  'client_secret' => $_POST['client_secret'],
  'username' => $_POST['email'],
  'password' => $_POST['password'],
  'grant_type' => 'password'
  );
$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$result = @file_get_contents('https://api.buildingos.com/o/token/', false, $context);
if (!$result) {
  header('Location: /?err=no_token'); exit();
}
$json = json_decode($result, true);
$token = $json['access_token'];
$options = array(
  'http' => array(
    'method' => 'GET',
    'header' => 'Authorization: Bearer ' . $token
    )
);
$context = stream_context_create($options);
$request = json_decode(file_get_contents('https://api.buildingos.com/organizations', false, $context), true);
if (!$request) {
  header('Location: /?err=no_data'); exit();
}
$orgs = array();
foreach ($request['data'] as $organization) {
  $orgs[$organization['name']] = $organization['url'];
}
if (empty($orgs)) {
  header('Location: /?err=no_orgs'); exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
          <img src="https://oberlindashboard.org/oberlin/prefs/images/env_logo.png" alt="" class="img-fluid" style="margin-top: 25px;margin-bottom: 25px">
          <h2>Create a Dashboard user</h2>
          <hr>
          <p>Please finish completing the form</a>.</p>
          <div class="container">
            <form action="" id="form" method="POST">
              <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
              <input type="hidden" name="pass" value="<?php echo $_POST['pass']; ?>">
              <input type="hidden" name="slug" value="<?php echo $_POST['slug']; ?>">
              <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
              <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
              <input type="hidden" name="client_id" value="<?php echo $_POST['client_id']; ?>">
              <input type="hidden" name="client_secret" value="<?php echo $_POST['client_secret']; ?>">
              <div class="form-group row">
                <p class="col-sm-4 col-form-label">Select one or more organizations associated with this BuildingOS account</p>
                <div class="col-sm-8">
                  <?php $once = false;
                  foreach ($orgs as $name => $url) {
                    $stmt = $db->prepare('SELECT COUNT(*) FROM orgs WHERE url = ?');
                    $stmt->execute(array($url));
                    if ($stmt->fetchColumn() === '0') {
                      $already_in_use = false;
                    } else {
                      $already_in_use = true;
                      $once = true;
                    }
                  ?>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="orgs[]" value="<?php echo "{$url}\$SEP\${$name}"; ?>">
                      <?php echo ($already_in_use) ? "{$name}*" : $name; ?>
                    </label>
                  </div>
                  <?php } ?>
                  <?php if ($once) { ?><p><small class="text-muted">Organizations marked with an asterisk are used by other Dashboard accounts. When adding organizations already synced with another Dashboard account, the API credentials you provide will not be saved as they are not needed to access that organization.</small></p><?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-4 col-sm-8">
                  <button type="submit" class="btn btn-primary">Create account</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>