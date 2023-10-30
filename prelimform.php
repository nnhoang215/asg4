<?php echo '<p>Establishing a connection to an Oracle database.</p>';

session_start();

if (isset($_GET["submit"])) {
    if ($_GET["hasVoted"] == "yes") {
        header('Location: ./index.php');
        exit();
    }
    $_SESSION["voter_name"] = $_GET["fullname"];
    $_SESSION["postcode"] = $_GET["postcode"];
    echo $_SESSION["voter_name"];
    echo $_SESSION["postcode"];
}

$username = 's3926555';
$password = 'S3926555@rmit.edu.vn'; //DO NOT enter your RMIT password
$servername = 'talsprddb01.int.its.rmit.edu.au';
$servicename = 'CSAMPR1.ITS.RMIT.EDU.AU';
$connection = $servername."/".$servicename;

$conn = oci_connect($username, $password, $connection);
if(!$conn)
{
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else
{
    echo "<p>Successfully connected to CSAMPR1.ITS.RMIT.EDU.AU.</p>";

    // Testing a generic SELECT SQL 
    // This SQL will work even if you do not have any tables created on your database accoount.
    // 
    $stid = oci_parse($conn, 'SELECT sysdate FROM dual');

    // The define MUST be done before executing
    // It assigns a php variable to receive SQL query result
    oci_define_by_name($stid, 'SYSDATE', $oracle_sys_date);

    oci_execute($stid);

    // Each fetch populates the previously defined variables with the next row's data
    // In this example, there would be only ONE row in the result.
    // However, queries do produce multi-row resulsts, it is looped through until
    // all of the query result rows are processed.
    while (oci_fetch($stid))
    {
        echo "Current System Date in Oracle Database is $oracle_sys_date<br>\n";
    }


    // testing SELECT SQL from movie table
    $stid = oci_parse($conn, "SELECT * FROM voterregistry WHERE firstname='" . $_SESSION["voter_name"] . "' AND postaddress=" . $_SESSION["postcode"] . "");
    // $stid = oci_parse($conn, "SELECT * FROM voterregistry WHERE firstname='Joe Bloggs' AND postaddress=3000");
    // $stid = oci_parse($conn, "SELECT * FROM voterregistry");
    $result = oci_execute($stid);
    // Populate the table with data fetched from the Oracle table
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {}
    $num_rows = oci_num_rows($stid);
    if ($num_rows < 1) {
        echo "No results";
        $_SESSION["found_voter"] = false;
        header('Location: ./index.php');
    } else {
        $stid = oci_parse($conn, "SELECT * FROM issuancerecord WHERE firstname='" . $_SESSION["voter_name"] . "' AND postaddress=" . $_SESSION["postcode"] . "");
        $_SESSION["found_voter"] = true;
        header('Location: ./ballot.php');
    }
}

oci_close($conn);

?>

 </body>
</html>