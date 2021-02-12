<?php
class JsonController extends Controller {

    public function actionIndex()
    {
        if (Yii::app()->user->isGuest) {
            return $this->redirect(Url::toRoute('site/login'));
        }
        else {
             $this->render('index');
             echo $this->quotes();
             }
    }

    public function actionQuotes()
    {
        $output = Yii::app()->curl->setOption(CURLOPT_HEADER, 0)->get('https://coinlib.io/api/v1/coinlist?key=2dd926915f8c7b53&pref=BTC&page=1&order=volume_desc');
        $json_response = json_decode($output, true);
        /*$this->render('quotes',
            array('output' => $output,
                'json_response' => $json_response,
            ));*/
        return $json_response;
        /*$this->render('index',
            array('output' => $output,
                'json_response' => $json_response,
            ));*/

    }
    /*public function actionMyJson(){
        $output = Yii::app()->curl->setOption(CURLOPT_HEADER, 0)->get(CryptoModel::URL);
        $json_response = json_decode($output, true);
        return $json_response;
    }*/
}