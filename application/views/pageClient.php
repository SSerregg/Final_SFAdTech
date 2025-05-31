<div class="client-offers">
  <div class="zone-dragg" id="zone-active">
    <h2 class="anti-dragg">Активные офферы:</h2>
    <?php
if(!empty($data)){
foreach($data as $key => $value){
if($value['topicstate'] == 1){
echo '<table border="1" class="table-dragg" id="id'.$value['id'].'" draggable="true">
    
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
      </table>';
}}}
?>
  </div>
  <div class="zone-dragg" id="zone-inactive">
    <h2 class="anti-dragg">Неактивные офферы:</h2>
        <?php
if(!empty($data)){
foreach($data as $key => $value){
if($value['topicstate'] != 1){
echo '<table border="1" class="table-dragg" id="id'.$value['id'].'" draggable="true">
    
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
      </table>';
}}}
?>
  </div>

</div>

<h2>Создать offer:</h2>

    <input class="input_offerName" name="offerName" type="text" placeholder="offerName">
    <br>
    <br>
    <input class="input_followCost" name="followCost" type="number" step=0.001 placeholder="стоимость перехода">
    <br>
    <br>
    <input class="input_targetUR" name="targetURL" type="url" placeholder="URL">
    <br>
    <br>
    <input class="input_description" name="description" type="text" placeholder="Темы сайта" id="bla">
    <br>
    <br>
    <input class="input_create" name="create" type="submit" value="Создать" >
    <h2 class="headline3"> </h2>

<br>
<h2>Посмотреть расходы и кол-во переходов по offer-ам:</h2>
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
foreach($data as $key => $value){
  echo '<option value="'.$value['id'].'" selected>'.$value['offer'].'</option>';
}
 ?>

</select>
    <br>
    <br>
    <button type="submit" class="submit_look">
    >Посмотреть!< </button>
<h2 class="headline"> </h2>
<h2 class="headline2"> </h2>
    <br>

<form action="/ExitFrom" method="get" >
    <input class="exit_button" name="exit" type="submit" value="Выход из системы!!!" >
</form>
