<?php
$sql="SELECT * FROM slides";
connect("web");
if ($result=mysql_query($sql)){
	while ($var=mysql_fetch_array($result)){
		?>
		<a href='javascript:preClose("<?=$var['slideId'];?>","<?=$var['imageUrl'];?>");window.close();'><img src="<?=$var['imageUrl'];?>" /></a><?
	}
}
else echo mysql_error();
?>
<script type="text/javascript">
	function preClose(id,image){
		window.opener.document.getElementById('image').src=image;
		window.opener.document.getElementById('slideId').value=id;
		window.opener.imageCheck();
	}
</script>