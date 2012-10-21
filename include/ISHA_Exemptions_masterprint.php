<?php
include_once(getabspath("include/ISHA_Exemptions_settings.php"));

function DisplayMasterTableInfo_ISHA_Exemptions($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="ISHA Exemptions";

//$strSQL = "SELECT  ID,  Location,  VRM,  `Start Date`,  EndDate,  Reason,  make,  colour,  contract  FROM exemptions  ";

	$cipherer = new RunnerCipherer($strTableName);
	$settings = new ProjectSettings($strTableName, PAGE_PRINT);
	
	$masterQuery = $settings->getSQLQuery();

$where="";

global $pageObject, $page_styles, $page_layouts, $page_layout_names, $container_styles;
$layout = new TLayout("masterprint","FancyPink","MobilePink");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["ISHA_Exemptions_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="isha_streets")
{
		$where.= GetFullFieldName("Location", "", false)."=".$cipherer->MakeDBValue("Location",$keys[1-1], "", "", true);
	$showKeys .= " "."Location".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if(!$where)
{
	$strTableName=$oldTableName;
	return;
}
	$str = SecuritySQL("Export");
	if(strlen($str))
		$where.=" and ".$str;
	
	$strWhere = whereAdd($masterQuery->m_where->toSql($masterQuery),$where);
	if(strlen($strWhere))
		$strWhere=" where ".$strWhere." ";
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();

//	$strSQL=AddWhere($strSQL,$where);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$data = $cipherer->DecryptFetchedArray($rs);
	if(!$data)
	{
		$strTableName=$oldTableName;
		return;
	}
	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));
	


//	ID - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"ID", "", PAGE_PRINT), "field=ID".$keylink, "", MODE_PRINT);
			$xt->assign("ID_mastervalue", $value);

//	Location - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"Location", "", PAGE_PRINT), "field=Location".$keylink, "", MODE_PRINT);
			$xt->assign("Location_mastervalue", $value);

//	VRM - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"VRM", "", PAGE_PRINT), "field=VRM".$keylink, "", MODE_PRINT);
			$xt->assign("VRM_mastervalue", $value);

//	Start Date - Short Date
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"Start Date", "Short Date", PAGE_PRINT), "field=Start+Date".$keylink, "", MODE_PRINT);
			$xt->assign("Start_Date_mastervalue", $value);

//	EndDate - Short Date
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"EndDate", "Short Date", PAGE_PRINT), "field=EndDate".$keylink, "", MODE_PRINT);
			$xt->assign("EndDate_mastervalue", $value);

//	Reason - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"Reason", "", PAGE_PRINT), "field=Reason".$keylink, "", MODE_PRINT);
			$xt->assign("Reason_mastervalue", $value);

//	make - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"make", "", PAGE_PRINT), "field=make".$keylink, "", MODE_PRINT);
			$xt->assign("make_mastervalue", $value);

//	colour - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"colour", "", PAGE_PRINT), "field=colour".$keylink, "", MODE_PRINT);
			$xt->assign("colour_mastervalue", $value);

//	contract - 
			$value="";
				$value = ProcessLargeText($settings, GetData($data,"contract", "", PAGE_PRINT), "field=contract".$keylink, "", MODE_PRINT);
			$xt->assign("contract_mastervalue", $value);
	$xt->display("ISHA_Exemptions_masterprint.htm");
	$strTableName=$oldTableName;

}

?>