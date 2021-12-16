var img = 0;

slider = function (){
    var cn = ["./assets/img/slide3.png","./assets/img/slide1.png",
    "./assets/img/slide2.png","./assets/img/slide4.png","./assets/img/slide5.png"];
    document.getElementById('pro').src = cn[img];
    img=img+1;
    if(img > 4){
        img = 0;
    }
    
}
setInterval(slider, 8000);