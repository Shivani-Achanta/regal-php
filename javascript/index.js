// setInterval(showTime, 10);
// function showTime() {
//     let time = new Date();
//     let sec = time.getSeconds();
    
//     // sec = sec < 10 ? + sec : sec;
  
//     let currentTime = sec ;
  
//     document.getElementById("timer")
//             .innerHTML = currentTime + " seconds";
// }
// showTime();

var time = 90;
var Timer = setInterval(function(){
//   if time <= 0){
//     clearInterval(downloadTimer);
//   }
  document.getElementById("timer").innerHTML = time + " seconds";
 time -= 1;

  if (time == 0)
  {
      clearInterval(Timer);
      document.getElementById("timer").innerHTML = "Time Up!";
  }
}, 1000);



