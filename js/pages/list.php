<script>
$(document).ready(function() 
{
  $(".button-del").on("click",function() {
var id = $(this).attr("value");
$.confirm({
    title:"Delete",
    text:"Do you want to delete this?",
    confirm: function(button) {
 $.ajax({
    type: "POST",
    url: "<?=base_url();?>admin/l_delete/"+id,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
  success: function(html){
  $(".tb"+ id).slideUp();
}
 });    },
    confirmButton: "Yes",
    cancelButton: "No"
});
return false;
  });
});
$(document).ready(function() 
{
  $(".form-add").on("submit",function() {
  var formData = new FormData($(this)[0]);
  var $btn = $(".btn-submit").button('loading');
  $.ajax({
    type: "POST",
    url: "<?=base_url();?>admin/l_add",
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