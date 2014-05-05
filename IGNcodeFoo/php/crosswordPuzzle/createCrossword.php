<?php
require_once 'lib/crossword_grid.class.php';

//input into array
function readInput()
{
	//sets to POST input
	$wordList = $_REQUEST['wordList'];
	
	//removes spaces
	$inputArray = str_replace(' ', '', $wordList);
	
	//tests if array is anything other than allowed input
	if(!preg_match('/^[a-zA-Z \,]{2,}$/', $inputArray)){
		if(preg_match('/^$/', $inputArray))
			return -1;
		else return 0;
	}
	
	//splits words into seperate array cells
	$inputArray = explode(",", $inputArray);
	
	//remove blank cells
	$inputArray = array_diff($inputArray, array(''));
	
	//return input
	return $inputArray;
}

//helper function to sort words by length
function sortInput($a,$b)
{
	return strlen($b)-strlen($a);
}

//converts input to all uppercase and sorts by length
function convertInput()
{	
	//if array is anything other than allowed input
	if(readInput() == 0){
		return 0;
	}
	elseif(readInput() == -1){
		return -1;
	}
	//uppercase all words
	$inputArray = array_map('strtoupper', readInput() );
	
	//sorts by string length
	usort($inputArray, 'sortInput');

	return $inputArray;
}

//split input into characters
function splitInput($inputArray)
{
	//copy into new array and split into characters
	foreach ($inputArray as $inputWord){
		$wordPool[] = str_split($inputWord);
	}
	//print_r($wordPool);
	return $wordPool;
}	

//main function to create crossword
function createCrossword()
{
	//creates the input array
	$inputArray = convertInput();	
	
	//check for input errors
	if($inputArray == 0){
		echo '<p class = "failed">Generator failed. Check your list of words for errors.</p>';
		return;
	}
	elseif($inputArray == -1){
		echo '<p class = "failed">Generator failed. It appears you haven\'t entered anything.</p>';
		return;
	}	

	//splits that input array into sub array of letters
	$wordPool = splitInput($inputArray);
	$failedWordPool = array();
	$wordsNotOnGrid = array();
	//creates grid object
	$grid = new Grid();
	
	//sets first word to put on grid to first input from pool
	$baseWord = $wordPool[0];
	
	//puts the first word on the grid
	for($i = 0; $i < count($baseWord); $i++){
		if($i == 0){
			$grid->setNewCell(0, $baseWord[$i], 0, $i, TRUE, TRUE, 1);
		}	
		else $grid->setNewCell(0, $baseWord[$i], 0, $i, FALSE, TRUE, 0);
	}
	
	//removes first word from array
	array_shift($wordPool);
	
	if(count($wordPool) > 0){
		$wordsNotOnGridOut = doWords($wordPool, $grid, $failedWordPool, $wordsNotOnGrid);
	}
	else $wordsNotOnGridOut = NULL;

	output($grid, $wordsNotOnGridOut);
}
function doWords($wordPool, $grid, $failedWordPool, $wordsNotOnGrid)
{
	$type = $_REQUEST['cwType'];	
		
	$success = FALSE;
	
	//gets grid
	$cells = $grid->getGrid();
	//goes through letters of word
	for($i = 0; $i < count($wordPool[0]); $i++)
	{
		//goes through each grid cell
		for($g = 0; $g < count($cells); $g++)
		{
			//if word letter equals letter in cell
			if($wordPool[0][$i] == $cells[$g][1])
			{
				//goes through matching word
				for($j = 0; $j < count($wordPool[0]); $j++)
				{
					//if cell is in horizontal direciton
					if($cells[$g][5])
					{
						//test new cell against grid
						if($j == 0)
						{
							$success = $grid->testNewCell($cells[$g][0] + 1, $wordPool[0][$j], $cells[$g][2] - $i + $j, $cells[$g][3], TRUE, FALSE, 1);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNeighbors($cells[$g][2] - $i + $j, $cells[$g][3], FALSE);
						}
						elseif($j == count($wordPool[0]) - 1)
						{
							$success = $grid->testNewCell($cells[$g][0] + 1, $wordPool[0][$j], $cells[$g][2] - $i + $j, $cells[$g][3], FALSE, FALSE, 0);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNeighbors($cells[$g][2] - $i + $j, $cells[$g][3], FALSE);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNextCell($cells[$g][2] - $i + $j, $cells[$g][3], FALSE);
						}
						else
						{
							$success = $grid->testNewCell($cells[$g][0] + 1, $wordPool[0][$j], $cells[$g][2] - $i + $j, $cells[$g][3], FALSE, FALSE, 0);	
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNeighbors($cells[$g][2] - $i + $j, $cells[$g][3], FALSE);
						}
												
						//if cell does not match letter	
						if(!$success)
						{
							break;
						}
					}
					else
					{
						
						//test new cell against grid
						if($j == 0)
						{
							$success = $grid->testNewCell($cells[$g][0] + 1, $wordPool[0][$j], $cells[$g][2], $cells[$g][3] - $i + $j, TRUE, TRUE, 1);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNeighbors($cells[$g][2] - $i + $j, $cells[$g][3], TRUE);
						}
						elseif($j == count($wordPool[0]) - 1)
						{
							$success = $grid->testNewCell($cells[$g][0] + 1, $wordPool[0][$j], $cells[$g][2], $cells[$g][3] - $i + $j, FALSE, TRUE, 0);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNeighbors($cells[$g][2] - $i + $j, $cells[$g][3], TRUE);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNextCell($cells[$g][2], $cells[$g][3] - $i + $j, TRUE);
						}
						else
						{
							$success = $grid->testNewCell($cells[$g][0] + 1, $wordPool[0][$j], $cells[$g][2], $cells[$g][3] - $i + $j, FALSE, TRUE, 0);
							if(!$success)
							{
								break;
							}
							if($type == 1)
								$success = $grid->testNeighbors($cells[$g][2], $cells[$g][3] - $i + $j, TRUE);
						}
						//if cell does not match letter
						if(!$success)
						{
							break;
						}
					}			
				}
				if($success)
				{
					for($k = 0; $k< count($wordPool[0]); $k++)
					{
						//if cell is in opposite direciton
						if($cells[$g][5])
						{
							$testCell = $grid->getCellFromPosition($cells[$g][2] - $i + $k, $cells[$g][3]);
							//sets new cell in grid
							if($testCell == NULL)
							{
								if($k == 0)
								{
									$grid->setNewCell($cells[$g][0] + 1, $wordPool[0][$k], $cells[$g][2] - $i + $k, $cells[$g][3], TRUE, FALSE, 1);
								}
								else $grid->setNewCell($cells[$g][0] + 1, $wordPool[0][$k], $cells[$g][2] - $i + $k, $cells[$g][3], FALSE, FALSE, 0);
							}
							else
							{
								if($k == 0)
								{
									$grid->setOldCell($testCell[0] + 1, $testCell[1], $testCell[2] - $i + $k, $testCell[3], TRUE, FALSE, 1);
								}
								else $grid->setOldCell($testCell[0] + 1, $testCell[1], $testCell[2] - $i + $k, $testCell[3], TRUE, FALSE, 0);
							}
								
						}		
						else
						{
							$testCell = $grid->getCellFromPosition($cells[$g][2], $cells[$g][3] - $i + $k);
							//sets new cell in grid
							if($testCell == NULL)
							{
								if($k == 0)
								{
									$grid->setNewCell($cells[$g][0] + 1, $wordPool[0][$k], $cells[$g][2], $cells[$g][3] - $i + $k, TRUE, TRUE, 1);
								}
								else $grid->setNewCell($cells[$g][0] + 1, $wordPool[0][$k], $cells[$g][2], $cells[$g][3] - $i + $k, FALSE, TRUE, 0);
							}
							else
							{
								if($k == 0)
								{
									$grid->setOldCell($testCell[0] + 1, $testCell[1], $testCell[2], $testCell[3] - $i + $k, TRUE, TRUE, 1);
								}
								else $grid->setOldCell($testCell[0] + 1, $testCell[1], $testCell[2], $testCell[3] - $i + $k, TRUE, TRUE, 0);
							}
								
						}
										
					}
				}//ends the sucessful placement of word in grid
				if($success)
					break;
			}//end of if statement that tests if letter in word matches grid letter
			//if successful, break and go to next word
			if($success)
				break;
		}//end of grid search
		if($success)
			break;
	}//end of letter test

	//if successful, remove word from pool
	if($success && count($wordPool) > 0)
	{
		array_shift($wordPool);
	}
	//if fails, remove word form pool and puts into new pool
	elseif(!$success && count($wordPool) > 0 && $failedWordPool != -1)
	{
		$failedWordPool[] = array_shift($wordPool);
	}
	elseif(!$success && count($wordPool) > 0 && $failedWordPool == -1)
	{
		$wordsNotOnGrid[] = array_shift($wordPool);
	}
	if(count($wordPool) > 0 && $failedWordPool != -1)
	{		
		return doWords($wordPool, $grid, $failedWordPool, $wordsNotOnGrid);
	}
	elseif(count($wordPool) == 0 && $failedWordPool != -1 && count($failedWordPool) > 0)
	{
		return doWords($failedWordPool, $grid, -1, $wordsNotOnGrid);
	}
	elseif(count($wordPool) > 0 && $failedWordPool == -1)
	{
		return doWords($wordPool, $grid, -1, $wordsNotOnGrid);
	}
	if(count($wordPool) == 0 && $failedWordPool == -1)
	{
		return $wordsNotOnGrid;
	}
}

function output($grid, $wordsNotOnGrid)
{
	$dimensions = $grid->getDimensions();
	$crossword = array_fill(0, $dimensions[0] + 3, array_fill(0, $dimensions[1] + 3, array(NULL, 0, FALSE)));
	foreach($grid->getGrid() as $cell)
	{
		$crossword[$cell[2] + 1][$cell[3] + 1][0] = $cell[1];
		$crossword[$cell[2] + 1][$cell[3] + 1][2] = $cell[5];
		$crossword[$cell[2] + 1][$cell[3] + 1][1] = $cell[6];
	}
	
	echo "\n" . '<!-- BEGIN CROSSWROD OUTPUT -->' . "\n";
	echo '<table id = "cwTable"><tbody>' . "\n";
	for($ix = 0; $ix < count($crossword); $ix++){
		echo "\t" . '<tr>';
		for($iy = 0; $iy < count($crossword[$ix]); $iy++){
			if($crossword[$ix][$iy][0] != NULL && $crossword[$ix][$iy][1] == 0){
				echo '<td>' . $crossword[$ix][$iy][0] . '</td>';
			}
			elseif($crossword[$ix][$iy][1] != 0 && !$crossword[$ix][$iy][2]){
				echo '<td class = "startDown">' . $crossword[$ix][$iy][0] . '</td>';
			}
			elseif($crossword[$ix][$iy][2]){
				echo '<td class = "startAcross">' . $crossword[$ix][$iy][0] . '</td>';
			}
			else{
				echo '<td class = "empty"></td>';
			}
		}
		echo '</tr>' . "\n";
	}
	echo '</tbody></table>' . "\n";
	echo '<!-- END CROSSWROD OUTPUT -->' . "\n\n";
	
	if(count($wordsNotOnGrid) > 0){
		echo '<p class = "failed">These words failed to be placed on the grid: ';
		for($i = 0; $i < count($wordsNotOnGrid); $i ++){
			 foreach($wordsNotOnGrid[$i] as $failLetter){
			 	echo $failLetter;
			 }
			 if($i != count($wordsNotOnGrid) -1)
			 	echo ", ";
			 else echo '.</p>' . "\n";
		}
	}
}

//execute
createCrossword();
?>