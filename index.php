<?php
	require_once "config.db.php";
	$sql = "SELECT novel_id FROM tb_novel_content";
	$rs = $db->query($sql);
	$rt = mysql_fetch_array($rs);
	$novel_id = $rt[0];
	


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title>小说</title>
</head>
<body>
	<a href="novel_article_list.php?nid=<?php echo $novel_id; ?>" >绝艳乡村</a>
</body>
</html>