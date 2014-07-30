<?php
$ip = '';
if (isset($_SERVER["REMOTE_ADDR"])) {
  $ip = $_SERVER["REMOTE_ADDR"];
} else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
  $ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (!empty($ip)) {
  $country = geoip_country_code_by_name($ip);
  if ($country) {
    echo 'This host is located in: ' . $country;
  } else {
  echo 'Sorry, this IP address is not in the database';
  }
}
?>
