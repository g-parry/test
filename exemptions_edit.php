<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/exemptions_variables.php");
include('include/xtempl.php');
include('classes/editpage.php');
include("classes/searchclause.php");

add_nocache_headers();


if(isMobile()) {
$layout = new TLayout("Mobileedit","FancyPink","MobilePink");
$layout->blocks["top"] = array();
$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"editheader_mobile","block"=>"","substyle"=>2);


$layout->containers["fields"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"editfields_mobile1","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"legend","block"=>"legend","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"editbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";
$layout->blocks["top"][] = "fields";
$layout->containers["flylist"] = array();

$layout->containers["flylist"][] = array("name"=>"flypanel_mobile","block"=>"","substyle"=>2);


$layout->skins["flylist"] = "empty";
$layout->blocks["top"][] = "flylist";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["exemptions_edit"] = $layout;
} else {
$layout = new TLayout("edit2","FancyPink","MobilePink");
$layout->blocks["top"] = array();
$layout->containers["edit"] = array();

$layout->containers["edit"][] = array("name"=>"editheader","block"=>"","substyle"=>2);


$layout->containers["edit"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->containers["edit"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"editfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"legend","block"=>"legend","substyle"=>3);


$layout->containers["fields"][] = array("name"=>"editbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["edit"] = "1";
$layout->blocks["top"][] = "edit";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["exemptions_edit"] = $layout;
}




if ((sizeof($_POST)==0) && (postvalue('ferror')) && (!postvalue("editid1"))){
	$returnJSON['success'] = false;
	$returnJSON['message'] = "Error occurred";
	$returnJSON['fatalError'] = true;
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
}
else if ((sizeof($_POST)==0) && (postvalue('ferror')) && (postvalue("editid1"))){
	if (postvalue('fly')){
		echo -1;
		exit();
	}
	else {
		$_SESSION["message_edit"] = "<< "."Error occurred"." >>";
	}
}
/////////////////////////////////////////////////////////////
//init variables
/////////////////////////////////////////////////////////////
if(postvalue("editType")=="inline")
	$inlineedit = EDIT_INLINE;
elseif(postvalue("editType")==EDIT_POPUP)
	$inlineedit = EDIT_POPUP;
else
	$inlineedit = EDIT_SIMPLE;

$id = postvalue("id");
if(intval($id)==0)
	$id = 1;

$flyId = $id+1;
$xt = new Xtempl();

// assign an id
$xt->assign("id",$id);

$templatefile = ($inlineedit == EDIT_INLINE) ? "exemptions_inline_edit.htm" : "exemptions_edit.htm";

//array of params for classes
$params = array("pageType" => PAGE_EDIT,"id" => $id);


////////////////////// data picker
$params["calendar"] = true;



$params['tName'] = $strTableName;
$params['xt'] = &$xt;
$params['mode'] = $inlineedit;
$params['includes_js'] = $includes_js;
$params['includes_jsreq'] = $includes_jsreq;
$params['includes_css'] = $includes_css;
$params['locale_info'] = $locale_info;
$params['templatefile'] = $templatefile;
$params['pageEditLikeInline'] = ($inlineedit == EDIT_INLINE);
//Get array of tabs for edit page
$params['useTabsOnEdit'] = $gSettings->useTabsOnEdit();
if($params['useTabsOnEdit'])
	$params['arrEditTabs'] = $gSettings->getEditTabs();
$params["useIbox"] = $gSettings->useIboxTable();

$pageObject = new EditPage($params);

//	For ajax request 
if($_REQUEST["action"]!="")
{
	if($pageObject->lockingObj)
	{
		$arrkeys = explode("&",refine($_REQUEST["keys"]));
		foreach($arrkeys as $ind=>$val)
			$arrkeys[$ind]=urldecode($val);
		
		if($_REQUEST["action"]=="unlock")
		{
			$pageObject->lockingObj->UnlockRecord($strTableName,$arrkeys,$_REQUEST["sid"]);
			exit();	
		}
		else if($_REQUEST["action"]=="lockadmin" && (IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP))
		{
			$pageObject->lockingObj->UnlockAdmin($strTableName,$arrkeys,$_REQUEST["startEdit"]=="yes");
			if($_REQUEST["startEdit"]=="no")
				echo "unlock";
			else if($_REQUEST["startEdit"]=="yes")
				echo "lock";
			exit();	
		}
		else if($_REQUEST["action"]=="confirm")
		{
			if(!$pageObject->lockingObj->ConfirmLock($strTableName,$arrkeys,$message));
				echo $message;
			exit();	
		}
	}
	else
		exit();
}

$filename = $status = $message = $mesClass = $usermessage = $strWhereClause = $bodyonload = "";
$showValues = $showRawValues = $showFields = $showDetailKeys = $key = $next = $prev = array();
$HaveData = $enableCtrlsForEditing = true;
$error_happened = $readevalues = $IsSaved = false;

$auditObj = GetAuditObject($strTableName);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;


if($pageObject->lockingObj)
{
	$system_attrs = "style='display:none;'";
	$system_message = "";
}

if ($inlineedit!=EDIT_INLINE)
{
	// add button events if exist
	$pageObject->addButtonHandlers();
}

$url_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//	Before Process event
if($eventObj->exists("BeforeProcessEdit"))
	$eventObj->BeforeProcessEdit($conn, $pageObject);

$keys = array();
$skeys = "";
$savedKeys = array();
$keys["ID"] = urldecode(postvalue("editid1"));
$savedKeys["ID"] = urldecode(postvalue("editid1"));
$skeys.= rawurlencode(postvalue("editid1"))."&";

$pageObject->setKeys($keys);

if($skeys!="")
	$skeys = substr($skeys,0,-1);

//For show detail tables on master page edit
if($inlineedit!=EDIT_INLINE)
{
	$dpParams = array();
	if($pageObject->isShowDetailTables && !isMobile())
	{
		$ids = $id;
		$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
	}
}
/////////////////////////////////////////////////////////////
//	process entered data, read and save
/////////////////////////////////////////////////////////////

// proccess captcha
if ($inlineedit!=EDIT_INLINE)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();

if(@$_POST["a"] == "edited")
{
	$strWhereClause = whereAdd($strWhereClause,KeyWhere($keys));
		$oldValuesRead = false;
	if($eventObj->exists("AfterEdit") || $eventObj->exists("BeforeEdit") || $auditObj)
	{
		//	read old values
		$rsold = db_query($gQuery->gSQLWhere($strWhereClause), $conn);
		$dataold = $pageObject->cipherer->DecryptFetchedArray($rsold);
		$oldValuesRead = true;
	}
	$evalues = $efilename_values = $blobfields = array();
	

//	processing Location - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_Location_".$id);
		$type = postvalue("type_Location_".$id);
		if(FieldSubmitted("Location_".$id))
		{
				$value = prepare_for_db("Location",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "Location"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["Location"] = $value;
		
			}
	
		}
//	processing Location - end
//	processing VRM - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_VRM_".$id);
		$type = postvalue("type_VRM_".$id);
		if(FieldSubmitted("VRM_".$id))
		{
				$value = prepare_for_db("VRM",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "VRM"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["VRM"] = $value;
		
			}
	
		}
//	processing VRM - end
//	processing Start Date - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_Start_Date_".$id);
		$type = postvalue("type_Start_Date_".$id);
		if(FieldSubmitted("Start Date_".$id))
		{
				$value = prepare_for_db("Start Date",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "Start Date"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["Start Date"] = $value;
		
			}
	
		}
//	processing Start Date - end
//	processing EndDate - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_EndDate_".$id);
		$type = postvalue("type_EndDate_".$id);
		if(FieldSubmitted("EndDate_".$id))
		{
				$value = prepare_for_db("EndDate",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "EndDate"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["EndDate"] = $value;
		
			}
	
		}
//	processing EndDate - end
//	processing Reason - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_Reason_".$id);
		$type = postvalue("type_Reason_".$id);
		if(FieldSubmitted("Reason_".$id))
		{
				$value = prepare_for_db("Reason",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "Reason"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["Reason"] = $value;
		
			}
	
		}
//	processing Reason - end
//	processing make - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_make_".$id);
		$type = postvalue("type_make_".$id);
		if(FieldSubmitted("make_".$id))
		{
				$value = prepare_for_db("make",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "make"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["make"] = $value;
		
			}
	
		}
//	processing make - end
//	processing colour - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_colour_".$id);
		$type = postvalue("type_colour_".$id);
		if(FieldSubmitted("colour_".$id))
		{
				$value = prepare_for_db("colour",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "colour"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["colour"] = $value;
		
			}
	
		}
//	processing colour - end
//	processing contract - begin
	$condition = 1;

	if($condition)
	{
		$value = postvalue("value_contract_".$id);
		$type = postvalue("type_contract_".$id);
		if(FieldSubmitted("contract_".$id))
		{
				$value = prepare_for_db("contract",$value,$type);
		}
		else
			$value = false;
	
		
		if($value!==false)
		{	
	
	
	
	
	
			if(0 && "contract"=="" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["contract"] = $value;
		
			}
	
		}
//	processing contract - end

	foreach($efilename_values as $ekey=>$value)
		$evalues[$ekey] = $value;
		
	if($pageObject->lockingObj)
	{
		$lockmessage = "";
		if(!$pageObject->lockingObj->ConfirmLock($strTableName,$savedKeys,$lockmessage))
		{
			$enableCtrlsForEditing = false;
			$system_attrs = "style='display:block;'";
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,false,$id);
				
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
				exit();
			}
			else
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$system_message = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,true,$id);
				else
					$system_message = $lockmessage;
			}
			$status = "DECLINED";
			$readevalues = true;
		}
	}
	
	if($readevalues==false)
	{
	//	do event
		$retval = true;
		if($eventObj->exists("BeforeEdit"))
			$retval=$eventObj->BeforeEdit($evalues,$strWhereClause,$dataold,$keys,$usermessage,(bool)$inlineedit, $pageObject);
		if($retval && $pageObject->isCaptchaOk)
		{		
			if($inlineedit!=EDIT_INLINE)
				$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
				
			if(DoUpdateRecord($strOriginalTableName,$evalues,$blobfields,$strWhereClause,$id,$pageObject, $pageObject->cipherer))
			{
				$IsSaved = true;
				
				//	after edit event
				if($pageObject->lockingObj && $inlineedit == EDIT_INLINE)
					$pageObject->lockingObj->UnlockRecord($strTableName,$savedKeys,"");
				if($auditObj || $eventObj->exists("AfterEdit"))
				{
					foreach($dataold as $idx=>$val)
					{
						if(!array_key_exists($idx,$evalues))
							$evalues[$idx] = $val;
					}
				}

				if($auditObj)
					$auditObj->LogEdit($strTableName,$evalues,$dataold,$keys);
				if($eventObj->exists("AfterEdit"))
					$eventObj->AfterEdit($evalues,KeyWhere($keys),$dataold,$keys,(bool)$inlineedit, $pageObject);
							
				$mesClass = "mes_ok";
			}
			elseif($inlineedit!=EDIT_INLINE)
				$mesClass = "mes_not";	
		}
		else
		{
			$message = $usermessage;
			$readevalues = true;
			$status = "DECLINED";
		}
	}
	if($readevalues)
		$keys = $savedKeys;
}
//else
{
	/////////////////////////
	//Locking recors
	/////////////////////////

	if($pageObject->lockingObj)
	{
		$enableCtrlsForEditing = $pageObject->lockingObj->LockRecord($strTableName,$keys);
		if(!$enableCtrlsForEditing)
		{
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,false,$id);
				else
					$lockmessage = $pageObject->lockingObj->LockUser;
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo my_json_encode($returnJSON);
				exit();
			}
			
			$system_attrs = "style='display:block;'";
			$system_message = $pageObject->lockingObj->LockUser;
			
			if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
			{
				$rb = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,true,$id);
				if($rb!="")
					$system_message = $rb;
			}
		}
	}
}

if($pageObject->lockingObj && $inlineedit!=EDIT_INLINE)
	$pageObject->body["begin"] .='<div class="runner-locking" '.$system_attrs.'>'.$system_message.'</div>';

if($message)
	$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if ($IsSaved && no_output_done() && $inlineedit == EDIT_SIMPLE)
{
	// saving message
	$_SESSION["message_edit"] = ($message ? $message : "");
	// key get query
	$keyGetQ = "";
		$keyGetQ.="editid1=".rawurldecode($keys["ID"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: exemptions_".$pageObject->getPageType().".php?".$keyGetQ);
	// turned on output buffering, so we need to stop script
	exit();
}
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if ($inlineedit == EDIT_SIMPLE && isset($_SESSION["message_edit"]))
{
	$message = $_SESSION["message_edit"];
	unset($_SESSION["message_edit"]);
}


$pageObject->setKeys($keys);
$pageObject->readEditValues = $readevalues;
if($readevalues)
	$pageObject->editValues = $evalues;

//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();

if(!$data)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		header("Location: exemptions_list.php?a=return");
		exit();
	}
	else
		$data = array();
}

//global variable use in BuildEditControl function
$readonlyfields = array();
//	show readonly fields

/////////////////////////////////////////////////////////////
//	assign values to $xt class, prepare page for displaying
/////////////////////////////////////////////////////////////
//Basic includes js files
$includes = "";
//javascript code
	
if($inlineedit != EDIT_INLINE)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		$includes.= "<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
				$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
		
		if (!isMobile())
			$includes.= "<div id=\"search_suggest".$id."\"></div>\r\n";
			
		$pageObject->body["begin"].= $includes;
	}	

	if(!$pageObject->isAppearOnTabs("Location"))
		$xt->assign("Location_fieldblock",true);
	else
		$xt->assign("Location_tabfieldblock",true);
	$xt->assign("Location_label",true);
	if(isEnableSection508())
		$xt->assign_section("Location_label","<label for=\"".GetInputElementId("Location", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("VRM"))
		$xt->assign("VRM_fieldblock",true);
	else
		$xt->assign("VRM_tabfieldblock",true);
	$xt->assign("VRM_label",true);
	if(isEnableSection508())
		$xt->assign_section("VRM_label","<label for=\"".GetInputElementId("VRM", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Start Date"))
		$xt->assign("Start_Date_fieldblock",true);
	else
		$xt->assign("Start_Date_tabfieldblock",true);
	$xt->assign("Start_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Start_Date_label","<label for=\"".GetInputElementId("Start Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("EndDate"))
		$xt->assign("EndDate_fieldblock",true);
	else
		$xt->assign("EndDate_tabfieldblock",true);
	$xt->assign("EndDate_label",true);
	if(isEnableSection508())
		$xt->assign_section("EndDate_label","<label for=\"".GetInputElementId("EndDate", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Reason"))
		$xt->assign("Reason_fieldblock",true);
	else
		$xt->assign("Reason_tabfieldblock",true);
	$xt->assign("Reason_label",true);
	if(isEnableSection508())
		$xt->assign_section("Reason_label","<label for=\"".GetInputElementId("Reason", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("make"))
		$xt->assign("make_fieldblock",true);
	else
		$xt->assign("make_tabfieldblock",true);
	$xt->assign("make_label",true);
	if(isEnableSection508())
		$xt->assign_section("make_label","<label for=\"".GetInputElementId("make", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("colour"))
		$xt->assign("colour_fieldblock",true);
	else
		$xt->assign("colour_tabfieldblock",true);
	$xt->assign("colour_label",true);
	if(isEnableSection508())
		$xt->assign_section("colour_label","<label for=\"".GetInputElementId("colour", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("contract"))
		$xt->assign("contract_fieldblock",true);
	else
		$xt->assign("contract_tabfieldblock",true);
	$xt->assign("contract_label",true);
	if(isEnableSection508())
		$xt->assign_section("contract_label","<label for=\"".GetInputElementId("contract", $id, PAGE_EDIT)."\">","</label>");
		

	$xt->assign("show_key1", htmlspecialchars(GetData($data, "ID", "", PAGE_EDIT)));
	//$xt->assign('editForm',true);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if(!@$_SESSION[$strTableName."_noNextPrev"] && $inlineedit == EDIT_SIMPLE)
	{
		$next = array();
		$prev = array();
		$pageObject->getNextPrevRecordKeys($data,"Edit",$next,$prev);
	}
	$nextlink = $prevlink = "";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink.= "editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
				$prevlink.= "editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("prev_button",false);
	$xt->assign("resetbutton_attrs",'id="resetButton'.$id.'"');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//End Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if($inlineedit == EDIT_SIMPLE)
	{
		$xt->assign("back_button",true);
		$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	}
	// onmouseover event, for changing focus. Needed to proper submit form
	//$onmouseover = "this.focus();";
	//$onmouseover = 'onmouseover="'.$onmouseover.'"';
	
	$xt->assign("save_button",true);
	if(!$enableCtrlsForEditing)
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\" type=\"disabled\" ");
	else
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\"");
		
	$xt->assign("reset_button",true);

}

$xt->assign("message_block",true);
$xt->assign("message",$message);
if(!strlen($message))
{
	$xt->displayBrickHidden("message");
}
/////////////////////////////////////////////////////////////
//process readonly and auto-update fields
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	return new data to the List page or report an error
/////////////////////////////////////////////////////////////
if (postvalue("a")=="edited" && ($inlineedit == EDIT_INLINE || $inlineedit == EDIT_POPUP))
{
	if(!$data)
	{
		$data = $evalues;
		$HaveData = false;
	}
	//Preparation   view values

//	detail tables

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));


//	contract - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "contract", "", PAGE_LIST), "field=contract".$keylink, "", MODE_LIST);
	$showValues["contract"] = $value;
	$showFields[] = "contract";
		$showRawValues["contract"] = substr($data["contract"],0,100);

//	ID - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "ID", "", PAGE_LIST), "field=ID".$keylink, "", MODE_LIST);
	$showValues["ID"] = $value;
	$showFields[] = "ID";
		$showRawValues["ID"] = substr($data["ID"],0,100);

//	Location - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "Location", "", PAGE_LIST), "field=Location".$keylink, "", MODE_LIST);
	$showValues["Location"] = $value;
	$showFields[] = "Location";
		$showRawValues["Location"] = substr($data["Location"],0,100);

//	VRM - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "VRM", "", PAGE_LIST), "field=VRM".$keylink, "", MODE_LIST);
	$showValues["VRM"] = $value;
	$showFields[] = "VRM";
		$showRawValues["VRM"] = substr($data["VRM"],0,100);

//	Start Date - Short Date
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "Start Date", "Short Date", PAGE_LIST), "field=Start+Date".$keylink, "", MODE_LIST);
	$showValues["Start Date"] = $value;
	$showFields[] = "Start Date";
		$showRawValues["Start Date"] = substr($data["Start Date"],0,100);

//	EndDate - Short Date
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "EndDate", "Short Date", PAGE_LIST), "field=EndDate".$keylink, "", MODE_LIST);
	$showValues["EndDate"] = $value;
	$showFields[] = "EndDate";
		$showRawValues["EndDate"] = substr($data["EndDate"],0,100);

//	Reason - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "Reason", "", PAGE_LIST), "field=Reason".$keylink, "", MODE_LIST);
	$showValues["Reason"] = $value;
	$showFields[] = "Reason";
		$showRawValues["Reason"] = substr($data["Reason"],0,100);

//	make - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "make", "", PAGE_LIST), "field=make".$keylink, "", MODE_LIST);
	$showValues["make"] = $value;
	$showFields[] = "make";
		$showRawValues["make"] = substr($data["make"],0,100);

//	colour - 
		$value = "";
			$value = ProcessLargeText($pageObject->pSet, GetData($data, "colour", "", PAGE_LIST), "field=colour".$keylink, "", MODE_LIST);
	$showValues["colour"] = $value;
	$showFields[] = "colour";
		$showRawValues["colour"] = substr($data["colour"],0,100);
/////////////////////////////////////////////////////////////
//	start inline output
/////////////////////////////////////////////////////////////
	
	if($IsSaved)
	{
		if($pageObject->lockingObj)
			$pageObject->lockingObj->UnlockRecord($strTableName,$keys,"");
		
		$returnJSON['success'] = true;
		$returnJSON['keys'] = $pageObject->jsKeys;
		$returnJSON['keyFields'] = $pageObject->keyFields;
		$returnJSON['vals'] = $showValues;
		$returnJSON['fields'] = $showFields;
		$returnJSON['rawVals'] = $showRawValues;
		$returnJSON['detKeys'] = $showDetailKeys;
		$returnJSON['userMess'] = $usermessage;
		$returnJSON['hrefs'] = $pageObject->buildDetailGridLinks($showRawValues);
		
		if($inlineedit==EDIT_POPUP && isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
			$returnJSON['hideCaptcha'] = true;
	}
	else
	{
		$returnJSON['success'] = false;
		$returnJSON['message'] = $message;
		
		if($pageObject->lockingObj)
			$returnJSON['lockMessage'] = $system_message;
		
		if($inlineedit == EDIT_POPUP && !$pageObject->isCaptchaOk)
			$returnJSON['captcha'] = false;
	}
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
} 
/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////
//	validation stuff
$regex = '';
$regexmessage = '';
$regextype = '';
$control = array();

foreach($pageObject->editFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if (!$detailKeys || !in_array($fName, $detailKeys))
	{
		$control[$gfName] = array();
		$control[$gfName]["func"]="xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"] = $id;
		$control[$gfName]["params"]["ptype"] = PAGE_EDIT;
		$control[$gfName]["params"]["field"] = $fName;
		$control[$gfName]["params"]["value"] = @$data[$fName];
		
		//	Begin Add validation
		$arrValidate = $pageObject->pSet->getValidation($fName);
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation	
		$additionalCtrlParams = array();
		$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
		$control[$gfName]["params"]["additionalCtrlParams"] = $additionalCtrlParams;
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	
	if($inlineedit == EDIT_INLINE)
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))
			$control[$gfName]["params"]["mode"]="inline_edit";
		$controls["controls"]['mode'] = "inline_edit";
	}
	else{
			if (!$detailKeys || !in_array($fName, $detailKeys))
				$control[$gfName]["params"]["mode"] = "edit";
			$controls["controls"]['mode'] = "edit";
		}
									
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$data[$fName];
		
	// category control field
	$strCategoryControl = $pageObject->hasDependField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $pageObject->editFields))
		$vals = array($fName => @$data[$fName],$strCategoryControl => @$data[$strCategoryControl]);
	else
		$vals = array($fName => @$data[$fName]);
		
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
		$controls["controls"]['preloadData'] = $preload;
	
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker
	if($pageObject->pSet->getEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, $data[$fName]);
	
	if($pageObject->pSet->getViewFormat($fName) == FORMAT_MAP)	
		$pageObject->googleMapCfg['isUseGoogleMap'] = true;
		
	if($detailKeys && in_array($fName, $detailKeys) && array_key_exists($fName, $data))
	{
		if(($pageObject->pSet->getEditFormat($fName) == EDIT_FORMAT_LOOKUP_WIZARD || $pageObject->pSet->getEditFormat($fName) == EDIT_FORMAT_RADIO) 
			&& ($pageObject->pSet->getpLookupType($fName) == LT_LOOKUPTABLE || $pageObject->pSet->getpLookupType($fName) == LT_QUERY))
			$value = DisplayLookupWizard($fName, $data[$fName], $data, "", MODE_VIEW, PAGE_EDIT);
		elseif($pageObject->pSet->NeedEncode($fName))
			$value = ProcessLargeText($pageObject->pSet, GetData($data,$fName, $pageObject->pSet->getViewFormat($fName), PAGE_EDIT), "field=".rawurlencode(htmlspecialchars($fName)), "", MODE_VIEW);
		else
			$value = GetData($data, $fName, $pageObject->pSet->getViewFormat($fName), PAGE_EDIT);
		
		$xt->assign($gfName."_editcontrol",$value);
	}
}
//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
if($pageObject->lockingObj)
{
	$pageObject->jsSettings['tableSettings'][$strTableName]["sKeys"] = $skeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]["enableCtrls"] = $enableCtrlsForEditing;
	$pageObject->jsSettings['tableSettings'][$strTableName]["confirmTime"] = $pageObject->lockingObj->ConfirmTime;
}

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && $inlineedit!=EDIT_INLINE && !isMobile())
{
	if(count($dpParams['ids']))
	{
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		$xt->assign("detail_tables",true);	
	}
	
	$dControlsMap = array();
	$flyId = $ids+1;
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_EDIT;
		$options["mainMasterPageType"] = PAGE_EDIT;
		$options['masterTable'] = "exemptions";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "exemptions";
			continue;
		}
		
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		
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
		$options['flyId'] = $flyId++;
		$masterKeys = array();
		$mkr = 1;
		
		foreach($mKeys[$strTableName] as $mk){
			$options['masterKeysReq'][$mkr] = $data[$mk];
			$masterKeys['masterKey'.$mkr] = $data[$mk];
			$mkr++;
		}
		
		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->isDispGrid())
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->fillSetCntrlMaps();
			
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			
			foreach($listPageObject->jsSettings["global"]["shortTNames"] as $tName => $shortTName){
				$pageObject->settingsMap["globalSettings"]["shortTNames"][$tName] = $shortTName;
			}
			
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			$dControlsMap[$strTableName]['masterKeys'] = $masterKeys;
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
			
			$xtParams = array("method"=>'showPage', "params"=> false);
			$xtParams['object'] = $listPageObject;
			$xt->assign("displayDetailTable_".GoodFieldName($listPageObject->tName), $xtParams);
			
			$pageObject->controlsMap['dpTablesParams'][] = array('tName'=>$strTableName, 'id'=>$options['id']);
		}
		$flyId = $listPageObject->recId+1;
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$strTableName = "exemptions";
}
/////////////////////////////////////////////////////////////
//fill jsSettings and ControlsHTMLMap
$pageObject->fillSetCntrlMaps();

$pageObject->addCommonJs();

//For mobile version in apple device
if($pageObject->isHTMLFormNeeded())
{
	$formname="editForm".$id;
	$pageObject->jsSettings['tableSettings'][$pageObject->tName]['isMobileIOS'] = true;
	$pageObject->body["begin"] .= '<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="exemptions_edit.php">';
}

if($inlineedit == EDIT_SIMPLE)
{
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	$xt->assign("body", $pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;	
}

if($inlineedit == EDIT_POPUP){
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("body",$pageObject->body);
}

$xt->assign("style_block",true);


$viewlink = "";
$viewkeys = array();
	$viewkeys["editid1"] = postvalue("editid1");
foreach($viewkeys as $key => $val)
{
	if($viewlink)
		$viewlink.="&";
	$viewlink.=$key."=".$val;
}
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='exemptions_view.php?".$viewlink."'\"");
if(CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && $inlineedit == EDIT_SIMPLE)
	$xt->assign("view_button",true);
else
	$xt->assign("view_button",false);

/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if($eventObj->exists("BeforeShowEdit"))
	$eventObj->BeforeShowEdit($xt,$templatefile,$data, $pageObject);
if($inlineedit == EDIT_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
	if(count($pageObject->includes_css))
		$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
	if(count($pageObject->includes_cssIE))
		$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);
	$returnJSON['idStartFrom'] = $flyId + 1;
	echo (my_json_encode($returnJSON)); 
}
elseif($inlineedit == EDIT_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($pageObject->editFields as $fName)
	{
		if($detailKeys && in_array($fName, $detailKeys))
			continue;
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");
	}
	
	echo (my_json_encode($returnJSON)); 
}
else
	$xt->display($templatefile);

?>
