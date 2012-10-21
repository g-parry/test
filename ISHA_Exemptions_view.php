<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/ISHA_Exemptions_variables.php");
include('include/xtempl.php');
include('classes/viewpage.php');
include("classes/searchclause.php");

add_nocache_headers();


$layout = new TLayout("view2","FancyPink","MobilePink");
$layout->blocks["top"] = array();
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";
$layout->containers["view"] = array();

$layout->containers["view"][] = array("name"=>"viewheader","block"=>"","substyle"=>2);


$layout->containers["view"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"viewfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"viewbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["view"] = "1";
$layout->blocks["top"][] = "view";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["ISHA_Exemptions_view"] = $layout;




//$cipherer = new RunnerCipherer($strTableName);
	
$xt = new Xtempl();

$query = $gQuery->Copy();

$filename = "";	
$message = "";
$key = array();
$next = array();
$prev = array();
$all = postvalue("all");
$pdf = postvalue("pdf");
$mypage = 1;

//Show view page as popUp or not
$inlineview = (postvalue("onFly") ? true : false);

//If show view as popUp, get parent Id
if($inlineview)
	$parId = postvalue("parId");
else
	$parId = 0;

//Set page id	
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;

//$isNeedSettings = true;//($inlineview && postvalue("isNeedSettings") == 'true') || (!$inlineview);	
	
// assign an id
$xt->assign("id",$id);

//array of params for classes
$params = array("pageType" => PAGE_VIEW, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
$params["all"] = $all;

//Get array of tabs for edit page
$params['useTabsOnView'] = $gSettings->useTabsOnView();
if($params['useTabsOnView'])
	$params['arrViewTabs'] = $gSettings->getViewTabs();
$pageObject = new ViewPage($params);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

// proccess big google maps

// add button events if exist
$pageObject->addButtonHandlers();

//For show detail tables on master page view
$dpParams = array();
if($pageObject->isShowDetailTables && !isMobile())
{
	$ids = $id;
	$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array();
}

//	Before Process event
if($eventObj->exists("BeforeProcessView"))
	$eventObj->BeforeProcessView($conn, $pageObject);
	
//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();

if (!sizeof($data)) {
	header("Location: ISHA_Exemptions_list.php?a=return");
	exit();
}

$out = "";
$first = true;
$fieldsArr = array();
$arr = array();
$arr['fName'] = "ID";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ID");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Location";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Location");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "VRM";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("VRM");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Start Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Start Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "EndDate";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("EndDate");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Reason";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Reason");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "make";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("make");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "colour";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("colour");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "contract";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("contract");
$fieldsArr[] = $arr;

$mainTableOwnerID = $pageObject->pSet->getTableOwnerIdField();
$ownerIdValue="";

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars(GetData($data, "ID", "", PAGE_VIEW)));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));

////////////////////////////////////////////
//ID - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"ID", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="ID")
		$ownerIdValue=$value;
	$xt->assign("ID_value",$value);
	if(!$pageObject->isAppearOnTabs("ID"))
		$xt->assign("ID_fieldblock",true);
	else
		$xt->assign("ID_tabfieldblock",true);
////////////////////////////////////////////
//Location - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"Location", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="Location")
		$ownerIdValue=$value;
	$xt->assign("Location_value",$value);
	if(!$pageObject->isAppearOnTabs("Location"))
		$xt->assign("Location_fieldblock",true);
	else
		$xt->assign("Location_tabfieldblock",true);
////////////////////////////////////////////
//VRM - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"VRM", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="VRM")
		$ownerIdValue=$value;
	$xt->assign("VRM_value",$value);
	if(!$pageObject->isAppearOnTabs("VRM"))
		$xt->assign("VRM_fieldblock",true);
	else
		$xt->assign("VRM_tabfieldblock",true);
////////////////////////////////////////////
//Start Date - Short Date
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"Start Date", "Short Date", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="Start Date")
		$ownerIdValue=$value;
	$xt->assign("Start_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("Start Date"))
		$xt->assign("Start_Date_fieldblock",true);
	else
		$xt->assign("Start_Date_tabfieldblock",true);
////////////////////////////////////////////
//EndDate - Short Date
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"EndDate", "Short Date", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="EndDate")
		$ownerIdValue=$value;
	$xt->assign("EndDate_value",$value);
	if(!$pageObject->isAppearOnTabs("EndDate"))
		$xt->assign("EndDate_fieldblock",true);
	else
		$xt->assign("EndDate_tabfieldblock",true);
////////////////////////////////////////////
//Reason - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"Reason", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="Reason")
		$ownerIdValue=$value;
	$xt->assign("Reason_value",$value);
	if(!$pageObject->isAppearOnTabs("Reason"))
		$xt->assign("Reason_fieldblock",true);
	else
		$xt->assign("Reason_tabfieldblock",true);
////////////////////////////////////////////
//make - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"make", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="make")
		$ownerIdValue=$value;
	$xt->assign("make_value",$value);
	if(!$pageObject->isAppearOnTabs("make"))
		$xt->assign("make_fieldblock",true);
	else
		$xt->assign("make_tabfieldblock",true);
////////////////////////////////////////////
//colour - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"colour", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="colour")
		$ownerIdValue=$value;
	$xt->assign("colour_value",$value);
	if(!$pageObject->isAppearOnTabs("colour"))
		$xt->assign("colour_fieldblock",true);
	else
		$xt->assign("colour_tabfieldblock",true);
////////////////////////////////////////////
//contract - 
	
	$value="";
	$value = ProcessLargeText($pageObject->pSet, GetData($data,"contract", "", PAGE_VIEW), "", "", MODE_VIEW);
	if($mainTableOwnerID=="contract")
		$ownerIdValue=$value;
	$xt->assign("contract_value",$value);
	if(!$pageObject->isAppearOnTabs("contract"))
		$xt->assign("contract_fieldblock",true);
	else
		$xt->assign("contract_tabfieldblock",true);

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && !isMobile())
{
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
	}
	
	$dControlsMap = array();
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_VIEW;
		$options["mainMasterPageType"] = PAGE_VIEW;
		$options['masterTable'] = "ISHA Exemptions";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "ISHA Exemptions";
			continue;
		}
		
		$layout = GetPageLayout(GoodFieldName($strTableName), PAGE_LIST);
		if($layout)
		{
			$rtl = $xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
			$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl
				, "pagestylepath" => "pagestyles/".$layout->name.$rtl);
			$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE');
		}
		
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$options['flyId'] = $pageObject->genId()+1;
		$mkr = 1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->permis[$strTableName]['search'] && $listPageObject->rowsFound)
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->fillSetCntrlMaps();
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			foreach($listPageObject->jsSettings['global']['shortTNames'] as $keySet=>$val)
			{
				if(!array_key_exists($keySet,$pageObject->settingsMap["globalSettings"]['shortTNames']))
					$pageObject->settingsMap["globalSettings"]['shortTNames'][$keySet] = $val;
			}
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
		
			$xtParams = array("method"=>'showPage', "params"=> false);
			$xtParams['object'] = $listPageObject;
			$xt->assign("displayDetailTable_".GoodFieldName($listPageObject->tName), $xtParams);
		
			$pageObject->controlsMap['dpTablesParams'][] = array('tName'=>$strTableName, 'id'=>$options['id']);
		}
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$strTableName = "ISHA Exemptions";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin prepare for Next Prev button
if(!@$_SESSION[$strTableName."_noNextPrev"] && !$inlineview && !$pdf)
{
	$pageObject->getNextPrevRecordKeys($data,"Search",$next,$prev);
}
//End prepare for Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($pageObject->googleMapCfg['isUseGoogleMap'])
{
	$pageObject->initGmaps();
}

$pageObject->addCommonJs();

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

if(!$inlineview)
{
	$pageObject->body["begin"].="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
		$pageObject->body["begin"].= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";		
	
	$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
	$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
	$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
	
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
	$xt->assign("pdflink_block",false);
	
	$pageObject->fillSetCntrlMaps();
	
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;
}
$xt->assign("style_block",true);
$xt->assign("stylefiles_block",true);

$editlink="";
$editkeys=array();
	$editkeys["editid1"]=postvalue("editid1");
foreach($editkeys as $key=>$val)
{
	if($editlink)
		$editlink.="&";
	$editlink.=$key."=".$val;
}
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='ISHA_Exemptions_edit.php?".$editlink."'\"");

$strPerm = GetUserPermissions($strTableName);
if(CheckSecurity($ownerIdValue,"Edit") && !$inlineview && strpos($strPerm, "E")!==false)
	$xt->assign("edit_button",true);
else
	$xt->assign("edit_button",false);

if(!$pdf && !$all && !$inlineview)
{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin show Next Prev button
	$nextlink=$prevlink="";
	if(count($next))
	{
		$xt->assign("next_button",true);
	 		$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\"");
	}
	else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile = $pageObject->templatefile;

if(!$all)
{
	if($eventObj->exists("BeforeShowView"))
	{
		$templatefile = $pageObject->templatefile;
		$eventObj->BeforeShowView($xt,$templatefile,$data, $pageObject);
		$pageObject->templatefile = $templatefile;
	}
	if(!$pdf)
	{
		if(!$inlineview)
			$xt->display($pageObject->templatefile);
		else{
				$xt->load_template($pageObject->templatefile);
				$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
				if(count($pageObject->includes_css))
					$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
				if(count($pageObject->includes_cssIE))
					$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);				
				$returnJSON['idStartFrom'] = $id+1;
				echo (my_json_encode($returnJSON)); 
			}
	}
	break;
}
}


?>
