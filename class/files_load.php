<?
class FilesLoad{
	
	function loadImagesArray($pathPrimayImage,$pathIconImage,$arrayPrimayImage,$arrayIconImage,$index){
		for($i=0;$i<count($arrayPrimayImage);$i++){//加载主图像
			$this->loadImages($arrayPrimayImage[$i],$pathPrimayImage,$index[$i]);
		}
		for($i=0;$i<count($arrayIconImage);$i++){//加载图标
			$this->loadImages($arrayIconImage[$i],$pathIconImage,$index[$i]);
		}
		
	}
	
	function loadHomePageImages($pathHomePageImages,$arrayHomePageImages){
		for($i=0;$i<count($arrayHomePageImages);$i++){//加载图标
			$this->loadImages($arrayHomePageImages[$i],$pathHomePageImages,$i);
		}
	}
	
	function filenameStandardization($filenameFull,$filenameEXT,$replaceStr){//用于存储在本地的文件名标准化方便索引
		$EXTPosition = strrpos($filenameFull,$filenameEXT);
		return substr_replace($filenameFull,$replaceStr,0,$EXTPosition-1);
	}
	
	function loadImages($url,$path,$index){
		$ch = curl_init();//初始化
		curl_setopt($ch, CURLOPT_URL, $url);//设置url
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
		curl_setopt($ch, CONNECTION_TIMEOUT, 1000); //超时时间
		$file = curl_exec($ch);//执行
	
		$filenameFull = pathinfo($url,PATHINFO_BASENAME);//返回文件路径中文件名全文
		$filenameEXT = pathinfo($url,PATHINFO_EXTENSION);//返回文件扩展名
		$filename = $this->filenameStandardization($filenameFull,$filenameEXT,$index);//统一文件名形式
		//echo $filename." ";
		//echo $path;
		$resource = fopen($path.$filename,'a');    //不存在该文件则创建
	
		fwrite($resource,$file); //将通过curl获取的数据流写入到文件中
		fclose($resource);
	}
}

/*$images = array(
"http://wcadmin:ptc@18.162.209.50/Windchill/images/quarter0.png",
"http://wcadmin:ptc@18.162.209.50/Windchill/images/vamp1.png",
"http://wcadmin:ptc@18.162.209.50/Windchill/images/icon0.png",
"http://wcadmin:ptc@18.162.209.50/Windchill/images/icon1.png"
);
$p = new FilesLoad();
$p->loadHomePageImages("../pics/homepageimgs/",$images);*/

?>