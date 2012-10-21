<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/admin_rights_variables.php");


$gsqlHead="select `email` ";
$gsqlFrom="from `users`";
$gsqlWhereExpr="";
$gsqlTail="";
// $gstrSQL = "SELECT TableName,   GroupID,   AccessMask  FROM ishaugrights ";
$gstrSQL = $gQuery->gSQLWhere("");


if(!isLogged())
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!IsAdmin())
{
	echo "<p>"."You don't have permissions to access this table"." <a href=\"login.php\">"."Back to login page"."</a></p>";
	return;
}



if(isMobile()) {
$layout = new TLayout("ug_rights","FancyPink","MobilePink");
$layout->blocks["center"] = array();
$layout->containers["ugcontrols"] = array();

$layout->containers["ugcontrols"][] = array("name"=>"ugbuttons","block"=>"savebuttons_block","substyle"=>1);


$layout->skins["ugcontrols"] = "1";
$layout->blocks["center"][] = "ugcontrols";
$layout->containers["message"] = array();

$layout->containers["message"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->skins["message"] = "1";
$layout->blocks["center"][] = "message";
$layout->containers["grid"] = array();

$layout->containers["grid"][] = array("name"=>"ugrightsblock","block"=>"rights_block","substyle"=>1);


$layout->skins["grid"] = "grid";
$layout->blocks["center"][] = "grid";
$layout->containers["pagination"] = array();

$layout->containers["pagination"][] = array("name"=>"pagination","block"=>"pagination_block","substyle"=>1);


$layout->skins["pagination"] = "2";
$layout->blocks["center"][] = "pagination";$layout->blocks["left"] = array();
$layout->containers["left"] = array();


$layout->containers["left"][] = array("name"=>"loggedas","block"=>"security_block","substyle"=>1);


$layout->containers["left"][] = array("name"=>"vmenu","block"=>"menu_block","substyle"=>1);


$layout->skins["left"] = "menu";
$layout->blocks["left"][] = "left";
$layout->containers["uggroup"] = array();

$layout->containers["uggroup"][] = array("name"=>"ugrightsgroup","block"=>"","substyle"=>1);


$layout->skins["uggroup"] = "1";
$layout->blocks["left"][] = "uggroup";$layout->blocks["top"] = array();
$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["toplinks"] = "2";
$layout->blocks["top"][] = "toplinks";
$layout->containers["search"] = array();


$layout->containers["search"][] = array("name"=>"details_found","block"=>"details_block","substyle"=>1);


$layout->containers["search"][] = array("name"=>"page_of","block"=>"pages_block","substyle"=>1);


$layout->containers["search"][] = array("name"=>"recsperpage","block"=>"recordspp_block","substyle"=>1);


$layout->skins["search"] = "2";
$layout->blocks["top"][] = "search";$page_layouts["admin_rights_list"] = $layout;
} else {
$layout = new TLayout("ug_rights","FancyPink","MobilePink");
$layout->blocks["center"] = array();
$layout->containers["ugcontrols"] = array();

$layout->containers["ugcontrols"][] = array("name"=>"ugbuttons","block"=>"savebuttons_block","substyle"=>1);


$layout->skins["ugcontrols"] = "1";
$layout->blocks["center"][] = "ugcontrols";
$layout->containers["message"] = array();

$layout->containers["message"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->skins["message"] = "1";
$layout->blocks["center"][] = "message";
$layout->containers["grid"] = array();

$layout->containers["grid"][] = array("name"=>"ugrightsblock","block"=>"rights_block","substyle"=>1);


$layout->skins["grid"] = "grid";
$layout->blocks["center"][] = "grid";
$layout->containers["pagination"] = array();

$layout->containers["pagination"][] = array("name"=>"pagination","block"=>"pagination_block","substyle"=>1);


$layout->skins["pagination"] = "2";
$layout->blocks["center"][] = "pagination";$layout->blocks["left"] = array();
$layout->containers["left"] = array();


$layout->containers["left"][] = array("name"=>"loggedas","block"=>"security_block","substyle"=>1);


$layout->containers["left"][] = array("name"=>"vmenu","block"=>"menu_block","substyle"=>1);


$layout->skins["left"] = "menu";
$layout->blocks["left"][] = "left";
$layout->containers["uggroup"] = array();

$layout->containers["uggroup"][] = array("name"=>"ugrightsgroup","block"=>"","substyle"=>1);


$layout->skins["uggroup"] = "1";
$layout->blocks["left"][] = "uggroup";$layout->blocks["top"] = array();
$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["toplinks"] = "2";
$layout->blocks["top"][] = "toplinks";
$layout->containers["search"] = array();


$layout->containers["search"][] = array("name"=>"details_found","block"=>"details_block","substyle"=>1);


$layout->containers["search"][] = array("name"=>"page_of","block"=>"pages_block","substyle"=>1);


$layout->containers["search"][] = array("name"=>"recsperpage","block"=>"recordspp_block","substyle"=>1);


$layout->skins["search"] = "2";
$layout->blocks["top"][] = "search";$page_layouts["admin_rights_list"] = $layout;
}


include('include/xtempl.php');
include('classes/runnerpage.php');
include('classes/listpage.php');
include('classes/rightspage.php');

$xt = new Xtempl();

$options = array();
//array of params for classes
$options["pageType"] = PAGE_LIST;
$options["id"] = postvalue("id") ? postvalue("id") : 1;
$options["mode"] = RIGHTS_PAGE;
$options['xt'] = &$xt;
$nonAdminTablesRightsArr=array();
$nonAdminTablesArr=array();
$pageRights=array();
$nonAdminTablesArr[] = array("ISHA Exemptions","ISHA Exemptions");
$nonAdminTablesRightsArr["ISHA Exemptions"]=array();
$pageRights["ISHA Exemptions"]["add"]=true;
$pageRights["ISHA Exemptions"]["edit"]=false;
$pageRights["ISHA Exemptions"]["delete"]=false;
$pageRights["ISHA Exemptions"]["list"]=true;
$pageRights["ISHA Exemptions"]["export"]=true;
$pageRights["ISHA Exemptions"]["import"]=true;

$nonAdminTablesArr[] = array("NEW Exemptions","NEW Exemptions");
$nonAdminTablesRightsArr["NEW Exemptions"]=array();
$pageRights["NEW Exemptions"]["add"]=true;
$pageRights["NEW Exemptions"]["edit"]=false;
$pageRights["NEW Exemptions"]["delete"]=false;
$pageRights["NEW Exemptions"]["list"]=true;
$pageRights["NEW Exemptions"]["export"]=true;
$pageRights["NEW Exemptions"]["import"]=true;

$nonAdminTablesArr[] = array("Burdett Exemptions","Burdett Exemptions");
$nonAdminTablesRightsArr["Burdett Exemptions"]=array();
$pageRights["Burdett Exemptions"]["add"]=true;
$pageRights["Burdett Exemptions"]["edit"]=false;
$pageRights["Burdett Exemptions"]["delete"]=false;
$pageRights["Burdett Exemptions"]["list"]=true;
$pageRights["Burdett Exemptions"]["export"]=true;
$pageRights["Burdett Exemptions"]["import"]=true;

$nonAdminTablesArr[] = array("Abbott North","Abbott North");
$nonAdminTablesRightsArr["Abbott North"]=array();
$pageRights["Abbott North"]["add"]=true;
$pageRights["Abbott North"]["edit"]=false;
$pageRights["Abbott North"]["delete"]=false;
$pageRights["Abbott North"]["list"]=true;
$pageRights["Abbott North"]["export"]=true;
$pageRights["Abbott North"]["import"]=true;

$nonAdminTablesArr[] = array("Bethnal Green","Bethnal Green");
$nonAdminTablesRightsArr["Bethnal Green"]=array();
$pageRights["Bethnal Green"]["add"]=true;
$pageRights["Bethnal Green"]["edit"]=false;
$pageRights["Bethnal Green"]["delete"]=false;
$pageRights["Bethnal Green"]["list"]=true;
$pageRights["Bethnal Green"]["export"]=true;
$pageRights["Bethnal Green"]["import"]=true;

$nonAdminTablesArr[] = array("Bow Bridge","Bow Bridge");
$nonAdminTablesRightsArr["Bow Bridge"]=array();
$pageRights["Bow Bridge"]["add"]=true;
$pageRights["Bow Bridge"]["edit"]=false;
$pageRights["Bow Bridge"]["delete"]=false;
$pageRights["Bow Bridge"]["list"]=true;
$pageRights["Bow Bridge"]["export"]=true;
$pageRights["Bow Bridge"]["import"]=true;

$nonAdminTablesArr[] = array("Brownfield","Brownfield");
$nonAdminTablesRightsArr["Brownfield"]=array();
$pageRights["Brownfield"]["add"]=true;
$pageRights["Brownfield"]["edit"]=false;
$pageRights["Brownfield"]["delete"]=false;
$pageRights["Brownfield"]["list"]=true;
$pageRights["Brownfield"]["export"]=true;
$pageRights["Brownfield"]["import"]=true;

$nonAdminTablesArr[] = array("East End","East End");
$nonAdminTablesRightsArr["East End"]=array();
$pageRights["East End"]["add"]=true;
$pageRights["East End"]["edit"]=false;
$pageRights["East End"]["delete"]=false;
$pageRights["East End"]["list"]=true;
$pageRights["East End"]["export"]=true;
$pageRights["East End"]["import"]=true;

$nonAdminTablesArr[] = array("Glamis Estate","Glamis Estate");
$nonAdminTablesRightsArr["Glamis Estate"]=array();
$pageRights["Glamis Estate"]["add"]=true;
$pageRights["Glamis Estate"]["edit"]=false;
$pageRights["Glamis Estate"]["delete"]=false;
$pageRights["Glamis Estate"]["list"]=true;
$pageRights["Glamis Estate"]["export"]=true;
$pageRights["Glamis Estate"]["import"]=true;

$nonAdminTablesArr[] = array("Island Homes","Island Homes");
$nonAdminTablesRightsArr["Island Homes"]=array();
$pageRights["Island Homes"]["add"]=true;
$pageRights["Island Homes"]["edit"]=false;
$pageRights["Island Homes"]["delete"]=false;
$pageRights["Island Homes"]["list"]=true;
$pageRights["Island Homes"]["export"]=true;
$pageRights["Island Homes"]["import"]=true;

$nonAdminTablesArr[] = array("Lansbury","Lansbury");
$nonAdminTablesRightsArr["Lansbury"]=array();
$pageRights["Lansbury"]["add"]=true;
$pageRights["Lansbury"]["edit"]=false;
$pageRights["Lansbury"]["delete"]=false;
$pageRights["Lansbury"]["list"]=true;
$pageRights["Lansbury"]["export"]=true;
$pageRights["Lansbury"]["import"]=true;

$nonAdminTablesArr[] = array("Lansbury West","Lansbury West");
$nonAdminTablesRightsArr["Lansbury West"]=array();
$pageRights["Lansbury West"]["add"]=true;
$pageRights["Lansbury West"]["edit"]=false;
$pageRights["Lansbury West"]["delete"]=false;
$pageRights["Lansbury West"]["list"]=true;
$pageRights["Lansbury West"]["export"]=true;
$pageRights["Lansbury West"]["import"]=true;

$nonAdminTablesArr[] = array("Leopold","Leopold");
$nonAdminTablesRightsArr["Leopold"]=array();
$pageRights["Leopold"]["add"]=true;
$pageRights["Leopold"]["edit"]=false;
$pageRights["Leopold"]["delete"]=false;
$pageRights["Leopold"]["list"]=true;
$pageRights["Leopold"]["export"]=true;
$pageRights["Leopold"]["import"]=true;

$nonAdminTablesArr[] = array("OFHA","OFHA");
$nonAdminTablesRightsArr["OFHA"]=array();
$pageRights["OFHA"]["add"]=true;
$pageRights["OFHA"]["edit"]=false;
$pageRights["OFHA"]["delete"]=false;
$pageRights["OFHA"]["list"]=true;
$pageRights["OFHA"]["export"]=true;
$pageRights["OFHA"]["import"]=true;

$nonAdminTablesArr[] = array("Shadwell","Shadwell");
$nonAdminTablesRightsArr["Shadwell"]=array();
$pageRights["Shadwell"]["add"]=true;
$pageRights["Shadwell"]["edit"]=false;
$pageRights["Shadwell"]["delete"]=false;
$pageRights["Shadwell"]["list"]=true;
$pageRights["Shadwell"]["export"]=true;
$pageRights["Shadwell"]["import"]=true;

$nonAdminTablesArr[] = array("Spitalfields","Spitalfields");
$nonAdminTablesRightsArr["Spitalfields"]=array();
$pageRights["Spitalfields"]["add"]=true;
$pageRights["Spitalfields"]["edit"]=false;
$pageRights["Spitalfields"]["delete"]=false;
$pageRights["Spitalfields"]["list"]=true;
$pageRights["Spitalfields"]["export"]=true;
$pageRights["Spitalfields"]["import"]=true;

$nonAdminTablesArr[] = array("isha_audit","Isha Audit");
$nonAdminTablesRightsArr["isha_audit"]=array();
$pageRights["isha_audit"]["add"]=true;
$pageRights["isha_audit"]["edit"]=true;
$pageRights["isha_audit"]["delete"]=true;
$pageRights["isha_audit"]["list"]=true;
$pageRights["isha_audit"]["export"]=true;
$pageRights["isha_audit"]["import"]=true;

$nonAdminTablesArr[] = array("Wessex Homes","Wessex Homes");
$nonAdminTablesRightsArr["Wessex Homes"]=array();
$pageRights["Wessex Homes"]["add"]=true;
$pageRights["Wessex Homes"]["edit"]=false;
$pageRights["Wessex Homes"]["delete"]=false;
$pageRights["Wessex Homes"]["list"]=true;
$pageRights["Wessex Homes"]["export"]=true;
$pageRights["Wessex Homes"]["import"]=true;

$nonAdminTablesArr[] = array("Octavia Housing","Octavia Housing");
$nonAdminTablesRightsArr["Octavia Housing"]=array();
$pageRights["Octavia Housing"]["add"]=true;
$pageRights["Octavia Housing"]["edit"]=false;
$pageRights["Octavia Housing"]["delete"]=false;
$pageRights["Octavia Housing"]["list"]=true;
$pageRights["Octavia Housing"]["export"]=true;
$pageRights["Octavia Housing"]["import"]=true;

$nonAdminTablesArr[] = array("West London Mental Health","West London Mental Health");
$nonAdminTablesRightsArr["West London Mental Health"]=array();
$pageRights["West London Mental Health"]["add"]=true;
$pageRights["West London Mental Health"]["edit"]=false;
$pageRights["West London Mental Health"]["delete"]=false;
$pageRights["West London Mental Health"]["list"]=true;
$pageRights["West London Mental Health"]["export"]=true;
$pageRights["West London Mental Health"]["import"]=true;

$nonAdminTablesArr[] = array("Abbott South","Abbott South");
$nonAdminTablesRightsArr["Abbott South"]=array();
$pageRights["Abbott South"]["add"]=true;
$pageRights["Abbott South"]["edit"]=false;
$pageRights["Abbott South"]["delete"]=false;
$pageRights["Abbott South"]["list"]=true;
$pageRights["Abbott South"]["export"]=true;
$pageRights["Abbott South"]["import"]=true;

$nonAdminTablesArr[] = array("isha_streets","Isha Streets");
$nonAdminTablesRightsArr["isha_streets"]=array();
$pageRights["isha_streets"]["add"]=true;
$pageRights["isha_streets"]["edit"]=true;
$pageRights["isha_streets"]["delete"]=true;
$pageRights["isha_streets"]["list"]=true;
$pageRights["isha_streets"]["export"]=true;
$pageRights["isha_streets"]["import"]=true;

$nonAdminTablesArr[] = array("Demo Contract","Demo Contract");
$nonAdminTablesRightsArr["Demo Contract"]=array();
$pageRights["Demo Contract"]["add"]=true;
$pageRights["Demo Contract"]["edit"]=false;
$pageRights["Demo Contract"]["delete"]=false;
$pageRights["Demo Contract"]["list"]=true;
$pageRights["Demo Contract"]["export"]=true;
$pageRights["Demo Contract"]["import"]=true;

$nonAdminTablesArr[] = array("Devons","Devons");
$nonAdminTablesRightsArr["Devons"]=array();
$pageRights["Devons"]["add"]=true;
$pageRights["Devons"]["edit"]=false;
$pageRights["Devons"]["delete"]=false;
$pageRights["Devons"]["list"]=true;
$pageRights["Devons"]["export"]=true;
$pageRights["Devons"]["import"]=true;

$nonAdminTablesArr[] = array("Vehicle in Abbott North","Vehicle in Abbott North");
$nonAdminTablesRightsArr["Vehicle in Abbott North"]=array();
$pageRights["Vehicle in Abbott North"]["add"]=true;
$pageRights["Vehicle in Abbott North"]["edit"]=false;
$pageRights["Vehicle in Abbott North"]["delete"]=false;
$pageRights["Vehicle in Abbott North"]["list"]=true;
$pageRights["Vehicle in Abbott North"]["export"]=false;
$pageRights["Vehicle in Abbott North"]["import"]=false;

$nonAdminTablesArr[] = array("Ticket Octavia","Ticket Octavia");
$nonAdminTablesRightsArr["Ticket Octavia"]=array();
$pageRights["Ticket Octavia"]["add"]=true;
$pageRights["Ticket Octavia"]["edit"]=true;
$pageRights["Ticket Octavia"]["delete"]=true;
$pageRights["Ticket Octavia"]["list"]=true;
$pageRights["Ticket Octavia"]["export"]=true;
$pageRights["Ticket Octavia"]["import"]=true;

$nonAdminTablesArr[] = array("Ticket Demo Site","Ticket Demo Site");
$nonAdminTablesRightsArr["Ticket Demo Site"]=array();
$pageRights["Ticket Demo Site"]["add"]=true;
$pageRights["Ticket Demo Site"]["edit"]=true;
$pageRights["Ticket Demo Site"]["delete"]=true;
$pageRights["Ticket Demo Site"]["list"]=true;
$pageRights["Ticket Demo Site"]["export"]=true;
$pageRights["Ticket Demo Site"]["import"]=true;

$nonAdminTablesArr[] = array("elite","Elite");
$nonAdminTablesRightsArr["elite"]=array();
$pageRights["elite"]["add"]=true;
$pageRights["elite"]["edit"]=false;
$pageRights["elite"]["delete"]=false;
$pageRights["elite"]["list"]=true;
$pageRights["elite"]["export"]=true;
$pageRights["elite"]["import"]=true;

$nonAdminTablesArr[] = array("Request Visit WLMH","Request Visit WLMH");
$nonAdminTablesRightsArr["Request Visit WLMH"]=array();
$pageRights["Request Visit WLMH"]["add"]=true;
$pageRights["Request Visit WLMH"]["edit"]=false;
$pageRights["Request Visit WLMH"]["delete"]=false;
$pageRights["Request Visit WLMH"]["list"]=true;
$pageRights["Request Visit WLMH"]["export"]=true;
$pageRights["Request Visit WLMH"]["import"]=true;


$options["nonAdminTablesArr"] = $nonAdminTablesArr;
$options["nonAdminTablesRightsArr"] = $nonAdminTablesRightsArr;


$pageObject = ListPage::createListPage($strTableName, $options);
 // add button events if exist

// prepare code for build page
$pageObject->prepareForBuildPage();

// show page depends of mode
$pageObject->showPage();
	//$xt->assign_loopsection("grid_row",$rowinfo);
	


?>
