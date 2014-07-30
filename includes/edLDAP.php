<?php
$server = '10.10.1.2';
$dn = 'cn=web,ou=special,ou=users,o=slcc';
$pw = '20slcc08';
$searchstring="(cn=".$username.")";
$attnames=array("dn","cn");
$locations=array("ou=users,o=slcc","ou=students,o=slcc");
$error=0;
if ($ds=ldap_connect($server)){
	// must be a valid LDAP server!
	if ($r=ldap_bind($ds,$dn,$pw)){
		$found=0;
		foreach ($locations as $location){
			if ($found==0 && $error!=1){
				if ($r=ldap_search($ds,$location,$searchstring)){
					$entries=ldap_get_entries($ds,$r);
					if (is_array($entries)){
						foreach ($entries as $entry){
							if ($entry['cn'][0]==$username){
								$dn2=$entry['dn'];
								$pw2=$password;
								if ($bind = @ldap_bind($ds,$dn2,$pw2)){
									$iGroup=0;
									foreach($entry['groupmembership'] as $group){
											$exp1=explode(",",$group);
											if (count($exp1)>1){
												$exp2=explode("=",$exp1[0]);
												$groups[$iGroup]=$exp2[1];
											}
											$iGroup++;
									}
									$dn2_exp=explode(",",$dn2);
									$ouExplode=explode("=",$dn2_exp[1]);
									$parentOU=$ouExplode[1];
									$groups[$iGroup]="Domain Users";
									$login=1;
								}
								else $failed=1;
								$found=1;
							}
						}
					}
				}
				else $error=1;
			}
		}
	}
	else $error=1;
}
else $error=1;
?>