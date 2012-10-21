<?php
require_once(getabspath("classes/cipherer.php"));
$tdataexemptions = array();
	$tdataexemptions[".NumberOfChars"] = 80; 
	$tdataexemptions[".ShortName"] = "exemptions";
	$tdataexemptions[".OwnerID"] = "";
	$tdataexemptions[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsexemptions = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsexemptions["English"] = array();
	$fieldToolTipsexemptions["English"] = array();
	$fieldLabelsexemptions["English"]["ID"] = "ID";
	$fieldToolTipsexemptions["English"]["ID"] = "";
	$fieldLabelsexemptions["English"]["Location"] = "Location";
	$fieldToolTipsexemptions["English"]["Location"] = "";
	$fieldLabelsexemptions["English"]["VRM"] = "VRM";
	$fieldToolTipsexemptions["English"]["VRM"] = "";
	$fieldLabelsexemptions["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsexemptions["English"]["Start Date"] = "";
	$fieldLabelsexemptions["English"]["EndDate"] = "End Date";
	$fieldToolTipsexemptions["English"]["EndDate"] = "";
	$fieldLabelsexemptions["English"]["Reason"] = "Reason";
	$fieldToolTipsexemptions["English"]["Reason"] = "";
	$fieldLabelsexemptions["English"]["make"] = "Make";
	$fieldToolTipsexemptions["English"]["make"] = "";
	$fieldLabelsexemptions["English"]["colour"] = "Colour";
	$fieldToolTipsexemptions["English"]["colour"] = "";
	$fieldLabelsexemptions["English"]["contract"] = "Contract";
	$fieldToolTipsexemptions["English"]["contract"] = "";
	if (count($fieldToolTipsexemptions["English"]))
		$tdataexemptions[".isUseToolTips"] = true;
}
	
	
	$tdataexemptions[".NCSearch"] = true;



$tdataexemptions[".shortTableName"] = "exemptions";
$tdataexemptions[".nSecOptions"] = 0;
$tdataexemptions[".recsPerRowList"] = 1;
$tdataexemptions[".mainTableOwnerID"] = "";
$tdataexemptions[".moveNext"] = 1;
$tdataexemptions[".nType"] = 0;




$tdataexemptions[".showAddInPopup"] = false;

$tdataexemptions[".showEditInPopup"] = false;

$tdataexemptions[".showViewInPopup"] = false;

$tdataexemptions[".fieldsForRegister"] = array();

$tdataexemptions[".listAjax"] = false;

	$tdataexemptions[".audit"] = false;

	$tdataexemptions[".locking"] = false;

$tdataexemptions[".listIcons"] = true;
$tdataexemptions[".edit"] = true;
$tdataexemptions[".inlineEdit"] = true;
$tdataexemptions[".inlineAdd"] = true;
$tdataexemptions[".view"] = true;

$tdataexemptions[".exportTo"] = true;

$tdataexemptions[".printFriendly"] = true;

$tdataexemptions[".delete"] = true;

$tdataexemptions[".showSimpleSearchOptions"] = false;

$tdataexemptions[".showSearchPanel"] = true;

if (isMobile())
	$tdataexemptions[".isUseAjaxSuggest"] = false;
else 
	$tdataexemptions[".isUseAjaxSuggest"] = true;

$tdataexemptions[".rowHighlite"] = true;

// button handlers file names

$tdataexemptions[".addPageEvents"] = false;

// use datepicker for search panel
$tdataexemptions[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataexemptions[".isUseTimeForSearch"] = false;






$tdataexemptions[".allSearchFields"] = array();

$tdataexemptions[".allSearchFields"][] = "ID";
$tdataexemptions[".allSearchFields"][] = "Location";
$tdataexemptions[".allSearchFields"][] = "VRM";
$tdataexemptions[".allSearchFields"][] = "Start Date";
$tdataexemptions[".allSearchFields"][] = "EndDate";
$tdataexemptions[".allSearchFields"][] = "Reason";
$tdataexemptions[".allSearchFields"][] = "make";
$tdataexemptions[".allSearchFields"][] = "colour";
$tdataexemptions[".allSearchFields"][] = "contract";

$tdataexemptions[".googleLikeFields"][] = "ID";
$tdataexemptions[".googleLikeFields"][] = "Location";
$tdataexemptions[".googleLikeFields"][] = "VRM";
$tdataexemptions[".googleLikeFields"][] = "Start Date";
$tdataexemptions[".googleLikeFields"][] = "EndDate";
$tdataexemptions[".googleLikeFields"][] = "Reason";
$tdataexemptions[".googleLikeFields"][] = "make";
$tdataexemptions[".googleLikeFields"][] = "colour";
$tdataexemptions[".googleLikeFields"][] = "contract";


$tdataexemptions[".advSearchFields"][] = "ID";
$tdataexemptions[".advSearchFields"][] = "Location";
$tdataexemptions[".advSearchFields"][] = "VRM";
$tdataexemptions[".advSearchFields"][] = "Start Date";
$tdataexemptions[".advSearchFields"][] = "EndDate";
$tdataexemptions[".advSearchFields"][] = "Reason";
$tdataexemptions[".advSearchFields"][] = "make";
$tdataexemptions[".advSearchFields"][] = "colour";
$tdataexemptions[".advSearchFields"][] = "contract";

$tdataexemptions[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataexemptions[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataexemptions[".strOrderBy"] = $tstrOrderBy;

$tdataexemptions[".orderindexes"] = array();

$tdataexemptions[".sqlHead"] = "SELECT ID,   Location,   VRM,   `Start Date`,   EndDate,   Reason,   make,   colour,   contract";
$tdataexemptions[".sqlFrom"] = "FROM exemptions";
$tdataexemptions[".sqlWhereExpr"] = "";
$tdataexemptions[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataexemptions[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataexemptions[".arrGroupsPerPage"] = $arrGPP;

$tableKeysexemptions = array();
$tableKeysexemptions[] = "ID";
$tdataexemptions[".Keys"] = $tableKeysexemptions;

$tdataexemptions[".listFields"] = array();
$tdataexemptions[".listFields"][] = "contract";
$tdataexemptions[".listFields"][] = "ID";
$tdataexemptions[".listFields"][] = "Location";
$tdataexemptions[".listFields"][] = "VRM";
$tdataexemptions[".listFields"][] = "Start Date";
$tdataexemptions[".listFields"][] = "EndDate";
$tdataexemptions[".listFields"][] = "Reason";
$tdataexemptions[".listFields"][] = "make";
$tdataexemptions[".listFields"][] = "colour";

$tdataexemptions[".addFields"] = array();
$tdataexemptions[".addFields"][] = "Location";
$tdataexemptions[".addFields"][] = "VRM";
$tdataexemptions[".addFields"][] = "make";
$tdataexemptions[".addFields"][] = "colour";
$tdataexemptions[".addFields"][] = "Start Date";
$tdataexemptions[".addFields"][] = "EndDate";
$tdataexemptions[".addFields"][] = "Reason";
$tdataexemptions[".addFields"][] = "contract";

$tdataexemptions[".inlineAddFields"] = array();
$tdataexemptions[".inlineAddFields"][] = "contract";
$tdataexemptions[".inlineAddFields"][] = "Location";
$tdataexemptions[".inlineAddFields"][] = "VRM";
$tdataexemptions[".inlineAddFields"][] = "Start Date";
$tdataexemptions[".inlineAddFields"][] = "EndDate";
$tdataexemptions[".inlineAddFields"][] = "Reason";
$tdataexemptions[".inlineAddFields"][] = "make";
$tdataexemptions[".inlineAddFields"][] = "colour";

$tdataexemptions[".editFields"] = array();
$tdataexemptions[".editFields"][] = "Location";
$tdataexemptions[".editFields"][] = "VRM";
$tdataexemptions[".editFields"][] = "Start Date";
$tdataexemptions[".editFields"][] = "EndDate";
$tdataexemptions[".editFields"][] = "Reason";
$tdataexemptions[".editFields"][] = "make";
$tdataexemptions[".editFields"][] = "colour";
$tdataexemptions[".editFields"][] = "contract";

$tdataexemptions[".inlineEditFields"] = array();
$tdataexemptions[".inlineEditFields"][] = "contract";
$tdataexemptions[".inlineEditFields"][] = "Location";
$tdataexemptions[".inlineEditFields"][] = "VRM";
$tdataexemptions[".inlineEditFields"][] = "Start Date";
$tdataexemptions[".inlineEditFields"][] = "EndDate";
$tdataexemptions[".inlineEditFields"][] = "Reason";
$tdataexemptions[".inlineEditFields"][] = "make";
$tdataexemptions[".inlineEditFields"][] = "colour";

$tdataexemptions[".exportFields"] = array();
$tdataexemptions[".exportFields"][] = "ID";
$tdataexemptions[".exportFields"][] = "Location";
$tdataexemptions[".exportFields"][] = "VRM";
$tdataexemptions[".exportFields"][] = "Start Date";
$tdataexemptions[".exportFields"][] = "EndDate";
$tdataexemptions[".exportFields"][] = "Reason";
$tdataexemptions[".exportFields"][] = "make";
$tdataexemptions[".exportFields"][] = "colour";
$tdataexemptions[".exportFields"][] = "contract";
	
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "exemptions";
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
	
	$tdataexemptions["ID"] = $fdata;
//	Location
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataexemptions["Location"] = $fdata;
//	VRM
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "VRM";
	$fdata["GoodName"] = "VRM";
	$fdata["ownerTable"] = "exemptions";
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
	
	$tdataexemptions["VRM"] = $fdata;
//	Start Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Start Date";
	$fdata["GoodName"] = "Start_Date";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Start Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Start Date"; 
		$fdata["FullName"] = "`Start Date`";
	
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

		
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataexemptions["Start Date"] = $fdata;
//	EndDate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "EndDate";
	$fdata["GoodName"] = "EndDate";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "End Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "EndDate"; 
		$fdata["FullName"] = "EndDate";
	
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

		
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataexemptions["EndDate"] = $fdata;
//	Reason
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Reason";
	$fdata["GoodName"] = "Reason";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Reason"; 
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
	
		$fdata["strField"] = "Reason"; 
		$fdata["FullName"] = "Reason";
	
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
	
	$tdataexemptions["Reason"] = $fdata;
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "exemptions";
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
	
	$tdataexemptions["make"] = $fdata;
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "exemptions";
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
	
	$tdataexemptions["colour"] = $fdata;
//	contract
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "contract";
	$fdata["GoodName"] = "contract";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Contract"; 
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
	
		$fdata["strField"] = "contract"; 
		$fdata["FullName"] = "contract";
	
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
					
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataexemptions["contract"] = $fdata;

	
$tables_data["exemptions"]=&$tdataexemptions;
$field_labels["exemptions"] = &$fieldLabelsexemptions;
$fieldToolTips["exemptions"] = &$fieldToolTipsexemptions;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["exemptions"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["exemptions"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_exemptions()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   Location,   VRM,   `Start Date`,   EndDate,   Reason,   make,   colour,   contract";
$proto0["m_strFrom"] = "FROM exemptions";
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
	"m_strTable" => "exemptions"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "exemptions"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Start Date",
	"m_strTable" => "exemptions"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "EndDate",
	"m_strTable" => "exemptions"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Reason",
	"m_strTable" => "exemptions"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "make",
	"m_strTable" => "exemptions"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "colour",
	"m_strTable" => "exemptions"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "exemptions"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto23=array();
$proto23["m_link"] = "SQLL_MAIN";
			$proto24=array();
$proto24["m_strName"] = "exemptions";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "ID";
$proto24["m_columns"][] = "Location";
$proto24["m_columns"][] = "VRM";
$proto24["m_columns"][] = "Start Date";
$proto24["m_columns"][] = "EndDate";
$proto24["m_columns"][] = "Reason";
$proto24["m_columns"][] = "make";
$proto24["m_columns"][] = "colour";
$proto24["m_columns"][] = "contract";
$obj = new SQLTable($proto24);

$proto23["m_table"] = $obj;
$proto23["m_alias"] = "";
$proto25=array();
$proto25["m_sql"] = "";
$proto25["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto25["m_column"]=$obj;
$proto25["m_contained"] = array();
$proto25["m_strCase"] = "";
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
$queryData_exemptions = createSqlQuery_exemptions();
									$tdataexemptions[".sqlquery"] = $queryData_exemptions;
	
if(isset($tdataexemptions["field2"])){
	$tdataexemptions["field2"]["LookupTable"] = "carscars_view";
	$tdataexemptions["field2"]["LookupOrderBy"] = "name";
	$tdataexemptions["field2"]["LookupType"] = 4;
	$tdataexemptions["field2"]["LinkField"] = "email";
	$tdataexemptions["field2"]["DisplayField"] = "name";
	$tdataexemptions[".hasCustomViewField"] = true;
}

$tableEvents["exemptions"] = new eventsBase;
$tdataexemptions[".hasEvents"] = false;

$cipherer = new RunnerCipherer("exemptions");

?>