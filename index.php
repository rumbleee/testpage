<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

if (Yii::app()->user->isGuest) {
	echo '<div class="auth_error">'."Войдите на сайт под своими логином и паролем!".'</div>';
}

else {
	$curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL,'https://coinlib.io/api/v1/coinlist?key=2dd926915f8c7b53&pref=BTC&page=1&order=volume_desc');
    curl_setopt ($curl, CURLOPT_HEADER, 0);
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec ($curl);
    $json_response = json_decode($response, true);
    curl_close ($curl);

    if (!$response) {
        $error = curl_error($curl).'('.curl_errno($curl).')';
        echo $error;
    } else {
	    	echo '<div class="container">';
	    		echo '<div class="table table-striped table-bordered table-condensed sockscities">';
	    			echo '<ul class="three-columns">';

	        for ($i = 0; $i < count($json_response['coins']); $i++) {
	         		//echo '<div style="display: inline-block; width: 450px;">';
	        		echo '<li>';
	         		echo '<div style="display: inline-block; width: 250px;">';
	         		echo '<a class="btn" onclick="spoiler(this)">+</a>';
	         		echo '<div class="spoilerText">';
					foreach ($json_response['coins'][$i] as $key => $values ) {
					echo "$key: $values <br>";
					};
					echo '<br>';
  					echo '</div>';
	         		echo '<input type="checkbox" style="width: 15; height: 15;">';
	         		echo '<a href="#"> '.$json_response['coins'][$i]['name'].'</a>';
					//echo "$key: $values <br>";
					echo '</div>';
					//echo '</li>';
					//echo '<li>';
					echo '<div style="display: inline-block; width: 50px;">';
	         		echo $json_response['coins'][$i]['symbol'];
					//echo "$key: $values <br>";
					echo '</div>';
					//echo '</li>';
					//echo '<li>';
					echo '<div style="display: inline-block; width: 50px;">';
	         		echo $json_response['coins'][$i]['rank'];
					//echo "$key: $values <br>";
					echo '</div>';
					echo '</li>';
					//echo '</div>';
					echo '<br>';
	   		}
	   				echo '</ul>';
	   			echo '</div>';
	  	 echo '</div>';
  	}
}
