<div align="center">
	<form action="<?php print $action;?>" method="POST" target="_self">
		<?php if ($_SESSION['post_date']!="")print "<input type=\"hidden\" name=\"post_date\" value=\"".print($_SESSION['opp']['post_date'])."\">";?>
		<input type="hidden" name="church" value="<?php nbspprint ($_SESSION['opp']['church']);?>">
		<input type="hidden" name="address" value="<?php nbspprint ($_SESSION['opp']['address']);?>">
		<input type="hidden" name="city" value="<?php nbspprint ($_SESSION['opp']['city']);?>">
		<input type="hidden" name="state" value="<?php nbspprint ($_SESSION['opp']['state']);?>">
		<input type="hidden" name="zip" value="<?php nbspprint ($_SESSION['opp']['zip']);?>">
		<input type="hidden" name="phone" value="<?php nbspprint ($_SESSION['opp']['phone']);?>">
		<input type="hidden" name="position" value="<?php nbspprint ($_SESSION['opp']['position']);?>">
		<input type="hidden" name="min_type" value="<?php nbspprint ($_SESSION['opp']['min_type']);?>">
		<input type="hidden" name="pay_type" value="<?php nbspprint ($_SESSION['opp']['pay_type']);?>">
		<input type="hidden" name="contact" value="<?php nbspprint ($_SESSION['opp']['contact']);?>">
		<input type="hidden" name="email" value="<?php nbspprint ($_SESSION['opp']['email']);?>">
		<input type="hidden" name="website" value="<?php nbspprint ($_SESSION['opp']['website']);?>">
		<input type="hidden" name="add_info" value="<?php nbspprint ($_SESSION['opp']['add_info']);?>">
		<input type="submit" name="submit" value="Modify">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="submit" value="Submit">
	</form>
</div>