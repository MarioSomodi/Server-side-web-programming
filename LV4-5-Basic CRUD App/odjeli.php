<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Odjeli</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Odjeli</h1>
                    </div>
                    <div class="col-sm-2 col-sm-offset-4" style="margin-top: 2%;">
                        <a class="btn btn btn-success btn-lg" href="index.php" role="button">HomePage</a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"></div>
                </div>
            </div>
            <div class="center mb-10">
                <button onclick="GetModal('modals.php?modal_id=new_department')" class="btn btn-success btn">Dodaj Odjel</button>
            </div>
            <div class="row">
                <table class="table" id="tableDep">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Naziv odjela</th>
                            <th>Uredi</th>
                            <th>Obriši</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="js/global.js"></script>
        <script src="js/odjeli.js"></script>
        <style>
		.center{
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.mb-10{
			margin-bottom:10px;
		}
	    </style>
    </body>
</html>