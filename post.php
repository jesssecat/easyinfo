<?php 
	header("Content-type: text/html; charset=utf-8"); 
	require_once './conn/connect.func.php';
	@$username=$_POST['username'];
	@$names=$_POST['names'];
	@$addres=$_POST['addres'];
	@$phone=$_POST['phone'];
	@$edu=$_POST['edu'];
	@$sex=$_POST['sex'];
	@$presens=$_POST['presens'];
	@$act=$_GET['act'];
	@$password=$_POST['password'];
	@$requpass=$_POST['requpass'];
	@$regtime=$_SERVER['REQUEST_TIME'];
	@$ip=$_SERVER['REMOTE_ADDR'];
	@$id=$_REQUEST['id'];
	@$uid=$_GET['uid'];
	@$selUser=$_POST['selUser'];
	@$adduser="insert into user_reg(username,password,regtime,ip)value('$username','$password','$regtime','$ip');";
	@$info="select uid from user_info where uid=\"$uid\";";
	@$addinfo="insert into user_info(uid,names,addres,phone,edu,sex,presens)value('$uid','$names','$addres','$phone','$edu','$sex','$presens');";
	// $update="select u.id,u.username,p.uid,p.names,p.addres,p.phone,p.edu,p.sex,presens,from user_reg as u left join user_info as p on id=uid=\"$id\"";
	@$update="select u.id,u.username,p.uid,p.names,p.addres,p.phone,p.edu,p.sex,p.presens from user_reg as u left join user_info as p on u.id=p.uid where id=$id;";
	@$updates="update user_info set names='$names',addres='$addres',phone='$phone',sex='$sex',presens='$presens',edu='$edu' where uid='$uid';";
	@$selUser="select * from user_reg where username='$selUser';";
	
	//两表关联，查出数据来
	switch ($act){
		case 'addUser':
			if($password==$requpass && $password!=''){
	 			connect($adduser);
	 			echo "<script>alert('添加成功')</script>";
				echo "<meta http-equiv='refresh' content='0;url=list.php'>";
			}else{
				echo "密码不正确";
				}
			break;
		case 'del':
				if(is_array($id)){
					@$id=implode(",",$id);
					@$del="delete from user_reg where id in($id);";
					$del=connect($del);
					if($del){
						echo "<script>alert('删除失败')</script>";
						echo "<meta http-equiv='refresh' content='0;url=list.php'>";
					}else{
						echo "<script>alert('删除成功')</script>";
						echo "<meta http-equiv='refresh' content='0;url=list.php'>";
					}
				}else{
						$del="delete from user_reg where id in($id);";
						$del=connect($del);
						if($del){
							echo "<script>alert('删除失败')</script>";
							echo "<meta http-equiv='refresh' content='0;url=list.php'>";
						}else{
							echo "<script>alert('删除成功')</script>";
							echo "<meta http-equiv='refresh' content='0;url=list.php'>";
					}
				}
			break;
		case 'update':
			if(!empty($info)){
				$updates=connect($update);
			}
			break;
		case 'updateadd':
			$arr=connect($info);
				if(empty($arr)){
					echo "是空的";
					$updates=connect($addinfo);
					if($updates){
						echo "插入成功";
					}else{
						echo "插入失败";
					}
				}else{
					$type=connect($updates);
					if($type){
						echo "<script>alert('修改失败')</script>";
						echo "<meta http-equiv='refresh' content='0;url=list.php'>";
					}else{
						echo "<script>alert('修改成功')</script>";
						echo "<meta http-equiv='refresh' content='0;url=list.php'>";
					}
				}
			break;

			}
