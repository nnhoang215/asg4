<html>
 <head>
  <title>Your ballot</title>
 </head>
 <body>
 <?php echo '<p>Establishing a connection to an Oracle database.</p>';

session_start();

// establish a database connection to your Oracle database.
$username = 's3926555';
$password = 'S3926555@rmit.edu.vn'; //DO NOT enter your RMIT password
$servername = 'talsprddb01.int.its.rmit.edu.au';
$servicename = 'CSAMPR1.ITS.RMIT.EDU.AU';
$connection = $servername."/".$servicename;
$electionNum = "20220521"; 

$conn = oci_connect($username, $password, $connection);
if(!$conn)
{
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else
{
    echo "<p>This is the ballot paper for postcode: " . $_SESSION["postcode"]. "</p>";
}

oci_close($conn);

?>

 </body>
</html>