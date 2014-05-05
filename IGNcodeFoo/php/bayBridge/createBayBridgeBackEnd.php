<?php
	require_once 'lib/bridge.class.php';
	require_once 'lib/car.class.php';
	
	function readInput()
	{
		//get input from ajax
		$laneInput = $_REQUEST['beLaneInput'];
		$laneOutput = $_REQUEST['beLaneOutput'];
		$numCars = $_REQUEST['beNumCars'];
		
		//test input
		if(!preg_match('/^[0-9]+$/', $laneInput) || !preg_match('/^[0-9]+$/', $laneOutput) || !preg_match('/^[0-9]+$/', $numCars)
		 || preg_match('/^0/', $laneInput) || preg_match('/^0/', $laneOutput) || preg_match('/^0/', $numCars)
		 || $laneInput > 100 || $laneOutput > 100 || $numCars > 100
		 || $laneInput < $laneOutput + 1)
		{
			//if intput fails, return 0
			return 0;
		}
		
		//return input
		return array($laneInput, $laneOutput, $numCars);
	}
	
	function createBridgeBE()
	{
		//get input
		$input = readInput();
		
		//if input fails, output error message
		if($input == 0)
		{
			echo '<p class = "failed">Calculation failed. Check your input for errors.</p>';
			return;
		}
		
		//make new bridge
		$bridgeBE = new Bridge();
		//make new car
		$car = new Car();
		
		//set bridge to input
		$bridgeBE->setBridge($input[0], $input[1]);
		//find the bridge's que structure
		$laneQueStruction = $bridgeBE->getQueStructure();
		//get number of cars from input
		$numCars = $input[2];
		//calculate total cars on bridge
		$totalCars = $numCars * $input[0];
		
		echo '<p>Total number of cars: ' . $totalCars . '.</p>';
		
		//pring out bridge information
		$bridgeBE->printBridge();
		
		//time for car to reach 50mph
		$timeToFullSpeed = $car::MAX_SPEED / $car::ACCERLERATION;
		//ditsance car traveled during acceleration to 50mph
		$distanceCoveredByFullSpeed = (1.0/2.0) * $car::ACCERLERATION * pow($timeToFullSpeed, 2);
		//time to travel the rest of the bridge at 50mph
		$timeToTravelRoadAtFullSpeed = ($bridgeBE::ROAD_LENGTH - $distanceCoveredByFullSpeed) / $car::MAX_SPEED;
		
		//find largest lane in que structure
		for($i = 0; $i < count($laneQueStruction); $i++)
		{
			if($i == 0)
			{
				$largestQue = $laneQueStruction[$i];
			}
			else 
			{
				if($largestQue < $laneQueStruction[$i])
					$largestQue = $laneQueStruction[$i];
			}
		}
		
		//time it takes to travel the equivalent of once car length
		$timeToCarLength = sqrt($car::CAR_LENGTH / ((1.0/2.0) * $car::ACCERLERATION));
		//time for all cars to reach max speed
		$timeForAllCarsToReachMaxSpeed = $timeToCarLength * $numCars * $largestQue;
		//total time it till take for all cars to travel the bridge
		$timeToTravelRoad = $timeForAllCarsToReachMaxSpeed + $timeToTravelRoadAtFullSpeed;
		
		echo '<p>It will take a minimun time of ' . round($timeToTravelRoad, 2) . ' seconds for all cars to traverse the bridge.</p>';
		
		//time it takes to travel the minimun safe following distance
		$timeToSafeDistance = sqrt($car::SAFE_DISTANCE / ((1.0/2.0) * $car::ACCERLERATION));
		//time for all cars to reach max speed
		$timeForAllCarsToReachMaxSpeed = $timeToSafeDistance * $numCars * $largestQue;;
		//total time it till take for all cars to travel the bridge
		$timeToTravelRoad = $timeForAllCarsToReachMaxSpeed + $timeToTravelRoadAtFullSpeed;
		
		echo '<p>It will take ' . round($timeToTravelRoad, 2) . ' seconds for all cars to traverse the bridge at the minimun safe following distance.</p>';
	}
	
	createBridgeBE();
?>