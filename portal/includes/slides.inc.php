<strong>FrontPage Slides</strong><br>
<?php
$action=$_GET['action'];
switch ($action){
	default :
		connect("web");
		$sql="SELECT * FROM slides";
		if ($result=mysql_query($sql)){
			while ($var=mysql_fetch_array($result)){
				include ("includes/slides.displaySlide.inc.php");
			}
		}
		else print mysql_error();
		break;
	case "update" :
		connect("web");
		$sql="UPDATE slides SET caption='".$_POST['caption']."', linkUrl='".$_POST['linkurl']."', imageUrl='".$_POST['imageurl']."', active='".$_POST['active']."' WHERE slideId=".$_GET['slideId'];
		if (!$result=mysql_query($sql)) print mysql_error();
		$sql2="SELECT * FROM slides";
		if ($result=mysql_query($sql2)){
			while ($var=mysql_fetch_array($result)){
				include ("includes/slides.displaySlide.inc.php");
			}
		}
		else print mysql_error();
		break;
	case "edit" :
		connect("web");
		$sql="SELECT slides.* FROM slides WHERE slideId=".$_GET['slideid'];
		if ($result=mysql_query($sql)){
			$var=mysql_fetch_array($result);
			$submitValue="Update";
			$formAction="?section=slides&action=update&slideId=".$var['slideId'];
			include("includes/slides.edit.inc.php");
		}
		else print mysql_error();
		break;
	case "add" :
		$submitValue="Add";
		$formAction="?section=slides&action=insert";
		include("includes/slides.edit.inc.php");
		break;
	case "insert" :
		connect("web");
		$sql="INSERT INTO slides (caption,linkUrl,imageUrl,active) VALUES ('".$_POST['caption']."','".$_POST['linkurl']."','".$_POST['imageurl']."','".$_POST['active']."')";
		if (!$result=mysql_query($sql)){
			print mysql_error();
			$var['caption']=$_POST['caption'];
			$var['linkUrl']=$_POST['linkurl'];
			$var['imageUrl']=$_POST['imageurl'];
			$var['active']=$_POST['active'];
			$submitValue="Add";
			$formAction="?section=slides&action=insert";
			include ("includes/slides.edit.inc.php");
		}
		else {
			$sql2="SELECT * FROM slides";
			if ($result=mysql_query($sql2)){
				while ($var=mysql_fetch_array($result)){
					include ("includes/slides.displaySlide.inc.php");
				}
			}
			else print mysql_error();
		}
		break;
	case "changeImage" :
		include ("includes/slides.images.inc.php");
		break;
}
?>