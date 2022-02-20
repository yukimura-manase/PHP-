<?php

// PHPファイル操作 => php file_controller.php

// object_idとclassification_id(データ種別)を使って、DBからパスや該当データセット名(zip名)などの格納情報を引っ張ってきて、該当データセットの操作をしていく！

$now_dir = getcwd();

echo($now_dir);


$current_data = chdir('/'); // カンレトディレクトリを取得
echo($current_data);





