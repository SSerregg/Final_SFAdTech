const button =  document.querySelector(".submit_look");
const date_start =  document.querySelector("#start_date");
const date_finish =  document.querySelector("#finish_date");
const selector = document.querySelector("#selector");
const hedline = document.querySelector(".headline");
const hedline2 = document.querySelector(".headline2");
const request2 = new XMLHttpRequest();
let request_summ;

function isValue(val){
  if(val !== undefined && val != null && val != ''){
    return true ;
  } else {
    return false ;
  }
}

request2.onreadystatechange = function(){

  if (this.readyState === 4 && this.status === 200) {

      const request_count = JSON.parse(this.responseText);
      
      if(!isValue(request_count.summ)){
        request_summ = '0';
      } else {
        request_summ = request_count.summ;
      }
      hedline.textContent = 'Переходов по офферу: '+request_count.count;
      hedline2.textContent = 'Расходов: '+request_summ+' руб.';
      console.log(request_count);
      
    }
}
button.addEventListener('click', event => {

  const offer_id = Number(selector.value);
  const data_start_param = String(date_start.value);
  const data_finish_param = String(date_finish.value);

  if (isValue(offer_id) && isValue(data_start_param) && isValue(data_finish_param)){

    request2.open('GET', "/ClientStatistic?offer_id="+offer_id+"&data_start="+data_start_param+"&data_finish="+data_finish_param);
    request2.send();

  } else {
    hedline.textContent = 'Данные введены некоректно.';
  }
  })