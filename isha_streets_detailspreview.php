<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/isha_streets_variables.php");

$mode = postvalue("mode");


$cipherer = new RunnerCipherer($strTableName);


include('include/xtempl.php');
$xt = new Xtempl();

$layout = new TLayout("detailspreview","FancyPink","MobilePink");
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();

$layout->containers["dcount"][] = array("name"=>"detailspreviewheader","block"=>"","substyle"=>1);


$layout->containers["dcount"][] = array("name"=>"detailspreviewdetailsfount","block"=>"","substyle"=>1);


$layout->containers["dcount"][] = array("name"=>"detailspreviewdispfirst","block"=>"display_first","substyle"=>1);


$layout->skins["dcount"] = "empty";
$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();

$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields","block"=>"details_data","substyle"=>1);


$layout->skins["detailspreviewgrid"] = "grid";
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["isha_streets_detailspreview"] = $layout;


$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
if($mastertable != "")
{
	$_SESSION[$strTableName."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys))
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$strTableName."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$strTableName."_masterkey".$i]))
		unset($_SESSION[$strTableName."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$strTableName."_mastertable"];

//$strSQL = $gstrSQL;

if($mastertable == "ISHA Exemptions")
{
	$where = "";
		$where .= GetFullFieldName("Location", $strTableName, false)."=".make_db_value("Location",$_SESSION[$strTableName."_masterkey1"]);
}

$str = SecuritySQL("Search");
if(strlen($str))
	$where.=" and ".$str;
$strSQL = $gQuery->gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount = $gQuery->gSQLRowCount($where);

$xt->assign("row_count",$rowcount);
if($rowcount) {
	$xt->assign("details_data",true);
	$rs = db_query($strSQL,$conn);

	$display_count = 10;
	if($mode == "inline")
		$display_count*=2;
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	$data = $cipherer->DecryptFetchedArray($rs);
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));

	
	//	ID - 
		    $value = "";
				if (IsNumberType($gSettings->getFieldType("ID")))
				$value = "<span class='runner-field-number'>".
						ProcessLargeText($gSettings, GetData($data, "ID", "", PAGE_LIST), "field=ID".$keylink, "", MODE_PRINT)."</span>";
			else 
				$value = ProcessLargeText($gSettings, GetData($data, "ID", "", PAGE_LIST), "field=ID".$keylink, "", MODE_PRINT);
			$row["ID_value"] = $value;
	//	Location - 
		    $value = "";
				if (IsNumberType($gSettings->getFieldType("Location")))
				$value = "<span class='runner-field-number'>".
						ProcessLargeText($gSettings, GetData($data, "Location", "", PAGE_LIST), "field=Location".$keylink, "", MODE_PRINT)."</span>";
			else 
				$value = ProcessLargeText($gSettings, GetData($data, "Location", "", PAGE_LIST), "field=Location".$keylink, "", MODE_PRINT);
			$row["Location_value"] = $value;
	//	ACTIVE - 
		    $value = "";
				if (IsNumberType($gSettings->getFieldType("ACTIVE")))
				$value = "<span class='runner-field-number'>".
						ProcessLargeText($gSettings, GetData($data, "ACTIVE", "", PAGE_LIST), "field=ACTIVE".$keylink, "", MODE_PRINT)."</span>";
			else 
				$value = ProcessLargeText($gSettings, GetData($data, "ACTIVE", "", PAGE_LIST), "field=ACTIVE".$keylink, "", MODE_PRINT);
			$row["ACTIVE_value"] = $value;
	//	contract - 
		    $value = "";
				if (IsNumberType($gSettings->getFieldType("contract")))
				$value = "<span class='runner-field-number'>".
						ProcessLargeText($gSettings, GetData($data, "contract", "", PAGE_LIST), "field=contract".$keylink, "", MODE_PRINT)."</span>";
			else 
				$value = ProcessLargeText($gSettings, GetData($data, "contract", "", PAGE_LIST), "field=contract".$keylink, "", MODE_PRINT);
			$row["contract_value"] = $value;
		$rowinfo[] = $row;
		$data = $cipherer->DecryptFetchedArray($rs);
	}
	$xt->assign_loopsection("details_row",$rowinfo);
}
$returnJSON = array("success" => true);
$xt->load_template("isha_streets_detailspreview.htm");
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline"){
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		$rtl = $xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$returnJSON["style"] = "styles/".$layout->style."/style".$rtl;
		$returnJSON["pageStyle"] = "pagestyles/".$layout->name.$rtl;
		$returnJSON["layout"] = $layout->style." page-".$layout->name;
	}	
}	

echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
?>