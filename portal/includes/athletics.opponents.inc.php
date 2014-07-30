<?php
if ($_POST['del']=="y") opponent_delete($_POST['id']);
if ($_POST['action']!="") {
	if ($_POST['action']=="edit") opponent_edit($_POST['id']);
	if ($_POST['action']=="delete") opponent_delete_conf($_POST['id,del']);
	if ($_POST['action']=="update") opponent_update($_POST['id']);
	if ($_POST['action']=="add") opponent_add();
	if ($_POST['action']=="add_form") opponent_add_form();
}
else opponent_view();
?>
