<form name="event_form" method="post" id="eventForm" action="<?php print $action;?>">
  <table width="75%"  border="0" align="center" cellpadding="3" cellspacing="1">
    <tr valign="top" bgcolor="#006699">
      <td colspan="3" class="headingonblue"><?php
      if ($title)print $title;
      else{
      	?>Event Information<?php
      }
      ?></td>
    </tr>
    <tr valign="top">
      <td width="33%"><div align="right">Event Title:</div></td>
      <td width="1%">*</td>
      <td width="66%"><input name="title" type="text" id="title" value="<?php print $title;?>"></td>
    </tr>
    <tr valign="top">
      <td><div align="right">Event Description: </div></td>
      <td>*</td>
      <td valign="top"><textarea name="description" cols="50" rows="5" id="description"><?php print $description;?></textarea></td>
    </tr>
    <tr valign="top">
      <td><div align="right">Event Starts on: </div></td>
      <td>&nbsp;</td>
      <td><?php event_date_fields($start_date);?></td>
    </tr>
    <tr valign="top">
      <td><div align="right">Event Ends on: </div></td>
      <td>&nbsp;</td>
      <td><?php event_date_fields($end_date);?></td>
    </tr>
    <tr valign="top">
      <td><div align="right">What time does the event start? </div></td>
      <td>&nbsp;</td>
      <td><?php time_fields($time);?></td>
    </tr>
	<tr valign="top">
      <td><div align="right">Event Link (copy and paste here): </div></td>
      <td>&nbsp;</td>
      <td><input name="event_link" type="text" id="event_link" value="<?php print $event_link;?>" size="70"></td>
    </tr>
    <tr valign="top">
      <td><div align="right">Registration Deadline:</div></td>
      <td>&nbsp;</td>
      <td><?php event_date_fields($reg_date);?></td>
    </tr>
    <tr valign="top">
      <td><div align="right">MyServiceU Registration Link (copy and paste here): </div></td>
      <td>&nbsp;</td>
      <td><input name="register_link" type="text" id="register_link" value="<?php print $register_link;?>" size="70"></td>
    </tr>
    <tr valign="top">
      <td><div align="right">Will tickets be sold for this event? </div></td>
      <td>&nbsp;</td>
      <td><select name="tickets" id="tickets">
      <?php 
      	option_gen($tickets,"","-select-");
	  	option_gen($tickets,"Yes","Yes");
	  	option_gen($tickets,"","No");
	  ?>
      </select></td>
    </tr>
    <tr valign="top" bgcolor="#006699">
      <td colspan="3" align="left" class="headingonblue"><div align="left">Contact Information </div></td>
    </tr>
    <tr valign="top">
      <td align="right"><div align="right">Contact Person: </div></td>
      <td>&nbsp;</td>
      <td><input name="contact" type="text" id="contact" value="<?php print $contact;?>"></td>
    </tr>
    <tr valign="top">
      <td align="right"><div align="right">Phone Number: </div></td>
      <td>&nbsp;</td>
      <td><input name="contact_phone" type="text" id="contact_phone" value="<?php print $contact_phone;?>"></td>
    </tr>
    <tr valign="top">
      <td align="right"> <div align="right">E-mail Address:</div></td>
      <td>&nbsp;</td>
      <td><input name="contact_email" type="text" id="contact_email" value="<?php print $contact_email;?>"></td>
    </tr>
	<tr valign="top">
      <td align="right"> <div align="right">Image:</div></td>
      <td>&nbsp;</td>
      <td>
	  	<span id='imagePresent'>
			<p><a href="?section=events&action=changeImage" target="_blank"><img src="<?=$imageUrl;?>" id="image" /></a></p>
	  		<p><a name="remove" onClick="javascript:document.getElementById('image').src='';document.getElementById('slideId').value='0';imageCheck();">Remove Image</a></p>
		</span>
		<span id='noImage'>
			<p><a href="?section=events&action=changeImage" target="_blank">Add Image</a></p>
		</span>
          <input name="slideid" type="hidden" id="slideId" value="<?=$slideId;?>">
       </td>
    </tr>
    <tr valign="top">
      <td colspan="3" align="right"><div align="center">
        <input type="hidden" name="action" value="<?php print $action;?>">
        <?php if ($id){?><input type="hidden" name="id" value="<?php print $id;?>"><?}?>
        <input type="submit" name="Submit" value="Submit"> 
          <input type="button" name="Reset" value="Reset" onclick="resetForm('eventForm');">
      </div></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
	function resetForm(formName){
		document.getElementById("image").src="<?=$imageUrl;?>";
		document.getElementById("slideId").value="<?=$slideId;?>";
		document.getElementById(formName).reset();
		imageCheck();
	}
	function imageCheck(){
		var slideId=document.getElementById('slideId').value;
		if (slideId>0){
			document.getElementById('imagePresent').style.display="block";
			document.getElementById('noImage').style.display="none"
		}
		else {
			document.getElementById('imagePresent').style.display="none";
			document.getElementById('noImage').style.display="block";
		}
	}
	imageCheck();
</script>
