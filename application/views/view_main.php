<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AJAX Demonstration of Uber API</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script type="text/javascript">
		$(document).ready(function(){
			var images = ['background6.jpg','background7.jpg','background8.jpg','background9.jpg'];
			$('body').css({'background-image': 'url(assets/pic/'+ images[Math.floor(Math.random()*images.length)]+')'});
			$('form').submit(function(){
				console.log($(this).serialize());
				$.post($(this).attr('action'),$(this).serialize(),function(res){
					// console.log(res);
					$('#results').html(res);
				});
				return false;		
			});
		});




	</script>
	<style type="text/css">
		.container-fluid {
			margin: 20px 2%;
		}
		.jumbotron {
			padding-left: 3%;
		}
		.error {
			color: red;
		}
		table {
			margin: 20px 0;
			font-weight: 700;
		}

	</style>
</head>
<body>
	<div class="jumbotron">
	    <h1>AJAX Demonstration of Uber API</h1>      
	    <p>This application make use of Uber API Products endpoint</p>
	</div>
	<div class='container-fluid'>
		<div class='row'>
			<div class='form col-sm-4 col-xs-12'>
				<form role='form' action='/mains/get_uberinfo' method='post'>			
					<h3>Enter latitude and longitude below to see available Uber products at the specified location.</h3>	
					<div class='form-group'>
						<label for='latitude'>Latitude</label>
						<input class='form-control' type='float' name='latitude'>
					</div>
					<div class='form-group'>
						<label for='longitude'>Longitude</label>
						<input class='form-control' type='float' name='longitude'>
					</div>
					<button class='btn btn-primary' type='submit'>Submit</button>
				</form>
			</div>
		</div>

		<div id='results'></div>

	</div>
</body>
</html>