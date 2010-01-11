Calculator[Calculator_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Calculator_view, 'view_' + Calculator_window.id, Calculator_window);
	}
}

/**
 * Calculator Functions
 */
function addChar(input, character) {
	if(input.val() == null || input.val() == "0") {
		input.val(character);
	} else {
		input.val(input.val() + character);
	}
}
function cos(input) {
	input.val(Math.cos(input.val()));
}
function sin(input) {
	input.val(Math.sin(input.val()));
}
function tan(input) {
	input.val(Math.tan(input.val()));
}
function sqrt(input) {
	input.val(Math.sqrt(input.val()));
}
function ln(input) {
	input.val(Math.log(input.val()));
}
function exp(input) {
	input.val(Math.exp(input.val()));
}
function deleteChar(input) {
	input.val(input.val().substring(0, input.val().length - 1));
}
function changeSign(input) {
	if(input.val().substring(0, 1) == "-")
		input.val(input.val().substring(1, input.val().length));
	else
		input.val("-" + input.val());
}
function compute(input) {
	input.val(eval(input.val()));
}
function square(input) {
	input.val(eval(input.val()) * eval(input.val()));
}
function checkNum(str) {
	for (var i = 0; i < str.length; i++) {
		var ch = str.substring(i, i+1)
		if (ch < "0" || ch > "9") {
			if (ch != "/" && ch != "*" && ch != "+" && ch != "-" && ch != "."
				&& ch != "(" && ch!= ")") {
				alert("invalid entry!")
				return false
				}
			}
		}
		return true
}