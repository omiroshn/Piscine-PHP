$(document).ready(function() {
	var todoList = [];
	var cookieName = "todoList=";
	var cookieIndex = document.cookie.indexOf(cookieName);

	if (cookieIndex >= 0) {
		var cookieValue = document.cookie.substring(cookieIndex + cookieName.length);

		if (cookieValue !== "") {
			todoList = cookieValue.split(",");
			todoList.forEach(function(text) {
				$("#ft_list").prepend($("<div></div>").text(text).click(deleteTodo));
			});
		}
	}

	function deleteTodo() {
		if (confirm("Do you want to DELETE it?")) {
			todoList.splice(todoList.indexOf($(this).html()), 1);
			document.cookie = "todoList=" + todoList.join();
			$(this).remove();
		}
	}

	$("#add").click(function() {
		var text = window.prompt("Please enter your task", "");

		if (text !== null && text !== "") {
			todoList.push(text);
			document.cookie = "todoList=" + todoList.join();
			$("#ft_list").prepend($("<div></div>").text(text).click(deleteTodo));
		}
	})
})