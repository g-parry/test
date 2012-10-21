<?php
require_once(getabspath("classes/cipherer.php"));
$tdataTicket_Demo_Site = array();
	$tdataTicket_Demo_Site[".NumberOfChars"] = 80; 
	$tdataTicket_Demo_Site[".ShortName"] = "Ticket_Demo_Site";
	$tdataTicket_Demo_Site[".OwnerID"] = "";
	$tdataTicket_Demo_Site[".OriginalTable"] = "ticket";

//	field labels
$fieldLabelsTicket_Demo_Site = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsTicket_Demo_Site["English"] = array();
	$fieldToolTipsTicket_Demo_Site["English"] = array();
	$fieldLabelsTicket_Demo_Site["English"]["ID"] = "ID";
	$fieldToolTipsTicket_Demo_Site["English"]["ID"] = "";
	$fieldLabelsTicket_Demo_Site["English"]["location"] = "Location";
	$fieldToolTipsTicket_Demo_Site["English"]["location"] = "";
	$fieldLabelsTicket_Demo_Site["English"]["VRM"] = "VRM";
	$fieldToolTipsTicket_Demo_Site["English"]["VRM"] = "";
	$fieldLabelsTicket_Demo_Site["English"]["make"] = "Make";
	$fieldToolTipsTicket_Demo_Site["English"]["make"] = "";
	$fieldLabelsTicket_Demo_Site["English"]["colour"] = "Colour";
	$fieldToolTipsTicket_Demo_Site["English"]["colour"] = "";
	$fieldLabelsTicket_Demo_Site["English"]["notes"] = "Notes";
	$fieldToolTipsTicket_Demo_Site["English"]["notes"] = "";
	$fieldLabelsTicket_Demo_Site["English"]["date"] = "Date";
	$fieldToolTipsTicket_Demo_Site["English"]["date"] = "";
	if (count($fieldToolTipsTicket_Demo_Site["English"]))
		$tdataTicket_Demo_Site[".isUseToolTips"] = true;
}
	
	
	$tdataTicket_Demo_Site[".NCSearch"] = true;



$tdataTicket_Demo_Site[".shortTableName"] = "Ticket_Demo_Site";
$tdataTicket_Demo_Site[".nSecOptions"] = 0;
$tdataTicket_Demo_Site[".recsPerRowList"] = 1;
$tdataTicket_Demo_Site[".mainTableOwnerID"] = "";
$tdataTicket_Demo_Site[".moveNext"] = 1;
$tdataTicket_Demo_Site[".nType"] = 1;




$tdataTicket_Demo_Site[".showAddInPopup"] = false;

$tdataTicket_Demo_Site[".showEditInPopup"] = false;

$tdataTicket_Demo_Site[".showViewInPopup"] = false;

$tdataTicket_Demo_Site[".fieldsForRegister"] = array();

$tdataTicket_Demo_Site[".listAjax"] = false;

	$tdataTicket_Demo_Site[".audit"] = true;

	$tdataTicket_Demo_Site[".locking"] = false;

$tdataTicket_Demo_Site[".listIcons"] = true;
$tdataTicket_Demo_Site[".edit"] = true;
$tdataTicket_Demo_Site[".inlineEdit"] = true;
$tdataTicket_Demo_Site[".inlineAdd"] = true;
$tdataTicket_Demo_Site[".view"] = true;

$tdataTicket_Demo_Site[".exportTo"] = true;

$tdataTicket_Demo_Site[".printFriendly"] = true;

$tdataTicket_Demo_Site[".delete"] = true;

$tdataTicket_Demo_Site[".showSimpleSearchOptions"] = false;

$tdataTicket_Demo_Site[".showSearchPanel"] = true;

if (isMobile())
	$tdataTicket_Demo_Site[".isUseAjaxSuggest"] = false;
else 
	$tdataTicket_Demo_Site[".isUseAjaxSuggest"] = true;

$tdataTicket_Demo_Site[".rowHighlite"] = true;

// button handlers file names

$tdataTicket_Demo_Site[".addPageEvents"] = false;

// use datepicker for search panel
$tdataTicket_Demo_Site[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataTicket_Demo_Site[".isUseTimeForSearch"] = false;






$tdataTicket_Demo_Site[".allSearchFields"] = array();

$tdataTicket_Demo_Site[".allSearchFields"][] = "ID";
$tdataTicket_Demo_Site[".allSearchFields"][] = "location";
$tdataTicket_Demo_Site[".allSearchFields"][] = "VRM";
$tdataTicket_Demo_Site[".allSearchFields"][] = "make";
$tdataTicket_Demo_Site[".allSearchFields"][] = "colour";
$tdataTicket_Demo_Site[".allSearchFields"][] = "notes";
$tdataTicket_Demo_Site[".allSearchFields"][] = "date";

$tdataTicket_Demo_Site[".googleLikeFields"][] = "ID";
$tdataTicket_Demo_Site[".googleLikeFields"][] = "location";
$tdataTicket_Demo_Site[".googleLikeFields"][] = "VRM";
$tdataTicket_Demo_Site[".googleLikeFields"][] = "make";
$tdataTicket_Demo_Site[".googleLikeFields"][] = "colour";
$tdataTicket_Demo_Site[".googleLikeFields"][] = "notes";
$tdataTicket_Demo_Site[".googleLikeFields"][] = "date";


$tdataTicket_Demo_Site[".advSearchFields"][] = "ID";
$tdataTicket_Demo_Site[".advSearchFields"][] = "location";
$tdataTicket_Demo_Site[".advSearchFields"][] = "VRM";
$tdataTicket_Demo_Site[".advSearchFields"][] = "make";
$tdataTicket_Demo_Site[".advSearchFields"][] = "colour";
$tdataTicket_Demo_Site[".advSearchFields"][] = "notes";
$tdataTicket_Demo_Site[".advSearchFields"][] = "date";

$tdataTicket_Demo_Site[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataTicket_Demo_Site[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataTicket_Demo_Site[".strOrderBy"] = $tstrOrderBy;

$tdataTicket_Demo_Site[".orderindexes"] = array();

$tdataTicket_Demo_Site[".sqlHead"] = "SELECT ticket.ID,  ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.`date`";
$tdataTicket_Demo_Site[".sqlFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$tdataTicket_Demo_Site[".sqlWhereExpr"] = "(isha_streets.contract =\"DEMO\")";
$tdataTicket_Demo_Site[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataTicket_Demo_Site[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataTicket_Demo_Site[".arrGroupsPerPage"] = $arrGPP;

$tableKeysTicket_Demo_Site = array();
$tableKeysTicket_Demo_Site[] = "ID";
$tdataTicket_Demo_Site[".Keys"] = $tableKeysTicket_Demo_Site;

$tdataTicket_Demo_Site[".listFields"] = array();
$tdataTicket_Demo_Site[".listFields"][] = "location";
$tdataTicket_Demo_Site[".listFields"][] = "VRM";

$tdataTicket_Demo_Site[".addFields"] = array();
$tdataTicket_Demo_Site[".addFields"][] = "location";
$tdataTicket_Demo_Site[".addFields"][] = "VRM";
$tdataTicket_Demo_Site[".addFields"][] = "make";
$tdataTicket_Demo_Site[".addFields"][] = "colour";
$tdataTicket_Demo_Site[".addFields"][] = "notes";
$tdataTicket_Demo_Site[".addFields"][] = "date";

$tdataTicket_Demo_Site[".inlineAddFields"] = array();
$tdataTicket_Demo_Site[".inlineAddFields"][] = "location";
$tdataTicket_Demo_Site[".inlineAddFields"][] = "VRM";

$tdataTicket_Demo_Site[".editFields"] = array();
$tdataTicket_Demo_Site[".editFields"][] = "location";
$tdataTicket_Demo_Site[".editFields"][] = "VRM";
$tdataTicket_Demo_Site[".editFields"][] = "make";
$tdataTicket_Demo_Site[".editFields"][] = "colour";
$tdataTicket_Demo_Site[".editFields"][] = "notes";
$tdataTicket_Demo_Site[".editFields"][] = "date";

$tdataTicket_Demo_Site[".inlineEditFields"] = array();
$tdataTicket_Demo_Site[".inlineEditFields"][] = "location";
$tdataTicket_Demo_Site[".inlineEditFields"][] = "VRM";

$tdataTicket_Demo_Site[".exportFields"] = array();
$tdataTicket_Demo_Site[".exportFields"][] = "ID";
$tdataTicket_Demo_Site[".exportFields"][] = "location";
$tdataTicket_Demo_Site[".exportFields"][] = "VRM";
$tdataTicket_Demo_Site[".exportFields"][] = "make";
$tdataTicket_Demo_Site[".exportFields"][] = "colour";
$tdataTicket_Demo_Site[".exportFields"][] = "notes";
$tdataTicket_Demo_Site[".exportFields"][] = "date";
	
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
	
	$tdataTicket_Demo_Site["ID"] = $fdata;
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
	
		
		$edata["LookupWhere"] = "contract = 'DEMO'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataTicket_Demo_Site["location"] = $fdata;
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
	
	$tdataTicket_Demo_Site["VRM"] = $fdata;
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
	
	$tdataTicket_Demo_Site["make"] = $fdata;
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
	
	$tdataTicket_Demo_Site["colour"] = $fdata;
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
	
	$tdataTicket_Demo_Site["notes"] = $fdata;
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
	
	$tdataTicket_Demo_Site["date"] = $fdata;

	
$tables_data["Ticket Demo Site"]=&$tdataTicket_Demo_Site;
$field_labels["Ticket_Demo_Site"] = &$fieldLabelsTicket_Demo_Site;
$fieldToolTips["Ticket Demo Site"] = &$fieldToolTipsTicket_Demo_Site;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Ticket Demo Site"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Ticket Demo Site"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Ticket_Demo_Site()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ticket.ID,  ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.`date`";
$proto0["m_strFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$proto0["m_strWhere"] = "(isha_streets.contract =\"DEMO\")";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "isha_streets.contract =\"DEMO\"";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "=\"DEMO\"";
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
$queryData_Ticket_Demo_Site = createSqlQuery_Ticket_Demo_Site();
							$tdataTicket_Demo_Site[".sqlquery"] = $queryData_Ticket_Demo_Site;
	
if(isset($tdataTicket_Demo_Site["field2"])){
	$tdataTicket_Demo_Site["field2"]["LookupTable"] = "carscars_view";
	$tdataTicket_Demo_Site["field2"]["LookupOrderBy"] = "name";
	$tdataTicket_Demo_Site["field2"]["LookupType"] = 4;
	$tdataTicket_Demo_Site["field2"]["LinkField"] = "email";
	$tdataTicket_Demo_Site["field2"]["DisplayField"] = "name";
	$tdataTicket_Demo_Site[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Ticket_Demo_Site_events.php"));
$tableEvents["Ticket Demo Site"] = new eventclass_Ticket_Demo_Site;
$tdataTicket_Demo_Site[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Ticket Demo Site");

?>