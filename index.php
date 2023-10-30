<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style.css">
  <style>
    body {
      font-size: 24px;
      font-family: Arial, sans-serif;
    }

    nav {
      height: 15vh;
      background-color: #333;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-size: 1.5rem;
      margin: 0 10px;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .field-input {
      margin-bottom: 2%;
      display: flex;
      flex-direction: column;
    }

    /* Added CSS */
    input[type="text"] {
      width: 100%;
      height: 100%;
    }

    /* Center the checkbox and increase its size */
    input[type="checkbox"] {
      width: 30px;
      height: 30px;
      margin: auto;
    }
  </style>
</head>

<body>
  <nav>
    <div>
      <a href="#" style="font-size: 200%;">AEC</a>
    </div>
    <div>
      <a href="#">About</a>
      <a href="#">Contact Info</a>
    </div>
  </nav>
  <div style="font-size: 200%; font-weight: bold;">Computerized Voting Platform for Australian citizens</div>
  <?php
    session_start();
    if (isset($_SESSION["found_voter"])) {
      if ($_SESSION["found_voter"] == false) {
        echo "VOTER NOT FOUND, TRY AGAIN";
      }
    }
  ?>
  <main>
    <div style="display: flex; flex-wrap: wrap; flex-direction: row; justify-content: center; gap: 10px;">
      <form class="preliminary-questions" action="prelimform.php" method="get" onsubmit="return validateForm()">
        <div class="field-input">
          <label for="fullname">Fullname</label>
          <input id="fullname" type="text" name="fullname" placeholder="Enter your full name here...">
        </div>
        <div class="field-input">
          <label for="address">Address</label>
          <input id="address" type="text" name="address" placeholder="Search address here...">
        </div>

        <div class="field-input">
          <label for="state">State</label>
          <input id="state" type="text" name="state">
        </div>

        <div class="field-input">
          <label for="postcode">Postcode</label>
          <input id="postcode" type="text" name="postcode">
        </div>

        <div class="field-input">
          <label for="hasVoted">Have you voted in this election before (Tick if already voted)</label>
          <input id="hasVoted" type="checkbox" value="yes">
        </div>
            <button type="submit" name="submit" style="background-color: blue; color: white; font-size: 1.5rem;">Submit</button>
      </form>
    </div>
    <p>
      
    </p>
  </main>
</body>

</html>