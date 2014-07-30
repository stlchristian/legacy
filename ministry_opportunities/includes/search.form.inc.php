<form action="./" method="POST" name="search" id="search">
	<table width='550' border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr bgcolor="#00264D">
    		<td class="rowtitle"><div align="left" class="style1">Search Job Listings</div></td>
  		</tr>
  		<tr>
    		<td>
    			<table  border="0" align="left" cellpadding="0" cellspacing="0">
        			<tr>
       				  <td valign="top"><h5 align="right">Ministry Type:</h5></td>
          				<td>
          				
							<table width="95%">
								<?php
								$a=0;
								$b=1;
								foreach ($type_array as $var){
									if ($b==1){
										print "<tr>
											";
									}
									print "<td width='50%'>
										<table width='100%'>
											<tr>
												<td width='10%'>
													<input name='search_type[$a]' type='checkbox' value='".$var['min_type']."'";
														if ($_SESSION['search']) foreach ($_SESSION['search'] as $var2){
															if ($var2['name']=="min_type" && $var2['value']!="") foreach ($var2['value'] as $var3){
																if ($var3==$var['min_type']) print " checked";
															}
														}
													print ">
												</td>
												<td width='90%'>".$var['caption']."</td>
											</tr>
										</table>
									</td>";
									if ($b==2){
										print "
									</tr>";
										$b=1;
									}
									else $b=2;
									$a++;
								}?>
							</table>
						</td>
        			</tr>
					<tr>
						<td width="19%" valign="top"><h5 align="right">Pay Type:</h5>
					  </td>
						<td width="81%">
						  <table width="95%">
							<?php
										$a=0;
										$b=1;
										foreach ($pay_array as $var){
											if ($b==1){
												?><tr>
													<?php
											}
											?><td width='50%'>
												<table width='100%'>
													<tr>
														<td width='10%'>
															<input name='search_pay_type[<?php print $a;?>]>' type='checkbox' value='<?php print $var['pay_type']?>'
																<?php 
																if ($_SESSION['search']) foreach ($_SESSION['search'] as $var2){
																	if ($var2['name']=="pay_type" && $var2['value']!="") foreach ($var2['value'] as $var3){
																		if ($var3==$var['pay_type']) print " checked";
																	}
																}?>>
														</td>
														<td width='90%'><?php print $var['caption'];?></td>
													</tr>
												</table>
											</td><?
											if ($b==2){
												?>
											</tr><?php
												$b=1;
											}
											else $b=2;
											$a++;
										}?>
							</table>
						</td>
					</tr>
        			<tr>
						<td width="19%"><h5 align="right">State:</h5></td>
						<td width="81%">
							<select name="search_state[0]">
								<?php
								option_gen($search_state[0],'','All');
								option_gen($search_state[0],'AL','Alabama');
								option_gen($search_state[0],'AK','Alaska');
								option_gen($search_state[0],'AZ','Arizona');
								option_gen($search_state[0],'AR','Arkansas');
								option_gen($search_state[0],'CA','California');
								option_gen($search_state[0],'CO','Colorado');
								option_gen($search_state[0],'CT','Connecticut');
								option_gen($search_state[0],'DE','Delaware');
								option_gen($search_state[0],'FL','Florida');
								option_gen($search_state[0],'GA','Georgia');
								option_gen($search_state[0],'HI','Hawaii');
								option_gen($search_state[0],'ID','Idaho');
								option_gen($search_state[0],'IN','Indiana');
								option_gen($search_state[0],'IL','Illinois');
								option_gen($search_state[0],'IA','Iowa');
								option_gen($search_state[0],'KS','Kansas');
								option_gen($search_state[0],'KY','Kentucky');
								option_gen($search_state[0],'LA','Louisiana');
								option_gen($search_state[0],'ME','Maine');
								option_gen($search_state[0],'MD','Maryland');
								option_gen($search_state[0],'MA','Massachussets');
								option_gen($search_state[0],'MI','Michigan');
								option_gen($search_state[0],'MN','Minnesota');
								option_gen($search_state[0],'MS','Mississippi');
								option_gen($search_state[0],'MO','Missouri');
								option_gen($search_state[0],'MT','Montana');
								option_gen($search_state[0],'NE','Nebraska');
								option_gen($search_state[0],'NV','Nevada');
								option_gen($search_state[0],'NJ','New Jersey');
								option_gen($search_state[0],'NY','New York');
								option_gen($search_state[0],'NH','New Hampshire');
								option_gen($search_state[0],'NM','New Mexico');
								option_gen($search_state[0],'NC','North Carolina');
								option_gen($search_state[0],'ND','North Dakota');
								option_gen($search_state[0],'OH','Ohio');
								option_gen($search_state[0],'OK','Oklahoma');
								option_gen($search_state[0],'OR','Oregon');
								option_gen($search_state[0],'PA','Pennsylvania');
								option_gen($search_state[0],'RI','Rhode Island');
								option_gen($search_state[0],'SC','South Carolina');
								option_gen($search_state[0],'SD','South Dakota');
								option_gen($search_state[0],'TN','Tennessee');
								option_gen($search_state[0],'TX','Texas');
								option_gen($search_state[0],'UT','Utah');
								option_gen($search_state[0],'VA','Virginia');
								option_gen($search_state[0],'VT','Vermont');
								option_gen($search_state[0],'WA','Washington');
								option_gen($search_state[0],'WV','West Virginia');
								option_gen($search_state[0],'WI','Wisconsin');
								option_gen($search_state[0],'WY','Wyoming');
								?>
            				</select>
            			</td>
        			</tr>
        		</table>            
        	</td>
		</tr>
		<tr>
    		<td>
    			<div align="center">
      				<input name="submit" type="submit" value="Search">
    			</div>
    		</td>
		</tr>
	</table>
</form>