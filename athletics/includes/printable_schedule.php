<script language="Javascript1.2">

var message = "Print";

function printpage() {
window.print();  
}

document.write("<form><input type=button "
+"value=\""+message+"\" onClick=\"printpage()\"></form>");

//-->
</script>
<?php include('functions.php');
		printsched($_GET['sport']);
?>