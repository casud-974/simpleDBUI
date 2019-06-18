  <?php  
 //fetch.php  
  $connect = mysqli_connect("localhost", "phpadmin", "mypsw", "richDB"); 
  mysqli_set_charset($connect,"utf8"); 
  if(isset($_POST["entreprise_id"]))  
  {  
  	$query = "SELECT * FROM Entreprises_Table WHERE id = '".$_POST["entreprise_id"]."'";  
  	mysqli_set_charset($connect,"utf8");
  	$result = mysqli_query($connect, $query);  
  	$row = mysqli_fetch_array($result);  
  	echo json_encode($row);  
  }  
  ?>