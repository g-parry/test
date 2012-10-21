<?php
require_once(getabspath("classes/cipherer.php"));
$tdataexemptions_Report = array();
	$tdataexemptions_Report[".NumberOfChars"] = 80; 
	$tdataexemptions_Report[".ShortName"] = "exemptions_Report";
	$tdataexemptions_Report[".OwnerID"] = "";
	$tdataexemptions_Report[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsexemptions_Report = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsexemptions_Report["English"] = array();
	$fieldToolTipsexemptions_Report["English"] = array();
	$fieldLabelsexemptions_Report["English"]["Location"] = "Location";
	$fieldToolTipsexemptions_Report["English"]["Location"] = "";
	$fieldLabelsexemptions_Report["English"]["COUNT_Location_"] = "COUNT(Location)";
	$fieldToolTipsexemptions_Report["English"]["COUNT(Location)"] = "";
	if (count($fieldToolTipsexemptions_Report["English"]))
		$tdataexemptions_Report[".isUseToolTips"] = true;
}
	
	
	$tdataexemptions_Report[".NCSearch"] = true;



$tdataexemptions_Report[".shortTableName"] = "exemptions_Report";
$tdataexemptions_Report[".nSecOptions"] = 0;
$tdataexemptions_Report[".recsPerRowList"] = 1;
$tdataexemptions_Report[".mainTableOwnerID"] = "";
$tdataexemptions_Report[".moveNext"] = 1;
$tdataexemptions_Report[".nType"] = 2;




$tdataexemptions_Report[".showAddInPopup"] = false;

$tdataexemptions_Report[".showEditInPopup"] = false;

$tdataexemptions_Report[".showViewInPopup"] = false;

$tdataexemptions_Report[".fieldsForRegister"] = array();

$tdataexemptions_Report[".listAjax"] = false;

	$tdataexemptions_Report[".audit"] = false;

	$tdataexemptions_Report[".locking"] = false;

$tdataexemptions_Report[".listIcons"] = true;
$tdataexemptions_Report[".edit"] = true;
$tdataexemptions_Report[".inlineEdit"] = true;
$tdataexemptions_Report[".inlineAdd"] = true;
$tdataexemptions_Report[".view"] = true;

$tdataexemptions_Report[".exportTo"] = true;

$tdataexemptions_Report[".printFriendly"] = true;

$tdataexemptions_Report[".delete"] = true;

$tdataexemptions_Report[".showSimpleSearchOptions"] = false;

$tdataexemptions_Report[".showSearchPanel"] = true;

if (isMobile())
	$tdataexemptions_Report[".isUseAjaxSuggest"] = false;
else 
	$tdataexemptions_Report[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataexemptions_Report[".addPageEvents"] = false;

// use datepicker for search panel
$tdataexemptions_Report[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataexemptions_Report[".isUseTimeForSearch"] = false;






$tdataexemptions_Report[".allSearchFields"] = array();

$tdataexemptions_Report[".allSearchFields"][] = "Location";
$tdataexemptions_Report[".allSearchFields"][] = "COUNT(Location)";

$tdataexemptions_Report[".googleLikeFields"][] = "Location";
$tdataexemptions_Report[".googleLikeFields"][] = "COUNT(Location)";


$tdataexemptions_Report[".advSearchFields"][] = "Location";
$tdataexemptions_Report[".advSearchFields"][] = "COUNT(Location)";

$tdataexemptions_Report[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataexemptions_Report[".strOrderBy"] = $tstrOrderBy;

$tdataexemptions_Report[".orderindexes"] = array();

$tdataexemptions_Report[".sqlHead"] = "SELECT Location,  COUNT(Location) AS `COUNT(Location)`";
$tdataexemptions_Report[".sqlFrom"] = "FROM exemptions";
$tdataexemptions_Report[".sqlWhereExpr"] = "";
$tdataexemptions_Report[".sqlTail"] = "GROUP BY Location";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataexemptions_Report[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataexemptions_Report[".arrGroupsPerPage"] = $arrGPP;

$tableKeysexemptions_Report = array();
$tdataexemptions_Report[".Keys"] = $tableKeysexemptions_Report;

$tdataexemptions_Report[".listFields"] = array();
$tdataexemptions_Report[".listFields"][] = "Location";
$tdataexemptions_Report[".listFields"][] = "COUNT(Location)";

$tdataexemptions_Report[".addFields"] = array();
$tdataexemptions_Report[".addFields"][] = "Location";

$tdataexemptions_Report[".inlineAddFields"] = array();
$tdataexemptions_Report[".inlineAddFields"][] = "Location";
$tdataexemptions_Report[".inlineAddFields"][] = "COUNT(Location)";

$tdataexemptions_Report[".editFields"] = array();
$tdataexemptions_Report[".editFields"][] = "Location";

$tdataexemptions_Report[".inlineEditFields"] = array();
$tdataexemptions_Report[".inlineEditFields"][] = "Location";
$tdataexemptions_Report[".inlineEditFields"][] = "COUNT(Location)";

$tdataexemptions_Report[".exportFields"] = array();
$tdataexemptions_Report[".exportFields"][] = "Location";
$tdataexemptions_Report[".exportFields"][] = "COUNT(Location)";
	
//	Location
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Location";
	$fdata["GoodName"] = "Location";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Location"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Location"; 
		$fdata["FullName"] = "Location";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataexemptions_Report["Location"] = $fdata;
//	COUNT(Location)
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "COUNT(Location)";
	$fdata["GoodName"] = "COUNT_Location_";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "COUNT(Location)"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "COUNT(Location)"; 
		$fdata["FullName"] = "COUNT(Location)";
	
				
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
					
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataexemptions_Report["COUNT(Location)"] = $fdata;

	
$tables_data["exemptions Report"]=&$tdataexemptions_Report;
$field_labels["exemptions_Report"] = &$fieldLabelsexemptions_Report;
$fieldToolTips["exemptions Report"] = &$fieldToolTipsexemptions_Report;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["exemptions Report"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["exemptions Report"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_exemptions_Report()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Location,  COUNT(Location) AS `COUNT(Location)`";
$proto0["m_strFrom"] = "FROM exemptions";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "GROUP BY Location";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$proto8=array();
$proto8["m_functiontype"] = "SQLF_COUNT";
$proto8["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto8["m_arguments"][]=$obj;
$proto8["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto8);

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "COUNT(Location)";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto10=array();
$proto10["m_link"] = "SQLL_MAIN";
			$proto11=array();
$proto11["m_strName"] = "exemptions";
$proto11["m_columns"] = array();
$proto11["m_columns"][] = "ID";
$proto11["m_columns"][] = "Location";
$proto11["m_columns"][] = "VRM";
$proto11["m_columns"][] = "Start Date";
$proto11["m_columns"][] = "EndDate";
$proto11["m_columns"][] = "Reason";
$proto11["m_columns"][] = "make";
$proto11["m_columns"][] = "colour";
$proto11["m_columns"][] = "contract";
$obj = new SQLTable($proto11);

$proto10["m_table"] = $obj;
$proto10["m_alias"] = "";
$proto12=array();
$proto12["m_sql"] = "";
$proto12["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto12["m_column"]=$obj;
$proto12["m_contained"] = array();
$proto12["m_strCase"] = "";
$proto12["m_havingmode"] = "0";
$proto12["m_inBrackets"] = "0";
$proto12["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto12);

$proto10["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto10);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto14=array();
						$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto14["m_column"]=$obj;
$obj = new SQLGroupByItem($proto14);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_exemptions_Report = createSqlQuery_exemptions_Report();
		$tdataexemptions_Report[".sqlquery"] = $queryData_exemptions_Report;
	
if(isset($tdataexemptions_Report["field2"])){
	$tdataexemptions_Report["field2"]["LookupTable"] = "carscars_view";
	$tdataexemptions_Report["field2"]["LookupOrderBy"] = "name";
	$tdataexemptions_Report["field2"]["LookupType"] = 4;
	$tdataexemptions_Report["field2"]["LinkField"] = "email";
	$tdataexemptions_Report["field2"]["DisplayField"] = "name";
	$tdataexemptions_Report[".hasCustomViewField"] = true;
}

$tableEvents["exemptions Report"] = new eventsBase;
$tdataexemptions_Report[".hasEvents"] = false;

$cipherer = new RunnerCipherer("exemptions Report");

?>