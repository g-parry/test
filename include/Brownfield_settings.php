<?php
require_once(getabspath("classes/cipherer.php"));
$tdataBrownfield = array();
	$tdataBrownfield[".NumberOfChars"] = 80; 
	$tdataBrownfield[".ShortName"] = "Brownfield";
	$tdataBrownfield[".OwnerID"] = "";
	$tdataBrownfield[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsBrownfield = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsBrownfield["English"] = array();
	$fieldToolTipsBrownfield["English"] = array();
	$fieldLabelsBrownfield["English"]["Location"] = "Location";
	$fieldToolTipsBrownfield["English"]["Location"] = "";
	$fieldLabelsBrownfield["English"]["VRM"] = "VRM";
	$fieldToolTipsBrownfield["English"]["VRM"] = "";
	$fieldLabelsBrownfield["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsBrownfield["English"]["Start Date"] = "";
	$fieldLabelsBrownfield["English"]["EndDate"] = "End Date";
	$fieldToolTipsBrownfield["English"]["EndDate"] = "";
	$fieldLabelsBrownfield["English"]["Reason"] = "Reason";
	$fieldToolTipsBrownfield["English"]["Reason"] = "";
	$fieldLabelsBrownfield["English"]["make"] = "Make";
	$fieldToolTipsBrownfield["English"]["make"] = "";
	$fieldLabelsBrownfield["English"]["colour"] = "Colour";
	$fieldToolTipsBrownfield["English"]["colour"] = "";
	$fieldLabelsBrownfield["English"]["ID"] = "ID";
	$fieldToolTipsBrownfield["English"]["ID"] = "";
	if (count($fieldToolTipsBrownfield["English"]))
		$tdataBrownfield[".isUseToolTips"] = true;
}
	
	
	$tdataBrownfield[".NCSearch"] = true;



$tdataBrownfield[".shortTableName"] = "Brownfield";
$tdataBrownfield[".nSecOptions"] = 0;
$tdataBrownfield[".recsPerRowList"] = 1;
$tdataBrownfield[".mainTableOwnerID"] = "";
$tdataBrownfield[".moveNext"] = 1;
$tdataBrownfield[".nType"] = 1;




$tdataBrownfield[".showAddInPopup"] = false;

$tdataBrownfield[".showEditInPopup"] = false;

$tdataBrownfield[".showViewInPopup"] = false;

$tdataBrownfield[".fieldsForRegister"] = array();

$tdataBrownfield[".listAjax"] = false;

	$tdataBrownfield[".audit"] = true;

	$tdataBrownfield[".locking"] = false;

$tdataBrownfield[".listIcons"] = true;

$tdataBrownfield[".exportTo"] = true;

$tdataBrownfield[".printFriendly"] = true;


$tdataBrownfield[".showSimpleSearchOptions"] = false;

$tdataBrownfield[".showSearchPanel"] = true;

if (isMobile())
	$tdataBrownfield[".isUseAjaxSuggest"] = false;
else 
	$tdataBrownfield[".isUseAjaxSuggest"] = true;

$tdataBrownfield[".rowHighlite"] = true;

// button handlers file names

$tdataBrownfield[".addPageEvents"] = false;

// use datepicker for search panel
$tdataBrownfield[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataBrownfield[".isUseTimeForSearch"] = false;






$tdataBrownfield[".allSearchFields"] = array();

$tdataBrownfield[".allSearchFields"][] = "Location";
$tdataBrownfield[".allSearchFields"][] = "VRM";
$tdataBrownfield[".allSearchFields"][] = "make";
$tdataBrownfield[".allSearchFields"][] = "colour";
$tdataBrownfield[".allSearchFields"][] = "Start Date";
$tdataBrownfield[".allSearchFields"][] = "EndDate";
$tdataBrownfield[".allSearchFields"][] = "Reason";

$tdataBrownfield[".googleLikeFields"][] = "ID";
$tdataBrownfield[".googleLikeFields"][] = "Location";
$tdataBrownfield[".googleLikeFields"][] = "VRM";
$tdataBrownfield[".googleLikeFields"][] = "make";
$tdataBrownfield[".googleLikeFields"][] = "colour";
$tdataBrownfield[".googleLikeFields"][] = "Start Date";
$tdataBrownfield[".googleLikeFields"][] = "EndDate";
$tdataBrownfield[".googleLikeFields"][] = "Reason";


$tdataBrownfield[".advSearchFields"][] = "Location";
$tdataBrownfield[".advSearchFields"][] = "VRM";
$tdataBrownfield[".advSearchFields"][] = "make";
$tdataBrownfield[".advSearchFields"][] = "colour";
$tdataBrownfield[".advSearchFields"][] = "Start Date";
$tdataBrownfield[".advSearchFields"][] = "EndDate";
$tdataBrownfield[".advSearchFields"][] = "Reason";

$tdataBrownfield[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataBrownfield[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY exemptions.VRM";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataBrownfield[".strOrderBy"] = $tstrOrderBy;

$tdataBrownfield[".orderindexes"] = array();
$tdataBrownfield[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "exemptions.VRM");

$tdataBrownfield[".sqlHead"] = "SELECT exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$tdataBrownfield[".sqlFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$tdataBrownfield[".sqlWhereExpr"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Brownfield\")";
$tdataBrownfield[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataBrownfield[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataBrownfield[".arrGroupsPerPage"] = $arrGPP;

$tableKeysBrownfield = array();
$tableKeysBrownfield[] = "ID";
$tdataBrownfield[".Keys"] = $tableKeysBrownfield;

$tdataBrownfield[".listFields"] = array();
$tdataBrownfield[".listFields"][] = "Location";
$tdataBrownfield[".listFields"][] = "VRM";
$tdataBrownfield[".listFields"][] = "make";
$tdataBrownfield[".listFields"][] = "colour";
$tdataBrownfield[".listFields"][] = "Start Date";
$tdataBrownfield[".listFields"][] = "EndDate";
$tdataBrownfield[".listFields"][] = "Reason";

$tdataBrownfield[".addFields"] = array();
$tdataBrownfield[".addFields"][] = "Location";
$tdataBrownfield[".addFields"][] = "VRM";
$tdataBrownfield[".addFields"][] = "make";
$tdataBrownfield[".addFields"][] = "colour";
$tdataBrownfield[".addFields"][] = "Start Date";
$tdataBrownfield[".addFields"][] = "EndDate";
$tdataBrownfield[".addFields"][] = "Reason";

$tdataBrownfield[".inlineAddFields"] = array();

$tdataBrownfield[".editFields"] = array();

$tdataBrownfield[".inlineEditFields"] = array();

$tdataBrownfield[".exportFields"] = array();
$tdataBrownfield[".exportFields"][] = "Location";
$tdataBrownfield[".exportFields"][] = "VRM";
$tdataBrownfield[".exportFields"][] = "make";
$tdataBrownfield[".exportFields"][] = "colour";
$tdataBrownfield[".exportFields"][] = "Start Date";
$tdataBrownfield[".exportFields"][] = "EndDate";
$tdataBrownfield[".exportFields"][] = "Reason";
	
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
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Location"; 
		$fdata["FullName"] = "exemptions.Location";
	
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
	
		
		$edata["LookupWhere"] = "contract like 'Brownfield'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataBrownfield["Location"] = $fdata;
//	VRM
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "VRM";
	$fdata["GoodName"] = "VRM";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "VRM"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "VRM"; 
		$fdata["FullName"] = "exemptions.VRM";
	
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
	
	$tdataBrownfield["VRM"] = $fdata;
//	Start Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Start Date";
	$fdata["GoodName"] = "Start_Date";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Start Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Start Date"; 
		$fdata["FullName"] = "exemptions.`Start Date`";
	
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
	
		
		
		$edata["AutoUpdate"] = true; 
	
	
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
	
	$tdataBrownfield["Start Date"] = $fdata;
//	EndDate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "EndDate";
	$fdata["GoodName"] = "EndDate";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "End Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "EndDate"; 
		$fdata["FullName"] = "exemptions.EndDate";
	
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
	
		
		
		$edata["AutoUpdate"] = true; 
	
	
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
	
	$tdataBrownfield["EndDate"] = $fdata;
//	Reason
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Reason";
	$fdata["GoodName"] = "Reason";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Reason"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Reason"; 
		$fdata["FullName"] = "exemptions.Reason";
	
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
	
	$tdataBrownfield["Reason"] = $fdata;
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Make"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "make"; 
		$fdata["FullName"] = "exemptions.make";
	
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
	
	$tdataBrownfield["make"] = $fdata;
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Colour"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "colour"; 
		$fdata["FullName"] = "exemptions.colour";
	
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
	
	$tdataBrownfield["colour"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "exemptions.ID";
	
				
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
					
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataBrownfield["ID"] = $fdata;

	
$tables_data["Brownfield"]=&$tdataBrownfield;
$field_labels["Brownfield"] = &$fieldLabelsBrownfield;
$fieldToolTips["Brownfield"] = &$fieldToolTipsBrownfield;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Brownfield"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Brownfield"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Brownfield()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$proto0["m_strFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$proto0["m_strWhere"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Brownfield\")";
$proto0["m_strOrderBy"] = "ORDER BY exemptions.VRM";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Brownfield\")";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Brownfield\")"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
						$proto3=array();
$proto3["m_sql"] = "exemptions.`Start Date` <=CURDATE()";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Start Date",
	"m_strTable" => "exemptions"
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "<=CURDATE()";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "1";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

			$proto1["m_contained"][]=$obj;
						$proto5=array();
$proto5["m_sql"] = "exemptions.EndDate >=CURDATE()";
$proto5["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "EndDate",
	"m_strTable" => "exemptions"
));

$proto5["m_column"]=$obj;
$proto5["m_contained"] = array();
$proto5["m_strCase"] = ">=CURDATE()";
$proto5["m_havingmode"] = "0";
$proto5["m_inBrackets"] = "1";
$proto5["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto5);

			$proto1["m_contained"][]=$obj;
						$proto7=array();
$proto7["m_sql"] = "isha_streets.contract =\"Brownfield\"";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "=\"Brownfield\"";
$proto7["m_havingmode"] = "0";
$proto7["m_inBrackets"] = "1";
$proto7["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto7);

			$proto1["m_contained"][]=$obj;
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
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

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "exemptions"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Start Date",
	"m_strTable" => "exemptions"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "EndDate",
	"m_strTable" => "exemptions"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Reason",
	"m_strTable" => "exemptions"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "make",
	"m_strTable" => "exemptions"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "colour",
	"m_strTable" => "exemptions"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "exemptions"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "exemptions";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "ID";
$proto28["m_columns"][] = "Location";
$proto28["m_columns"][] = "VRM";
$proto28["m_columns"][] = "Start Date";
$proto28["m_columns"][] = "EndDate";
$proto28["m_columns"][] = "Reason";
$proto28["m_columns"][] = "make";
$proto28["m_columns"][] = "colour";
$proto28["m_columns"][] = "contract";
$obj = new SQLTable($proto28);

$proto27["m_table"] = $obj;
$proto27["m_alias"] = "";
$proto29=array();
$proto29["m_sql"] = "";
$proto29["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto29["m_column"]=$obj;
$proto29["m_contained"] = array();
$proto29["m_strCase"] = "";
$proto29["m_havingmode"] = "0";
$proto29["m_inBrackets"] = "0";
$proto29["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto29);

$proto27["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto27);

$proto0["m_fromlist"][]=$obj;
												$proto31=array();
$proto31["m_link"] = "SQLL_INNERJOIN";
			$proto32=array();
$proto32["m_strName"] = "isha_streets";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "ID";
$proto32["m_columns"][] = "Location";
$proto32["m_columns"][] = "ACTIVE";
$proto32["m_columns"][] = "contract";
$proto32["m_columns"][] = "enfcompany";
$obj = new SQLTable($proto32);

$proto31["m_table"] = $obj;
$proto31["m_alias"] = "";
$proto33=array();
$proto33["m_sql"] = "exemptions.Location = isha_streets.Location";
$proto33["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto33["m_column"]=$obj;
$proto33["m_contained"] = array();
$proto33["m_strCase"] = "= isha_streets.Location";
$proto33["m_havingmode"] = "0";
$proto33["m_inBrackets"] = "0";
$proto33["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto33);

$proto31["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto31);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto35=array();
						$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "exemptions"
));

$proto35["m_column"]=$obj;
$proto35["m_bAsc"] = 1;
$proto35["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto35);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Brownfield = createSqlQuery_Brownfield();
								$tdataBrownfield[".sqlquery"] = $queryData_Brownfield;
	
if(isset($tdataBrownfield["field2"])){
	$tdataBrownfield["field2"]["LookupTable"] = "carscars_view";
	$tdataBrownfield["field2"]["LookupOrderBy"] = "name";
	$tdataBrownfield["field2"]["LookupType"] = 4;
	$tdataBrownfield["field2"]["LinkField"] = "email";
	$tdataBrownfield["field2"]["DisplayField"] = "name";
	$tdataBrownfield[".hasCustomViewField"] = true;
}

$tableEvents["Brownfield"] = new eventsBase;
$tdataBrownfield[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Brownfield");

?>