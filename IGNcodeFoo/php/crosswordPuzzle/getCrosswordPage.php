<?php
function getCrosswordHeader()
{
	echo "\t" . '<h3>Crossword Generator</h3>' . "\n" . 
	     "\t" . '<p>Click <a href = "cwExplain.html" target = "_blank">here</a> for program explanation.</p><br>' . "\n";
}
function createInputForm()
{
	echo "\t" . '<p>"Loose" will generate a crossword-type puzzle where parallel words cannot lay directly next to each other.</p>' . "\n" .
		 "\t" . '<p>"Tight" will generate a wordsearch-type puzzle where words can lay and start/end next to each other.</p><br>' . "\n" .
	     "\t" . '<p>List of words: (words must be seperated by commas, spaces will be ignored, no numbers or special characters)</p>' . "\n" .
		 "\t" . '<form id = "cwForm" name = "cwInput" action = "php/crosswordPuzzle/createCrossword.php" method = "post" accept-charset = "UTF-8">' . "\n" . 
		 "\t\t" . 
		 "\t\t" . '<textarea id = "cwTextArea" name = "wordList" maxlength = "1000" placeholder = "word, word, word, word"></textarea>' . "\n" .
		 "\t\t" . '<div id = "cwRadios"><br><input class = "radio" type = "radio" name = "cwType" value = "1" checked><label>Loose</label><br><br>' . "\n" .
		 "\t\t" . '<input class = "radio" type = "radio" name = "cwType" value = "0"><label>Tight</label></div>' . "\n" .
		 "\t\t" . '<button id = "cwIGNWordsButton" type = "button">Load IGN Words</button>' . "\n" . 
		 "\t\t" . '<button id = "cwMyWordsButton" type = "button">Load My Words</button>' . "\n" .  
		 "\t\t" . '<p id = "cwTextAreaError"></p>' . "\n" .
		 "\t\t" . '<button id = "cwSubmit" type = "button">Generate Crossword</button>' . "\n" . 
		 "\t" . '</form>' . "\n" .
		 "\t" . '<div id = "crosswordResult"></div>' . "\n";
}
function getCrosswordPage()
{
	getCrosswordHeader();
	createInputForm();
}
?>