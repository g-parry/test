<?php

function SQLQueryIsNull($value)
{
		return $value==="null";
}

///////////////////////////////////////////////////////////////////////////
// Data from wizard
///////////////////////////////////////////////////////////////////////////
class SQLEntity
{
	function SQLEntity(){}
	function IsAggregationFunctionCall() 
	{
		return false;
	}
	function IsBinary() 
	{
		return false;
	}
	function IsAsterisk() 
	{
		return false;
	}
	function SetQuery(&$query)
	{
	}
	function IsSQLField()
	{
		return false;
	}
};

class SQLNonParsed extends SQLEntity
{
	var $m_sql;
	function SQLNonParsed($proto)
	{
		$this->m_sql = isset($proto["m_sql"]) ? $proto["m_sql"] : '';
	}
	
	function toSql($query)
	{
		return $this->m_sql;
	}

	function IsAsterisk() 
	{
		$last = substr($this->m_sql,strlen($this->m_sql)-1);
		return ($last=="*");
	}

}

class SQLField extends SQLEntity
{
	var $m_strName;
	var $m_strTable;
	function SQLField($proto)
	{
		$this->m_strName = isset($proto["m_strName"]) ? $proto["m_strName"] : null;
		$this->m_strTable = isset($proto["m_strTable"]) ? $proto["m_strTable"] : null;
	}
	
	function toSql($query)
	{
		if($query->cipherer != null)
			return $query->cipherer->GetFieldName(
				($this->m_strTable != "" && $query->TableCount() > 1 ? AddTableWrappers($this->m_strTable)."." : "")
					.AddFieldWrappers($this->m_strName));
		
		$fieldName = AddFieldWrappers($this->m_strName);
		if($this->m_strTable == "" || $query->TableCount() == 1)
		{
			return $fieldName;
		}
		else
		{
			return AddTableWrappers($this->m_strTable) . "." . $fieldName;
		}
	}
	
	function GetType()
	{
		$pSet = new ProjectSettings($this->m_strTable);
		return $pSet->getFieldType($this->m_strName);
	}
	
	function IsBinary()
	{
		return IsBinaryType($this->GetType());
	}
	
	function IsSQLField()
	{
		return true;
	}
}

class SQLFieldListItem extends SQLEntity
{
	var $m_expr;
	var $m_alias;
	var $m_isEncrypted = false;
	function SQLFieldListItem($proto)
	{
		$this->m_expr = isset($proto["m_expr"]) ? $proto["m_expr"] : null;
		$this->m_alias = isset($proto["m_alias"]) ? $proto["m_alias"] : null;
	}
	
	function toSql($query, $addAlias = true)
	{
		$ret = '';
		if($this->m_expr)
		{
			if(is_string($this->m_expr))
			{
				$ret = $this->m_expr;
			}
			else
			{
				$ret = $this->m_expr->toSql($query);
				if(is_a($this->m_expr, 'SQLQuery'))
				{
					$ret = '(' . $ret . ')';
				}
			}
		}
		if($this->m_isEncrypted && !isEncryptionByPHPEnabled())
			$ret = $query->cipherer->GetEncryptedFieldName($ret);
		if($addAlias){
			if($this->m_alias != "")
			{
				$ret .= ' as ' . AddFieldWrappers($this->m_alias); // SmartAddAliasWrappers(m_alias)
			}
			elseif(is_object($this->m_expr))
			{
				if($this->m_expr->IsSQLField() && $query->cipherer != null && !isEncryptionByPHPEnabled())
				{
					if($query->cipherer->isFieldEncrypted($this->m_expr->m_strName)){
						$ret .= ' as ' . AddFieldWrappers($this->m_expr->m_strName); 
					}
				}
			}
		}
		return $ret;
	}
	function IsAsterisk() 
	{
		if(is_object($this->m_expr))
			return $this->m_expr->IsAsterisk();
		return false;
	}
	function IsAggregationFunctionCall()
	{
		if(is_object($this->m_expr))
			return $this->m_expr->IsAggregationFunctionCall();
		return false;
	}
	function getAlias()
	{
		if(isset($this->m_alias) && !isset($this->m_expr->m_strName))
		{
			return $this->m_alias;
		}
		elseif(isset($this->m_expr->m_strName))
		{
			if(isset($this->m_alias) && $this->m_alias!="")
			{
				return $this->m_alias;
			}
			else
			{
				return $this->m_expr->m_strName;
			}
		}
	}
}

class SQLFromListItem extends SQLEntity
{
	var $m_link;
	var $m_table;
	var $m_alias;
	var $m_joinon;
	function SQLFromListItem($proto)
	{
		$this->m_link = isset($proto["m_link"]) ? $proto["m_link"] : null;
		$this->m_table = isset($proto["m_table"]) ? $proto["m_table"] : null;
		$this->m_alias = isset($proto["m_alias"]) ? $proto["m_alias"] : null;
		$this->m_joinon = isset($proto["m_joinon"]) ? $proto["m_joinon"] : null;
	}
	
	function SetQuery(&$query)
	{
		if(is_object($this->m_table))
			$this->m_table->SetQuery($query);
	}
	
	function toSql($query, $first)
	{
		$ret = '';
		if(is_a($this->m_table, "SQLTable"))
		{
			$ret .= $this->m_table->toSql($query);
		}
		else
		{
			if($this->m_table)
			{
				$ret .= '(' . $this->m_table->toSql($query) . ')';
			}
		}
		
		if($this->m_alias != '')
		{
			$ret .= ' as ' . AddFieldWrappers($this->m_alias);
		}
		
		if($this->m_link == 'SQLL_MAIN')
		{
			return $ret;
		}
		
		switch($this->m_link)
		{
			case 'SQLL_INNERJOIN':
				$ret = ' INNER JOIN ' . $ret;
				break;
			case 'SQLL_NATURALJOIN':
				$ret = ' NATURAL JOIN ' . $ret;
				break;
			case 'SQLL_LEFTJOIN':
				$ret = ' LEFT OUTER JOIN ' . $ret;
				break;
			case 'SQLL_RIGHTJOIN':
				$ret = ' RIGHT OUTER JOIN ' . $ret;
				break;
			case 'SQLL_FULLOUTERJOIN':
				$ret = ' FULL OUTER JOIN ' . $ret;
				break;
			case 'SQLL_CROSSJOIN':
				$ret = (!$first ? ',' : '') . $ret;
				break;
		}
		
		$joinStr = $this->m_joinon->toSql($query);
		if($joinStr != '')
		{
			$ret .= ' ON ' . $joinStr;
		}
		
		return $ret;
	}
}

class SQLJoinOn extends SQLEntity
{
	var $m_field1;
	var $m_field2;
      
	function SQLJoinOn($proto)
	{
		$this->m_field1 = isset($proto["m_field1"]) ? $proto["m_field1"] : null;
		$this->m_field2 = isset($proto["m_field2"]) ? $proto["m_field2"] : null;
	}
}

class SQLFunctionCall extends SQLEntity
{
	var $m_functiontype;
	var $m_strFunctionName;
	var $m_arguments;
	function SQLFunctionCall($proto)
	{
		$this->m_functiontype = isset($proto["m_functiontype"]) ? $proto["m_functiontype"] : null;
		$this->m_strFunctionName = isset($proto["m_strFunctionName"]) ? $proto["m_strFunctionName"] : null;
		$this->m_arguments = isset($proto["m_arguments"]) ? $proto["m_arguments"] : null;
	}
	
	function toSql($query)
	{
		$ret = '';
		switch($this->m_functiontype)
		{
			case 'SQLF_AVG':
				$ret .= ' AVG';
				break;
			case 'SQLF_SUM':
				$ret .= ' SUM';
				break;
			case 'SQLF_MIN':
				$ret .= ' MIN';
				break;
			case 'SQLF_MAX':
				$ret .= ' MAX';
				break;
			case 'SQLF_COUNT':
				$ret .= ' COUNT';
				break;
			default:
				$ret .= $this->m_strFunctionName;
		}
		$args = array();
		foreach($this->m_arguments as $a)
		{
			$args []= $a->toSql($query);
		}
		$ret .= '('.implode(',', $args).')';
		return $ret;
	}
	function IsAggregationFunctionCall() 
	{
		switch($this->m_functiontype)
		{
			case 'SQLF_AVG':
			case 'SQLF_SUM':
			case 'SQLF_MIN':
			case 'SQLF_MAX':
			case 'SQLF_COUNT':
			return true;
		}
		return false;
	}
}

class SQLGroupByItem extends SQLEntity
{
	var $m_column;
	function SQLGroupByItem($proto)
	{
		$this->m_column = isset($proto["m_column"]) ? $proto["m_column"] : null;
	}
	
	function toSql($query)
	{
		return $this->m_column->toSql($query);
	}
}

define("LE_AND", 1);
define("LE_OR", 2);

define("LE_ISNULL", 1);
define("LE_EQ", 2);

define("F_AGG", 1);
define("F_SIMPLE", 2);


class SQLLogicalExpr extends SQLEntity
{
	var $m_uniontype;
	var $m_column;
	var $m_strCase;
	var $m_havingmode;
	var $m_contained;
	var $m_inBrackets;
	var $m_useAlias;
	var $m_sql;


	var $query;
	var $postSql;
	
	function SQLLogicalExpr($proto)
	{
		$this->m_sql = isset($proto["m_sql"]) ? $proto["m_sql"] : null;
		$this->m_uniontype = isset($proto["m_uniontype"]) ? $proto["m_uniontype"] : null;
		$this->m_column = isset($proto["m_column"]) ? $proto["m_column"] : null;
		$this->m_strCase = isset($proto["m_strCase"]) ? $proto["m_strCase"] : null;
		$this->m_havingmode = isset($proto["m_havingmode"]) ? $proto["m_havingmode"] : null;
		$this->m_contained = isset($proto["m_contained"]) ? $proto["m_contained"] : null;
		$this->m_inBrackets = isset($proto["m_inBrackets"]) ? $proto["m_inBrackets"] : null;
		$this->m_useAlias = isset($proto["m_useAlias"]) ? $proto["m_useAlias"] : null;
		$this->postSql = array();
	}
	
	function SetQuery(&$query)
	{
		$this->query = &$query;
		for($nCnt = 0; $nCnt < count($this->m_contained); $nCnt ++)
		{
			$this->m_contained[$nCnt]->SetQuery($query);
		}
	}
	
	function toSql($query)
	{
		$ret = '';
		if($this->haveContained())
		{
			// guess glue
			$glue = '';
			if($this->m_uniontype == 'SQLL_AND')
			{
				$glue = ' AND ';
			}
			else if($this->m_uniontype == 'SQLL_OR')
			{
				$glue = ' OR ';
			}
			else
			{
				die ('Unknown union type in SQL Logical Expression');
			}
			
			// get list of contained sql
			$contained = array();
			foreach($this->m_contained as $c)
			{
				$cSql = $c->toSql($query);
				if($cSql != '')
				{
					$contained []= "(".$cSql.")";
				}
			}
			
			// concatenate it
			if(count($contained) > 0)
			{
				$ret = implode($glue, $contained);
			}
			
			// concatenate result with weak typed sql
			if(count($this->postSql) > 0)
			{
				if($ret == '')
				{
					$ret .= '(' . $this->postSql[0] . ')';
				}
				else
				{
					// $ret contains subtree, therefore escape it with brackets
					$ret = '(' . $ret . ')' . $glue . '(' . $this->postSql[0] . ')';
				}
				
				for($nCnt = 1; $nCnt < count($this->postSql); $nCnt++)
				{
					// concatenation of logical expressions of one union type
					$ret .= $glue . '(' . $this->postSql[$nCnt] . ')';
				}
			}
			
			if($this->m_inBrackets)
			{
				$ret = '(' . $ret . ')';
			}
			
			return $ret;
		}
		
		if(!$this->m_column)
		{
			$ret = $this->m_sql;
		}
		else
		{
			if($this->m_useAlias)
			{
				$ret = $this->m_column->m_alias;
			}
			else
			{
				$ret = $this->m_column->toSql($query);
			}
		}
		
		if($this->m_strCase == 'NOT')
		{
			return ' NOT ' . $ret;
		}
		else
		{
			if($ret != '')
			{
				$ret .= ' ' . $this->m_strCase;
			}
		}
		
		if($this->m_inBrackets)
		{
			$ret = '(' . $ret . ')';
		}
		
		return $ret;
	}
	
	function haveContained()
	{
		return count($this->m_contained) > 0 || count($this->postSql) > 0;
	}
	
	function InjectSelf()
	{
		// make a copy of current logical expression		
		$insertLE = new SQLLogicalExpr(array(
			'm_uniontype' => $this->m_uniontype,
			'm_strCase' => $this->m_strCase,
			'm_havingmode' => $this->m_havingmode,
			'm_column' => $this->m_column,
			'm_contained' => $this->m_contained,
			'm_inBrackets' => $this->m_inBrackets,
		));
		$insertLE->postSql = $this->postSql;
		$insertLE->query = $this->query;
		
		// clean up
		$this->m_uniontype = 'SQLL_AND';
		$this->m_strCase = '';
		$this->m_havingmode = false;
		$this->m_column = null;
		$this->m_inBrackets = false;
		$this->postSql = array();
			
		// store selfcopy
		$this->m_contained = array($insertLE);
	}
	
	function AddFilter($field, $func, $value = '')
	{
		global $strTableName;
		if(is_string($field))
		{
			$oDefaultTable = $this->query->DefaultTable();
			$field = $oDefaultTable->FieldByName($field);
		}
		
		$case = '';
		switch($func)
		{
			case LE_ISNULL:
				$case = ' is null ';
				break;
			case LE_EQ:
				$case = ' = ' . $value;
				break;
			default:
				die("Unknown logical expression function");
		}
		
		if($this->m_uniontype != 'SQLL_AND')
		{
			$this->InjectSelf();
		}
		
		$this->m_contained []= new SQLLogicalExpr(array(
			'm_uniontype' => 'SQLL_UNKNOWN',
			'm_strCase' => $case,
			'm_havingmode' => false,
			'm_column' => $field
		));
	}
	
	function AddSqlFilter($value)
	{
		if(is_string($value) && $value != '')
		{
			if($this->m_uniontype != 'SQLL_AND')
			{
				$this->InjectSelf();
			}
		
			$this->postSql []= $value;
		}
	}
	
	function AddFilterByKeys(&$keys)
	{
		$oDefaultTable = $this->query->DefaultTable();
		$tableKeys = $oDefaultTable->GetKeyFields();
		foreach($tableKeys as $tk)
		{
			$value = make_db_value($tk, $keys[$tk]);
			if(SQLQueryIsNull($value))
			{
				$this->AddFilter($tk, LE_ISNULL);
			}
			else
			{
				$this->AddFilter($tk, LE_EQ, $value);
			}
		}
	}	
}

class SQLOrderByItem extends SQLEntity
{
	var $m_column;
	var $m_bAsc;
	var $m_nColumn;
	function SQLOrderByItem($proto)
	{
		$this->m_column = isset($proto["m_column"]) ? $proto["m_column"] : null;
		$this->m_bAsc = isset($proto["m_bAsc"]) ? $proto["m_bAsc"] : null;
		$this->m_nColumn = isset($proto["m_nColumn"]) ? $proto["m_nColumn"] : null;
	}
	
	function toSql($query)
	{
		$ret = '';
		if(0 == $this->m_nColumn)
		{
			$ret .= $this->m_column->toSql($query);
		}
		else
		{
			$ret .= $this->m_nColumn;
		}
		
		if(!$this->m_bAsc)
		{
			$ret .= ' DESC ';
		}
		
		return $ret;
	}
	
	function FixIfGreater($num)
	{
		if(0 != $this->m_nColumn && $this->m_nColumn >= $num)
		{
			$this->m_nColumn --;
		}
	}
}

class SQLTable extends SQLEntity
{
	var $m_strName;
	var $m_columns;
	var $query;
	
	
	function SQLTable($proto)
	{
		$this->m_strName = isset($proto["m_strName"]) ? $proto["m_strName"] : null;
		$this->m_columns = isset($proto["m_columns"]) ? $proto["m_columns"] : null;
	}

	function SetQuery(&$query)
	{
		$this->query = $query;
	}
	
	function toSql($query)
	{
		return AddTableWrappers($this->m_strName);//SmartAddTableWrappers(m_strName);
	}
	
	function GetKeyFields()
	{
		global $dal;
		return $dal->GetDBTableKeys($this->m_strName);
	}
	
	function FieldByName($name)
	{
		return $this->query->FieldByNameAndTable($this->m_strName, $name);
	}
}

class SQLQuery extends SQLEntity
{
	var $m_strHead;
	var $m_strFieldList;
	var $m_strFrom;
	var $m_strWhere;
	var $m_strOrderBy;
	var $m_strTail;
	var $m_where;
	var $m_having;
	var $m_fieldlist;
	var $m_fromlist;
	var $m_groupby;
	var $m_orderby;
	var $bHasAsterisks = false;
	/**
	 * Instance of Cypher class for encoding/decoding fields values and names  
	 *
	 * @var object
	 */
	var $cipherer = null;
	
	function SQLQuery($proto)
	{
		$this->m_strHead = isset($proto["m_strHead"]) ? $proto["m_strHead"] : null;
		$this->m_strFieldList = isset($proto["m_strFieldList"]) ? $proto["m_strFieldList"] : null;
		$this->m_strFrom = isset($proto["m_strFrom"]) ? $proto["m_strFrom"] : null;
		$this->m_strWhere = isset($proto["m_strWhere"]) ? $proto["m_strWhere"] : null;
		$this->m_strOrderBy = isset($proto["m_strOrderBy"]) ? $proto["m_strOrderBy"] : null;
		$this->m_strTail = isset($proto["m_strTail"]) ? $proto["m_strTail"] : null;
		$this->m_where = isset($proto["m_where"]) ? $proto["m_where"] : null;
		$this->m_having = isset($proto["m_having"]) ? $proto["m_having"] : null;
		$this->m_fieldlist = isset($proto["m_fieldlist"]) ? $proto["m_fieldlist"] : null;
		$this->m_fromlist = isset($proto["m_fromlist"]) ? $proto["m_fromlist"] : null;
		$this->m_groupby = isset($proto["m_groupby"]) ? $proto["m_groupby"] : null;
		$this->m_orderby = isset($proto["m_orderby"]) ? $proto["m_orderby"] : null;
		$this->cipherer = isset($proto["cipherer"]) ? $proto["cipherer"] : null;
		for($nCnt = 0; $nCnt < count($this->m_fromlist); $nCnt++)
		{
			$this->m_fromlist[$nCnt]->SetQuery($this);
		}
		$this->m_where->SetQuery($this);
		if(!is_array($this->m_fieldlist))
			return;
		for($i=0;$i<count($this->m_fieldlist);$i++)
		{
			if($this->m_fieldlist[$i]->IsAsterisk())
			{
				$this->bHasAsterisks=true;
				break;
			}
		}
	}
	
	function FromToSql(){
		return $this->m_strFrom;
	}
	
	function TailToSql(){
		return $this->m_strTail;
	}
	
	function HavingToSql(){
		return $this->m_having->toSql($this);
	}
	
	function OrderByToSql(){
		return $this->m_strOrderBy;
	}
		
	function HeadToSql($oneRecordMode = false)
	{
		$sql = '';
		$sql .= $this->m_strHead;
		
				
		// do not add spaces to empty sql string		
		if($sql != '')
		{
			$sql .= "\r\n";
		}
		
		// collect fields
		$fields = array();
		foreach($this->m_fieldlist as $f)
		{
			$fields []= $f->toSql($this);
		}

		// allow derived classes to drop out fields from field list
		if(count($fields) > 0)
		{
			$sql .= implode(', ', $fields);
		}
		
		return $sql;
	}
	
	function AddCustomExpression($expression, $pSet, $mainTable, $mainFiled){
		$ceIndex = $pSet->getCustomExpressionIndex($mainTable, $mainFiled);
		if($ceIndex !== FALSE)
			return $ceIndex;
		$this->m_fieldlist[] = new SQLFieldListItem(array("m_expr" => $expression, "m_alias" => ""));
		$pSet->addCustomExpressionIndex($mainTable, $mainFiled, count($this->m_fieldlist) - 1);
	}
	
	function GroupByToSql()
	{
		$sql = '';
		$groupby = array();
		foreach($this->m_groupby as $g)
		{
			$groupby []= $g->toSql($this);
		}
		if(count($groupby) > 0)
		{
			$sql .= ' GROUP BY ';
			$sql .= implode(',', $groupby);
			$sql .= " ";
		}
		return $sql;
	}
		
	function toSql($strwhere = null, $strorderby = null, $strhaving = null, $oneRecordMode = false)
	{
		if(is_a($strwhere, 'SQLQuery'))
		{
			// Parent SQL query passed. Ignore.
			$strwhere = null;
		}
		
		$sql = $this->HeadToSql($oneRecordMode);
		
		// allow derived classes to drop out fields from field list
		if(count($this->m_fromlist) > 0)
		{
			$sql .= "\r\n";
			$sql .= ' FROM ';
		}
		
				$fromlist = array();
		for($nCnt = 0; $nCnt < count($this->m_fromlist); $nCnt ++)
		{
			$fromlist []= $this->m_fromlist[$nCnt]->toSql($this, $nCnt == 0);
		}
		$sql .= implode("\r\n", $fromlist);
		
		if($strwhere !== null)
		{
			if($strwhere !== '')
			{
				$sql .= ' WHERE ' . $strwhere . "\r\n";
			}
		}
		else
		{
			$where = $this->m_where->toSql($this);
			if($where != "")
			{
				$sql .= ' WHERE ' . $where . "\r\n";
			}
		}
		
		$sql .= $this->GroupByToSql();
		
		if($strhaving !== null)
		{
			if($strhaving !== '')
			{
				$sql .= ' HAVING ' . $strhaving . "\r\n";
			}
		}
		else
		{
			$having = $this->m_having->toSql($this);
			if($having != "")
			{
				$sql .= ' HAVING ' . $having . "\r\n";
			}
		}
		
		if($strorderby !== null)
		{
			$sql .= $strorderby . "\r\n";
		}
		else
		{
			$orderby = array();
			foreach($this->m_orderby as $g)
			{
				$orderby []= $g->toSql($this);
			}
			if(count($orderby) > 0)
			{
				$sql .= ' ORDER BY ';
				$sql .= implode(',', $orderby);
				$sql .= "\r\n";
			}
		}
		
				if($oneRecordMode)
			$sql.=" limit 0,1";
						
		return $sql;
	}
	
	function TableCount()
	{
		return count($this->m_fromlist);
	}
	
	function TableByField($field)
	{
		foreach($this->m_fromlist as $f)
		{
			if($f->m_table->m_strName == $field->m_strTable)
			{
				return $f;
			}
		}
		
		return null;
	}
	
	function TableByName($tableName)
	{
		foreach($this->m_fromlist as $f)
		{
			if($f->m_table->m_strName == $tableName)
			{
				return $f;
			}
		}
		
		return null;
	}
	
	function FieldByNameAndTable($table, $field)
	{
		foreach($this->m_fieldlist as $f)
		{
			if($f->m_expr->m_strName == $field && $f->m_expr->m_strTable == $table)
			{
				return $f;
			}
		}
		
		return null;
	}
	
//	checks if field list item is an aggregation funciton call
	function IsAggrFuncField($idx)
	{
		if($this->HasAsterisks())
			return false;
		if(!isset($this->m_fieldlist[$idx]))
			return false;
		return $this->m_fieldlist[$idx]->IsAggregationFunctionCall();
	}
	
	function DefaultTable()
	{
		return $this->m_fromlist[0]->m_table;
	}
	
	function dropOrderByField($field)
	{
		for($nOb = 0; $nOb < count($this->m_orderby); $nOb ++)
		{
			$obField = $this->m_orderby[$nOb]->m_column;
			if($obField->m_strName == $field->m_strName
			   && $obField->m_strTable == $field->m_strTable)
			{
				for($nOb2 = 0; $nOb2 < count($this->m_orderby); $nOb2 ++)
				{
					// iterate through entire array because 'order by' numbers
					// may not comply with array index
					// decrease 'order by' number if needed
					$this->m_orderby[$nOb2]->FixIfGreater($nOb2);
				}
				
				array_splice($this->m_orderby, $nOb, 1);
				break;
			}
		}
	}
	
	function ReplaceFieldsWithDummies($fieldindices)
	{
		if($this->HasAsterisks())
			return;
		foreach($fieldindices as $idx)
		{
			if(!isset($this->m_fieldlist[$idx-1]))
				return;
			$this->m_fieldlist[$idx-1] = new SQLFieldListItem(array(
						"m_alias" => "runnerdummy" . $idx,
						"m_expr" => "1"));
		}
	}
	
	function RemoveAllFieldsExcept($idx)
	{
		if($this->HasAsterisks())
			return;
		$removeindices=array();
		for($i=0;$i<count($this->m_fieldlist);$i++)
		{
			if($i!=$idx-1)
				$removeindices[]=$i+1;
		}
		$this->ReplaceFieldsWithDummies($removeindices);
	}	
	
	function WhereToSql(){
		return $this->m_where->toSql($this);
	}
	function & Where()
	{
		return $this->m_where;
	}
	
	function & Having()
	{
		return $this->m_having;
	}
	
	function Copy()
	{
		return unserialize(serialize($this));
	}
	
	function HasGroupBy()
	{
		return count($this->m_groupby) > 0;
	}
	function HasAsterisks()
	{
		return $this->bHasAsterisks;
	}
	function addWhere($_where)
	{
		if(trim($_where) == "")
		{
			return;		
		}
		
		$myproto=array();
		$myproto["m_sql"] = $_where;
		$myproto["m_uniontype"] = "SQLL_UNKNOWN";

		$myproto["m_column"]=null;
		$myproto["m_contained"] = array();
		$myproto["m_strCase"] = "";
		$myproto["m_havingmode"] = "0";
		$myproto["m_inBrackets"] = "1";
		$myproto["m_useAlias"] = "0";
		
		$myobj = new SQLLogicalExpr($myproto);
		$myobj->query = $this;
		
		if(!$this->m_where)
		{
			$this->m_where = $myobj;
			return;
		}

		$newproto=array();
		$newproto["m_uniontype"] = "SQLL_AND";
		$newproto["m_contained"] = array();
		$newproto["m_contained"][] = $this->m_where;
		$newproto["m_contained"][] = $myobj;
		$newobj = new SQLLogicalExpr($newproto);
		$newobj->query = $this;
		$this->m_where = $newobj;
		
	}
	
	function replaceWhere($_where)
	{	
		if(trim($_where) == "")
		{
			$myproto = array();
			$myobj = new SQLLogicalExpr($myproto);
			$myobj->query = $this;
			
			$this->m_where = $myobj;
			
			return;
		}
		$myproto = array();
		$myproto["m_sql"] = $_where;
		$myproto["m_uniontype"] = "SQLL_UNKNOWN";

		$myproto["m_column"]=null;
		$myproto["m_contained"] = array();
		$myproto["m_strCase"] = "";
		$myproto["m_havingmode"] = "0";
		$myproto["m_inBrackets"] = "1";
		$myproto["m_useAlias"] = "0";
		
		$myobj = new SQLLogicalExpr($myproto);
		$myobj->query = $this;
		
		$this->m_where = $myobj;
	}
	
	function addField($_field, $_alias)
	{
		$myproto=array();
		$myobj = new SQLNonParsed(array(
			"m_sql" => $_field
		));
		$myproto["m_expr"]=$myobj;
		$myproto["m_alias"]=$_alias;
		
		$myobj = new SQLFieldListItem($myproto);
		$this->m_fieldlist[] = $myobj;
	}
	
	function replaceField($_field, $_newfield, $_newalias = "")
	{
		$myproto=array();
		$myobj = new SQLNonParsed(array(
			"m_sql" => $_newfield
		));
		$myproto["m_expr"]=$myobj;

		if(!is_numeric($_field))
		{
			foreach($this->m_fieldlist as $key=>$obj)
			{
				if($this->m_fieldlist[$key]->getAlias() == $_field)
				{
					$_field = $key;
					break;
				}
			}
		}
		if(is_numeric($_field))
		{
			if(!$_newalias)
				$_newalias = $this->m_fieldlist[$_field]->getAlias();
			$myproto["m_alias"]=$_newalias;
			$myobj = new SQLFieldListItem($myproto);
			$this->m_fieldlist[$_field] = $myobj;
		}
	}
	
	function deleteField($_field)
	{
		if(!is_numeric($_field))
		{
			foreach($this->m_fieldlist as $key=>$obj)
			{
				if($this->m_fieldlist[$key]->getAlias() == $_field)
				{
					$_field = $key;
					break;
				}
			}
		}
		if(is_numeric($_field))
		{
			$fieldlist = $this->m_fieldlist;
			array_splice($fieldlist, $_field,1);
			$this->m_fieldlist = $fieldlist;
		}
	}
	
	function gSQLWhere($where, $having="", $searchCriteria="or")
	{
		return $this->gSQLWhere_having_fromQuery("", $where, $having, $searchCriteria);
	}
	
	function gSQLWhere_having_fromQuery($sqlWhereExpr, $where="", $having="", $criteria = "or"){
		return SQLQuery::gSQLWhere_having($this->HeadToSql(), $this->FromToSql(), whereAdd($this->WhereToSql(), $sqlWhereExpr)
			, $this->GroupByToSql(), $this->Having()->toSql($this), $where, $having, $criteria);
	}
	
	static function gSQLWhere_having($sqlHead, $sqlFrom, $sqlWhere, $sqlGroupBy, $sqlHaving, $where="", $having="", $criteria = "or")
	{
		$strWhere = whereAdd($sqlWhere,$where);
		if(strlen($strWhere) && $sqlWhere != '(1=1)')
			$strWhere=" where ".$strWhere." ";
		
		$sqlW="";
		if(strlen($sqlWhere) && $sqlWhere != '(1=1)')
			$sqlW=" where ".$sqlWhere." ";
	
		$strHaving = whereAdd($sqlHaving, $having);
		if (strlen($strHaving) && $strHaving != '(1=1)')
			$strHaving =" having ".$strHaving." ";
		
		$sqlH="";
		if(strlen($sqlHaving) && $sqlHaving != '(1=1)' || $criteria == 'and' && strlen($having) && $having != '(1=1)'){
			$sqlH = " having ".$sqlHaving;
			if($criteria == 'and' && strlen($having) && $having != '(1=1)')
				$sqlH .= " ".(strlen($sqlHaving) && strlen($having) ? ' and ' : '').$having;
		}
			
		$sql1="";
		$sql2="";
		$union="";
		
		if(strlen($where) && $where != '(1=1)' || !strlen($having) || $having == '(1=1)' || $criteria == "and")
			$sql1=$sqlHead." ".$sqlFrom.' '.$strWhere.' '.$sqlGroupBy.' '.$sqlH;
		
		if (strlen($having) && $having != '(1=1)' && $criteria == "or"){
			$sql2 = $sqlHead." ".$sqlFrom.' '.$sqlW.' '.$sqlGroupBy.' '.$strHaving;
		}
		
		if($sql1 && $sql2)
			$union=" union ";
			
		$sql = $sql1.$union.$sql2;

		return $sql;
	}
	
	//	get count of rows from the query
	function gSQLRowCount($where, $having="", $searchCriteria="or")
	{
		return SQLQuery::gSQLRowCount_int($this->HeadToSql(), $this->FromToSql(), $this->WhereToSql(), $this->GroupByToSql()
			, $this->Having()->toSql($this), $where, $having, $searchCriteria);
	}
	
	static function gSQLRowCount_int($sqlHead, $sqlFrom, $sqlWhere, $sqlGroupBy, $sqlHaving, $where, $having, $criteria="or")
	{
		global $conn;
		global $bSubqueriesSupported;
		
		$strWhere=whereAdd($sqlWhere,$where);
		if(strlen($strWhere))
			$strWhere=" where ".$strWhere." ";
		
		if(strlen($sqlGroupBy))
		{
					if($bSubqueriesSupported)
			{
				$countstr = "select count(*) from (".SQLQuery::gSQLWhere_having($sqlHead,$sqlFrom,$sqlWhere,$sqlGroupBy, $sqlHaving,$where,$having,$criteria).") a";
			}
			else
			{
				$countstr = SQLQuery::gSQLWhere_having($sqlHead,$sqlFrom,$sqlWhere,$sqlGroupBy, $sqlHaving,$where,$having,$criteria);
				return GetMySQL4RowCount($countstr);
			}
		}
		else
		{
			$countstr = "select count(*) ".$sqlFrom.$strWhere;
		}
		$countrs = db_query($countstr, $conn);
		$countdata = db_fetch_numarray($countrs);
		return $countdata[0];
	}
}

class SQLCountQuery extends SQLQuery
{
	function SQLCountQuery($src)
	{
		// copy base class memebers
		foreach($src as $k => $v)
		{
			$this[$k] = $v;
		}
		
		// drop this
		$this->m_strHead = '';
		
		if(!$this->HasGroupBy())
		{
			// drop all fields to make sql look like:
			// select count(*) from ...
			// otherwise it will look like:
			// select count(*) from (select ... from ...) 
			$this->m_fieldlist = array();
		}
	}
	
	function toSql($where)
	{
		$sql = SQLQuery::toSql($where);
		if($this->HasGroupBy())
		{
			$ret = 'select count(*) from (' . $sql . ') a';
		}
		else
		{
			// sql variable begins with 'FROM ...' cause
			// we dropped out everything before it in constructor.
			// Therefore we may not use subqueries.
			$ret = 'select count(*) from ' . $sql;
		}
		return $ret;
	}
}



?>
