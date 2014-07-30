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
                          <input type='hidden' name='esh_formmail_subject' value="Alumni Homecoming Registration">
                          <input type='hidden' name='esh_formmail_recipient' value="ccable@slcconline.edu">
                          <input type='hidden' name='esh_formmail_cc' value="">
                          <input type='hidden' name='esh_formmail_bcc' value="">
                          <input type='hidden' name='esh_formmail_return_subject' value="[SLCC Alumni Homecoming] Thank You for Your Registration!">
                          <input type='hidden' name='esh_formmail_return_msg' value="This email is sent to confirm that we have received your SLCC Alumni Homecoming Registration. Again, please note that this does not indicate that your banquet fee has been paid. All registrations will be paid at the door.

-Saint Louis Christian College">
                          <input type='hidden' name='esh_formmail_mail_and_file' value="">
                          <input type='hidden' name='esh_formmail_charset' value="">
                        <table border='0' cellpadding='3' cellspacing='0' bgcolor="#FFFFFF" class="form"  >
                          <tr>
                            <td width="125" rowspan="7" align="right" valign="bottom" class="sidebar">&nbsp;</td>
                            <td width="165" valign="top" class="sidebar"><div align="right">Name :</div></td>
                            <td width="161" valign="middle" class="form_text"><input name="Full_Name" type="text" class="box" id="Full_Name" size="15"></td>
                            <td width="575" rowspan="6" valign="top" class="form_text"><h3> Alumni Homecoming Registration</h3>
                              <p class="sidebar"> Please complete this form to register for the Alumni Banquet, Feb. 8 at 6:00 p.m. You only need to complete this form if you plan to attend the banquet.  You do not need to register to attend the Alumni Chapel on Feb. 8.</p>
                              <p class="sidebar"><strong>Please note that although you are registering, you will still need to pay your banquet fee at the door!</strong></p>
                              <p class="sidebar"><em>INSTRUCTIONS: Complete all fields to the left and click the 'Submit' button
                            below.</em></p></td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">Address: </div></td>
                            <td valign="top" class="form_text"><input name="Address" type="text" class="box" size="15" >                            </td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">City: </div></td>
                            <td valign="top" class="form_text"><input name="City" type="text" class="box" size="15">                            </td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">State: </div></td>
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
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">ZIP:</div></td>
                            <td valign="top" class="form_text"><input name="ZIP" type="text" class="box" size="5" maxlength="10" /></td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar">Phone Number: </td>
                            <td valign="top" class="form_text"><input name="Phone" type="text" class="box" id="Phone" size="12"></td>
                          </tr>
                          <tr>
                            <td width="165" align='right' valign='top' class="sidebar"><div align="right" class="style7">E-mail Address: </div></td>
                            <td valign="top" class="form_text"><input name="Email" type="sender's email" class="box" id="Email" size="15">                            </td>
							<td width="575" valign="top" class="form_text"><span class="sidebar"><em>
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