<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>
		<?php if(($_title)  !=  ""): ?><?php echo ($_title); ?> - <?php echo ($site["site_name"]); ?>
		<?php else: ?>
			<?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?><?php endif; ?>
	</title>
		<link rel="stylesheet" type="text/css" href="__APP__/css/style.css">
		<link rel="stylesheet" type="text/css" href="__APP__/css/font-awesome.min.css">
		<script type="text/javascript" src="__APP__/js/jquery-1.11.1.min.js"></script>
		<script src="__APP__/js/Validform_v5.3.2_min.js"></script>
	</head>
	<body>
		<!--==Header==-->
		<div class="header">
			<div class="nav-header wrap clearfix">
				<h1 class="logo fl">
					<a href="javascript:void(0);">
						<img src="<?php echo ($site["logo_head"]); ?>" alt="教育" width="100" height="50">
					</a>
				</h1>
				<!-- 头部导航 -->
				<ul class="nav fl">
				<?php if(is_array($site_top_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_top_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($vo["app_name"] == more): ?><li class="nav-more rel">
								<a href="javascript:void(0);"><?php echo ($vo['navi_name']); ?></a>
								<ul class="abs">
								<?php if(is_array($vo['child'])): ?><?php $i = 0;?><?php $__LIST__ = $vo['child']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$val): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a target="<?php echo ($val['target']); ?>" href="<?php echo ($val['url']); ?>" ><?php echo ($val['navi_name']); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
								</ul>
							</li>
						<?php else: ?>
							<li <?php if(APP_NAME == $vo['app_name'] || ( APP_NAME == 'classroom' && MODULE_NAME == $vo['app_name'] ) ){echo "class='active'";} ?> ><a target="<?php echo ($vo['target']); ?>" href="<?php echo ($vo['url']); ?>" ><?php echo ($vo['navi_name']); ?></a></li><?php endif; ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
						<?php if(!empty($_SESSION['mid'])){ ?>
							<li <?php if(MODULE_NAME == "Home" || MODULE_NAME=="User"){echo "class='active'";} ?> ><a href="<?php echo U('classroom/Home/video');?>">管理中心</a></li>
						<?php } ?>
				</ul>
				<!-- 头部导航end -->
				<!--==用户未登录==-->
				<?php if(empty($_SESSION['mid'])){ ?>
				<ul class="nav-up-0 fr clearfix">
					<li><a href="<?php echo U('public/Passport/up');?>">登录</a></li>
					<li>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
					<li><a href="<?php echo U('public/Passport/log');?>">注册</a></li>
				</ul>
				<!--==用户未登录 end==-->
				<?php }else{ ?>
				<div class="nav-up-1 fr clearfix">
					<div class="XiTong fl">
						<a href="#" class="icon-bell TiShi"></a>
						<ul class="hore-pd">
							<li>
								<a href="#" class="clearfix">
									<span>系统消息</span>
									<i>1</i>
								</a>
							</li>
							<li>
								<a href="#" class="clearfix">
									<span>系统消息</span>
									<i>1</i>
								</a>
							</li>
						</ul>
					</div>
					<!-- 系统消息end -->
					<!--====用户====-->
					<div class="yong-hu fl">
						<div class="tou-xiang rel">
							<a href="<?php echo U('classroom/UserShow/index',array('uid'=>$_SESSION['mid']));?>" class="T-a">
								<img src="<?php echo getUserFace($_SESSION['mid']);?>" width="50px" height="50px;">
							</a>
							<ul class="hore-pd-YH">
								<li>
									<a href="<?php echo U('classroom/Home/wenda');?>" class="clearfix">
										<span>我的问答</span>
									</a>
								</li>
								<li>
									<a href="<?php echo U('classroom/Home/note');?>" class="clearfix">
										<span>我的笔记</span>
									</a>
								</li>
								<li>
									<a href="<?php echo U('classroom/User/setInfo');?>" class="clearfix">
										<span>我的设置</span>
									</a>
								</li>
								<li>
									<a href="<?php echo U('public/Message/index');?>" class="clearfix">
										<span>我的消息</span>
									</a>
								</li>
								<li>
									<a href="<?php echo U('public/Passport/logout');?>" onClick="logout()" class="clearfix">
										<span>退出</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					</div>

					<?php } ?>
					<!--====用户end====-->
								<!-- 搜索框 -->
				<div class="nav-form fr">
					<form action="" method="get">
						<button class="icon-search"></button>
						<input type="hidden" name="app" value="classroom" >
				        <input type="hidden" name="mod" value="Search" >
				        <input type="hidden" name="act" value="index" >
						<input type="text" name="q" placeholder="搜索贴子、用户或课程..." title="搜索贴子、用户或课程...">
					</form>
				</div>
				<!-- 搜索框end -->
			</div>
		</div>

		<!--==Header end==-->


<!--header-->
<!-- <div class="header">
    <div class="header-top">
    	<div class="wrap">
            <div class="header-logo">
                <a href="/" title="Eduline"><img src="<?php echo ($site["logo_head"]); ?>"/></a>
            </div>
            <div class="header-search index">
                <form>
                	<input type="hidden" name="app" value="classroom" >
			        <input type="hidden" name="mod" value="Search" >
			        <input type="hidden" name="act" value="index" >
                    <input type="text" id="searchkey" name="searchkey" placeholder="搜索关键词">
                    <input type="submit" class="submit">
                </form>
            </div>
            <div class="header-login">
                <div class="login-ewm">
                	<img src="__THEME__/images/appdownload.png" class="lazyloading">
                    <p>eduline<br>客户端下载</p>
                </div>
                <?php if(empty($_SESSION['mid'])){ ?>
                	<div class="login-nav">
                		<a href="javascript:;" onClick="reg_login()">登录</a><span>/</span><a href="javascript:;" onClick="reg_login()">注册</a>
			    	</div>
			    <?php }else{ ?>
			    	<div class="login-box">
	                    <a href="<?php echo U('classroom/UserShow/index',array('uid'=>$_SESSION['mid']));?>"><img src="<?php echo getUserFace($_SESSION['mid']);?>" class="lazyloading"><span><?php echo getUserName($_SESSION['mid']);?></span></a>
	                    <dl class="login-after-position">
					         <dd class="login-after-bdbt"><a href="<?php echo U('classroom/Home/wenda');?>">我的问答</a></dd>
					         <dd class="login-after-bdbt"><a href="<?php echo U('classroom/Home/note');?>">我的笔记</a></dd>
					         <dd class="login-after-bdbt"><a href="<?php echo U('classroom/User/setInfo');?>">我的设置</a></dd>
					         <dd class="login-after-bdbt"><a href="<?php echo U('public/Message/index');?>">我的消息</a></dd>
					         <dd class="login-after-bdbt"><a href="javascript:;" onClick="logout()">退出</a></dd>
					     </dl>
	                </div>
	                <!--消息提示-->
				   <!--  <ul class="news-msg"
				          <?php if(!empty($mid) &&(!empty($unreadnum) || !empty($systemnum) || !empty($commentnum))){ ?>
				          		style="display:block;"
				          <?php }else{ ?>
				        		style="display:none;"
				          <?php } ?> >
				          <a class="shanchu-ico" href="javascript:;" onClick="closeMsg()">×</a>
				          <?php if(!empty($unreadnum) && !empty($mid)){ ?>
				                <li><?php echo ($unreadnum); ?>条新的私信，&nbsp;<a href="<?php echo U('public/Message/index');?>">查看消息</a></li>
				          <?php } ?>
				          <?php if(!empty($systemnum) && !empty($mid)){ ?>
				                <li><?php echo ($systemnum); ?>条新的系统消息，&nbsp;<a href="<?php echo U('public/Message/notify');?>">查看消息</a></li>
				          <?php } ?>
				          <?php if(!empty($commentnum) && !empty($mid)){ ?>
				                <li><?php echo ($commentnum); ?>条新的评论消息，&nbsp;<a href="<?php echo U('public/Message/comment');?>">查看消息</a></li>
				         <?php } ?>
				     </ul>
			    <?php } ?> -->
           <!--      
            </div>
        </div>
    </div>
    <div class="header-bot">
    	<div class="wrap">
            <ul class="header-nav">
                <?php if(is_array($site_top_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_top_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($vo["app_name"] == more): ?><li onmouseover="mouseup(this);" onmouseout="mouseout(this);">
		                <a href="<?php echo ($vo['url']); ?>" ><?php echo ($vo['navi_name']); ?></a>
		                <div id="menu_box">
		                  <?php if(is_array($vo['child'])): ?><?php $i = 0;?><?php $__LIST__ = $vo['child']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$val): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a target="<?php echo ($val['target']); ?>" href="<?php echo ($val['url']); ?>" ><?php echo ($val['navi_name']); ?></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
		                </div>
		              </li>
		            <?php else: ?>
		      			  <li <?php if(APP_NAME == $vo['app_name'] || ( APP_NAME == 'classroom' && MODULE_NAME == $vo['app_name'] ) ){echo "class='active'";} ?>><a target="<?php echo ($vo['target']); ?>" href="<?php echo ($vo['url']); ?>" ><?php echo ($vo['navi_name']); ?></a></li><?php endif; ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> 
	        	<?php if(!empty($_SESSION['mid'])){ ?>
	        		<li <?php if(MODULE_NAME == "Home" || MODULE_NAME=="User"){echo "class='active'";} ?> ><a href="<?php echo U('classroom/Home/video');?>" >管理中心</a></li>
	        	<?php } ?>
	        	
            </ul>
        </div>
    </div>
</div>
<!--右边浮动-->
<!-- <?php $videolisturl =  $mid ? U('classroom/Video/merge') :  "javascript:reg_login();"; ?>
<div id="albumShop" class="shopfixed"> 
	<a href="<?php echo $videolisturl; ?>" class="shop">&nbsp; 
		<span id="albumNum" class="shop-msg">
			  <?php if(function_exists('getVideoMergeNum')){ ?>
			  		<?php echo getVideoMergeNum($mid,session_id());?>
			  <?php } else { ?>
			  		0
			  <?php } ?>
	    </span>
	</a> 
	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($site["site_qq"]); ?>&site=www.51eduline.com&menu=yes"   class="qa">&nbsp;</a> 
	<a href="#" class="wx">&nbsp;<div class="erwm"><img  src="<?php echo getAttachUrlByAttachId($site['site_qrcode']);?>"><i></i></div></a> 
</div> -->
<!-- 
// <script>
// function mouseup(cate){
//   var left=$(cate).offset().left;
//   $("#menu_box").css("display","block");
// }
// function mouseout(cate){
//   $("#menu_box").css("display","none");
// }

// function closeMsg(){
//     $(".news-msg").remove();
// }

</script>

 -->
		<!--====banner====-->
		<div class="banner_wrap">
			<div class="banner">
				<ul class="rel clearfix">
					<?php if(is_array($ad_list)): ?><?php $i = 0;?><?php $__LIST__ = $ad_list?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li class="hom">
							<a href="<?php echo ($vo["bannerurl"]); ?>"><img src="<?php echo getAttachUrlByAttachId($vo['banner']);?>"></a>
						</li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
				</ul>
			</div>
			<div class="page abs">
			<?php if(is_array($ad_list)): ?><?php $i = 0;?><?php $__LIST__ = $ad_list?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a href="javascript:void(0);"><img src="<?php echo getAttachUrlByAttachId($vo['banner']);?>" width="150" height="60"></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
			</div>
		</div>
		<!--====banner end====-->
		<!-- =====content==== -->
			<!-- ====内容最新课程板块=== -->
			<div class="wrap index-kecheng">
				<div class="xian"></div>
				<div class="zuixin-list clearfix" id="show">
				<?php if(is_array($cover)): ?><?php $i = 0;?><?php $__LIST__ = $cover?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$video): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl class="clearfix">
						<dt class="fl"><a href="<?php echo U('classroom/Video/view',array('id'=>$video['vid']));?>" class="nihao"><img src="<?php echo getCover($video['vcover'],266,170);?>"></a></dt>
						<dt class="fr">
							<?php if($video['vprice'] > 0){ ?>
								<span class="bel-VIP">付费</span>
							<?php }else{ ?>
								<span class="bel-success">免费</span>
							<?php } ?>
							<a href="<?php echo U('classroom/Video/view',array('id'=>$video['vid']));?>"><?php echo ($video['vintro']); ?></a>
						</dt>
						<dd class="fl"><a href="javascript:void(0);">主讲人：<?php echo ($video['tname']); ?></a></dd>
						<dd class="fr"><a href="javascript:void(0);"><?php if($video['vprice'] > 0){ ?><?php echo ($video['vprice']); ?>学币<?php }else{} ?></a></dd>
					</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>	
				</div>
			</div>
		<!-- ====内容最新课程板块end=== -->
		
		<!-- ====课程=== -->
		<div class="bg-f3f6fb">
			<div class="wrap">
				<!-- ==小导航== -->
				<div class="kecheng-nav clearfix">
					<h3 class="title fl">设计创作</h3>
					<ul class="fl clearfix tab">
						<li><a href="javascript:void(0);">热门课程</a></li>
						<li><a href="javascript:void(0);">推荐课程</a></li>
						<li><a href="javascript:void(0);">VIP课程</a></li>
					</ul>
				</div>
				<!-- ==小导航end== -->
				<div class="tab-list">
					<div id="show" class="zuixin-list clearfix">

					<!-- 热门课程 -->
					<?php if(is_array($videos)): ?><?php $i = 0;?><?php $__LIST__ = $videos?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$list): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="<?php echo getCover($list['vcover'],266,170);?>"></a></dt>
							<dt class="fr"><span class="bel-VIP">VIP</span><a href="javascript:void(0);"><?php echo ($list["vintro"]); ?></a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：<font color="red"><?php echo ($list["tname"]); ?></font></a></dd>
							<dd class="fr"><a href="javascript:void(0);"><?php echo ($list["school"]); ?></a></dd>
						</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
					</div>

					<!-- 推荐课程 -->
					<div class="zuixin-list clearfix">
						<?php if(is_array($videos)): ?><?php $i = 0;?><?php $__LIST__ = $videos?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$list): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl class="clearfix">
								<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="<?php echo getCover($list['vcover'],266,170);?>"></a></dt>
								<dt class="fr"><span class="bel-VIP">VIP</span><a href="javascript:void(0);"><?php echo ($list["vintro"]); ?></a></dt>
								<dd class="fl"><a href="javascript:void(0);">主讲人：<font color="red"><?php echo ($list["tname"]); ?></font></a></dd>
								<dd class="fr"><a href="javascript:void(0);"><?php echo ($list["school"]); ?></a></dd>
							</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
					</div>

					<!-- VIP课程 -->
					<div class="zuixin-list clearfix">
						<?php if(is_array($videos)): ?><?php $i = 0;?><?php $__LIST__ = $videos?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$list): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl class="clearfix">
								<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="<?php echo getCover($list['vcover'],266,170);?>"></a></dt>
								<dt class="fr"><span class="bel-VIP">VIP</span><a href="javascript:void(0);"><?php echo ($list["vintro"]); ?></a></dt>
								<dd class="fl"><a href="javascript:void(0);">主讲人：<font color="red"><?php echo ($list["tname"]); ?></font></a></dd>
								<dd class="fr"><a href="javascript:void(0);"><?php echo ($list["school"]); ?></a></dd>
							</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- ====课程end=== -->

		<!-- ==直播课程== -->
		<div class="wrap index-zhibo">
				<!-- ==小导航== -->
				<div class="kecheng-nav clearfix">
					<h3 class="title fl">精彩直播</h3>
					<ul class="fl clearfix tabs">
						<li><a href="javascript:void(0);">热门直播</a></li>
						<li><a href="javascript:void(0);">推荐直播</a></li>
						<li><a href="javascript:void(0);">VIP直播</a></li>
					</ul>
				</div>
				<!-- ==小导航end== -->
				<div class="tab-list">
					<div id="show" class="zuixin-list tabs-list clearfix">
						<dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="__APP__/images/list3.jpg"></a></dt>
							<dt class="fr"><span class="bel-VIP">直播</span><a href="javascript:void(0);">WEB网站/H5移动端实战速成体验课</a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：杨效林</a></dd>
							<dd class="fr"><a href="javascript:void(0);">  在线教育主管特训学院</a></dd>
						</dl>
						<dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="__APP__/images/list3.jpg"></a></dt>
							<dt class="fr"><span class="bel-success">直播</span><a href="javascript:void(0);">WEB网站/H5移动端实战速成体验课</a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：杨效林</a></dd>
							<dd class="fr"><a href="javascript:void(0);">  在线教育主管特训学院</a></dd>
						</dl>
					</div>
					<div class="zuixin-list tabs-list clearfix">
						<dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="__APP__/images/list2.jpg"></a></dt>
							<dt class="fr"><span class="bel-VIP">直播</span><a href="javascript:void(0);">WEB网站/H5移动端实战速成体验课</a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：杨效林</a></dd>
							<dd class="fr"><a href="javascript:void(0);">  在线教育主管特训学院</a></dd>
						</dl>
						<dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="__APP__/images/list2.jpg"></a></dt>
							<dt class="fr"><span class="bel-success">直播</span><a href="javascript:void(0);">WEB网站/H5移动端实战速成体验课</a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：杨效林</a></dd>
							<dd class="fr"><a href="javascript:void(0);">  在线教育主管特训学院</a></dd>
						</dl>
					</div>
					<div class="zuixin-list tabs-list clearfix">
						<dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="__APP__/images/list.jpg"></a></dt>
							<dt class="fr"><span class="bel-VIP">直播</span><a href="javascript:void(0);">WEB网站/H5移动端实战速成体验课</a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：杨效林</a></dd>
							<dd class="fr"><a href="javascript:void(0);">  在线教育主管特训学院</a></dd>
						</dl>
						<dl class="clearfix">
							<dt class="fl"><a href="javascript:void(0);" class="nihao"><img src="__APP__/images/list.jpg"></a></dt>
							<dt class="fr"><span class="bel-success">直播</span><a href="javascript:void(0);">WEB网站/H5移动端实战速成体验课</a></dt>
							<dd class="fl"><a href="javascript:void(0);">主讲人：杨效林</a></dd>
							<dd class="fr"><a href="javascript:void(0);">  在线教育主管特训学院</a></dd>
						</dl>
					</div>
				</div>
			</div>
			<!-- ==直播课程end== -->
			<script>
				$(function(){
					$(".kecheng-nav .tab li:first").addClass("current");
					$(".kecheng-nav .tab li").click(function(){
						$(this).addClass("current").siblings().removeClass();
						var num=$(this).index();
						$(".tab-list .zuixin-list").eq(num).show().siblings().hide();})
				})
				$(function(){
					$(".kecheng-nav .tabs li:first").addClass("current");
					$(".kecheng-nav .tabs li").click(function(){
						$(this).addClass("current").siblings().removeClass();
						var num=$(this).index();
						$(".tab-list .tabs-list").eq(num).show().siblings().hide();
					})
				})
			</script>
			<!-- ==老师推荐== -->
			<div class="bg-f3f6fb">
				<div class="wrap">
					<div class="xian-mingshi"></div>
					<div class="mingshi clearfix">
						<!-- <?php if(is_array($beTeacher)): ?><?php $i = 0;?><?php $__LIST__ = $beTeacher?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$list): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl class="mingshi-block fl">
								<dt><a href="<?php echo U('classroom/Teacher/view',array('id'=>$list.teacher_id));?>"><img src="<?php echo getCover($list['head_id'],105,105);?>"></a></dt>
								<dt><?php echo ($list["name"]); ?></dt>
								<dd><?php echo ($list["title"]); ?></dd>
								<p>讲师简介：<?php echo ($list["inro"]); ?></p>
								<ul class="mingshi-btn">
									<li class="G-Z"><a href="javascript:void(0);">关注</a></li>
									<li class="S-X"><a href="javascript:void(0);">私信</a></li>
								</ul>
							</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> -->
						<?php if(isset($beTeacher)): ?><?php foreach($beTeacher as $key=>$list): ?><dl class="mingshi-block fl">
								<dt><a href="<?php echo U('classroom/Teacher/view',array('id'=>$list.id));?>"><img src="<?php echo getCover($list['head_id'],105,105);?>"></a></dt>
								<dt><?php echo ($list["name"]); ?></dt>
								<dd><?php echo ($list["title"]); ?></dd>
								<p>讲师简介：<?php echo ($list["inro"]); ?></p>
								<ul class="mingshi-btn">
									<li class="G-Z"><a href="javascript:void(0);">关注</a></li>
									<li class="S-X"><a href="javascript:void(0);">私信</a></li>
								</ul> 
							</dl><?php endforeach; ?><?php endif; ?>
					</div>
					<div class="mingshi-more">
						<a href="<?php echo U('classroom/Teacher/index');?>">更多名师</a>
					</div>
				</div>
			</div>
			<!-- ==老师推荐end== -->
		<!-- =====content   end==== -->
        <!-- ==footer== -->
        <div class="foot-bg">
            <div class="wrap clearfix">
                <div class="foot-left fl">
                    <ul class="foot-list clearfix">
                        <li><a href="#">关于我们</a></li>
                        <li><a href="#">联系我们</a></li>
                        <li><a href="#">加入我们</a></li>
                        <li><a href="#">媒体报道</a></li>
                        <li><a href="#">公司账号</a></li>
                    </ul>
                    <ul class="foot-lian-jie clearfix">
                        <span class="fl">友情链接：</span>
                        <li><a href="#">关于我们</a></li>
                        <li><a href="#">联系我们</a></li>
                        <li><a href="#">加入我们</a></li>
                        <li><a href="#">媒体报道</a></li>
                        <li><a href="#">公司账号</a></li>
                        <li><a href="#">公司账号</a></li>
                        <li><a href="#">公司账号</a></li>
                        <li><a href="#">公司账号</a></li>
                    </ul>
                    <p>Copyright © 2013-2017 广州邢帅教育科技有限公司 粤ICP备13040992号</p>
                </div>
                <div class="fr clearfix foot-right">
                    <dl>
                        <dt><img src="__APP__/images/erwei1.png" width="130"></dt>
                        <dd>扫一扫下载APP</dd>
                    </dl>
                    <dl>
                        <dt><img src="__APP__/images/erwei1.png" width="130"></dt>
                        <dd>扫一扫下载APP</dd>
                    </dl>
                </div>
            </div>
            <div class="wrap"></div>
        </div>
        <!-- ==footer  end== -->


        <script type="text/javascript">
        $(function(){
            //图片个数
            imgLength=$(".banner li").length;
            //图片宽度
            imgWidth=$(window).width();
            $(".banner_wrap").width(imgWidth);
            $(".banner li").width(imgWidth);
            $(".banner").width(imgLength*imgWidth);
            //第一页引用current
            $(".page a:first").addClass("active");
            $(".page a").mouseover(function(){
                    $(this).addClass("active").siblings("a").removeClass("active");
                    index1=$(this).index();
                    $(".banner").stop().animate({left:"-"+(imgWidth*index1)},600);  
                });
                function scrolls(){
                    if($(".page a:last").hasClass("active")){
                        naxt=0;
                    }else{
                        naxt=$(".active").index()+1;    
                    }
                        $(".page a").eq(naxt).triggerHandler("mouseover");
                    }
                    var t=setInterval(scrolls,2000);        
                //鼠标经过大图，停止自动切换
                $(".banner_wrap").mouseover(function(){
                    clearInterval(t)
                }).mouseout(function(){
                    t=setInterval(scrolls,2000);
                })
            });
    </script>
    <script type="text/javascript">
        $(function(){
            $(".nav-up-1 .TiShi").mouseover(function(){
                $(".nav-up-1 .TiShi").removeClass("icon-bell").addClass("icon-bell-alt");
            })
            $(".nav-up-1 .TiShi").mouseout(function(){
                $(".nav-up-1 .TiShi").removeClass("icon-bell-alt").addClass("icon-bell");
            })
        })
        $(function(){
            $(".XiTong").mouseover(function(){
                $(".hore-pd").css("display","block");
            })
            $(".XiTong").mouseout(function(){
                $(".hore-pd").css("display","none");
            })
        })
        $(function(){
            $(".yong-hu").mouseover(function(){
                $(".hore-pd-YH").css("display","block");
            })
            $(".yong-hu").mouseout(function(){
                $(".hore-pd-YH").css("display","none");
            })
        })
        $(function(){
            $(".nav-more a").mouseover(function(){
                $(".nav-more ul").show();
            })
            $(".nav-more").mouseout(function(){
                $(".nav-more ul").hide();
            })
        })
    </script>
</body>
</html>
<!--footer-->
<!-- <div class="footer">
	<div class="wrap">
    	<div class="footer-main">
        	<div class="footer-logo">
            	<a href="/" title="eduline"><img src="<?php echo ($site["logo_foot"]); ?>" class="logo-img"></a>
                <ul class="logo-ul">
                	<li class="l1"><a href="javascript:;"></a></li>
                    <li class="l2"><a href="javascript:;"></a></li>
                    <li class="l3"><a href="javascript:;"></a></li>
                    <li class="l4"><a href="javascript:;"></a></li>
                </ul>
            </div>
            <?php if(is_array($pageCategory)): ?><?php $i = 0;?><?php $__LIST__ = $pageCategory?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><div class="footer-link">
	            	<dl>
	                	<dt><?php echo ($key); ?></dt>
	                	<?php if(is_array($vo)): ?><?php $i = 0;?><?php $__LIST__ = $vo?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a target="_blank" <?php if($v['url']) { ?> href="<?php echo ($v['url']); ?>" <?php }else{ ?> href="<?php echo U('public/Single/info',array('id'=>$v['id']));?>" <?php } ?> ><?php echo ($v["title"]); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	                </dl>
	            </div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            
        </div>
    </div>
    <div class="copyright"><?php echo ($site['site_footer']); ?></div>
</div> -->

<!-- 统计代码-->
<!-- <div id="site_analytics_code" style="display:none;">
<?php echo (base64_decode($site["site_analytics_code"])); ?>
</div>
<?php if(($site["site_online_count"])  ==  "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace"></script><?php endif; ?> -->


<!--百度推广网页转化-->
<!--  <script type="text/javascript">
// var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
// document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9efa5e6b982a815a97700d8e78129b16' type='text/javascript'%3E%3C/script%3E"));
// </script>

// </body>
</html> -->