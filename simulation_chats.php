<!doctype html>
<html>
<body>
<?php
$servername = "sql211.ezyro.com";
$username = "ezyro_36181885";
$password = "a8a24cbdf";
$dbname = "ezyro_36181885_chat_app";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name= $_FILES["fileitem"]["name"];

$tmp_name= $_FILES['fileitem']['tmp_name'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['chat_message'];

if (isset($name)) {

$path= '/uploads/';

if (!empty($name)){
if (move_uploaded_file($tmp_name, $name)) {
}
}
}



$username=$_POST["username"];
$chat_message=$_POST["chat_message"];


     $conn->query("INSERT INTO simulation_chats(username,chat_message,filename)
	VALUES ('$username','$chat_message','$name')");



$db= $conn;
$tableName="simulation_chats";
$columns= ['username','chat_message','filename'];
$fetchData = fetch_data1($db, $tableName, $columns);
function fetch_data1($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id ASC";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>				


     
     
	 
	 
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
		  if($_SESSION['username']==$data['username']){
    ?><div style="float:right; width:100%" >
     <div id="message" style="float:right; background-color:#009900;margin-right:5px;">
      <?php
			  if(empty($data['filename']??'')){?><?php
				  echo $data['chat_message']??'';?><br><?php
			  }else{?><?php
				  echo $data['chat_message']??'';?><br>
			  <a href="<?php echo $data['filename']??''?>" ><button><object data="<?php echo $data['filename']??''; ?>" width="200px"></object></button></a>
			  <?php } ?>
	</div>
	</div>
		  <?php }else{
	?><div style="float:left; width:100%" >
     <div id="message" style="float:left;margin-left:5px;" >
      <?php
			  if(empty($data['filename']??'')){?>@<?php
				  echo $data['username']??'';?><br><?php
				  echo $data['chat_message']??'';?><br><?php
			  }else{?>@<?php
				  echo $data['username']??'';?><br><?php
				  echo $data['chat_message']??'';?><br>
			  <a href="<?php echo $data['filename']??''?>" ><button><object data="<?php echo $data['filename']??''; ?>" width="200px"></object></button></a>
			  <?php } ?>
	</div>
</div>		
			   
		  <?php }?>
	<?php 
	$sn++;}}else{ ?>
    <?php echo $fetchData; ?>
    <?php
    }?>
	


</body>
</html>