<?php
  include_once 'header.php';
?>

<!-- Background Img -->
<div class="bgimg-2 text-center text-white ">
  <?php
    if (isset($_SESSION['usersuid'])){
      echo "<p>Welcome " . $_SESSION['usersname'] . "</p>";
    }
  ?>
  <h1 class="display-1 text-uppercase" style="font-weight: 500">Women Safety in Melbourne</h1>
</div>

<!-- Visualisation -->
<div class="container-max-widths bg-light p-3 text-center" >
  <h1> Visualisation</h1>
  <div class="row p-5">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <div class='tableauPlaceholder' id='viz1661155999247' style='position: relative'><noscript><a href='#'><img alt='Number of female victim incidents in different offences in 2013 ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Vi&#47;Viz2_16611478806980&#47;Sheet1&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;width: 100%;height: 600px;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Viz2_16611478806980&#47;Sheet1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Vi&#47;Viz2_16611478806980&#47;Sheet1&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1661155999247');                    var vizElement = divElement.getElementsByTagName('object')[0];                    vizElement.style.width='100%';vizElement.style.height='600px';                    var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <div class='tableauPlaceholder' id='viz1661156024642' style='position: relative'><noscript><a href='#'><img alt='Number of female victim reports per 100,000 population in different age groups in 2013 ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Vi&#47;Viz3_16611479147730&#47;Sheet2&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;width: 100%;height: 600px;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Viz3_16611479147730&#47;Sheet2' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Vi&#47;Viz3_16611479147730&#47;Sheet2&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1661156024642');                    var vizElement = divElement.getElementsByTagName('object')[0];                    vizElement.style.width='100%';vizElement.style.height='600px';                    var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
      </div>

  <div class="text-center"><button type="button" class="btn btn-dark btn-sm mt-3" style="width: 10%;min-width: 100px;"><a class="text-white" href="./visualisation.html">See more</a></button></div>
  </div>
</div>
  
<!-- Background Img -->
<div class="container-max-widths bgimg-1 ">
  <div class="container-max-widths bg-dark text-white opacity-75" >
  </div>
</div>

<!-- Map -->
<div class="container-max-widths bg-dark text-white p-5 text-center" >
  <h1 class="mb-5"> Map</h1>
  <div id="map"></div>
  <p>e.latlng</p>
</div>


<script>
var map = L.map('map').fitWorld();

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

map.locate({setView: true, maxZoom: 16});

function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);
</script>