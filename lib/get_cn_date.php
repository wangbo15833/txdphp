<?php
//取得完整中文样式的日期
function get_cn_date()
{
	$cn_week = array("日","一","二","三","四","五","六");
	//return date("Y年m月j日 ")." 星期".$cn_week[date("w")];
	if($cn_week[date("w")] == "日" || $cn_week[date("w")] == "六"){
		return "周末";
	} else {
		return "非周末";
	}

}
?>