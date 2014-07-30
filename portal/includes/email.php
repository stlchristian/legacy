<?php
if(strtolower($_SESSION['parentOU']) != 'aim'){
	print '<script type="text/javascript"> window.location = "http://www.outlook.com/slcconline.edu"; </script>';
}
if (in_array("100",$_SESSION['groups'])){
	$username=strtolower($_SESSION['username']);
?>
<form name="imp_login" action="http://mail2.slcconline.edu/horde/imp/redirect.php" method="post" target="_blank">
<input type="hidden" name="Horde" value="59adf75bcdb2c18e2f9a73ae21871ad9" />
<input type="hidden" name="actionID" value="" />
<input type="hidden" name="url" value="" />
<input type="hidden" name="load_frameset" value="1" />
<input type="hidden" name="autologin" value="0" />
<input type="hidden" name="server_key" value="mail2.slcconline.edu" />
<table width="100%">
<tr>
<td align="center">
<table align="center">
<tr>
<td align="right" class="light"><strong>&nbsp;</strong></td>
<td align="left" class="light" nowrap="nowrap">
<input type="hidden" name="imapuser" value="<?=$username."@".$_SESSION['parentOU']; ?>.slcconline.edu" style="direction:ltr" onchange="javascript:update"/>
</td>
</tr>
<tr>
<td align="right" class="light"><strong>Password:</strong></td>
<td align="left">
<input type="password" tabindex="2" name="pass" style="direction:ltr" />
</td>
</tr>
<tr>
<td align="right" class="light"><strong>&nbsp;</strong></td>
<td align="left" class="light">
<input type="hidden" name="new_lang" value="en_US" /> 
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left" class="light">
<input type="submit" class="button" name="loginButton" tabindex="4" value="Log in" onclick="return submit_login();" />
</td>
</tr>
</table>
</td>
</tr>
</table>
</form>
<?
}
else {

?>
<form method='post' name="loginForm" action="http://mail.slcconline.edu/">
<input type="hidden" name="loginOp" value="login"/>
Password: &nbsp;<input id="username" class='zLoginField' name='username' type='hidden' value='<?php print $_SESSION['username'];?>' />
<input id="password" class='zLoginField' name='password' type='password' value=""/>
<input type="submit" class='zLoginButton' value="Log In"/><br />
Client: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="client" onchange='clientChange(this.options[this.selectedIndex].value)'>
<option value="preferred" selected > Default</option>
<option value="advanced"  > Advanced (Ajax)</option>
<option value="standard"  > Standard (HTML)</option>
<option value="mobile"  > Mobile</option>
</select>
</form>
<?
}
?>