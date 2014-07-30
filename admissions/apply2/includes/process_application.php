<?php
	
	if (!empty($_POST['save_personal_info'])) {
		//Process the personal portion of the app
	}
	
	if (!empty($_POST['educational_info'])) {
		// Process the educational portion of the app
	}
	
	if (!empty($_POST['save_enrollment_info'])) {
		// Process the enrollment portion of the app
		if (!empty($_POST['course_load'])) {
			$course_load = mysql_real_escape_string(trim($_POST['course_load']));
		} elseif (empty($error)) {
			$error = 'Please select your intended course load.';
		}
		
		if (!empty($_POST['program'])) {
			$program = mysql_real_escape_string(trim($_POST['program']));
		} elseif (empty($error)) {
			$error = 'Please select your program of interest.';
		}
		
		if (!empty($_POST['incoming_status'])) {
			$incoming_status = mysql_real_escape_string(trim($_POST['incoming_status']));
			if ($incoming_status == 're_admit') {
				if (!empty($_POST['readmit_date'])) {
					$readmit_date = mysql_real_escape_string(trim($_POST['readmit_date']));
				} elseif (empty($error)) {
					$error = 'Please enter your last date of attendance at SLCC.';
				}
			}
		} elseif (empty($error)) {
			$error = 'Plesae select your incoming status.';
		}
		
		if (!empty($_POST['degree'])) {
			$degree = mysql_real_escape_string(trim($_POST['degree']));
		} elseif (empty($error)) {
			$error = 'Plesae select your desired degree.';
		}
		
		if (!empty($_POST['major'])) {
			$major = mysql_real_escape_string(trim($_POST['major']));
		} elseif (empty($error)) {
			$error = 'Please select your desired major.';
		}
		
		if (!empty($_POST['enrollment_status'])) {
			$enrollment_status = mysql_real_escape_string(trim($_POST['enrollment_status']));
		} elseif (empty($error)) {
			$error = 'Please select your desired enrollment status.';
		}
		if (empty($error)) {
			$insert_query = "INSERT INTO app_enrollment_info
							 (enrollment_id, app_id, course_load, program, incoming_status, readmit_date, intended_degree, intended_major, enrollment_status, completed)
							 VALUES
							 ('', '$app_id', '$course_load', '$program', '$incoming_status', '$readmit_date', '$degree', '$major', '$enrollment_status', '1')";
			$insert_result = mysql_query($insert_query);
			$error = mysql_error();
		}
	}
	
	if (!empty($_POST['church_info'])) {
		// Process the church portion of the app
	}
	
	if (!empty($_POST['housing_info'])) {
		// Process the housing portion of the app
	}
	
	if (!empty($_POST['financial_aid_info'])) {
		// Process the financial aid portion of the app
	}
	
	if (!empty($_POST['other_info'])) {
		// Process the other portion of the app
	}
	
	if (!empty($_POST['optional_info'])) {
		// Process the optional portion of the app
	}
	
	if (!empty($_POST['map_info'])) {
		// Process the optional portion of the app
	}
	
	if (!empty($_POST['essay_info'])) {
		// Process the essay portion of the app
	}
?>