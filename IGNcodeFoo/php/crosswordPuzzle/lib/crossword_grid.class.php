<?php
class Grid
{
	private $grid;
	
	function __construct()
	{
		$this->grid = array();
	}
	
	function setNewCell($wordIndex, $letter, $x, $y, $taken, $orientation, $start)
	{
		$this->grid[] = array($wordIndex, $letter, $x, $y, $taken, $orientation, $start);
	}
	
	function setOldCell($wordIndex, $letter, $x, $y, $taken, $orientation, $start)
	{
		$newArray = array($wordIndex, $letter, $x, $y, $taken, $orientation, $start);
		
		if($this->getIndexFromPosition($x, $y) == NULL){
			//print_r($newArray);
		}
		else $this->grid[$this->getIndexFromPosition($x, $y)] = array_replace($this->grid[$this->getIndexFromPosition($x, $y)], $newArray);
	}
	
	function testNewCell($wordIndex, $letter, $x, $y, $taken, $orientation, $start)
	{	
		foreach($this->grid as $cell){
			if($x == $cell[2] && $y == $cell[3]){
				if(!$cell[4]){
					if($letter == $cell[1]){
						break;
					}
					else return FALSE;
				}
				else return FALSE;		
			}
			//else return FALSE;
		}
		return TRUE;
	}
	
	function testNeighbors($x, $y, $orientation)
	{
		if($this->getCellFromPosition($x, $y) == NULL){
			if($orientation){
				$testCell = $this->getCellFromPosition($x + 1, $y);
				if($testCell != NULL){
					return FALSE;
				}
				$testCell = $this->getCellFromPosition($x - 1, $y);
				if($testCell != NULL){
					return FALSE;
				}
			}
			else{
				$testCell = $this->getCellFromPosition($x, $y + 1);
				if($testCell != NULL){
					return FALSE;
				}
				$testCell = $this->getCellFromPosition($x, $y - 1);
				if($testCell != NULL){
					return FALSE;
				}
			}
		}
		return TRUE;
	}
	
	function testNextCell($x, $y, $orientation)
	{
		if($orientation){
			$testCell = $this->getCellFromPosition($x, $y + 1);
			if($testCell != NULL){
				return FALSE;
			}
		}
		else{	
			$testCell = $this->getCellFromPosition($x + 1, $y);
			if($testCell != NULL){
				return FALSE;
			}
		}
		return TRUE;
	}

	function getConvertedGrid()
	{
		$lowestX = 0;
		$lowestY = 0;
		//find lowest negative coordinates if they exist
		foreach($this->grid as $cell)
		{
			if($lowestX > $cell[2]){
				$lowestX = $cell[2];
			}
			if($lowestY > $cell[3]){
				$lowestY = $cell[3];
			}
		}
		
		//changes lowest coordinates to positive
		$lowestX = $lowestX * -1;
		$lowestY = $lowestY * -1;
		
		//shifts all coordinates according to results
		for($i = 0; $i < count($this->grid); $i++){
			$this->grid[$i][2] = $this->grid[$i][2] + $lowestX;
			$this->grid[$i][3] = $this->grid[$i][3] + $lowestY;
		}
		
		return $this->grid;
	}
	
	function getDimensions()
	{
		$this->grid = $this->getConvertedGrid();
		
		$highestX = 0;
		$highestY = 0;
		foreach($this->grid as $cell){
			if($highestX < $cell[2]){
				$highestX = $cell[2];
			}
			if($highestY < $cell[3]){
				$highestY = $cell[3];
			}
		}
		
		return array($highestX, $highestY);
	}
	
	function getCellFromPosition($x, $y)
	{
		foreach($this->grid as $cell){
			if($x == $cell[2] && $y == $cell[3]){
				return $cell;
			}
		}
		return NULL;
	}
	
	function getIndexFromPosition($x, $y)
	{
		for($i = 0; $i < count($this->grid); $i++){
			if($x == $this->grid[$i][2] && $y == $this->grid[$i][3]){
				return $i;
			}
		}

		return NULL;
	}
	
	function getGrid()
	{
		return $this->grid;
	}
	
	function printCells()
	{
		return print_r($this->grid);
	}
}

/*TESTBLOCK
$object = new Grid();
$object->setNewCell('g', 1, 2);
$object->printCells();
ENDOFTESTBLOCK*/

?>
