
<div class="container">
    <div class="table table-striped table-bordered table-condensed sockscities">
        <ul class="three-columns">

            <?php for ($i = 0; $i < count($json_response['coins']); $i++) { ?>
                <li>
                    <div style="display: inline-block; width: 250px;">
                        <a class="btn" onclick="spoiler(this)">+</a>
                        <div class="spoilerText">
                            <?php foreach ($json_response['coins'][$i] as $key => $values) {
                                echo "$key: $values";?>
                                <br>
                            <?php } ?>
                            <br>
                        </div>
                        <input type="checkbox" style="width: 15px; height: 15px;">
                        <a href="#"><?php echo $json_response['coins'][$i]['name']; ?></a>
                    </div>

                    <div style="display: inline-block; width: 50px;">
                        <?php echo $json_response['coins'][$i]['symbol']; ?>
                    </div>

                    <div style="display: inline-block;">
                        <?php echo $json_response['coins'][$i]['rank']; ?>
                    </div>
                </li>
                <br>
            <?php } ?>
        </ul>
    </div>
</div>