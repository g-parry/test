<?php
/**
 * Class for display admin_rights_list  
 *
 */
class RunnerLdap
{
	var $ldap_domainName = '';
	
	var $ldap_serverIP = null;
	
	var $ldapconn = null;
	
	var $ldapbind = null;
	
	function RunnerLdap($aDomainName,$aServerIP){
		$this->ldap_domainName = $aDomainName;
		$this->ldap_serverIP = $aServerIP;
	}
	
	function runner_ldap_connect($aUsername,$aPassword){
		// connect to ldap server
		$this->ldapconn = ldap_connect("ldap://".$this->ldap_serverIP);
		if (!$this->ldapconn || ldap_errno($this->ldapconn)!=0)
			return false;
		@ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($this->ldapconn, LDAP_OPT_REFERRALS, 0);
		// binding to ldap server
		$this->ldapbind = @ldap_bind($this->ldapconn, $aUsername."@".$this->ldap_domainName, $aPassword);
		if(!$this->ldapbind)
			return false;
		return true;
	}
	
	/**
	* Search LDAP tree
	* @ An LDAP link identifier, returned by ldap_connect()
	* @ string The search filter 
	* @ array An array of the required attributes
	*/
	function runner_ldap_getData($filter,$attributes=array()){
		$ldap_dn = $this->ldap_DomainToDN($this->ldap_domainName);
		if (sizeof($attributes)) {
			$query = ldap_search($this->ldapconn, $ldap_dn, $filter);
		}else {
			$query = ldap_search($this->ldapconn, $ldap_dn, $filter, $attributes);
		}
		// Read all results from search
		$entries = ldap_get_entries($this->ldapconn, $query);
		return $this->runner_convert_entries($entries);
		//return $entries;
	}
	
	function runner_convert_entries($aData){
		
		$resultArr = array();
		if (!sizeof($aData)) {
			return null;
		}

		for ($j=0;$j<$aData['count'];$j++){
			$result = array();
			foreach ($aData[$j] as $key=>$val){
				if (is_numeric($key))
					continue;
				if ($val["count"] > 1 || $key == 'memberof'){
					//set array
					$tmpResult = array();
					for ($i=0;$i<$val['count'];$i++){
						$tmpResult[] = $val[$i];
					}
					$result[$key] = $tmpResult;
				}
				else if ($key=='dn'){
					$result[$key] = $val;
				}
				else {
					$result[$key] = $val[0];
				}
			}
			$resultArr[] = $result;
		}
		
		return $resultArr;
	}
	
	/*
	* Convert domain name test.xlinesoft.com
	* return DC=test,DC=xlinesoft,DC=com
	*/
	function ldap_DomainToDN($aDomain){
		$arrDomain = explode(".",$aDomain);
		for ($i=0;$i<sizeof($arrDomain);$i++){
			$arrDomain[$i] = "dc=".$arrDomain[$i];
		}
		return implode(',',$arrDomain);
	}
	
	function runner_ldap_unbind(){
		ldap_unbind($this->ldapconn);
	}
	function ldap_error(){
		return ldap_err2str(ldap_errno($this->ldapconn));
	}
	//function for Active Directory
	/*
	* This function retrieves and returns CN from given DN
	* $dn = CN=Users,CN=Builtin,DC=test,DC=xlinesoft,DC=com
	* return Users
	*/
	function ldap_getCN($dn) {
		preg_match('/[^,]*/', $dn, $matchs, PREG_OFFSET_CAPTURE, 3);
		return $matchs[0][0];
	}
		
	/*
	* This function searchs in LDAP tree ($ad -LDAP link identifier)
	* entry specified by samaccountname and returns its DN or epmty
	* string on failure.
	* $samaccountname = Users
	* $basedn = DC=test,DC=xlinesoft,DC=com
	* return CN=Users,CN=Builtin,DC=test,DC=xlinesoft,DC=com
	*/
	function ldap_getDN($ad, $samaccountname, $basedn) {
		$attributes = array('dn');
		$result = ldap_search($ad, $basedn,
			"(samaccountname={$samaccountname})", $attributes);
		if ($result === FALSE) { return ''; }
		$entries = ldap_get_entries($ad, $result);
		if ($entries['count']>0) { return $entries[0]['dn']; }
		else { return ''; };
	}
	
	function getGroupSid($userSid, $primaryGroupId)
	{
		$tgroup = bin2hex(substr($userSid,0, strlen($userSid)-4));
		$group="";
		for($i = 0; $i<strlen($tgroup); $i += 2)
		{
			$group .= '\\'.substr($tgroup,$i,2);
		}
		$group .= sprintf("\\%02x",$primaryGroupId & 255);
		$group .= sprintf("\\%02x",($primaryGroupId >>8) & 255);
		$group .= sprintf("\\%02x",($primaryGroupId >>16) & 255);
		$group .= sprintf("\\%02x",($primaryGroupId >>24) & 255);
		return $group;
	}
}