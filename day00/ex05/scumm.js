var chair = document.getElementById("chair");
var monitor = document.getElementById("monitor");
var cluster = document.getElementById("cluster");
var chat = document.getElementsByClassName("chat")[0];
var loop = document.getElementById("search");
var day42 = document.getElementById("day42");
var newChild = 0;

var handFlag = false;
var loopFlag = false;

document.getElementById("day42").addEventListener("click", () => {
	day42.classList.toggle("swipe");
});

document.getElementById("search").addEventListener("click", () => {
	if (handFlag) {
		loopFlag = true;
		loop.classList.toggle("find-item");
	}
});

document.getElementById("advance").addEventListener("click", () => {
	cluster.classList.toggle("resize");
});

document.getElementById("take").addEventListener("click", () => {
	if (!handFlag) {
		handFlag = true;
		alert("Now you can use loop!");
	}
});

document.getElementById("find-loop").addEventListener("click", () => {
	if (loopFlag) {
		handFlag = false;
		loopFlag = false;
		loop.classList.toggle("find-item-done");
		alert("YOU WIN!");
	}
});

document.getElementById("look").addEventListener("click", () => {
	chair.classList.toggle("red-border");
	monitor.classList.toggle("red-border");
	alert("Now the border of chair and monitor is red!");
});

document.getElementById("use").addEventListener("click", () => {
	for (var i = 0; i < newChild; i++) {
		chat.removeChild(chat.lastChild);
	}
	newChild = 0;
});

document.getElementById("speak").addEventListener("click", () => {
	chat.classList.toggle("display-chat");
});

document.getElementById("respond-button").addEventListener("click", () => {
	let responseText = document.getElementById("response-input").value;
	document.getElementById("response-input").value = "";

	if (responseText === "")
		return ;
	let response = document.createElement("p");

	response.innerHTML = `- ${responseText}`;
	response.classList.add("response");
	chat.appendChild(response);
	newChild += 1;
});
