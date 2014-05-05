<?php
class Bridge
{
	private $numOfLanesInput, $numOfLanesOutput, $laneQueStructure;
	
	const ROAD_LENGTH = 482.803; //0.3miles or 1500ft or 482.803meters
	
	function __construct()
	{
		$this->numOfLanesInput = 16;
		$this->numOfLanesOutput = 5;
		$this->laneQueStructure = array(2, 3, 4, 3, 4);
	}
	
	function setBridge($laneInput, $laneOutput)
	{
		//resets laneQueStructure
		$this->laneQueStructure = array();
		
		//if default values are used, use actual lane structure
		if($laneInput == 16 && $laneOutput == 5){
			$this->numOfLanesInput = 16;
			$this->numOfLanesOutput = 5;
			$this->laneQueStructure = array(2, 3, 4, 3, 4);
		}	
		else{
			//set input and output
			$this->numOfLanesInput = $laneInput;
			$this->numOfLanesOutput = $laneOutput;
			
			if($laneOutput > 1){
				//find closest que numbers
				$lanesInQue = ($laneInput - 2) / ($laneOutput - 1);
				
				for($i = 0; $i < $laneOutput; $i++){
					//if it is the first que, set to 2
					if($i == 0){
						$this->laneQueStructure[$i] = 2;
						$laneInput = $laneInput - 2;
					}
					//if it is the last que, set to the remainder
					elseif($i == $laneOutput - 1){
						$this->laneQueStructure[$i] = $laneInput;	
						$laneInput = $laneInput - $laneInput;
					}
					//set to the closest que number (rounded down)
					elseif($laneInput > 0){
						$laneInput = $laneInput - floor($lanesInQue);
						$this->laneQueStructure[$i] = floor($lanesInQue);
					}
				}
				
				//if the last que number is larger than the previous que (due to rounding), redistribute evenly
				if(count($this->laneQueStructure) > 1 && $this->laneQueStructure[count($this->laneQueStructure) - 1] > $this->laneQueStructure[count($this->laneQueStructure) - 2]){
					for($j = 1; $j < count($this->laneQueStructure); $j++){
						if($this->laneQueStructure[count($this->laneQueStructure) - 1] > $this->laneQueStructure[count($this->laneQueStructure) - 2]){
							$this->laneQueStructure[$j] = $this->laneQueStructure[$j] + 1;
							$this->laneQueStructure[count($this->laneQueStructure) - 1] = $this->laneQueStructure[count($this->laneQueStructure) - 1] - 1;
						}
						else break;
					}
				}
			}
			//if there is only one output lane, set all input lanes to one que
			else{
				$this->laneQueStructure[0] = $laneInput;
			}
		}//end of else
	}
	
	//return que structure
	function getQueStructure()
	{
		return $this->laneQueStructure;
	}
	
	//print bridge information
	function printBridge()
	{
		echo '<p>Incoming: ' . $this->numOfLanesInput . '. Outgoing: ' . $this->numOfLanesOutput . '. ';
		echo 'Lane Merge Structure: (';
		for($i = 0; $i < count($this->laneQueStructure); $i ++){
			if($i != count($this->laneQueStructure) - 1){
				echo $this->laneQueStructure[$i] . ", ";
			}
			else echo $this->laneQueStructure[$i] . ').</p>';
		}
	}
}

/*
//TEST BLOCK
$bridge = new Bridge();
$bridge->setBridge(16, 5);
$bridge->printBridge();
//TEST BLOCK
*/

?>