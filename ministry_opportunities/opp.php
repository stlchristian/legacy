<?php
session_start();
include ("includes/functions.php");
connect();
$id=$_GET['id'];
$query="SELECT * FROM minopps WHERE id='$id' LIMIT 1";
$result=mysql_fetch_array(mysql_query($query));
if ($result['address']!="")$address=$result['address']."<br>";
if ($result['city']!="" && $result['state'] !=""){
	$address.=$result['city'].", ".$result['state'];
}
else $address.=$result['city'].$result['state'];
$date_seg = explode ( "-", $result['post_date'] );
$date = date ( "M j, Y",mktime  (0,0,0,$date_seg[1],$date_seg[2],$date_seg[0]));
$caption=array(array("preach","Preaching Ministry"));
array_push($caption,array("youth","Youth Ministry"));
array_push($caption,array("child","Children's Ministry"));
array_push($caption,array("music","Worship Ministry"));
array_push($caption,array("other","Other Ministry"));
array_push($caption,array("assoc","Associate Ministry"));
foreach($caption as $var2){
	if ($var['type']==$var2[0])$type=$var2[1];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<link href="includes/form.css" rel="stylesheet" type="text/css">
</head>
<body>
<a href="javascript:window.close()"><img src="images/close.gif" width="10" height="10" border="0"></a> <a href="javascript:window.close()" class="download">Close Window</a>
<table width="460"  border="0" align="center" cellpadding="0" cellspacing="1" class="minopps">
  <tr>
    <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td><p><span class="heading"><?php nbspprint ($result['church']);?><br>
          </span>Posted <?php nbspprint ($date);?><br>
              <br>
              <span class="minopps1">Position Available: <?php nbspprint ($result['position']);?></span> </p>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><TABLE width="100%" border=0 cellpadding="4" cellspacing="0">
        <TBODY>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Address:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($address);?></TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><div align="center"><img src=" images/line.gif" width="455" height="1"></div></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Phone:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($result['phone']);?></TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="/images/line.gif" width="455" height="1"></TD> 
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Contact:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($result['contact']);?></TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="/images/line.gif" width="455" height="1"></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>E-mail:</strong></div></TD>
            <TD width="78%" class="download">
            <?php if ($result['email']!=""){?>
            	<A href="mailto:<?php print $result['email'];?>" class="headinglink"><?php print $result['email'];?></A><?php
            }
            else print "&nbsp;";?>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="/images/line.gif" width="455" height="1"></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Website:</strong></div></TD>
            <TD width="78%">
	            <?php if ($result['website']!=""){?>
	            	<a href="http://<?php print $result['website'];?>" class="headinglink"><?php print $result['website'];?></a><?php
	            }
	            else print "&nbsp;";?>
	        </TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="images/line.gif" width="455" height="1"></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Additional Info:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($result['add_info']);?></TD>
          </TR>
        </TBODY>
    </TABLE></td>
  </tr>
</table>
<div align="center"><br>
</div>
<form>
  <div align="center">
    <input type="button" value="Print This Listing" onClick="window.print()" />
  </div>
</form>
</body>
</html>