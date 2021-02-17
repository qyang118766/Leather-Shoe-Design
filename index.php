<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<?
include_once("class/mysql_class.php");
include_once("dao/user_dao_class.php");//引用数据库操作类，以下两个也是
include_once("class/user_class.php");
session_start();//启动session
$group = initializePicsGroup();//初始化图片组的src地址
$_SESSION['pics_group']=$group;

if($_SESSION['id']==NULL){
	$p=NULL;
}else{
	$p=$_SESSION['id'];
	$result=getUserName($p);	
	$userName=$result[0][0];
}
$jsonFilePath = "json/";//json file path
$filename="home page product data.json";
$jsonString = file_get_contents($jsonFilePath.$filename);
$jsonArray=json_decode($jsonString, true);

function getUserName($userId){//查找用户名是否已被占用
	$user = new userDao();
	$arr=array("id"=>$userId);
	$result=$user->selectUser($arr,'','user_name');
	if($result[0][0]!=NULL) return $result;
	else return NULL;
}

function initializePicsGroup(){
	
	$group = array(
		"edge" => "./pics/leather/edge/10858.png",
		"eyelet" => NULL,
		"lace" => "./pics/leather/lace/10860.png",
		"quarters" => "./pics/leather/quarters/10863.png",
		"toe_cap" => "./pics/leather/toe_cap/10861.png",
		"tongue" => "./pics/leather/tongue/10862.png",
		"vamp" => "./pics/leather/vamp/10865.png"
	);
	return $group;
}

if($_POST[SUBMIT]){//提交验证
	$user=$_POST[USER_NAME];
	$pass=md5($_POST[USER_PASSWORD]);//加密
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('请输入您的ID和密码');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('验证码不正确，请重新输入');history.go(localhost)</script>";
		}else{
			$u = new userdao();//创建一个用户和数据库连接操作的实例
			$arr = array("user_name"=>"$user","password"=>"$pass");

			$result=$u->selectUser($arr,'AND','id');//查询
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('账号或密码错误，请检查');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//提交给session后页面跳转
				$_SESSION['left_panel']=FALSE;//是否显示左边设计窗 0否 1是
				header("Location:index.php");
				}

		}
	} 

	
}
?>


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
<!--// css -->
<!-- font -->
<link href="http://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
	<!-- start-smooth-scrolling -->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			</script>
	<!-- //start-smoth-scrolling -->
		<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
</head>
<body>
<div class="header-top-w3layouts">
	<div class="container">
		<div class="indicat-w3">
				<img src="./pics/logos/logo.jpg" style="width:80px; height:80px">
		</div>
		<div class="detail-w3l">
        	<?
            if($p==NULL){
			?>
			<ul>
				<li> <font color="#0000FF">你好！</font></li>
				<li> <a href="#" data-toggle="modal" data-target="#myModal">请登录</a></li>
			</ul>
            <?
			}else{
			?>
            <ul>
				<li> <font color="#0000FF">你好！<?=$userName?></font></li>
				<li> <a href="">我的创作</a> </li>
                <li> <a href="../log_out.php">退出</a> </li>
			</ul>
            <?
			}
			?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="banner" id="banner">
	<div class="ban-top ">
		<div class="container">
			<div class="ban-top-con">
			<div class="top_nav_right">
				<a href="#"><h1>BMTCHINA</h1></a>
			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav menu__list">
						<li class="active menu__item menu__item--current"><a class="menu__link" href="index.html">主页 <span class="sr-only">(current)</span></a></li>
                        <li class=" menu__item"><a class="menu__link scroll" href="#service">服务</a></li>
						<li class=" menu__item"><a class="menu__link scroll" href="#gallery">产品收藏</a></li>
                        <li class=" menu__item"><a class="menu__link scroll" href="#designer">设计师</a></li>
						<li class=" menu__item"><a class="menu__link scroll" href="#contact">联系我们</a></li>
					  </ul>
					</div>
				  </div>
				</nav>	
			</div>
			
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="ban-bot text-center">
		<script src="js/responsiveslides.min.js"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider3">
				<li>
					<div class="ban-info">
						<h3>端到端的新模式</h3>
                        <p>您将与世界各地的最新技术工艺在云端相接</p>
                        <?
						if($p==NULL){//如果未能得到session,直接退出
						?>
                        <a class="hvr-rectangle-out" href="#" data-toggle="modal" data-target="#myModal">2020 冬 季 新 款 上 市</a>
                        <?
						}else{?>
                        <a class="hvr-rectangle-out" href="#gallery">2020 冬 季 新 款 上 市</a>
						<?	
							}
                        ?>
						
					</div>		
				</li>
				<li>
					<div class="ban-info">
						<h3>名师手工订制</h3>
						<p>来自全球165名手工制鞋大师，为您亲手打造专属的舒适与时尚</p>
						<?
						if($p==NULL){//如果未能得到session,直接退出
						?>
                        <a class="hvr-rectangle-out" href="#" data-toggle="modal" data-target="#myModal">2020 冬 季 新 款 上 市</a>
                        <?
						}else{?>
                        <a class="hvr-rectangle-out" href="#gallery">2020 冬 季 新 款 上 市</a>
						<?	
							}
                        ?>
					</div>		
				</li>
				<li>
					<div class="ban-info">
						<h3>充分发挥你的创意</h3>
						<p>突破固有的设计方案，融入属于你的个性元素</p>
						<?
						if($p==NULL){//如果未能得到session,直接退出
						?>
                        <a class="hvr-rectangle-out" href="#" data-toggle="modal" data-target="#myModal">2020 冬 季 新 款 上 市</a>
                        <?
						}else{?>
                        <a class="hvr-rectangle-out" href="#gallery">2020 冬 季 新 款 上 市</a>
						<?	
							}
                        ?>
					</div>		
				</li>			
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">请先登录</h4>
      </div>
      <form action="" method="post" name="log in">
      <div class="modal-body" align="center">
        
                <table width="260" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
                        账&nbsp;&nbsp;&nbsp;号:&nbsp;
                    </td>
                    <td><input name="USER_NAME" type="text" size="15" maxlength="20" /></td>
                    <td align="center"><a href="register.php"><u>注&nbsp;&nbsp;&nbsp;&nbsp;册</u></a></td>
                  </tr>
                  <tr>
                    <td>
                        </br>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td align="center">
                        密&nbsp;&nbsp;&nbsp;码:&nbsp;
                    </td>
                    <td><input name="USER_PASSWORD" type="password" size="15" maxlength="20" /></td>
                    <td align="center"><a href="get_pass.php"><u>忘记密码</u></a></td>
                  </tr>
                  <tr>
                    <td>
                        </br>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td align="center">
                        验证码:&nbsp;
                    </td>
                          <td><table width="130" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><input name="CODE" type="code" size="4" maxlength="4" /></td>
                            <td><img src='utils/idcode.php' onClick="this.src='utils/idcode.php'"/></td>
                          </tr>
                        </table>
                          <td align="center">看不清？点击图片更换</td>

                  </tr>
                </table>
              
      </div>
      <div class="modal-footer">
        <center><input name="SUBMIT" type="submit" class="btn btn-default" value="登录" /></center>
      </div>
      </form>
    </div>

  </div>
</div>



<div class="services-wthree" id="service">
	<div class="container">
		<h3>服务</h3>
		<p>从工坊到客户，从简单需求到客制化的创作；您的订单将于全世界的手工艺制鞋专家对接，打造专属的定制方案，我们将为您提供一站式的——从设计到配送的全方位服务。</p>
		<div class="content-grids ">
			<div class="col-md-3 wel-grid text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr4">
					<span></span>
					<figure class="icon">
						<i class="fa fa-cog" aria-hidden="true"></i>
					</figure>
					<h4>设计订制</h4>
				</div>
			</div>
			<div class="col-md-3 wel-grid btm-gre text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr4 btm-clr1 yash-clr">
					<span></span>
					<figure class="icon">
						<i class="fa fa-bell" aria-hidden="true"></i>
					</figure>
					<h4>匹配接单</h4>
				</div>
			</div>
			<div class="col-md-3 wel-grid text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr4 btm-clr1">
					<span></span>
					<figure class="icon">
						<i class="fa fa-flag" aria-hidden="true"></i>
					</figure>
					<h4>工艺制作</h4>
				</div>
			</div>
			<div class="col-md-3 wel-grid btm-gre text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr btm-clr3">
					<span></span>
					<figure class="icon">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</figure>
					<h4>全球配送</h4>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- gallery -->
	<div class="gallery" id="gallery">
		<h3>2020冬季新款</h3>
		<div class="w3agile_gallery_grids">
        <?	
			$i=0;
        	foreach($jsonArray as $key=>$value){
				$imgUrl="pics/homepageimgs/".$i.".jpg";
				$displayName = $value['displayName'];
				$displayDes = $value['displayDes'];
				$displayPrice = $value['displayPrice'];
				?>
				<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a href="design_studio.php">
						<figure>
							<img src=<?=$imgUrl?> alt="" class="img-responsive"/>
							<figcaption>
								<h4><?=$displayName?></h4>
								<p>
									<?=$displayDes?><br>
                                    ￥<?=$displayPrice?>
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>				
				<?
				$i++;
			}
		?>
			
			
		   <div class="clearfix"> </div>
		</div>
		<script type="text/javascript" src="js/smoothbox.jquery2.js"></script>
		<link rel="stylesheet" href="css/smoothbox.css" type='text/css' >
	</div>
<!-- //gallery -->
<!--testimonial-->
	<div class="col-md-6 testimonials-w3-agileits">
		<div class="test-content-w3-agile">
			<h3>用户点评</h3>
							<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<p><i class="fa fa-quote-left" aria-hidden="true"></i> 男友过生日送他的礼物，订制功能超赞，可以任意选搭自己喜欢的样式，不拘一格，还可以刻印我们的签名，看着男友穿自己设计的鞋子也很有成就感！ <i class="fa fa-quote-right" aria-hidden="true"></i></p>
								<img src="images/guke1.png" alt=" " />
								<h4>-May</h4>							
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<p><i class="fa fa-quote-left" aria-hidden="true"></i> 6月份朋友推荐下了一单，接单的制作方是意大利的某手工制作间，本以为要等起码1个月，但没想到加上运送时间我2周就到货了，质量很赞，速度也一流！ <i class="fa fa-quote-right" aria-hidden="true"></i></p>
								<img src="images/guke2.png" alt=" " />
								<h4>-常晨一哥</h4>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;">
							<div class="banner-wrap">
								<p><i class="fa fa-quote-left" aria-hidden="true"></i> 在某商场看上一双精品皮鞋，但实在太贵了，后来在平台上订制了一双差不多的皮鞋，价格只有实体店一半，而且质量也有保证。 <i class="fa fa-quote-right" aria-hidden="true"></i></p>
								<img src="images/guke3.png" alt=" " />
								<h4>-阳光海滩123</h4>
							</div>
						</article>
					</div>
				</div>
							<script src="js/jquery.wmuSlider.js"></script> 
								<script>
									$('.example1').wmuSlider();         
								</script> 

		</div>
	</div>
	<div class="col-md-6 subscribe-agileits-w3layouts">
		<h3>欢迎订阅</h3>
		<form action="#" method="post">
			<input type="text" name="Email" placeholder="请输入您的电子邮箱" required>
			<input type="submit" value="订阅">
		</form>
	</div>
	<div class="clearfix"></div>
	<!--//testimonial-->
	<!-- team -->
<div class="team" id="designer">
	<div class="container">
		<h3>独立设计师</h3>
		<div class="team_gds">
			<div class="col-md-3 team_gd1">
				<div class="team_pos">
					<div class="team_back"></div>
					<img class="img-responsive" src="images/sheji1.png"  alt=" ">
					<div class="team_info">
						<a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
				</div>
				<h4>帕克金斯</h4>
				<p>美国</p>
			</div>
		
			<div class="col-md-3 team_gd1">
				<div class="team_pos">
					<div class="team_back"></div>
					<img class="img-responsive" src="images/sheji2.png"  alt=" ">
					<div class="team_info">
						<a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
				</div>
				<h4>薇薇安</h4>
				<p>中国大陆</p>
			</div>
			<div class="col-md-3 team_gd1">
				<div class="team_pos">
					<div class="team_back"></div>
					<img class="img-responsive" src="images/sheji3.png"  alt=" ">
					<div class="team_info">
						<a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
				</div>
				<h4>费雷德诺</h4>
				<p>意大利</p>
			</div>
			<div class="col-md-3 team_gd1">
				<div class="team_pos">
					<div class="team_back"></div>
					<img class="img-responsive" src="images/sheji4.png"  alt=" ">
					<div class="team_info">
						<a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
				</div>
				<h4>陈伟英</h4>
				<p>中国·香港</p>
			</div>
			<div class="clearfix"></div>		
		</div>
	</div>
</div>
<!-- //team -->
<!-- contact -->
	<div class="contact" id="contact">
		<div class="col-md-6 w3agile_contact_left con-lef-content">
				<h3>联系我们</h3>
				<p>情有任何疑问或想咨询信息，欢迎联系我们！</p>
				<form action="#" method="post">
					<input type="text" name="Name" value="姓名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required>
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required>
					<textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required>内容...</textarea>
					<input type="submit" value="发送">
				</form>
		</div>
		<div class="col-md-6 w3agile_contact_right">
			<div class="con-rt-content">
				<div class="col-xs-6 w3agile_contact_right_agileinfo">
					<h4>地址</h4>
					<ul>
						<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></li>
						<li>亚太：广东省深圳南山区科技园科园路1002号A8音乐大厦15楼</li>
                        <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></li>
                        <li>北美：2680 Matheson Blvd. East, Mississauga, Ontario, CA</li>
					</ul>
					<ul class="phone">
						<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></li>
						<li>中国：+86-755-28765972 </li>
                        <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></li>
                        <li>北美：+1-905-2673-402 </li>
					</ul>
					<ul>
						<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></li>
						<li><a href="mailto:info@example.com">info@bmtechnology.net</a></li>
					</ul>
				</div>
				<div class="col-xs-6 w3agile_contact_right_agileinfo">
					<h4>关注我们</h4>
					<div class="agileits_social_icons">
						<a href="#"><i class="fa fa-wechat" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-qq" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="w3_copy_right">
					<p>Copyright &copy; 2020.BM Technology All rights reserved.<a target="_blank" href="http://www.bmtchina.com.cn/">彼岸魔方</a></p>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //contact -->


</body>
</html>