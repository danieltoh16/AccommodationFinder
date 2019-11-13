$(".btn btn-success").click(fucntion()){
	var $keyword = $(this).closest("tr");
	var $keyword = $keyword.find(".room").text();
	windows.location.href = "../bookARoom.php?id="+$keyword;
}
