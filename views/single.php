<?php
function displaySingle($country){
  //pre($country);

  if(is_array($country)){
    $country = $country[0];
  }

    $regions = $country->region;
    $subregions = $country->subregion;
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
            <li><?php echo $language->name; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

  <?php
  // Ideally this would be a React component
    pre(count($response));
    pre(count($regions));
    pre($regions);
    pre(count($subregions));
    pre($subregions);
}
?>
