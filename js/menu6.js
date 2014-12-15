    var site_url = window.location.href.toLowerCase();	
	switch (true) {		
		default :
			$("#menu ul li").attr("class","");
			$("#menu ul li").eq(5).attr("class","nav_lishw");
			$(".nav_lishw .v6 a").attr("class","sele");
			$(".nav_lishw .kind_menu").show();
	} 
	$("#menu ul li").hover(
		function(){
			clearTimeout(setTimeout("0")-1);
			$("#menu ul .kind_menu").hide(); 
			$("#menu ul li .v6 .sele").attr("class","shutAhover");
			$(this).attr("id","nav_hover")
			$("#menu ul_hover .v6 a").attr("class","sele");
			$("#menu ul_hover .kind_menu").show(); 
		},
		function(){
			
			if($(this).attr("class") != "nav_lishw"){
				$("#menu ul_hover .v6 .sele").attr("class","");
				$("#menu ul_hover .kind_menu").hide(); 
			}
			$(this).attr("id","")
			$("#menu ul li .v6 .shutAhover").attr("class","sele");
			setTimeout(function(){
				$(".nav_lishw .kind_menu").show();
				$(".nav_lishw .v6 a").attr("class","sele");
			},50); 
		}
	);