<style>
body, input {
    background-color: #333 !important;
    color: #eee !important;
    overflow-x: hidden !important;
}
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<center>
<h1>ImpulsBroodjes Setup</h1>
<hr>
</center>
<?php
if(!isset($_GET["s"])){
    echo <<<XML
<center>
    <h2>Step 1: Database setup</h2>
    <hr style='width: 50%;'>
    <form class="form-horizontal">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="domain">Address</label>  
  <div class="col-md-4">
  <input id="domain" name="domain" type="text" placeholder="localhost" class="form-control input-md" required="">
  <span class="help-block">Database server address</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Username">Username</label>  
  <div class="col-md-4">
  <input id="Username" name="Username" type="text" placeholder="impulsbroodjes" class="form-control input-md" required="">
  <span class="help-block">Database username</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dbpass">Password</label>
  <div class="col-md-4">
    <input id="dbpass" name="dbpass" type="password" placeholder="impulsbroodjes" class="form-control input-md" required="">
    <span class="help-block">Database password</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dbname">Scheme</label>  
  <div class="col-md-4">
  <input id="dbname" name="dbname" type="text" placeholder="impulsbroodjes" class="form-control input-md" required="">
  <span class="help-block">Database scheme where data will be kept</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Save</button>
  </div>
</div>
<input id="s" value="1" style="display:none;">
</fieldset>
</form>

</center>
XML;
}
else {
  $step = $_GET['s'];
  if($step == 1){
    
  }
}

?>