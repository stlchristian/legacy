<br><br>
<table border='1'>
	<tr >
		<td>
			<a href="?section=slides&action=edit&slideid=<?=$var['slideId'];?>"><?=$var['caption'];?></a><br>
		</td>
		<td rowspan='3'><img src="<?=$var['imageUrl'];?>"></td>
	</tr>
	<tr>
		<td>URL: <?=$var['linkUrl'];?></td>
	</tr>
	<tr>
		<td>Viewable: <input type="checkbox" value="1"<?if ($var['active']==1)print " checked";?> disabled></td>
	</tr>
</table>
