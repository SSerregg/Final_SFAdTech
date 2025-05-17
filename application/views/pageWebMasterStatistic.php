<?php
[$count, $sum] = $data;
?>

<h2>Количество переходов:  <?php echo $count['count']; ?></h2>
<h2>Ваш доход:  <?php echo $sum; ?> рубля.</h2>

<form action="/WebMaster" method="get" >
    <input type="submit" value="<<Назад!" >
</form>