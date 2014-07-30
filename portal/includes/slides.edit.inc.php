<table>
	<form name='post' method='post' action='<?=$formAction;?>'>
	<tr>
		<td><?=$var['caption'];?><br><img src="<?=$var['imageUrl'];?>" id="image"></td>
		<td>
			<table>
				<tr>
					<td>Caption:</td>
					<td>
						<input type="text" name="caption" id="txtCaption" value="<?=$var['caption'];?>">
					</td>
				</tr>
				<tr>
					<td>URL:</td>
					<td>
						<input type="text" name="linkurl" id="txtLinkUrl" value="<?=$var['linkUrl'];?>" size="50">
					</td>
				</tr>
				<tr>
					<td>Image:</td>
					<td>
						<a href='?section=slides&action=changeImage' target='_blank'>Change Displayed Image</a>
						<input type='hidden' name='imageurl' id='hidImageUrl' value="<?=$var['imageUrl'];?>">
					</td>
				</tr>
				<tr>
					<td>Active:</td>
					<td>
						<input type="checkbox" name="active" id="chkActive" <?if ($var['active']==1){?> checked<?}?> value="1" />
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="<?=$submitValue;?>" name="submit">&nbsp;&nbsp;<input type="button" value="Reset" name="reset" onClick="javascript:resetImage();"></td>
	</tr>
	</form>
</table>
<script type="text/javascript">
	function resetImage(){
		document.getElementById("image").src="<?=$var['imageUrl'];?>";
		document.getElementById("hidImageUrl").value="<?=$var['imageUrl'];?>";
		this.form.reset();
	}
</script>