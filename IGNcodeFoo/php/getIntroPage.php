<?php
function getIntroPage()
{
	echo "\t" . '<div id = "helloWorld"><h2>Hello World!</h2></div>' . "\n" .
		 "\t" . '<div id = "introVideo"><iframe width = "100%" height = "100%" src="//www.youtube.com/embed/bYC-2NerqN4?rel=0" frameborder="0" allowfullscreen></iframe></div>' . "\n" .
		 "\t" . '<div id = "browsers"><p>This site has been tested on the current versions of: </p>' . "\n" .
		 "\t" . '<img src = "img/browsers.png"></div>' . "\n";
}
?>