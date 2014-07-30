<?php
function listSermons($dir){
	$dirOpen=opendir("./".$dir);
    while ($entryName=readdir($dirOpen)){
        $dirArray[]=$entryName;
    }
    closedir($dirOpen);
    sort($dirArray);
    $dirArray = array_filter($dirArray, create_function('$a','return ($a[0]!=".");'));
    
    if (!function_exists('returnFileName')) {
		function returnFileName($fileName) {
			return current(explode(".", $fileName));
		}
	}
    
    echo '<table border="1" cellpadding="5" cellspacing="0" width="100%">';
    echo '<tr><td width="15%"><b>Date</b></td><td width="35%"><b>Speaker</b></td><td width="50%"><b>Message Title</b></td>';
    foreach ($dirArray as $var){
        $sermon = returnFileName($var);
		$varSplit=explode(".",$var);
		$extension=$varSplit[count($varSplit)-1];
		if ($extension=="mp3"){
          $sermonInfo = list($sermonDate, $speakerName, $sermonTitle) = explode("_", $sermon);
		  $sermonDateList = list($sermonYear, $sermonMonth, $sermonDay) = explode("-", $sermonDate);
          echo '<tr>';
          echo '<td width="15%">';
          echo $sermonMonth . "/" . $sermonDay . "/" . $sermonYear;
          echo '</td>';
          echo '<td width="35%">';
		  if(substr($speakerName, 0, 3) == "Dr-"){
			  echo str_replace("Dr", "Dr.", str_replace("-", " ", $speakerName));
		  }
		  else{
            echo str_replace("-"," ", $speakerName);
		  }
          echo '</td>';
          echo '<td width="50%">';
          echo '<a href="' . "./" . $dir . "/" . $var . '" target="_blank">' . str_replace("-"," ",$sermonTitle) . "</a>";
          //   '<a href="'.$file['link'].'">'.str_replace("-"," ",$row[2]).'</a>';
          echo '</td>';
          echo '</tr>';
		}
    }
    echo '</tr>';
    echo '</table>';
}
?>