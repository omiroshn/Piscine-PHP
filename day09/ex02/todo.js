var container = document.getElementById("ft_list");
var todoList = [];
var cookieName = "todoList=";
var cookieIndex = document.cookie.indexOf(cookieName);

if (cookieIndex >= 0) {
	var cookieValue = document.cookie.substring(cookieIndex + cookieName.length);
	
	if (cookieValue !== "")
	{
		todoList = cookieValue.split(",");
		todoList.forEach(function(text) {
			var todo = document.createElement("div");
			todo.id = "ft_list";
			todo.innerHTML = text;
			container.insertBefore(todo, container.firstChild);
		});
	}
}

function add() {
	var text = window.prompt("Please enter your task", "");

	if (text !== null && text !== "") {
		todoList.push(text);
		document.cookie = "todoList=" + todoList.join();

		var todo = document.createElement("div");
		todo.id = "ft_list";
		todo.innerHTML = text;
		container.insertBefore(todo, container.firstChild);
	}
}

container.addEventListener("click", function(event) {
	if (confirm("Do you want to DELETE it?")) {
		todoList.splice(todoList.indexOf(event.target.innerHTML), 1);
		document.cookie = "todoList=" + todoList.join();
		container.removeChild(event.target);
	}
});
