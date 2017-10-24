<?php
 define('DB_HOST', 'localhost'); 
 define('DB_NAME', 'brainrush');
 define('DB_USER','root');
 define('DB_PASSWORD',''); 
 function NewUser()
{
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
	$team = $_POST['team'];
	$fstname = $_POST['fstname'];
	$fstclname = $_POST['fstclname'];
	$fstdepartment = $_POST['fstdepartment'];
	$fstphno =  $_POST['fstphno'];
	$sndname = $_POST['sndname'];
	$sndclname = $_POST['sndclname'];
	$snddepartment = $_POST['snddepartment'];
	$sndphno =  $_POST['sndphno'];
	$trdname = $_POST['trdname'];
	$trdclname = $_POST['trdclname'];
	$trddepartment = $_POST['trddepartment'];
	$trdphno =  $_POST['trdphno'];
	$query = "insert into participant(Team,Fname,Fcollege,Fdepartment,Fno,Sname,Scollege,Sdepartment,Sno,Tname,Tcollege,Tdepartment,Tno,) values('$team','$fstname','$fstclname','$fstdepartment','$fstphno','$sndname','$sndclname','$snddepartment','$sndphno','$trdname','$trdclname','$trddepartment','$trdphno' )";
	$data = mysqli_query($conn,$query)or die("Error: ".mysqli_error($conn));
	if($data)
	{
		echo "<script>alert('Registration is Successfully')</script>";
		 //print "<script>window.location.href='';</script>";
	}
}
function SignUp()
{
	$x=$_POST['team'];
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
if(!empty($x))   
{   

    $sql="SELECT * FROM participant WHERE Team = '$x'"; 
	$query = mysqli_query($conn,$sql);
	if(!$row = mysqli_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>