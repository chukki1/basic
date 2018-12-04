<?php
namespace app\controllers;
use app\models\ArithmeticExpression;
use app\models\Calculation;
use app\models\Calculator;
use Yii;
use yii\rest\ActiveController;
/**
 *
 */
class CalculationController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\models\Calculation';
    /**
     * @inheritdoc
     */
    public function actions() {
        return [];
    }
    /**
     * Creates new Calculation.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->getRequest();
        $calculation = new Calculation();
        $calculation->load($request->getBodyParams(), '');
        if (!$calculation->validate()) {
            return $calculation;
        }
        $arithmeticExpr = ArithmeticExpression::parse($calculation->expression);
        $result = Calculator::calculate($arithmeticExpr);
        $calculation->expression = $arithmeticExpr->toString();
        $calculation->result = $result;
        $calculation->save();
        return $calculation;
    }
}