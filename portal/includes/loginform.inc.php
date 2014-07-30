<table align="center">
<?php if ($message!="") {?>
	<tr>
		<td colspan="2" align="center"><strong><em><?=$message;?></em></strong></td>
	</tr>
<?php
}?>
	<form id="login" action="?login=1<?=(!empty($viewProject) && ($_GET['section'] == "mapAdmin"))? '&section=mapAdmin&action='.$viewProject.'&projectId='.$projectId:''?>" method="post" name="login" >
		<tr>
			<td colspan="2" align="center"><a href='?forgot=1'>Students who have forgotten their password, please click here.</a></td>
		</tr>

		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" id="username"/></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Login" />&nbsp;&nbsp;<input type="reset" value="Clear" /></td>
		</tr>
	</form>
</table>
<script type="text/javascript">
	var loadFocus = document.getElementById("username");
	loadFocus.focus();
</script>
