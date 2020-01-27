<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
</head>
<body>

<p>Hello member <?=$_SESSION['name'];?></p>
<a href="<?=base_url();?>user/logout">Logout</a>
</body>
</html>
