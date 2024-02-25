<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>php</title>
        <style>
            select{
                width: 20px;
                -webkit-appearance: none;
                appearance: none;
            }
            td{
                width: auto;
            }
            .iinkai{
                font-size: xx-small;
                -webkit-text-combine: horizontal;
                -ms-text-combine-horizontal: all;
                text-combine-upright: all;
            }
        </style>
    </head>
    <body>
        <?php

    require_once('function.php');
    print'<form method="get" action='.$_SERVER['PHP_SELF'].'>';
    make7Years();
    print'年';
    twelveMonth();
    print'月';
    print'<input type="submit" value="表示">';
    print'</form><br>';




    print '<form method="post" action=hyouji_check.php>';
    if(empty($_GET['year']) && empty($_GET['month'])){
        $year=date('Y');
        $month=date('m');
    }else if(empty($_GET['year'])){
        $year=date('Y');
        $month=$_GET['month'];
    }else if(empty($_GET['month'])){
        $month=date('m');
        $year=$_GET['year'];
    }else{
        $year=$_GET['year'];
        $month=$_GET['month'];
    }


        print '<table border=1 width=90%>';

        $monthDays = array(21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31); //21から31日の配列
        $nextMonthDays = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20); //1から20日の配列
        $weekValue = array('日', '月', '火', '水', '木', '金', '土');
        $week = array();//今月の１日から翌月の２０までの曜日が入った配列
        $iinkaiDay=array();//委員会を実施する日付の配列
    
    
        $nextMonth = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
        $nextMonthYear = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));

        $i1= 0;//感染・褥瘡予防委員会（第1火曜）
        $i2= 0;//現任教育委員会（第1木曜）
        $i3= 0;//救命・防災委員会（第1月曜）
        $i4= 0;//離設対策委員会（第4金曜５，８，１１、２月）
        $i5= 0;//防犯対策委員会（第4金曜４、７、１０、１月）
        $i6= 0;//腰痛予防委員会（第2火曜）
        $i7= 0;//身体拘束適正化委員会（第3火曜５、８、１１、２月）
        $i8= 0;//特養処遇・医療連携委員会（第3火曜）
        $i9= 0;//QOL・看取り向上委員会（第４月曜）
    
    
        print $nextMonthYear . '年' . $nextMonth. '月　シフト';
        print '(' . $year . '年　' . $month . '月21日～';
        print $nextMonthYear . '年　' . $nextMonth . '月20日)';
    
        for($n=0;$n<20;$n++){//$weekに今月１日から２０日までの曜日を入れる(委員会日程決定するための曜日を数えるために必要)
        array_push($week,date('w', mktime(0, 0, 0, $month, $n, $year)));
        }
        

//-------------------------日数を決定。同時に曜日を計算し、$week配列に入れる--------------------------------------------------
        print '<br><tr><td width=50px>日付</td>';
        if (date('m') == 4 || date('m') == 6 || date('m') == 9 || date('m') == 11) {
            for ($i = 0; $i < count($monthDays) - 1; $i++) {
                print '<td class=day-' . ($i + 21) . '>' . $monthDays[$i] . '</td>';
                array_push($week, date('w', mktime(0, 0, 0, $month, $monthDays[$i], $year)));
    
            }
        } else if (date('m') == 2 && date('Y') % 4 == 0) {
            for ($i = 0; $i < count($monthDays) - 2; $i++) {
                print '<td class=day-' . ($i + 21) . '>' . $monthDays[$i] . '</td>';
                array_push($week, date('w', mktime(0, 0, 0, $month, $monthDays[$i], $year)));
    
            }
        } else if (date('m') == 2) {
            for ($i = 0; $i < count($monthDays) - 3; $i++) {
                print '<td class=day-' . ($i + 21) . '>' . $monthDays[$i] . '</td>';
                array_push($week, date('w', mktime(0, 0, 0, $month, $monthDays[$i], $year)));
    
            }
        } else {
            for ($i = 0; $i < count($monthDays); $i++) {
                print '<td class=day-' . ($i + 21) . '>' . $monthDays[$i] . '</td>';
                array_push($week, date('w', mktime(0, 0, 0, $month, $monthDays[$i], $year)));
    
            }
        }
        for ($j = 0; $j < count($nextMonthDays); $j++) {
            print '<td class=day-' . ($j + 1) . '>' . $nextMonthDays[$j] . '</td>';
            array_push($week, date('w', mktime(0, 0, 0, $nextMonth, $nextMonthDays[$j], $nextMonthYear)));
    
            }
        
        print '</tr>';
        print '<br><tr><td width=50px>曜日</td>';
        for ($l = 20; $l < count($week); $l++) {
                print '<td>' . $weekValue[$week[$l]] . '</td>';
            }
            print '</tr>';
    
//------------２１日～月末までの曜日の回数を数えて$iinkaiDayに入れる（月頭から数える必要あり）---------------------------------
        for($o=0;$o<$i+$n;$o++){
            if($week[$o]==1){
                $i9++;
                if($i9== 4){
                    array_push($iinkaiDay,'看&nbsp;Q<br>取&nbsp;O<br>り&nbsp;L<br>向&nbsp;向<br>上&nbsp;上<br>');
                }else{
                array_push($iinkaiDay,'');
            }
    
            }else if($week[$o]==6){
                $i4++;
                if($i4== 4 && ($month==5||$month==8||$month==11||$month==2)){
                    array_push($iinkaiDay,'離<br>設<br>対<br>策');
            }else if($i4== 4 && ($month==4||$month==7||$month==10||$month==1)){
                    array_push($iinkaiDay,'防<br>犯<br>対<br>策');
            }else{
                array_push($iinkaiDay,'');
            }
    
            }else if($week[$o]==2){
                $i7++;
                if($i7==3 && ($month==5||$month==8||$month==11||$month==2)){
                    array_push($iinkaiDay,'身特<br>体養<br>拘処<br>束遇<br>適・<br>正医<br>化療<br>　連<br>　携');
                }else if($i7==3 && ($month==4||$month==6||$month==7||$month==9||$month==10||$month== 12||$month== 1||$month=3)){
                    array_push($iinkaiDay,'特<br>養<br>処<br>遇<br>・<br>医<br>療<br>連<br>携');
                }else{
                    array_push($iinkaiDay,'');
                }
            }else{
                array_push($iinkaiDay,'');
            }
        }
//----------------------１日～２０日までの委員会を$iinnkaiDayに入れる--------------------------
    for($m=($o);$m<count($week);$m++){
        if($week[$m]==1){//月曜日
            $i3++;
            if($i3==1){
                array_push($iinkaiDay,'救<br>命<br>・<br>防<br>災');
            }else{
                array_push($iinkaiDay,'');
            }
        }else if($week[$m]==2){//火曜日
            $i1++;
            $i7++;
            if($i1== 1){//第1火曜日
                array_push($iinkaiDay,'感<br>染<br>・<br>褥<br>瘡<br>予<br>防');
            }else if($i1== 2){//第2火曜日
                array_push($iinkaiDay,'腰<br>痛<br>予<br>防<br>');
            }else if($i7== 3 && ($month==5||$month==8||$month==11||$month==2)){
                array_push($iinkaiDay,'身特<br>体養<br>拘処<br>束遇<br>適・<br>正医<br>化療<br>　連<br>　携');
            }else if($i7==3 && ($month==4||$month==6||$month==7||$month==9||$month==10||$month== 12||$month== 1||$month=3)){
                array_push($iinkaiDay,'特<br>養<br>処<br>遇<br>・<br>医<br>療<br>連<br>携');
            }else{
                array_push($iinkaiDay,'');
            }
        }else if($week[$m]==4){//木曜日
            $i2++;
            if($i2== 1){
                array_push($iinkaiDay,'現<br>任<br>教<br>育<br>');
        }else{
            array_push($iinkaiDay,'');
        }
        }else{
            array_push($iinkaiDay,'');
        }

    }
//-----------------$iinkaiDayの配列の20番目から使う----------------------------------
                print '<tr><td width=50px>委員会</td>';
                for($p=20;$p<count($iinkaiDay);$p++){
                print'<td class="iinkai"><input type="text"  style="width:15px" value="'.$iinkaiDay[$p].'"></td>';
}
    print'</tr>';

    mkTable();
    print '</table>';

    print'<input type="hidden" name="month" value="'.$month.'">';
    print'<input type="hidden" name="year" value="'.$year.'">';
    for($q=$n;$q<count($week);$q++){
        print'<input type="hidden" name="week_data[]" value="'.$weekValue[$week[$q]].'">';
    }
    for($r=0;$r<count($iinkaiDay);$r++){
        print'<input type="hidden" name="iinkai[]" value="'.$iinkaiDay[$r].'">';
    }
    print'<input type="submit" value="確認">';
    print '</form>';
    ?>
    </body>



</html>