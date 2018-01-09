<?php 
 	date_default_timezone_set('PRC'); 
	function connect($sql){
		//1，连接数据库
		$link=mysql_connect('localhost','root','root');
		//2，判断错误
		if(!$link){
			echo mysql_error();
			return false;
		}
		//3，设置字符集
		mysql_set_charset('utf8');
		//4，选择数据库
		mysql_select_db('lemtree');
		//5，准备sql语句
		//这个上一步准备好，直接进行下一步发送
		//6.发送sql语句
		$res=mysql_query($sql);
		//6.1判断$res是否是资源类型

		if(is_resource($res)){
			//如果是一个资源，需要解析
			while($row=mysql_fetch_assoc($res)){
				$data[]=$row;
				//将解析的数值放入到二维数组中，这时候$data是一个二维数组
			}
			mysql_free_result($res);
			mysql_close($link);

			return $data;	
		}else{
			if($res){
				$count=mysql_affected_rows();
				mysql_close($link);
				//说明增删改成功，返回受影响行数
				return;
			}else{
				echo mysql_error();
				mysql_close($link);
				return false;
			}
		}
		//7，处理结果
		
		//8，关闭数据库链接
	}


	 /*
 preject

 create table user_info(
						uid int unsigned not null primary key,
						username varchar(50) not null,
						password varchar(50) not null,
						names varchar(50) not null unique,
						addres varchar(50) not null default '0',
						phone varchar(20) not null default '0',
						edu varchar(15) not null default '0',
						sex varchar(5) not null default '0',
						presens text
					)engine=myisam default charset=utf8;
  */