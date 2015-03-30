<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include('ec_connect.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<h1>1860 US Slave Census Search Results</h1>
<?php
	$query = $_GET['query'];
    // gets value sent over search form
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM SlaveCensus
            WHERE (`LastName` LIKE '%".$query."%') OR (`FirstName` LIKE '%".$query."%')") or die(mysql_error());
             
               
        if(mysql_num_rows($raw_results) > 0){  ?> 
         <div>
            <h2>Search Results <small><?php echo "for <em><strong>$query</strong></em>"; ?> </small></h2>
            <p><a href="http://archives.valdosta.edu/volunteers/CensusSearch.php">Back to Search Page</a></p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tr class="gentabhead">
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Notes</th>
                    <th>TotalSlaves</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Fugitive</th>
                    <th>Manumitted</th>
                    <th>DDBBII</th>
                    <th>SlaveHouses</th>
                    <th>PDFpage</th>
                    <th>CensusPage</th>
                    <th>County</th>
                    <th>State</th>
                </tr>
                
                <?php $i=1;//new line
                while($results = mysql_fetch_assoc($raw_results)){
                ?>
                
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $results['LastName']; ?></td>
                    <td><?php echo $results['FirstName']; ?></td>
                    <td><?php echo $results['Notes']; ?></td>
                    <td><?php echo $results['TotalSlaves']; ?></td>
                    <td><?php echo $results['Age']; ?></td>
                    <td><?php echo $results['Sex']; ?></td>
                    <td><?php echo $results['Fugitive']; ?></td>
                    <td><?php echo $results['Manumitted']; ?></td>
                    <td><?php echo $results['DDBBII']; ?></td>
                    <td><?php echo $results['SlaveHouses']; ?></td>
                    <td><?php echo $results['PDFpage']; ?></td>
                    <td><?php echo $results['CensusPage']; ?></td>
                    <td><?php echo $results['County']; ?></td>
                    <td><?php echo $results['State']; ?></td>
                </tr>
                <?php
                $i++; //new line
                }
                ?>
            </table>
        </div> 
         <?php
        }
        else{ // if there is no matching rows do following
        echo "No results";
        }
        }
        else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
        }
        ?>
        <hr>
        <footer>
            <p>&copy; <a href="http://www.valdosta.edu/archives">Valdosta State University Archives and Special Collections, 2014 </a></p>
        </footer>
        </div> <!-- /container -->
        
</body>
</html>
