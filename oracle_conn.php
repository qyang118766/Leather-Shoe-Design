<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?
$images = array(
"http://wcadmin:ptc@18.163.41.90/Windchill/images/quarter0.png",
"http://wcadmin:ptc@18.163.41.90/Windchill/images/vamp1.png",
"http://wcadmin:ptc@18.163.41.90/Windchill/images/icon0.png",
"http://wcadmin:ptc@18.163.41.90/Windchill/images/icon1.png"
        
);

function filenameStandardization($filenameFull,$filenameEXT,$replaceStr){//用于存储在本地的文件名标准化方便索引
	$EXTPosition = strrpos($filenameFull,$filenameEXT);
	return substr_replace($filenameFull,$replaceStr,0,$EXTPosition-1);
}

function getimages($url,$path,$index){
    $ch = curl_init();//初始化
    curl_setopt($ch, CURLOPT_URL, $url);//设置url
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($ch, CONNECTION_TIMEOUT, 30); //超时时间
    $file = curl_exec($ch);//执行

    $filenameFull = pathinfo($url,PATHINFO_BASENAME);//返回文件路径中文件名全文
	$filenameEXT = pathinfo($url,PATHINFO_EXTENSION);//返回文件扩展名
	$filename = filenameStandardization($filenameFull,$filenameEXT,$index);//统一文件名形式
	echo $filename." ";
    $resource = fopen($path.$filename,'a');    //不存在该文件则创建

    fwrite($resource,$file); //将通过curl获取的数据流写入到文件中
    fclose($resource);
}

for($i=0;$i<count($images);$i++){
	getimages($images[$i],'./components/',$i);
}

$url="http://wcadmin:ptc@18.163.41.90/Windchill/images/quarter0.png";
echo $url;

 /*?><?
$conn = oci_connect('pds', 'pds', '//18.162.209.89/WIND');
if (!$conn) {
  $e = oci_error();
  print htmlentities($e['message']);
  exit;
}else {
  //echo "连接oracle成功！";
  $stmt=oci_parse($conn,"select PTC_STR_1TYPEINFOLCSMATERIAL from pds.lcsmaterial");//编译语句
  oci_execute($stmt,OCI_DEFAULT);//执行语句
  while($row=oci_fetch_row($stmt)) {
    echo  $row [ 0 ]. "<br>\n" ;
}
}
oci_free_statement($stmt);
oci_close($conn);
?><?php */?>
<body>
<img src="http://18.163.41.90/Windchill/images/quarter0.png" />
<img id="pic" />
</body>
</html>