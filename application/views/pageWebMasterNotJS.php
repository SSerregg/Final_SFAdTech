<?php

$_SESSION['key'] = bin2hex(random_bytes(7));

[$offers, $subscriptions] = $data;
$arraySub = [];


if(!empty($offers)){
foreach($offers as $key => $value){

$selector =  0;

echo '<div class="tableWebMaster">
      <table border="1">   
        <tr>
          <td>Offer:</td>
          <th>'.$value['offer'].'</th>
        </tr>

        <tr>
          <td>Стоимость перехода:</td>
          <th>'.$value['cost'].'</th>
        </tr>
        <tr>
          <td>Целевой URL:</td>
          <th>'.$value['targeturl'].'</th>
        </tr>        
        <tr>
          <td>Темы сайта:</td>
          <td>'.$value['topic'].'</td>
        </tr>
              
      </table>';
     if ($subscriptions != null){
      foreach($subscriptions as $keySub => $valueSub){

        if($value['id'] === $valueSub['id_offer'] ){

          // Массив для селектора офферов формы

          $valArray = array_fill_keys([$value['offer']], $value['id']);
    
          $arraySub = array_merge($arraySub, $valArray);
          //-----------------------------------
          echo '<table border="1">
    
          <tr>
            <td>Вы подписанны:</td>
            <th>ДА</th>
          </tr>

          <tr>
           <td>Ваша часть:</td>
           <th>'.$valueSub['costing'].'</th>
          </tr>
          <tr>
           <td>Ваша ссылка:</td>
           <th>'.$valueSub['link'].'</th>
          </tr>        
         
          </table>';

          $selector = 1;
          break;
        }
      }
    }
     echo '</div>';
if($selector===1){
  echo '
     <form action="/UnsubscribeWebMaster" method="post" >
        <input type="hidden" name="key" value="'.$_SESSION['key'].'">
        <input type="hidden" name="id" value="'.$value['id'].'">
    
        <input name="off" type="submit" value="отписаться" >
      </form>';
}else{
  echo '
     <form action="/SubscribeWebMaster" method="post" >
        <input type="hidden" name="key" value="'.$_SESSION['key'].'">
        <input type="hidden" name="id" value="'.$value['id'].'">
        <label for="cost">Укажите вашу долю %:</label>
        <input name="followCost" type="number" placeholder="не больше 90%" id="cost">
          <br>
        <input name="on" type="submit" value="подписаться" >
      </form>';
}
echo '<br>';
}}
?>

<h2>Доходы и кол-во переходов по offer-у:</h2>

  <form action="/WebMasterStatistic" method="post" >
  <label for="start_date">Выберите дату: с</label>
  <input type="date" name="trip_start" value="2025-01-01" 
    min="2025-01-01" max="2029-12-31" id="start_date"/>
    <label for="finish_date">по</label>
    <input type="date" name="trip_finish" value="2025-12-31" 
    min="2025-01-01" max="2029-12-31" id="finish_date"/>

    <br>
    <br>
    <label for="selector">Выберите offer:</label>
    <select name="offer" id="selector" >
    <?php
foreach ($arraySub as $key => $value){
  echo '<option value="'.$value.'" selected>'.$key.'</option>';
}
    ?>

</select>
    <br>
    <br>

    <input type="submit" value=">Посмотреть!<" >
</form>
<br>
<br>
<form action="/ExitFrom" method="get" >
    <input name="exit" type="submit" value="Выход из системы!!!" >
</form>

<script src="/webmasterJS/redirectWebMaster.js"></script>