
function myFunction() {
       const startingMinutes=0.10;
    let time=startingMinutes*60;
    const countdown=document.getElementById('countdown');
    const container=document.querySelector('.container');
    setInterval(updateCountdown,1000);
    function updateCountdown(){
        const min=Math.floor(time/60);
        let seconds=time%60;
        seconds=seconds< 10? '0' +seconds :seconds;
        countdown.innerHTML=`${min}:${seconds}`;
        time--;
        if(time<0.0){
            container.innerHTML=`times up!!!!`;
            
        }
    }
}


