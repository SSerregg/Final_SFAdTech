let arrTables;
arrTables = document.querySelectorAll('.table-dragg');
const target = document.querySelector('.ferd-tables');
const subscribe = new XMLHttpRequest();
const unsubscribe = new XMLHttpRequest();
let wait;
let arrSubmit;
arrSubmit = document.querySelectorAll('.submit');
let sibling;
let paramm;

function isValue(val){
  if(val !== undefined && val != null && val != ''){
    return true ;
  } else {
    return false ;
  }
}

const handler = ev => {

  paramm = ev.currentTarget.parentNode;

  sibling = paramm.previousSibling;

  const id = Number(paramm.querySelector('.forid').value);
  let costing = Number(paramm.querySelector('.costing').value);

  if(isValue(costing) && costing < 90 && costing > 0){

  } else {
    costing = 80;
  }
  
    const data = JSON.stringify({
    post_id: id,
    post_key: userKey,
    post_costingL: costing
  });

    subscribe.open('POST', '/SubscribeWebMasterJS', true);
  subscribe.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  subscribe.send(data);

    paramm.remove();
}
unsubscribe.onreadystatechange = function(){

    if (this.readyState === 4 && this.status === 200) {
        //const test = JSON.parse(this.responseText);
     
      let button = document.createElement('button');
      button.className = "submit";
      button.innerHTML = "подписаться";
      button.type = "button";

      button.addEventListener("mouseup", handler);

      let input = document.createElement('input');
      input.className = "costing";
      input.placeholder = "не больше 90%";
      input.type = "number";

      let hide = document.createElement('input');
      hide.className = "forid";
      hide.type = "hidden";
      hide.value = this.responseText;

      let div = document.createElement('div');
      div.className = "input";

      div.append(hide);
      div.append(input);
      div.append(button);

      wait.after(div);
   
        //        wait.insertAdjacentHTML('afterend', 
        //  `<div class="input">
        //  <input type="hidden" value="`+this.responseText+`">
        //  <input type="number" placeholder="не больше 90%" class="costing">
        //    <br>
        //  <button type="button" class="submit">подписаться</button>
        //  </div>`);


       
      }
}
  subscribe.addEventListener('load', function () {
    if (this.readyState === 4 && this.status === 200) {
      
      let decoding = JSON.parse(this.responseText);

      sibling.insertAdjacentHTML('beforeend', 
         `<table border="1" class="table-dragg" id="id`+decoding["0"]+`" draggable="true">
    
          <tr>
            <td>Вы подписанны:</td>
            <th>ДА</th>
          </tr>

          <tr>
           <td>Ваша часть:</td>
           <th>`+decoding["2"]+`</th>
          </tr>
          <tr>
           <td>Ваша ссылка:</td>
           <th>`+decoding["1"]+`</th>
          </tr>        
         
          </table>`);
    arrTables = document.querySelectorAll('.table-dragg');  

    forArrTables();
           
    }
  });
function forArrTables(){
arrTables.forEach((source)=>{

source.addEventListener("dragstart", (ev) => {
  //console.log("dragStart");
  // Change the source element's background color
  // to show that drag has started
  ev.currentTarget.classList.add("dragging");
  // Clear the drag data cache (for all formats/types)
  ev.dataTransfer.clearData();
  // Set the drag's format and data.
  // Use the event target's id for the data
  ev.dataTransfer.setData("text/plain", ev.target.id);
});
source.addEventListener("dragend", (ev) =>
  ev.target.classList.remove("dragging"),
);

})
}
forArrTables();

target.addEventListener("dragover", (ev) => {
  //console.log("dragOver");
  ev.preventDefault();
});
target.addEventListener("drop", (ev) => {
  //console.log("Drop");
  ev.preventDefault();
  // Get the data, which is the id of the source element
  const data = ev.dataTransfer.getData("text");
  const source = document.getElementById(data);
  wait = source.parentNode;
  source.remove();
  const id = data.replace('id','');
  unsubscribe.open('GET', "/UnsubscribeWebMaster/unsub?id="+id);
  unsubscribe.send();

});



arrSubmit.forEach((source)=>{

source.addEventListener("mouseup", handler);
})


document.addEventListener("click", (event)=>{
  console.log(event.target);
})