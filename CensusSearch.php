<?php
mysql_connect("impa.valdosta.edu", "archives_web", "uhCs4fQpr") or die("Error connecting to database: ".mysql_error());
mysql_select_db("extra_credit") or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<head>
		<title>Search</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<div class="container-fluid">
			<div class="form-group">
				<h1>1860 U.S. Slave Census - Search Names</h1>
				<form action="CensusResults.php" method="GET">
					<label for="namesearch"> Search by Surname</label>
					<input type="text" name="query" class="input" placeholder="Search by Surname..."/>
					<input type="submit" value="Search" class="btn btn-primary" />
				</form>
			</div>
			<div class="form-group">
				<form action="CensusCountyResults.php" method="GET">
					<label for="countysearch"> Search by County  </label>
					<input type="text" name="query" class="input" placeholder="Search by County..."/>
					<input type="submit" value="Search" class="btn btn-primary" />
				</form>
			</div>
		</div>
	</body>
</html>