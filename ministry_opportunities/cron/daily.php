<?php
function connect (){
	$username="username";
	$password="password";
	$db="prod_database";
	$host="hostname";
	$connect=mysql_connect($host,$username,$password);
	mysql_select_db($db,$connect);
}
$errormail="techserv@slcconline.edu";
class email{
	var $headers="From: donotreply@slcconline.edu\r\nContent-type: text/html\r\n";
	var $body1="<html><head></head><body>Slcconline.edu, the website of St. Louis Christian College is currently listing a ministry opportunity for a ";
	var $body2=".<br>\nYour email address was given as a point of contact.<br>\nThis listing is set to expire in ";
	var $body3=" day(s)<br><br><a href='http://slcconline.edu/ministry_opportunities/email_response.php?id=";
	var $body4="&action=1'>Click Here to Renew this Listing</a><br>\n<a href='http://slcconline.edu/ministry_opportunities/email_response.php?id=";
	var $body5="&action=2'>Click Here to Have this Listing Removed</a><br>\n<br><br>\nThank You,<br><br>\nSlcconline.edu Staff</body></html>";
	var $church;
	var $position;
	var $email;
	var $expire_num;
	var $id;
	var $error=0;
	function send_email(){
		mail($this->email,"[Automated: Do Not Reply] Slcconline.edu Ministry Opportunity",$this->body1.$this->position." at ".$this->church.$this->body2.$this->expire_num.$this->body3.$this->id.$this->body4.$this->id.$this->body5,$this->headers);
		print "Mail Sent.\n";
	}
	function create_file(){
		if (!file_exists("/mo_temp/$this->id.php")){
			if (!touch ("/mo_temp/$this->id.php")){
				print "Could not create file.";
				$this->error=1;
			}	
		}
	}
}
$interval=73;
connect();
$query1="SELECT * FROM minopps WHERE ADDDATE(post_date,INTERVAL $interval DAY)=curdate()";
$result1=mysql_query($query1);
$num1=mysql_num_rows($result1);
if ($num1!=0){
	print "Entering Loop.\n";
	while ($row=mysql_fetch_array($result1)){
		$id=$row['id'];
		if ($row['email']=="")$row['email']=$errormail;
		$var="message_$id";
		$$var=new email();
		$$var->church=$row['church'];
		$$var->position=$row['position'];
		$$var->email=$row['email'];
		$$var->id=$id;
		$$var->expire_num=90-$interval;
		$$var->create_file();
		if ($$var->error!=1)$$var->send_email();
		else {
			mail($errormail,"[Automated] Error on MinOpp Update","Attempt to create file for id[$id] failed.","From: donotreply@slcconline.edu");
			print "Mail not sent.\n";
		}
	}
}
//$query2="DELETE * FROM minopps WHERE ADDDATE(post_date,INTERVAL 90 DAY)<=curdate()";
$query2="DELETE FROM minopps WHERE ADDDATE(post_date,INTERVAL 90 DAY)=curdate()";
?>
