<?php
class SubPages{
	
	var  $each_disNums;//每页显示的条目数
	var  $nums;//总条目数
	var  $current_page;//当前被选中的页
	var  $sub_pages;//每次显示的页数
	var  $pageNums;//总页数
	var  $page_array = array();//用来构造分页的数组
	var  $subPage_link;//每个分页的链接
	var  $subPage_type;//显示分页的类型
	
	/*  
	__construct是SubPages的构造函数，用来在创建类的时候自动运行.
	@$each_disNums   每页显示的条目数
	@nums     总条目数
	@current_num     当前被选中的页
	@sub_pages       每次显示的页数
	@subPage_link    每个分页的链接
	@subPage_type    显示分页的类型
	当@subPage_type=1的时候为普通分页模式
	example：   共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]
	当@subPage_type=2的时候为经典分页样式
	example：   当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
	*/
	
	function SubPages($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type){ 
		$this->each_disNums=intval($each_disNums);
		$this->nums=intval($nums);
		if(!$current_page){
			$this->current_page=1; 
		}else{
			$this->current_page=intval($current_page);
		}
		$this->sub_pages=intval($sub_pages);
		$this->pageNums=ceil($nums/$each_disNums);
		$this->subPage_link=$subPage_link;
		$this->show_SubPages($subPage_type); 
		//echo $this->pageNums."--".$this->sub_pages;
	}   
	
	/*  __destruct析构函数，当类不在使用的时候调用，该函数用来释放资源。  */ 
	function __destruct(){
		unset($each_disNums);
		unset($nums);
		unset($current_page);
		unset($sub_pages);
		unset($pageNums);
		unset($page_array);
		unset($subPage_link);
		unset($subPage_type);
	}   
	
	/*      show_SubPages函数用在构造函数里面。而且用来判断显示什么样子的分页       */
	function show_SubPages($subPage_type){
		if($subPage_type == 1){
			$this->subPageCss1();
		}elseif ($subPage_type == 2){
			$this->subPageCss2();
		}
		
	}   
	
	/*      用来给建立分页的数组初始化的函数。     */ 
	function initArray(){
		for($i=0;$i<$this->sub_pages;$i++){
			$this->page_array[$i]=$i;
		}
		return $this->page_array;
	}
	
	/*      construct_num_Page该函数使用来构造显示的条目      即使：[1][2][3][4][5][6][7][8][9][10]     */ 
	function construct_num_Page(){
		if($this->pageNums < $this->sub_pages){
			$current_array=array();
			for($i=0;$i<$this->pageNums;$i++){
				$current_array[$i]=$i+1;
			}
		}else{
			$current_array=$this->initArray();
			if($this->current_page <= 3){
				for($i=0;$i<count($current_array);$i++){
					$current_array[$i]=$i+1;
				}
			}elseif ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1 ){ 
			    for($i=0;$i<count($current_array);$i++){
					$current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i;
				}
			}else{
				for($i=0;$i<count($current_array);$i++){
					$current_array[$i]=$this->current_page-2+$i; 
				}
			} 
		}
		return $current_array;
	 }   
	
	
	/*     构造普通模式的分页     共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]     */
	function subPageCss1(){
		$subPageCss1Str="";
		$subPageCss1Str.="共".$this->nums."條記录，";
		$subPageCss1Str.="每頁顯示".$this->each_disNums."條，";
		$subPageCss1Str.="當前第".$this->current_page."/".$this->pageNums."页 ";
		if($this->current_page > 1){
			$firstPageUrl=$this->subPage_link."1";
			$prewPageUrl=$this->subPage_link.($this->current_page-1);
			$subPageCss1Str.="[<a href='$firstPageUrl'>首頁</a>] ";
			$subPageCss1Str.="[<a href='$prewPageUrl'>上一頁</a>] ";
		}else {
			$subPageCss1Str.="[首頁] "; 
			$subPageCss1Str.="[上一頁] ";
		}
		if($this->current_page < $this->pageNums){
			$lastPageUrl=$this->subPage_link.$this->pageNums;
			$nextPageUrl=$this->subPage_link.($this->current_page+1); 
			$subPageCss1Str.=" [<a href='$nextPageUrl'>下一頁</a>] ";
			$subPageCss1Str.="[<a href='$lastPageUrl'>尾頁</a>] ";
		}else { 
		    $subPageCss1Str.="[下一頁] ";
			$subPageCss1Str.="[尾頁] "; 
		} 
		echo $subPageCss1Str;
	}
	
	/*     构造经典模式的分页     当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]     */
	function subPageCss2(){
		$subPageCss2Str="";
		//$subPageCss2Str.="Total:".$this->pageNums." ";
		if($this->current_page > 1){
			$firstPageUrl=$this->subPage_link."1";
			$prewPageUrl=$this->subPage_link.($this->current_page-1); 
			//$subPageCss2Str.="<a href='$firstPageUrl'>First</a> ";
			$subPageCss2Str.="<a href='$prewPageUrl'><img src='../images/prev.png' width='17' height='17' /></a> ";
		}else { 
		    //$subPageCss2Str.="<a href='#'>First</a> ";
			$subPageCss2Str.="<a href='#'><img src='../images/prev.png' width='17' height='17' /></a> ";
		}
		$a=$this->construct_num_Page();
		for($i=0;$i<count($a);$i++){ 
		    $s=$a[$i];
			if($s == $this->current_page ){
				$subPageCss2Str.="<span class='current'>".$s."</span> ";
			}else{
				$url=$this->subPage_link.$s;
				$subPageCss2Str.="<a href='$url'>".$s."</a> ";
			}
		}  
		if($this->current_page < $this->pageNums){
			$lastPageUrl=$this->subPage_link.$this->pageNums;
			$nextPageUrl=$this->subPage_link.($this->current_page+1);
			$subPageCss2Str.=" <a href='$nextPageUrl'><img src='../images/next.png' width='17' height='17' /></a> ";
			//$subPageCss2Str.="<a href='$lastPageUrl'>End</a> ";
		}else {
			$subPageCss2Str.="<a href='#'><img src='../images/next.png' width='17' height='17' /></a> "; 
			//$subPageCss2Str.="<a href='#'>End</a> ";
		}
		echo $subPageCss2Str; 
	}
	
}
?> 

