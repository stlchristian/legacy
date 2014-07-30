<?php
function bball_season() {
	// Check which month it is, and select the two years for the season accordingly
	if ( date("m") <= 5 ) {
		return ( date("Y") - 1 ) . "-" . date("Y");
	}
	else {
		return date("Y") . "-" . ( date("Y") + 1 );
	}
}
?>