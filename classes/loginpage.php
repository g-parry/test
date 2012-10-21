<?php
include_once(getabspath('classes/runnerpage.php'));

/**
 * Class for login page 
 *
 */
class LoginPage extends RunnerPage 
{
	var $auditObj = null;

	var $fromFacebook = false;
	var $ldap_domainName = null;
	var $ldap_serverIP = null;
	var $message = "";
	
	function LoginPage(&$params) 
	{
		// call parent constructor
		parent::RunnerPage($params);
		
		$this->auditObj = GetAuditObject();
	}
	
		
	/**
	* Login method
	*
	*/
	function LogIn($pUsername,$pPassword){
				//  username and password are stored in the database
		global $conn, $cUserNameFieldType, $cPasswordFieldType, $cUserNameField, $cPasswordField, $cDisplayNameField;
		$logged = false;
		$strUsername = (string)$pUsername;
		$strPassword = (string)$pPassword;
			$sUsername = $strUsername;
		$sPassword = $strPassword;
			
		if(NeedQuotes($cUserNameFieldType))
			$strUsername = db_prepare_string($strUsername);
		else
			$strUsername = (0+$strUsername);
			
		if(NeedQuotes($cPasswordFieldType))
			$strPassword = db_prepare_string($strPassword);
		else
			$strPassword = (0+$strPassword);
			
		$strSQL = "select * from ".AddTableWrappers("users")." where ".AddFieldWrappers($cUserNameField).
			   "=".$strUsername." and ".AddFieldWrappers($cPasswordField).
			   "=".$strPassword;
			$rs = db_query($strSQL,$conn);
	 	$data = db_fetch_array($rs);
		if($data){
			if($this->pSet->getCaseInsensitiveUsername(@$data[$cUserNameField])==$this->pSet->getCaseInsensitiveUsername($sUsername) && @$data[$cPasswordField]==$sPassword){
				$logged=true;
				$pDisplayUsername = $data[$cDisplayNameField]!='' ? $data[$cDisplayNameField] : $sUsername;
			}
		}

		if($logged && $this->isCaptchaOk)
		{
			DoLogin(false, $pUsername, $pDisplayUsername, "", ACCESS_LEVEL_USER, $pPassword);
			SetAuthSessionData($pUsername, $data, $this->fromFacebook, $pPassword);
			return true;
		}
		else {
			if($this->auditObj)
			{
				$this->auditObj->LogLoginFailed($pUsername);
				$this->auditObj->LoginUnsuccessful($pUsername);
			}
			return false;
		}
	
	}
	
	/**
	 * Logout
	 *
	 */
	function Logout(){
		if($this->auditObj)
			$this->auditObj->LogLogout();

		session_unset();
		setcookie("username","",time()-365*1440*60);
		setcookie("password","",time()-365*1440*60);
				header("Location: login.php");
		exit();
	}
	
	

}

?>