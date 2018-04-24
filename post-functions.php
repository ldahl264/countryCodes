<?php
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

    $url = "https://restcountries.eu/rest/v2/name/$name?fields=name;alpha2Code;alpha3Code;flag;region;subregion;population;languages;";
    $response = file_get_contents($url);
    $response = json_decode($response);

    $regions = array();
    $subregions = array();

    foreach($response as $country):

      if(!in_array($country->region, $regions)):
        $regions[] = $country->region;
      endif;

      if(!in_array($country->subregion, $subregions)):
        $subregions[] = $country->subregion;
      endif;

    ?>

      <div class="row">
        <div class="col-md-3 col-sm-12">
          <img src="<?php echo $country->flag; ?>" alt="<?php echo $country->name; ?>" />
        </div>
        <div class="col-md-5 col-sm-12">
          <h2><?php echo $country->name; ?></h2>
          <p>Population: <?php echo $country->population;?></p>
          <p>Region: <?php echo $country->region; ?></p>
          <p>Subregion: <?php echo $country->subregion; ?></p>
        </div>
        <div class="col-md-4 col-sm-12">
          <h3>AC2: <?php echo $country->alpha2Code; ?> | AC3: <?php echo $country->alpha3Code; ?></h3>
          <p>Languages</p>
          <ul>
            <?php foreach($country->languages as $language): ?>
              <li><?php echo $language->nativeName; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

    <?php
    endforeach;

    pre(count($response));
    pre(count($regions));
    pre($regions);
    pre(count($subregions));
    pre($subregions);

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
