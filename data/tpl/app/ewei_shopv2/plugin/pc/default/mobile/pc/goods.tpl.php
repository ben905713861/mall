<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_header', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_header', TEMPLATE_INCLUDEPATH));?>
<script src="../addons/ewei_shopv2/plugin/pc/template/mobile/default/static/js/search_goods.js"></script>
<link href="../addons/ewei_shopv2/plugin/pc/template/mobile/default/static/css/layout.css" rel="stylesheet" type="text/css">
<style>
	.pagination li span.currentpage {
		color: #FFF;
		font-weight: bold;
		background-color: #F87622;
		border-color: #FC6520;
		position: relative;
		z-index: 2;
	}
</style>
<div class="nch-container wrapper">
	<div class="left">
		<div class="nch-module nch-module-style03">
			<div class="title">
				<h3>最近浏览</h3>
			</div>
			<div class="content">
				<div class="nch-sidebar-viewed ps-container" id="nchSidebarViewed">
					<ul>
						<?php  if(is_array($hlist)) { foreach($hlist as $row) { ?>
						<li class="nch-sidebar-bowers">
							<div class="goods-pic"><a href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$row['goodsid']))?>" target="_blank">
								<img src="<?php  echo tomedia($row['thumb']);?>" data-url="<?php  echo tomedia($row['thumb']);?>" title="<?php  echo $row['title'];?>" alt="<?php  echo $row['title'];?>" style="display: inline;"></a></div>
							<dl>
								<dt><a style="color:#333;" href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$row['goodsid']))?>" target="_blank"><?php  echo $row['title'];?></a></dt>
								<dd>¥<?php  echo $row['marketprice'];?></dd>
							</dl>
						</li>
						<?php  } } ?>
					</ul>
					<!--<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 206px; display: none;">
						<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
					</div>
					<div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 309px; display: inherit;">
						<div class="ps-scrollbar-y" style="top: 0px; height: 192px;"></div>
					</div>-->
				</div>
				<a href="<?php  echo mobileUrl('pc.member.history')?>" class="nch-sidebar-all-viewed">全部浏览历史</a></div>
		</div>
	</div>



	<div class="right">
		<div id="gc_goods_recommend_div" style="width:980px;"></div>
		<div class="shop_con_list" id="main-nav-holder">
			<nav class="sort-bar" id="main-nav">


				<div class="nch-sortbar-array"> 排序方式：
					<ul>
						<li id="good_default" class="selected"><a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'','key'=>'desc'))?>" title="默认排序">默认</a></li>
						<li id="goood_sale"><a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'sales','by'=>'desc'))?>" title="点击按销量从高到低排序">销量<i></i></a></li>
						
						<li id="goood_price"><a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'marketprice','by'=>'desc'))?>" title="点击按价格从高到低排序">价格<i></i></a></li>
						<li>
							<div>
								<input id="priceMin" title="最低价" value="" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" class="input-txt"><em>-</em>
								<input id="priceMax" title="最高价" value="" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" class="input-txt">
								<a id="priceBtn" class="priceBtn">确定</a>
							</div>
						</li>
					</ul>
				</div>
				<div id="isnew_box" class="nch-sortbar-owner">
					<span>
						<a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'isnew','key'=>'desc'))?>"><i></i>新品上市</a>
					</span>
				</div>
				<div id="ishot_box" class="nch-sortbar-owner">
					<span>
						<a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'ishot','key'=>'desc'))?>"><i></i>热卖商品</a>
					</span>
				</div>
				<div id="isrecommand_box" class="nch-sortbar-owner">
					<span>
						<a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'isrecommand','key'=>'desc'))?>"><i></i>推荐商品</a>
					</span>
				</div>
				<div id="isdiscount_box" class="nch-sortbar-owner">
					<span>
						<a href="<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords,'order'=>'isdiscount','key'=>'desc'))?>"><i></i>促销商品</a>
					</span>
				</div>
				<script>
					var order = "<?php  echo $_GPC['order'];?>";

					if(order == 'sales'){
						$('#isnew_box').attr('style','');
						$('#isnew_box span a').attr('style','');
						$('#ishot_box').attr('style','');
						$('#ishot_box span a').attr('style','');
						$('#isrecommand_box').attr('style','');
						$('#isrecommand_box span a').attr('style','');
						$('#isdiscount_box').attr('style','');
						$('#isdiscount_box span a').attr('style','');
						
						$('#good_default').removeClass('selected');
						$('#goood_price').removeClass('selected');
						$('#goood_sale').addClass('selected');

					}
					if(order == 'marketprice'){
						$('#isnew_box').attr('style','');
						$('#isnew_box span a').attr('style','');
						$('#ishot_box').attr('style','');
						$('#ishot_box span a').attr('style','');
						$('#isrecommand_box').attr('style','');
						$('#isrecommand_box span a').attr('style','');
						$('#isdiscount_box').attr('style','');
						$('#isdiscount_box span a').attr('style','');
						$('#good_default').removeClass('selected');
						$('#goood_sale').removeClass('selected');
						$('#goood_price').addClass('selected');
					}
					if(order == 'isnew'){
						$('#goood_price').removeClass('selected');
						$('#ishot_box').attr('style','');
						$('#ishot_box span a').attr('style','');
						$('#isrecommand_box').attr('style','');
						$('#isrecommand_box span a').attr('style','');
						$('#isdiscount_box').attr('style','');
						$('#isdiscount_box span a').attr('style','');
						$('#good_default').removeClass('selected');
						$('#goood_sale').removeClass('selected');
						$('#isnew_box').attr('style','background-color:#fff;color:#F87622;');
						$('#isnew_box span a').attr('style','color:#F87622;');
					}
					if(order == 'ishot'){
						$('#goood_price').removeClass('selected');
						$('#isnew_box').attr('style','');
						$('#isnew_box span a').attr('style','');
						$('#isrecommand_box').attr('style','');
						$('#isrecommand_box span a').attr('style','');
						$('#isdiscount_box').attr('style','');
						$('#isdiscount_box span a').attr('style','');
						$('#good_default').removeClass('selected');
						$('#goood_sale').removeClass('selected');
						$('#ishot_box').attr('style','background-color:#fff;color:#F87622;');
						$('#ishot_box span a').attr('style','color:#F87622;');
					}
					if(order == 'isrecommand'){
						$('#goood_price').removeClass('selected');
						$('#isnew_box').attr('style','');
						$('#isnew_box span a').attr('style','');
						$('#isdiscount_box').attr('style','');
						$('#isdiscount_box span a').attr('style','');
						$('#good_default').removeClass('selected');
						$('#goood_sale').removeClass('selected');
						$('#ishot_box').attr('style','');
						$('#ishot_box span a').attr('style','');
						$('#isrecommand_box').attr('style','background-color:#fff;color:#F87622;');
						$('#isrecommand_box span a').attr('style','color:#F87622;');
					}
					if(order == 'isdiscount'){
						$('#goood_price').removeClass('selected');
						$('#isnew_box').attr('style','');
						$('#isnew_box span a').attr('style','');
						$('#isrecommand_box').attr('style','');
						$('#isrecommand_box span a').attr('style','');
						$('#good_default').removeClass('selected');
						$('#goood_sale').removeClass('selected');
						$('#ishot_box').attr('style','');
						$('#ishot_box span a').attr('style','');
						$('#isdiscount_box').attr('style','background-color:#fff;color:#F87622;');
						$('#isdiscount_box span a').attr('style','color:#F87622;');
					}
					
					$('#priceBtn').bind('click',function(){
						var priceMin = $('#priceMin').val();
						var priceMax = $('#priceMax').val();
						var url = "<?php  echo mobileUrl('pc.goods',array('keywords'=>$keywords))?>"+"&priceMin="+priceMin+"&priceMax="+priceMax;
						window.location.href=url;
					});
				</script>
				
				
			</nav>
			<!-- 商品列表循环  -->

			<div>
				<style type="text/css">
					#box {
						background: #FFF;
						width: 238px;
						height: 410px;
						margin: -390px 0 0 0;
						display: block;
						border: solid 4px #D93600;
						position: absolute;
						z-index: 999;
						opacity: .5
					}
					.shopMenu {
						position: fixed;
						z-index: 1;
						right: 25%;
						top: 0;
					}
				</style>
				<div class="squares" nc_type="current_display_mode">
					<input type="hidden" id="lockcompare" value="unlock">
					<ul class="list_pic">
						<?php  if(is_array($glist)) { foreach($glist as $row) { ?>
						<li class="item">
							<div class="goods-content" nctype_goods=" 52" nctype_store="1">
								<div class="goods-pic"><a href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$row['id']))?>" target="_blank" title="<?php  echo $row['title'];?>"><img src="<?php  echo tomedia($row['thumb']);?>" data-url="<?php  echo tomedia($row['thumb']);?>" title="<?php  echo $row['title'];?>" alt="<?php  echo $row['title'];?>" style="display: inline;"></a></div>
								<!--<div class="goods-promotion"><span>限时折扣</span></div>-->
								<div class="goods-info" style="top: 180px;">
									
									<div class="goods-name"><a href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$row['id']))?>" target="_blank" title="<?php  echo $row['title'];?>"><?php  echo $row['title'];?><em></em></a></div>
									<div class="goods-price"> <em class="sale-price" title="商城价：¥<?php  echo $row['marketprice'];?>">¥<?php  echo $row['marketprice'];?></em> <em class="market-price" title="市场价：¥<?php  echo $row['productprice'];?>">¥<?php  echo $row['productprice'];?></em> <span class="raty" data-score="5" title="很满意" style="width: 80px;">
										<!-- <img src="/data/resource/js/jquery.raty/img/star-on.png" alt="1" title="很满意">&nbsp;
										<img src="/data/resource/js/jquery.raty/img/star-on.png" alt="2" title="很满意">&nbsp;
										<img src="/data/resource/js/jquery.raty/img/star-on.png" alt="3" title="很满意">&nbsp;
										<img src="/data/resource/js/jquery.raty/img/star-on.png" alt="4" title="很满意">&nbsp;
										<img src="/data/resource/js/jquery.raty/img/star-on.png" alt="5" title="很满意"> -->
										<input type="hidden" name="score" value="5" readonly="readonly"></span>
									</div>
									
									<div class="sell-stat">
										<ul>
											<li><a href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$row['id']))?>#ncGoodsRate" target="_blank" class="status"><?php  echo $row['sales'];?></a>
												<p>商品销量</p>
											</li>
											
											<li><em member_id="1">&nbsp;</em></li>
										</ul>
									</div>
									
									
								</div>
							</div>
						</li>

						<?php  } } ?>

						<div class="clear"></div>
					</ul>
				</div>

			</div>
			<div class="tc mt20 mb20">
				<!--<div class="pagination"> <ul><li><span>首页</span></li><li><span>上一页</span></li><li><span class="currentpage">1</span></li><li><span>下一页</span></li><li><span>末页</span></li></ul> </div>-->
				<?php  echo $pager;?>
			</div>
		</div>

		<!-- 猜你喜欢 -->
		<div id="guesslike_div" style="width:980px;"></div>
	</div>
</div>
<script type="text/javascript">
	$('#add_cart').bind('click',function(){

	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_footer', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_footer', TEMPLATE_INCLUDEPATH));?>