<table width="460"  border="0" align="center" cellpadding="0" cellspacing="1" class="minopps">
  <tr>
    <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td><p><span class="heading"><?php nbspprint ($_SESSION['opp']['church']);?><br>
          </span>Posted <?php if (!$_SESSION['opp']['date']) nbspprint (date("l, F d,Y"));
          else print $_SESSION['opp']['date'];?><br>
              <br>
              <span class="minopps1">Position Available: <?php nbspprint ($_SESSION['opp']['position']);?></span> </p>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><TABLE width="100%" border=0 cellpadding="4" cellspacing="0">
        <TBODY>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Address:</strong></div></TD>
            <TD width="78%"><?php 
            	nbspprint ($_SESSION['opp']['address']);
            	if ($_SESSION['opp']['zip'] != ""){
            		print "<br>";
            		nbspprint($_SESSION['opp']['zip']);
            	}
            ?></TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><div align="center"><img src=" images/line.gif" width="455" height="1"></div></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Phone:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($_SESSION['opp']['phone']);?></TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="/images/line.gif" width="455" height="1"></TD> 
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Contact:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($_SESSION['opp']['contact']);?></TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="/images/line.gif" width="455" height="1"></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>E-mail:</strong></div></TD>
            <TD width="78%" class="download">
            <?php if ($_SESSION['opp']['email']!=""){?>
            	<A href="mailto:<?php print $_SESSION['opp']['email'];?>" class="headinglink"><?php print $_SESSION['opp']['email'];?></A><?php
            }
            else print "&nbsp;";?>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="/images/line.gif" width="455" height="1"></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Website:</strong></div></TD>
            <TD width="78%">
	            <?php if ($_SESSION['opp']['website']!=""){?>
	            	<a href="http://<?php print $_SESSION['opp']['website'];?>" class="headinglink"><?php print $_SESSION['opp']['website'];?></a><?php
	            }
	            else print "&nbsp;";?>
	        </TD>
          </TR>
          <TR valign="top">
            <TD colspan="2"><img src="images/line.gif" width="455" height="1"></TD>
          </TR>
          <TR valign="top">
            <TD width="22%"><div align="right"><strong>Additional Info:</strong></div></TD>
            <TD width="78%"><?php nbspprint ($_SESSION['opp']['add_info']);?></TD>
          </TR>
        </TBODY>
    </TABLE></td>
  </tr>
</table>