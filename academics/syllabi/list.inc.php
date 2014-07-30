<?php 
function listSyllabi($dir){
	$dirOpen=opendir("./".$dir);
	while ($entryName=readdir($dirOpen)){
		$dirArray[]=$entryName;
	}
	closedir($dirOpen);
	sort($dirArray);
	$files=array();
	foreach ($dirArray as $var){
		$varSplit=explode(".",$var);
		$extension=$varSplit[count($varSplit)-1];
		if ($extension=="pdf"){
			$name=substr($var,0,-4);
			$name=str_replace("_"," ",$name);
			$files[]=array(name=>$name,link=>$dir.'/'.$var);
		}
	}
	foreach ($files as $file){
		print ("<a href='".$file['link']."'>".$file['name']."</a><br>");
	}
}
?>