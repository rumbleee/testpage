<?php
class JsonController extends Controller {

    public function actionIndex()
    {
        $output = Yii::app()->curl->setOption(CURLOPT_HEADER, 0)->get(CryptoModel::URL);
        $json_response = json_decode($output, true);

        if (Yii::app()->user->isGuest) {
            return $this->redirect(Url::toRoute('site/login'));
        }
        else {
            $this->render('index', array('output'=>$output, 'json_response'=>$json_response));
        }
    }
}
?>