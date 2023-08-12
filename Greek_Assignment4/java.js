var counter = 1;
setInterval(function(){
    document.getElementById('radio'+counter).checked = true;
    counter++;
    if(counter>4){
        counter = 1;
    }
}, 5000);

function show(){
    document.getElementById('more').style.height="400px"
    document.getElementById('more').style.display="block"
    document.getElementById('show').style.display="none"
}

function hide(){
    document.getElementById('more').style.height="0px"
    document.getElementById('more').style.display="none"
    document.getElementById('show').style.display="inline"
}