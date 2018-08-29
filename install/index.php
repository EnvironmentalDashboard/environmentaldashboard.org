<?php
require '../../includes/db.php';
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
        <h2>Create a Dashboard instance</h2>
        <hr>
        <form action="continue.php" method="POST">
          <div id="select_apps">
            <div class="form-group row">
              <p class="col-sm-4 col-form-label">Select the apps you want to install</p>
              <div class="col-sm-8">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cv" name="cv" value="1">
                  <label class="custom-control-label" for="cv">Community Voices</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="chart" name="chart" value="1">
                  <label class="custom-control-label" for="chart">Time series</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cal" name="cal" value="1">
                  <label class="custom-control-label" for="cal">Calendar</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="bnav" name="bnav" value="1">
                  <label class="custom-control-label" for="bnav">Building navigation</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cwd" name="cwd" value="1">
                  <label class="custom-control-label" for="cwd">Citywide Dashboard</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label">Dashboard account name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="pass" class="col-sm-4 col-form-label">Dashboard account password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="pass" name="pass">
              </div>
            </div>
            <div class="form-group row" id="slug-row">
              <label for="slug" class="col-sm-4 col-form-label">URL slug</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="slug" name="slug" value="example">
                <div class="form-control-feedback" id="form-control-feedback"></div>
                <p class="text-muted" id="slug-example">http://environmentaldashboard.org/example/</p>
              </div>
            </div>
            <div id="cal_form" style="display: none">
              <p>The calendar requires you to pickary primary color:</p>
              <div class="form-group row">
                <label for="cal_bg" class="col-sm-4 col-form-label">Calendar color</label>
                <div class="col-sm-8">
                  <input type="color" class="form-control" id="cal_bg" name="cal_bg" value="#3F51B5" style="padding: 0;border: none">
                </div>
              </div>
            </div>
            <input type="hidden" name="need_org_selection" value="0" id="need_org_selection">
            <button class="btn btn-primary mt-2" type="button" id="continue">Continue</button>
          </div>
          <div style="display: none" id="bos_form">
            <p>Some apps you selected (<span id="apps_csv"></span>) require BuildingOS API credentials. To see how to obtain these details, <a href="#">click here</a>.</p>
            <div class="container">
              <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">BuildingOS Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">BuildingOS Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="form-group row">
                <label for="client_id" class="col-sm-4 col-form-label">Client ID</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="client_id" name="client_id">
                </div>
              </div>
              <div class="form-group row">
                <label for="client_secret" class="col-sm-4 col-form-label">Client Secret</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="client_secret" name="client_secret">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-4 col-sm-8">
                  <button type="submit" class="btn btn-primary">Continue</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script>
    const bos_apps = ['Time series', 'Building navigation', 'Citywide Dashboard'];
    $('#continue').on('click', function(e) {
      e.preventDefault();
      var selections = [], valid_calendar_color = true;
      $('input[type="checkbox"]').each(function(i, e) {
        if (e.checked) {
          var id = $(e).attr('id');
          var text = $('label[for="'+id+'"]').text();
          if (bos_apps.indexOf(text) > -1) {
            selections.push(text);
          }
          var hex_color = $('#cal_bg').val().toUpperCase();
          if (id === 'cal' && (hex_color === '#3F51B5' || !/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(hex_color))) { // calendar is checked && (default hex color || invalid hex color)
            valid_calendar_color = false;
          }
        }
      });
      if (!valid_calendar_color) {
        $('#cal_form').css('display', '');
      }
      else if (selections.length > 0) {
        $('#bos_form').css('display', '');
        $('#select_apps').css('display', 'none');
        $('#apps_csv').text(selections.join(', '));
        $('#need_org_selection').val('1');
      } else {
        $(this).submit();
      }
    });
    var slug_row = $('#slug-row');
    var slug_example = $('#slug-example');
    var slug = $('#slug');
    var feedback = $('#form-control-feedback');
    var slugs = <?php echo json_encode(array_column($db->query('SELECT slug FROM users')->fetchAll(), 'slug')); ?>;
    slug.on('input', function() {
      var val = slug.val().replace(/[^\w-]/g,'');
      var i = 0;
        // also make sure first char is letter/number
        while (val.charAt(i) === '-' || val.charAt(i) === '-') {
          val = val.substring(1, val.length);
          i++;
        }
        $(this).val(val);
        if (val == '') return;
        slug_example.text('http://environmentaldashboard.org/' + val + '/');
        if ($.inArray(val, slugs) === -1) {
          slug_row.removeClass('has-danger').addClass('has-success');
          slug.removeClass('form-control-danger').addClass('form-control-success');
          feedback.text(val + ' is available for use');
        } else {
          slug_row.removeClass('has-success').addClass('has-danger');
          slug.removeClass('form-control-success').addClass('form-control-danger');
          feedback.text('The URL http://environmentaldashboard.org/' + val + '/ already exists');
        }
        // $.post('oberlin/scripts/validate-slug.php', { slug: val}, function (result) {
        //   if (result === 'false') {
        //     slug_row.removeClass('has-success').addClass('has-danger');
        //     slug.removeClass('form-control-success').addClass('form-control-danger');
        //     feedback.text('The URL http://environmentaldashboard.org/' + val + '/ already exists');
        //   } else {
        //     slug_row.removeClass('has-danger').addClass('has-success');
        //     slug.removeClass('form-control-danger').addClass('form-control-success');
        //     feedback.text(val + ' is available for use');
        //   }
        // });
      });
    $('#form').on('submit', function(e) {
      if ($(this).find('input:checked').length == 0 || slug.length == 0) {
        e.preventDefault();
        alert('Some fields are missing.');
      }
    });
  </script>
</body>
</html>