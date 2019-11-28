/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
	$('start').observe('click',startClick);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
	$('status').innerHTML = 'you lose!:(';
	$$(".boundary").each(function(element){element.addClassName("youlose")});
	alert('you lose!:(');
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	$$(".boundary").each(function(element){element.removeClassName("youlose")});
	$('status').innerHTML = 'Click the "S" to begin.';
	$$(".boundary").each(function(element){element.observe("mouseover",overBoundary)});
	$('end').observe('click',overEnd);
	document.body.observe('click',overBody);
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	$('status').innerHTML = 'you win!:)';
	alert("you win!:)");
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	$('status').innerHTML = 'you lose!:(';
	$$(".boundary").each(function(element){element.addClassName("youlose")});
	alert('you lose!:(');
}



