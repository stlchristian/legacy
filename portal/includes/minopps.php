<?php
include_once ("minopps.functions.inc.php");
if (!$_GET['addopp'] and !$_GET['edopp'] and !$_GET['delopp'])$_GET['addopp']=1;
if ($_GET['addopp']==1) include ("includes/minopps.addopp.inc.php");
elseif ($_GET['delopp']==1) include ("includes/minopps.delopp.inc.php");
elseif ($_GET['edopp']==1) include ("includes/minopps.edopp.inc.php");
?>