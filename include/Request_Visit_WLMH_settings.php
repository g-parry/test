<?php
require_once(getabspath("classes/cipherer.php"));
$tdataRequest_Visit_WLMH = array();
	$tdataRequest_Visit_WLMH[".NumberOfChars"] = 80; 
	$tdataRequest_Visit_WLMH[".ShortName"] = "Request_Visit_WLMH";
	$tdataRequest_Visit_WLMH[".OwnerID"] = "";
	$tdataRequest_Visit_WLMH[".OriginalTable"] = "ticket";

//	field labels
$fieldLabelsRequest_Visit_WLMH = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsRequest_Visit_WLMH["English"] = array();
	$fieldToolTipsRequest_Visit_WLMH["English"] = array();
	$fieldLabelsRequest_Visit_WLMH["English"]["ID"] = "ID";
	$fieldToolTipsRequest_Visit_WLMH["English"]["ID"] = "";
	$fieldLabelsRequest_Visit_WLMH["English"]["location"] = "Location";
	$fieldToolTipsRequest_Visit_WLMH["English"]["location"] = "";
	$fieldLabelsRequest_Visit_WLMH["English"]["VRM"] = "VRM";
	$fieldToolTipsRequest_Visit_WLMH["English"]["VRM"] = "";
	$fieldLabelsRequest_Visit_WLMH["English"]["make"] = "Make";
	$fieldToolTipsRequest_Visit_WLMH["English"]["make"] = "";
	$fieldLabelsRequest_Visit_WLMH["English"]["colour"] = "Colour";
	$fieldToolTipsRequest_Visit_WLMH["English"]["colour"] = "";
	$fieldLabelsRequest_Visit_WLMH["English"]["notes"] = "Notes";
	$fieldToolTipsRequest_Visit_WLMH["English"]["notes"] = "";
	$fieldLabelsRequest_Visit_WLMH["English"]["date"] = "Date";
	$fieldToolTipsRequest_Visit_WLMH["English"]["date"] = "";
	if (count($fieldToolTipsRequest_Visit_WLMH["English"]))
		$tdataRequest_Visit_WLMH[".isUseToolTips"] = true;
}
	
	
	$tdataRequest_Visit_WLMH[".NCSearch"] = true;



$tdataRequest_Visit_WLMH[".shortTableName"] = "Request_Visit_WLMH";
$tdataRequest_Visit_WLMH[".nSecOptions"] = 0;
$tdataRequest_Visit_WLMH[".recsPerRowList"] = 1;
$tdataRequest_Visit_WLMH[".mainTableOwnerID"] = "";
$tdataRequest_Visit_WLMH[".moveNext"] = 1;
$tdataRequest_Visit_WLMH[".nType"] = 1;




$tdataRequest_Visit_WLMH[".showAddInPopup"] = false;

$tdataRequest_Visit_WLMH[".showEditInPopup"] = false;

$tdataRequest_Visit_WLMH[".showViewInPopup"] = false;

$tdataRequest_Visit_WLMH[".fieldsForRegister"] = array();

$tdataRequest_Visit_WLMH[".listAjax"] = false;

	$tdataRequest_Visit_WLMH[".audit"] = true;

	$tdataRequest_Visit_WLMH[".locking"] = false;

$tdataRequest_Visit_WLMH[".listIcons"] = true;
$tdataRequest_Visit_WLMH[".view"] = true;

$tdataRequest_Visit_WLMH[".exportTo"] = true;

$tdataRequest_Visit_WLMH[".printFriendly"] = true;


$tdataRequest_Visit_WLMH[".showSimpleSearchOptions"] = false;

$tdataRequest_Visit_WLMH[".showSearchPanel"] = true;

if (isMobile())
	$tdataRequest_Visit_WLMH[".isUseAjaxSuggest"] = false;
else 
	$tdataRequest_Visit_WLMH[".isUseAjaxSuggest"] = true;

$tdataRequest_Visit_WLMH[".rowHighlite"] = true;

// button handlers file names

$tdataRequest_Visit_WLMH[".addPageEvents"] = false;

// use datepicker for search panel
$tdataRequest_Visit_WLMH[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRequest_Visit_WLMH[".isUseTimeForSearch"] = false;






$tdataRequest_Visit_WLMH[".allSearchFields"] = array();

$tdataRequest_Visit_WLMH[".allSearchFields"][] = "ID";
$tdataRequest_Visit_WLMH[".allSearchFields"][] = "location";
$tdataRequest_Visit_WLMH[".allSearchFields"][] = "VRM";
$tdataRequest_Visit_WLMH[".allSearchFields"][] = "make";
$tdataRequest_Visit_WLMH[".allSearchFields"][] = "colour";
$tdataRequest_Visit_WLMH[".allSearchFields"][] = "notes";
$tdataRequest_Visit_WLMH[".allSearchFields"][] = "date";

$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "ID";
$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "location";
$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "VRM";
$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "make";
$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "colour";
$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "notes";
$tdataRequest_Visit_WLMH[".googleLikeFields"][] = "date";


$tdataRequest_Visit_WLMH[".advSearchFields"][] = "ID";
$tdataRequest_Visit_WLMH[".advSearchFields"][] = "location";
$tdataRequest_Visit_WLMH[".advSearchFields"][] = "VRM";
$tdataRequest_Visit_WLMH[".advSearchFields"][] = "make";
$tdataRequest_Visit_WLMH[".advSearchFields"][] = "colour";
$tdataRequest_Visit_WLMH[".advSearchFields"][] = "notes";
$tdataRequest_Visit_WLMH[".advSearchFields"][] = "date";

$tdataRequest_Visit_WLMH[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataRequest_Visit_WLMH[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataRequest_Visit_WLMH[".strOrderBy"] = $tstrOrderBy;

$tdataRequest_Visit_WLMH[".orderindexes"] = array();

$tdataRequest_Visit_WLMH[".sqlHead"] = "SELECT ticket.ID,  ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.`date`";
$tdataRequest_Visit_WLMH[".sqlFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$tdataRequest_Visit_WLMH[".sqlWhereExpr"] = "(isha_streets.contract =\"WLMH\")";
$tdataRequest_Visit_WLMH[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataRequest_Visit_WLMH[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataRequest_Visit_WLMH[".arrGroupsPerPage"] = $arrGPP;

$tableKeysRequest_Visit_WLMH = array();
$tableKeysRequest_Visit_WLMH[] = "ID";
$tdataRequest_Visit_WLMH[".Keys"] = $tableKeysRequest_Visit_WLMH;

$tdataRequest_Visit_WLMH[".listFields"] = array();
$tdataRequest_Visit_WLMH[".listFields"][] = "location";
$tdataRequest_Visit_WLMH[".listFields"][] = "VRM";

$tdataRequest_Visit_WLMH[".addFields"] = array();
$tdataRequest_Visit_WLMH[".addFields"][] = "location";
$tdataRequest_Visit_WLMH[".addFields"][] = "VRM";
$tdataRequest_Visit_WLMH[".addFields"][] = "make";
$tdataRequest_Visit_WLMH[".addFields"][] = "colour";
$tdataRequest_Visit_WLMH[".addFields"][] = "notes";
$tdataRequest_Visit_WLMH[".addFields"][] = "date";

$tdataRequest_Visit_WLMH[".inlineAddFields"] = array();

$tdataRequest_Visit_WLMH[".editFields"] = array();

$tdataRequest_Visit_WLMH[".inlineEditFields"] = array();

$tdataRequest_Visit_WLMH[".exportFields"] = array();
$tdataRequest_Visit_WLMH[".exportFields"][] = "ID";
$tdataRequest_Visit_WLMH[".exportFields"][] = "location";
$tdataRequest_Visit_WLMH[".exportFields"][] = "VRM";
$tdataRequest_Visit_WLMH[".exportFields"][] = "make";
$tdataRequest_Visit_WLMH[".exportFields"][] = "colour";
$tdataRequest_Visit_WLMH[".exportFields"][] = "notes";
$tdataRequest_Visit_WLMH[".exportFields"][] = "date";
	
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
	
		
		
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ticket.ID";
	
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
	
	$tdataRequest_Visit_WLMH["ID"] = $fdata;
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
	
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "location"; 
		$fdata["FullName"] = "ticket.location";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
		$edata["pLookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Location";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Location";
	
		
	$edata["LookupTable"] = "isha_streets";
	$edata["LookupOrderBy"] = "Location";
	
		
		$edata["LookupWhere"] = "contract = 'WLMH'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataRequest_Visit_WLMH["location"] = $fdata;
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
	
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "VRM"; 
		$fdata["FullName"] = "ticket.VRM";
	
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
			$edata["EditParams"].= " maxlength=15";
			
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataRequest_Visit_WLMH["VRM"] = $fdata;
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Make"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "make"; 
		$fdata["FullName"] = "ticket.make";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 1;
		$edata["pLookupType"] = 1;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "make";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "make";
	
		
	$edata["LookupTable"] = "make";
	$edata["LookupOrderBy"] = "make";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataRequest_Visit_WLMH["make"] = $fdata;
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Colour"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "colour"; 
		$fdata["FullName"] = "ticket.colour";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 1;
		$edata["pLookupType"] = 1;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "colour";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "colour";
	
		
	$edata["LookupTable"] = "colour";
	$edata["LookupOrderBy"] = "colour";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataRequest_Visit_WLMH["colour"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Notes"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "notes"; 
		$fdata["FullName"] = "ticket.notes";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text area");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " rows=100";
	$edata["nRows"] = 100;
			$edata["EditParams"].= " cols=200";
	$edata["nCols"] = 200;
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataRequest_Visit_WLMH["notes"] = $fdata;
//	date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "date";
	$fdata["GoodName"] = "date";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Date"; 
	$fdata["FieldType"] = 135;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "date"; 
		$fdata["FullName"] = "ticket.`date`";
	
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
	
	$tdataRequest_Visit_WLMH["date"] = $fdata;

	
$tables_data["Request Visit WLMH"]=&$tdataRequest_Visit_WLMH;
$field_labels["Request_Visit_WLMH"] = &$fieldLabelsRequest_Visit_WLMH;
$fieldToolTips["Request Visit WLMH"] = &$fieldToolTipsRequest_Visit_WLMH;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Request Visit WLMH"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Request Visit WLMH"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Request_Visit_WLMH()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ticket.ID,  ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.`date`";
$proto0["m_strFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$proto0["m_strWhere"] = "(isha_streets.contract =\"WLMH\")";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "isha_streets.contract =\"WLMH\"";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "=\"WLMH\"";
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
												$proto23=array();
$proto23["m_link"] = "SQLL_INNERJOIN";
			$proto24=array();
$proto24["m_strName"] = "isha_streets";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "ID";
$proto24["m_columns"][] = "Location";
$proto24["m_columns"][] = "ACTIVE";
$proto24["m_columns"][] = "contract";
$proto24["m_columns"][] = "enfcompany";
$obj = new SQLTable($proto24);

$proto23["m_table"] = $obj;
$proto23["m_alias"] = "";
$proto25=array();
$proto25["m_sql"] = "ticket.location = isha_streets.Location";
$proto25["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "location",
	"m_strTable" => "ticket"
));

$proto25["m_column"]=$obj;
$proto25["m_contained"] = array();
$proto25["m_strCase"] = "= isha_streets.Location";
$proto25["m_havingmode"] = "0";
$proto25["m_inBrackets"] = "0";
$proto25["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto25);

$proto23["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto23);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Request_Visit_WLMH = createSqlQuery_Request_Visit_WLMH();
							$tdataRequest_Visit_WLMH[".sqlquery"] = $queryData_Request_Visit_WLMH;
	
if(isset($tdataRequest_Visit_WLMH["field2"])){
	$tdataRequest_Visit_WLMH["field2"]["LookupTable"] = "carscars_view";
	$tdataRequest_Visit_WLMH["field2"]["LookupOrderBy"] = "name";
	$tdataRequest_Visit_WLMH["field2"]["LookupType"] = 4;
	$tdataRequest_Visit_WLMH["field2"]["LinkField"] = "email";
	$tdataRequest_Visit_WLMH["field2"]["DisplayField"] = "name";
	$tdataRequest_Visit_WLMH[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Request_Visit_WLMH_events.php"));
$tableEvents["Request Visit WLMH"] = new eventclass_Request_Visit_WLMH;
$tdataRequest_Visit_WLMH[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Request Visit WLMH");

?>