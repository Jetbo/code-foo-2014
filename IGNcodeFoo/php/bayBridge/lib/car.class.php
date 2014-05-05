<?php
class Car
{
	private $car, $color, $laneIn, $laneOut, $day, $timeIn, $timeOut, $waitTimer;
	
	const MAX_SPEED = 22.352; //50.0mph or 22.352m/s
	const MIN_SPEED = 0.0; //0.0mph or 0.0m/s
	const ACCERLERATION = 3.048; //10ft/s squared or 3.048m/s squared
	const CAR_LENGTH = 4.572; //15ft or 4.572m
	const SAFE_DISTANCE = 55.88; //2.5seconds of time to stop is 55.88m
	
	function __construct()
	{
		$this->car = array();
	}
	
	function setCar($color, $laneIn, $laneOut, $day, $timeIn, $timeOut, $waitTimer)
	{
		$this->car = array($color, $laneIn, $laneOut, $day, $timeIn, $timeOut, $waitTimer);
	}
	
	function getCar()
	{
		return $this->car;
	}
	
	function getColor()
	{
		return $this->color;
	}
}

?>