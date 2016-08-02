$(document).ready(function()
{  
 // function to get all records from table

 // function to get all records from table
 
 
 // code to get all records from table via select box
 $("#display:get_std").change(function()
 {    
  var id = $('#display:get_std').val();

  var dataString = 'action='+ id;
    
  $.ajax
  ({
   url: 'getmil.php',
   data: dataString,
   cache: false,
   success: function(r)
   {
    $("#getmildis").html(r);
   } 
  });
 });
 
 
 // code to get all records from table via select box
});