const zone_active = document.querySelector('#zone-active');
const zone_inactive = document.querySelector('#zone-inactive');
const request = new XMLHttpRequest();


function draggstart (param){
    if(param.classList=='table-dragg'){
      param.addEventListener("dragstart", (ev) => {

  ev.currentTarget.classList.add("dragging");

  ev.dataTransfer.clearData();

  ev.dataTransfer.setData("text/plain", ev.target.id);
  param.addEventListener("dragend", (ev) =>
  ev.target.classList.remove("dragging"));
})
} else {
    draggstart (param.parentNode);
}}


zone_active.addEventListener("pointerdown", event => {
  

    let targ = event.target;
if(targ.className != 'anti-dragg' && targ.className != 'zone-dragg'){
        draggstart(targ);
    }

})

zone_inactive.addEventListener("pointerdown", event => {
    

    let targ = event.target;
if(targ.className != 'anti-dragg' && targ.className != 'zone-dragg'){
        draggstart(targ);
    }
   
})
zone_inactive.addEventListener("dragover", (ev) => {

  ev.preventDefault();
});
zone_inactive.addEventListener("drop", (ev) => {

  if(ev.target.className == 'zone-dragg'){
  ev.preventDefault();
  // Get the data, which is the id of the source element
  const data = ev.dataTransfer.getData("text");
  
  const source = document.getElementById(data);
  ev.target.appendChild(source);

  const offer_id = data.replace('id', '');
  request.open('GET', "/ActiveOffer?state=1&id="+offer_id);

request.send();
  } else {
    return;
  }
});

zone_active.addEventListener("dragover", (ev) => {

  ev.preventDefault();
});
zone_active.addEventListener("drop", (ev) => {

  if(ev.target.className == 'zone-dragg'){
  ev.preventDefault();
  // Get the data, which is the id of the source element
  const data = ev.dataTransfer.getData("text");
  const source = document.getElementById(data);
  ev.target.appendChild(source);

    const offer_id = data.replace('id', '');
  request.open('GET', "/ActiveOffer?state=0&id="+offer_id);
  
  request.send();
    } else {
    return;
  }
});