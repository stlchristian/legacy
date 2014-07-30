<h4><a href="javascript:window.close();">Close Window</a></h4>
<form name="mapOrganization" method="post" id="mapOrganizationForm" action="<?=$action;?>">
<table>
	<tr>
		<td>Organization Name:</td><td><input type="text" name="name" id="name" value="<?=$name;?>"></td>
	</tr>
	<tr>
		<td valign="top">Address:</td><td><textarea columns="50" rows="2" name="address" id="address""<?=$address;?>"></textarea></td>
	</tr>
	<tr>
		<td>City:</td><td><input type="text" name="city" id="city" value="<?=$city;?>"></td>
	</tr>
	<tr>
		<td>State:</td><td><?state_sel("state",$state,"state"); ?></td>
	</tr>
	<tr>
		<td>Zip:</td><td><input type="text" name="zip" maxchars="5" id="zip" value="<?=$zip;?>"></td>
	</tr>
	<tr>
		<td>Phone:</td><td><input type="text" name="phone" id="phone" value="<?=$phone;?>"></td>
	</tr>
	<tr>
		<td>Website:</td><td><input type="text" name="web" id="web" value="<?=$web;?>"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" value="<?=$actionButton;?>" name="actionButton" id="actionButton" onclick="<?=$actionClick;?>"></td>
	</tr>
</table>
</form>
<script type="text/javascript" src="includes/map.organization.js" ></script>