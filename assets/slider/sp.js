var img = 1;

laptop = function (){
    var cn = ["./assets/img/s4.jpg","./assets/img/s2.jpg","./assets/img/s3.jpg",
    "./assets/img/s4.jpg"];
    document.getElementById('lap').src = cn[img];
    img ++;
    if(img > 3 ){
        img = 1;
    }
    
}
setInterval(laptop, 5000);