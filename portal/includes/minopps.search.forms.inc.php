<table align="left" width="100%">
	<tr><form action="<?php print $action;?>" target="_self" method="post">
		<td align="right">Church:</td>
		<td><input type="text" name="church" value=""/></td>
		<td><input type="submit" name="submit" value="Search by Church" /></td>
	</form></tr>
	<tr><form action="<?php print $action;?>" target="_self" method="post">
		<td align="right">Zip:</td>
		<td><input type="text" size="5" name="zip" value=""/></td>
		<td><input type="submit" name="submit" value="Search by Zip Code" /></td>
	</form></tr>
	<tr><form action="<?php print $action;?>" target="_self" method="post">
		<td align="right">City:</td>
		<td><input type="text" name="city" value=""/></td>
		<td><input type="submit" name="submit" value="Search by City" /></td>
	</form></tr>
</table>