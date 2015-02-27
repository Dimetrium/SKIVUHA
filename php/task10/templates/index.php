<!DOCTYPE html>
<html>
<head>
    <title>PDO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <div class="alert alert-info" role="alert"><h3>PDO</h3><?php echo $myPdo->queryError;?></div>
    <div class="row">
	<div class="col-md-4">
<table class="table table-striped">
<?=$arr;?>
</table>
	</div>
	</div>
</body>
</html>

