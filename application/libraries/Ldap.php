<?php
  
/**
* 
*/
class Ldap 
{
  
  /*
* This function searchs in LDAP tree ($ad -LDAP link identifier)
* entry specified by samaccountname and returns its DN or epmty
* string on failure.
*/
// function getDN($ad, $samaccountname, $basedn) {
//     $attributes = array('dn');
//     @$result = ldap_search($ad, $basedn,
//         "(samaccountname={$samaccountname})", $attributes);
//     if ($result === FALSE) { return ''; }
//     $entries = ldap_get_entries($ad, $result);
//     if ($entries['count']>0) { return $entries[0]['dn']; }
//     else { return ''; };
// }


function getDN($ad, $samaccountname, $basedn) {
    try{
        $attributes = array('dn');
        @$result = ldap_search($ad, $basedn,
            "(samaccountname={$samaccountname})", $attributes);
        if ($result === FALSE) { return ''; }
        $entries = ldap_get_entries($ad, $result);      
         return $entries[0]['dn'];   
        }catch (Exception $ex){
        
        return $ex;
        }
       
    }

/*
* This function retrieves and returns CN from given DN
*/
function getCN($dn) {
    preg_match('/[^,]*/', $dn, $matchs, PREG_OFFSET_CAPTURE, 3);
    return $matchs[0][0];
}

/*
* This function checks group membership of the user, searching only
* in specified group (not recursively).
*/
function checkGroup($ad, $userdn, $groupdn) {
    $attributes = array('members');
    $result = ldap_read($ad, $userdn, "(memberof={$groupdn})", $attributes);
    if ($result === FALSE) { return FALSE; };
    $entries = ldap_get_entries($ad, $result);
    return ($entries['count'] > 0);
}

/*
* This function checks group membership of the user, searching
* in specified group and groups which is its members (recursively).
*/
function checkGroupEx($ad, $userdn, $groupdn) {
    $attributes = array('memberof');
    $result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
    if ($result === FALSE) { return FALSE; };
    $entries = ldap_get_entries($ad, $result);
    if ($entries['count'] <= 0) { return FALSE; };
    if (empty($entries[0]['memberof'])) { return FALSE; } else {
        for ($i = 0; $i < $entries[0]['memberof']['count']; $i++) {
            if ($entries[0]['memberof'][$i] == $groupdn) { return TRUE; }
            elseif (checkGroupEx($ad, $entries[0]['memberof'][$i], $groupdn)) { return TRUE; };
        };
    };
    return FALSE;
}

	
	
	
	
	
//This is used by the isUserBelongToGroup function below 	
function explode_dn($dn, $with_attributes=0)
{
    $result = ldap_explode_dn($dn, $with_attributes);
    foreach($result as $key => $value) $result[$key] = preg_replace("/\\\([0-9A-Fa-f]{2})/e", "''.chr(hexdec('\\1')).''", $value);
    return $result;
}





//CHECK IF THE USER BELONGS TO THE SPECIFIED MAIL GROUP.

//Note $user and $password are the credentials that the script will use to authenticate to the AD to perform the search, while $userToSearch is the user email to check if it belongs to the group $groupToSearchIn
	
 function isUserBelongToGroup($userToSearch, $groupToSearchIn,$user,$password) {
    
	
	$host = "ojtsrv02.mtn.com.ng";
    $ldap_dn = "dc=mtn,dc=com, dc=ng";
    $base_dn = "dc=mtn,dc=com, dc=ng";
    $ldap_usr_dom = "@mtn.com.ng";
    $ldap = ldap_connect($host);
	
	
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION,3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS,0);

    ldap_bind($ldap, $user . $ldap_usr_dom, $password);
	
    $results = ldap_search($ldap,$ldap_dn, "cn=" . $groupToSearchIn) or die(ldap_error($ldap));
    $member_list = ldap_get_entries($ldap, $results);
	

    $dirty = 0;
    $group_member_details = array();

    foreach($member_list[0]['member'] as $member) {
        if($dirty == 0) {
            $dirty = 1;
        } else {
            $member_dn = explode_dn($member);
            $member_cn = str_replace("CN=","",$member_dn[0]);
            $member_search = ldap_search($ldap, $base_dn, "(CN=" . $member_cn . ")");
            $member_details = ldap_get_entries($ldap, $member_search);
            $group_member_details[] = array($member_details[0]['givenname'][0],$member_details[0]['sn'][0],$member_details[0]['mail'][0]);
        }
    }
    ldap_close($ldap);
    

foreach($group_member_details as $e)
{
	echo $e[2].", ";
	
	if ($e[2] == $userToSearch)
	{
		
	$ans = "yes";
	
	
	break;
	}
	else
	{
		$ans = "no";
		
		
	}

}


return $ans;
}



	
	
	
	
//PERFORM THE LDAP AUTHENTICATION	

function checkUserAuthentication($user, $pwd)
{	
$host = 'ojtsrv002.mtn.com.ng';        // AD host server name  (obtained from LDAP string)
$domain = 'mtn.com.ng';               // users domain (obtained from LDAP string)
$basedn = 'dc=mtn,dc=com, dc=ng';     // dc (obtained from LDAP string)
$group = 'mtn users';                  // AD top level group to search for users. ie OU (obtained from LDAP string)
$ldap_usr_dom = "@mtn.com.ng";
	
$ad = ldap_connect($host) or die ("could not connect to ldap");
//$ad = ldap_connect("ldap://{$host}.{$domain}") or die('Could not connect to LDAP server.'); 
ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);  
ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
$domainNew = 'mtn';    
$ldaprdn = $domainNew . "\\" . $user;
$bind = @ldap_bind($ad, $ldaprdn, $pwd);

//@ldap_bind($ad, "{$user}@{$domain}", $pwd);

$userdn = $this->getDN($ad, $user, $basedn);


ldap_unbind($ad);
//var_dump($userdn);
return $userdn;
}

//echo $userdn;
/*
if (checkGroupEx($ad, $userdn, getDN($ad, $group, $basedn))) {
//if (checkGroup($ad, $userdn, getDN($ad, $group, $basedn))) {
    echo "You're authorized as ".getCN($userdn);
} else {
    echo 'Authorization failed';
}
*/

		
}