<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Task</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container" style="padding:10%;">
  		<div class="row">
  			<div class="col-sm-2"><label for="exampleFormControlFile1">Audio</label></div>
  			<div class="col-sm-5"><audio id="AudioTagID" controls>
				  <source src="{{asset('Symphony.ogg')}}" type="audio/ogg">
				  <source src="{{asset('Symphony.mp3')}}" type="audio/mpeg">
				  Your browser does not support the audio element.
				</audio>
            </div>
            <div class="col-sm-2">
            	<button class="btn btn-primary" onclick="calculateAudioLength();">Get Duration</button>
            </div>
            <div class="col-sm-3">
            	
            </div>
  		</div>
  			<div class="row" style="margin-top:10%;">
  				<div class="col-sm-6">
  					Duration in minutes
  				</div>
  				<div class="col-sm-6">
  					<h3 id="audio_duration_id"></h3>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-sm-6">
  					Duration in minutes (up to two digit decimal)
  				</div>
  				<div class="col-sm-6">
  					<h3 id="audio_duration_id_twodigit"></h3>
  				</div>
  			</div>
  	</div>
  	<!-- JavaScript Bundle with Popper -->
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
   <script type="text/javascript">
    function calculateAudioLength(){
        var audioDuration = document.getElementById("AudioTagID").duration;
        var durationInMinutes = audioDuration/60;
        document.getElementById("audio_duration_id").innerHTML = durationInMinutes;
        document.getElementById("audio_duration_id_twodigit").innerHTML = durationInMinutes.toFixed(2);
    }
   </script>
  </body>
  </html>