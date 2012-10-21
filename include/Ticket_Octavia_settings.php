<?php
require_once(getabspath("classes/cipherer.php"));
$tdataTicket_Octavia = array();
	$tdataTicket_Octavia[".NumberOfChars"] = 80; 
	$tdataTicket_Octavia[".ShortName"] = "Ticket_Octavia";
	$tdataTicket_Octavia[".OwnerID"] = "";
	$tdataTicket_Octavia[".OriginalTable"] = "ticket";

//	field labels
$fieldLabelsTicket_Octavia = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsTicket_Octavia["English"] = array();
	$fieldToolTipsTicket_Octavia["English"] = array();
	$fieldLabelsTicket_Octavia["English"]["ID"] = "ID";
	$fieldToolTipsTicket_Octavia["English"]["ID"] = "";
	$fieldLabelsTicket_Octavia["English"]["location"] = "Location";
	$fieldToolTipsTicket_Octavia["English"]["location"] = "";
	$fieldLabelsTicket_Octavia["English"]["VRM"] = "VRM";
	$fieldToolTipsTicket_Octavia["English"]["VRM"] = "";
	$fieldLabelsTicket_Octavia["English"]["make"] = "Make";
	$fieldToolTipsTicket_Octavia["English"]["make"] = "";
	$fieldLabelsTicket_Octavia["English"]["colour"] = "Colour";
	$fieldToolTipsTicket_Octavia["English"]["colour"] = "";
	$fieldLabelsTicket_Octavia["English"]["notes"] = "Notes";
	$fieldToolTipsTicket_Octavia["English"]["notes"] = "";
	$fieldLabelsTicket_Octavia["English"]["date"] = "Date";
	$fieldToolTipsTicket_Octavia["English"]["date"] = "";
	if (count($fieldToolTipsTicket_Octavia["English"]))
		$tdataTicket_Octavia[".isUseToolTips"] = true;
}
	
	
	$tdataTicket_Octavia[".NCSearch"] = true;



$tdataTicket_Octavia[".shortTableName"] = "Ticket_Octavia";
$tdataTicket_Octavia[".nSecOptions"] = 0;
$tdataTicket_Octavia[".recsPerRowList"] = 1;
$tdataTicket_Octavia[".mainTableOwnerID"] = "";
$tdataTicket_Octavia[".moveNext"] = 1;
$tdataTicket_Octavia[".nType"] = 1;




$tdataTicket_Octavia[".showAddInPopup"] = false;

$tdataTicket_Octavia[".showEditInPopup"] = false;

$tdataTicket_Octavia[".showViewInPopup"] = false;

$tdataTicket_Octavia[".fieldsForRegister"] = array();

$tdataTicket_Octavia[".listAjax"] = false;

	$tdataTicket_Octavia[".audit"] = true;

	$tdataTicket_Octavia[".locking"] = false;

$tdataTicket_Octavia[".listIcons"] = true;
$tdataTicket_Octavia[".edit"] = true;
$tdataTicket_Octavia[".inlineEdit"] = true;
$tdataTicket_Octavia[".inlineAdd"] = true;
$tdataTicket_Octavia[".view"] = true;

$tdataTicket_Octavia[".exportTo"] = true;

$tdataTicket_Octavia[".printFriendly"] = true;

$tdataTicket_Octavia[".delete"] = true;

$tdataTicket_Octavia[".showSimpleSearchOptions"] = false;

$tdataTicket_Octavia[".showSearchPanel"] = true;

if (isMobile())
	$tdataTicket_Octavia[".isUseAjaxSuggest"] = false;
else 
	$tdataTicket_Octavia[".isUseAjaxSuggest"] = true;

$tdataTicket_Octavia[".rowHighlite"] = true;

// button handlers file names

$tdataTicket_Octavia[".addPageEvents"] = false;

// use datepicker for search panel
$tdataTicket_Octavia[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataTicket_Octavia[".isUseTimeForSearch"] = false;






$tdataTicket_Octavia[".allSearchFields"] = array();

$tdataTicket_Octavia[".allSearchFields"][] = "ID";
$tdataTicket_Octavia[".allSearchFields"][] = "location";
$tdataTicket_Octavia[".allSearchFields"][] = "VRM";
$tdataTicket_Octavia[".allSearchFields"][] = "make";
$tdataTicket_Octavia[".allSearchFields"][] = "colour";
$tdataTicket_Octavia[".allSearchFields"][] = "notes";
$tdataTicket_Octavia[".allSearchFields"][] = "date";

$tdataTicket_Octavia[".googleLikeFields"][] = "ID";
$tdataTicket_Octavia[".googleLikeFields"][] = "location";
$tdataTicket_Octavia[".googleLikeFields"][] = "VRM";
$tdataTicket_Octavia[".googleLikeFields"][] = "make";
$tdataTicket_Octavia[".googleLikeFields"][] = "colour";
$tdataTicket_Octavia[".googleLikeFields"][] = "notes";
$tdataTicket_Octavia[".googleLikeFields"][] = "date";


$tdataTicket_Octavia[".advSearchFields"][] = "ID";
$tdataTicket_Octavia[".advSearchFields"][] = "location";
$tdataTicket_Octavia[".advSearchFields"][] = "VRM";
$tdataTicket_Octavia[".advSearchFields"][] = "make";
$tdataTicket_Octavia[".advSearchFields"][] = "colour";
$tdataTicket_Octavia[".advSearchFields"][] = "notes";
$tdataTicket_Octavia[".advSearchFields"][] = "date";

$tdataTicket_Octavia[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataTicket_Octavia[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataTicket_Octavia[".strOrderBy"] = $tstrOrderBy;

$tdataTicket_Octavia[".orderindexes"] = array();

$tdataTicket_Octavia[".sqlHead"] = "SELECT ticket.ID,  ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.`date`";
$tdataTicket_Octavia[".sqlFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$tdataTicket_Octavia[".sqlWhereExpr"] = "(isha_streets.contract =\"OCTAVIA\")";
$tdataTicket_Octavia[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataTicket_Octavia[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataTicket_Octavia[".arrGroupsPerPage"] = $arrGPP;

$tableKeysTicket_Octavia = array();
$tableKeysTicket_Octavia[] = "ID";
$tdataTicket_Octavia[".Keys"] = $tableKeysTicket_Octavia;

$tdataTicket_Octavia[".listFields"] = array();
$tdataTicket_Octavia[".listFields"][] = "location";
$tdataTicket_Octavia[".listFields"][] = "VRM";

$tdataTicket_Octavia[".addFields"] = array();
$tdataTicket_Octavia[".addFields"][] = "location";
$tdataTicket_Octavia[".addFields"][] = "VRM";
$tdataTicket_Octavia[".addFields"][] = "make";
$tdataTicket_Octavia[".addFields"][] = "colour";
$tdataTicket_Octavia[".addFields"][] = "notes";
$tdataTicket_Octavia[".addFields"][] = "date";

$tdataTicket_Octavia[".inlineAddFields"] = array();
$tdataTicket_Octavia[".inlineAddFields"][] = "location";
$tdataTicket_Octavia[".inlineAddFields"][] = "VRM";

$tdataTicket_Octavia[".editFields"] = array();
$tdataTicket_Octavia[".editFields"][] = "location";
$tdataTicket_Octavia[".editFields"][] = "VRM";
$tdataTicket_Octavia[".editFields"][] = "make";
$tdataTicket_Octavia[".editFields"][] = "colour";
$tdataTicket_Octavia[".editFields"][] = "notes";
$tdataTicket_Octavia[".editFields"][] = "date";

$tdataTicket_Octavia[".inlineEditFields"] = array();
$tdataTicket_Octavia[".inlineEditFields"][] = "location";
$tdataTicket_Octavia[".inlineEditFields"][] = "VRM";

$tdataTicket_Octavia[".exportFields"] = array();
$tdataTicket_Octavia[".exportFields"][] = "ID";
$tdataTicket_Octavia[".exportFields"][] = "location";
$tdataTicket_Octavia[".exportFields"][] = "VRM";
$tdataTicket_Octavia[".exportFields"][] = "make";
$tdataTicket_Octavia[".exportFields"][] = "colour";
$tdataTicket_Octavia[".exportFields"][] = "notes";
$tdataTicket_Octavia[".exportFields"][] = "date";
	
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
	
	$tdataTicket_Octavia["ID"] = $fdata;
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
	$edata["LookupOrderBy"] = "";
	
		
		$edata["LookupWhere"] = "contract = 'OCTAVIA'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataTicket_Octavia["location"] = $fdata;
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
	
	$tdataTicket_Octavia["VRM"] = $fdata;
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
	
		
		$fdata["bEditPage"] = true; 
	
		
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
	
	$tdataTicket_Octavia["make"] = $fdata;
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
	
		
		$fdata["bEditPage"] = true; 
	
		
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
	
	$tdataTicket_Octavia["colour"] = $fdata;
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
	
		
		$fdata["bEditPage"] = true; 
	
		
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
	
	$tdataTicket_Octavia["notes"] = $fdata;
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
	
		
		$fdata["bEditPage"] = true; 
	
		
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
	
	$edata = array("EditFormat" => "Readonly");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataTicket_Octavia["date"] = $fdata;

	
$tables_data["Ticket Octavia"]=&$tdataTicket_Octavia;
$field_labels["Ticket_Octavia"] = &$fieldLabelsTicket_Octavia;
$fieldToolTips["Ticket Octavia"] = &$fieldToolTipsTicket_Octavia;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Ticket Octavia"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Ticket Octavia"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Ticket_Octavia()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ticket.ID,  ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.`date`";
$proto0["m_strFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$proto0["m_strWhere"] = "(isha_streets.contract =\"OCTAVIA\")";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "isha_streets.contract =\"OCTAVIA\"";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "=\"OCTAVIA\"";
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
$queryData_Ticket_Octavia = createSqlQuery_Ticket_Octavia();
							$tdataTicket_Octavia[".sqlquery"] = $queryData_Ticket_Octavia;
	
if(isset($tdataTicket_Octavia["field2"])){
	$tdataTicket_Octavia["field2"]["LookupTable"] = "carscars_view";
	$tdataTicket_Octavia["field2"]["LookupOrderBy"] = "name";
	$tdataTicket_Octavia["field2"]["LookupType"] = 4;
	$tdataTicket_Octavia["field2"]["LinkField"] = "email";
	$tdataTicket_Octavia["field2"]["DisplayField"] = "name";
	$tdataTicket_Octavia[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Ticket_Octavia_events.php"));
$tableEvents["Ticket Octavia"] = new eventclass_Ticket_Octavia;
$tdataTicket_Octavia[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Ticket Octavia");

?>