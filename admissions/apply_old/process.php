<?php
function connectDB(){
  mysql_connect('hostname','username','password');
  mysql_select_db('prod_database');
}

//process to make sure all of the form information is filled out.

//process page 1:

if(!empty($_POST['checkPage1'])){
  $error = '';
  if(!empty($_POST['enrollment_term'])){
    $term = $_POST['enrollment_term'];
  } elseif(empty($error)) {
    $error = "Please select a term.";
  }
  
  if(!empty($_POST['enrollment_year'])){
    $year = $_POST['enrollment_year'];
  } elseif(empty($error)){
    $error = "Please select a year.";
  }
  
  if(!empty($_POST['SSN1'])){
    $ssn = $_POST['SSN1'];
  } elseif(empty($error)){
    $error = "Please enter your social security number.";
  }
  
  if(!empty($_POST['SSN2'])){
    $ssn .= "-".$_POST['SSN2'];
  } elseif(empty($error)){
    $error = "Please enter your social security number.";
  }
  
  if(!empty($_POST['SSN3'])){
    $ssn .= "-".$_POST['SSN3'];
  } elseif(empty($error)){
    $error = "Please enter your full social secuirty number.";
  }
  
  if(!empty($_POST['first_name'])){
    $first = $_POST['first_name'];
  } elseif(empty($error)){
    $error = "Please enter your first name.";
  }
  
  if(!empty($_POST['last_name'])){
    $last = $_POST['last_name'];
  } elseif(empty($error)){
    $error = "Please enter your last name.";
  }
  
  if(!empty($_POST['middle_name'])){
    $middle = $_POST['middle_name'];
  }
  
  if(!empty($_POST['maiden_name'])){
    $maiden = $_POST['maiden_name'];
  }
  
  if(!empty($_POST['Address'])){
    $address = $_POST['Address'];
  } elseif(empty($error)){
    $error = "Please enter your address.";
  }
  
  if(!empty($_POST['City'])){
    $city = $_POST['City'];
  } elseif(empty($error)){
    $error = "Please enter your city.";
  }
  
  if(!empty($_POST['State'])){
    $state = $_POST['State'];
  } elseif(empty($error)){
    $error = "Please enter your state.";
  }
  
  if(!empty($_POST['ZIP'])){
    $zip = $_POST['ZIP'];
  } elseif(empty($error)){
    $error = "Please enter your zip code.";
  }

  if(!empty($_POST['phone'])){
    $phone = $_POST['phone'];
  } elseif(empty($error)){
    $error = "Please enter your home phone number.";
  }
	
  if(!empty($_POST['phone'])){
    $phone = $_POST['phone'];
  } elseif(empty($error)){
    $error = "Please enter your phone number.";
  }
  
  if(!empty($_POST['Email'])){
    $email = $_POST['Email'];
    if(strpos($email, '@') === false){
      $error = "Please enter a valid email.";
    }
  } elseif(empty($error)){
    $error = "Please enter your email address.";
  }
  
  if(!empty($_POST['dob_month'])){
    $dob = $_POST['dob_month']."/";
  } elseif(empty($error)){
    $error = "Please enter your date of birth.";
  }
  
  if(!empty($_POST['dob_day'])){
    $dob .= $_POST['dob_day']."/";
  } elseif(empty($error)){
    $error = "Please enter your date of birth.";
  }
  
  if(!empty($_POST['dob_year'])){
    $dob .= $_POST['dob_year'];
  } elseif(empty($error)){
    $error = "Please enter your date of birth.";
  }
  
  if(!empty($_POST['marital_status'])){
    $married = $_POST['marital_status'];
  } elseif(empty($error)){
    $error = "Please enter your marital status.";
  }
  
  if(!empty($_POST['high_school'])){
    $highSchool = $_POST['high_school'];
  } elseif(empty($error)){
    $error = "Please enter your high school's name.";
  }
  
  if(!empty($_POST['hs_location'])){
    $hsLocation = $_POST['hs_location'];
  } elseif(empty($error)){
    $error = "Please enter your high school's location.";
  }
  
  if(!empty($_POST['hs_diploma'])){
    $hsDiploma = 'yes';
    if(!empty($_POST['hs_gpa'])){
      $hsGpa = $_POST['hs_gpa'];
    } elseif(empty($error)){
      $error = "Please fill out your high school gpa.";
    }
    if(!empty($_POST['hs_diploma_year'])){
      $hsGrad = $_POST['hs_diploma_year'];
    } elseif(empty($error)){
      $error = "Please fill out your graduation year.";
    }
  } else {
    $hsDiploma = 'no';
  }
  
  if(!empty($_POST['ged'])){
    $ged = 'yes';
    if(!empty($_POST['ged_comp_date'])){
      $gedDate = $_POST['ged_comp_date'];
    } elseif(empty($error)){
      $error = "Please fill out your ged completion date.";
    }
  } else {
    $ged = 'no';
  }
  
  if(!empty($_POST['act'])){
    $actTaken = 'yes';
    if(!empty($_POST['act_score'])){
      $actScore = $_POST['act_score'];
    } elseif(empty($error)){
      $error = "Please fill out your ACT score.";
    }
    if(!empty($_POST['act_date'])){
      $actDate = $_POST['act_date'];
    } elseif(empty($error)){
      $error = "Please fill out your ACT test date.";
    }
  } else {
  $actTaken = 'no';
  }
  
  if(!empty($_POST['sat'])){
    $satTaken = 'yes';
    if(!empty($_POST['sat_date'])){
      $satDate = $_POST['sat_date'];
    } elseif(empty($error)){
      $error = "Please fill out your SAT test date.";
    }
    if(!empty($_POST['sat_score'])){
      $satScore = $_POST['sat_score'];
    } elseif(empty($error)){
      $error = "Please fill out your SAT score.";
    }
  } else {
    $satTaken = 'no';
  }
  
  if(!empty($_POST['college1_name'])){
    $c1Name = $_POST['college1_name'];
    $c1Dates = $_POST['college1_dates'];
    $c1Hours = $_POST['college1_hours'];
    $c1Gpa = $_POST['college1_gpa'];
  }
  if(!empty($_POST['college2_name'])){
    $c2Name = $_POST['college2_name'];
    $c2Dates = $_POST['college2_dates'];
    $c2Hours = $_POST['college2_hours'];
    $c2Gpa = $_POST['college2_gpa'];
  }
  if(!empty($_POST['college3_name'])){
    $c3Name = $_POST['college3_name'];
    $c3Dates = $_POST['college3_dates'];
    $c3Hours = $_POST['college3_hours'];
    $c3Gpa = $_POST['college3_gpa'];
  }
  
  
  // Code below added or edited by Elliot //
  if(!empty($_POST['us_citizen'])){
    $usCitizen = $_POST['us_citizen'];
  } elseif($error == ''){
    $error = "Please select your citizenship stature.";
  }
  
  if(!empty($_POST['gender'])){
	$gender = $_POST['gender'];  
  }
  
  if(!empty($_POST['cell_phone'])){
    $cellPhone = $_POST['cell_phone'];
  }
  
  if(!empty($_POST['text'])){
    $textMessage = $_POST['text'];
  }
  // Code above added or edited by Elliot //
  
  
  if($error == ''){
    connectDB();
    $query = "INSERT INTO application(firstName, lastName, maidenName, mInitial, enrollmentYear, enrollmentTerm, ssn, address, city, state, zipCode, phone, email, birthday, maritalStatus, highSchool, highSchoolLocation, highSchoolDiploma, highSchoolGradDate, highSchoolGpa, ged, gedCompletionDate, act, actScore, actDate, sat, satScore, satDate, college1Name, college1dates, college1hours, college1gpa, college2Name, college2dates, college2hours, college2gpa, college3Name, college3dates, college3hours, college3gpa, usCitizen, gender, cellPhone, textMessage)
              VALUES ('$first', '$last', '$maiden', '$middle', '$year', '$term', '$ssn', '$address', '$city', '$state', '$zip', '$phone', '$email', '$dob', '$married', '$highSchool', '$hsLocation', '$hsDiploma', '$hsGrad', '$hsGpa', '$ged', '$gedDate', '$actTaken', '$actScore', '$actDate', '$satTaken', '$satScore', '$satDate', '$c1Name', '$c1Dates', '$c1Hours', '$c1Gpa', '$c2Name', '$c2Dates', '$c2Hours', '$c2Gpa', '$c3Name', '$c3Dates', '$c3Hours', '$c3Gpa', '$usCitizen', '$gender', '$cellPhone', '$textMessage')";
    //$query = addslashes($query);
    //$query = "INSERT INTO application(mInitial) VALUES ('$middle');";
    mysql_query($query);
    if(mysql_error() != ''){
      $alert = "There was a problem processing your information please contact webmaster@slcconline.edu, and check back later.";
      //echo mysql_error();
    } else {
      $_SESSION['email'] = $email;
      $_SESSION['bday'] = $dob;
//      echo "bday = ".$dob."<BR>";
//      echo "email = ".$email."<BR>";
//      print_r($_SESSION);
      header("Location: page2.php");
      //echo "<BR><BR>blue 42";
    }
  }
}

// Process page 2:
if($_POST['page2']){
  $_SESSION['page2'] = $_POST['page2'];
  if(!empty($_POST['course_load'])){
    $courseLoad = $_POST['course_load'];
  } elseif($error = ''){
    $error = "Please select your course load.";
  }
  
  if(!empty($_POST['program'])){
    $program = $_POST['program'];
  } elseif($error = ''){
    $error = "Please select your program of study.";
  }
  
  if(!empty($_POST['incoming_status'])){
    $enrollmentStatus = $_POST['incoming_status'];
  } elseif($error = ''){
    $error = "Please select enrollment status.";
  }
  
  if(!empty($_POST['intended_study'])){
    $intendedStudy = $_POST['intended_study'];
  }
  
  switch ($_POST['intended_study']){
    case 'associates':
      switch ($_POST['Amajor']){
        case 'gen_studies':
          $major = 'gen_studies';
        break;
        case 'preach_min':
          $major = 'preach_min';
        break;
        case 'inter_urban_missions':
          $major = 'inter_urban_missions';
        break;
        case 'aim_bib_studies':
          $major = 'aim_bib_studies';
        break;
        case 'undecided':
           $major = 'undecided';
        break;
      }
    break;
    case 'bachelors':
      switch($_POST['Bmajor']){
        case 'child_min':
          $major = 'child_min';
        break;
        case 'stu_min':
          $major = 'stu_min';
        break;
        case 'preach_min':
          $major = 'preach_min';
        break;
        case 'int_urban_missions':
          $major = 'int_urban_missions';
        break;
        case 'christian_min':
          $major = 'christian_min';
        break;
        case 'music_worsh_min':
          $major = 'music_worsh_min';
        break;
        case 'dis_inv_min':
          $major = 'dis_inv_min';
        break;
        case 'behav_min':
          $major = 'behav_min';
        break;
        case 'aim_christian_min':
          $major = 'aim_christian_min';
        break;
        case 'undecided':
          $major = 'undecided';
        break;
      }
    break;
    case 'certificate':
      switch($_POST['Cmajor']){
        case 'bib_know_aim':
          $major = 'bib_know_aim';
        break;
        case 'church_leaders_aim':
          $major = 'church_leaders_aim';
        break;
        case 'bib_min_day':
          $major = 'bib_min_day';
        break;
        case 'tesol':
          $major = 'tesol';
        break;
      }
    break;
  }
  
  if(!empty($_POST['educational_goals'])){
    $educationGoals = $_POST['educational_goals'];
  }
  
  if(!empty($_POST['current_church'])){
    $homeChurch = $_POST['current_church'];
  } elseif ($error == ''){
    $error = "Please enter the name of the congregation that you are currently attending.";
  }
  
  if(!empty($_POST['religion'])){
    $religion = $_POST['religion'];
  }
  
  if(!empty($_POST['housing'])){
    switch ($_POST['housing']){
      case 'yes':
        $housing = 'yes';
        switch ($_POST['housing_location']){
          case 'res_hall':
            $resHall = 'res_hall';
          break;
          case 'married_apt':
            $resHall = 'married_apt';
          break;
        }
      break;
      case 'no':
        $housing = 'no';
        $resHall = 'none';
      break;
    }
  }
  
  if(!empty($_POST['fed_fin_aid'])){
    $fedAid = $_POST['fed_fin_aid'];
  }
  
  if(!empty($_POST['vet_ben'])){
    $vetBen = $_POST['vet_ben'];
  }
  
  // Code below added or edited by Elliot //
  if(!empty($_POST['last_date'])){
    $lastDate = $_POST['last_date'];
  }
  
    if(!empty($_POST['wed_month'])){
    $wed = $_POST['wed_month']."/";
  }
  
  if(!empty($_POST['wed_day'])){
    $wed .= $_POST['wed_day']."/";
  }
  
  if(!empty($_POST['wed_year'])){
    $wed .= $_POST['wed_year'];
  }
  
  if(!empty($_POST['family_relocation'])){
    $familyRelocation = $_POST['family_relocation'];
  }
  
  if(!empty($_POST['engaged_state'])){
    $engagedState = $_POST['engaged_state'];
  }
  
    if(!empty($_POST['church_month_attend'])){
    $churchMonthAttend = $_POST['church_month_attend'];
  } elseif ($error == ''){
    $error = "Please tell us how often you attend church services.";
  }
  
  if(!empty($_POST['church_attend_length'])){
    $churchAttendLength = $_POST['church_attend_length'];
  }
  // Code above added or edited by Elliot //
  
  if($error == ''){
    $_SESSION['page2'] = 'page2done';
    $bday = $_SESSION['bday'];
    $email = $_SESSION['email'];
    $query = "UPDATE application
              SET courseLoad = '$courseLoad', program = '$program', incomingStatus = '$enrollmentStatus', intendedStudy = '$intendedStudy', major = '$major', educationalGoals = '$educationGoals', currentChurch = '$homeChurch', religion = '$religion', housing = '$housing', financialAid = '$fedAid', veteransBenifits = '$vetBen', wedding = '$wed', churchMonthAttend = '$churchMonthAttend', churchAttendLength = '$churchAttendLength', familyRelocation = '$familyRelocation', engagedState = '$engagedState', lastDate = '$lastDate', resHall = '$resHall'
              WHERE birthday = '$bday' AND email = '$email'";
    connectDB();
    mysql_query($query);
    if(mysql_error()){
      $alert = "There was a problem processing your information please contact webmaster@slcconline.edu, and check back later.";
    } else {
      header("Location:page3.php");
    }
  }
}

// Process page 3:
if(!empty($_POST['page3'])){
  $error = '';

  if(!empty($_POST['citizenship'])){
    $citCountry = $_POST['citizenship'];
  }
  
  if(!empty($_POST['primary_language'])){
    $primLang = $_POST['primary_language'];
  }
  
  if(!empty($_POST['first_hear_about_slcc'])){
    $firstHeard = $_POST['first_hear_about_slcc'];
  }
  
  if(!empty($_POST['family_attend_slcc'])){
    $family = $_POST['family_attend_slcc'];
  }

  if(!empty($_POST['suspended_from_another_institution'])){
    $suspended = $_POST['suspended_from_another_institution'];
  } elseif($error == ''){
    $error = "Please tell us if you have been suspended before.";
  }
  
  if(!empty($_POST['convicted_of_crime'])){
    $crime = $_POST['convicted_of_crime'];
  } elseif($error == ''){
    $error = "Please tell us if you have been convicted of a crime.";
  }
  
  if(!empty($_POST['contact_church_ref_permission'])){
    $reference = $_POST['contact_church_ref_permission'];
  } elseif($error == ''){
    $error = "Please let us know if it is alright to contact your church refference.";
  }
  
  // Code below added or edited by Elliot
  if(!empty($_POST['learning_disability'])){
    $learningDisability = $_POST['learning_disability'];
  }
  
  if(!empty($_POST['learning_disability_diag'])){
    $learningDisabilityDiagnosis = $_POST['learning_disability_diag'];
  }
  
  if(!empty($_POST['map'])){
    $map = $_POST['map'];
  } elseif($error == ''){
    $error = "Please accept the MAP program terms.";
  }
  
  if(!empty($_POST['interested_basketball'])){
    $interestedBasketball = $_POST['interested_basketball'];
  }
  if(!empty($_POST['interested_baseball'])){
    $interestedBaseball = $_POST['interested_baseball'];
  }
  if(!empty($_POST['interested_volleyball'])){
    $interestedVolleyball = $_POST['interested_volleyball'];
  }
  if(!empty($_POST['interested_soccer'])){
    $interestedSoccer = $_POST['interested_soccer'];
  }
  if(!empty($_POST['interested_xcountry'])){
    $interestedXcountry = $_POST['interested_xcountry'];
  }
  
  if(!empty($_POST['amer_ind_alask_native'])){
    $ethnicityIndian = $_POST['amer_ind_alask_native'];
  }
  if(!empty($_POST['asian_pacific_islander'])){
    $ethnicityAsian = $_POST['asian_pacific_islander'];
  }
  if(!empty($_POST['caucasian'])){
    $ethnicityCaucasian = $_POST['caucasian'];
  }
  if(!empty($_POST['black_african_amer'])){
    $ethnicityBlack = $_POST['black_african_amer'];
  }
  if(!empty($_POST['hispanic'])){
    $ethnicityHispanic = $_POST['hispanic'];
  }
  if(!empty($_POST['other'])){
    $ethnicityOther = $_POST['other'];
  }  
  
  if(!empty($_POST['family_attend_slcc_relate'])){
    $familyRelationship = $_POST['family_attend_slcc_relate'];
  }
  
  if(!empty($_POST['secondary_language'])){
    $secondaryLanguage = $_POST['secondary_language'];
  }
  // Code above added or edited by Elliot
  
  if($error == ''){
    $_SESSION['page3'] = 'page3done';
    $bday = $_SESSION['bday'];
    $email = $_SESSION['email'];
    $query = "UPDATE application
              SET citizenship = '$citCountry', primaryLanguage = '$primLang', firstHeard = '$firstHeard', family = '$family', abideLifestyle = '$abide', suspended = '$suspended', convictedCrime = '$crime', contactRef = '$reference', map = '$map', familyRelationship = '$familyRelationship', secondaryLanguage = '$secondaryLanguage', learningDisability = '$learningDisability', learningDisabilityDiagnosis = '$learningDisabilityDiagnosis', interestedBasketball = '$interestedBasketball', interestedBaseball = '$interestedBaseball', interestedVolleyball = '$interestedVolleyball', interestedSoccer = '$interestedSoccer', interestedXcountry = '$interestedXcountry', ethnicityIndian = '$ethnicityIndian', ethnicityAsian = '$ethnicityAsian', ethnicityCaucasian = '$ethnicityCaucasian', ethnicityBlack = '$ethnicityBlack', ethnicityHispanic = '$ethnicityHispanic', ethnicityOther = '$ethnicityOther'
              WHERE birthday = '$bday' and email = '$email'";
    connectDB();
    mysql_query($query);
    if(mysql_error()){
      echo mysql_error();
      $alert = "There was a problem processing your information please contact webmaster@slcconline.edu, and check back later.";
    } else {
      header("Location:page4.php");
    }
  }
}

// Process page 4:
if(!empty($_POST['page4'])){
 
  // Code below added or edited by Elliot
  if(!empty($_POST['spiritual_journey'])){
    $spiritualJourney = addslashes($_POST['spiritual_journey']);
  } elseif($error == ''){
    $error = "Please tell us about your spiritual journey.";
  }
  
  if(!empty($_POST['mission_core'])){
    $coreValues = addslashes($_POST['mission_core']);
  } elseif($error == ''){
    $error = "Please tell us how you relate to the college's mission and core values.";
  }
  
  if(!empty($_POST['reach_goals'])){
    $reachGoals = addslashes($_POST['reach_goals']);
  } elseif($error == ''){
    $error = "Please tell us about your educational goals.";
  }
  
  if(!empty($_POST['abide_lifestyle_expectations'])){
    $abideLifestyle = $_POST['abide_lifestyle_expectations'];
  } elseif($error == ''){
    $error = "Please agree to SLCC's lifestyle expectations.";
  }
  
  if(!empty($_POST['disciplinary_action'])){
    $abideDiscipline = $_POST['disciplinary_action'];
  } elseif($error == ''){
    $error = "Please understand that any violation of the lifestyle expactations may result in disciplinary action";
  }
  // Code above added or edited by Elliot

  if($error == ''){
    $bday = $_SESSION['bday'];
    $email = $_SESSION['email'];
    $query = "UPDATE application
              SET spiritualJourney = '$spiritualJourney', coreValues = '$coreValues', reachGoals = '$reachGoals', abideLifestyle = '$abideLifestyle', abideDiscipline = '$abideDiscipline'
              WHERE birthday = '$bday' AND email = '$email'";
    connectDB();
    mysql_query($query);
    if(mysql_error()){
      echo mysql_error();
      $alert = "There was a problem processing your information please contact webmaster@slcconline.edu, and check back later.";
    } else {
      $query = "SELECT * from application where birthday = '$bday' AND email = '$email'";
	  $message = "Thank you for submitting your application to Saint Louis Christian College. We are so excited that you have chosen SLCC as one of your college choices. We truly believe in the importance of a Christ centered education. We will soon begin processing your application and will be in contact with you to discuss the additional paperwork needed in order to complete your admissions file. If you have any questions in the meantime please do not hesitate to contact our office at 314.837.6777 x 8110. We hope to talk with you soon.<br><br><br>Larry Osborn<br>Director of Admissions<br>Saint Louis Christian College<br>314-837-6777 x 1303<br>314-837-8291 fax";
      $results = mysql_query($query);
      while($dummy = mysql_fetch_assoc($results)){
        if(!empty($dummy)){
          $appInfo = $dummy;
        }
      }
      $body = '<b>An applicant with the following information has applied:</b> <br><BR>';
      foreach($appInfo as $field=>$value){
        $body .= $field.' : '.$value.',&nbsp;<br>';
      }
      mail('apply@slcconline.edu','A new application from slcc',$body,'FROM:donotreply@slcconline.edu'."\r\n".'Content-type: text/html; charset=iso-8859-1');
	  mail($email,'Thanks for Applying',$message,'FROM:admissions@slcconline.edu'."\r\n".'Content-type: text/html; charset=iso-8859-1');
      header("Location:thankyou.php");
    }
  }
}

?>


