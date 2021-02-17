<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

<?
ob_end_clean();
ob_implicit_flush(1);
$p=0;
while($p<10){
     //部分浏览器需要内容达到一定长度了才输出
    echo str_repeat("<div></div>", 200).'hello sjolzy.cn<br />';
    sleep(1);
	$p++;
 }

?>
</body>
</html>