<?php include('register.lib.php'); ?>
<?php
	if( !$isHideForm ): 
		global $sErr ;
		if( $sErr ) print "<br><a name='error'></a><center><font class='form_error' >$sErr</font></center><br>"; 

		$starColor = $sErr ? "#ff0000" : "#000000";
		$style=" class='form_text' ";
 ?>

                      <form name="frmFormMail" action="" method='post' enctype='multipart/form-data'>
                          <input type='hidden' name='formmail_submit' value='Y'>
                          <input type='hidden' name='esh_formmail_subject' value="Golf Scramble Registration">
                          <input type='hidden' name='esh_formmail_recipient' value="llinville@slcconline.edu">
                          <input type='hidden' name='esh_formmail_cc' value="">
                          <input type='hidden' name='esh_formmail_bcc' value="">
                          <input type='hidden' name='esh_formmail_return_subject' value="[Soldier Scramble] Thank You for Your Registration!">
                          <input type='hidden' name='esh_formmail_return_msg' value="This email is sent to confirm that we have received your SLCC Soldier Scramble Registration. Please note that this does not indicate that your registration fee has been paid.

-Saint Louis Christian College">
                          <input type='hidden' name='esh_formmail_mail_and_file' value="">
                          <input type='hidden' name='esh_formmail_charset' value="">
                        <table border='0' cellpadding='3' cellspacing='0' bgcolor="#FFFFFF" class="form"  >
                          <tr>
                            <td width="125" rowspan="12" align="right" valign="bottom" class="sidebar">&nbsp;</td>
                            <td width="165" valign="top" class="sidebar"><div align="right">Full Name</div></td>
                            <td width="161" valign="middle" class="form_text"><input name="Full_Name" type="text" class="box" id="Full_Name" size="15"></td>
                            <td width="575" rowspan="11" valign="top" class="form_text"><h3> First Annual SLCC Soldier Scramble (Golf Classic)</h3>
                              <p class="sidebar"><b>Payment Information:</b> Mail check or cash to<br />St. Louis Christian College<br />ATTN: Golf Scramble<br />1360 Grandview Dr.<br />Florissant, MO 63033<br />(Make checks payable to St. Louis Christian College) </p>
                              <p class="sidebar"><strong>If you plan to pay by credit card, contact Luke Linville at <a href="javascript:linkTo_UnCryptMailto('nbjmup;mmjowjmmfAtmddpomjof/fev');">llinville [at] slcconline [dot] edu</a> or 314-837-6777 ext. 1314</strong></p>
                              <p class="sidebar"><em>INSTRUCTIONS: Complete all fields to the left and click the 'Submit' button
                            below.</em></p></td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Phone Number</div></td>
                            <td valign="top" class="form_text"><input name="Phone" type="text" class="box" id="Phone" size="15"></td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">E-mail Address</div></td>
                            <td valign="top" class="form_text"><input name="Email" type="sender's email" class="box" id="Email" size="15">                            </td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Address</div></td>
                            <td valign="top" class="form_text"><input name="Address" type="text" class="box" size="15" >                            </td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">City</div></td>
                            <td valign="top" class="form_text"><input name="City" type="text" class="box" size="15">                            </td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">State</div></td>
                            <td valign="top" class="form_text"><select name="State" size="1" class="box" id="State">
			      <OPTION VALUE=""></OPTION>
				  <OPTION VALUE=AL> Alabama</OPTION>
			      <OPTION VALUE=AK> Alaska</OPTION>
			      <OPTION VALUE=AZ> Arizona</OPTION>
			      <OPTION VALUE=AR> Arkansas</OPTION>
			      <OPTION VALUE=CA> California</OPTION>
			      <OPTION VALUE=CO> Colorado</OPTION>
			      <OPTION VALUE=CT> Connecticut</OPTION>
			      <OPTION VALUE=DE> Delaware</OPTION>
			      <OPTION VALUE=FL> Florida</OPTION>
			      <OPTION VALUE=GA> Georgia</OPTION>
			      <OPTION VALUE=HI> Hawaii</OPTION>
			      <OPTION VALUE=ID> Idaho</OPTION>
			      <OPTION VALUE=IN> Indiana</OPTION>
			      <OPTION VALUE=IL> Illinois</OPTION>
			      <OPTION VALUE=IA> Iowa</OPTION>
			      <OPTION VALUE=KS> Kansas</OPTION>
			      <OPTION VALUE=KY> Kentucky</OPTION>
			      <OPTION VALUE=LA> Louisiana</OPTION>
			      <OPTION VALUE=ME> Maine</OPTION>
			      <OPTION VALUE=MD> Maryland</OPTION>
			      <OPTION VALUE=MA> Massachussets</OPTION>
			      <OPTION VALUE=MI> Michigan</OPTION>
			      <OPTION VALUE=MN> Minnesota</OPTION>
			      <OPTION VALUE=MS> Mississippi</OPTION>
			      <OPTION VALUE=MO> Missouri</OPTION>
			      <OPTION VALUE=MT> Montana</OPTION>
			      <OPTION VALUE=NE> Nebraska</OPTION>
			      <OPTION VALUE=NV> Nevada</OPTION>
			      <OPTION VALUE=NJ> New Jersey</OPTION>
			      <OPTION VALUE=NY> New York</OPTION>
			      <OPTION VALUE=NH> New Hampshire</OPTION>
			      <OPTION VALUE=NM> New Mexico</OPTION>
			      <OPTION VALUE=NC> North Carolina</OPTION>
			      <OPTION VALUE=ND> North Dakota</OPTION>
			      <OPTION VALUE=OH> Ohio</OPTION>
			      <OPTION VALUE=OK> Oklahoma</OPTION>
			      <OPTION VALUE=OR> Oregon</OPTION>
			      <OPTION VALUE=PA> Pennsylvania</OPTION>
			      <OPTION VALUE=RI> Rhode Island</OPTION>
			      <OPTION VALUE=SC> South Carolina</OPTION>
			      <OPTION VALUE=SD> South Dakota</OPTION>
			      <OPTION VALUE=TN> Tennessee</OPTION>
			      <OPTION VALUE=TX> Texas</OPTION>
			      <OPTION VALUE=UT> Utah</OPTION>
			      <OPTION VALUE=VA> Virginia</OPTION>
			      <OPTION VALUE=VT> Vermont</OPTION>
			      <OPTION VALUE=WA> Washington</OPTION>
			      <OPTION VALUE=WV> West Virginia</OPTION>
			      <OPTION VALUE=WI> Wisconsin</OPTION>
			      <OPTION VALUE=WY> Wyoming</OPTION>
</SELECT>                            </td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">ZIP</div></td>
                            <td valign="top" class="form_text"><input name="ZIP" type="text" class="box" size="15" maxlength="10" /></td>
                          </tr>
                          <tr>
                          	<td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Team Name</div></td>
                            <td valign="top" class="form_text"><input name="Team_Name" type="text" class="box" size="15" /></td>
                          </tr>
                          <tr>
                          	<td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Form of Payment</div></td>
                            <td valign="top" class="form_text"><select name="Payment" size="1" class="box" id="Payment">
                            	<OPTION VALUE=cash_check>Cash/Check</OPTION>
                                <OPTION VALUE=credi_card>Credit Card</OPTION>
                                </select>
                            </td>
                          </tr>
                          <tr>
                          	<td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Are you interested in being a sponsor?</div></td>
                            <td valign="top" class="form_text">
                            	<input name="Sponsorship" id="sponsor1" type="radio" value="Yes" />Yes
                                <input name="Sponsorship" id="sponsor2" type="radio" value="No" />No
                            </td>
                          </tr>
                          <tr>
                          	<td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Are you interested in donating promotional items and/or door prizes?</div></td>
                            <td valign="top" class="form_text">
                            	<input name="Donation" id="donation1" type="radio" value="Yes" />Yes
                                <input name="Donation" id="donation2" type="radio" value="No" />No
                            </td>
                          </tr>
						  <tr>
                          	<td></td>
							<td valign="top" class="form_text"><span class="sidebar"><em>
                              <input type='submit' value='Submit'>
                            </em></span></td>
                          </tr>
                      </table>
                      </form>
                      <!-- =======================  End:  ======================= -->
                      <?php
		if( $sErr ) print "<script language='javascript' type='text/javascript'>location.href='#error';</script>";;; 

else: //!$isHideForm
	print( "<br><br><hr><center><b>Your form has been sent. Thank you.</b><br><br><input type='button' value='Home' onclick=\"location.href='/';\"></center><br><br>" );
endif; //!$isHideForm
			?>