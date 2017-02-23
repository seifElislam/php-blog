var imgs = ['img/orange.png','img/orange-juice.png','img/green.png','img/Lemon-juice.png'];
var play =  document.getElementById("play");
var stop =  document.getElementById("stop");
var next =  document.getElementById("next");
var back =  document.getElementById("back");
var target = document.getElementById("target");
var index =0;
var id, flag=0, stopped=0;

function funPlay(){
    console.log('flag before',flag);
    target.setAttribute('src',imgs[index]);
    index=(index>=3)?0:++index;
    console.log('flag after',flag);
    console.log('img=',index);
    console.log('img=',imgs[index]);
}

play.addEventListener('click',function(){
    console.log('flag before',flag);
    if(flag==0)
        {id = setInterval(funPlay,1000);
         flag = 1;
         stopped=0;}
});

stop.addEventListener('click',function(){
    console.log('flag before',flag);
    clearInterval(id);
    flag=0;
    stopped=1;
    console.log('flag after',flag);
    console.log('img=',index);
    console.log('img=',imgs[index]);
});

back.addEventListener('click',function(){
    clearInterval(id);
    console.log('flag before',flag);
    // index=index-2;
    index=(flag==1||stopped==1)?index-2:--index;
    switch (index) {
        case -2:
            index=2;
            break;
        case -1:
            index=3;
            break;
        default:index=index;

    }
    target.setAttribute('src',imgs[index]);
    flag=0;
    stopped=0;
    console.log('flag after',flag);
    console.log('img=',index);
    console.log('img=',imgs[index]);
});

next.addEventListener('click',function(){
    console.log('flag before',flag);
    clearInterval(id);
    index=(flag==1||stopped==1)?index:++index;
    index=(index>3)?0:index;
    target.setAttribute('src',imgs[index]);
    flag=0;
    stopped=0;
    console.log('flag after',flag);
    console.log('img=',index);
    console.log('img=',imgs[index]);
});
