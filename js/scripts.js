$(document).ready(function(){

  $('#country_search').submit(function(event){
    event.preventDefault();

    var country = $('#country').val();

    $.ajax({
  			type: 'POST',
  			url: './post-functions.php',
  			data: {
          func: 'getCountry',
  				name: country,
          //code2: '',
          //code3: ''
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
