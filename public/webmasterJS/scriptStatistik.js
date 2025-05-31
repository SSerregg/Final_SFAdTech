const button = document.querySelector(".submit-statistik");
const request = new XMLHttpRequest();
const divRequest = document.querySelector(".statistik");

button.addEventListener("click", e =>{

    divRequest.innerHTML = " ";
    const parent = e.target.parentNode;

    const dateStart = parent.querySelector('[name="trip_start"]').value;
    const dateFinish = parent.querySelector('[name="trip_finish"]').value;
    const selector = parent.querySelector('#selector').value;
    
    request.open('GET', "/WebMasterStatisticJS?dateStart="+dateStart+"&dateFinish="+dateFinish+"&selector="+selector);
    request.send();
})


request.onreadystatechange = function(){

    if (this.readyState === 4 && this.status === 200) {
        const parse = JSON.parse(this.responseText);
    
        divRequest.innerHTML = `Количество переходов: ${parse["0"]}. Доход: ${parse["1"]}`;
  
      }
}

