
<script>
$(document).ready(function() 
{
  $(".button-pilih").on("click",function() {
var id = $(this).attr("value");
$.confirm({
    title:"Pilih",
    text:"Apakah kamu memilih paslon ini?",
    confirm: function(button) {
 $.ajax({
    type: "POST",
    url: "<?=base_url();?>admin/p_pilih/"+id,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
  success: function(html){
  $("#vote-body").slideUp();
  $(".hasil").html(html);
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
    url: "http://"+window.location.hostname+"/api/employee/add",
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
$(document).ready(function() 
{
  $(".form-edit").on("submit",function() {
  var id = $(".id_index").attr("value");
  var formData = new FormData($(this)[0]);
  var $btn = $(".btn-submit").button('loading');
  $.ajax({
    type: "POST",
    url: "http://"+window.location.hostname+"/api/employee/"+id+"/edit",
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function(html){
            $btn.button('reset')
            $(".hasil").html(html);
            }
  });
  return false;
  });
});
</script>