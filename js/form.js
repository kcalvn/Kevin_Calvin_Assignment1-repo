$(document).ready(function(){

  $('select').material_select();

  $('.datepicker').pickadate({
    selectMonths:true,
    selectYears:100,
    min:[1916,1,31],
    max:true
  });



    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });

});
