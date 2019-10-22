$(".btn btn-success").click(fucntion()){
	var $keyword = $(this).closest("tr");
	var $keyword = $keyword.find(".search").text();
	windows.location.href = "../accommodationList.php?id="+$keyword;
}
