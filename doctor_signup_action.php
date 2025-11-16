<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$username=$_POST['username'];
$password=$_POST['password'];

$image=$_FILES['image']['name'];
$image_tmp=$_FILES['image']['tmp_name'];
$image_target="uploads/" . basename($image);
move_uploaded_file($image_tmp,$image_target);

$experience=$_FILES['experience']['name'];
$experience_tmp=$_FILES['experience']['tmp_name'];
$experience_target="uploads/" . basename($experience);
move_uploaded_file($experience_tmp,$experience_target);

include 'connection.php';  

$str="select*from login where username='$username'";
$result=mysqli_query($con,$str);
if(mysqli_num_rows($result)>0)
{echo"<script>alert('username are already exists');window.location='sighup.php'</script>";
}
else{
$query="insert into login(username,password,user_type,user_status) values('$username','$password','doctor','pending')";
mysqli_query($con,$query);
$log=mysqli_insert_id($con);
$sql="insert into doctor_signup(name,email,phone,address,image,experience,availability,login_id) values('$name','$email','$phone','$address','$image','$experience','available','$log')";
mysqli_query($con,$sql);
echo"<script>alert('regisrtation succesfull'); window.location='login.php';</script>";
}

?>