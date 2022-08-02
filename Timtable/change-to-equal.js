 function changeEqual(){
    const t = document.querySelector('table');
    for(let j=i; j<=8; j++){
    for(let i=5; i>0; i--){
    let upper=t.tBodies[0].rows[i].cells[1].innerHTML;
    let lower=t.tBodies[0].rows[i-1].cells[1].innerHTML;
    if(upper==lower && lower!="X"){
        console.log('true');
        t.tBodies[0].rows[i].cells[1].innerHTML="&#8220";
    }
    else{
        console.log('false');
    }
    }
}
} 

// setInterval(function(){alert("Hello")},5000);
setTimeout( function() { changeEqual(); }, 2000);

