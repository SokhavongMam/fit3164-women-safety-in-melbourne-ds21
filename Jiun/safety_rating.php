<?php
  include_once 'header.php';
?>


<div class="bgimg-1 row h-100">
  <div class="container bg-dark text-white rounded p-4 bg-opacity-75 w-25 my-auto" style="min-width: 350px;">
    <h1 class="text-center my-4" style="font-weight: 500;">Prediction for Number of Pedestrian</h1>
    <button class="btn btn-primary" onclick="getLocation()">Get Current Details</Details></button>
    <div class="form-group m-1">
        <label for="">Longitude</label>
        <input id="long" class="form-control" name="long" placeholder="Longitude">
      </div>
      <div class="form-group m-1">
        <label for="">Latitude</label>
        <input id="lat" class="form-control" name="lat" placeholder="Latitude">
      </div>
      <div class="form-group m-1">
        <label for="">Day</label>
        <input id="day" class="form-control" name="day" placeholder="Day">
      </div>
      <div class="form-group m-1">
        <label for="">Month</label>
        <input id="month" class="form-control" name="month" placeholder="Month">
      </div>
      <div class="form-group m-1">
        <label for="">Year</label>
        <input id="year" class="form-control" name="year" placeholder="Year">
      </div>
      <div class="form-group m-1">
        <label for="">Time</label>
        <input id="time" class="form-control" name="time" placeholder="Time">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-3 w-25" name="submit">Predict</button>
      </div>
  </div>
</div>

<?php
if (isset($_POST["submit"])) {
    $long = $_POST["long"];
    $lat = $_POST["lat"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $time = $_POST["time"];

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://aa05-149-167-142-35.ngrok.io/pred_pedestrian',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('latitude' => '-37.81766034','longitude' => '144.95026189','mdate' => '2','month' => '15','year' => '2022','time' => '12'),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: multipart/form-data'
    ),
    )); 

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response
}
?>


<script>
    var today = new Date();

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    document.getElementById("long").placeholder = "Not Supported";
    document.getElementById("lat").placeholder = "Not Supported";
  }
  document.getElementById("year").value = today.getFullYear();
  document.getElementById("month").value = today.getMonth()+1;
  document.getElementById("day").value = today.getDate();
  document.getElementById("time").value = today.getHours();
}

function showPosition(position) {
    document.getElementById("long").value = position.coords.longitude;
    document.getElementById("lat").value = position.coords.latitude;
}

</script>