    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery.prettyPhoto.js') }}
    {{ HTML::script('js/jquery.isotope.min.js') }}
    {{ HTML::script('js/main.js') }}
    {{ HTML::script('js/wow.min.js') }}

    <script>
$(document).ready(function(){
  $('.dropdown a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>