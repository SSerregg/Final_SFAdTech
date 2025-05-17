<?php

if(!empty($data)){
foreach($data as $key => $value){

echo '<table border="1">
    
        <tr>
          <td>Offer:</td>
          <th>'.$value['offer'].'</th>
        </tr>
        <tr>
          <td>Кол-во веб-мастеров:</td>
          <th>'.$value['craftsmen'].'</th>
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
        <tr>
          <td>Статус (актив/деактив):</td>
          <th>'.$value['topicstate'].'</th>
        </tr>              
      </table>
      <form action="/ActiveOffer" method="post" >
        <input type="hidden" name="id" value="'.$value['id'].'">
        <input type="hidden" name="state" value="'.$value['topicstate'].'">
        <input name="on/off" type="submit" value="активировать/деактивировать" >
      </form><br>';
}}
?>
<script src="/redirectClient.js"></script>
<h2>Создать offer:</h2>
<form action="/CreateOffer" method="post" >
    <input name="offerName" type="text" placeholder="offerName">
    <br>
    <br>
    <input name="followCost" type="number" step=0.001 placeholder="стоимость перехода">
    <br>
    <br>
    <input name="targetURL" type="url" placeholder="URL">
    <br>
    <br>
    <input name="description" type="text" placeholder="Темы сайта" id="bla">
    <br>
    <br>
    <input name="create" type="submit" value="Создать" >
</form>
<br>
<br>
<form action="/ClientStatisticNotJS" method="get" >
<h2>Посмотреть расходы и кол-во переходов по offer-ам:</h2>
<label for="start_date">Выберите дату: с</label>
  <input type="date" name="data_start" value="2025-01-01" 
    min="2025-01-01" max="2029-12-31" id="start_date"/>
    <label for="finish_date">по</label>
    <input type="date" name="data_finish" value="2025-12-31" 
    min="2025-01-01" max="2029-12-31" id="finish_date"/>

    <br>
    <br>
    <label for="selector">Выберите offer:</label>


    <select name="offer_id" id="selector" >
    <?php 
foreach($data as $key => $value){
  echo '<option value="'.$value['id'].'" selected>'.$value['offer'].'</option>';
}
 ?>

</select>
    <br>
    <br>
    <button type="submit" class="submit_look">
    >Посмотреть!< </button>
</form>
<br>
<br>
<br>
<form action="/ExitFrom" method="get" >
    <input class="exit_button" name="exit" type="submit" value="Выход из системы!!!" >
</form>
