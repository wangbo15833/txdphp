<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/ubstr.php");
require_once($web_root_part."lib/safe.php"); 
require_once($web_root_part."lib/config.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_hostname?></title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link href="css/tabMenu.css" rel="stylesheet" media="screen" type="text/css" />

<link rel="stylesheet" type="text/css" href="jdt/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="jdt/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="jdt/js/jquery.jslides.js"></script>

<script type="text/javascript">
/*
EASY TABS 1.2 Produced and Copyright by Koller Juergen
www.kollermedia.at | www.austria-media.at
Need Help? http:/www.kollermedia.at/archive/2007/07/10/easy-tabs-12-now-with-autochange
You can use this Script for private and commercial Projects, but just leave the two credit lines, thank you.
*/

//EASY TABS 1.2 - MENU SETTINGS
//Set the id names of your tablinks (without a number at the end)
var tablink_idname = new Array("tablink","anotherlink")
//Set the id names of your tabcontentareas (without a number at the end)
var tabcontent_idname = new Array("tabcontent","anothercontent") 
//Set the number of your tabs in each menu
var tabcount = new Array("2","2")
//Set the Tabs wich should load at start (In this Example:Menu 1 -> Tab 2 visible on load, Menu 2 -> Tab 5 visible on load)
var loadtabs = new Array("1","1")  
//Set the Number of the Menu which should autochange (if you dont't want to have a change menu set it to 0)
var autochangemenu = 0;
//the speed in seconds when the tabs should change
var changespeed = 3;
//should the autochange stop if the user hover over a tab from the autochangemenu? 0=no 1=yes
var stoponhover = 0;
//END MENU SETTINGS


/*Swich EasyTabs Functions - no need to edit something here*/
function easytabs(menunr, active) 
{
	if (menunr == autochangemenu)
	{
		currenttab=active;
	}
	if ((menunr == autochangemenu)&&(stoponhover==1)) 
	{
		stop_autochange()
	} 
	else if ((menunr == autochangemenu)&&(stoponhover==0))  
	{
		counter=0;
	} 
	menunr = menunr-1;
	for (i=1; i <= tabcount[menunr]; i++)
	{
		document.getElementById(tablink_idname[menunr]+i).className='tab'+i;
		document.getElementById(tabcontent_idname[menunr]+i).style.display = 'none';
	}
	document.getElementById(tablink_idname[menunr]+active).className='tab'+active+' tabactive';
	document.getElementById(tabcontent_idname[menunr]+active).style.display = 'block';
}
var timer; 
counter=0; 
var totaltabs=tabcount[autochangemenu-1];
var currenttab=loadtabs[autochangemenu-1];
function start_autochange()
{
	counter=counter+1;
	timer=setTimeout("start_autochange()",1000);
	if (counter == changespeed+1) 
	{
		currenttab++;
		if (currenttab>totaltabs) 
		{
			currenttab=1
		}
		easytabs(autochangemenu,currenttab);
		restart_autochange();
	}
}
function restart_autochange()
{
	clearTimeout(timer);
	counter=0;
	start_autochange();
}
function stop_autochange()
{
	clearTimeout(timer);
	counter=0;
}

window.onload=function(){
	var menucount=loadtabs.length; 
	var a = 0; var b = 1; 
	do {
		easytabs(b, loadtabs[a]);  
		a++; 
		b++;
	}while (b<=menucount);
	if (autochangemenu!=0)
	{
		start_autochange();
	}
}
</script>

</head>

<body class="index">

<?php include 'header.php'; ?>
<div class="w992">
	<div class="left">
        <!--Start of the Tabmenu 1 -->
        <div class="tabMenu">
            <ul>
                <li  onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');" onclick="return false;"  title="" id="tablink1"><a href="#">平台动态</a></li>
                <li  onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');" onclick="return false;"  title="" id="tablink2"><a href="#">业内新闻</a></li>
            </ul>
            <a href="#"><img src="images/more.png" /></a>
        </div>
        <!--End of the Tabmenu 1 -->
        
        <!--Start Tabcontent 1 -->
        <div id="tabcontent1" class="tabcontent">
        	<ul class="e1">
<?php
	$querySel = "select ID,Tit,Addtime from news where DShow = 1 and ClassID=1 order by Addtime desc limit 0,6";
	$result_sub = mysql_query($querySel) or die(mysql_error()); 
	while($row_sub=mysql_fetch_array($result_sub)) 
	{
?>
  				<li><a href="NewsInfo.php?id=<?php echo $row_sub['ID'] ?>" target="_blank" class="tmain"><?php echo cut_str($row_sub['Tit'],14,0) ?></a><span><?php echo date('m-d', strtotime($row_sub['Addtime'])); ?></span></li>
<?php
}
?>
            </ul>
        </div>
        <!--End Tabcontent 1-->
        
        <!--Start Tabcontent 2-->
        <div id="tabcontent2" class="tabcontent">
        	<ul class="e1">
<?php
	$querySel = "select ID,Tit,Addtime from news where DShow = 1 and ClassID=2 order by Addtime desc limit 0,6";
	$result_sub = mysql_query($querySel) or die(mysql_error()); 
	while($row_sub=mysql_fetch_array($result_sub)) 
	{
?>
  				<li><a href="NewsInfo.php?id=<?php echo $row_sub['ID'] ?>" target="_blank" class="tmain"><?php echo cut_str($row_sub['Tit'],14,0) ?></a><span><?php echo date('m-d', strtotime($row_sub['Addtime'])); ?></span></li>
<?php
}
?>
        	</ul>
        </div>
        <!--End Tabcontent 2 -->
    </div>
    <div class="right">

        <!--Start of the Tabmenu 1 -->
        <div class="tabMenu">
            <ul>
                <li  onmouseover="easytabs('2', '1');" onfocus="easytabs('2', '1');" onclick="return false;"  title="" id="anotherlink1"><a href="#">最新借贷信息</a></li>
                <li  onmouseover="easytabs('2', '2');" onfocus="easytabs('2', '2');" onclick="return false;"  title="" id="anotherlink2"><a href="#">最新放贷信息</a></li>
            </ul>
            <a href="#"><img src="images/more.png" /></a>
        </div>
        <!--End of the Tabmenu 1 -->
        
        <!--Start Tabcontent 1 -->
        <div id="anothercontent1" class="tabcontent">
            <table border="1" cellspacing="0" cellpadding="0" width="100%" >
            	<tr height="24">
                	<td width="14%">编号</td>
                    <td width="14%">借款人省份</td>
                    <td width="14%">借款人城市</td>
                    <td width="14%">借款数额</td>
                    <td width="14%">可接受月息</td>
                    <td width="14%">期限</td>
                    <td width="16%">发布日期</td>
                </tr>
<?php
	$querySel = "select ID,Province,City,Amount,Interest,Deadline,Addtime from borrow where IsAudit = True order by Addtime desc limit 0,6";
	$result_sub = mysql_query($querySel) or die(mysql_error()); 
	while($row_sub=mysql_fetch_array($result_sub)) 
	{
?>
                <tr height="24">
                 	<td width="14%"><?php echo $row_sub['ID'] ?></td>
                    <td width="14%"><?php echo $row_sub['Province'] ?></td>
                    <td width="14%"><?php echo $row_sub['City'] ?></td>
                    <td width="14%"><?php echo $row_sub['Amount'] ?></td>
                    <td width="14%"><?php echo $row_sub['Interest'] ?>%</td>
                    <td width="14%"><?php echo $row_sub['Deadline'] ?></td>
                    <td width="16%"><?php echo date("Y-m-d",strtotime($row_sub['Addtime'])) ?></td>
                </tr>
<?
	}
?>
                
            </table>
        </div>
        <!--End Tabcontent 1-->
        
        <!--Start Tabcontent 2-->
        <div id="anothercontent2" class="tabcontent">
            <table border="1" cellspacing="0" cellpadding="0" width="100%" >
            	<tr height="24">
                	<td width="14%">编号</td>
                    <td width="14%">借款人省份</td>
                    <td width="14%">借款人城市</td>
                    <td width="14%">借款数额</td>
                    <td width="14%">可接受月息</td>
                    <td width="14%">期限</td>
                    <td width="16%">发布日期</td>
                </tr>
<?php
	$querySel = "select ID,Province,City,Amount,Interest,Deadline,Addtime from lend where IsAudit = True order by Addtime desc limit 0,6";
	$result_sub = mysql_query($querySel) or die(mysql_error()); 
	while($row_sub=mysql_fetch_array($result_sub)) 
	{
?>
                <tr height="24">
                 	<td width="14%"><?php echo $row_sub['ID'] ?></td>
                    <td width="14%"><?php echo $row_sub['Province'] ?></td>
                    <td width="14%"><?php echo $row_sub['City'] ?></td>
                    <td width="14%"><?php echo $row_sub['Amount'] ?></td>
                    <td width="14%"><?php echo $row_sub['Interest'] ?>%</td>
                    <td width="14%"><?php echo $row_sub['Deadline'] ?></td>
                    <td width="16%"><?php echo date("Y-m-d",strtotime($row_sub['Addtime'])) ?></td>
                </tr>
<?
	}
?>
                
            </table>
        </div>
        <!--End Tabcontent 2 -->
        
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
