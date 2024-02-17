<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>data_send</title>
    </head>
    <body>
    <?php

    $gyou=array('a','b','c','d');
    $retu=array(1,2,3,4,5,6,7,8,9,10);

    print '<table>';
    for($i=0; $i<count($gyou); $i++){
        print '<tr><td>'.$gyou[$i].'</td>';
        for($j=0;$j<count($retu);$j++){
            print '<td>';
            print'<form>';
            print'<select name='.$gyou[$i].'-'.$retu[$j].'>';
            print'<option value="あ">あ</option>';
            print'<option value="い">い</option>';
            print'<option value="う">う</option>';
            print'<option value="え">え</option>';
            print'<option value="お">お</option>';
            print'</select>';
            print'</form>';
            print'</td>';
        }
        print'</tr>';
    }
    print'</table>'

    //変更があったときPHP_SERVERに送ってそれぞれの名前の配列に入れる


    //submitボタンが押されたとき、配列の情報を持って次のdata_send_check.phpに送る

    ?>
    </body>

</html>