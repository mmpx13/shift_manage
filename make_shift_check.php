<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>php</title>
    </head>
    <body>
    <?php
    $syokuin = array('太郎', '次郎', '三郎', '四郎', '五郎');
    $kinmu=array('　','早','早','日','通','遅','入','明','休','研');

    //*-----._データを受け取る_.-----*
    for($i=0; $i<count($syokuin); $i++){
        ${$syokuin[$i].'-array'}=array();
        ${$syokuin[$i].'-array'}=$_POST[$syokuin[$i]];
    }

    $month=$_POST['month'];
    $year=$_POST['year'];
    $week=array();
    $week=$_POST['week_data'];
    $iinkaiDay=array();
    $iinkaiDay=$_POST['iinkai'];
    print $month;
    print'<br>';
    print $year;
    print'<br>';
    foreach($week as $weekV){
        print$weekV;
    }
    print'<br>';
    /*
    foreach($iinkaiDay as $iinkaiV){
        print$iinkaiV;
    }
    print'<br>';
    */



    print'<table border=1>';
    print'<tr><td>日付</td>';
    for($k=0;$k<count($week);)

    for($j=0; $j<count($syokuin); $j++){
        print'<tr><td>'.$syokuin[$j].'</td>';
        for($k=0; $k<count(${$syokuin[$j].'-array'}); $k++){
            print'<td>'.$kinmu[${$syokuin[$j].'-array'}[$k]].'</td>';
        }
        print'<tr>';
    }
    print'</table>';

    ?>