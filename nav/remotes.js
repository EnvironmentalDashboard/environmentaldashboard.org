$(document).ready(function () {
  $.getJSON(
    'https://oberlin.communityhub.cloud/api/legacy/digital-signage/remote',
    function (data) {
      let remoteList = '';
      $.each(data, function (key, val) {
        let remoteIndex = [
          'one',
          'two',
          'three',
          'four',
          'five',
          'six',
          'five',
          'four',
          'three',
          'two',
        ];
        let remoteId = '';
        if (!val.id) {
          remoteId = 'zero';
        } else {
          remoteId = remoteIndex[key % 10];
        }
        console.log(val.currentConnections);
        let remote = '';
        remote += " <a class='button'";
        let urlNumber = '';
        let url = '';
        if (val.currentConnections.length > 0) {
          url = 'href=" https://oberlin.communityhub.cloud/digital-signage/remote/'.concat(
            val.currentConnections[0]
          );
        } else {
          remoteId = 'zero';
        }
        remote += url;
        remote += "> <div class='buttonflex'";
        remote += 'id='.concat(remoteId);
        remote += "> <div class='buttontext'>";
        remote += val.label;
        remote += '</div> </div> </a>';
        remoteList += remote;
      });
      document.getElementById('remotes').innerHTML = remoteList;
    }
  );
});
