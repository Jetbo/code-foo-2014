<?php
require_once 'getIntroPage.php';
require_once 'getGamersPage.php';
require_once 'crosswordPuzzle/getCrosswordPage.php';
require_once 'bayBridge/getBayBridgePage.php';
require_once 'getGamePage.php';
require_once 'getOtherPage.php';

function getHeader()
{
	echo '<!DOCTYPE html>' . "\n" .
		 '<html lang = "en">' . "\n" .
	     '<head>' . "\n" . 
		 "\t" . '<meta charset = "utf-8" />' . "\n" . 
		 "\t" . '<meta name = "viewport" initial-scale="1.0" />' . "\n" . 
		 "\t" . '<link rel = "stylesheet" href = "css/reset.css" />' . "\n" . 
		 "\t" . '<link rel = "stylesheet" href = "css/style.css" />' . "\n" . 
		 "\t" . '<link rel = "stylesheet" href = "css/crossword.css" />' . "\n" . 
		 "\t" . '<link rel = "stylesheet" href = "css/bridge.css" />' . "\n" . 
		 "\t" . '<link href = "http://fonts.googleapis.com/css?family=Press+Start+2P" rel = "stylesheet" type = "text/css">' . "\n" . 
		 "\t" . '<link href="http://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet" type="text/css">' . "\n" . 
		 "\t" . '<title>Adam Sligar - IGN Code Foo 2014</title>' . "\n\n" .
		 "\t" . '<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>' . "\n" . 
		 "\t" . '<script src = "js/snap.svg-min.0.2.0.js"></script>' . "\n" . 
		 "\t" . '<script src = "js/phaser.min.js"></script>' . "\n" . 
		 "\t" . '<script src = "js/mousewheel.js"></script>' . "\n" . 
		 "\t" . '<script src = "js/map.snap.js"></script>' . "\n" . 
		 "\t" . '<script src = "js/game.js"></script>' . "\n" . 
		 "\t" . '<script src = "js/scripts.js"></script>' . "\n" . 
	     '</head>' . "\n";
}

function getBody()
{
	echo '<body>' . "\n" .
		 '<div id = "logo"><h1 id = "logoMe">Adam Sligar</h1><br>' . "\n" . 
		 '<h2 id = "fooContainer"><span id = "logoIGN">IGN </span><span id = "logoFoo"></span></h2></div>' . "\n" . 
		 '<div class = "container">' . "\n" .
		 '<div class = "flip" id = "flip1"><h2>Q1 - Intro Video<span id = "span1">+</span></h2></div>' . "\n" . 
		 '<div class = "panel" id = "panel1">' . "\n"; 
		 getIntroPage();
	echo '</div>' . "\n" . //end of panel1
		 '<div class = "flip" id = "flip2"><h2>Q2 - Gamers in Bay Area<span id = "span2">+</span></h2></div>' . "\n" . 
		 '<div class = "panel" id = "panel2">' . "\n";
		 getGamersPage();
	echo '</div>' . "\n" . //end of panel2
	     '<div class = "flip" id = "flip3"><h2>Q3 - Crossword<span id = "span3">+</span></h2></div>' . "\n" . 
		 '<div class = "panel" id = "panel3">' . "\n";
		 getCrosswordPage();
	echo '</div>' . "\n" . //end of panel3
	     '<div class = "flip" id = "flip4"><h2>Q4 - Bay Bridge<span id = "span4">+</span></h2></div>' . "\n" . 
		 '<div class = "panel" id = "panel4">' . "\n";
		 getBayBridgePage();
	echo '</div>' . "\n" . //end of panel4
	     '<div class = "flip" id = "flip5"><h2>Q5 - Game<span id = "span5">+</span></h2></div>' . "\n" . 
		 '<div class = "panel" id = "panel5">' . "\n";
		 getGamePage();
	echo '</div>' . "\n" . //end of panel5
	     '<div class = "flip" id = "flip6"><h2>Q6 - Other<span id = "span6">+</span></h2></div>' . "\n" . 
		 '<div class = "panel" id = "panel6">' . "\n";
		 getOtherPage();
	echo '</div>' . "\n" . //end of panel6
	     '</div>' . "\n" . //end of container
	     '</body>' . "\n"; //end of body
}

function getFooter()
{
	echo '</html>';
}

function getPage()
{
	getHeader();
	getBody();
	getFooter();
}
?>