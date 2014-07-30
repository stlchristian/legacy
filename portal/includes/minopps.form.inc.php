<table width="550" align="left">
  <form action="<?php print $action;?>" target="_self" method="post">
	<tr>
		<td><div align="right">Church Name:</div></td>
		<td colspan="2"><div align="left"><input name="church" type="text" id="church" size="50" value="<?php print $_SESSION['opp']['church'];?>">
		</div></td>
	</tr>
	<tr>
		<td><div align="right">Address:</div></td>
		<td colspan="2"><div align="left"><input name="address" type="text" id="address" size="50" value="<?php print $_SESSION['opp']['address'];?>">
		</div></td>
	</tr>
	<tr>
		<td><div align="right">City:</div></td>
		<td><div align="left"><input name="city" type="text" id="city" size="20" value="<?php print $_SESSION['opp']['city'];?>"></div></td>
	</tr>
	<tr>
		<td><div align="right">State:</div></td>
		<td><div align="left"><select name="state">
								<?php
								option_gen($_SESSION['opp']['state'],'','--Select State--');
								option_gen($_SESSION['opp']['state'],'CAN','Canada');
								option_gen($_SESSION['opp']['state'],'AL','Alabama');
								option_gen($_SESSION['opp']['state'],'AK','Alaska');
								option_gen($_SESSION['opp']['state'],'AZ','Arizona');
								option_gen($_SESSION['opp']['state'],'AR','Arkansas');
								option_gen($_SESSION['opp']['state'],'CA','California');
								option_gen($_SESSION['opp']['state'],'CO','Colorado');
								option_gen($_SESSION['opp']['state'],'CT','Connecticut');
								option_gen($_SESSION['opp']['state'],'DE','Delaware');
								option_gen($_SESSION['opp']['state'],'FL','Florida');
								option_gen($_SESSION['opp']['state'],'GA','Georgia');
								option_gen($_SESSION['opp']['state'],'HI','Hawaii');
								option_gen($_SESSION['opp']['state'],'ID','Idaho');
								option_gen($_SESSION['opp']['state'],'IN','Indiana');
								option_gen($_SESSION['opp']['state'],'IL','Illinois');
								option_gen($_SESSION['opp']['state'],'IA','Iowa');
								option_gen($_SESSION['opp']['state'],'KS','Kansas');
								option_gen($_SESSION['opp']['state'],'KY','Kentucky');
								option_gen($_SESSION['opp']['state'],'LA','Louisiana');
								option_gen($_SESSION['opp']['state'],'ME','Maine');
								option_gen($_SESSION['opp']['state'],'MD','Maryland');
								option_gen($_SESSION['opp']['state'],'MA','Massachussets');
								option_gen($_SESSION['opp']['state'],'MI','Michigan');
								option_gen($_SESSION['opp']['state'],'MN','Minnesota');
								option_gen($_SESSION['opp']['state'],'MS','Mississippi');
								option_gen($_SESSION['opp']['state'],'MO','Missouri');
								option_gen($_SESSION['opp']['state'],'MT','Montana');
								option_gen($_SESSION['opp']['state'],'NE','Nebraska');
								option_gen($_SESSION['opp']['state'],'NV','Nevada');
								option_gen($_SESSION['opp']['state'],'NJ','New Jersey');
								option_gen($_SESSION['opp']['state'],'NY','New York');
								option_gen($_SESSION['opp']['state'],'NH','New Hampshire');
								option_gen($_SESSION['opp']['state'],'NM','New Mexico');
								option_gen($_SESSION['opp']['state'],'NC','North Carolina');
								option_gen($_SESSION['opp']['state'],'ND','North Dakota');
								option_gen($_SESSION['opp']['state'],'OH','Ohio');
								option_gen($_SESSION['opp']['state'],'OK','Oklahoma');
								option_gen($_SESSION['opp']['state'],'OR','Oregon');
								option_gen($_SESSION['opp']['state'],'PA','Pennsylvania');
								option_gen($_SESSION['opp']['state'],'RI','Rhode Island');
								option_gen($_SESSION['opp']['state'],'SC','South Carolina');
								option_gen($_SESSION['opp']['state'],'SD','South Dakota');
								option_gen($_SESSION['opp']['state'],'TN','Tennessee');
								option_gen($_SESSION['opp']['state'],'TX','Texas');
								option_gen($_SESSION['opp']['state'],'UT','Utah');
								option_gen($_SESSION['opp']['state'],'VA','Virginia');
								option_gen($_SESSION['opp']['state'],'VT','Vermont');
								option_gen($_SESSION['opp']['state'],'WA','Washington');
								option_gen($_SESSION['opp']['state'],'WV','West Virginia');
								option_gen($_SESSION['opp']['state'],'WI','Wisconsin');
								option_gen($_SESSION['opp']['state'],'WY','Wyoming');
								?>
          </select>&nbsp;Zip Code:&nbsp;<input type="text" name="zip" id="zip" size="10" value="<?php print $_SESSION['opp']['zip'];?>"></div></td>
	</tr>
	<tr>
		<td><div align="right">Phone:</div></td>
		<td><div align="left"><input name="phone" type="text" id="phone" value="<?php print $_SESSION['opp']['phone'];?>" /></div></td>
	</tr>
	<tr>
		<td><div align="right">Position Title:</div></td>
		<td><div align="left"><input name="position" type="text" id="position" size="50" value="<?php print $_SESSION['opp']['position'];?>"/> </div></td>
	</tr>
	<tr>
		<td><div align="right">Position Category:</div></td>
		<td><div align="left"><select name="min_type"><option value="">--Select Type--</option>
			<?php
			$type=file("../ministry_opportunities/includes/ministry.types.inc.php");
			foreach ($type as $var){
				$type_exp=explode(",","$var");
				option_gen($_SESSION['opp']['min_type'],$type_exp[0],$type_exp[1]);
			}
			?>
			</select>
		</div></td>
	</tr>
	<tr>
		<td><div align="right">Pay Type:</div></td>
		<td><div align="left"><select name="pay_type"><option value="">--Select Type--</option><option value="">None Specified</option>
			<?php
			$type=file("../ministry_opportunities/includes/pay.types.inc.php");
			foreach ($type as $var){
				$type_exp=explode(",","$var");
				option_gen($_SESSION['opp']['pay_type'],$type_exp[0],$type_exp[1]);
			}
			?>
			</select>
		</div></td>
	</tr>
	<tr>
		<td><div align="right">Contact:</div></td>
		<td><div align="left"><input name="contact" type="text" id="contact" size="50" value="<?php print $_SESSION['opp']['contact'];?>"/> </div></td>
	</tr>
	<tr>
		<td><div align="right">Contact E-Mail:</div></td>
		<td><div align="left"><input name="email" type="text" id="email" size="50" value="<?php print $_SESSION['opp']['email'];?>"/> </div></td>
	</tr>
	<tr>
		<td><div align="right">Website:</div></td>
		<td><div align="left"><input name="website" type="text" id="website" size="50" value="<?php print $_SESSION['opp']['website'];?>"/> </div></td>
	</tr>
	<tr>
		<td><div align="right">Additional Information:</div></td>
		<td><div align="left">
		  <textarea name="add_info" cols="40 id="add_info" rows="4"><?php print $_SESSION['opp']['add_info'];?></textarea><?php
		  if ($_SESSION['opp']['post_date']!="") print "<input type='hidden' name='post_date' value='".$_SESSION['opp']['post_date']."'>";?>
		  </div></td>
	</tr>
	<tr>
		<td colspan="2"><div align="center"><input name="submit" type="submit" value="Preview" />&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="Reset" /> </div></td>
	</tr>
</form></table>
