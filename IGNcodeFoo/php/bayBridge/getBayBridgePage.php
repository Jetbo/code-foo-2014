<?php
	function getSectionA()
	{
		echo "\t" . '<h3 class = "lineBreak"><span>Section A - Everyone</span><hr /></h3>' . "\n" . 
			 "\t" . '<p><strong>Explain your thought process for the following: </strong></p>' . "\n" .
			 "\t" . '<p><strong>1. How many vehicles cross the bridge, daily, towards San Francisco?</strong></p>' . "\n" .
			 "\t" . '<p>The best way to find this is to figure out how many cars pass the San Francisco-Oakland Toll Plaza. 
			 		While all the cars that pass the toll plaza are technically heading towards San Francisco, 
			 		some of the cars could get off at Treasure Island. As a result, we should subtract the cars that get off there.</p><br>' . "\n" .
			 "\t" . '<p>Wikipedia claims that about 240,000 vehicles per day, but links to very vague sources and refers to the whole bridge.
			 		<a href = "http://en.wikipedia.org/wiki/San_Francisco%E2%80%93Oakland_Bay_Bridge" target = "_blank"><sup>[1]</sup></a>  
			 		I found a Bloomberg News video from 2012 that claims about 270,000 vehicles cross the bridge per day, but also refers to the whole bridge.
			 		<a href = "http://youtu.be/R0KkzThuj9c" target = "_blank"><sup>[2]</sup></a></p><br>' . "\n" .
			 "\t" . '<p>Looking at the California’s DOT website, they list estimated traffic volumes at various mile markers. 
			 		In 2012 they estimated that 241,000 vehicles pass the SF-Oakland Toll Plaza in both directions per day. 
			 		They also estimated that there are 242,000 vehicles to the immediate west Treasure Island and 240,000 to the immediate east.  
			 		That could mean at least 100 cars heading west could get off at Treasure Island because there are no other exits between the toll plaza 
			 		and Treasure Island. This also means 0 to 200 cars could be getting on the bridge heading west, 
			 		but it could also mean that 0 to 200 cars could be getting off at Treasure Island when heading east. 
			 		They also state that the total traffic per year has not fluctuated more than +-1.1% since 2008 so I will use the 2012 numbers.
			 		<a href = "http://traffic-counts.dot.ca.gov/2012TrafficVolumes.pdf" target = "_blank"><sup>[3]</sup></a></p><br>' . "\n" .
			 "\t" . '<p>Looking at the Bay Area Toll Authority’s website, they list that from 2012 to 2013, 45,071,936 cars paid the toll.  
			 		Since the toll plaza only tolls cars that head west, that means there were about 123,147 cars heading towards San Francisco per day.   
			 		(It is not 123,484 because 2012 was a leap year)
					<a href = "http://bata.mtc.ca.gov/bridges/sf-oak-bay.htm" target = "_blank"><sup>[4]</sup></a> 
			 		There are no numbers available for the 2013-2014 year so I will have to use these.  
			 		We know that per day, at least 100 cars got off at Treasure Island 
			 		and 0-200 cars could have gotten onto the bridge heading west.  
			 		Since we don’t know which of the 200 cars got on heading west or could have gotten off heading east, 
			 		I will just divide it evenly over the different directions.  
			 		That means the number 123,147 would not change since the cars getting off at Treasure Island 
			 		and the cars getting on the bridge would cancel each other out.  
			 		<a href = "http://traffic-counts.dot.ca.gov/2012TrafficVolumes.pdf" target = "_blank"><sup>[3]</sup></a></p><br>' . "\n" .
			 "\t" . '<p><strong><u>123,147 vehicles cross the bridge, daily, towards San Francisco.</u></strong></p><br>' . "\n" .
			 "\t" . '<p><strong>2. How many people does this translate to?</strong></p>' . "\n" .
			 "\t" . '<p>According to US Department of Transportation’s 2009 National Household Travel Survey, the average vehicle occupancy for 2009 was 1.67.
			         This number hasn’t fluctuated much since 1983, so I will use 1.67.
			         <sup><a href = "http://nhts.ornl.gov/2009/pub/stt.pdf" target = "_blank">[5]</a></sup></p>' . "\n" .
			 "\t" . '<p>123,147 × 1.67 = <strong><u>205,655 people cross the bridge, daily, towards San Francisco.</u></strong></p><br>' . "\n" .
			 "\t" . '<p><strong>3. How many gamers make the crossing?</strong></p>' . "\n" .
			 "\t" . '<p>Taking the gamer percentage from the "Gamers in Bay Area" section…
			 		 <sup><a href = "http://www.theesa.com/facts/" target = "_blank">[6]</a></sup></p>' . "\n" .
			 "\t" . '<p>205,655 × 58% = <strong><u>119,280 gamers cross the bridge, daily, towards San Francisco.</u></strong></p><br>' . "\n" .
			 "\t" . '<p>Sources: <a href = "http://en.wikipedia.org/wiki/San_Francisco%E2%80%93Oakland_Bay_Bridge" target = "_blank">[1]</a>, ' . "\n" .
			 "\t" . '<a href = "http://youtu.be/R0KkzThuj9c" target = "_blank">[2]</a>, ' . "\n" .
			 "\t" . '<a href = "http://traffic-counts.dot.ca.gov/2012TrafficVolumes.pdf" target = "_blank">[3]</a>, ' . "\n" .
			 "\t" . '<a href = "http://bata.mtc.ca.gov/bridges/sf-oak-bay.htm" target = "_blank">[4]</a>, ' . "\n" .
			 "\t" . '<a href = "http://nhts.ornl.gov/2009/pub/stt.pdf" target = "_blank">[5]</a>, ' . "\n" .
			 "\t" . '<a href = "http://www.theesa.com/facts/" target = "_blank">[6]</a></p><br>' . "\n";	 
	}
	function getSectionB()
	{
		echo "\t" . '<h3 class = "lineBreak"><span>Section B - Front End</span><hr /></h3>' . "\n" . 
			 "\t" . '<p>Click <a href = "feExplain.html" target = "_blank">here</a> for program explanation.</p><br>' . "\n" . 
			 "\t" . '<div id = "mapWrapper"><button id = "feZoomIn" type = "button">Zoom In</button>' . "\n" .  
			 "\t" . '<button id = "feZoomOut" type = "button">Zoom Out</button>' . "\n" .
			 "\t" . '<button id = "feZoomReset" type = "button">Reset</button>' . "\n" .
			 "\t" . '<div id = "svgWrapper"><svg id = "map" viewBox = "0 0 1206 315"></svg></div></div>' . "\n";
	}
	function getSectionC()
	{
		echo "\t" . '<h3 class = "lineBreak" id = "afterMap"><span>Section C - Back End</span><hr /></h3>' . "\n" . 
			 "\t" . '<p>Click <a href = "beExplain.html" target = "_blank">here</a> for program explanation.</p><br>' . "\n" . 
			 "\t" . '<form id = "beForm" name = "beForm" action = "php/bayBridge/createBayBridgeBackEnd.php" method = "post" accept-charset = "UTF-8">' . "\n" . 
			 "\t\t" . '<span class = "beNumWrapper"><label>Incoming Lanes: </label><input class = "beNumber" id = "beLaneIn" type = "number" max = "100" name = "beLaneInput" value = "16"></span>' . "\n" .
			 "\t\t" . '<span class = "beNumWrapper"><label>Outgoing Lanes: </label><input class = "beNumber" id = "beLaneOut" type = "number" max = "100" name = "beLaneOutput" value = "5"></span>' . "\n" .
			 "\t\t" . '<span class = "beNumWrapper"><label>Cars Per Lane: </label><input class = "beNumber" id = "beCars" type = "number" max = "100" name = "beNumCars" value = "4"></span>' . "\n" .
			 "\t\t" . '<button id = "beResetButton" type = "button">Reset to Default</button>' . "\n" . 
			 "\t\t" . '<button id = "beSubmit" type = "button">Calculate</button>' . "\n" .  
			 "\t" . '</form>' . "\n" . 
			 "\t" . '<div><p id = "beErrorRed"></p></div>' . "\n" . 
			 "\t" . '<div><p id = "beErrorYellow"></p></div>' . "\n" .
			 "\t" . '<div id = "beResult"></div>' . "\n";
	}
	function getSectionD()
	{
		echo "\t" . '<h3 class = "lineBreak" id = "afterBe"><span>Section D - Database/API</span><hr /></h3>' . "\n" . 
			 "\t" . '<p>I decided to work on the other projects over this</p><br>' . "\n";
	}
	function getSectionE()
	{
		echo "\t" . '<h3 class = "lineBreak"><span>Section E - Bonus</span><hr /></h3>' . "\n" . 
			 "\t" . '<p><strong>A driver has gained access to a <a href="http://www.ign.com/articles/2014/03/06/watch-dogs-release-date-leaked-in-trailer" target = "_blank">Watch Dogs</a>
			         type device that allows them control over the metering lights. Assuming the driver wishes to maintain his 50mph cruising speed throughout, 
			         and assuming we want to allow access to the lights, describe all the assumptions that should be made. 
			         For example, assume the lights are wi-fi and therefore have infinite device range.</strong></p><br>' . "\n" .
			 "\t" . '<p>This idea is basically how the Fastrak system works.</p><br>' . "\n" .
			 "\t" . '<p>The assumptions that would have to be made for this to happen are:</p>' . "\n" .
			 "\t" . '<ul>' . "\n" .
			 "\t\t" . '<li>The driver would have to be traveling in an entirely clear lane.  
			           Otherwise, the driver would have to slow down and/or stop behind other vehicles at the light. (or in general traffic)</li>' . "\n" .
			 "\t\t" . '<li>The driver would have to stop all other vehicles from entering the driver\'s merge section by turning all their lights to red until the driver passes.</li>' . "\n" .
			 "\t\t" . '<li>The driver would probably set the device up to automatically trigger.  
			           Otherwise, the driver would probably slow down due to being distracted by having to open a device and run the command.</li>' . "\n" .
			 "\t\t" . '<li>The driver would have to travel in one of the north two HOV lanes on the bridge so the driver wouldn’t have to stop or slow at the Toll Plaza.</li>' . "\n" .
			 "\t" . '</ul><br>' . "\n";
	}
	function getBayBridgePage()
	{
		getSectionA();
		getSectionB();
		getSectionC();
		getSectionD();
		getSectionE();
	}
?>