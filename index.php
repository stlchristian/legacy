<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="Saint Louis Christian College, St. Louis Christian College, Central Bible College, Colleges missouri, Lincoln Christian College, Missouri Bible, Missouri Christian College, Ozark Christian College, St. Louis College, bible college, bible college scholarships, bible college scholarship, christian bible college, college for homeschoolers, free tuition, full tuition scholarship, johnson bible college, missouri bible college, scholarships for college students, tuition scholarships" />
<meta name="Description" content="Saint Louis Christian College is an accredited four-year Bible College, specializing in training Christians for ministry.  Free tuition is offered to residential, full-time students." />
<link rel="shortcut icon" href="favicon.ico">
<script type="text/javascript">
	function preload(){
		imageTab1 = new Image();
		imageTab1.src = "/images/menutabs_05.gif";
		imageTab2 = new Image();
		imageTab2.src = "/images/menutabs_09.gif";
		imageTab3 = new Image();
		imageTab3.src = "/images/menutabs_11.gif";
	}
</script>
<script type="text/javascript">
    function UnCryptMailto( s )
    {
        var n = 0;
        var r = "";
        for( var i = 0; i < s.length; i++)
        {
            n = s.charCodeAt( i );
            if( n >= 8364 )
            {
                n = 128;
            }
            r += String.fromCharCode( n - 1 );
        }
        return r;
    }

    function linkTo_UnCryptMailto( s )
    {
        location.href=UnCryptMailto( s );
    }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Saint Louis Christian College</title>
<!-- InstanceEndEditable -->
<link href="includes/slcc.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript">
	function preload(){
		imageTab1 = new Image();
		imageTab1.src = "/images/menutabs_05.gif";
		imageTab2 = new Image();
		imageTab2.src = "/images/menutabs_09.gif";
		imageTab3 = new Image();
		imageTab3.src = "/images/menutabs_11.gif";
	}
</script>

<script type="text/javascript"> <!--
    function UnCryptMailto( s )
    {
        var n = 0;
        var r = "";
        for( var i = 0; i < s.length; i++)
        {
            n = s.charCodeAt( i );
            if( n >= 8364 )
            {
                n = 128;
            }
            r += String.fromCharCode( n - 1 );
        }
        return r;
    }

    function linkTo_UnCryptMailto( s )
    {
        location.href=UnCryptMailto( s );
    }
// --> </script>

<script type="text/javascript">
      
/***********************************************
* Ultimate Fade-In Slideshow (v1.51):  Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/	
 
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
<?php
include_once ("includes/mysql.php");
include_once ("includes/imageCube.php");
?>

var fadebgcolor="white"
<!--
////NO need to edit beyond here/////////////
 
var fadearray=new Array() //array to cache fadeshow instances
var fadeclear=new Array() //array to cache corresponding clearinterval pointers
 
var dom=(document.getElementById) //modern dom browsers
var iebrowser=document.all
 
function fadeshow(theimages, fadewidth, fadeheight, borderwidth, delay, pause, displayorder){
this.pausecheck=pause
this.mouseovercheck=0
this.delay=delay
this.degree=10 //initial opacity degree (10%)
this.curimageindex=0
this.nextimageindex=1
fadearray[fadearray.length]=this
this.slideshowid=fadearray.length-1
this.canvasbase="canvas"+this.slideshowid
this.curcanvas=this.canvasbase+"_0"
if (typeof displayorder!="undefined")
theimages.sort(function() {return 0.5 - Math.random();}) //thanks to Mike (aka Mwinter) :)
this.theimages=theimages
this.imageborder=parseInt(borderwidth)
this.postimages=new Array() //preload images
for (p=0;p<theimages.length;p++){
this.postimages[p]=new Image()
this.postimages[p].src=theimages[p][0]
}
 
var fadewidth=fadewidth+this.imageborder*2
var fadeheight=fadeheight+this.imageborder*2
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+fadewidth+'px;height:'+fadeheight+'px;overflow:hidden;"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div></div>')
else
document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'"></div>')
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers such as Firefox
this.startit()
else{
this.curimageindex++
setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
}
}

function fadepic(obj){
if (obj.degree<100){
obj.degree+=10
if (obj.tempobj.filters&&obj.tempobj.filters[0]){
if (typeof obj.tempobj.filters[0].opacity=="number") //if IE6+
obj.tempobj.filters[0].opacity=obj.degree
else //else if IE5.5-
obj.tempobj.style.filter="alpha(opacity="+obj.degree+")"
}
else if (obj.tempobj.style.MozOpacity)
obj.tempobj.style.MozOpacity=obj.degree/101
else if (obj.tempobj.style.KhtmlOpacity)
obj.tempobj.style.KhtmlOpacity=obj.degree/100
else if (obj.tempobj.style.opacity&&!obj.tempobj.filters)
obj.tempobj.style.opacity=obj.degree/101
}
else{
clearInterval(fadeclear[obj.slideshowid])
obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"
obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
obj.populateslide(obj.tempobj, obj.nextimageindex)
obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
setTimeout("fadearray["+obj.slideshowid+"].rotateimage()", obj.delay)
}
}
 
fadeshow.prototype.populateslide=function(picobj, picindex){
var slideHTML=""
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML='<a href="'+this.theimages[picindex][1]+'" target="_self">'
slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px">'
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML+='</a>'
picobj.innerHTML=slideHTML
}
 
 
fadeshow.prototype.rotateimage=function(){
if (this.pausecheck==1) //if pause onMouseover enabled, cache object
var cacheobj=this
if (this.mouseovercheck==1)
setTimeout(function(){cacheobj.rotateimage()}, 100)
else if (iebrowser&&dom||dom){
this.resetit()
var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
crossobj.style.zIndex++
fadeclear[this.slideshowid]=setInterval("fadepic(fadearray["+this.slideshowid+"])",50)
this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
}
else{
var ns4imgobj=document.images['defaultslide'+this.slideshowid]
ns4imgobj.src=this.postimages[this.curimageindex].src
}
this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}
 
fadeshow.prototype.resetit=function(){
this.degree=10
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
if (crossobj.filters&&crossobj.filters[0]){
if (typeof crossobj.filters[0].opacity=="number") //if IE6+
crossobj.filters(0).opacity=this.degree
else //else if IE5.5-
crossobj.style.filter="alpha(opacity="+this.degree+")"
}
else if (crossobj.style.MozOpacity)
crossobj.style.MozOpacity=this.degree/101
else if (crossobj.style.KhtmlOpacity)
crossobj.style.KhtmlOpacity=this.degree/100
else if (crossobj.style.opacity&&!crossobj.filters)
crossobj.style.opacity=this.degree/101
}
 
 
fadeshow.prototype.startit=function(){
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
this.populateslide(crossobj, this.curimageindex)
if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
var cacheobj=this
var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
}
this.rotateimage()
}
-->
</script>

<link href="includes/slcc.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style9 {
	font-size: 13px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
-->
</style>

<!-- Google Apps Verification -->
<meta name="google-site-verification" content="gvl28nwFdv67S0moGQ0aoJ4lbxm6BthegeU_x3gOsRo" />
<!-- Google Webmaster Central Verification -->
<meta name="google-site-verification" content="b5YqxOd82G6LVtPyBe_kBTWk6t2WnxmESN2v24ZFNR4" />

<!-- InstanceEndEditable -->

</head>

<body onload="javascript:preload()">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="toptable">
	<tr bgcolor="#003974">
		<td class="header" align="center"><a href="/"><img src="images/homepage_header_banner.jpg" border="0"/></a></td>
	</tr>
</table>
<table width="100%" height="37" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td bgcolor="#003974">
			<?php include("includes/topmenu.inc"); ?>
		</td>
	</tr>
</table>
<table id="maintable" cellpadding="0" cellspacing="0" border="0">
	<tr class="content_top">
		<td class="blue_side_bar">&nbsp;</td>
		<td class="content_top_left">&nbsp;</td>
		<td class="content_middle">&nbsp;</td>
		<td class="content_top_right">&nbsp;</td>
		<td class="blue_side_bar">&nbsp;</td>
	</tr>
	<tr>
		<td class="content_white_side">
			<table cellpadding="0" cellspacing="0" border="0" id="tabletop">
				<tr class="content_blue_side">
					<td class="blue_side_bar">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="gray_side_bar">&nbsp;</td>
				</tr>
			</table>		</td>
	  <td class="content_white_side_left">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr class="content_blue_side">
					<td class="content_blue_side_left">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="content_gray_side_left">&nbsp;</td>
				</tr>
			</table>		
	  </td>
		<td rowspan="2" class="content"><!-- InstanceBeginEditable name="Main" -->
<table  width="100%" height="100% "border="0" cellpadding="0" align="center">
				<tr>
					<td width="244" height="31" background="images/ministry_opps.jpg"></td>
					<td width="10" rowspan="6"></td>
					<td width="3" height="31"></td>
					<td width="10" rowspan="6"></td>
					<td width="244" height="31" background="images/news.jpg"></td>
					<td width="10" rowspan="6"></td>
					<td width="3" height="31"></td>
					<td width="10" rowspan="6"></td>
					<td width="244" height="31" background="images/events_home.jpg"></td>
				</tr>
				<tr>
					<td class="content_box" width="244" height="220">
						<table cellpadding="0" cellspacing="0" border="0" width="244" height="100%">
							<tr>
								<td height="20" width="244" colspan="3"></td>
							</tr>
							<tr>
								<td height="180" width="20"></td>
								<td height="180" width="204" valign="top">
									<table width="100%" height="100%" cellpadding="0" border="0" cellspacing="0">
										<tr>
											<td align="center" valign="top" background="images/northcity.jpg">
												<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
													<tr>
														<td width="100%" height="10" colspan="3"></td>
													</tr>
													<tr>
														<td width="5%"></td>
														<td width="90%" valign="top" align="left">
															<br />
															<a href="../ministry_opportunities/"><b>Ministry Opportunities</b></a>
															<br />
															Saint Louis Christian College is proud to offer our nationwide
															 <a href="../ministry_opportunities/">Ministry Opportunities Database</a>.
															This database contains open ministry positions across the country.
															<br />
														</td>
														<td width="5%"></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
								<td height="180" width="20"></td>
							</tr>
							<tr>
								<td height="20" width="244" colspan="3"></td>
							</tr>
						</table>					</td>
				  	<td width="3" rowspan="4" bgcolor="#B5B5B5"></td>
					<td class="content_box" width="240" height="220" align="center" valign="middle">
						<table border="0" width="244" height="220" cellpadding="0" cellspacing="0">
							<tr>
								<td>
								<center>
								  <div class="centerdiv">
									<script type="text/javascript">
										//new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
										new fadeshow(fadeimages, 204, 184, 0, 4000, 0)
									</script>
							<!--	<a href="downloads/Infinite_Influence_Schedule.pdf"><img src="images/image_cube/infinite_influence_schedule.jpg" /></a>		-->
								  </div>
								</center>								</td>
							</tr>
						</table>
					</td>
					<td width="3" rowspan="4" bgcolor="#B5B5B5"></td>
					<td rowspan="4" class="content_event_box">
						<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td width="244" height="20" colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td width="25" height="446">&nbsp;</td>
								<td width="194" height="446" valign="top">
									
								  <p>
									  <?php
									include ("includes/events.inc.php");
									regular_sched();
									?>
									  <a href="../events/">Click here for future general events.</a><br />
									  <br />
									  <?php
									athletics_sched();
									?>  
									  <a href="../athletics/calendar/">Click here for future athletic events.</a><br />
									  <a href="downloads/chapel_schedule_spring_2014.pdf" target="_blank">Click here for the Chapel Schedule.</a></p>
							  </td>
								<td width="25" height="446">&nbsp;</td>
							</tr>
							<tr>
								<td width="244" height="20" colspan="3">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="244" height="15"></td>
					<td width="244" height="15"></td>
				</tr>
				<tr>
					<td width="244" height="30"></td>
					<td width="244" height="30" background="images/about_slcc.jpg"></td>
				</tr>
				<tr>
					<td class="content_box" width="244" height="220">
						<table cellpadding="0" border="0" cellspacing="0" width="100%" height="100%">
							<tr>
								<td align="center" valign="middle">
									<a href="admissions/apply/"><img src="images/Apply_Now.jpg" width="204" height="184" border="0"/></a>
                                </td>
							</tr>
						</table>
					</td>
					<td class="content_box" width="240" height="220">
						<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
							<tr>
								<td height="18" width="244" colspan="3"></td>
							</tr>
							<tr>
								<td height="184" width="20"></td>
								<td height="184" width="204" valign="top">
									<table width="100%" height="100%" align="center" cellpadding="0" cellspacing="0" border="0">
										<tr>
											<td background="images/slcc_front_sign.jpg" valign="middle">
												<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
													<tr valign="top">
														<td width="100%" height="100%">
															<center>
															<br /><br /><br /><br /><br /><br /><br /><br />
															<strong><a href="../about/">Click here to learn more<br />about SLCC</a>.</strong>
															<br />
															</center>
														</td>
													</tr>
												</table>
											</td>
										</tr>
                                        <!--<tr>
                                        	<td>
                                            	<a href="./events/campus_visit_day/index.php"><img src="./images/image_cube/Campus_Visit_Day_2012.jpg" /></a>
                                            </td>
                                        </tr>-->
									</table>
								</td>
								<td height="184" width="20"></td>
							</tr>
							<tr>
								<td height="18" width="244" colspan="3"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="244" height="5"></td>
					<td width="3" height="5"></td>
					<td width="240" height="5"></td>
					<td width="3" height="5"></td>
					<td width="244" height="5"></td>
				</tr>
				<tr>
					<td height="20" colspan="9">&nbsp;</td>
				</tr>
			</table>
<!-- InstanceEndEditable --></td>
		<td class="content_white_side_right">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr class="content_blue_side">
					<td class="content_blue_side_right">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="content_gray_side_right">&nbsp;</td>
				</tr>
			</table>		</td>
	    <td class="content_white_side">
			<table cellpadding="0" cellspacing="0" border="0" id="tabletop">
				<tr class="content_blue_side">
					<td class="blue_side_bar">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="gray_side_bar">&nbsp;</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr class="content_fade">
		<td class="content_white_side">&nbsp;</td>
		<td class="content_bottom_left">
			<table cellpadding="0" cellspacing="0" border="0" id="tablebottom">
				<tr class="content_fade">
					<td class="content_fade_left">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td class="content_bottom_right">
			<table cellpadding="0" cellspacing="0" border="0" id="tablebottom">
				<tr class="content_fade">
					<td class="content_fade_right">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td class="content_white_side">&nbsp;</td>
	</tr>
	<tr class="content_bottom">
		<td class="content_white_side"></td>
		<td></td>
		<td class="content_bottom_line_middle"></td>
		<td></td>
		<td class="content_white_side"></td>
	</tr>
	<tr>
		<td class="content_white_side"></td>
		<td></td>
		<td>
			<table width="794" height="72" cellpadding="0" cellspacing="0">
				<tr>
					<td width="20" rowspan="2"></td>
					<td height="5"></td>
					<td width="20" rowspan="2"></td>
				</tr>
				<tr>
					<td valign="top">
						<?php include("includes/footer.inc"); ?>
					</td>
				</tr>
			</table>
		</td>
		<td></td>
		<td class="content_white_side"></td>
	</tr>
</table>
</body>
<!-- InstanceEnd --></html>
