<?php 
	header("Content-type: text/html; charset=utf-8"); 
	require './conn/connect.func.php';
	require './post.php';
	$infos=connect($update);
	$sexs=array('男','女','保密');
	$edu=array('小学','初中','高中','大学','硕士','博士','博士后');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改用户资料</title>
	<link rel="stylesheet" href="css/css.css">
</head>
<body>
	<table><form action=""><tr><tr><input type="text"><input type="submit" value="搜索用户名"></tr></tr></form></table>
	<form action="post.php?act=updateadd&uid=<?php echo  $infos[0]['id'];?>" method="post">
		<table>
			<tr><th>I D</th><th><input type="text" name="id" value="<?php echo  $infos[0]['id'];?>" disabled/></th></tr>
			<tr><th>姓名</th><th><input type="text" name="username" value="<?php echo  $infos[0]['username'];?>" disabled background:none/></th></tr>
			<tr><th>真实姓名</th><th><input type="text" name="names" value="<?php echo $infos[0]['names'];?>"></th></tr>
			<tr><th>地址</th><th><input type="text" name="addres" value="<?php echo $infos[0]['addres'];?>"></th></tr>
			<tr><th>手机号</th><th><input type="text" name="phone" value="<?php echo $infos[0]['phone'];?>"></th></tr>
			<tr><th>性别</th><th><?php foreach ($sexs as $key => $value) { ?>
			<input type="radio" name='sex' <?php if($key==$infos[0]['sex']){echo "checked";}?> value="<?php echo $key?>"><?php echo $value?> <?php } ?>
			</th></tr> <tr><th>自我介绍</th><th><input type="textarea" name="presens" value="<?php echo $infos[0]['presens'];?>"></th></tr>
			<tr><th>教育水平</th><th><select name="edu" id="">
			<?php foreach($edu as $key=>$value){ ?><option value="<?php echo $key?>" <?php if($key==$infos[0]['edu']){echo "selected";}?>><?php echo $value; ?></option>
			<?php }?></select></th></tr>
		</table>
		<input type="submit">
	</form>
</body>
</html>