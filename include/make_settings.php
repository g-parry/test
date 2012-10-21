<?php
require_once(getabspath("classes/cipherer.php"));
$tdatamake = array();
	$tdatamake[".NumberOfChars"] = 80; 
	$tdatamake[".ShortName"] = "make";
	$tdatamake[".OwnerID"] = "";
	$tdatamake[".OriginalTable"] = "make";

//	field labels
$fieldLabelsmake = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsmake["English"] = array();
	$fieldToolTipsmake["English"] = array();
	$fieldLabelsmake["English"]["make"] = "Make";
	$fieldToolTipsmake["English"]["make"] = "";
	if (count($fieldToolTipsmake["English"]))
		$tdatamake[".isUseToolTips"] = true;
}
	
	
	$tdatamake[".NCSearch"] = true;



$tdatamake[".shortTableName"] = "make";
$tdatamake[".nSecOptions"] = 0;
$tdatamake[".recsPerRowList"] = 1;
$tdatamake[".mainTableOwnerID"] = "";
$tdatamake[".moveNext"] = 1;
$tdatamake[".nType"] = 0;




$tdatamake[".showAddInPopup"] = false;

$tdatamake[".showEditInPopup"] = false;

$tdatamake[".showViewInPopup"] = false;

$tdatamake[".fieldsForRegister"] = array();

$tdatamake[".listAjax"] = false;

	$tdatamake[".audit"] = false;

	$tdatamake[".locking"] = false;

$tdatamake[".listIcons"] = true;

$tdatamake[".exportTo"] = true;

$tdatamake[".printFriendly"] = true;


$tdatamake[".showSimpleSearchOptions"] = false;

$tdatamake[".showSearchPanel"] = true;

if (isMobile())
	$tdatamake[".isUseAjaxSuggest"] = false;
else 
	$tdatamake[".isUseAjaxSuggest"] = true;

$tdatamake[".rowHighlite"] = true;

// button handlers file names

$tdatamake[".addPageEvents"] = false;

// use datepicker for search panel
$tdatamake[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatamake[".isUseTimeForSearch"] = false;






$tdatamake[".allSearchFields"] = array();

$tdatamake[".allSearchFields"][] = "make";

$tdatamake[".googleLikeFields"][] = "make";


$tdatamake[".advSearchFields"][] = "make";

$tdatamake[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatamake[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatamake[".strOrderBy"] = $tstrOrderBy;

$tdatamake[".orderindexes"] = array();

$tdatamake[".sqlHead"] = "SELECT make";
$tdatamake[".sqlFrom"] = "FROM make";
$tdatamake[".sqlWhereExpr"] = "";
$tdatamake[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatamake[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatamake[".arrGroupsPerPage"] = $arrGPP;

$tableKeysmake = array();
$tdatamake[".Keys"] = $tableKeysmake;

$tdatamake[".listFields"] = array();
$tdatamake[".listFields"][] = "make";

$tdatamake[".addFields"] = array();
$tdatamake[".addFields"][] = "make";

$tdatamake[".inlineAddFields"] = array();
$tdatamake[".inlineAddFields"][] = "make";

$tdatamake[".editFields"] = array();
$tdatamake[".editFields"][] = "make";

$tdatamake[".inlineEditFields"] = array();
$tdatamake[".inlineEditFields"][] = "make";

$tdatamake[".exportFields"] = array();
$tdatamake[".exportFields"][] = "make";
	
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "make";
	$fdata["Label"] = "Make"; 
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
	
		$fdata["strField"] = "make"; 
		$fdata["FullName"] = "make";
	
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
	
	$tdatamake["make"] = $fdata;

	
$tables_data["make"]=&$tdatamake;
$field_labels["make"] = &$fieldLabelsmake;
$fieldToolTips["make"] = &$fieldToolTipsmake;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["make"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["make"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_make()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "make";
$proto0["m_strFrom"] = "FROM make";
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
	"m_strName" => "make",
	"m_strTable" => "make"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto7=array();
$proto7["m_link"] = "SQLL_MAIN";
			$proto8=array();
$proto8["m_strName"] = "make";
$proto8["m_columns"] = array();
$proto8["m_columns"][] = "make";
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
$queryData_make = createSqlQuery_make();
	$tdatamake[".sqlquery"] = $queryData_make;
	
if(isset($tdatamake["field2"])){
	$tdatamake["field2"]["LookupTable"] = "carscars_view";
	$tdatamake["field2"]["LookupOrderBy"] = "name";
	$tdatamake["field2"]["LookupType"] = 4;
	$tdatamake["field2"]["LinkField"] = "email";
	$tdatamake["field2"]["DisplayField"] = "name";
	$tdatamake[".hasCustomViewField"] = true;
}

$tableEvents["make"] = new eventsBase;
$tdatamake[".hasEvents"] = false;

$cipherer = new RunnerCipherer("make");

?>