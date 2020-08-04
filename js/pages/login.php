<script>
$(document).ready(function() 
{
  $(".form-login").on("submit",function() {
  var formData = new FormData($(this)[0]);
  var $btn = $(".btn-login").button('loading');
  $.ajax({
    type: "POST",
    url: "<?=base_url();?>admin/session",
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function(html){
            $btn.button('reset')
            $(".hasil").html(html);
            $(".form-control").val('');
            }
  });
  return false;
  });
});
</script>