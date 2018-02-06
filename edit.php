<?php
include('connection.php');
if(isset($_REQUEST['edit_id']))
{
	$ed = $_REQUEST['edit_id'];
	
	$sel = "select * from tbl_user where uid='$ed'";
	
	$ex = $con->query($sel);
	
	$res = $ex->fetch_object();
	
	
	if(isset($_REQUEST['update']))
	{
		$u = $_REQUEST['uname'];
		$e = $_REQUEST['email'];
		$p = $_REQUEST['pass'];
		$g = $_REQUEST['gender'];
		$h = implode(",",$_REQUEST['chk']);
		
		$ct = $_REQUEST['city'];
		$ad= $_REQUEST['addr'];
		
		$up = "update tbl_user set uname='$u',email='$e',pass='$p',gender='$g',hobby='$h',city='$ct',address='$ad' where uid='$ed'";
		
		$ex = $con->query($up);
		
		header('location:show.php');
		
	}
}
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content=text/html; charset=iso-8859-1"/>
<title>Registration Form</title>
</head>
<body bgcolor='#E6E6FA'>
<h3><center>Update Record Form</center></h3> <hr />
<form method="post">
  <table align="center" border="1">
     <tr>
	   <td>Username</td>
	   <td><input type="text" name="uname" value="<?php echo $res->uname; ?>"/></td>
	   </tr>
	   <tr>
	   <td>Email</td>
	   <td><input type="text" name="email" value="<?php echo $res->email; ?>"/></td>
	   </tr>
	   <tr>
	   <td>Password</td>
	   <td><input type="password" name="pass" value="<?php echo $res->pass; ?>"/></td>
	   </tr>
	 <tr>
	   <td>Gender</td>
	   <td>
	   <input type="radio" name="gender" value="male"
	   
	   <?php
	   if($res->gender == 'male')
	   {
		   echo "checked = 'checked'";
	   }
	   ?>/>Male
	   <input type="radio" name="gender" value="female"
	   	   <?php
	   if($res->gender == 'female')
	   {
		   echo "checked = 'checked'";
	   }
	   ?>/>Female
	   </td>
	   </tr>
	 <tr>
	 <?php
	 $t = $res->hobby;
	 $h = explode(",",$t);
	 ?>
	   <td>Hobby</td>
	   <td>
	   <input type="checkbox" name="chk[]" value="read" 
	   <?php
	   if(in_array('read',$h))
	   {
		   echo "checked = 'checked'";
	   }
	   ?>/>Read
	   <input type="checkbox" name="chk[]" value="play" 
	   <?php
	   if(in_array('play',$h))
	   {
		   echo "checked = 'checked'";
	   }
	   ?>/>Play
	   </td>
	   </tr>
	   <tr>
	   <td>City </td>
	   <td>
	   <?php 
	   $sel = "select * from tbl_city";
	   $ex = $con->query($sel);
	   ?>
	   <select name="city">
	   <option value="select">Select</option>
	   <?php
	   while($fc=$ex->fetch_object())
	   {
		   if($fc->ctid == $res->city)
		   {
			   
		   ?>
		   <option value="<?php echo $fc->ctid; ?>" selected="selected"> <?php echo $fc->ctname; ?></option>
		<?php
	   }		
	   else
	   {
		   
	   ?>
	   <option value="<?php echo $fc->ctid; ?>" > <?php echo $fc->ctname; ?></option>
	   <?php
	   }
	   }
	   ?>
	   </select>
	   </td>
	   </tr>
	   <tr>
	   <td>Address</td>
	   <td>
	   <textarea name="addr" cols="20" rows="5"><?php echo $res->address; ?></textarea></td>
	   </tr>
	   <tr>
	   <td align="center" colspan="2">
	   <input type="submit" name="update" value="Update"/>
	   </tr>
	   </table>
	   </form>
	   </body>
	   </html>

