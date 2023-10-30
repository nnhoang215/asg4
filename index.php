<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- <link rel="stylesheet" href="css/main.css"> -->
</head>

<body>
  <div>Computerized Voting Platform for Australian citizens</div>
   <main>
    <form action="index.php" method="get">
      <label for="fullname">Fullname</label>
      <input id="fullname" type="text" name="fullname" placeholder="Enter your full name here...">
      
      <label for="address">Address</label>
      <input id="address" type="text" name="address" placeholder="Search address here...">

      <label for="state">State</label>
      <input id="state" type="text" name="state">

      <label for="postcode">Postcode</label>
      <input id="postcode" type="text" name="postcode">

      <label for="hasVoted">Have you voted in this election before (Tick if already voted)</label>
      <input id="hasVoted" type="checkbox" value="yes">      

      <button type="submit" name="submit">Submit</button>
    </form>

    <p>
    <?php
      if(isset($_GET["submit"])){
        $v1 = $_GET["fullname"];
        echo "<h1>this is: $v1<h/1>";
      }
    ?>
    </p>
</main>
</body>

</html>