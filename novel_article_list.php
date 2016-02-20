<?php
	echo "<meta charset=utf8>";
	require_once "config.db.php";
	$novel_id = $_GET['nid'];
	$sql = "SELECT chapter_title,chapter_id FROM tb_novel_content WHERE novel_id=$novel_id ";
	$rs = $db->query($sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>章节列表</title>
<style type="text/css">
	a:link,a:visited{
	 text-decoration:none;  /*超链接无下划线*/
	}
	a:hover{
	 text-decoration:underline;  /*鼠标放上去有下划线*/
	}
</style>
</head>
<body>
	<table align="center" width="900" border="0">
	<tr>
		<td colspan="3">
			<a href="index.php"><<返回主页</a>&nbsp;&nbsp;
			<a href="novel_article_list.php?nid=<?php echo $novel_id; ?>"><<返回文章列表</a>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="3">
			<h1>标题</h1>
		</td>
	</tr>
	<tr>
	<?php
		while ($rt = mysql_fetch_assoc($rs)){
			$i==1;$i++;
	?>
			<td align="left"><a href="read_book.php?cid=<?php echo $rt['chapter_id']; ?>">
	<?php
			echo $rt['chapter_title'];
	?>
			</td></a>
	<?php
			if($i%3==0){
				echo '</tr>';
			}
			
		}
	?>

	</table>

</body>
</html>