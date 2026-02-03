//Java Load
function getRandomArbitrary(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  }
  function formatN(n) {
      return Number((n).toFixed(1)).toLocaleString();
  }
  function getRandomArbitrary(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  }
  var thentime = new Date('2025, 06, 01');///Y-M-D
  var nowtimes  = new Date;
  var daycount = Math.round((nowtimes - thentime) / (300));//1000 * 60 * 60 * 24
  daycount = daycount - Number(400000);
  var daycount2 = Math.round((nowtimes - thentime) / (10));
  daycount2 = daycount2 - Number(10000000)
  document.getElementById("count1").setAttribute('data-start' , daycount);
  document.getElementById("count1").setAttribute('data-end' , Number(daycount)+Number(getRandomArbitrary(25,50)));
  document.getElementById("count1").innerHTML = formatN(daycount);
  document.getElementById("count2").setAttribute('data-start' , daycount2);
  document.getElementById("count2").setAttribute('data-end' , Number(daycount2)+Number(getRandomArbitrary(100,500)));
  document.getElementById("count2").innerHTML = formatN(daycount2);
  document.addEventListener("DOMContentLoaded", () => {
    function counter(id, start, end, duration) {
        let obj = document.getElementById(id),
        current = start,
        range = end - start,
        increment = end > start ? 1 : -1,
        step = Math.abs(Math.floor(duration / range)),
        timer = setInterval(() => {
        current += increment;
        obj.textContent = formatN(current);

        if (current == end) {
            document.getElementById(id).setAttribute('data-start' , end);
            if(id == 'count1'){
                document.getElementById(id).setAttribute('data-end' , Number(end)+Number(getRandomArbitrary(25,50)));
            }
            if(id == 'count2'){
                document.getElementById(id).setAttribute('data-end' , Number(end)+Number(getRandomArbitrary(100,500)));
            }

            clearInterval(timer);
        }
        }, step);
    }
    setInterval(function(){
        var count1_1 = document.getElementById("count1").getAttribute('data-start');
        var count1_2 = document.getElementById("count1").getAttribute('data-end');
        var count2_1 = document.getElementById("count2").getAttribute('data-start');
        var count2_2 = document.getElementById("count2").getAttribute('data-end');
        counter("count1", Number(count1_1), Number(count1_2), 3000);
        counter("count2", Number(count2_1), Number(count2_2), 100);
    },6000);

});



var newsTData=Array("Just watch reels earn money...",  "Free Register start daily earning...", "Instant withdraw your income...", "Free earn Rs.50 per day...", "You went more earning upgrade level...", "Refer friends earn lots of income.");
var cursor="_"; // set cursor
var delay=5; // seconds between each news itemNo
var newsp, cursp, flash, itemNo=0;
if (typeof('addRVLoadEvent')!='function') function addRVLoadEvent(funky) {
  var oldonload=window.onload;
  if (typeof(oldonload)!='function') window.onload=funky;
  else window.onload=function() {
	if (oldonload) oldonload();
	funky();
  }
}

addRVLoadEvent(teleprint);

function teleprint () { if (document.getElementById) {
	var span=document.getElementById("newsTxt");
	while (span.childNodes.length) span.removeChild(span.childNodes[0]);
	delay*=1000;
	newsp=document.createElement("span");
	cursp=document.createElement("span");
	cursp.appendChild(document.createTextNode(String.fromCharCode(160)+cursor));
	span.appendChild(newsp);
	span.appendChild(cursp);
	ticker();
}}

function ticker() {
	var i;
	while (newsp.childNodes.length) newsp.removeChild(newsp.childNodes[0]);
	newsp.appendChild(document.createTextNode(newsTData[itemNo].substring(0,1)));
	for (i=1; i<newsTData[itemNo].length; i++) setTimeout('newsp.firstChild.nodeValue="'+newsTData[itemNo].substring(0, i+1)+'"', 100*i);
	if (newsTData[itemNo].indexOf("www")!=-1) setTimeout('linkit('+itemNo+')', 100*i);
	setTimeout('flash=setInterval("cursp.style.visibility=(cursp.style.visibility==\'visible\')?\'hidden\':\'visible\'", 234)', 100*i)
	setTimeout('clearInterval(flash)', delay);
	setTimeout('cursp.style.visibility="visible"', delay);
	setTimeout('ticker()', delay);
	itemNo=++itemNo%newsTData.length;
}

function linkit(q) {
	var a,p,e,l;
	p=newsTData[q].indexOf("www");
	e=newsTData[q].indexOf(" ", p);
	if (e==-1) e=newsTData[q].length;
	l=newsTData[q].substring(p, e);
	while (newsp.childNodes.length) newsp.removeChild(newsp.childNodes[0]);
	newsp.appendChild(document.createTextNode(newsTData[q].substring(0, p)));
	a=document.createElement("a");
	a.href="http://"+l;
	a.appendChild(document.createTextNode(l));
	newsp.appendChild(a);
	newsp.appendChild(document.createTextNode(newsTData[q].substring(e)));
}
$(document).ready(function () {	
	
});
