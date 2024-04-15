<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="../assets/favicon.ico">

    <link rel="stylesheet" href="../style/complaints.css">

    <title>Complaints </title>

</head>


<body>
  

<div class="container">
	<div class="blob-container">
    <div class="blob"></div>
    <div class="blob one"></div>
    <div class="blob two"></div>
    <div class="blob three"></div>
    <div class="blob four"></div>
    <div class="blob five"></div>
    <div class="blob six"></div>
    <div class="blob seven"></div>
    <div class="blob eight"></div>
    <div class="blob nine"></div>
    <div class="blob ten"></div>
  </div>

  <section>
      <div class="card">
        <div class="card-child">
          <?php
            session_start();
            // echo $_SESSION['logged'];
            $user = $_SESSION['user'];
          if ($_SESSION['logged'] != "1") {
            header("Location: http://localhost/project/pages/login.php");
            exit();
          } 

          include("../handlers/dbConnectivity.php");
          $connection = dbConnectivity();
          $query = "SELECT * FROM admin WHERE username = '$user';";
          $result = mysqli_query($connection, $query);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $username= $row["username"];
                $position = $row["position"];
                
            }
        }

        // trial
        

          
        // trial
          

          echo "<h1 class='user-title'>Welcome, $user ! <span class='xdgfds'><br>";
          echo "<h4 class='position'>$position</h4>"
          ?>
          <br><form action='../handlers/auth.php' method='POST'>
            <br><button class='solveBtn' name='logout'>Logout</button>
        </form> <br>
        <form action="../handlers/goHome.php" method="POST">
       <button class="solveBtn" href="http://localhost/project/pages/landing.php">Back</button>
    </form>
          </span></h1>
          <!-- button -->
          
          <br><img class="image-container" src="../assets/user_avatar.svg" alt="user avatar" />
        </div>

          <div class="complaint-section">
            <br> <br> <h1 class="complaints-header">Complaints</h1>
  <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
       <th>Contact Number</th>
      <th>Email</th> 
      <th>Title</th>
    <th>Complaint</th>
      <th>Status</th>
      <th>Previous</th>
      <th>Remarks</th>
  
      <th></th>

    </tr>
  </thead>
  <tbody>
    <?php
    $str = "hello";


    function generateRandom5DigitNumber() {
      $min = 10000; // Smallest 5-digit number
      $max = 99999; // Largest 5-digit number
  
      return rand($min, $max);
  }

  // getting data from database

  // include("../handlers/dbConnectivity.php");
  $connection = dbConnectivity();

  $query = "SELECT * FROM complaints";
  $results = mysqli_query($connection, $query);

  if (mysqli_num_rows($results) > 0) {
    while($row = mysqli_fetch_assoc($results)) {
      $id= $row["id"];
      $name = $row["name"];
      $contact = $row["contact"];
      $email = $row["email"];
      $title = $row["title"];
      $description = $row["description"];
      $uniqueId = $row["uniqueId"];
      $status = $row["status"];
      $remarks = $row["remarks"];
     
      $remarkWord = "Solved";
      $fontColor = 'green';
      if ($status == '2') {
        $remarkWord = "Not Solved";
        $fontColor = 'red';
      }
      

      echo"  <tr>
      <td data-column=> $uniqueId </td>
      <td>$name</td>
     <td>$contact</td>
    
       <td>$email</td>
       <td>$title</td>
       <td>$description</td>
      
      
  
      
      <strong>
      <td  class='solveStatus' style='color: $fontColor' >$remarkWord</td>
      </strong>
      <td>
      $remarks
      </td>

      </form>
      <td>
      <span>
      <button id='$uniqueId' class='solveBtn' onClick='abc($uniqueId)'>Details</button>
      <div id='myModal' class='modal'>
 
        <div class='modal-content'>
          <div class='modal-header'>
           <br> <span class='close' onclick='close1($uniqueId)'>&times;</span>
           <center> <p>Complaint ID: $uniqueId</p></center><br>
          </div>
          <div class='modal-body'>
            <p>
            <p><strong>Name  : </strong>$name</p>
           
         
            <p><strong>Email:</strong>$email</p>
            
            <p><strong>Title:</strong>$title</p>
           
            <p><strong>Complaint:</strong>$description</p>
            
        <p><strong>Privious remark : </strong> $remarks</p>
    
      
        </p>
          <br></div>
          <div class='modal-footer'>
            
          <br><form action='../handlers/updateComplaint.php' method='POST'>
          
          <center><input  placeholder='Write Remarks' type='text' id='adminRemark' name='adminRemark' required  ></center>
          <input style='display: none' id='uniqueId'  name='uniqueId'  value='$uniqueId' >
          
          
          <center><button  type='submit' value='submit'  class='solveBtn'>Mark Solved</button></center><br>  
          

          </div>
        </div>
        </span>
      </td>
      

  
    </tr>
   

    ";

  }
  }


    ?>




  </tbody>
</table>    

<!-- table section -->

<!-- table section -->
        </div>

    </div><br><br>

  

  </section>
</div>

</body>




<script src="../scripts/complaintsScript.js">

</script>

</html>

