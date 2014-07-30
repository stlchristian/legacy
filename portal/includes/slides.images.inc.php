<?php

function list_files($dir)
{
  if(is_dir($dir))
  {
    if($handle = opendir($dir))
    {
      while(($file = readdir($handle)) !== false)
      {
        if($file != "." && $file != ".." && $file != "Thumbs.db" && $file != "_notes"/*pesky windows, images..*/)
        {
          echo "<a href='javascript:preClose(\"$dir\",\"$file\");window.close();'><img src='$dir$file'/></a><br>";
        }
      }
      closedir($handle);
    }
  }
}
function checkImage(){
	if ($_FILES['uploaded']['type']=="image/jpeg"){
		$imageData=getimagesize($_FILES['uploaded']['tmp_name']);
		if ($imageData[0]==204 && $imageData[1]==184){
			if (copy($_FILES['uploaded']['tmp_name'],"../images/image_cube/".$_FILES['uploaded']['name'])) {
				unlink ($_FILES['uploaded']['tmp_name']);
				$error=0;
			}
			else $error="File could not be placed properly";
		}
		else $error="Incorrect Image Size";
	}
	else $error="Wrong File Type";
	return $error;
}

if ($_POST['submit']=="Upload") {
	$imageError=checkImage();
	if ($imageError!="0") echo "<font color='#FF0000'>".$imageError."</font>";
}?>
<form enctype="multipart/form-data" action="" method="POST">
Upload a new image: <input name="uploaded" type="file" />&nbsp;
<input type="submit" value="Upload" name="submit"/>
</form> 
<?
list_files ("../images/image_cube/");
?>
<script type="text/javascript">
	function preClose(dir,image){
		var splitDir=dir.split("..");
		dir=splitDir[splitDir.length-1];
		var url=dir+image;
		window.opener.document.getElementById('image').src=url;
		window.opener.document.getElementById('hidImageUrl').value=url;
	}
</script>