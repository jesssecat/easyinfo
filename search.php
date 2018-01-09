<?php 
	header("Content-type: text/html; charset=utf-8"); 
	require_once './conn/connect.func.php';
	// @$username=$_POST['username'];
	// @$names=$_POST['names'];
	// @$addres=$_POST['addres'];
	// @$phone=$_POST['phone'];
	// @$edu=$_POST['edu'];
	// @$sex=$_POST['sex'];
	// @$presens=$_POST['presens'];
	// @$act=$_GET['act'];
	// @$password=$_POST['password'];
	// @$requpass=$_POST['requpass'];
	// @$regtime=$_SERVER['REQUEST_TIME'];
	// @$ip=$_SERVER['REMOTE_ADDR'];
	// @$id=$_GET['id'];
	// @$uid=$_GET['uid'];
	//分页开始
		//1.设置每页大小，显示多少页
		$page_size=5;//设置页面范围是5
		//2.计算记录总数
		$page="select count(*) as c from user_reg id;";
		$count=connect($page);
		$count=$count[0]['c'];
		//3.计算总页数
		$page_count=ceil($count/$page_size);
		//4.获取当前页码
		$page_num=empty($_GET['page'])?1:$_GET['page'];
		//5.处理越界
		if($page_num<1){
			$page_num=1;
		}
		if($page_num>$page_count){
			$page_num=$page_count;
		}
		//6.组装limit语句
		$limit=" limit ".($page_num-1)*$page_size.",".$page_size;
		$sql="select * from user_reg".$limit;

		$info=connect($sql);
	//分页结束
	@$selUser=$_POST['selUser'];
	@$selUser="select * from user_reg where username like '%$selUser%';";
	
			$su=connect($selUser);
			if($su){
				echo "有数据";
				echo "<table>";
				echo "<tr>";
				echo "<th>选项</th><th>id</th><th>姓名</th><th>密码</th><th>注册时间</th><th>客户端地址</th><th>属性</th>";
				echo "</tr>";
				foreach ($su as $key => $value) {
				echo "<tr>";
				echo "<th><input name='pid' type='checkbox'  value=$value[id]/></th>";
				echo "<th>";
				echo $value['id'];
				echo "</th>";
				echo "<th>";
				echo $value['username'];
				echo "</th>";
				echo "<th>";
				echo $value['password'];
				echo "</th>";
				echo "<th>";
				echo date("Y-m-d H:i:s",$value['regtime']);
				echo "</th>";
				echo "<th>";
				echo $value['ip'];
				echo "</th>";
				echo "<th>";
				echo "<a href=\"update.php?act=update&id=$value[id]\">修改</a> | <a href=\"post.php?act=del&id=$value[id]\">删除</a>";
				// echo "<a href=\"post.php?act=update&id=$value['id']\">修改</a> | <a href=\"post.php?act=del&id=$value['id']\">修改</a>";
				echo "</th>";
				echo "<tr>";
		}
		echo "</table>";
			}else {
				echo "没有数据";
				var_dump($su);
			}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="css/css.css" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<title>LEMTREE</title>
</head>
<body>
	<div id="list">
		<p><a href="?page=1">第一页</a><p>
		<p><a href="?page=<?php echo $page_num-1; ?>">上一页</a><p>
		<p><a href="?page=<?php echo $page_num+1; ?>">下一页</a><p>
		<p><a href="?page=<?php echo $page_count; ?>">尾页</a><p>
		<p>一共<?php echo $page_count ?>页<p>
		<p>当前<?php echo $page_num ?>页</p>
		<p>本页<?php echo ($page_num==$page_count&&$count%$page_size!=0)?($count%$page_size):$page_size ?>记录</p>
		<p>一共<?php echo $count ?>条记录</p>
	</div>
	</BR><a href="list.php">列表</a>
	<a href="index.php">增加数据</a>
</body>
</html>
