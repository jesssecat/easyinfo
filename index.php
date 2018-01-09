<?php 
	header("Content-type: text/html; charset=utf-8"); 
	require './conn/connect.func.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lemtree</title>
	<link rel="stylesheet" href="css/css.css">
</head>
<body>
	<form action="post.php?act=addUser" method="post">
		<table>
			<tr><th>姓名：</th><th><input type="text" name="username"></th></tr>
			<tr><th>密码：</th><th><input type="text" name="password"></th></tr>
			<tr><th>确认密码：</th><th><input type="text" name="requpass"></th></tr>
			
		</table>
		<input type="submit" value="提交">
	</form>
	<a href="list.php">列表</a>
	<a href="index.php">增加数据</a>
</body>
</html>