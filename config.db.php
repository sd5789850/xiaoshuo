<?php
	require_once "mysql.class.php";
    $db_config["hostname"] = "localhost"; //服务器地址
    $db_config["username"] = "root"; //数据库用户名
    $db_config["password"] = "root"; //数据库密码
    $db_config["database"] = "db_novel"; //数据库名称
    $db_config["charset"] = "utf8";//数据库编码
    $db_config["pconnect"] = 0;//开启持久连接
    $db_config["log"] = 0;//开启日志
    $db_config["logfilepath"] = './';//开启日志
    //连接数据库
    $db = new DB();
?>