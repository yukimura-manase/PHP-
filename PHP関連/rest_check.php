<?php

// PHP時間操作 => php rest_check.php

date_default_timezone_set('Asia/Tokyo');

// 1. 祝日の判定は、ライブラリを利用する! => Yasumi

// require 'vendor/autoload.php';

$nowyear = date("Y");

echo $nowyear;
echo('/');

$date = date("Y-m-d");
echo($date);
echo('/');

// 祝日のインスタンスを生成する！
// $holidays = \Yasumi\Yasumi::create('Japan', $nowyear, 'ja_JP');


// isHolidayの引数に判定の対象となるDateTimeインスタンスを設定すると、その日が祝日かどうかをtrueかfalseで返してくれます。
// $holidays->isHoliday(new DateTime('2020-09-21'));


// 祝日だとtrueになる！
// $holiday_bool = $holidays->isHoliday($date);




// 2. 休日の判定 => 土日の判定(曜日の判定)

// 曜日配列
$dayofweek_array = [
    '日', //0
    '月', //1
    '火', //2
    '水', //3
    '木', //4
    '金', //5
    '土', //6
];

// 曜日ごとの番号を取得する！ => 0(日曜)か6(土曜)なら休日判定
$dayofweek_num = date('w');


//日本語で曜日を出力
echo $dayofweek_array[$dayofweek_num] . '曜日';
echo('/');


$rest_date_flag = false;

if($dayofweek_num == 0 || $dayofweek_num == 6){

    echo "休みやん！";
    echo('/');
    $rest_date_flag = true;
};

echo("休みフラグ: $rest_date_flag"); // 数値の1
echo(('/'));



// 3. 深夜の判定 => 深夜の定義を何時から何時にするかによる、、、 => ひとまず0時から4時ぐらいまでを深夜として判定する！


// H	時刻 24時間表記 (0埋め)	09
// G	時刻 24時間表記 (0埋め無し)	9
// h	時刻 12時間表記 (0埋め)	09
// g	時刻 12時間表記 (0埋め無し)	9

// 時間の表記は、どれを採用するか？

$nowtime = date("H:i:s");   // H	時刻 24時間表記 (0埋め)	09
$num_nowtime = strtotime($nowtime);
echo($nowtime);
echo("数値化: $num_nowtime");
echo(('/'));



$midnight_start = date("00:00:00");
$num_midnight_start = strtotime($midnight_start);
echo($midnight_start);
echo("数値化: $num_midnight_start");
echo(('/'));

$midnight_finish = date("04:00:00");
$num_midnight_finish = strtotime($midnight_finish);
echo($midnight_finish);
echo("数値化: $num_midnight_finish");
echo(('/'));

$midnight_flag = false;

// "00:00:00" < nowtime < "04:00:00"
if($num_midnight_start <= $num_nowtime &&  $num_nowtime <= $num_midnight_finish){

    $midnight_flag = true;
};

if($midnight_flag){

    echo("深夜やん！");
}else{

    echo("深夜じゃないよ！");
};

