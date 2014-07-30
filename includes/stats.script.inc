<!-- L10 Hit Counter page code -->
<table border=0 cellspacing=0 cellpadding=0 align=center>
<script language="javascript">
var success=0; cRef=""; cRefType=""; cPage="";
var L10qstr,L10pc,L10ref,L10a,L10pg; L10pg=document.URL.toString(); L10ref=document.referrer;
if(top.document.location==document.referrer || (document.referrer == "" && top.document.location != "")) {L10ref=top.document.referrer;}
L10qStr = "pg="+escape(L10pg)+"&ref="+escape(L10ref)+"&os="+escape(navigator.userAgent)+"&nn="+escape(navigator.appName)+"&nv="+escape(navigator.appVersion)+"&nl="+escape(navigator.language)+"&sl="+escape(navigator.systemLanguage)+"&sa="+success+"&cR="+escape(cRef)+"&cRT="+escape(cRefType)+"&cPg="+escape(cPage);
if(navigator.appVersion.substring(0,1) > "3") { L10d = new Date(); L10qStr = L10qStr+"&cd="+screen.colorDepth+"&sx="+screen.width+"&sy="+screen.height+"&tz="+L10d.getTimezoneOffset();}
<!-- The L10 Hit Counter logo and links must not be removed or altered -->
if((location.href.substr(0,6)=="https:") || (location.href.substr(0,6)=="HTTPS:")) { L10pc="https"; } else { L10pc="http"; }
document.write('<tr><td><a href="http://slcconline.edu/stats/L10HC_Reporter.html" target=_blank><img border=0 hspace=0 vspace=0 width=100 height=42 src="'+L10pc+'://slcconline.edu/stats/L10HC_Counter.php?'+L10qStr+'" alt="LevelTen Hit Counter 3.15"></a></td>');
</script><noscript><tr><td><a href="http://slcconline.edu/stats/L10HC_Reporter.html"><img border=0 hspace=0 vspace=0 width=100 height=42 src="http://slcconline.edu/stats/L10HC_Counter.php?acct=." alt="L10 Web Stats Reporter 3.15"></a></td></noscript>
<!-- The credit logos must not be removed -->
<!--<td><a href='http://www.leveltendesign.com/L10Apps/HC/' target='_blank'><img border='0' src='http://slcconline.edu/stats/L10HC_Img_R.gif' width='70' height='25' alt='LevelTen Hit Counter - Free PHP Web Analytics Script'></a></td></tr><tr><td colspan=2><a href='http://www.leveltendesign.com' target='_blank'><img border='0' src='http://slcconline.edu/stats/L10HC_Img_B.gif' width='95' height='9' alt='LevelTen dallas web development firm - website design, flash, graphics & marketing'></a></td>-->
</tr></table>
<!-- end: L10 Hit Counter page code -->