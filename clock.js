history.pushState(null, null, location.href);
window.onpopstate = function () {
	history.go(1);
};
var name = sessionStorage.getItem("user");
document.getElementById("team").innerHTML = name;
var countDownDate = new Date("Dec 22, 2019 11:00:00").getTime();
var x = setInterval(TimeRemaing, 1000);
var diff = 0;
function TimeRemaing() {
	var now = new Date().getTime();
	var distance = countDownDate - now;
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	diff = distance;
	if (distance > 0) {
		ChangeText(days, hours, minutes, seconds);
	}
	else {
		ActivateLink()
	}
	var click = document.getElementById("click");
}

function ChangeText(days, hours, minutes, seconds) {
	document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
}


function ActivateLink() {
	clearInterval(x);
	window.alert("Session Started");
	console.log("passing");
	ChangeText(0, 0, "00", "00");
	document.getElementById("linker").style.opacity = "1";
	document.getElementById("linker").style.cursor = "default";
	console.log("passed");
}


function clicked() {
	if (diff > 0)
		window.alert("Session Error");
	else {
		location.replace("https://www.google.com");
	}

}