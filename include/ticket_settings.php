<?php
require_once(getabspath("classes/cipherer.php"));
$tdataticket = array();
	$tdataticket[".NumberOfChars"] = 80; 
	$tdataticket[".ShortName"] = "ticket";
	$tdataticket[".OwnerID"] = "";
	$tdataticket[".OriginalTable"] = "ticket";

//	field labels
$fieldLabelsticket = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsticket["English"] = array();
	$fieldToolTipsticket["English"] = array();
	$fieldLabelsticket["English"]["ID"] = "ID";
	$fieldToolTipsticket["English"]["ID"] = "";
	$fieldLabelsticket["English"]["location"] = "Location";
	$fieldToolTipsticket["English"]["location"] = "";
	$fieldLabelsticket["English"]["VRM"] = "VRM";
	$fieldToolTipsticket["English"]["VRM"] = "";
	$fieldLabelsticket["English"]["make"] = "Make";
	$fieldToolTipsticket["English"]["make"] = "";
	$fieldLabelsticket["English"]["colour"] = "Colour";
	$fieldToolTipsticket["English"]["colour"] = "";
	$fieldLabelsticket["English"]["notes"] = "Notes";
	$fieldToolTipsticket["English"]["notes"] = "";
	$fieldLabelsticket["English"]["date"] = "Date";
	$fieldToolTipsticket["English"]["date"] = "";
	if (count($fieldToolTipsticket["English"]))
		$tdataticket[".isUseToolTips"] = true;
}
	
	
	$tdataticket[".NCSearch"] = true;



$tdataticket[".shortTableName"] = "ticket";
$tdataticket[".nSecOptions"] = 0;
$tdataticket[".recsPerRowList"] = 1;
$tdataticket[".mainTableOwnerID"] = "";
$tdataticket[".moveNext"] = 1;
$tdataticket[".nType"] = 0;




$tdataticket[".showAddInPopup"] = false;

$tdataticket[".showEditInPopup"] = false;

$tdataticket[".showViewInPopup"] = false;

$tdataticket[".fieldsForRegister"] = array();

$tdataticket[".listAjax"] = false;

	$tdataticket[".audit"] = false;

	$tdataticket[".locking"] = false;

$tdataticket[".listIcons"] = true;
$tdataticket[".edit"] = true;
$tdataticket[".inlineEdit"] = true;
$tdataticket[".inlineAdd"] = true;
$tdataticket[".view"] = true;

$tdataticket[".exportTo"] = true;

$tdataticket[".printFriendly"] = true;

$tdataticket[".delete"] = true;

$tdataticket[".showSimpleSearchOptions"] = false;

$tdataticket[".showSearchPanel"] = true;

if (isMobile())
	$tdataticket[".isUseAjaxSuggest"] = false;
else 
	$tdataticket[".isUseAjaxSuggest"] = true;

$tdataticket[".rowHighlite"] = true;

// button handlers file names

$tdataticket[".addPageEvents"] = false;

// use datepicker for search panel
$tdataticket[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataticket[".isUseTimeForSearch"] = false;






$tdataticket[".allSearchFields"] = array();

$tdataticket[".allSearchFields"][] = "ID";
$tdataticket[".allSearchFields"][] = "location";
$tdataticket[".allSearchFields"][] = "VRM";
$tdataticket[".allSearchFields"][] = "make";
$tdataticket[".allSearchFields"][] = "colour";
$tdataticket[".allSearchFields"][] = "notes";
$tdataticket[".allSearchFields"][] = "date";

$tdataticket[".googleLikeFields"][] = "ID";
$tdataticket[".googleLikeFields"][] = "location";
$tdataticket[".googleLikeFields"][] = "VRM";
$tdataticket[".googleLikeFields"][] = "make";
$tdataticket[".googleLikeFields"][] = "colour";
$tdataticket[".googleLikeFields"][] = "notes";
$tdataticket[".googleLikeFields"][] = "date";


$tdataticket[".advSearchFields"][] = "ID";
$tdataticket[".advSearchFields"][] = "location";
$tdataticket[".advSearchFields"][] = "VRM";
$tdataticket[".advSearchFields"][] = "make";
$tdataticket[".advSearchFields"][] = "colour";
$tdataticket[".advSearchFields"][] = "notes";
$tdataticket[".advSearchFields"][] = "date";

$tdataticket[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataticket[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataticket[".strOrderBy"] = $tstrOrderBy;

$tdataticket[".orderindexes"] = array();

$tdataticket[".sqlHead"] = "SELECT ID,   location,   VRM,   make,   colour,   notes,   `date`";
$tdataticket[".sqlFrom"] = "FROM ticket";
$tdataticket[".sqlWhereExpr"] = "";
$tdataticket[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataticket[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataticket[".arrGroupsPerPage"] = $arrGPP;

$tableKeysticket = array();
$tableKeysticket[] = "ID";
$tdataticket[".Keys"] = $tableKeysticket;

$tdataticket[".listFields"] = array();
$tdataticket[".listFields"][] = "ID";
$tdataticket[".listFields"][] = "location";
$tdataticket[".listFields"][] = "VRM";
$tdataticket[".listFields"][] = "make";
$tdataticket[".listFields"][] = "colour";
$tdataticket[".listFields"][] = "notes";
$tdataticket[".listFields"][] = "date";

$tdataticket[".addFields"] = array();
$tdataticket[".addFields"][] = "location";
$tdataticket[".addFields"][] = "VRM";
$tdataticket[".addFields"][] = "make";
$tdataticket[".addFields"][] = "colour";
$tdataticket[".addFields"][] = "notes";
$tdataticket[".addFields"][] = "date";

$tdataticket[".inlineAddFields"] = array();
$tdataticket[".inlineAddFields"][] = "location";
$tdataticket[".inlineAddFields"][] = "VRM";
$tdataticket[".inlineAddFields"][] = "make";
$tdataticket[".inlineAddFields"][] = "colour";
$tdataticket[".inlineAddFields"][] = "notes";
$tdataticket[".inlineAddFields"][] = "date";

$tdataticket[".editFields"] = array();
$tdataticket[".editFields"][] = "location";
$tdataticket[".editFields"][] = "VRM";
$tdataticket[".editFields"][] = "make";
$tdataticket[".editFields"][] = "colour";
$tdataticket[".editFields"][] = "notes";
$tdataticket[".editFields"][] = "date";

$tdataticket[".inlineEditFields"] = array();
$tdataticket[".inlineEditFields"][] = "location";
$tdataticket[".inlineEditFields"][] = "VRM";
$tdataticket[".inlineEditFields"][] = "make";
$tdataticket[".inlineEditFields"][] = "colour";
$tdataticket[".inlineEditFields"][] = "notes";
$tdataticket[".inlineEditFields"][] = "date";

$tdataticket[".exportFields"] = array();
$tdataticket[".exportFields"][] = "ID";
$tdataticket[".exportFields"][] = "location";
$tdataticket[".exportFields"][] = "VRM";
$tdataticket[".exportFields"][] = "make";
$tdataticket[".exportFields"][] = "colour";
$tdataticket[".exportFields"][] = "notes";
$tdataticket[".exportFields"][] = "date";
	
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ID";
	
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

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		$edata["EditParams"] = "";
					
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataticket["ID"] = $fdata;
//	location
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "location";
	$fdata["GoodName"] = "location";
	$fdata["ownerTable"] = "ticket";
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
	
		$fdata["strField"] = "location"; 
		$fdata["FullName"] = "location";
	
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
			$edata["EditParams"].= " maxlength=150";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataticket["location"] = $fdata;
//	VRM
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "VRM";
	$fdata["GoodName"] = "VRM";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "VRM"; 
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
	
		$fdata["strField"] = "VRM"; 
		$fdata["FullName"] = "VRM";
	
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
			$edata["EditParams"].= " maxlength=15";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataticket["VRM"] = $fdata;
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "ticket";
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
	
	$tdataticket["make"] = $fdata;
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "ticket";
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
	
	$tdataticket["colour"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Notes"; 
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
	
		$fdata["strField"] = "notes"; 
		$fdata["FullName"] = "notes";
	
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
			$edata["EditParams"].= " maxlength=255";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataticket["notes"] = $fdata;
//	date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "date";
	$fdata["GoodName"] = "date";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Date"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "date"; 
		$fdata["FullName"] = "`date`";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataticket["date"] = $fdata;

	
$tables_data["ticket"]=&$tdataticket;
$field_labels["ticket"] = &$fieldLabelsticket;
$fieldToolTips["ticket"] = &$fieldToolTipsticket;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ticket"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["ticket"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_ticket()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   location,   VRM,   make,   colour,   notes,   `date`";
$proto0["m_strFrom"] = "FROM ticket";
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
	"m_strName" => "ID",
	"m_strTable" => "ticket"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "location",
	"m_strTable" => "ticket"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "ticket"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "make",
	"m_strTable" => "ticket"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "colour",
	"m_strTable" => "ticket"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "ticket"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "date",
	"m_strTable" => "ticket"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "ticket";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "ID";
$proto20["m_columns"][] = "location";
$proto20["m_columns"][] = "VRM";
$proto20["m_columns"][] = "make";
$proto20["m_columns"][] = "colour";
$proto20["m_columns"][] = "notes";
$proto20["m_columns"][] = "date";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_ticket = createSqlQuery_ticket();
							$tdataticket[".sqlquery"] = $queryData_ticket;
	
if(isset($tdataticket["field2"])){
	$tdataticket["field2"]["LookupTable"] = "carscars_view";
	$tdataticket["field2"]["LookupOrderBy"] = "name";
	$tdataticket["field2"]["LookupType"] = 4;
	$tdataticket["field2"]["LinkField"] = "email";
	$tdataticket["field2"]["DisplayField"] = "name";
	$tdataticket[".hasCustomViewField"] = true;
}

$tableEvents["ticket"] = new eventsBase;
$tdataticket[".hasEvents"] = false;

$cipherer = new RunnerCipherer("ticket");

?>