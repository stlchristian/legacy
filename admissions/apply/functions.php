<?php
function finishQuick($varName){
  $error = '';
  if($_POST[$varName]){
    $$varName = $_POST[$varName];
    return $$varName;
  } else{
    $error = "Please select your".$varName;
    return $error;
  }
}

?>
