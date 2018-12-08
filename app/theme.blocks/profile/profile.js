jQuery('#photo').change(function () {
  jQuery('#img-photo').css("display", "none");
  jQuery('#img-preview').css("display", "block");
  var input = $(this)[0];
  if (input.files && input.files[0]) {
    if (input.files[0].type.match('image.*')) {
      var reader = new FileReader();
      reader.onload = function (e) {
        jQuery('#img-preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
});
