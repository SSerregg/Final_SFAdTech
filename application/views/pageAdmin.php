<?php 

[$reviews_refusal, $transition, $issued_links, $forIncome, $offers, $webMasters] = $data;
$income = $forIncome['expenses'] - $forIncome['summ'];

echo '<h2>Управление системой:</h2>';
echo '
<form action="/SubscribeWebMaster" method="post">

<label for="selector_offer">Выберите offer:</label>
<select name="id" id="selector_offer" >';
foreach($offers as $key => $value){
    echo '<option value="'.$value['id'].'" selected>'.$value['offer'].'</option>';
}

echo '</select>
<label for="selector">Выберите вебмастера:</label>
<select name="webMaster" id="selector" >';
foreach($webMasters as $key => $value){
    echo '<option value="'.$value['user'].'" selected>'.$value['user'].'</option>';
}
echo '</select>
<br>
        <label for="cost">Укажите долю %:</label>
        <input name="followCost" type="number" placeholder="не больше 90%" id="cost">
<br>
<input name="reg" type="submit" value="Подписать на работу" >

</form>
<br>
';

//отписать вебмастера от оффера----------------------------------------------------------

foreach($offers as $key => $value){

        echo '<table border="1">
    
          <tr>
            <th>'.$value['offer'].'</th>
            <td>Активный:</td>
            <th>'.$value['topicstate'].'</th>
          </tr>

          <tr>
           <td>Подписанные<br> WebMasters:</td>';
foreach($issued_links as $key_sub => $value_sub){
    if($value['id'] == $value_sub['id_offer']){
        echo '<td>'.$value_sub['web_master'].'</td>';
    }
}
         echo '</tr>       
         
          </table>';
          echo 
          '<form action="/AdminForUnsubscribe" method="post" >
                <select name="webmaster" id="selector" >';

foreach($issued_links as $key_sub => $value_sub){
    if($value['id'] == $value_sub['id_offer']){
        echo '<option value="'.$value_sub['id'].'" selected>'.$value_sub['web_master'].'</option>';
    }
}
echo 
'</select>
<input name="'.$value['id'].'" type="submit" value="Отписать WebMaster" >
        </form>';
echo'      <form action="/ActiveOffer" method="post" >
        <input type="hidden" name="id" value="'.$value['id'].'">
        <input type="hidden" name="state" value="'.$value['topicstate'].'">
        <input name="on/off" type="submit" value="активировать/деактивировать" >
      </form><br>';
}


//Data----------------------------------------------------------------------------
echo '<h2>Общий доход системы(Выручка / Выплаты / Доход):</h2>';
echo '<h1>'.$forIncome['expenses'].' / '.$forIncome['summ'].' / '.$income.'</h1>';
echo '<h2>Выданные ссылки (стоимость || link):</h2>';
echo '<h3>';
foreach($issued_links as $key => $value){
    $param = str_replace('<br>', '', $value['link']);
    echo $value['costing'].'  ||  '.$param.'<br>';
}
echo '</h3>';

echo '<h2>Статистика переходов<br>(Дата/WebMaster/Offer/Цена/Переходы):</h2>';
echo '<h3>';
foreach($transition as $key => $value){
    echo $value['nowdate'].' / '.$value['webmaster'].' / '.$value['offer']
    .' / '.$value['cost'].' / '.$value['count'].'<br>';
}
echo '</h3>';
?>

<h2>Статистика отказов(когда веб-мастер попытался<br>перенаправить на offer, на который он не подписан):</h2>
<?php
print_r($reviews_refusal);
?>
<br>
<form action="/ExitFrom" method="get" >
    <input class="exit_button" name="exit" type="submit" value="Выход из системы!!!" >
</form>