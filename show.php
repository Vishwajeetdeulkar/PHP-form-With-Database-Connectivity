<?php
include('connection.php');
$sel = "select * from tbl_user join tbl_city on tbl_user.city=tbl_city.ctid order by uname desc";
$ex = $con->query($sel);
        if(isset($_REQUEST['del_id']))
{
	$d = $_REQUEST['del_id'];
	$del = "delete from tbl_user where uid = '$d'";
	$ex = $con->query($del);
	header('location:show.php');
}
?>


<html>
<head>
<meta http-equiv="Content-Type" content=text/html; charset=iso-8859-1"/>
<title>Registration Form</title>
</head>
<body bgcolor='#E6E6FA'>
<h3><center>View Record Form </center></h3>
<form method="post">
<table align="center" border="1">
<tr>
<th>User Id</th>
<th>UserName</th>
<th>Email</th>
<th>Password</th>
<th>Gender</th>
<th>Hobby</th>
<th>City</th>
<th>Address</th>
<th align="center" colspan="2">Action</th>
</tr>
<?php 
while($rw = $ex->fetch_object())
{
	?>
	<tr>
	<td><?php echo $rw->uid; ?> </td>
	<td><?php echo $rw->uname; ?> </td>
	<td><?php echo $rw->email; ?> </td>
	<td><?php echo $rw->pass; ?> </td>
	<td><?php echo $rw->gender; ?> </td>
	<td><?php echo $rw->hobby; ?> </td>
	<td><?php echo $rw->ctname; ?> </td>
	<td><?php echo $rw->address; ?> </td>
	
	<td><a href="show.php?del_id=<?php echo $rw->uid; ?>">Delete</a></td>
	<td><a href="edit.php?edit_id=<?php echo $rw->uid; ?>">Edit</a></td>
	
	
	</tr>
	<?php
}
?>
</table>
</form>
</body>
</html>