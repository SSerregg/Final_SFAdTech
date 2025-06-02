<?php

$_SESSION['key'] = bin2hex(random_bytes(7));

[$offers, $subscriptions] = $data;
$arraySub = [];
echo '<div class="master">';
echo '<div class="main-tables">';
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
          echo '<table border="1" class="table-dragg" id="id'.$value['id'].'"draggable="true">
    
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
           <th draggable="false">'.$valueSub['link'].'</th>
          </tr>        
         
          </table>';

          $selector = 1;
          break;
        }
      }
    }
     echo '</div>';
if($selector!==1){
  echo '<div class="input">
        <input type="hidden" class="forid" value="'.$value['id'].'">
        <input name="followCost" type="number" placeholder="не больше 90%" class="costing">
          <br>
        <button type="button" class="submit">подписаться</button>
        </div>';
}
echo '<br>';
}}
?>
</div>
<div class="ferd-tables">Чтобы отписаться перетащите сюда!!!</div>
</div>
<h2>Доходы и кол-во переходов по offer-у:</h2>
<div>
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
    <button type="button" class="submit-statistik">>Посмотреть!<</button>
</div>
<div class="statistik"> </div>
<br>
<br>
<form action="/ExitFrom" method="get" >
    <input name="exit" type="submit" value="Выход из системы!!!" >
</form>
<script>const userKey = "<?php echo $_SESSION['key'];?>"
</script>