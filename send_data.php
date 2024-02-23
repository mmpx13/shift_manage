<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>data_send</title>
    </head>
    <body>
    <?php

    $gyou=array('a','b','c','d');//人 $i
    $retu=array(1,2,3,4,5,6,7,8,9,10);//日付 $j
    $shokichi=array(0,0,0,0,0,0,0,0,0,0);

    print '<table>';
//*-----._表を表示させる_.-----*
    for($i=0; $i<count($gyou); $i++){
        ${$gyou[$i]}=array();//i番目の人の名前の配列を作る1⃣
        print '<tr><td>'.$gyou[$i].'</td>';
        for($j=0;$j<count($retu);$j++){
            array_push(${$gyou[$i]},0);//1⃣で作った配列に初期値0をpushする
            print '<td>';
            print'<form method="post" action="data_send_check.php">';
            print'<select name='.$gyou[$i].'[]>';
            print'<option value="0">　</option>';
            print'<option value="1">あ</option>';
            print'<option value="2">い</option>';
            print'<option value="3">う</option>';
            print'<option value="4">え</option>';
            print'<option value="5">お</option>';
            print'</select>';
            print'</td>';
        }
        print'</tr>';
    }
        print'<input type="submit" value="確認">';//ここを押すとdata_sane_check.phpへ
    print'</form>';
    print'</table>';

    ?>
    </body>

</html>