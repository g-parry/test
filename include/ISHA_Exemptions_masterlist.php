<?php
include_once(getabspath("include/ISHA_Exemptions_settings.php"));

function DisplayMasterTableInfo_ISHA_Exemptions($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "ISHA Exemptions";
	
	$settings = new ProjectSettings($strTableName, PAGE_LIST);
	$cipherer = new RunnerCipherer($strTableName);
	
	$masterQuery = $settings->getSQLQuery();

$where = "";
$mKeys = array();
$showKeys = "";

global $page_styles, $page_layouts, $page_layout_names, $container_styles;

$layout = new TLayout("masterlist","FancyPink","MobilePink");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterlistheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterlistfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["ISHA_Exemptions_masterlist"] = $layout;


if($detailtable == "isha_streets")
{
		$where.= GetFullFieldName("Location", "", false)."=".$cipherer->MakeDBValue("Location",$keys[1-1], "", "", true);
	$showKeys .= " "."Location".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
	if(!$where)
	{
		$strTableName = $oldTableName;
		return;
	}
	$str = SecuritySQL("Search");
	if(strlen($str))
		$where.= " and ".$str;

	$strWhere = whereAdd($masterQuery->WhereToSql(),$where);
	if(strlen($strWhere))
		$strWhere = " where ".$strWhere." ";
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();

//	$strSQL = AddWhere($strSQL,$where);
	LogInfo($strSQL);
	$rs = db_query($strSQL,$conn);
	$data = $cipherer->DecryptFetchedArray($rs);
	if(!$data)
	{
		$strTableName = $oldTableName;
		return;
	}
	$keylink = "";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));
	


//	ID - 
			$value="";
				if (IsNumberType($settings->getFieldType("ID")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "ID", "", PAGE_LIST)
					,"field=ID".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"ID", "", PAGE_LIST)
					,"field=ID".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("ID_mastervalue",$value);

//	Location - 
			$value="";
				if (IsNumberType($settings->getFieldType("Location")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "Location", "", PAGE_LIST)
					,"field=Location".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"Location", "", PAGE_LIST)
					,"field=Location".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("Location_mastervalue",$value);

//	VRM - 
			$value="";
				if (IsNumberType($settings->getFieldType("VRM")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "VRM", "", PAGE_LIST)
					,"field=VRM".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"VRM", "", PAGE_LIST)
					,"field=VRM".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("VRM_mastervalue",$value);

//	Start Date - Short Date
			$value="";
				if (IsNumberType($settings->getFieldType("Start Date")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "Start Date", "Short Date", PAGE_LIST)
					,"field=Start+Date".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"Start Date", "Short Date", PAGE_LIST)
					,"field=Start+Date".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("Start_Date_mastervalue",$value);

//	EndDate - Short Date
			$value="";
				if (IsNumberType($settings->getFieldType("EndDate")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "EndDate", "Short Date", PAGE_LIST)
					,"field=EndDate".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"EndDate", "Short Date", PAGE_LIST)
					,"field=EndDate".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("EndDate_mastervalue",$value);

//	Reason - 
			$value="";
				if (IsNumberType($settings->getFieldType("Reason")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "Reason", "", PAGE_LIST)
					,"field=Reason".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"Reason", "", PAGE_LIST)
					,"field=Reason".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("Reason_mastervalue",$value);

//	make - 
			$value="";
				if (IsNumberType($settings->getFieldType("make")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "make", "", PAGE_LIST)
					,"field=make".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"make", "", PAGE_LIST)
					,"field=make".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("make_mastervalue",$value);

//	colour - 
			$value="";
				if (IsNumberType($settings->getFieldType("colour")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "colour", "", PAGE_LIST)
					,"field=colour".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"colour", "", PAGE_LIST)
					,"field=colour".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("colour_mastervalue",$value);

//	contract - 
			$value="";
				if (IsNumberType($settings->getFieldType("contract")))
				$value = "<span class='runner-field-number'>".ProcessLargeText($settings, GetData($data, "contract", "", PAGE_LIST)
					,"field=contract".$keylink, "", MODE_LIST, "", isMobile()).'</span>';
			else 
				$value = ProcessLargeText($settings, GetData($data,"contract", "", PAGE_LIST)
					,"field=contract".$keylink, "", MODE_LIST, "", isMobile());
			$xt->assign("contract_mastervalue",$value);

	$layout = GetPageLayout("ISHA_Exemptions", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("ISHA_Exemptions_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>