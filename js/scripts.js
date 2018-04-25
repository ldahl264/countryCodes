$(document).ready(function(){

  $('#country_search').submit(function(event){
    event.preventDefault();

    var country = $('#country').val();
    var codeUsed = false;

    if(country.length == 2) {
      codeUsed = 'ac2';
    }

    if(country.length == 3) {
      codeUsed = 'ac3';
    }

    console.log(codeUsed);

    $.ajax({
  			type: 'POST',
  			url: './post-functions.php',
  			data: {
          func: 'getCountry',
  				name: country,
          code: codeUsed
  			},
  			success: function(data, textStatus, XMLHttpRequest){
  				$("#results").html(data);
  			},
  			error: function(MLHttpRequest, textStatus, errorThrown){
  				// Do nothing
  			}
  		});
  });

});
