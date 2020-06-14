function GetClock(){
var d=new Date();
var nmonth=d.getMonth(),ndate=d.getUTCDate(),nyear=d.getYear();
if(nmonth<10) nmonth="0"+(nmonth+1);
//if(nyear<1000) nyear+=1900; //make 2 digit year needed to sub 100 form year (see below) remove for 4 postion year
var tzOffset = 0;//set this to the number of hours offset from UTC to adjust for your time zone (we want UTC time here)
var d=new Date();
var dx=d.toGMTString();
dx=dx.substr(0,dx.length -3);
d.setTime(Date.parse(dx))
d.setHours(d.getHours()+tzOffset);var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds();
if(nmin<=9) nmin="0"+nmin
if(nsec<=9) nsec="0"+nsec;
document.getElementById('logclock').value=""+(nmonth)+"/"+ndate+"/"+(nyear-100)+" "+nhour+":"+nmin+":"+nsec+"";
}
window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}