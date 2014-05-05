$(document).ready(function(){
	startTheGame();
	
	//creates the game
	function startTheGame()
	{
		//creates phaser game
		var game = new Phaser.Game(720, 792, Phaser.AUTO, 'myGame', { preload: preload, create: create, update: update });
		
		//preload assests
		function preload() {
			//load the json file describing tile placement
			game.load.tilemap('map', 'assests/pacmanLayout.json', null, Phaser.Tilemap.TILED_JSON);
			
			//load the tileset
			game.load.image('tileset_pacman', 'assests/tileset_pacman.png');
			
			//load assests
			game.load.image('player', 'assests/redCell.png', 32, 32);
			game.load.image('enemy1', 'assests/bacteriaCell.png', 32, 32);
			game.load.image('enemy2', 'assests/bacteriaCell.png', 32, 32);
			game.load.image('enemy3', 'assests/bacteriaCell.png', 32, 32);
			game.load.image('enemy4', 'assests/bacteriaCell.png', 32, 32);		
			game.load.image('pellet', 'assests/pellet.png', 24, 24);
		}
		
		//various variables
		var moveSpeed = 150; //pixels per second
		var gameStarted = false;
		var gameWon = false;
		var gameOver = false;
		var map;
		var layer;
		var pellets;
		var player;
		var fpsText;
		var startText;
		var wonText;
		//this is where all the pellets go
		var pelletsPosX = [[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27], //2
						   [2, 7, 13, 16, 22, 27],
						   [2, 7, 13, 16, 22, 27],
						   [2, 7, 13, 16, 22, 27], //5
						   [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27],
						   [2, 7, 10, 19, 22, 27],
						   [2, 7, 10, 19, 22, 27],
						   [2, 3, 4, 5, 6, 7, 10, 11, 12, 13, 16, 17, 18, 19, 22, 23, 24, 25, 26, 27],
						   [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], [7, 22], //10-20
						   [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27],
						   [2, 7, 13, 16, 22, 27],
						   [2, 7, 13, 16, 22, 27],
						   [2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 16, 17, 18, 19, 20, 21, 22, 25, 26, 27],
						   [4, 7, 10, 19, 22, 25], //25
						   [4, 7, 10, 19, 22, 25],
						   [2, 3, 4, 5, 6, 7, 10, 11, 12, 13, 16, 17, 18, 19, 22, 23, 24, 25, 26, 27],
						   [2, 13, 16, 27],
						   [2, 13, 16, 27],
						   [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27]]; //30
		var pelletsPosY = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
		
		//creates all objects
		function create()
		{
			//enable physics for the game
	    	game.physics.startSystem(Phaser.Physics.ARCADE);
			
			//create a pellet group
			pellets = game.add.group();
			//give pellets a body
			pellets.enableBody = true;
			//set pellete physics to arcade
	    	pellets.physicsBodyType = Phaser.Physics.ARCADE;
	    	
			//set background color
			game.stage.backgroundColor = '#000000';
			
			//load map
			map = game.add.tilemap('map');
			
			//load tiles
			map.addTilesetImage('tileset_pacman');
			
			//set the collision range to all
			map.setCollisionByExclusion([]);
			
			//creates layer for map to go on
			layer = map.createLayer('Tile Layer 1');
			
			 //tell the layer to resize the game 'world' to match its size
			layer.resizeWorld();
				
			//load player sprite
			player = game.add.sprite(24*14.4, (24*24) - 4, 'player');
			//load enemy sprites
			enemy1 = game.add.sprite(24*12, (24*15) - 4, 'enemy1');
			enemy2 = game.add.sprite(24*13.5, (24*15) - 4, 'enemy2');
			enemy3 = game.add.sprite(24*15, (24*15) - 4, 'enemy3');
			enemy4 = game.add.sprite(24*16.5, (24*15) - 4, 'enemy4');
			
			//places pellets
			for(var i = 0; i < pelletsPosY.length; i++){
				for(var j = 0; j < pelletsPosX[i].length; j++)
				{
					pellet = pellets.create(24*pelletsPosX[i][j], 24*pelletsPosY[i], 'pellet');
					//can't move
					pellet.body.immovable = true;
					//test for overlay instead of collision
					pellet.body.customSeparateX = true;
	            	pellet.body.customSeparateY = true;
				}
			}
	    	
	    	//enable physics for player and enemies
	    	game.physics.enable(player, Phaser.Physics.ARCADE);
	    	game.physics.enable(enemy1, Phaser.Physics.ARCADE);
	    	game.physics.enable(enemy2, Phaser.Physics.ARCADE);
	    	game.physics.enable(enemy3, Phaser.Physics.ARCADE);
	    	game.physics.enable(enemy4, Phaser.Physics.ARCADE);
	    	//set collision size of player and enemies
	    	player.body.setSize(24, 24, 4, 4);
	    	enemy1.body.setSize(24, 24, 4, 4);
	    	enemy2.body.setSize(24, 24, 4, 4);
	    	enemy3.body.setSize(24, 24, 4, 4);
	    	enemy4.body.setSize(24, 24, 4, 4);
	    	//disable world boundaries
	    	player.body.collideWorldBounds = false;
	    	enemy1.body.collideWorldBounds = false;
	    	enemy2.body.collideWorldBounds = false;
	    	enemy3.body.collideWorldBounds = false;
	    	enemy4.body.collideWorldBounds = false;
	    	
	    	
	    	
	    	//capture certain keys to prevent their default actions in the browser.
	    	game.input.keyboard.addKeyCapture([
	        	Phaser.Keyboard.LEFT,
	        	Phaser.Keyboard.RIGHT,
	        	Phaser.Keyboard.UP,
	        	Phaser.Keyboard.DOWN,
	   	 	]);
	   	 	
			//show FPS
	    	game.time.advancedTiming = true;
	    	
	    	//create fps text
	    	fpsText = game.add.text( 50, 290, '', { font: '16px Arial', fill: '#ffffff' } );
	    	//create start text
	    	startText = game.add.text(game.world.centerX, 350, '--- Click to Start ---', { font: "40px Arial", fill: "#ffffff", align: "center" });
	    	//create won text
	    	wonText = game.add.text(game.world.centerX, 350, 'YOU WON!\nClick to Play Again', { font: "40px Arial", fill: "#ffffff", align: "center" });
	    	
	    	//center text positions
	    	startText.anchor.setTo(0.5, 0);
	    	wonText.anchor.setTo(0.5, 0.2);
	    	
	    	//hide win text
	    	wonText.visible = false;
	    	
	    	game.input.onDown.add(gameStart, this);
	    	
	    	/* not implemented
	    	pathError = false;
	    	pathXError = false;
	    	pathYError = false;
	    	goingLeft = false;
	    	goingRight = false;
	    	goingUp = false;
	    	goingDown = false;
	    	
	    	findPointX = 24 * 4;
	    	findPointY = (24 * 25) - 4;*/
		}
		
		function update() {
			//test for collisions
			game.physics.arcade.collide(player, layer);
			game.physics.arcade.collide(enemy1, layer);
			game.physics.arcade.collide(enemy2, layer);
			game.physics.arcade.collide(enemy3, layer);
			game.physics.arcade.collide(enemy4, layer);
			game.physics.arcade.collide(player, enemy1, endTheGame, null, this);
			game.physics.arcade.collide(player, enemy2, endTheGame, null, this);
			game.physics.arcade.collide(player, enemy3, endTheGame, null, this);
			game.physics.arcade.collide(player, enemy4, endTheGame, null, this);
			game.physics.arcade.collide(player, pellets, atePellet, null, this);
			
			//if game has started
			if(gameStarted && !gameWon)
			{	
				//show fps
				if (game.time.fps !== 0) {
		        	fpsText.setText(game.time.fps + ' FPS');
			    }
				
				//wrap around
				if(player.x < -12){
					player.x = 708;
				}
				if(player.x > 708){
					player.x = -12;
				}
				if(enemy1.x < -12){
					enemy1.x = 708;
				}
				if(enemy1.x > 708){
					enemy1.x = -12;
				}
				if(enemy2.x < -12){
					enemy2.x = 708;
				}
				if(enemy2.x > 708){
					enemy2.x = -12;
				}
				if(enemy3.x < -12){
					enemy3.x = 708;
				}
				if(enemy3.x > 708){
					enemy3.x = -12;
				}
				if(enemy4.x < -12){
					enemy4.x = 708;
				}
				if(enemy4.x > 708){
					enemy4.x = -12;
				}
				
				// ----- BEGIN PLAYER CONTROLS ----- 
				//horizontal movement
			    if (game.input.keyboard.isDown(Phaser.Keyboard.LEFT) || game.input.keyboard.isDown(Phaser.Keyboard.A)) {
			        // If the LEFT or A key is down, make the player move left
			        player.body.velocity.x = moveSpeed * -1;
			    } else if (game.input.keyboard.isDown(Phaser.Keyboard.RIGHT) || game.input.keyboard.isDown(Phaser.Keyboard.D)) {
			        // If the RIGHT or D key is down, make the player move right
			        player.body.velocity.x = moveSpeed;
			    }//vertical movement
			    else if (game.input.keyboard.isDown(Phaser.Keyboard.UP) || game.input.keyboard.isDown(Phaser.Keyboard.W)) {
			         // If the UP or W key is down, make the player move up
			        player.body.velocity.y = moveSpeed * -1;
			    } else if (game.input.keyboard.isDown(Phaser.Keyboard.DOWN) || game.input.keyboard.isDown(Phaser.Keyboard.S)) {
			         // If the DOWN or S key is down, make the player move up
			        player.body.velocity.y = moveSpeed;
			    }// ----- END PLAYER CONTROLS ----- 
				
				//enemy movement
				if(enemy1.body.deltaX() == 0 && enemy1.body.deltaY() == 0){
					var newX = Phaser.Math.chanceRoll(50);
					var newY = Phaser.Math.chanceRoll(50);
					
					if(newX == true){
						enemy1.body.velocity.x = moveSpeed * -1;
					}
					else{
						enemy1.body.velocity.x = moveSpeed;
					}
					if(newY == true){
						enemy1.body.velocity.y = moveSpeed * -1;
					}
					else{
						enemy1.body.velocity.y = moveSpeed;
					}
				}
				if(enemy2.body.deltaX() == 0 && enemy2.body.deltaY() == 0){
					var newX = Phaser.Math.chanceRoll(50);
					var newY = Phaser.Math.chanceRoll(50);
					
					if(newX == true){
						enemy2.body.velocity.x = moveSpeed * -1;
					}
					else{
						enemy2.body.velocity.x = moveSpeed;
					}
					if(newY == true){
						enemy2.body.velocity.y = moveSpeed * -1;
					}
					else{
						enemy2.body.velocity.y = moveSpeed;
					}
				}
				if(enemy3.body.deltaX() == 0 && enemy3.body.deltaY() == 0){
					var newX = Phaser.Math.chanceRoll(50);
					var newY = Phaser.Math.chanceRoll(50);
					
					if(newX == true){
						enemy3.body.velocity.x = moveSpeed * -1;
					}
					else{
						enemy3.body.velocity.x = moveSpeed;
					}
					if(newY == true){
						enemy3.body.velocity.y = moveSpeed * -1;
					}
					else{
						enemy3.body.velocity.y = moveSpeed;
					}
				}
				if(enemy4.body.deltaX() == 0 && enemy4.body.deltaY() == 0){
					var newX = Phaser.Math.chanceRoll(50);
					var newY = Phaser.Math.chanceRoll(50);
					
					if(newX == true){
						enemy4.body.velocity.x = moveSpeed * -1;
					}
					else{
						enemy4.body.velocity.x = moveSpeed;
					}
					if(newY == true){
						enemy4.body.velocity.y = moveSpeed * -1;
					}
					else{
						enemy4.body.velocity.y = moveSpeed;
					}
				}
			}
			//if the game ends, add option to restart game
			else if(gameWon)
			{
				game.input.onDown.add(restartTheGame, this);
			}
		}
		
		//kill pellet
		function atePellet(_player, _pellet)
		{
			_pellet.kill();
			
			if (pellets.countLiving() == 0){
		        win();
	    	}
		}
		
		//win game
		function win () {
		    player.body.velocity.setTo(0, 0);
		    enemy1.body.velocity.setTo(0, 0);
			enemy2.body.velocity.setTo(0, 0);
			enemy3.body.velocity.setTo(0, 0);
			enemy4.body.velocity.setTo(0, 0);
		    
		    wonText.visible = true;
		    gameWon = true;
		}
		
		//game over
		function endTheGame(_player, _enemy)
		{
			player.body.velocity.setTo(0, 0);
			enemy1.body.velocity.setTo(0, 0);
			enemy2.body.velocity.setTo(0, 0);
			enemy3.body.velocity.setTo(0, 0);
			enemy4.body.velocity.setTo(0, 0);
		    
		    wonText.text = "Game Over\nClick to Play Again";
		    wonText.visible = true;
		    gameWon = true;
		}
		
		//start the game
		function gameStart()
		{
			gameStarted = true;
			startText.visible = false;
		}
		
		//restart the game
		function restartTheGame()
		{
			//destory the game
			game.destroy();
			//clear the div
			$("#myGame").html('');
			//start the game again
			startTheGame();
		}
	}//end of start game
});