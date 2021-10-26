			<? 
			$bg_color = "#fff";
			if(isset($_GET["iv_color"]))
				$bg_color=$_GET["iv_color"];
			else 
				$bg_color = "#fff" ;
			?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color: <?=$bg_color?>">
    <h1>Hello, world!</h1>
		<form action="/" method="GET"> 
			<div class="mb-3">
				<label for="exampleColorInput" class="form-label">Color picker</label>
				<input name="iv_color" type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
			</div>
			<button type="submit" class="btn btn-primary"> Выполнить </button>
			
		</form>
			
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>