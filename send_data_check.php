<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>php</title>
    </head>
    <body>
    <?php
        $gyou=array('a','b','c','d');//人
        $retu=array(1,2,3,4,5,6,7,8,9,10);//日付
        $kinmu=array('　','あ','い','う','え','お');

//*-----._データを受け取る_.-----*
        for($i=0; $i<count($gyou); $i++){
            ${$gyou[$i].'array'}=array();
            ${$gyou[$i].'array'}=$_POST[$gyou[$i]];
        }

//*-----._受け取ったデータで表を作成する_.-----*
        print'<table border=1>';
        for($j=0; $j<count($gyou); $j++){
            print'<tr><td>'.$gyou[$j].'</td>';
            for($k=0; $k<count(${$gyou[$j].'array'}); $k++){
                print'<td>'.$kinmu[${$gyou[$j].'array'}[$k]].'</td>';
            }
            print'<tr>';
        }
        print'</table>';




    ?>
    </body>

</html>