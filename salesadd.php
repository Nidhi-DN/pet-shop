<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
  <head>
  <title>
 sales
  </title>
<style>
  
  body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background:rgb(232, 221, 193) ;
}
.topnav {
  overflow: hidden;
  background-color:rgb(152, 116, 112) ;
  height: 70px;
 
}

.topnav a {
  float: left;
  color: rgb(232, 221, 193);
  text-align: center;
  padding:18px 14px 14px 0px ;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.brand {
  overflow: hidden;
  background-color:rgb(152, 116, 112);
 
  float: left;
  color: rgb(232, 221, 193);
  text-align: left;
  padding: 14px 7px 4px 15px;
  text-decoration: none;

}

fieldset { max-width: 450px;
	background: #FAFAFA;
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgb(232, 221, 193) ;
	border-radius: 10px;
	border: 4px solid  rgb(152, 116, 112);


}

legend {
  padding: 0.2em 0.5em;
  border:2px solid  rgb(152, 116, 112);
  color:black;
  font-size:90%;
  text-align:center;
  }
</style>
  </head>
<body>
<div class="brand">
            <a class="active" href="home.html"><img src="logo.png"></a>
</div>
  <div class="topnav">
           
            <a href="sales.php">SALES</a>
          </div>

<form>
<button type="submit" formaction="sales.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;
border-radius:10px;
border: 2px solid black;background-color:rgb(152, 116, 112);color:#f2f2f2;font-size:15px;">back</button>
</form>
<form method="post" action="salesadd.php">

  <fieldset>
  
    <input type="text"  id ="sd" name="id" placeholder="Enter the sales id" style="width:100%;height:30px;
    border: 2px solid rgb(152, 116, 112); border-radius:5px;" required>
   <br><br>
   <input type="text" name="csid" placeholder="Enter the customer id" style="width:100%;height:30px;
    border: 2px solid rgb(152, 116, 112);border-radius:5px; " required>
  <br><br>
   <input type="date" name="date" style="width:100%;height:30px;
   border: 2px solid rgb(152, 116, 112);border-radius:5px;" required>
  <br><br>
  <input type="submit" name="submit" value="save" style="width:100%;height:34px;border-radius:10px;
  border: 2px solid black; cursor:pointer;background-color: rgb(152, 116, 112)">&ensp; 
</fieldset> 

</form> 
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
  // define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Petshop_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "  CONNECTION ESTABLISHED \r\n";
//echo "  INSERTION IN PROCESS";
$id = $_POST["id"];
  $cs_id = $_POST["csid"];
  $date= $_POST["date"];
 // $total = $_POST["total"];
 




$sql = "INSERT INTO sales( sd_id,cs_id,date)
VALUES ('$id','$cs_id','$date')";
if ($conn->multi_query($sql) == TRUE) {
  echo'<div>
      <h1 style="color:#404040;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of id='
      .$id. ' inserted successfully</h1>
         </div>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


?>