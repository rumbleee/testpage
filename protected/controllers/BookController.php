<?php
class BookController extends Controller
{

    public function actionIndex($id)
    {
        //$criteria = new CDbCriteria;
      //  $a = Book::model()->findAll($criteria);

        $model = Book::model()->findByPk($id);
        $this->render('index', array('model'=>$model));
    }
}