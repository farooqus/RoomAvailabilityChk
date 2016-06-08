<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check Rooms availability</title>
	<meta name="description" content="Room Registration Form">
	<!-- CSS local and CDN links-->
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.datetimepicker.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.theme.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
</head>
<body>
<div class="container">
	<div class="row">
        <div class='col-md-6 col-md-offset-3'>
			<div class="page-header">
			  <h2>Check Room(s) availability</h2>
			</div>		
		</div>       
    </div>
    <div class="row">
        <div class='col-md-6 col-md-offset-3'>
			<form  role="form" id="roomRegister" method="post">					
				<div class="form-group col-sm-8">
					<label for="no_of_rooms">Room</label>
					<input name="no_of_rooms" id="no_of_rooms" maxlength="10" type="text" placeholder="No of rooms" class="form-control" />				
				</div>
				<div class="form-group col-sm-8">
					<label for="bookDate">Date</label>
					<div class='input-group date' id='bookDate'>
						<input name="bookDate" type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="form-group col-sm-8">
					<label for="staylength">Nights</label>
					<input name="staylength" type="text" maxlength="10" placeholder="Length of Stay" class="form-control" />				
				</div>				
				<div class="form-group col-sm-8">
					<button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
				</div>				
			</form>
        </div>
		<div class='col-md-6 col-md-offset-3'>
			<div class="form-group alert alert-info" id="showresults"></div>
			<div class="form-group col-sm-8" id="success"></div>
		</div> 
    </div>
</div><!-- End of container -->
<!-- JS CDN  and local links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>