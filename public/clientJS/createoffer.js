const offerName    = document.querySelector('.input_offerName');
const followCost   = document.querySelector('.input_followCost');
const targetURL    = document.querySelector('.input_targetUR');
const description  = document.querySelector('.input_description');
const input_create = document.querySelector('.input_create');
const headline3    = document.querySelector(".headline3");
const request_create = new XMLHttpRequest();


  request_create.addEventListener('load', function () {
    if (this.readyState === 4 && this.status === 200) {

        const decoding = JSON.parse(this.responseText);
      //console.log(this.responseText);

      zone_active.insertAdjacentHTML('beforeend', 
        `<table border="1" class="table-dragg" id="id`+decoding["0"]+`" draggable="true">
        <tr>
          <td>Offer:</td>
          <th>${decoding["post_offerName"]}</th>
        </tr>
        <tr>
          <td>Кол-во веб-мастеров:</td>
          <th>`+decoding["1"]+`</th>
        </tr>
        <tr>
          <td>Стоимость перехода:</td>
          <th>`+decoding["post_followCost"]+`</th>
        </tr>
        <tr>
          <td>Целевой URL:</td>
          <th>`+decoding["post_targetURL"]+`</th>
        </tr>        
        <tr>
          <td>Темы сайта:</td>
          <td>`+decoding["post_description"]+`</td>
        </tr>                   
      </table>`);
    }
  });

input_create.addEventListener('click', e=>{

    const input_offerName    = String(offerName.value);
    const input_followCost   = Number(followCost.value);
    const input_targetURL    = String(targetURL.value);
    const input_description  = String(description.value);

    if(!isValue(input_offerName) || !isValue(input_followCost) || !isValue(input_targetURL)
    || !isValue(input_description)){

headline3.textContent = "Данные введены неправильно или неполно!";
} else {
    headline3.textContent = " ";

    const data = JSON.stringify({
    post_offerName: input_offerName,
    post_followCost: input_followCost,
    post_targetURL: input_targetURL,
    post_description: input_description
  });
  request_create.open('POST', '/CreateOffer/create', true);
  request_create.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request_create.send(data);
}
})