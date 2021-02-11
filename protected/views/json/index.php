<?php
if (!Yii::app()->user->isGuest) {
    $output = Yii::app()->curl->setOption(CURLOPT_HEADER, 0)->get('https://coinlib.io/api/v1/coinlist?key=2dd926915f8c7b53&pref=BTC&page=1&order=volume_desc');
    $json_response = json_decode($output, true);


    echo '<div class="container">';
        echo '<div class="table table-striped table-bordered table-condensed sockscities">';
            echo '<ul class="three-columns">';

                for ($i = 0; $i < count($json_response['coins']); $i++) {
                    echo '<li>';
                    echo '<div style="display: inline-block; width: 250px;">';
                    echo '<a class="btn" onclick="spoiler(this)">+</a>';
                    echo '<div class="spoilerText">';
                    foreach ($json_response['coins'][$i] as $key => $values) {
                        echo "$key: $values <br>";
                    };
                    echo '<br>';
                    echo '</div>';
                    echo '<input type="checkbox" style="width: 15px; height: 15px;">';
                    echo '<a href="#"> ' . $json_response['coins'][$i]['name'] . '</a>';
                    echo '</div>';

                    echo '<div style="display: inline-block; width: 50px;">';
                    echo $json_response['coins'][$i]['symbol'];
                    echo '</div>';

                    echo '<div style="display: inline-block; width: 50px;">';
                    echo $json_response['coins'][$i]['rank'];
                    echo '</div>';
                    echo '</li>';
                    echo '<br>';
                }
            echo '</ul>';
        echo '</div>';
    echo '</div>';
}