<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
	// from https://github.com/bootstrapthemesco/bootstrap-4-multi-dropdown-navbar
  $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
    var $el = $(this);
    var $parent = $(this).offsetParent(".dropdown-menu");
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find( '.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');
    $(this).parent("li").toggleClass('show');
    $(this).parents('li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function (e) {
      $('.dropdown-menu .show').removeClass("show");
    });
    if ( !$parent.parent().hasClass('navbar-nav')) {
      $el.next().css( { "top": $el[0].offsetTop, "left": -$subMenu.outerWidth() } );
    }
    return false;
  });
});
</script>