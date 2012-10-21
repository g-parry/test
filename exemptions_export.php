<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/exemptions_variables.php");


if(isMobile()) {
$layout = new TLayout("export","FancyPink","MobilePink");
$layout->blocks["top"] = array();
$layout->containers["export"] = array();

$layout->containers["export"][] = array("name"=>"exportheader","block"=>"","substyle"=>2);


$layout->containers["export"][] = array("name"=>"exprange_header","block"=>"rangeheader_block","substyle"=>3);


$layout->containers["export"][] = array("name"=>"exprange","block"=>"range_block","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expoutput_header","block"=>"","substyle"=>3);


$layout->containers["export"][] = array("name"=>"expoutput","block"=>"","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expbuttons","block"=>"","substyle"=>2);


$layout->skins["export"] = "fields";
$layout->blocks["top"][] = "export";$page_layouts["exemptions_export"] = $layout;
} else {
$layout = new TLayout("export","FancyPink","MobilePink");
$layout->blocks["top"] = array();
$layout->containers["export"] = array();

$layout->containers["export"][] = array("name"=>"exportheader","block"=>"","substyle"=>2);


$layout->containers["export"][] = array("name"=>"exprange_header","block"=>"rangeheader_block","substyle"=>3);


$layout->containers["export"][] = array("name"=>"exprange","block"=>"range_block","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expoutput_header","block"=>"","substyle"=>3);


$layout->containers["export"][] = array("name"=>"expoutput","block"=>"","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expbuttons","block"=>"","substyle"=>2);


$layout->skins["export"] = "fields";
$layout->blocks["top"][] = "export";$page_layouts["exemptions_export"] = $layout;
}


// Modify query: remove blob fields from fieldlist.
// Blob fields on an export page are shown using imager.php (for example).
// They don't need to be selected from DB in export.php itself.
//$gQuery->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());

$cipherer = new RunnerCipherer($strTableName);

$strWhereClause = "";
$strHavingClause = "";
$strSearchCriteria = "and";
$selected_recs = array();
$options = "1";

header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 
include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();
$id = postvalue("id") != "" ? postvalue("id") : 1;

$phpVersion = (int)substr(phpversion(), 0, 1); 
if($phpVersion > 4)
{
	include("include/export_functions.php");
	$xt->assign("groupExcel", true);
}
else
	$xt->assign("excel", true);

//array of params for classes
$params = array("pageType" => PAGE_EXPORT, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
if(!$eventObj->exists("ListGetRowCount") && !$eventObj->exists("ListQuery"))
	$params["needSearchClauseObj"] = false;
$pageObject = new RunnerPage($params);

//	Before Process event
if($eventObj->exists("BeforeProcessExport"))
	$eventObj->BeforeProcessExport($conn, $pageObject);

if (@$_REQUEST["a"]!="")
{
	$options = "";
	$sWhere = "1=0";	

//	process selection
	$selected_recs = array();
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$keys["ID"] = refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[] = $keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys = array();
			$keys["ID"] = urldecode($arr[0]);
			$selected_recs[] = $keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}


	$strSQL = $gQuery->gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
	
	$_SESSION[$strTableName."_SelectedSQL"] = $strSQL;
	$_SESSION[$strTableName."_SelectedWhere"] = $sWhere;
	$_SESSION[$strTableName."_SelectedRecords"] = $selected_recs;
}

if ($_SESSION[$strTableName."_SelectedSQL"]!="" && @$_REQUEST["records"]=="") 
{
	$strSQL = $_SESSION[$strTableName."_SelectedSQL"];
	$strWhereClause = @$_SESSION[$strTableName."_SelectedWhere"];
	$selected_recs = $_SESSION[$strTableName."_SelectedRecords"];
}
else
{
	$strWhereClause = @$_SESSION[$strTableName."_where"];
	$strHavingClause = @$_SESSION[$strTableName."_having"];
	$strSearchCriteria = @$_SESSION[$strTableName."_criteria"];
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
}

$mypage = 1;
if(@$_REQUEST["type"])
{
//	order by
	$strOrderBy = $_SESSION[$strTableName."_order"];
	if(!$strOrderBy)
		$strOrderBy = $gstrOrderBy;
	$strSQL.=" ".trim($strOrderBy);

	$strSQLbak = $strSQL;
	if($eventObj->exists("BeforeQueryExport"))
		$eventObj->BeforeQueryExport($strSQL,$strWhereClause,$strOrderBy, $pageObject);
//	Rebuild SQL if needed
	if($strSQL!=$strSQLbak)
	{
//	changed $strSQL - old style	
		$numrows=GetRowCount($strSQL);
	}
	else
	{
		$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
		$strSQL.=" ".trim($strOrderBy);
		$rowcount=false;
		if($eventObj->exists("ListGetRowCount"))
		{
			$masterKeysReq=array();
			for($i = 0; $i < count($pageObject->detailKeysByM); $i ++)
				$masterKeysReq[] = $_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount = $eventObj->ListGetRowCount($pageObject->searchClauseObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs, $pageObject);
		}
		if($rowcount !== false)
			$numrows = $rowcount;
		else
			$numrows = $gQuery->gSQLRowCount($strWhereClause,$strHavingClause,$strSearchCriteria);
	}
	LogInfo($strSQL);

//	 Pagination:

	$nPageSize = 0;
	if(@$_REQUEST["records"]=="page" && $numrows)
	{
		$mypage = (integer)@$_SESSION[$strTableName."_pagenumber"];
		$nPageSize = (integer)@$_SESSION[$strTableName."_pagesize"];
		
		if(!$nPageSize)
			$nPageSize = $gSettings->getInitialPageSize();
				
		if($nPageSize<0)
			$nPageSize = 0;
			
		if($nPageSize>0)
		{
			if($numrows<=($mypage-1)*$nPageSize)
				$mypage = ceil($numrows/$nPageSize);
		
			if(!$mypage)
				$mypage = 1;
			
					$strSQL.=" limit ".(($mypage-1)*$nPageSize).",".$nPageSize;
		}
	}
	$listarray = false;
	if($eventObj->exists("ListQuery"))
	{
		$arrFieldForSort = array();
		$arrHowFieldSort = array();
		require_once getabspath('classes\orderclause.php');
		$fieldList = unserialize($_SESSION[$strTableName."_orderFieldsList"]);
		for($i = 0; $i < count($fieldList); $i++)
		{
			$arrFieldForSort[] = $fieldList[$i]->fieldIndex; 
			$arrHowFieldSort[] = $fieldList[$i]->orderDirection; 
		}
		$listarray = $eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort,
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $nPageSize, $mypage, $pageObject);
	}
	if($listarray!==false)
		$rs = $listarray;
	elseif($nPageSize>0)
	{
					$rs = db_query($strSQL,$conn);
	}
	else
		$rs = db_query($strSQL,$conn);

	if(!ini_get("safe_mode"))
		set_time_limit(300);
	
	if(substr(@$_REQUEST["type"],0,5)=="excel")
	{
//	remove grouping
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SMONGROUPING"]="0";
				if($phpVersion > 4)
			ExportToExcel($cipherer, $pageObject);
		else
			ExportToExcel_old($cipherer);
	}
	else if(@$_REQUEST["type"]=="word")
	{
		ExportToWord($cipherer);
	}
	else if(@$_REQUEST["type"]=="xml")
	{
		ExportToXML($cipherer);
	}
	else if(@$_REQUEST["type"]=="csv")
	{
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SDECIMAL"]=".";
		$locale_info["LOCALE_SMONGROUPING"]="0";
		$locale_info["LOCALE_SMONDECIMALSEP"]=".";
		ExportToCSV($cipherer);
	}
	db_close($conn);
	return;
}

// add button events if exist
$pageObject->addButtonHandlers();

if($options)
{
	$xt->assign("rangeheader_block",true);
	$xt->assign("range_block",true);
}

$xt->assign("exportlink_attrs", 'id="saveButton'.$pageObject->id.'"');

$pageObject->body["begin"] .="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";

$pageObject->fillSetCntrlMaps();
$pageObject->body['end'] .= '<script>';
$pageObject->body['end'] .= "window.controlsMap = ".my_json_encode($pageObject->controlsHTMLMap).";";
$pageObject->body['end'] .= "window.settings = ".my_json_encode($pageObject->jsSettings).";";
$pageObject->body['end'] .= '</script>';
$pageObject->body["end"] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerAll.js\"></script>\r\n";
$pageObject->addCommonJs();

$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("exemptions_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=exemptions.xls");

	echo "<html>";
	echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
	
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData($cipherer);

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToWord($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=exemptions.doc");

	echo "<html>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData($cipherer);

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToXML($cipherer)
{
	global $nPageSize,$rs,$strTableName,$conn,$eventObj, $pageObject;
	header("Content-Type: text/xml");
	header("Content-Disposition: attachment;Filename=exemptions.xml");
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);	
	//if(!$row)
	//	return;
		
	global $cCharset;
	
	echo "<?xml version=\"1.0\" encoding=\"".$cCharset."\" standalone=\"yes\"?>\r\n";
	echo "<table>\r\n";
	$i = 0;
	
	while((!$nPageSize || $i<$nPageSize) && $row)
	{
		$values = array();
			$values["ID"] = GetData($row, "ID", "", PAGE_EXPORT);
			$values["Location"] = GetData($row, "Location", "", PAGE_EXPORT);
			$values["VRM"] = GetData($row, "VRM", "", PAGE_EXPORT);
			$values["Start Date"] = GetData($row, "Start Date", "", PAGE_EXPORT);
			$values["EndDate"] = GetData($row, "EndDate", "", PAGE_EXPORT);
			$values["Reason"] = GetData($row, "Reason", "", PAGE_EXPORT);
			$values["make"] = GetData($row, "make", "", PAGE_EXPORT);
			$values["colour"] = GetData($row, "colour", "", PAGE_EXPORT);
			$values["contract"] = GetData($row, "contract", "", PAGE_EXPORT);
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		
		if ($eventRes)
		{
			$i++;
			echo "<row>\r\n";
			foreach ($values as $fName => $val)
			{
				$field = htmlspecialchars(XMLNameEncode($fName));
				echo "<".$field.">";
				echo htmlspecialchars($values[$fName]);
				echo "</".$field.">\r\n";
			}
			echo "</row>\r\n";
		}
		
		
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
	}
	echo "</table>\r\n";
}

function ExportToCSV($cipherer)
{
	global $rs,$nPageSize,$strTableName,$conn,$eventObj, $pageObject;
	header("Content-Type: application/csv");
	header("Content-Disposition: attachment;Filename=exemptions.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ID\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Location\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"VRM\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Start Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EndDate\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Reason\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"make\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"colour\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"contract\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
				$format = "";
			$values["ID"] = GetData($row, "ID", $format, PAGE_EXPORT);
				$format = "";
			$values["Location"] = GetData($row, "Location", $format, PAGE_EXPORT);
				$format = "";
			$values["VRM"] = GetData($row, "VRM", $format, PAGE_EXPORT);
				$format = "Short Date";
			$values["Start Date"] = GetData($row, "Start Date", $format, PAGE_EXPORT);
				$format = "Short Date";
			$values["EndDate"] = GetData($row, "EndDate", $format, PAGE_EXPORT);
				$format = "";
			$values["Reason"] = GetData($row, "Reason", $format, PAGE_EXPORT);
				$format = "";
			$values["make"] = GetData($row, "make", $format, PAGE_EXPORT);
				$format = "";
			$values["colour"] = GetData($row, "colour", $format, PAGE_EXPORT);
				$format = "";
			$values["contract"] = GetData($row, "contract", $format, PAGE_EXPORT);

		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row,$values, $pageObject);
		}
		if ($eventRes)
		{
			$outstr="";
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ID"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Location"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["VRM"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Start Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EndDate"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Reason"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["make"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["colour"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["contract"]).'"';
			echo $outstr;
		}
		
		$iNumberOfRows++;
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
			
		if(((!$nPageSize || $iNumberOfRows<$nPageSize) && $row) && $eventRes)
			echo "\r\n";
	}
}

function WriteTableData($cipherer)
{
	global $rs,$nPageSize,$strTableName,$conn,$eventObj, $pageObject;
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);
//	if(!$row)
//		return;
// write header
	echo "<tr>";
	if($_REQUEST["type"]=="excel")
	{
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ID").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Location").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("VRM").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Start Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("End Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Reason").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Make").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Colour").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Contract").'</td>';	
	}
	else
	{
		echo "<td>"."ID"."</td>";
		echo "<td>"."Location"."</td>";
		echo "<td>"."VRM"."</td>";
		echo "<td>"."Start Date"."</td>";
		echo "<td>"."End Date"."</td>";
		echo "<td>"."Reason"."</td>";
		echo "<td>"."Make"."</td>";
		echo "<td>"."Colour"."</td>";
		echo "<td>"."Contract"."</td>";
	}
	echo "</tr>";
			$totals = array();
		$totals["ID"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"ID", 'totalsType'=>'', 'viewFormat'=>"");
			$totals["Location"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"Location", 'totalsType'=>'', 'viewFormat'=>"");
			$totals["VRM"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"VRM", 'totalsType'=>'', 'viewFormat'=>"");
			$totals["Start Date"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"Start Date", 'totalsType'=>'', 'viewFormat'=>"Short Date");
			$totals["EndDate"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"EndDate", 'totalsType'=>'', 'viewFormat'=>"Short Date");
			$totals["Reason"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"Reason", 'totalsType'=>'', 'viewFormat'=>"");
			$totals["make"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"make", 'totalsType'=>'', 'viewFormat'=>"");
			$totals["colour"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"colour", 'totalsType'=>'', 'viewFormat'=>"");
			$totals["contract"] = array("value" => 0, "numRows" => 0);
		$totalsFields[] = array('fName'=>"contract", 'totalsType'=>'', 'viewFormat'=>"");
	
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
									$format = "";
			
			$values["ID"] = GetData($row, "ID", $format, PAGE_EXPORT);
									$format = "";
			
			$values["Location"] = GetData($row, "Location", $format, PAGE_EXPORT);
									$format = "";
			
			$values["VRM"] = GetData($row, "VRM", $format, PAGE_EXPORT);
									$format = "Short Date";
			
			$values["Start Date"] = GetData($row, "Start Date", $format, PAGE_EXPORT);
									$format = "Short Date";
			
			$values["EndDate"] = GetData($row, "EndDate", $format, PAGE_EXPORT);
									$format = "";
			
			$values["Reason"] = GetData($row, "Reason", $format, PAGE_EXPORT);
									$format = "";
			
			$values["make"] = GetData($row, "make", $format, PAGE_EXPORT);
									$format = "";
			
			$values["colour"] = GetData($row, "colour", $format, PAGE_EXPORT);
									$format = "";
			
			$values["contract"] = GetData($row, "contract", $format, PAGE_EXPORT);
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		}
		if ($eventRes)
		{
			$iNumberOfRows++;
			echo "<tr>";
		
							echo '<td>';
			
									$format = "";
									echo htmlspecialchars($values["ID"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									$format = "";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Location"]);
					else
						echo htmlspecialchars($values["Location"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									$format = "";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["VRM"]);
					else
						echo htmlspecialchars($values["VRM"]);
			echo '</td>';
							echo '<td>';
			
									$format = "Short Date";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Start Date"]);
					else
						echo htmlspecialchars($values["Start Date"]);
			echo '</td>';
							echo '<td>';
			
									$format = "Short Date";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["EndDate"]);
					else
						echo htmlspecialchars($values["EndDate"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									$format = "";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Reason"]);
					else
						echo htmlspecialchars($values["Reason"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									$format = "";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["make"]);
					else
						echo htmlspecialchars($values["make"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									$format = "";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["colour"]);
					else
						echo htmlspecialchars($values["colour"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									$format = "";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["contract"]);
					else
						echo htmlspecialchars($values["contract"]);
			echo '</td>';
			echo "</tr>";
		}
		
		
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
	}
	
}

function XMLNameEncode($strValue)
{
	$search = array(" ","#","'","/","\\","(",")",",","[");
	$ret = str_replace($search,"",$strValue);
	$search = array("]","+","\"","-","_","|","}","{","=");
	$ret = str_replace($search,"",$ret);
	return $ret;
}

function PrepareForExcel($str)
{
	$ret = htmlspecialchars($str);
	if (substr($ret,0,1)== "=") 
		$ret = "&#61;".substr($ret,1);
	return $ret;

}

function countTotals(&$totals, $totalsFields, $data)
{
	for($i = 0; $i < count($totalsFields); $i ++) 
	{
		if($totalsFields[$i]['totalsType'] == 'COUNT') 
			$totals[$totalsFields[$i]['fName']]["value"] += ($data[$totalsFields[$i]['fName']]!= "");
		else if($totalsFields[$i]['viewFormat'] == "Time") 
		{
			$time = GetTotalsForTime($data[$totalsFields[$i]['fName']]);
			$totals[$totalsFields[$i]['fName']]["value"] += $time[2]+$time[1]*60 + $time[0]*3600;
		} 
		else 
			$totals[$totalsFields[$i]['fName']]["value"] += ($data[$totalsFields[$i]['fName']]+ 0);
		
		if($totalsFields[$i]['totalsType'] == 'AVERAGE')
		{
			if(!is_null($data[$totalsFields[$i]['fName']]) && $data[$totalsFields[$i]['fName']]!=="")
				$totals[$totalsFields[$i]['fName']]['numRows']++;
		}
	}
}
?>
