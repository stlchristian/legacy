<table width="533"  border="0" cellpadding="0" cellspacing="6">
				<tr>
					<td>
						<h3>
							<span class="sidebar">
								<strong>Admissions Contact Form </strong>
							</span>
						</h3>
					</td>
				</tr>
				<tr>
					<td valign="top">
						<strong>Instructions: Fill out all fields and click the &quot;Submit&quot; button to request more information from the Admissions Department.</strong>
						<br>
						<br>
						<strong>* Indicates a Required Field</strong>
						<?php print '<form name="frmFormMail" action="'.$PHP_SELF.'" method="post" enctype="multipart/form-data">';?>
						<input type='hidden' name='formmail_submit' value='Y'>
						<input type='hidden' name='esh_formmail_recipient' value="admissions@slcconline.edu">
						<input type='hidden' name='esh_formmail_subject' value="SLCC information request">
						<input type='hidden' name='esh_formmail_cc' value="">
						<input type='hidden' name='esh_formmail_bcc' value="">
						<input type='hidden' name='esh_formmail_return_subject' value="Thank you for you interest in Saint Louis Christian College!">
						<input type='hidden' name='esh_formmail_return_msg' value="We have received your inquiry and will send the information you requested shortly. If you have any further questions, please contact the Office of Admissions at 314-837-6777 x8110 or 1-800-887-7522. Thank you!
						Saint Louis Christian College
						Office of Admissions">
						<input type='hidden' name='esh_formmail_mail_and_file' value="">
						<input type='hidden' name='esh_formmail_charset' value="">
					</td>
				</tr>
			</table>
			<table width="533" border='0' cellpadding='5' cellspacing='0'  >
				<tr>
					<td width="289" align='right' valign='top' class="normaltext"><div align="right">First &amp; Last Name: </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input name="Full_Name" type="text" id="Full_Name"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Address: </div></td>
					<td width='11' valign='top' aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input type="text" name="Address" ></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Address (Line 2): </div></td>
					<td width='11' valign='top' aligh='right'>&nbsp;</td>
					<td class="form_text"><div align="left"><input type="text" name="Address_(Line_2)" ></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">City: </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input type="text" name="City"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">State: </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input name="State" type="text" size="10"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top' class="normaltext"><div align="right">Country:</div></td>
					<td valign='top'  aligh='right'>&nbsp;</td>
					<td class="form_text"><div align="left"><input name="Country" type="text" id="Country" size="15"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">ZIP: </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input name="ZIP" type="text" size="5" maxlength="10"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Email Address: </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input type="sender's email" name="E-mail_Address"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Phone Number: </div></td>
					<td valign='top' aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input name="Phone" type="text" id="phone" size="12"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Birthdate (ex. 00-00-0000): </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input name="Birthdate" type="text" size="10" maxlength="10"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Church you currently attend: </div></td>
					<td valign='top'  aligh='right'>&nbsp;</td>
					<td class="form_text"><div align="left"><input name="Church" type="text" id="Church"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Year of High School Graduation: </div></td>
					<td width='11' valign='top' aligh='right'><strong>*</strong></td>
					<td class="form_text"><div align="left"><input name="Year_of_High_School_Graduation" type="text"  size="4" maxlength="8"></div></td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Prospective Term: </div></td>
					<td valign='top'  aligh='right'><strong>*</strong></td>
					<td valign='top'>
						<div align="left">
							<select name="prospective_term" id="prosepective_term">
								<option value="Fall">Fall</option>
								<option value="Spring">Spring</option>
								<option value="Summer">Summer</option>
							</select>
							<select name="prospective_year" id="prospective_year">
                        		<?php 
									$curMonth = date('n');
									$date = date('Y'); 
									$valDate = date('y');
									if ($curMonth > 10){
										$date++;
										$valDate++;
									}
									for($i=0;$i<6;$i++): ?>
                        				<option value="<?php echo $date;?>" <?php echo ($year == $valDate -1)? 'selected="selected"':'';?>><?php echo $date++;?></option>
                        			<?php endfor;?>
                        	</select>
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Please send info about: </div></td>
					<td width='11' valign='top' aligh='right'><strong>*</strong></td>
					<td class="form_text">
						<div align="left">
							<input type="checkbox" name="Please_send_info_about0"  value="Day Classes">	Day Classes<br>
							<input type="checkbox" name="Please_send_info_about1"  value="Evening Classes">	Evening Classes
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Area of Inquiry: </div></td>
					<td width='11' valign='top'  aligh='right'><strong>*</strong></td>
					<td class="form_text">
						<div align="left">
							<input type="checkbox" name="Area_of_Inquiry"  value="Four-Year Degree">Four-Year Degree <br>
							<input type="checkbox" name="Area_of_Inquiry0"  value="Two-Year Degree">Two-Year Degree <br>
							<input type="checkbox" name="Area_of_Inquiry1"  value="Day Classes">Day Classes<br>
							<input type="checkbox" name="Area_of_Inquiry2"  value="Night Classes">Night Classes <br>
							<input type="checkbox" name="Area_of_Inquiry3"  value="Financial Aid">Financial Aid<br>
							<input type="checkbox" name="Area_of_Inquiry3"  value="Jesus 101">Jesus 101-Free Class<br>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3" align='right' valign='top'>
						<div align="left" class="subheading2">Please select your areas of interest/study below:</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">First Choice: </div></td>
					<td width='11' valign='top'  aligh='right'>&nbsp;</td>
					<td>
						<div align="left">
							<select name="First_Choice" id="First_Choice" <? print $style; ?>>
								<option value='' selected>- Select -</option>
								<option value="Behavioral Ministry"> Behavioral Ministry</option>
								<option  value="Children&acute;s Ministry"> Children&acute;s Ministry</option>
								<option  value="Christian Ministry"> Christian Ministry</option>
								<option  value="Discipleship &amp; Involvement Ministry"> Discipleship &amp; Involvement Ministry</option> 
								<option value="Intercultural &amp; Urban Ministry">Intercultural &amp; Urban Ministry </option>
								<option  value="Preaching Ministry"> Preaching Ministry </option>
								<option  value="Student Ministry"> Student Ministry </option>
								<option value="Worship &amp; Music Ministry">Worship &amp; Music Ministry </option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Second Choice: </div></td>
					<td width='11' valign='top' aligh='right'>&nbsp;</td>
					<td>
						<div align="left">
							<select name="Second_Choice" <? print $style; ?>>
								<option value='' selected>- Select -</option>
								<option value="Behavioral Ministry"> Behavioral Ministry</option>
								<option  value="Children&acute;s Ministry"> Children&acute;s Ministry</option>
								<option  value="Christian Ministry"> Christian Ministry</option>
								<option  value="Discipleship &amp; Involvement Ministry"> Discipleship &amp; Involvement Ministry</option> 
								<option value="Intercultural &amp; Urban Ministry">Intercultural &amp; Urban Ministry </option>
								<option  value="Preaching Ministry"> Preaching Ministry </option>
								<option  value="Student Ministry"> Student Ministry </option>
								<option value="Worship &amp; Music Ministry">Worship &amp; Music Ministry </option> 
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'>Do you have any previous college? </td>
					<td valign='top'  aligh='right'><strong>*</strong></td>
					<td valign="top">
						<div align="left">
							<select name="previous" id="previous">
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'>If so, how many hours do you have? </td>
					<td valign='top'  aligh='right'><strong>*</strong></td>
					<td valign="top">
						<div align="left">
							<input name="hours" type="text" id="hours" value="" size="3">
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top' >How did you hear about SLCC? </td>
					<td valign='top'  aligh='right'><strong>*</strong></td>
					<td valign="top">
						<div align="left">
							<input name="hearabout" type="text" id="hearabout" value="">
						</div>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top'><div align="right">Please include any additional comments here: </div></td>
					<td valign='top'  aligh='right'><strong>*</strong></td>
					<td>
						<div align="left">
							<textarea name="comments" id="comments"></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td height="32" colspan=3 align='center'>
						<input type='submit' value='Submit'>&nbsp;&nbsp;
						<input type='button' value='Cancel' onClick="location.href='/';">
					</td>
				</tr>
			</table>