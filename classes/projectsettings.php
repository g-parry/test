<?php
class ProjectSettings
{
	var $_table;
	
	var $_viewPage = PAGE_VIEW;

	var $_defaultViewPage = PAGE_VIEW;
	
	var $_editPage = PAGE_EDIT;
	
	var $_defaultEditPage = PAGE_EDIT;
	
	var $_tableData = array();
	
	var $_mastersTableData = array();
	
	var $_detailsTableData = array();
		
	function ProjectSettings($table = "", $page = "")
	{
		if($table && $table != 'global')
			$this->setTable($table);
		if($page)
			$this->setPage($page);
	}
	
	function setTable($table)
	{
		$this->_table = $table;
		global $tables_data, $field_labels, $fieldToolTips, $detailsTablesData, $masterTablesData, $tableEvents, $cipherer;
		if(GetTableURL($table) != "")
			include_once(getabspath("include/".GetTableURL($table)."_settings.php"));
		
		if(array_key_exists($this->_table, $tables_data))
			$this->_tableData = &$tables_data[$this->_table];
		
		$this->_mastersTableData = &$masterTablesData[$this->_table];
		$this->_detailsTableData = &$detailsTablesData[$this->_table];
		
		$this->_editPage = $this->getDefaultEditPageType($this->isTableType());	
		$this->_viewPage = $this->getDefaultViewPageType($this->isTableType());	
		$this->_defaultEditPage = $this->_editPage;
		$this->_defaultViewPage = $this->_viewPage;
	}

	function getDefaultViewPageType($tableType)
	{
		if($tableType == "report")
			return PAGE_REPORT;
		if($tableType == "chart")
			return PAGE_CHART;
		return PAGE_VIEW;
	}

	function getDefaultEditPageType($tableType)
	{
		if($tableType == "report" || $tableType == "chart")
			return PAGE_SEARCH;
		return PAGE_EDIT;
	}

	
	function setPage($page)
	{
		//	a deeper checking for table and page types compatibility might be added here
		if($this->isPageTypeForView($page))
		{
			if($this->isTableType() != "report" && $this->isTableType() != "chart"
				&& ($page == PAGE_CHART || $page == PAGE_REPORT))
				$this->_viewPage = PAGE_LIST;
			else 
				$this->_viewPage = $page;
			$this->_defaultViewPage = $this->getDefaultViewPageType($this->isTableType());
		}
		if($this->isPageTypeForEdit($page))
		{
			$this->_editPage = $page;
			$this->_defaultEditPage = $this->getDefaultEditPageType($this->isTableType());
		}
	}
	
	function isPageTypeForView($ptype)
	{
		global $pageTypesForView;
		return in_array(strtolower($ptype), $pageTypesForView);
	}

	function isPageTypeForEdit($ptype)
	{
		global $pageTypesForEdit;
		return in_array(strtolower($ptype), $pageTypesForEdit);	
	}

	function getTable($table, $page = "")
	{
		return new ProjectSettings($table, $page);
	}
	
	function getTableData($key)
	{
		if(!$this->isExistsTableKey($key))
			return $this->getDefaultValueByKey(substr($key,1));
		return $this->_tableData[$key];
	}
	
	function getFieldData($field, $key )
	{
		if(!isset($this->_tableData[$field]))
			return $this->getDefaultValueByKey($key);
			
		if(!$this->isSeparate($field))
		{
			$viewPage = $this->_defaultViewPage;
			$editPage = $this->_defaultEditPage;
		}
		else
		{
			$editPage = $this->_editPage;
			$viewPage = $this->_viewPage;
		}

		if(array_key_exists($key, $this->_tableData[$field][FORMAT_VIEW][$viewPage]))
			return $this->_tableData[$field][FORMAT_VIEW][$viewPage][$key];

		if(array_key_exists($key, $this->_tableData[$field][FORMAT_EDIT][$editPage]))
			return $this->_tableData[$field][FORMAT_EDIT][$editPage][$key];
			
		if (isset($this->_tableData[$field][$key]))
			return $this->_tableData[$field][$key];
		
		return $this->getDefaultValueByKey($key);
	}
	
	/**
	 * addCustomExpressionIndex
	 * Add new index to list, for determination of custom expressions position in SQL query   
	 * @param {string} table wich contain a lookup field
	 * @param {string} name of lookup field
	 * @param {int} index
	 */
	function addCustomExpressionIndex($mainTable, $mainField, $index)
	{
		if(!$this->isExistsTableKey(".customExpressionIndexes"))
			$this->_tableData[".customExpressionIndexes"] = array();
		if(!isset($this->_tableData[".customExpressionIndexes"][$mainTable]))
			$this->_tableData[".customExpressionIndexes"][$mainTable] = array();
		$this->_tableData[".customExpressionIndexes"][$mainTable][$mainField] = $index;
	}
	
	/**
	 * getCustomExpressionIndex
	 * Get index of custom expression in SQL field
	 * @param {string} table wich contain a lookup field
	 * @param {string} name of lookup field
	 */
	function getCustomExpressionIndex($mainTable, $mainField)
	{
		if(!$this->isExistsTableKey(".customExpressionIndexes"))
			$this->_tableData[".customExpressionIndexes"] = array();
		if(isset($this->_tableData[".customExpressionIndexes"][$mainTable]) 
			&& isset($this->_tableData[".customExpressionIndexes"][$mainTable][$mainField]))
			return $this->_tableData[".customExpressionIndexes"][$mainTable][$mainField];
			
		return FALSE;
	}
	
	function isExistsTableKey($key)
	{
		//if(!array_key_exists($this->_table,$this->_tableData))
		//	return false;
		if(!array_key_exists($key, $this->_tableData))
			return false;
		return true;
	}

	function isExistsFieldKey($field, $key)
	{
		if(!$this->isExistsTableKey($this->_table, $field))
			return false;
		if(!array_key_exists($key, $this->_tableData[$field]))
			return false;
		return true;
	}
	
	function getDefaultValueByKey($key)
	{
		global $g_defaultOptionValues;
		if(array_key_exists($key, $g_defaultOptionValues))
			return $g_defaultOptionValues[$key];
		return false;
	}
	
	/**
	 * Returns array of master tables , which are master for current detail table
	 * @param string $tName - it's data source detail table name
	 * @return array if success otherwise false
	 */
	function getMasterTablesArr($tName) 
	{
		return $this->_mastersTableData;
	}
	
	/**
	 * Returns array of master keys for passed detailTable
	 *
	 * @param string $dTableName - it's detail data sourse table name, 
	 * @return array if success otherwise false
	 */
	function getMasterKeysByDetailTable($dTableName, $default = array())
	{
		if(!$dTableName)
			return $default;
		foreach ($this->_detailsTableData as $dTableDataArr)
		{
			if ($dTableDataArr['dDataSourceTable'] == $dTableName)
				return $dTableDataArr['masterKeys'];
		}
		return $default;
	}

	/**
	 * Returns array of detail tables , which are detail for current master table
	 * @param string $tName - it's data source master table name
	 * @return array if success otherwise false
	 */
	function getDetailTablesArr() 
	{
		return $this->_detailsTableData;
	}
	
	/**
	 * Returns array of detail keys for passed masterTable
	 *
	 * @param string $mTableName - it's master table name, 
	 * @param string $tName - it's current (detail) table
	 * @return array if success otherwise default value
	 */
	function getDetailKeysByMasterTable($mTableName = "", $default = array())
	{
		if(!$mTableName)
			return $default;
		foreach($this->_mastersTableData as $mTableDataArr)
		{
			if ($mTableDataArr['mDataSourceTable'] == $mTableName)
				return $mTableDataArr['detailKeys'];
		}
		return $default;
	}
	
	/**
	 * Returns array of detail keys for passed detailTable
	 *
	 * @param string $dTableName - It's detail data sourse table name
	 * @param string $tName - current(master) table name
	 * @return array if success otherwise false
	 */
	function getDetailKeysByDetailTable($dTableName, $default = array())
	{
		foreach ($this->_detailsTableData as $dTableDataArr)
		{
			if ($dTableDataArr['dDataSourceTable'] == $dTableName)
				return $dTableDataArr['detailKeys'];
		}
		return $default;
	}
	
	/**
	 * Returns details preview Type 
	 *
	 * @param string $dTableName - it's detail data sourse table name, 
	 * @param string $tName - current(master) table name
	 * @return array if success otherwise false
	 */
	function getDPType($dTableName) 
	{
		if(!$dTableName)
			return false;
		foreach ($this->_detailsTableData as $dTableDataArr)
		{
			if ($dTableDataArr['dDataSourceTable'] == $dTableName)
				return $dTableDataArr['previewOnList'];
		}
		return false;
	}

	function GetFieldByIndex($index)
	{
		//if(!array_key_exists($this->_table, $this->_tableData))
		//	return null;
		
		foreach($this->_tableData as $key => $value)
		{
			if(!is_array($value) || !array_key_exists("Index",$value))
				continue;
			if($value["Index"]==$index and $this->getFieldIndex($key))
				return $key;
		}
		return null;
	}
	
	//	Is field has separate type for editing and viewing 
	function isSeparate($field)
	{
		if (array_key_exists("isSeparate", $this->_tableData[$field]))
			return $this->_tableData[$field]["isSeparate"];
		return false;
	}
	
	// return field label
	function label($field)
	{
		$result = $this->getFieldData($field, "Label"); 
		return $result != "" ? $result : $field;
	}

	//	return filename field if any
	//	viewFormat setting
	function getFilenameField($field)
	{
		return $this->getFieldData($field, "Filename");
	}

	//	return hyperlink prefix
	//	viewFormat setting
	function getLinkPrefix($field)
	{
		return $this->getFieldData($field, "LinkPrefix");
	}

	//	return database field type
	//	using ADO DataTypeEnum constants
	//	the full list available at:
	//	http://msdn.microsoft.com/library/default.asp?url=/library/en-us/ado270/htm/mdcstdatatypeenum.asp
	function getFieldType($field)
	{
		return $this->getFieldData($field, "FieldType");
	}

	function isAutoincField($field)
	{
		return $this->getFieldData($field, "AutoInc");
	}
	
	//	editFormat setting
	function isUseiBox($field)
	{
		return $this->getFieldData($field, "UseiBox");
	}
	
	function isAutoUpdate($field)
	{
		return $this->getFieldData($field, "AutoUpdate");
	}
	
	function getDefaultValue($field)
	{
		$editPage = $this->_editPage;
		if(!$this->isSeparate($field))
			$editPage = $this->getDefaultEditPageType($this->isTableType());;
		return GetDefaultValue($field, $editPage, $this->_table);
	}

	//	return Edit format
	//	editFormats
	function getEditFormat($field)
	{
		return $this->getFieldData($field, "EditFormat");
	}
	
	function isReadonly($field)
	{
		if($this->getEditFormat($field) == EDIT_FORMAT_READONLY)
			return true;
		return false;
	}

	//	return View format
	//	viewFormat setting
	function getViewFormat($field)
	{
		return $this->getFieldData($field, "ViewFormat");
	}

	//	show time in datepicker or not
	function dateEditShowTime($field)
	{
		return $this->getFieldData($field, "ShowTime");
	}

	//	use FastType Lookup wizard or not
	function fastType($field)
	{
		return $this->getFieldData($field, "FastType");
	}

	function lookupControlType($field)
	{
		return $this->getFieldData($field, "LCType");
	}

	//	is Lookup wizard dependent or not
	function useCategory($field)
	{
		return $this->getFieldData($field, "UseCategory");
	}

	//	is Lookup wizard with multiple selection
	function multiSelect($field)
	{
		return $this->getFieldData($field, "Multiselect");
	}

	// Lookup wizard select size
	function selectSize($field)
	{
		return $this->getFieldData($field, "SelectSize");
	}

	function showThumbnail($field)
	{
		return $this->getFieldData($field, "ShowThumbnail");
	}

	function getImageWidth($field)
	{
		return $this->getFieldData($field, "ImageWidth");
	}

	function getImageHeight($field)
	{
		return $this->getFieldData($field, "ImageHeight");
	}
	
	// Get nLookupType for current field
	function getLookupType($field)
	{
		return $this->getFieldData($field, "LookupType");
	}

	// Get pLookupObj.nLookupType for current field
	function getpLookupType($field)
	{
		return $this->getFieldData($field, "pLookupType");
	}

	//Get lookup table name
	function getLookupTable($field)
	{
		return $this->getFieldData($field, "LookupTable");
	}
	
	function getLinkField($field)
	{
		return $this->getFieldData($field, "LinkField");
	}
	
	function getLWLinkField($field, $addWrap = true)
	{
		if ($addWrap)
			return AddFieldWrappers($this->getLinkField($field)); 
		else 
			return $this->getLinkField($field);	
	}
	
	function getLWLinkFieldType($field)
	{
		return $this->getFieldData($field, "LinkFieldType");
	}
	
	function getDisplayField($field)
	{
		return $this->getFieldData($field,"DisplayField");
	}
	
	function getCustomDisplay($field)
	{
		return $this->getFieldData($field, 'CustomDisplay');
	}
	
	//	viewFormats
	function NeedEncode($field)
	{
		return $this->getFieldData($field, "NeedEncode");
	}
	
	/**
	 * Get array of validation for control
	 * return array - of validations
	 */
	function getValidation($field)
	{
		return $this->getFieldData($field, "validateAs");
	}

	/** Check is appear current field on list page
	  *	return boolean - true or false	
	  */
	function appearOnListPage($field)
	{	
		return $this->getFieldData($field, "bListPage");
	}

	/** Check is appear current field on add page
	  *	return boolean - true or false	
	  */
	function appearOnAddPage($field)
	{
		return $this->getFieldData($field,"bAddPage");
	}

	/** Check is appear current field on inline add
	  *	return boolean - true or false	
	  */
	function appearOnInlineAdd($field)
	{
		return $this->getFieldData($field,"bInlineAdd");
	}

	/** Check is appear current field on edit page
	  *	return boolean - true or false	
	  */
	function appearOnEditPage($field)
	{
		return $this->getFieldData($field, "bEditPage");
	}

	/** Check is appear current field on edit page
	  *	return boolean - true or false	
	  */
	function appearOnInlineEdit($field)
	{
		return $this->getFieldData($field, "bInlineEdit");
	}

	/** Check is appear current field on view page
	  *	return boolean - true or false	
	  */
	function appearOnViewPage($field)
	{
		return $this->getFieldData($field, "bViewPage");
	}

	/** Check is appear current field on print page
	  *	return boolean - true or false	
	  */
	function appearOnPrinterPage($field)
	{
		return $this->getFieldData($field, "bPrinterPage");
	}
	
	function isVideoUrlField($field)
	{
		return $this->getFieldData($field, "fieldIsVideoUrl");
	}
	
	function isAbsolute($field)
	{
		return $this->getFieldData($field, "Absolute");
	}
	
	function getAudioTitleField($field)
	{
		return $this->getFieldData($field, "audioTitleField");
	}
	
	function getVideoWidth($field)
	{
		return $this->getFieldData($field, "videoWidth");
	}	

	function getVideoHeight($field)
	{
		return $this->getFieldData($field, "videoHeight");
	}

	function getCategoryFilter($field)
	{
		return $this->getFieldData($field, "CategoryFilter");
	}

	function isLookupUnique($field)
	{
		return $this->getFieldData($field, "LookupUnique");
	}

	function getLookupOrderBy($field)
	{
		return $this->getFieldData($field, "LookupOrderBy");
	}

	function isLookupDesc($field)
	{
		return $this->getFieldData($field, "LookupDesc");
	}

	function getOwnerTable($field)
	{
		return $this->getFieldData($field, "ownerTable");
	}

	function isFieldEncrypted($field)
	{
		return $this->getFieldData($field, "bIsEncrypted");
	}

	function isAllowToAdd($field)
	{
		return $this->getFieldData($field, "AllowToAdd");
	}

	function isSimpleAdd($field)
	{
		return $this->getFieldData($field, "SimpleAdd");
	}

	function getAutoCompleteFields($field)
	{
		return $this->getFieldData($field, "autoCompleteFields");
	}

	function isAutoCompleteFieldsOnEdit($field)
	{
		return $this->getFieldData($field, "autoCompleteFieldsOnEdit");
	}

	function isfreeInput($field)
	{
		return $this->getFieldData($field, "freeInput");
	}

	function getMapData($field)
	{
		return $this->getFieldData($field, "mapData");
	}

	function getFormatTimeAttrs($field)
	{
		return $this->getFieldData($field, "FormatTimeAttrs");
	}
		
	function useIbox($field)
	{
		return $this->getFieldData($field, "UseiBox");
	}
		
	/** Check is appear current field on export page
	  *	return boolean - true or false	
	  */
	function appearOnExportPage($field)
	{
		return $this->getFieldData($field, "bExportPage");
	}
	
	/** Check is appear current field on register page
	  *	return boolean - true or false	
	  */
	function appearOnRegisterOrSearchPage($field, $pageType)
	{
		$arrFields = array();
		if($pageType == PAGE_REGISTER)
			$arrFields = $this->getFieldsForRegister();
		elseif($pageType == PAGE_SEARCH)
			$arrFields = $this->getAllSearchFields();
		else
			return 'break';
		
		for($i=0;$i<count($arrFields);$i++)
		{
			if($arrFields[$i]==$field)
			{
				return true;
			}	
		}
		return false;	
	} 

	/** Check is appear field on page by page type
	  * param $fName - field name
	  * param $pageType - type of current page
	  *	return boolean/string - true or false/'break' - if need to break the cycle	
	  */
	function AppearOnCurrentPage($fName, $pageType, $pageLikeInline = false)
	{
		if($pageType == PAGE_LIST)
		{
			if($this->appearOnListPage($fName))
				return true;
			else
				return $this->appearOnRegisterOrSearchPage($fName,PAGE_SEARCH);	
		}
		elseif($pageType == PAGE_ADD)
		{
			if($pageLikeInline)
			{
				if($this->appearOnInlineAdd($fName) && $this->appearOnListPage($fName))
					return true;
			}
			else if($this->appearOnAddPage($fName))
				return true;
		}
		elseif($pageType == PAGE_EDIT)
		{
			if($pageLikeInline)
			{
				if($this->appearOnInlineEdit($fName) && $this->appearOnListPage($fName))
					return true;
			}
			else if($this->appearOnEditPage($fName))
				return true;
		}
		elseif($pageType == PAGE_SEARCH || $pageType == PAGE_REPORT || $pageType == PAGE_CHART)
			return $this->appearOnRegisterOrSearchPage($fName, PAGE_SEARCH);
		elseif($pageType == PAGE_REGISTER)
			return $this->appearOnRegisterOrSearchPage($fName, PAGE_REGISTER);
		else
			return 'break';
		return false;
	}
	
	function getFieldsForRegister()
	{
		return $this->getTableData(".fieldsForRegister");
	}
	
	function getAllSearchFields()
	{
		return $this->getTableData('.allSearchFields');
	}
	
	function isUseCalendarForSearch()
	{
		return $this->getTableData(".isUseCalendarForSearch");
	}
	
	function isUseTimeForSearch()
	{
		return $this->GetTableData(".isUseTimeForSearch");
	}
	
	function isUseToolTips()
	{
		return $this->GetTableData(".isUseToolTips");
	}

	function isUseVideo()
	{
		return $this->GetTableData(".isUseVideo");
	}

	function isUseAudio()
	{
		return $this->GetTableData(".isUseAudio");
	}

	function isTableType()
	{
		return $this->GetTableData(".isTableType");
	}

	function getShortTableName()
	{
		return $this->GetTableData(".shortTableName");
	}

	function isShowAddInPopup()
	{
		return $this->GetTableData(".showAddInPopup");
	}
	
	function isShowEditInPopup()
	{
		return $this->GetTableData(".showEditInPopup");
	}
	
	function isShowViewInPopup()
	{
		return $this->GetTableData(".showViewInPopup");
	}
	
	function isResizeColumns()
	{
		return $this->GetTableData(".isResizeColumns");
	}
	
	function isUseAjaxSuggest()
	{
		return $this->GetTableData(".isUseAjaxSuggest");
	}
	
	function isUseDetailsPreview()
	{
		return $this->GetTableData(".useDetailsPreview");
	}

	
	function getPanelSearchFields()
	{
		return $this->GetTableData(".panelSearchFields");
	}

	function getGoogleLikeFields()
	{
		return $this->GetTableData(".googleLikeFields");
	}

	function getInlineEditFields()
	{
		return $this->GetTableData(".inlineEditFields");
	}
	
	function getExportFields()
	{
		return $this->GetTableData(".exportFields");
	}

	function getEditFields()
	{
		return $this->GetTableData(".editFields");
	}

	function getInlineAddFields()
	{
		return $this->GetTableData(".inlineAddFields");
	}

	function getAddFields()
	{
		return $this->GetTableData(".addFields");
	}

	function getListFields()
	{
		return $this->GetTableData(".listFields");
	}

	function isAddPageEvents()
	{
		return $this->GetTableData(".addPageEvents");
	}

	function isUsebuttonHandlers()
	{
		return $this->GetTableData(".isUsebuttonHandlers");
	}

	function isUseMainMaps()
	{
		return $this->GetTableData(".isUseMainMaps");
	}

	function isUseFieldsMaps()
	{
		return $this->GetTableData(".isUseFieldsMaps");
	}

	function getOrderIndexes()
	{
		return $this->GetTableData(".orderindexes");
	}

	function getStrOrderBy()
	{
		return $this->GetTableData(".strOrderBy");
	}

	function getSQLQuery()
	{
		return $this->GetTableData(".sqlquery");
	}

	//	Category Control field for dependent dropdowns
	function getCategoryControl($field)
	{
		return $this->getFieldData($field,"CategoryControl");
	}

	//	create Thumbnail or not
	function getCreateThumbnail($field)
	{
		return $this->GetFieldData($field, "CreateThumbnail");
	}

	//	return Thumbnail prefix
	function getStrThumbnail($field)
	{
		return $this->getFieldData($field, "StrThumbnail");
	}

	//	resize on upload
	function getResizeOnUpload($field)
	{
		return $this->getFieldData($field, "ResizeImage");
	}

	//	get size to reduce image after upload
	function getNewImageSize($field)
	{
		return $this->getFieldData($field, "NewSize");
	}
	
	//	return height of text area
	//	editFormat setting
	function getNRows($field)
	{
		return $this->getFieldData($field, "nRows");
	}

	//	return width of text area
	//	editFormat setting
	function getNCols($field)
	{
		return $this->getFieldData($field, "nCols");
	}

	//	return original table name
	function getOriginalTableName()
	{
		$result = $this->getTableData(".OriginalTable");
		return  $result != "" ? $result : $this->_table;
	}

	//	return list of key fields
	function getTableKeys()
	{
		return $this->getTableData(".Keys");
	}

	//	return number of chars to show before More... link
	function getNumberOfChars()
	{
		return $this->getTableData(".NumberOfChars");
	}
	
	function getFullNameField($field)
	{
		$result = $this->getFieldData($field, "FullName");
		return $result != "" ? $result : AddFieldWrappers($field);
	}
	
	//	return table Owner ID field
	function getTableOwnerID()
	{
		return $this->getTableData(".OwnerID");
	}

	//	is field marked as required
	//	editFormat setting 
	function isRequired($field)
	{
		return $this->getFieldData($field, "IsRequired");
	}

	//	use Rich Text Editor or not
	function isUseRTE($field)
	{
		return $this->getFieldData($field, "UseRTE");
	}

	//	use Rich Text Editor BASIC or not
	function isUseRTEBasic($field)
	{
		global $isUseRTEBasic;
		return $this->isUseRTE($field) && $isUseRTEBasic;
	}

	//	use Rich Text Editor FCK or not
	function isUseRTEFCK($field)
	{
		global $isUseRTECK;
		return $this->isUseRTE($field) && $isUseRTECK;
	}

	//	use Rich Text Editor INNOVA or not
	function isUseRTEInnova($field)
	{
		global $isUseRTEInnova;
		return $this->isUseRTE($field) && $isUseRTEInnova;
	}

	//	add timestamp to filename when uploading files or not
	//	editFormat setting
	function isUseTimestamp($field)
	{
		return $this->getFieldData($field, "UseTimestamp");
	}
	
	function getFieldIndex($field)
	{
		return $this->getFieldData($field, "Index");
	}
	
	//	return Date field edit type
	function getDateEditType($field)
	{
		return $this->getFieldData($field, "DateEditType");
	}

	// returns text edit parameters
	function getEditParams($field)
	{
		return $this->getFieldData($field, "EditParams");
	}
	
	//	check whether field is viewable
	function checkFieldPermissions($field)
	{
		return $this->getFieldData($field,"FieldPermissions");
	}
	
	function getTableOwnerIdField()
	{
		return $this->getTableData(".mainTableOwnerID");
	}
	
	function getDependentLookups($field)
	{
		return $this->getFieldData($field, "DependentLookups");
	}

	function isHorizontalLookup($field)
	{
		return $this->getFieldData($field, "HorizontalLookup");
	}

	function isDecimalDigits($field)
	{
		return $this->getFieldData($field, "DecimalDigits");
	}
	
	function getLookupValues($field)
	{
		return $this->getFieldData($field, "LookupValues");
	}
	
	function hasEditPage()
	{
		return $this->getTableData(".edit");
	}
	function hasInlineEdit()
	{
		return $this->getTableData(".inlineEdit");
	}
	function hasCopyPage()
	{
		return $this->getTableData(".copy");
	}
	function hasViewPage()
	{
		return $this->getTableData(".view");
	}
	function hasExportPage()
	{
		return $this->getTableData(".exportTo");
	}
	function hasPrintPage()
	{
		return $this->getTableData(".printFriendly");
	}
	function hasDelete()
	{
		return $this->getTableData(".delete");
	}
	function getTotalsFields()
	{
		return $this->getTableData(".totalsFields");
	}
	function getAdvancedSecurityType()
	{
		return $this->getTableData(".nSecOptions");
	}
	function displayLoading()
	{
		return $this->getTableData(".isDisplayLoading");
	}
	function getRecordsPerPageArray()
	{
		return $this->getTableData(".arrRecsPerPage");
	}
	function getGroupsPerPageArray()
	{
		return $this->getTableData(".arrGroupsPerPage");
	}
	function isReportWithGroups()
	{
		return $this->getTableData(".reportGroupFields");
	}
	function noRecordsOnFirstPage()
	{
		return $this->getTableData(".noRecordsFirstPage");
	}
	function getInitialPageSize()
	{
		return $this->getTableData(".pageSize");
	}
	function getRecordsPerRowList()
	{
		return $this->getTableData(".recsPerRowList");
	}
	function useMoveNext()
	{
		return $this->getTableData(".moveNext");
	}
	function highlightRows()
	{
		return $this->getTableData(".rowHighlite");
	}
	function useIboxTable()
	{
		return $this->getTableData(".useIbox");
	}
	function hasInlineAdd()
	{
		return $this->getTableData(".inlineAdd");
	}
	function isVerticalLayoutList()
	{
		return $this->getTableData(".isVerLayout");
	}
	function tableSupportsSubqueries()
	{
		return $this->getTableData(".subQueriesSupAccess");
	}
	function iconsOnList()
	{
		return $this->getTableData(".listIcons");
	}
	function ajaxBasedListPage()
	{
		return $this->getTableData(".listAjax");
	}
	/**
	 * Returns array of tabs and sections, which use on add page
	 * @param string $table - current data source table name
	 * @return array
	 */
	function getAddTabs()
	{	
		return $this->getTableData(".arrAddTabs");
	}
	/**
	 * Check use tabs and sections on add page or not
	 * @param string $table - current data source table name
	 * @return boolean result - true or false
	 */
	function useTabsOnAdd()
	{
		if(count($this->getAddTabs()))
			return true;
		return false;
	}
	
	/**
	 * Returns array of tabs and sections, which use on edit page
	 * @param string $table - current data source table name
	 * @return array
	 */
	function getEditTabs()
	{	
		return $this->getTableData(".arrEditTabs");
	}
	
	/**
	 * Check use tabs and sections on edit page or not
	 * @param string $table - current data source table name
	 * @return boolean result - true or false
	 */
	function useTabsOnEdit()
	{
		if(count($this->getEditTabs()))
			return true;
		return false;
	}
	
	/**
	 * Returns array of tabs and sections, which use on view page
	 * @param string $table - current data source table name
	 * @return array
	 */
	function getViewTabs()
	{	
		return $this->getTableData(".arrViewTabs");
	}

	/**
	 * Check use tabs and sections on view page or not
	 * @param string $table - current data source table name
	 * @return boolean result - true or false
	 */
	function useTabsOnView()
	{
		if(count($this->getViewTabs()))
			return true;
		return false;
	}
	
	function getFieldsList()
	{
		if(is_null($this->_tableData))
			return array();
		$t = array_keys($this->_tableData);
		$arr = array();
		foreach($t as $f)
			if(substr($f,0,1)!=".")
				$arr[] = $f;
		return $arr;
	}

	function getBinaryFieldsIndices()
	{
		$fields = $this->getFieldsList();
		$out = array();
		foreach($fields as $idx => $f)
		{
			if(IsBinaryType($this->getFieldType($f)))
				$out[] = $idx + 1;
		}
		return $out;
	}
	
	function getNBFieldsList()
	{
		$t = $this->getFieldsList();
		$arr = array();
		foreach($t as $f)
			if(!IsBinaryType($this->getFieldType($f)))
				$arr[] = $f;
		return $arr;
	}

	function getLWDisplayField($field, $addWrap = true)
	{
		$result = $this->getDisplayField($field);
		if ($addWrap && !$this->getCustomDisplay($field))
			return AddFieldWrappers($result); 
		else 
			return $result;	
	}

	//	return field name
	function getFieldByGoodFieldName($field)
	{
		foreach($this->_tableData as $key => $value)
		{
			if(count($value) > 1)
			{
				if($value["GoodName"] == $field)
					return $key;
			}
		}
		return "";
	}
	
	function getUploadFolder($field)
	{
		$path = $this->getFieldData($field, "UploadFolder");
		if(strlen($path) && substr($path,strlen($path)-1) != "/")
			$path.="/";
		return $path;
	}

	function &getQueryObject()
	{
		$queryObj = $this->getSQLQuery();
		return $queryObj;
	}

	function getListOfFieldsByExprType($needaggregate)
	{
		$query = &$this->getSQLQuery();
		$fields = $this->getFieldsList();
		$out = array();
		foreach($fields as $idx=>$f)
		{
			$aggr = $query->IsAggrFuncField($idx);
			if($needaggregate && $aggr || !$needaggregate && !$aggr)
				$out[] = $f;
		}
		return $out;
	}
	
	function getNCSearch()
	{
		return $this->getTableData(".NCSearch");
	}
	
	function isEnableUpper($val)
	{
		if($this->getNCSearch())
			return db_upper($val);
		else
			return $val;
	}
	
	function getChartRefreshTime()
	{
		return $this->getTableData(".ChartRefreshTime");
	}
	
	function getChartXml()
	{
		return $this->getTableData(".chartXml");
	}
	
	function auditEnabled()
	{
		return $this->getTableData(".audit");
	}
	
	function lockingEnabled()
	{
		return $this->getTableData(".locking");
	}
	
	function hasEncryptedFields()
	{
		return $this->getTableData(".hasEncryptedFields");
	}
	
	function showSearchPanel()
	{
		return $this->getTableData(".showSearchPanel");
	}
	
	function showSimpleSearchOptions()
	{
		return $this->getTableData(".showSimpleSearchOptions");
	}
	function isCaseInsensitiveUsername()
	{
		global $caseInsensitiveUsername;
		return $caseInsensitiveUsername;
	}
	function getCaseInsensitiveUsername($value)
	{
		if ($this->isCaseInsensitiveUsername())
			return $value;
		return strtoupper($value);
	}
	function getTableField($field)
	{
		$result = $this->getFieldData($field, "strField");
		if($result != "")
			return AddFieldWrappers($result);
		else 
			return $this->getFullNameField($field);
	}
	function getScrollGridBody()
	{
		return $this->getTableData(".scrollGridBody");
	}
	
}

$pageTypesForView = array();
$pageTypesForView[] = "list";
$pageTypesForView[] = "view";
$pageTypesForView[] = "export";
$pageTypesForView[] = "print";
$pageTypesForView[] = "report";
$pageTypesForView[] = "rprint";
$pageTypesForView[] = "chart";

$pageTypesForEdit = array();
$pageTypesForEdit[] = "add";
$pageTypesForEdit[] = "edit";
$pageTypesForEdit[] = "search";
$pageTypesForEdit[] = "register";

//	return table short name
function GetTableURL($table = "")
{
	global $strTableName, $projectTables;
	if(!$table)
		$table=$strTableName;
	if("ISHA Exemptions" == $table) 
		return "ISHA_Exemptions";
	if("NEW Exemptions" == $table) 
		return "NEW_Exemptions";
	if("Burdett Exemptions" == $table) 
		return "Burdett_Exemptions";
	if("Abbott North" == $table) 
		return "Abbott_North";
	if("Bethnal Green" == $table) 
		return "Bethnal_Green";
	if("Bow Bridge" == $table) 
		return "Bow_Bridge";
	if("Brownfield" == $table) 
		return "Brownfield";
	if("East End" == $table) 
		return "East_End";
	if("Glamis Estate" == $table) 
		return "Glamis_Estate";
	if("Island Homes" == $table) 
		return "Island_Homes";
	if("Lansbury" == $table) 
		return "Lansbury";
	if("Lansbury West" == $table) 
		return "Lansbury_West";
	if("Leopold" == $table) 
		return "Leopold";
	if("OFHA" == $table) 
		return "OFHA";
	if("Shadwell" == $table) 
		return "Shadwell";
	if("Spitalfields" == $table) 
		return "Spitalfields";
	if("admin_rights" == $table) 
		return "admin_rights";
	if("admin_members" == $table) 
		return "admin_members";
	if("admin_users" == $table) 
		return "admin_users";
	if("isha_audit" == $table) 
		return "isha_audit";
	if("Wessex Homes" == $table) 
		return "Wessex_Homes";
	if("Octavia Housing" == $table) 
		return "Octavia_Housing";
	if("West London Mental Health" == $table) 
		return "West_London_Mental_Health";
	if("Abbott South" == $table) 
		return "Abbott_South";
	if("isha_streets" == $table) 
		return "isha_streets";
	if("Demo Contract" == $table) 
		return "Demo_Contract";
	if("Devons" == $table) 
		return "Devons";
	if("Vehicle in Abbott North" == $table) 
		return "Vehicle_in_Abbott_North";
	if("Ticket Octavia" == $table) 
		return "Ticket_Octavia";
	if("Ticket Demo Site" == $table) 
		return "Ticket_Demo_Site";
	if("elite" == $table) 
		return "elite";
	if("Request Visit WLMH" == $table) 
		return "Request_Visit_WLMH";
}

//	return strTableName by short table name
function GetTableByShort($shortTName = "")
{	
	global $projectTables;
	if(!$shortTName)
		return false;
	if("ISHA_Exemptions" == $shortTName) 
		return "ISHA Exemptions";
	if("NEW_Exemptions" == $shortTName) 
		return "NEW Exemptions";
	if("Burdett_Exemptions" == $shortTName) 
		return "Burdett Exemptions";
	if("Abbott_North" == $shortTName) 
		return "Abbott North";
	if("Bethnal_Green" == $shortTName) 
		return "Bethnal Green";
	if("Bow_Bridge" == $shortTName) 
		return "Bow Bridge";
	if("Brownfield" == $shortTName) 
		return "Brownfield";
	if("East_End" == $shortTName) 
		return "East End";
	if("Glamis_Estate" == $shortTName) 
		return "Glamis Estate";
	if("Island_Homes" == $shortTName) 
		return "Island Homes";
	if("Lansbury" == $shortTName) 
		return "Lansbury";
	if("Lansbury_West" == $shortTName) 
		return "Lansbury West";
	if("Leopold" == $shortTName) 
		return "Leopold";
	if("OFHA" == $shortTName) 
		return "OFHA";
	if("Shadwell" == $shortTName) 
		return "Shadwell";
	if("Spitalfields" == $shortTName) 
		return "Spitalfields";
	if("admin_rights" == $shortTName) 
		return "admin_rights";
	if("admin_members" == $shortTName) 
		return "admin_members";
	if("admin_users" == $shortTName) 
		return "admin_users";
	if("isha_audit" == $shortTName) 
		return "isha_audit";
	if("Wessex_Homes" == $shortTName) 
		return "Wessex Homes";
	if("Octavia_Housing" == $shortTName) 
		return "Octavia Housing";
	if("West_London_Mental_Health" == $shortTName) 
		return "West London Mental Health";
	if("Abbott_South" == $shortTName) 
		return "Abbott South";
	if("isha_streets" == $shortTName) 
		return "isha_streets";
	if("Demo_Contract" == $shortTName) 
		return "Demo Contract";
	if("Devons" == $shortTName) 
		return "Devons";
	if("Vehicle_in_Abbott_North" == $shortTName) 
		return "Vehicle in Abbott North";
	if("Ticket_Octavia" == $shortTName) 
		return "Ticket Octavia";
	if("Ticket_Demo_Site" == $shortTName) 
		return "Ticket Demo Site";
	if("elite" == $shortTName) 
		return "elite";
	if("Request_Visit_WLMH" == $shortTName) 
		return "Request Visit WLMH";
}

//	A
	$g_defaultOptionValues["Absolute"] = false;
	$g_defaultOptionValues["addFields"] = array();
	$g_defaultOptionValues["addPageEvents"] = false;
	$g_defaultOptionValues["advSearchFields"] = array();
	$g_defaultOptionValues["AllowToAdd"] = false;
	$g_defaultOptionValues["allSearchFields"] = array();
	$g_defaultOptionValues["arrGroupsPerPage"] = array();
	$g_defaultOptionValues["arrKeyFields"] = array();
	$g_defaultOptionValues["arrAddTabs"] = array();
	$g_defaultOptionValues["arrEditTabs"] = array();
	$g_defaultOptionValues["arrRecsPerPage"] = array();
	$g_defaultOptionValues["arrViewTabs"] = array();
	$g_defaultOptionValues["audit"] = false;
	$g_defaultOptionValues["AutoInc"] = false;
	$g_defaultOptionValues["AutoUpdate"] = false;
	$g_defaultOptionValues["autoCompleteFields"] = array();
	$g_defaultOptionValues["autoCompleteFieldsOnEdit"] = false;
	$g_defaultOptionValues["audioTitleField"] = "";
//	B
	$g_defaultOptionValues["bAddPage"] = false;
	$g_defaultOptionValues["bAdvancedSearch"] = false;
	$g_defaultOptionValues["bEditPage"] = false;
	$g_defaultOptionValues["bExportPage"] = false;
	$g_defaultOptionValues["bInlineAdd"] = false;
	$g_defaultOptionValues["bInlineEdit"] = false;
	$g_defaultOptionValues["bIsEncrypted"] = false;
	$g_defaultOptionValues["bListPage"] = false;
	$g_defaultOptionValues["bPrinterPage"] = false;
	$g_defaultOptionValues["bViewPage"] = false;
//	C
	$g_defaultOptionValues["CategoryControl"] = "";
	$g_defaultOptionValues["CategoryFilter"] = "";
	$g_defaultOptionValues["ChartRefreshTime"] = 10;
	$g_defaultOptionValues["chartXml"] = "";
	$g_defaultOptionValues["copy"] = false;
	$g_defaultOptionValues["CreateThumbnail"] = false;
	$g_defaultOptionValues["CustomDisplay"] = false;
//	D
	$g_defaultOptionValues["DateEditType"] = 0;
	$g_defaultOptionValues["DecimalDigits"] = "";
	$g_defaultOptionValues["DefaultValue"] = "";
	$g_defaultOptionValues["delete"] = false;
	$g_defaultOptionValues["DependentLookups"] = array();
	$g_defaultOptionValues["DisplayField"] = "";
//	E
	$g_defaultOptionValues["edit"] = false;
	$g_defaultOptionValues["editFields"] = array();
	$g_defaultOptionValues["EditFormat"] = "";
	$g_defaultOptionValues["EditParams"] = "";
	$g_defaultOptionValues["exportTo"] = false;
//	F
	$g_defaultOptionValues["FastType"] = false;
	$g_defaultOptionValues["fieldIsVideoUrl"] = false;
	$g_defaultOptionValues["FieldType"] = "";
	$g_defaultOptionValues["FieldPermissions"] = false;
	$g_defaultOptionValues["fieldsForRegister"] = array();
	$g_defaultOptionValues["Filename"] = "";
	$g_defaultOptionValues["FormatTimeAttrs"] = array();
	$g_defaultOptionValues["freeInput"] = false;
	$g_defaultOptionValues["FullName"] = "";
//	G
	$g_defaultOptionValues["googleLikeFields"] = array();
	$g_defaultOptionValues["GoodName"] = "";
//	H
	$g_defaultOptionValues["hasEncryptedFields"] = false;
	$g_defaultOptionValues["HorizontalLookup"] = false;
//	I
	$g_defaultOptionValues["Index"] = 0;
	$g_defaultOptionValues["InitialYearFactor"] = "";
	$g_defaultOptionValues["ImageHeight"] = 0;
	$g_defaultOptionValues["ImageWidth"] = 0;
	$g_defaultOptionValues["inlineAdd"] = false;
	$g_defaultOptionValues["inlineAddFields"] = array();
	$g_defaultOptionValues["inlineEdit"] = false;
	$g_defaultOptionValues["inlineEditFields"] = array();
	$g_defaultOptionValues["isDisplayLoading"] = false;
	$g_defaultOptionValues["isTableType"] = "";
	$g_defaultOptionValues["IsRequired"] = false;
	$g_defaultOptionValues["isResizeColumns"] = false;
	$g_defaultOptionValues["isSeparate"] = false;
	$g_defaultOptionValues["isUseAjaxSuggest"] = false;
	$g_defaultOptionValues["isUseAudio"] = false;
	$g_defaultOptionValues["isUsebuttonHandlers"] = false;
	$g_defaultOptionValues["isUseCalendarForSearch"] = false;
	$g_defaultOptionValues["isUseFieldsMaps"] = false;
	$g_defaultOptionValues["isUseMainMaps"] = false;
	$g_defaultOptionValues["isUseTimeForSearch"] = false;
	$g_defaultOptionValues["isUseToolTips"] = false;
	$g_defaultOptionValues["isUseVideo"] = false;
	$g_defaultOptionValues["isVerLayout"] = false;
//	J
//	K
	$g_defaultOptionValues["Keys"] = array();
//	L
	$g_defaultOptionValues["Label"] = "";
	$g_defaultOptionValues["LastYearFactor"] = "";
	$g_defaultOptionValues["LCType"] = LCT_DROPDOWN;
	$g_defaultOptionValues["LinkField"] = "";
	$g_defaultOptionValues["LinkFieldType"] = 0;
	$g_defaultOptionValues["LinkPrefix"] = "";
	$g_defaultOptionValues["listAjax"] = false;
	$g_defaultOptionValues["listFields"] = array();
	$g_defaultOptionValues["listIcons"] = false;
	$g_defaultOptionValues["locking"] = false;
	$g_defaultOptionValues["LookupDesc"] = false;
	$g_defaultOptionValues["LookupOrderBy"] = "";
	$g_defaultOptionValues["LookupTable"] = "";
	$g_defaultOptionValues["LookupType"] = 0;
	$g_defaultOptionValues["LookupUnique"] = false;
	$g_defaultOptionValues["LookupValues"] = array();
	$g_defaultOptionValues["LookupWhere"] = "";
//	M
	$g_defaultOptionValues["mainTableOwnerID"] = "";
	$g_defaultOptionValues["mapData"] = array();
	$g_defaultOptionValues["moveNext"] = "";
	$g_defaultOptionValues["Multiselect"] = false;
//	N
	$g_defaultOptionValues["NCSearch"] = false;
	$g_defaultOptionValues["NeedEncode"] = false;
	$g_defaultOptionValues["NewSize"] = 0;
	$g_defaultOptionValues["noRecordsFirstPage"] = false;
	$g_defaultOptionValues["nSecOptions"] = ADVSECURITY_NONE;
	$g_defaultOptionValues["NumberOfChars"] = 0;
//	O
	$g_defaultOptionValues["OriginalTable"] = "";
	$g_defaultOptionValues["orderindexes"] = array();
	$g_defaultOptionValues["OwnerID"] = 0;
	$g_defaultOptionValues["ownerTable"] = "";
//	P
	$g_defaultOptionValues["pageSize"] = 0;
	$g_defaultOptionValues["panelSearchFields"] = array();
	$g_defaultOptionValues["pLookupType"] = 0;
	$g_defaultOptionValues["printFriendly"] = false;
//	Q
//	R
	$g_defaultOptionValues["recsPerRowList"] = "";
	$g_defaultOptionValues["reportGroupFields"] = false;
	$g_defaultOptionValues["ResizeImage"] = false;
	$g_defaultOptionValues["rowHighlite"] = false;
//	S
	$g_defaultOptionValues["SelectSize"] = 1;
	$g_defaultOptionValues["ShortName"] = "";
	$g_defaultOptionValues["shortTableName"] = "";
	$g_defaultOptionValues["showAddInPopup"] = false;
	$g_defaultOptionValues["showEditInPopup"] = false;
	$g_defaultOptionValues["showSearchPanel"] = false;
	$g_defaultOptionValues["showSimpleSearchOptions"] = false;
	$g_defaultOptionValues["ShowThumbnail"] = false;
	$g_defaultOptionValues["ShowTime"] = false;
	$g_defaultOptionValues["showViewInPopup"] = false;
	$g_defaultOptionValues["SimpleAdd"] = false;
	$g_defaultOptionValues["sqlFrom"] = "";
	$g_defaultOptionValues["sqlHead"] = "";
	$g_defaultOptionValues["sqlTail"] = "";
	$g_defaultOptionValues["sqlWhereExpr"] = "";
	$g_defaultOptionValues["sqlquery"] = null;
	$g_defaultOptionValues["strField"] = "";
	$g_defaultOptionValues["strName"] = "";
	$g_defaultOptionValues["strOrderBy"] = "";
	$g_defaultOptionValues["StrThumbnail"] = "";
	$g_defaultOptionValues["subQueriesSupAccess"] = false;
	$g_defaultOptionValues["scrollGridBody"] = false;
//	T
	$g_defaultOptionValues["totalsFields"] = array();
//	U
	$g_defaultOptionValues["UploadFolder"] = "";
	$g_defaultOptionValues["UseCategory"] = false;
	$g_defaultOptionValues["useDetailsPreview"] = false;
	$g_defaultOptionValues["useIbox"] = false; // for table
	$g_defaultOptionValues["UseiBox"] = false; // for field
	$g_defaultOptionValues["UseRTE"] = false;
	$g_defaultOptionValues["UseTimestamp"] = false;
//	V
	$g_defaultOptionValues["validateAs"] = array();
	$g_defaultOptionValues["videoHeight"] = 150;
	$g_defaultOptionValues["videoWidth"] = 200;
	$g_defaultOptionValues["videoTitleField"] = "";
	$g_defaultOptionValues["view"] = false;
	$g_defaultOptionValues["ViewFormat"] = "";
//	W
//	X
//	Y
//	Z


?>