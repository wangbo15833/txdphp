$(function(){

	var animate_time=200;//动画时间：0.3秒
	var interval_time=3000;//播放间隔时间：5秒
	var picnumber=$(".scrollpic li").size()-1;//计算广告的数量
	var slideclick = 0;//初始化

	//循环函数
	function autoplay(){
		slideclick++;
		if(slideclick<=picnumber){
			$(".scrollpic li").eq(slideclick).trigger("dblclick");
		}else{
			$(".scrollpic li").eq(0).trigger("dblclick");
			slideclick = 0
		}
	}
	
	//设置循环时间，自动开始循环
	var auto_setInterval = setInterval(autoplay,interval_time);

	//悬停广告区域时播放停止
	$(".focus").hover(function(){
		clearInterval(auto_setInterval);
	},function(){
		auto_setInterval = setInterval(autoplay,interval_time);
	});

	//小图点击时，开始动画
	$(".scrollpic li").dblclick(function(){
													  
		slideclick=$(".scrollpic li").index($(this));	
		
		$(".scrollpic li").removeClass("current");
		$(this).addClass("current");
		
		//大图上移
		$(".focus .focuspic").animate({"marginLeft":slideclick*-588},{duration:animate_time,queue:false});
	
		//控制缩略图显示个数
		if(slideclick<picnumber){
			if(slideclick==0||slideclick==1){
				$(".scrollpic ul").animate({"marginLeft":"0px"},{duration:animate_time,queue:false});
			}else{
				$(".scrollpic ul").animate({"marginLeft":(slideclick-1)*-139},{duration:animate_time,queue:false});//显示最后4张图片不在滚动
			}
		}

		//判断上下按钮是否可点击
		if(slideclick==0){
			$(".scrollbox #prev").addClass("disabled");
			$(".scrollbox #next").removeClass("disabled");
		}else if(slideclick==picnumber){
			$(".scrollbox #prev").removeClass("disabled");
			$(".scrollbox #next").addClass("disabled");
		}else{
			$(".scrollbox #prev").removeClass("disabled");
			$(".scrollbox #next").removeClass("disabled");
		}
		
	});

	//鼠标在小图上悬停时，相关移动
	$(".scrollpic li").mouseover(function(){		
		
		var slidebtn_hover_chi = $(".scrollpic li").index($(this));
		
		$(".scrollpic li").removeClass("current");
		$(this).addClass("current");		
		
		$(".focuspic").animate({"marginLeft":slidebtn_hover_chi*-588},{duration:animate_time,queue:false});
		
		if(slidebtn_hover_chi!=slideclick);
		
		slideclick=slidebtn_hover_chi;
		
		//判断上下按钮是否可点击
		if(slideclick==0){
			$(".scrollbox #prev").addClass("disabled");
			$(".scrollbox #next").removeClass("disabled");
		}else if(slideclick==picnumber){
			$(".scrollbox #prev").removeClass("disabled");
			$(".scrollbox #next").addClass("disabled");
		}else{
			$(".scrollbox #prev").removeClass("disabled");
			$(".scrollbox #next").removeClass("disabled");
		}
	
	});	

	//点击向上按钮时
	$(".scrollbox #prev").click(function(){
		slideclick=slideclick-1;
		if(slideclick<0){
			slideclick=0;
		}		
		$(".scrollpic li").eq(slideclick).trigger("dblclick");
	});
	
	//点击向下按钮时
	$(".scrollbox #next").click(function(){
		slideclick=slideclick+1;
		if(slideclick>=picnumber){
			slideclick=picnumber;
			$(".scrollpic li").eq(slideclick).trigger("dblclick");
			$(".scrollpic ul").animate({"marginLeft":(slideclick-2)*-139},{duration:animate_time,queue:false});// 缩略图最后滚动的左侧距离位置 正好4张缩略图显示
		}
		$(".scrollpic li").eq(slideclick).trigger("dblclick");
	});
	
	
});