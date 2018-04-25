<?php
  include 'views/single.php';
  include 'views/name.php';
  include 'views/error.php';

  // TODO: General https://github.com/ldahl264/countryCodes/issues/2 id:0
  // - [ ] Check and clean user input
  // - [ ] Display error message if no matches found or form submitted blank

  // TODO: Filtering https://github.com/ldahl264/countryCodes/issues/4 id:2
  // - [ ] Sort results alphabetically by name and Population
  // - [ ] Limit results to 50

  // TODO: Add to bottom of the page https://github.com/ldahl264/countryCodes/issues/5 id:3
  // - [ ] Display the total number of countries
  // - [ ] Each region and subregion with number of times appeared

  // TODO: Make sure it all runs using php -s https://github.com/ldahl264/countryCodes/issues/6 id:4

  // TODO: Create readme with instructions for starting the server https://github.com/ldahl264/countryCodes/issues/7 id:5

  // TODO: Stretch Goals https://github.com/ldahl264/countryCodes/issues/3 id:1
  // - [ ] Search by country name, code2, and code3 with a single text input.
  // - [ ] Use React JS.
  // - [ ] Implement some form of caching.

if(isset($_POST['func'])){
  $function = $_POST['func'];

  if($function == 'getCountry'){

    if(isset($_POST['name'])){
      $name = $_POST['name'];
    }

    $codeUsed = false;
    if(isset($_POST['code'])){
      $codeUsed = $_POST['code'];
    }

    switch($codeUsed){
      case 'ac2':
        $url_base = 'http://restcountries.eu/rest/v2/alpha/';
        break;
      case 'ac3':
        $url_base = 'http://restcountries.eu/rest/v2/alpha/';
        break;
      default:
        $url_base = 'http://restcountries.eu/rest/v2/name/';
        break;
      }

    /*
    if($codeUsed == 'false'){
      $url_base = 'http://restcountries.eu/rest/v2/name/';
    }*/

    $url = $url_base . "$name?fields=name;alpha2Code;alpha3Code;flag;region;subregion;population;languages;";
    //$url = 'http://restcountries.eu/rest/v2/alpha/co';
    pre($url);
    @$response = file_get_contents($url);
    if($response === FALSE){
        errorNoMatches();
    }
    $response = json_decode($response);

    if(count($response) == 1):
      displaySingle($response);
    elseif(count($response) > 1):
      displayByName($response);
    endif;




    //pre($response);
  }
}

function pre($input){
  echo '<pre>';
  $type = gettype($input);
  switch($type){
    case 'string':
      echo $input;
      break;
    case 'boolean':
      echo $input;
      break;
    case 'integer':
      echo $input;
      break;
    case 'array':
      print_r($input);
      break;
    default:
      var_dump($input);
      break;
  }
  echo '</pre>';
  echo '<br/>';
}
?>
