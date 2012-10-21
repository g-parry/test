<?php
$dDebug = false;
$dSQL = "";

$bSubqueriesSupported=true;

$tables_data = array();
$page_layouts = array();
$field_labels = array();
$fieldToolTips = array();

include(getabspath('classes/layout.php'));

//	custom labels
$custom_labels = array();
$custom_labels["English"] = array();

/**
 *  Define constants of page name 
 */
define('PAGE_LIST',"list");
define('PAGE_ADD',"add");
define('PAGE_EDIT',"edit");
define('PAGE_VIEW',"view");
define('PAGE_MENU',"menu");
define('PAGE_LOGIN',"login");
define('PAGE_REGISTER',"register");
define('PAGE_REMIND',"remind");
define('PAGE_CHANGEPASS',"changepwd");
define('PAGE_SEARCH',"search");
define('PAGE_REPORT',"report");
define('PAGE_CHART',"chart");
define('PAGE_PRINT',"print");
define('PAGE_RPRINT',"rprint");
define('PAGE_EXPORT',"export");
define('PAGE_IMPORT',"import");
define('PAGE_ADMIN_MEMBERS',"admin_members");
define('PAGE_ADMIN_RIGHTS',"admin_rights");

define('FORMAT_VIEW',"ViewFormats");
define('FORMAT_EDIT',"EditFormats");
/**
 *  Define constants of view format
 */
define("FORMAT_NONE","");
define("FORMAT_DATE_SHORT","Short Date");
define("FORMAT_DATE_LONG","Long Date");
define("FORMAT_DATE_TIME","Datetime");
define("FORMAT_TIME","Time");
define("FORMAT_CURRENCY","Currency");
define("FORMAT_PERCENT","Percent");
define("FORMAT_HYPERLINK","Hyperlink");
define("FORMAT_EMAILHYPERLINK","Email Hyperlink");
define("FORMAT_FILE_IMAGE","File-based Image");
define("FORMAT_DATABASE_IMAGE","Database Image");
define("FORMAT_DATABASE_FILE","Database File");
define("FORMAT_FILE","Document Download");
define("FORMAT_LOOKUP_WIZARD","Lookup wizard");
define("FORMAT_PHONE_NUMBER","Phone Number");
define("FORMAT_NUMBER","Number");
define("FORMAT_HTML","HTML");
define("FORMAT_CHECKBOX","Checkbox");
define("FORMAT_MAP","Map");
define("FORMAT_CUSTOM","Custom");
define("FORMAT_AUDIO", "Audio file");
define("FORMAT_DATABASE_AUDIO", "Database audio");
define("FORMAT_VIDEO", "Video file");
define("FORMAT_DATABASE_VIDEO", "Database video");
/**
 *  Define constants of edit format
 */
define("EDIT_FORMAT_NONE","");
define("EDIT_FORMAT_TEXT_FIELD","Text field");
define("EDIT_FORMAT_TEXT_AREA","Text area");
define("EDIT_FORMAT_PASSWORD","Password");
define("EDIT_FORMAT_DATE","Date");
define("EDIT_FORMAT_TIME","Time");
define("EDIT_FORMAT_RADIO","Radio button");
define("EDIT_FORMAT_CHECKBOX","Checkbox");
define("EDIT_FORMAT_DATABASE_IMAGE","Database image");
define("EDIT_FORMAT_DATABASE_FILE","Database file");
define("EDIT_FORMAT_FILE","Document upload");
define("EDIT_FORMAT_LOOKUP_WIZARD","Lookup wizard");
define("EDIT_FORMAT_HIDDEN","Hidden field");
define("EDIT_FORMAT_READONLY","Readonly");

define("EDIT_DATE_SIMPLE",0);
define("EDIT_DATE_SIMPLE_DP",11);
define("EDIT_DATE_DD",12);
define("EDIT_DATE_DD_DP",13);

define("MODE_ADD",0);
define("MODE_EDIT",1);
define("MODE_SEARCH",2);
define("MODE_LIST",3);
define("MODE_PRINT",4);
define("MODE_VIEW",5);
define("MODE_INLINE_ADD",6);
define("MODE_INLINE_EDIT",7);
define("MODE_EXPORT",8);

define("LOGIN_HARDCODED",0);
define("LOGIN_TABLE",1);

define("SECURITY_NONE",-1);
define("SECURITY_HARDCODED", 0);
define("SECURITY_TABLE", 1);

define("ADVSECURITY_ALL",0);
define("ADVSECURITY_VIEW_OWN",1);
define("ADVSECURITY_EDIT_OWN",2);
define("ADVSECURITY_NONE",3);

define("ACCESS_LEVEL_ADMIN","Admin");
define("ACCESS_LEVEL_ADMINGROUP","AdminGroup");
define("ACCESS_LEVEL_USER","User");
define("ACCESS_LEVEL_GUEST","Guest");

define("nDATABASE_MySQL",0);
define("nDATABASE_Oracle",1);
define("nDATABASE_MSSQLServer",2);
define("nDATABASE_Access",3);
define("nDATABASE_PostgreSQL",4);
define("nDATABASE_Informix",5);
define("nDATABASE_SQLite3",6);
define("nDATABASE_DB2",7);

define("ADD_SIMPLE",0);
define("ADD_INLINE",1);
define("ADD_ONTHEFLY",2);
define("ADD_MASTER",3);
define("ADD_POPUP",4);

define("EDIT_SIMPLE",0);
define("EDIT_INLINE",1);
define("EDIT_ONTHEFLY",2);
define("EDIT_POPUP",3);

define("titTABLE",0);
define("titVIEW",1);
define("titREPORT",2);
define("titCHART",3);

// for report lib
define("REPORT_STEPPED", 0);
define("REPORT_BLOCK", 1);
define("REPORT_OUTLINE", 2);
define("REPORT_ALIGN", 3);
define("REPORT_TABULAR", 6);

define("TOTAL_NONE", -1);
define("TOTAL_MAX", 0);
define("TOTAL_AVG", 1);
define("TOTAL_SUM", 3);
define("TOTAL_MIN", 4);

define("LIST_SIMPLE",0);
define("LIST_LOOKUP",1);
define("LIST_DETAILS",3);
define("LIST_AJAX",4);
define("RIGHTS_PAGE", 5);
define("MEMBERS_PAGE", 6);

define("DP_POPUP",0);
define("DP_INLINE",1);
define("DP_NONE",2);

define("SEARCH_SIMPLE",0);
define("SEARCH_LOAD_CONTROL",1);

define("LCT_DROPDOWN",0);
define("LCT_AJAX",1);
define("LCT_LIST",2);
define("LCT_CBLIST",3);

define("LT_LISTOFVALUES",0);
define("LT_LOOKUPTABLE",1);
define("LT_QUERY", 2);

define("ENCRYPTION_NONE", 0);
define("ENCRYPTION_DB", 1);
define("ENCRYPTION_PHP", 2);

$globalSettings = array();
$globalSettings["nLoginMethod"] = 1;
$globalSettings["dbType"] = 0;


$globalSettings["isDynamicPerm"] = true;



$globalSettings["createLoginPage"] = true;
$globalSettings["isUseEncryption"] = 0;
$globalSettings["encryptionKey"] = "";

$globalSettings["apiGoogleMapsCode"] = "";


$wr_is_standalone = false;
$WRAdminPagePassword = "";

$strLeftWrapper = "`";
$strRightWrapper = "`";

$cLoginTable = "users";
$cDisplayNameField = "Name";
$cUserNameField	= "email";
$cPasswordField	= "password";
$cUserGroupField = "email";
$cEmailField = "";

if ($cDisplayNameField == ''){
	$cDisplayNameField = $cUserNameField;
}

$cDisplayNameFieldType	= 200;
$cUserNameFieldType	= 200;
$cPasswordFieldType	= 200;
$cEmailFieldType = 200;

						
						
		$cUserNameFieldType	= 200;
				
				$cPasswordFieldType	= 200;
		
$gPermissionsRefreshTime = 0;
$gPermissionsRead = false;

$nDBType = 0;

$useAJAX = true;
$suggestAllContent = true;

$strLastSQL = "";

$includes_js = array();
$includes_jsreq = array();
$includes_css = array();

$mlang_messages = array();
$mlang_charsets = array();

// table captions
$tableCaptions = array();
$tableCaptions["English"] = array();
$tableCaptions["English"]["ISHA_Exemptions"] = "ISHA Exemptions";
$tableCaptions["English"]["NEW_Exemptions"] = "NEW Exemptions";
$tableCaptions["English"]["Burdett_Exemptions"] = "Burdett Exemptions";
$tableCaptions["English"]["Abbott_North"] = "Abbott North";
$tableCaptions["English"]["Bethnal_Green"] = "Bethnal Green";
$tableCaptions["English"]["Bow_Bridge"] = "Bow Bridge";
$tableCaptions["English"]["Brownfield"] = "Brownfield";
$tableCaptions["English"]["East_End"] = "East End";
$tableCaptions["English"]["Glamis_Estate"] = "Glamis Estate";
$tableCaptions["English"]["Island_Homes"] = "Island Homes";
$tableCaptions["English"]["Lansbury"] = "Lansbury";
$tableCaptions["English"]["Lansbury_West"] = "Lansbury West";
$tableCaptions["English"]["Leopold"] = "Leopold";
$tableCaptions["English"]["OFHA"] = "OFHA";
$tableCaptions["English"]["Shadwell"] = "Shadwell";
$tableCaptions["English"]["Spitalfields"] = "Spitalfields";
$tableCaptions["English"]["admin_rights"] = "Admin Rights";
$tableCaptions["English"]["ishaugrights"] = "Ishaugrights";
$tableCaptions["English"]["admin_members"] = "Admin Members";
$tableCaptions["English"]["users"] = "Users";
$tableCaptions["English"]["admin_users"] = "Add/Edit users";
$tableCaptions["English"]["isha_audit"] = "Isha Audit";
$tableCaptions["English"]["Wessex_Homes"] = "Wessex Homes";
$tableCaptions["English"]["Octavia_Housing"] = "Octavia Housing";
$tableCaptions["English"]["West_London_Mental_Health"] = "West London Mental Health";
$tableCaptions["English"]["Abbott_South"] = "Abbott South";
$tableCaptions["English"]["isha_streets"] = "Isha Streets";
$tableCaptions["English"]["Demo_Contract"] = "Demo Contract";
$tableCaptions["English"]["Devons"] = "Devons";
$tableCaptions["English"]["Vehicle_in_Abbott_North"] = "Vehicle in Abbott North";
$tableCaptions["English"]["Ticket_Octavia"] = "Ticket Octavia";
$tableCaptions["English"]["Ticket_Demo_Site"] = "Ticket Demo Site";
$tableCaptions["English"]["elite"] = "Elite";
$tableCaptions["English"]["exemptions"] = "Exemptions";
$tableCaptions["English"]["Request_Visit_WLMH"] = "Request Visit WLMH";

$globalEvents = new class_GlobalEvents;
$tableEvents = array();

$mlang_defaultlang = "English";


$conn = db_connect();
if(!isLogged())
{
	$allowGuest = guestHasPermissions();
	$scriptname = getFileNameFromURL();
	if($allowGuest && $scriptname!="login.php" && $scriptname!="remind.php" && $scriptname!="register.php" && $scriptname!="registersuggest.php")
	{
		DoLogin(true);
	}
}

$isGroupSecurity = true;

$isUseRTEBasic = true;

$isUseRTECK = false;

$isUseRTEInnova = false;

$caseInsensitiveUsername = false;

include(getabspath('classes/projectsettings.php'));


?>