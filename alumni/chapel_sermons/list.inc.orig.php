<?php
function listSermons($dir){
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
        if ($extension=="mp3"){
            $name=substr($var,0,-4);
            $files[]=array(name=>$name,link=>$dir.'/'.$var);
        }
    }
    echo $dirArray[2];
    echo '<table border="1" cellpadding="5" cellspacing="0" width="100%">';
    echo '<tr><td width="15%"><b>Date</b></td><td width="35%"><b>Speaker</b></td><td width="50%"><b>Message Title</b></td>';
    foreach ($files as $file){
        /*$row=explode('_',$file['name']);
        echo '<tr>';
        echo '<td width="15%">';
        print $row[0];
        echo '</td>';
        echo '<td width="35%">';
        print str_replace("-"," ",$row[1]);
        echo '</td>';
        echo '<td width="50%">';
        print '<a href="'.$file['link'].'">'.str_replace("-"," ",$row[2]).'</a>';
        echo '</td>';
        echo '</tr>';*/
    }
    echo '</tr>';
    echo '</table>';
        //print ("<a href='".$file['link']."'>".$file['name']."</a><br>");
}
?>