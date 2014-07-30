<h4 align="center"><?php
print $title;
?></h4><?php
if ($imageUrl!=""){?>
<p align="center"><img src='<?=$imageUrl;?>' /></p>
<?
}?>
<p align="center">Date(s): <?php 
print $start_date;
if ($end_date) print " - $end_date";
?></p>
<div align="center"><a href="index.php?section=events&action=edit&id=<?php print $id;?>">Edit</a> 
<a href="index.php?section=events&action=del&id=<?php print $id;?>">Delete</a> </div><hr>