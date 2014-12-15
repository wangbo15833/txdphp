<?php
/**
 +----------------------------------------------------------
 * UBB 解析
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function ubb($Text) {
      $Text=trim($Text);
      //$Text=ereg_replace("\n","<br>",$Text);
	  $Text=preg_replace("/([^\s]+)\n/","<br>",$Text);
      $Text=preg_replace("/\\t/is","  ",$Text);
      /*$Text=preg_replace("/\[hr\]/is","<hr>",$Text);
      $Text=preg_replace("/\[separator\]/is","<br/>",$Text);
      $Text=preg_replace("/\[h1\](.+?)\[\/h1\]/is","<h1>\\1</h1>",$Text);
      $Text=preg_replace("/\[h2\](.+?)\[\/h2\]/is","<h2>\\1</h2>",$Text);
      $Text=preg_replace("/\[h3\](.+?)\[\/h3\]/is","<h3>\\1</h3>",$Text);
      $Text=preg_replace("/\[h4\](.+?)\[\/h4\]/is","<h4>\\1</h4>",$Text);
      $Text=preg_replace("/\[h5\](.+?)\[\/h5\]/is","<h5>\\1</h5>",$Text);
      $Text=preg_replace("/\[h6\](.+?)\[\/h6\]/is","<h6>\\1</h6>",$Text);
      $Text=preg_replace("/\[center\](.+?)\[\/center\]/is","<center>\\1</center>",$Text);
      //$Text=preg_replace("/\[url=([^\[]*)\](.+?)\[\/url\]/is","<a href=\\1 target='_blank'>\\2</a>",$Text);
      $Text=preg_replace("/\[url\](.+?)\[\/url\]/is","<a href=\"\\1\" target='_blank'>\\1</a>",$Text);
      $Text=preg_replace("/\[url=(http:\/\/.+?)\](.+?)\[\/url\]/is","<a href='\\1' target='_blank'>\\2</a>",$Text);
      $Text=preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/is","<a href=\\1>\\2</a>",$Text);
      $Text=preg_replace("/\[img\](.+?)\[\/img\]/is","<img src=\\1>",$Text);
      $Text=preg_replace("/\[img\s(.+?)\](.+?)\[\/img\]/is","<img \\1 src=\\2>",$Text);
      $Text=preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is","<font color=\\1>\\2</font>",$Text);
      $Text=preg_replace("/\[colorTxt\](.+?)\[\/colorTxt\]/eis","color_txt('\\1')",$Text);
      $Text=preg_replace("/\[style=(.+?)\](.+?)\[\/style\]/is","<div class='\\1'>\\2</div>",$Text);
      $Text=preg_replace("/\[size=(.+?)\](.+?)\[\/size\]/is","<font size=\\1>\\2</font>",$Text);
      $Text=preg_replace("/\[sup\](.+?)\[\/sup\]/is","<sup>\\1</sup>",$Text);
      $Text=preg_replace("/\[sub\](.+?)\[\/sub\]/is","<sub>\\1</sub>",$Text);
      $Text=preg_replace("/\[pre\](.+?)\[\/pre\]/is","<pre>\\1</pre>",$Text);
      $Text=preg_replace("/\[emot\](.+?)\[\/emot\]/eis","emot('\\1')",$Text);
      $Text=preg_replace("/\[email\](.+?)\[\/email\]/is","<a href='mailto:\\1'>\\1</a>",$Text);
      $Text=preg_replace("/\[i\](.+?)\[\/i\]/is","<i>\\1</i>",$Text);
      $Text=preg_replace("/\[u\](.+?)\[\/u\]/is","<u>\\1</u>",$Text);
      $Text=preg_replace("/\[b\](.+?)\[\/b\]/is","<b>\\1</b>",$Text);
      $Text=preg_replace("/\[quote\](.+?)\[\/quote\]/is","<blockquote>引用:<div style='border:1px solid silver;background:#EFFFDF;color:#393939;padding:5px' >\\1</div></blockquote>", $Text);
      $Text=preg_replace("/\[code\](.+?)\[\/code\]/eis","highlight_code('\\1')", $Text);
      $Text=preg_replace("/\[php\](.+?)\[\/php\]/eis","highlight_code('\\1')", $Text);
      $Text=preg_replace("/\[sig\](.+?)\[\/sig\]/is","<div style='text-align: left; color: darkgreen; margin-left: 5%'><br><br>--------------------------<br>\\1<br>--------------------------</div>", $Text);
	  */
      return $Text;
}
?>