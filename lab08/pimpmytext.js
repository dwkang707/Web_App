function hello() {
	var fSize = $("text").style.fontsize = "24pt";	
}


function hello2() {
	var check = document.getElementById('checked');
	var checkResult = check.getAttribute("checked");
	if (checkResult) {
		$("text").style.font-weight = "bold";
		$("text").style.color = "green";
	}
}