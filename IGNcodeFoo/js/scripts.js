//starts functions when document is loaded
$(document).ready(function(){
	
	// ----- BEGIN LOGO TIMER ----- 
	var codeFoo1 = ["C", "o", "d", "e", " ", "F", "o", "o", " ", "2", "0", "1", "4"];
		codeFoo2 = ["C", "o", "d", "e", " ", "F", "o", "o", " ", "2", "0", "1", "4"];
		j = 0.0;
		k = 0;
		codeFooDone = 0;
	
	var intervalId = window.setInterval(function(){
		for(var h = 0; h < codeFoo1.length; h++){
			if(k == h)
				codeFoo1[h] = codeFoo2[h];
		}
		for(var i = codeFoo1.length - 1; i > 0 + k; i--){
			codeFoo1[i] = Math.floor(Math.random() * 2);
		}
		
		$("#logoFoo").text(codeFoo1.join(""));
		
		if(j % 5.0 == 0)
			k++;
		
		j++;
		
		if(j >= 65.0){
			$("#logoFoo").css({color: '#878787'});
			
			codeFooDone = 1;
			clearInterval(intervalId);
		}
	}, (Math.random() * 100) + 50);
	
	$("#logoFoo").click(function() {
		if(codeFooDone == 1){
			$("#logoFoo").css({
						color: '#FFFFFF',
			});
			j = 0.0;
			k = 0;
			
			var intervalId = window.setInterval(function(){
				for(var h = 0; h < codeFoo1.length; h++){
					if(k == h)
						codeFoo1[h] = codeFoo2[h];
				}
				for(var i = codeFoo1.length - 1; i > 0 + k; i--){
					codeFoo1[i] = Math.floor(Math.random() * 2);
				}
				
				$("#logoFoo").text(codeFoo1.join(""));
				
				if(j % 5.0 == 0)
					k++;
				
				j++;
				
				if(j >= 65.0){
					$("#logoFoo").css({
						color: '#878787',
					});
					codeFooDone = 1;
					clearInterval(intervalId);
				}
			}, (Math.random() * 100) + 50);
		}
	});
	// ----- END LOGO TIMER ----- 
	
	// ----- BEGIN PANEL SCRIPTS ----- 
	var expanded = [0, 1, 1, 1, 1, 1];
	$("#span1").text("-");
	$("#panel2").slideUp(0, "linear");
	$("#panel3").slideUp(0, "linear");
	//slides up the panel after the vector map loads to avoid error with snap
	$("#panel4").slideUp(900, "linear");
	$("#panel5").slideUp(0, "linear");
	$("#panel6").slideUp(0, "linear");
	
	$("#flip1").click(function(){
		if(expanded[0] == 0){
			$("#panel1").slideUp("slow", "linear");
			$("#span1").text("+");
			expanded[0] = 1;
		}
		else{
			$("#panel1").slideDown("slow", "linear");
			$("#span1").text("-");
			expanded[0] = 0;
		}
	});
	$("#flip2").click(function(){
		if(expanded[1] == 0){
			$("#panel2").slideUp("slow", "linear");
			$("#span2").text("+");
			expanded[1] = 1;
		}
		else{
			$("#panel2").slideDown("slow", "linear");
			$("#span2").text("-");
			expanded[1] = 0;
		}
	});
	$("#flip3").click(function(){
		if(expanded[2] == 0){
			$("#panel3").slideUp("slow", "linear");
			$("#span3").text("+");
			expanded[2] = 1;
		}
		else{
			$("#panel3").slideDown("slow", "linear");
			$("#span3").text("-");
			expanded[2] = 0;
		}
	});
	$("#flip4").click(function(){
		if(expanded[3] == 0){
			$("#panel4").slideUp("slow", "linear");
			$("#span4").text("+");
			expanded[3] = 1;
		}
		else{
			$("#panel4").slideDown("slow", "linear");
			$("#span4").text("-");
			expanded[3] = 0;
		}
	});
	$("#flip5").click(function(){
		if(expanded[4] == 0){
			$("#panel5").slideUp("slow", "linear");
			$("#span5").text("+");
			expanded[4] = 1;
		}
		else{
			$("#panel5").slideDown("slow", "linear");
			$("#span5").text("-");
			expanded[4] = 0;
		}
	});
	$("#flip6").click(function(){
		if(expanded[5] == 0){
			$("#panel6").slideUp("slow", "linear");
			$("#span6").text("+");
			expanded[5] = 1;
		}
		else{
			$("#panel6").slideDown("slow", "linear");
			$("#span6").text("-");
			expanded[5] = 0;
		}
	});
	// ----- END PANEL SCRIPTS ----- 
	
	// ----- BEGIN CROSSWORD SCRIPTS -----  
	//do live error checking for input
	$("#cwTextArea").keyup(function(){
		if(/^[a-zA-Z \,]{2,}$/.test($(this).val()) && $(this).val().trim() !== ""){
			$(this).css("border-color", "green");
			$("#cwTextAreaError").text("");
		}
		else{
			//turns border red if input error
			$(this).css("border-color", "red");
			if(/^[0-9]+$/.test($(this).val())){
				$("#cwTextAreaError").text("Do not enter numbers");
			}
			else if($(this).val().trim() == ""){
				$("#cwTextAreaError").text("Entry is blank");
			}
			else{
				$("#cwTextAreaError").text("Entry seems incorrect - may contain numbers or special characters");
			}
		}
	});
	  
	//loads IGN word list
	$("#cwIGNWordsButton").click(function(){
		var IGNWordList;
		
		//gets the data from the text file
		$.get("txt/cwIGNWordList.txt", function(data){
			IGNWordList = data;
			//alert(IGNWordList);
			//sets the result to the textarea
			$("#cwTextArea").val(IGNWordList);
			//sets the newlines to commas
			$("#cwTextArea").val($("#cwTextArea").val().replace(/[\n]/g, ", "));
		});
		
		//sets text area to green and clears error messages
		$("#cwTextArea").css("border-color", "green");
		$("#cwTextAreaError").text("");
	});
  
	//loads my word list
	$("#cwMyWordsButton").click(function(){
		var MyWordList;
		
		//gets the data from the text file
		$.get("txt/cwMyWordList.txt", function(data){
			MyWordList = data;
			//alert(MyWordList);
			//sets the result to the textarea
			$("#cwTextArea").val(MyWordList);
			//sets the newlines to commas
			$("#cwTextArea").val($("#cwTextArea").val().replace(/[\n]/g, ", "));
		});
		
		//sets text area to green and clears error messages
		$("#cwTextArea").css("border-color", "green");
		$("#cwTextAreaError").text("");
	});
   
	//runs the crossword ajax POST
	$("#cwSubmit").click(function(){
		//resets crosswordResult
		$("#crosswordResult").text("");
		//turns on loading image
		$('#crosswordResult').css({"display": "block",
								"background-image": "url('img/loading_Medium.gif')",
								"height": "50px",
								"width": "50px",
								"padding": "0px",
								"margin": "1% auto"});
		
		$.ajax({
		    type: "POST",
			url: $("#cwForm").attr('action'), //does the form's action
			data: $("#cwForm").serialize(), //serialize all input
			//dataType: "json",
			timeout: 5000, // in milliseconds
			success: function(data) {
			    $("#crosswordResult").text(""); //clears current crossword if there is any
             	$("#crosswordResult").append(data); //adds newly generated crossword
			},
			error: function(request, status, err) {
			    if(status == "timeout") {
                	$('#crosswordResult').css({"display": "block",
								"background-image": "none",
								"height": "100%",
								"width": "100%",
								"padding-top": "10px",
								"margin": "auto"});
                	$("#crosswordResult").text('<p class = "failed">Request Canceled: Generation Took Longer Than 5 Seconds. :(</p>');
            	}
			},
			complete: function(){
        		$('#crosswordResult').css({"display": "block",
								"background-image": "none",
								"height": "100%",
								"width": "100%",
								"padding-top": "10px",
								"margin": "auto"});
      		}
		});
	});// ----- END CROSSWORD SCRIPTS -----
	
	// ----- BEGIN BAYBRIDGE BACKEND SCRIPTS -----
	//do live error checking for inputs
	$("#beLaneIn").keyup(function(){
		if(/^[0-9]+$/.test($(this).val()) && !/^0/.test($(this).val()) && parseInt($(this).val()) < 101){
			$(this).css("border-color", "green");
			$("#beErrorYellow").text("");
			//turns border yellow if doesn't match rules
			if(parseInt($(this).val()) < parseInt($("#beLaneOut").val()) + 1 && $.isNumeric(parseInt($(this).val())) && /^[0-9]+$/.test($("#beLaneOut").val())){
				if(/^[0-9]+$/.test($("#beCars").val()) && parseInt($("#beCars").val()) < 101)
					$("#beErrorRed").text("");
				
				$("#beErrorYellow").text("Incoming must be greater than Outgoing.");
				$(this).css("border-color", "yellow");
				$("#beLaneOut").css("border-color", "yellow");
			}
			else{
				if(/^[0-9]+$/.test($("#beLaneOut").val())){
					$("#beErrorYellow").text("");
					if(/^[0-9]+$/.test($("#beCars").val()) && parseInt($("#beCars").val()) < 101)
						$("#beErrorRed").text("");
					
					$("#beLaneOut").css("border-color", "green");
				}
			}
		}
		//turns border red if input error
		else{
			$(this).css("border-color", "red");
			$("#beLaneOut").css("border-color", "green");
			$("#beErrorYellow").text("");
			$("#beErrorRed").text("You can only enter positive numbers less than 101.");
		}
	});
	$("#beLaneOut").keyup(function(){
		if(/^[0-9]+$/.test($(this).val()) && !/^0/.test($(this).val()) && parseInt($(this).val()) < 101){
			$(this).css("border-color", "green");
			$("#beErrorYellow").text("");
			//turns border yellow if doesn't match rules
			if(parseInt($(this).val()) > parseInt($("#beLaneIn").val()) - 1 && $.isNumeric(parseInt($(this).val())) && /^[0-9]+$/.test($("#beLaneIn").val())){
				if(/^[0-9]+$/.test($("#beCars").val()) && parseInt($("#beCars").val()) < 101)
					$("#beErrorRed").text("");
				
				$("#beErrorYellow").text("Outgoing must be less than Incoming.");
				$(this).css("border-color", "yellow");
				$("#beLaneIn").css("border-color", "yellow");
			}
			else{
				if(/^[0-9]+$/.test($("#beLaneIn").val())){
					$("#beErrorYellow").text("");
					if(/^[0-9]+$/.test($("#beCars").val()) && parseInt($("#beCars").val()) < 101)
						$("#beErrorRed").text("");
					
					$("#beLaneIn").css("border-color", "green");
				}
			}
		}
		//turns border red if input error
		else{
			$(this).css("border-color", "red");
			$("#beLaneIn").css("border-color", "green");
			$("#beErrorYellow").text("");
			$("#beErrorRed").text("You can only enter positive numbers less than 101.");
		}
	});
	$("#beCars").keyup(function(){
		if(/^[0-9]+$/.test($(this).val()) && !/^0/.test($(this).val()) && parseInt($(this).val()) < 101){
			$(this).css("border-color", "green");
			
			//if input and output are numbers and less than 101, remove input error
			if(/^[0-9]+$/.test($("#beLaneOut").val()) && /^[0-9]+$/.test($("#beLaneIn").val()) && parseInt($("#beLaneOut").val()) < 101 && parseInt($("#beLaneIn").val()) < 101){
				$("#beErrorRed").text("");
			}
		}
		//turns border red if input error
		else{
			$(this).css("border-color", "red");
			$("#beErrorRed").text("You can only enter positive numbers less than 101.");
		}
	});
	
	//loads defult values and turns borders green
	$("#beResetButton").click(function(){
		//remove errors
		$("#beErrorRed").text("");
		$("#beErrorYellow").text("");
		
		$("#beLaneIn").val(16);
		$("#beLaneOut").val(5);
		$("#beCars").val(4);
		
		$("#beLaneIn").css("border-color", "green");
		$("#beLaneOut").css("border-color", "green");
		$("#beCars").css("border-color", "green");
	});
	
	//runs the be ajax POST
	$("#beSubmit").click(function(){
		//resets crosswordResult
		$("#beResult").text("");
		//turns on loading image
		$('#beResult').css({"display": "block",
								"background-image": "url('img/loading_Small.gif')",
								"height": "20px",
								"width": "20px",
								"padding": "0px",
								"margin": "1% auto"});
		
		$.ajax({
		    type: "POST",
			url: $("#beForm").attr('action'), //does the form's action
			data: $("#beForm").serialize(), //serialize all input
			//dataType: "json",
			timeout: 5000, // in milliseconds
			success: function(data) {
			    $("#beResult").text(""); //clears current be if there is any
             	$("#beResult").append(data); //adds newly generated be
			},
			error: function(request, status, err) {
			    if(status == "timeout") {
                	$('#beResult').css({"display": "block",
								"background-image": "none",
								"height": "100%",
								"width": "100%",
								"padding-top": "10px",
								"margin": "auto"});
                	$("#beResult").text('<p class = "failed">Request Canceled: Generation Took Longer Than 5 Seconds. :(</p>');
            	}
			},
			complete: function(){
        		$('#beResult').css({"display": "block",
								"background-image": "none",
								"height": "100%",
								"width": "100%",
								"padding-top": "10px",
								"margin": "auto"});
      		}
      	});
	});// ----- END BAYBRIDGE BACKEND SCRIPTS -----
});//end of document ready function