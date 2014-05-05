<?php
function getGamersPage(){
	echo "\t" . '<p><strong>How many gamers are in the San Francisco Bay Area? Describe each step in your thought process.</strong></p><br>' . "\n" .
		 "\t" . '<p><strong>Step One:</strong> Find the current population of the San Francisco Bay Area.</p>' . "\n" .
		 "\t" . '<p>The Bay Area includes Alameda, Contra Costa, Marin, Napa, San Francisco, San Mateo, Santa Clara, Solano, and Sonoma counties and their respective cities.  
		         According to the United States Census information, the San Francisco Bay Area had an official population of 7,150,739 in 2010.  
		         They estimate that in 2013 there was a total population of 7,438,456.
		         <sup><a href = "http://www.census.gov/popest/data/counties/totals/2013/CO-EST2013-01.html" target = "_blank">[1]</a>
		         <a href = "http://en.wikipedia.org/wiki/San_Francisco_Bay_Area#Demographics" target = "_blank">[2]</a></sup></p><br>' . "\n" .
		 "\t" . '<p>The predicted total growth change from 2010 to 2013 is 4.023598%.  If the growth rate from 2010 to 2013 (4.023598%) stays constant, 
		         then I can assume that from 2010 to 2020 the total growth change will be 13.611264%.   
		         Finding this is important to ensure that 13.611264% is close to previous decade markers and not an outlier. 
		         The population growth markers at 1980 (11.9%), 1990 (16.3%), and (12.6%) show that 13.611264% is close.
		         <sup><a href = "http://www.census.gov/popest/data/counties/totals/2013/CO-EST2013-01.html" target = "_blank">[1]</a>
		         <a href = "http://en.wikipedia.org/wiki/San_Francisco_Bay_Area#Demographics" target = "_blank">[2]</a></sup></p><br>' . "\n" .
		 "\t" . '<p>I will now explain how to calculate the population in the Bay Area from 2010 to the END of May 5<sup>th</sup>, 
		 		 2014 based upon the 4.023598% per 3 years growth rate.  
		 		 To find this I will need the growth rate per year and then the growth rate per day using:</p><br>' . "\n" .
		 "\t" . '<p>rate = (((Pop<sub>present</sub> – Pop<sub>past</sub>) ÷ Pop<sub>past</sub>) x 100) ÷ n</p><br>' . "\n" .
		 "\t" . '<p>4.023598% to a yearly rate: ~1.341199% per year</p>' . "\n" .
		 "\t" . '<p>That means the population in 2011 was 7,246,645</p>' . "\n" .
		 "\t" . '<p>1.341199% to a daily rate: ~0.003675% per day</p>' . "\n" .
		 "\t" . '<p>May 5<sup>th</sup>, 2014 minus January 1<sup>st</sup>, 2010 (including the 2012 leap year): 1585 days</p><br>' . "\n" .
		 "\t" . '<p>Now we will need to use the compound interest formula to find the population after 1585 days at a 0.003675% per day rate.</p><br>' . "\n" .
		 "\t" . '<p>Pop<sub>present</sub> = Pop<sub>past</sub> x (1.0 + rate)<sup>n</sup></p><br>' . "\n" .
		 "\t" . '<p>7,150,739 × (1.0 + 0.003675%)<sup>1585</sup> = 7579622.4.</p><br>' . "\n" .
		 "\t" . '<p>The population at the end of May 5<sup>th</sup>, 2014 is thus 7,579,622 people.</p><br>' . "\n" .
		 
		 "\t" . '<p><strong>Step Two:</strong> Find how many gamers are of that population.</p>' . "\n" .
		 "\t" . '<p>According to the Entertainment Software Association (ESA), 58% of Americans played video games in 2013.
		 		 <sup><a href = "http://www.theesa.com/facts/" target = "_blank">[3]</a>
		 		 <a href = "http://www.theesa.com/facts/pdfs/esa_ef_2013.pdf" target = "_blank">[4]</a></sup>  
		         According to Entertainment Software Rating Board (ESRB), 67% of US households played video games in 2010.
		         <sup><a href = "http://www.esrb.org/about/video-game-industry-statistics.jsp" target = "_blank">[5]</a></sup>  
		         The NPD Group said that 91% of children between the ages of 2 and 17 played video games in 2010.
		         <sup><a href = "http://www.cnet.com/news/91-percent-of-kids-are-gamers-research-says/" target = "_blank">[6]</a></sup>  
		         Since the ESA is the only one to provide a statistic to cover the overall population, I will use that one.  
		         I will assume this number has not fluctuated since 2013.</p><br>' . "\n" .
		 "\t" . '<p>Using this number I can roughly estimate the gamer population in the Bay Area.</p>' . "\n" .
		 "\t" . '<p>58% of 7,579,622 people: <strong><u>4,396,181 people are gamers in the Bay Area.</u></strong></p><br>' . "\n" .
		 "\t" . '<p>Something else to consider:  The San Francisco Bay Area has a significant population that works in technology
		         and thus would probably have a higher gamer population as compared to the national average.  
		         Without any solid numbers though, I cannot implement that.</p><br>' . "\n" .
		 "\t" . '<p>Sources: <a href = "http://www.census.gov/popest/data/counties/totals/2013/CO-EST2013-01.html" target = "_blank">[1]</a>, ' . "\n" .
		 "\t" . '<a href = "http://en.wikipedia.org/wiki/San_Francisco_Bay_Area#Demographics" target = "_blank">[2]</a>, ' . "\n" .
		 "\t" . '<a href = "http://www.theesa.com/facts/" target = "_blank">[3]</a>, ' . "\n" .
		 "\t" . '<a href = "http://www.theesa.com/facts/pdfs/esa_ef_2013.pdf" target = "_blank">[4]</a>, ' . "\n" .
		 "\t" . '<a href = "http://www.esrb.org/about/video-game-industry-statistics.jsp" target = "_blank">[5]</a>, ' . "\n" .
		 "\t" . '<a href = "http://www.cnet.com/news/91-percent-of-kids-are-gamers-research-says/" target = "_blank">[6]</a></p>';
		
}
?>
