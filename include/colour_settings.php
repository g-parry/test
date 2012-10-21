<?php
require_once(getabspath("classes/cipherer.php"));
$tdatacolour = array();
	$tdatacolour[".NumberOfChars"] = 80; 
	$tdatacolour[".ShortName"] = "colour";
	$tdatacolour[".OwnerID"] = "";
	$tdatacolour[".OriginalTable"] = "colour";

//	field labels
$fieldLabelscolour = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscolour["English"] = array();
	$fieldToolTipscolour["English"] = array();
	$fieldLabelscolour["English"]["colour"] = "Colour";
	$fieldToolTipscolour["English"]["colour"] = "";
	if (count($fieldToolTipscolour["English"]))
		$tdatacolour[".isUseToolTips"] = true;
}
	
	
	$tdatacolour[".NCSearch"] = true;



$tdatacolour[".shortTableName"] = "colour";
$tdatacolour[".nSecOptions"] = 0;
$tdatacolour[".recsPerRowList"] = 1;
$tdatacolour[".mainTableOwnerID"] = "";
$tdatacolour[".moveNext"] = 1;
$tdatacolour[".nType"] = 0;




$tdatacolour[".showAddInPopup"] = false;

$tdatacolour[".showEditInPopup"] = false;

$tdatacolour[".showViewInPopup"] = false;

$tdatacolour[".fieldsForRegister"] = array();

$tdatacolour[".listAjax"] = false;

	$tdatacolour[".audit"] = false;

	$tdatacolour[".locking"] = false;

$tdatacolour[".listIcons"] = true;

$tdatacolour[".exportTo"] = true;

$tdatacolour[".printFriendly"] = true;


$tdatacolour[".showSimpleSearchOptions"] = false;

$tdatacolour[".showSearchPanel"] = true;

if (isMobile())
	$tdatacolour[".isUseAjaxSuggest"] = false;
else 
	$tdatacolour[".isUseAjaxSuggest"] = true;

$tdatacolour[".rowHighlite"] = true;

// button handlers file names

$tdatacolour[".addPageEvents"] = false;

// use datepicker for search panel
$tdatacolour[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacolour[".isUseTimeForSearch"] = false;






$tdatacolour[".allSearchFields"] = array();

$tdatacolour[".allSearchFields"][] = "colour";

$tdatacolour[".googleLikeFields"][] = "colour";


$tdatacolour[".advSearchFields"][] = "colour";

$tdatacolour[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatacolour[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatacolour[".strOrderBy"] = $tstrOrderBy;

$tdatacolour[".orderindexes"] = array();

$tdatacolour[".sqlHead"] = "SELECT colour";
$tdatacolour[".sqlFrom"] = "FROM colour";
$tdatacolour[".sqlWhereExpr"] = "";
$tdatacolour[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacolour[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacolour[".arrGroupsPerPage"] = $arrGPP;

$tableKeyscolour = array();
$tdatacolour[".Keys"] = $tableKeyscolour;

$tdatacolour[".listFields"] = array();
$tdatacolour[".listFields"][] = "colour";

$tdatacolour[".addFields"] = array();
$tdatacolour[".addFields"][] = "colour";

$tdatacolour[".inlineAddFields"] = array();
$tdatacolour[".inlineAddFields"][] = "colour";

$tdatacolour[".editFields"] = array();
$tdatacolour[".editFields"][] = "colour";

$tdatacolour[".inlineEditFields"] = array();
$tdatacolour[".inlineEditFields"][] = "colour";

$tdatacolour[".exportFields"] = array();
$tdatacolour[".exportFields"][] = "colour";
	
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "colour";
	$fdata["Label"] = "Colour"; 
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
	
		$fdata["strField"] = "colour"; 
		$fdata["FullName"] = "colour";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdatacolour["colour"] = $fdata;

	
$tables_data["colour"]=&$tdatacolour;
$field_labels["colour"] = &$fieldLabelscolour;
$fieldToolTips["colour"] = &$fieldToolTipscolour;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["colour"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["colour"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_colour()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "colour";
$proto0["m_strFrom"] = "FROM colour";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
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
	"m_strName" => "colour",
	"m_strTable" => "colour"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto7=array();
$proto7["m_link"] = "SQLL_MAIN";
			$proto8=array();
$proto8["m_strName"] = "colour";
$proto8["m_columns"] = array();
$proto8["m_columns"][] = "colour";
$obj = new SQLTable($proto8);

$proto7["m_table"] = $obj;
$proto7["m_alias"] = "";
$proto9=array();
$proto9["m_sql"] = "";
$proto9["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto9["m_column"]=$obj;
$proto9["m_contained"] = array();
$proto9["m_strCase"] = "";
$proto9["m_havingmode"] = "0";
$proto9["m_inBrackets"] = "0";
$proto9["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto9);

$proto7["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto7);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_colour = createSqlQuery_colour();
	$tdatacolour[".sqlquery"] = $queryData_colour;
	
if(isset($tdatacolour["field2"])){
	$tdatacolour["field2"]["LookupTable"] = "carscars_view";
	$tdatacolour["field2"]["LookupOrderBy"] = "name";
	$tdatacolour["field2"]["LookupType"] = 4;
	$tdatacolour["field2"]["LinkField"] = "email";
	$tdatacolour["field2"]["DisplayField"] = "name";
	$tdatacolour[".hasCustomViewField"] = true;
}

$tableEvents["colour"] = new eventsBase;
$tdatacolour[".hasEvents"] = false;

$cipherer = new RunnerCipherer("colour");

?>