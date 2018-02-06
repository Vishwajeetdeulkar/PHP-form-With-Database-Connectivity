<?php
include('connection.php');
if(isset($_POST['add']))
{
	$u = $_REQUEST['uname'];
	$e = $_REQUEST['email'];
	$p = $_REQUEST['pass'];
	$g = $_REQUEST['gender'];
	$h = implode(",",$_REQUEST['chk']);
	$ct = $_REQUEST['city'];
	$ad = $_REQUEST['addr'];
	
	$ins = "insert into tbl_user(uname,email,pass,gender,hobby,city,address) values('$u','$e','$p','$g','$h','$ct','$ad')";
	
	$ex = $con->query($ins);
	
	header('location:show.php');
}	
?>
<html>
<body bgcolor='#E6E6FA'>
<h3><center>Registration</h3></center><hr/>
<form method="post">
<table align="center" border="1">
<tr>
<td>Username</td>
<td><input type="text" name="uname"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="email"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female</td>
</tr>
<tr>
<td>hobby</td>
<td><input type="checkbox" name="chk[]" value="read">Read
            <input type="checkbox" name="chk[]" value="play">Play</td>
</tr>
<tr>
<td>City</td>
<td>

<?php
$sel="select * from tbl_city";
$ex= $con->query($sel);
?>
<select name="city">
<option value="select">select</option>
<?php
//dynamic drop down menue from table
while ($fc= $ex->fetch_object())
{
?>
<option value="<?php echo $fc->ctid; ?>"><?php echo $fc->ctname; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>Address</td>
<td><textarea name="addr" cols="20" rows="5"></textarea></td>
</tr>
<tr>
<td align="center" colspan="2">
<input type="submit" name="add" value="Add">
</td>
</tr>
</table>
</body>
</html>