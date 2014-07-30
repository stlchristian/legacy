<?php
function set_form_vars ( $var,$mod=0 ){
	unset($_SESSION['opp']);
	if ($var['post_date']!=""){
		$_SESSION['opp']['post_date']=$var['post_date'];
		$date_seg = explode ( "-", $var['post_date'] );
		$_SESSION['opp']['date'] = date ( "M j, Y",mktime  (0,0,0,$date_seg[1],$date_seg[2],$date_seg[0]));
	}
	if ($var['submit'])$_SESSION['opp']['submit']=$var['submit'];
	$_SESSION['opp']['church']=$var['church'];
	if ($mod>0){
		if ($var['address']!="")$_SESSION['opp']['address']=$var['address']."<br>";
		if ($var['city']!="" && $var['state'] !=""){
			$_SESSION['opp']['address'].=$var['city'].", ".$var['state'];
		}
		else $_SESSION['opp']['address'].=$var['city'].$var['state'];
	}
	else {
		$_SESSION['opp']['address']=$var['address'];
		$_SESSION['opp']['city']=$var['city'];
		$_SESSION['opp']['state']=$var['state'];
	}
	$_SESSION['opp']['zip']=$var['zip'];
	$_SESSION['opp']['phone']=$var['phone'];
	$_SESSION['opp']['position']=$var['position'];
	$_SESSION['opp']['min_type']=$var['min_type'];
	$_SESSION['opp']['pay_type']=$var['pay_type'];
	$_SESSION['opp']['email']=$var['email'];
	$_SESSION['opp']['website']=$var['website'];
	$_SESSION['opp']['contact']=$var['contact'];
	$_SESSION['opp']['add_info']=$var['add_info'];
}
function nbspprint ($content,$popup=0,$id=0){
	if ($content!="") {
		$quote_exp=explode ("\\\"",$content);
		if ($quote_exp[1]!=""){
			$i=0;
			foreach ($quote_exp as $var) {
				if ($i==0) {
					$new_content=$var;
					$i++;
				}
				else $new_content.="&quot;".$var;
			}
			$content=$new_content;
		} 
		$apostrophe_exp=explode ("\'",$content);
		if ($apostrophe_exp[1]!=""){
			$i=0;
			foreach ($apostrophe_exp as $var) {
				if ($i==0) {
					$new_content=$var;
					$i++;
				}
				else $new_content.="&#39;".$var;
			}
			$content=$new_content;
		}
		if ($popup==1){
			print "<a href=\"javascript:popUp('opp.php?id=".$id."')\" class=\"download\">";
			if ($exp[1]){
				foreach ($exp as $var) $new_content.=$var;
				print $new_content;
			}
			else print $content;
			print "</a>";
		}
		elseif ($exp[1]!=""){
			foreach ($exp as $var) $new_content.=$var;
			print $new_content;
		}
		else print $content;
	}
	else print "&nbsp;";
}
?>