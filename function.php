<?php

function mkTable()
{
    $syokuin = array('太郎', '次郎', '三郎', '四郎', '五郎');
    $thisMonthDays = array(21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
    $nextMonthDays = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20);
    $selectKinmu =
        '
        <option value="0"> </option>
        <option value="1">早</option>
        <option value="2">早</option>
        <option value="3">日</option>
        <option value="4">通</option>
        <option value="5">遅</option>
        <option value="6">入</option>
        <option value="7">明</option>
        <option value="8">休</option>
        <option value="9">研</option>


      </select>';


    for ($s = 0; $s < count($syokuin); $s++) {
        print '<tr class='.$syokuin[$s].'><td width=50px><input type="button" name="'.$syokuin[$s].'" value="'.$syokuin[$s].'"></td>';
        if (date('m') == 4 || date('m') == 6 || date('m') == 9 || date('m') == 11) {
            for ($i = 0; $i < count($thisMonthDays) - 1; $i++) {//30日なので-1
                print '<td><select class="day-'.($i + 21).'"name="'.$syokuin[$s].'[]">';
                print  $selectKinmu . '</td>';

            }
        } else if (date('m') == 2 && date('Y') % 4 == 0) {//うるう年の2月(29日)なので-2
            for ($i = 0; $i < count($thisMonthDays) - 2; $i++) {
                print '<td><select class="day-'.($i + 21).'"name="'.$syokuin[$s].'[]">';
                print  $selectKinmu . '</td>';
            }
        } else if (date('m') == 2) {
            for ($i = 0; $i < count($thisMonthDays) - 3; $i++) {//28日なので-3
                print '<td><select class="day-'.($i + 21).'"name="'.$syokuin[$s].'[]">';
                print  $selectKinmu . '</td>';
            }
        } else {
            for ($i = 0; $i < count($thisMonthDays); $i++) {//31日なので-しない
                print '<td><select class="day-'.($i + 21).'"name="'.$syokuin[$s].'[]">';
                print  $selectKinmu . '</td>';
            }
        }
        for ($j = 0; $j < count($nextMonthDays); $j++) {//翌月の1日～20日分
            print '<td><select class="day-'.($j + 1).'"name="'.$syokuin[$s].'[]">';
            print  $selectKinmu . '</td>';
        }
        print '</tr>';
    }



}

function make7Years(){
    print'<select style=width:50px; name="year">';
    $yearNow=date('Y');
    for($y=$yearNow-3;$y<=($yearNow)+3;$y++){
        if($y==$yearNow){
            print'<option value='.$y.' selected>'.$y.'</option>';
        }else{
        print'<option value='.$y.'>'.$y.'</option>';
        }
    }
    print'</select>';
}
function twelveMonth(){
    $monthNow=date('m');
    $twelveMonth=array(1,2,3,4,5,6,7,8,9,10,11,12);
    print'<select style=width:50px; name="month">';
    foreach($twelveMonth as $month){
        if($month==$monthNow){
            print'<option value='.$month.' selected>'.$month.'</option>';
        }else{
        print'<option value='.$month.'>'.$month.'</option>';
        }
    }
    print'</select>';

}
?>