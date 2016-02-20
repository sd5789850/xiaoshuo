<?php
	require_once "config.db.php";
	$cid = $_GET['cid'];
	$sql = "SELECT chapter_title,chapter_content,novel_id FROM tb_novel_content Where chapter_id = $cid";
	$sql1 = "SELECT chapter_id,chapter_title FROM tb_novel_content Where chapter_id > $cid ORDER BY chapter_id ASC LIMIT 1";
	$sql2 = "SELECT chapter_id,chapter_title FROM tb_novel_content Where chapter_id < $cid ORDER BY chapter_id DESC LIMIT 1";
	$rs = $db->query($sql);
	$rs1 = $db->query($sql1);
	$rs2 = $db->query($sql2);
	$rt = mysql_fetch_array($rs);
	$rt1 = mysql_fetch_assoc($rs1);
	$rt2 = mysql_fetch_assoc($rs2);
	$novel_id = $rt['novel_id'];
	$next = $rt1['chapter_id'];	//下一页
	$n_title = $rt1['chapter_title'];
	$previous = $rt2['chapter_id']; //上一页
	$p_title = $rt2['chapter_title']; //
	if(empty($rt2)){  $previous = '#'; }
	$title = $rt[0];
	$content = $rt[1];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>小说阅读</title>
<style type="text/css">
	a:link,a:visited{
	 text-decoration:none;  /*超链接无下划线*/
	}
	a:hover{
	 text-decoration:underline;  /*鼠标放上去有下划线*/
	}
</style>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="900" align="center">
	<tr>
		<td>
			<a href="index.php"><<返回主页</a>&nbsp;&nbsp;
			<a href="novel_article_list.php?nid=<?php echo $novel_id; ?>"><<返回文章列表</a>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<h1><?php echo $title; ?></h1>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<font size=3><?php echo $content; ?></font>
		</td>
	</tr>
	<tr>
		<td align="center" height="80" width="450" >
			<?php echo $p_title;  ?><a href="read_book.php?cid=<?php echo $previous; ?>">上一页</a>
		</td>
		<td align="center">
			<a href="read_book.php?cid=<?php echo $next; ?>">下一页</a><?php echo $n_title; ?>
		</td>
	</tr>
	<tr>
		<td>
			<a href="index.php"><<返回主页</a>&nbsp;&nbsp;
			<a href="novel_article_list.php?nid=<?php echo $novel_id; ?>"><<返回文章列表</a>
		</td>
	</tr>
</table>
</body>
</html>