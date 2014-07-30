<h4><a href="javascript:window.close();">Close Window</a></h4>
<form name="mapSupervisor" method="post" id="mapSupervisorForm" action="<?=$action;?>">
<table>
	<tr>
		<td>Supervisor Name:</td><td><input type="text" name="name" id="name" value="<?=$name;?>"></td>
	</tr>
	<tr>
		<td>Phone Number:</td><td><input type="text" name="phone" id="phone" value="<?=$phone;?>"></td>
	</tr>
	<tr>
		<td>Email Address:</td><td><input type="text" name="email" id="email" value="<?=$email;?>"></td>
	</tr>
	<tr>
		<td>Select Organization (if applicable):<br><em>If their organization does not appear please close this window and add it there.</em></td>
		<td valign='top'><?organizationSelect($mapOrganizationId); ?><br><a href="javascript:getParentOrgValue();">Quick Find</a></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" value="<?=$actionButton;?>" name="actionButton" id="actionButton" onclick="<?=$actionClick;?>"></td>
	</tr>
</table>
</form>
<script type="text/javascript" src="includes/map.supervisor.js" ></script>