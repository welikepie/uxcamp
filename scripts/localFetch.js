updateData();

function updateData() {

	if (document.getElementsByClassName("headcount") != undefined) {
		var headCount = document.getElementsByClassName("headcount");
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST", "backend/display.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				for (var j in headCount) {
					if (j < headCount.length) {
						//console.log("successful");
						headCount[j].innerHTML = "";
						var data = JSON.parse(JSON.parse(xmlhttp.responseText));
						if (j % 2 == 0) {
							for (var i = 0; i < data.length; i++) {
								var list = document.createElement("li");
								list.textContent = data.data[i];
								headCount[j].appendChild(list);
							}
						} else {
							for (var i = data.length - 1; i >= 0; i--) {
								var list = document.createElement("li");
								list.textContent = data.data[i];
								headCount[j].appendChild(list);
							}
						}
					}
				}
			}
		};
	} else {
		console.log("#headcount not found.");
	}

}
