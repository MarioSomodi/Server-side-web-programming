<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	    <div class="jumbotron">
	        <h1 class="text-center">Naslov</h1>
	    </div>
	    <div class="row center">
			<button type="button" class="btn btn-success" onclick="window.open('zaposlenici.php')">Zaposlenici</button>
			<button type="button" class="ml-10 btn btn-success" onclick="window.open('odjeli.php')">Odjeli</button>
	    </div>
	</div>

	<style>
		.center{
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.ml-10{
			margin-left:10px;
		}
	</style>
</body>
</html>