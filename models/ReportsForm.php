<?php
namespace app\models;


use Yii;
use yii\base\Model;
use yii\helpers\Url;

class ReportsForm extends Model
{
    public $paramStartDate;
    public $paramFinishDate;
    public $reportType;

    public $_url;

    public function rules()
    {
        return [
	    [['paramStartDate', 'paramFinishDate', 'reportType'], 'required'],
            [['paramStartDate', 'paramFinishDate', 'reportType'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'paramStartDate' => 'Start tarihi',
            'paramFinishDate' => 'Bitis tarihi',
        ];
    }

    public function setUrl()
   {
	if ($this->reportType == '1')
	{	
		$this->_url = Url::toRoute(['reportico/mode/execute',
						'project' => 'GlobalPOS', 
						'new_reportico_window' => 1,
						'report' => 'ExpensesByRegion',
						'target_format'=>'HTML',
						'MANUAL_daterange_FROMDATE'=>$this->paramStartDate,
						'MANUAL_daterange_TODATE'=>$this->paramFinishDate]);
	} else if  ($this->reportType == '2')
	{	
		$this->_url = Url::toRoute(['reportico/mode/execute',
						'project' => 'GlobalPOS', 
						'new_reportico_window' => 1,
						'report' => 'expensesByCategory',
						'target_format'=>'HTML',
						'MANUAL_daterange_FROMDATE'=>$this->paramStartDate,
						'MANUAL_daterange_TODATE'=>$this->paramFinishDate]);
	} else if  ($this->reportType == '3')
	{	
		$this->_url = Url::toRoute(['reportico/mode/execute',
						'project' => 'GlobalPOS', 
						'new_reportico_window' => 1,
						'report' => 'expensesBySeller',
						'target_format'=>'HTML',
						'MANUAL_daterange_FROMDATE'=>$this->paramStartDate,
						'MANUAL_daterange_TODATE'=>$this->paramFinishDate]);
	} 

	return true;
   }


    public function getUrl()
    {
	return $this->_url;
    }

    public function getDate()
    {
	return $this->paramStartDate;
    }
}

