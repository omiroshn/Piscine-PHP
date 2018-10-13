$(document).ready(function() {

	function deleteTodo() {
		if (confirm("Do you want to DELETE it?")) {
			var id = $(this).attr("id");
			
			$.get("delete.php?id=" + id);
			$(this).remove();
		}
	}

	function insertToTodoList(data) {
		var idText = data.split(";");
		$("#ft_list").prepend($("<div></div>").text(idText[1]).click(deleteTodo).attr("id", idText[0]));
	}

	$("#add").click(function() {
		var taskText = window.prompt("Please enter your task", "");

		if (taskText !== null && taskText !== "") {
			$.get("insert.php?todo=" + taskText, function(data) {
				insertToTodoList(data);
			})
		}
	})

	$.get("select.php", function(todoString, status) {
		if (todoString !== "") {
			var todoList = todoString.split("\n");

			todoList.pop();
			todoList.forEach(function(data) {
				insertToTodoList(data);
			});
		}
	})

})
