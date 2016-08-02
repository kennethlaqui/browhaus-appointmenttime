$(document).ready(function(){
  $('#country').change(function(){
    loadState($(this).find(':selected').val())
  })
  $('#state').change(function(){
    loadCity($(this).find(':selected').val())
  })




function loadCountry(){
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=country"
            }).done(function( result ) {
                $(result).each(function(){
                    $("#country").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })
            });
}
function loadState(countryId){
        $("#state").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=state&countryId=" + countryId
            }).done(function( result ) {
                $(result).each(function(){
                    $("#state").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })
            });
}
function loadCity(stateId){
        $("#city").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=city&stateId=" + stateId
            }).done(function( result ) {
                $(result).each(function(){
                    $("#city").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })
            });
}

// init the countries
loadCountry();

});
