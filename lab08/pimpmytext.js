function Helloing() {
	if(!$('Atextarea').style.fontSize)
		$('Atextarea').style.fontSize = '12pt';
	$('Atextarea').style.fontSize = parseInt($('Atextarea').style.fontSize.split("pt")[0]) + 2 + "pt";
	timerId = setInterval(Helloing, 500);
}
function onChange() {
	if($("Bling").checked){
		$("Atextarea").style.fontWeight = "bold";
		$("Atextarea").style.color = "green";
		$("Atextarea").style.textDecoration = "underline";
	}
	else{
		$("Atextarea").style.fontWeight = "normal";
	}
}
function Sprite() {
	var result = $('Atextarea').value.split('.');
	$('Atextarea').value = result.join('-izzle.');
}