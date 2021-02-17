<?
class FilesClear{
	public function delDir($path) {
	//先删除目录下的文件：
	if (is_dir($path)) {    //判断是否是目录
            $p=scandir($path);     //获取目录下所有文件
            foreach ($p as $value) {
                if ($value != '.' && $value != '..') {    //排除掉当./和../
                    if (is_dir($path.'/'.$value)) {
                        $this->delDir($path.'/'.$value);    //递归调用删除方法
                        //rmdir($path.'/'.$value);    //删除当前文件夹
                    }else{
                        unlink($path.'/'.$value);    //删除当前文件
                    }
                }
            }
        }
	}
}
?>