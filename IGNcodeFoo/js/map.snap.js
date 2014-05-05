//snap svg for map

$(document).ready(function () {
	//new Snap
	snp = Snap('#map'); 
	
	//Snap transfroms
	mapTrans = new Snap.Matrix();
	keyTrans = new Snap.Matrix();
	
	//vars
	var snpReset = 1.0;
		isDrag = 1;
		isFullScrn = 0;
		isMergeStr = 0;
		yellowClick = 0;
		redClick = 0;
	
	//groups
	mapGroup = snp.group();
	keyGroup = snp.group();
	
	//make dragable
	mapGroup.drag();
	
	//load map
	Snap.load("img/BayBridge.svg", function (map) {
		//draw map on viewport
		mapGroup.append(map);
		
		// ----- BEGIN BUILDING BUTTONS ----- 
		//toll plaza hover
		mapGroup.select("#TollPlazaSelector").hover(function(){
			mapGroup.select("#TollPlaza").animate({fill: '#87CED6'}, 500);
			mapGroup.select("#TollPlazaText").animate({opacity: '1.0'}, 500);}, function(){
			mapGroup.select("#TollPlaza").animate({fill: '#FFFFFF'}, 500);
			mapGroup.select("#TollPlazaText").animate({opacity: '0.0'}, 500);
		});
		//meter lights hover
		mapGroup.select("#MeterLights_1_").hover(function(){
			mapGroup.select("#MeterLights_1_").animate({fill: '#87CED6'}, 500);
			mapGroup.select("#MeterLightsTail").animate({opacity: '1.0'}, 500);
			mapGroup.select("#MeterLightsArrow").animate({opacity: '1.0'}, 500);
			mapGroup.select("#MeterLightsText").animate({opacity: '1.0'}, 500);}, function(){
			mapGroup.select("#MeterLights_1_").animate({fill: '#FFFFFF'}, 500);
			mapGroup.select("#MeterLightsTail").animate({opacity: '0.0'}, 500);
			mapGroup.select("#MeterLightsArrow").animate({opacity: '0.0'}, 500);
			mapGroup.select("#MeterLightsText").animate({opacity: '0.0'}, 500);
		});
		//adminA hover
		mapGroup.select("#AdminASelector").hover(function(){
			mapGroup.select("#AdminA").animate({fill: '#87CED6'}, 500);
			mapGroup.select("#AdminB").animate({fill: '#87CED6'}, 500);
			mapGroup.select("#AdminAText").animate({opacity: '1.0'}, 500);
			mapGroup.select("#AdminBText").animate({opacity: '1.0'}, 500);}, function(){
			mapGroup.select("#AdminA").animate({fill: '#FFFFFF'}, 500);
			mapGroup.select("#AdminB").animate({fill: '#FFFFFF'}, 500);
			mapGroup.select("#AdminAText").animate({opacity: '0.0'}, 500);
			mapGroup.select("#AdminBText").animate({opacity: '0.0'}, 500);
		});
		//adminB hover
		mapGroup.select("#AdminBSelector").hover(function(){
			mapGroup.select("#AdminA").animate({fill: '#87CED6'}, 500);
			mapGroup.select("#AdminB").animate({fill: '#87CED6'}, 500);
			mapGroup.select("#AdminAText").animate({opacity: '1.0'}, 500);
			mapGroup.select("#AdminBText").animate({opacity: '1.0'}, 500);}, function(){
			mapGroup.select("#AdminA").animate({fill: '#FFFFFF'}, 500);
			mapGroup.select("#AdminB").animate({fill: '#FFFFFF'}, 500);
			mapGroup.select("#AdminAText").animate({opacity: '0.0'}, 500);
			mapGroup.select("#AdminBText").animate({opacity: '0.0'}, 500);
		});
		// ----- END BUILDING BUTTONS ----- 
		
		// ----- BEGIN ARROW BUTTONS ----- 
		//san francisco hover
		mapGroup.select("#SanSelector").hover(function(){
			mapGroup.select("#SanArrowHead").animate({opacity: '0', transform: 't30, 0, 0'}, 0);
			mapGroup.select("#SanArrowTail").animate({transform: 's0.0, s0.0',}, 0);}, function(){
			mapGroup.select("#SanArrowHead").animate({opacity: '1', transform: 't0, 0, 0'}, 500);
			mapGroup.select("#SanArrowTail").animate({transform: 's1.0, s1.0'}, 500);
		});
		//direction hover
		mapGroup.select("#DieSelector").hover(function(){
			mapGroup.select("#DieArrowHead").animate({opacity: '0', transform: 't30, 0, 0'}, 0);
			mapGroup.select("#DieArrowTail").animate({transform: 's0.0, s0.0',}, 0);}, function(){
			mapGroup.select("#DieArrowHead").animate({opacity: '1', transform: 't0, 0, 0'}, 500);
			mapGroup.select("#DieArrowTail").animate({transform: 's1.0, s1.0'}, 500);
		});
		//from oakland hover
		mapGroup.select("#OakSelector").hover(function(){
			mapGroup.select("#OakArrowHead").animate({opacity: '0', transform: 't30, 0, 0'}, 0);
			mapGroup.select("#OakArrowTail").animate({transform: 's0.0, s0.0',}, 0);}, function(){
			mapGroup.select("#OakArrowHead").animate({opacity: '1', transform: 't0, 0, 0'}, 500);
			mapGroup.select("#OakArrowTail").animate({transform: 's1.0, s1.0'}, 500);
		});
		// ----- END ARROW BUTTONS ----- 
		
		// ----- BEGIN HIGHWAY BUTTONS ----- 
		//880A hover
		mapGroup.select("#EightASelector").hover(function(){
			mapGroup.select("#EightAGlow").animate({opacity: '1.0',}, 300);}, function(){
			mapGroup.select("#EightAGlow").animate({opacity: '0.0',}, 300);
		});
		//880A click
		mapGroup.select("#EightASelector").click(function(){
			window.open("http://en.wikipedia.org/wiki/Interstate_880");
		});
		//880B hover
		mapGroup.select("#EightBSelector").hover(function(){
			mapGroup.select("#EightBGlow").animate({opacity: '1.0',}, 300);}, function(){
			mapGroup.select("#EightBGlow").animate({opacity: '0.0',}, 300);
		});
		//880B click
		mapGroup.select("#EightBSelector").click(function(){
			window.open("http://en.wikipedia.org/wiki/Interstate_880");
		});
		//W Grand Ave hover
		mapGroup.select("#GrandSelector").hover(function(){
			mapGroup.select("#GrandGlow").animate({opacity: '1.0',}, 300);}, function(){
			mapGroup.select("#GrandGlow").animate({opacity: '0.0',}, 300);
		});
		//W Grand Ave click
		mapGroup.select("#GrandSelector").click(function(){
			window.open("http://www.google.com/maps/place/W+Grand+Ave/@37.8156129,-122.2839454,17z/data=!4m2!3m1!1s0x80857e1e941344d7:0x304f8357af1b0df2");
		});
		//80 hover
		mapGroup.select("#EightCSelector").hover(function(){
			mapGroup.select("#EightCGlow").animate({opacity: '1.0',}, 300);}, function(){
			mapGroup.select("#EightCGlow").animate({opacity: '0.0',}, 300);
		});
		//80 click
		mapGroup.select("#EightCSelector").click(function(){
			window.open("http://en.wikipedia.org/wiki/Interstate_80");
		});
		//580 hover
		mapGroup.select("#EightDSelector").hover(function(){
			mapGroup.select("#EightDGlow").animate({opacity: '1.0',}, 300);}, function(){
			mapGroup.select("#EightDGlow").animate({opacity: '0.0',}, 300);
		});
		//580 click
		mapGroup.select("#EightDSelector").click(function(){
			window.open("http://en.wikipedia.org/wiki/Interstate_580_%28California%29");
		});
		// ----- END HIGHWAY BUTTONS ----- 
		
		/*demo
		snpGroup.click(function(){
			snpGroup.selectAll("path").forEach(function(elem, i){
				elem.animate({fill: 'black',}, 1000)
			});*/
	});
	
	//load key
	Snap.load("img/BayBridge_key.svg", function (key) {
		//set key below map
		keyTrans.translate(0, 220);
		//draw key
		keyGroup.append(key);
		//move key below map
		keyGroup.transform(keyTrans);
		
		//if not mobile
		if(!/(iPhone|iPod|iPad|BlackBerry|Android)/.test(navigator.userAgent)){
			//yellow lanes hover
			keyGroup.select("#ftYellowSelector").hover(function(){
				mapGroup.select("#FTyellow001").animate({fill: '#FFE000',}, 300);
				mapGroup.select("#FTyellow002").animate({fill: '#FFE000',}, 300);
				keyGroup.select("#ftYellowSelectorIcon").animate({fill: '#FFE000',}, 300);}, function(){
				mapGroup.select("#FTyellow001").animate({fill: '#FFFBD7',}, 300);
				mapGroup.select("#FTyellow002").animate({fill: '#FFFBD7',}, 300);
				keyGroup.select("#ftYellowSelectorIcon").animate({fill: '#FFFBD7',}, 300);
			});
			
			//red lanes hover
			keyGroup.select("#ftRedSelector").hover(function(){
				mapGroup.select("#FTred").animate({fill: '#FF0600',}, 300);
				keyGroup.select("#ftRedSelectorIcon").animate({fill: '#FF0600',}, 300);}, function(){
				mapGroup.select("#FTred").animate({fill: '#FFD7D4',}, 300);
				keyGroup.select("#ftRedSelectorIcon").animate({fill: '#FFD7D4',}, 300);
			});
			//drag button mouse down
			keyGroup.select("#dragButtonSelect").mousedown(function(){
				if(isDrag == 1)
					keyGroup.select("#dragButtonOn").animate({opacity: '0.0'}, 100);
				else
					keyGroup.select("#dragButtonOff_1_").animate({opacity: '0.0',}, 100);
				
				keyGroup.select("#dragButton").animate({fill: '#FFFFFF'}, 300);
			});
			//drag button mouse up
			keyGroup.select("#dragButtonSelect").mouseup(function(){
				if(isDrag == 1){
					mapGroup.undrag();
					keyGroup.select("#dragButtonOff_1_").animate({opacity: '1.0'}, 100);
					isDrag = 0;
				}
				else{
					mapGroup.drag();
					keyGroup.select("#dragButtonOn").animate({opacity: '1.0',}, 100);
					isDrag = 1;
				}
				
				keyGroup.select("#dragButton").animate({fill: '#D8D8D8'}, 300);
			});
			//merge button mouse down
			keyGroup.select("#mergeButtonSelect").mousedown(function(){
				if(isMergeStr == 0){
					keyGroup.select("#mergeButtonOff").animate({opacity: '0.0'}, 100);
				}
				else{
					keyGroup.select("#mergeButtonOn").animate({opacity: '0.0'}, 100);
				}
				
				keyGroup.select("#mergeButton").animate({fill: '#FFFFFF'}, 300);
			});
			//merge button mouse up
			keyGroup.select("#mergeButtonSelect").mouseup(function(){
				if(isMergeStr == 0){
					mapGroup.select("#mergeStrucA").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucB").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucC").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucD").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucE").animate({opacity: '1.0'}, 300);
					keyGroup.select("#mergeButtonOn").animate({opacity: '1.0'}, 100);
					isMergeStr = 1;
				}
				else{
					mapGroup.select("#mergeStrucA").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucB").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucC").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucD").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucE").animate({opacity: '0.0'}, 300);
					keyGroup.select("#mergeButtonOff").animate({opacity: '1.0'}, 100);
					isMergeStr = 0;
				}
				keyGroup.select("#mergeButton").animate({fill: '#D8D8D8'}, 300);
			});
			//fullscreen button mouse down
			keyGroup.select("#fullButtonSelect").mousedown(function(){
				keyGroup.select("#fullButton").animate({fill: '#FFFFFF'}, 300);
			});
			//fullscreen button mouse up
			keyGroup.select("#fullButtonSelect").mouseup(function(){
				if(isFullScrn == 0){
					$("#mapWrapper").css({"position": "fixed",
									"top": "0",
									"left": "0",
									"padding-top": "10%",
									"height": "100%",
									"width": "100%",
									"background": "white"});
					$("#svgWrapper").css("height","50%");
					isFullScrn = 1;
				}
				else{
					$("#mapWrapper").css({"position": "relative",
									"padding-top": "0",
									"background": "none"});
					$("#svgWrapper").css("height","255px");
					isFullScrn = 0;
				}
				
				keyGroup.select("#fullButton").animate({fill: '#D8D8D8'}, 300);
			});		
		}//end of if
		else{
			//yellow lanes click
			keyGroup.select("#ftYellowSelector").click(function(){
				if(yellowClick == 0){
					mapGroup.select("#FTyellow001").animate({fill: '#FFE000',}, 300);
					mapGroup.select("#FTyellow002").animate({fill: '#FFE000',}, 300);
					keyGroup.select("#ftYellowSelectorIcon").animate({fill: '#FFE000',}, 300);
					yellowClick = 1;
				}
				else{
					mapGroup.select("#FTyellow001").animate({fill: '#FFFBD7',}, 300);
					mapGroup.select("#FTyellow002").animate({fill: '#FFFBD7',}, 300);
					keyGroup.select("#ftYellowSelectorIcon").animate({fill: '#FFFBD7',}, 300);
					yellowClick = 0;
				}
			});
			//red lanes click
			keyGroup.select("#ftRedSelector").click(function(){
				if(redClick == 0){
					mapGroup.select("#FTred").animate({fill: '#FF0600',}, 300);
					keyGroup.select("#ftRedSelectorIcon").animate({fill: '#FF0600',}, 300);
					redClick = 1;
				}
				else{
					mapGroup.select("#FTred").animate({fill: '#FFD7D4',}, 300);
					keyGroup.select("#ftRedSelectorIcon").animate({fill: '#FFD7D4',}, 300);
					redClick = 0;
				}
			});
			//drag button click
			keyGroup.select("#dragButtonSelect").click(function(){
				if(isDrag == 1){
					mapGroup.undrag();
					keyGroup.select("#dragButtonOn").animate({opacity: '0.0'}, 100);
					keyGroup.select("#dragButtonOff_1_").animate({opacity: '1.0'}, 100);
					isDrag = 0;
				}
				else{
					mapGroup.drag();
					keyGroup.select("#dragButtonOn").animate({opacity: '1.0',}, 100);
					keyGroup.select("#dragButtonOff_1_").animate({opacity: '0.0',}, 100);
					isDrag = 1;
				}
				
				keyGroup.select("#dragButton").animate({fill: '#D8D8D8'}, 300);
			});
			//merge button click
			keyGroup.select("#mergeButtonSelect").click(function(){
				if(isMergeStr == 0){
					mapGroup.select("#mergeStrucA").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucB").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucC").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucD").animate({opacity: '1.0'}, 300);
					mapGroup.select("#mergeStrucE").animate({opacity: '1.0'}, 300);
					keyGroup.select("#mergeButtonOn").animate({opacity: '1.0'}, 100);
					keyGroup.select("#mergeButtonOff").animate({opacity: '0.0'}, 100);
					isMergeStr = 1;
				}
				else{
					mapGroup.select("#mergeStrucA").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucB").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucC").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucD").animate({opacity: '0.0'}, 300);
					mapGroup.select("#mergeStrucE").animate({opacity: '0.0'}, 300);
					keyGroup.select("#mergeButtonOff").animate({opacity: '0.0'}, 100);
					keyGroup.select("#mergeButtonOff").animate({opacity: '1.0'}, 100);
					isMergeStr = 0;
				}
			});
			//fullscreen button click
			keyGroup.select("#fullButtonSelect").click(function(){
				if(isFullScrn == 0){
					$("#mapWrapper").css({"position": "fixed",
									"top": "0",
									"left": "0",
									"padding-top": "10%",
									"height": "100%",
									"width": "100%",
									"background": "white"});
					$("#svgWrapper").css("height","50%");
					isFullScrn = 1;
				}
				else{
					$("#mapWrapper").css({"position": "relative",
									"padding-top": "0",
									"background": "none"});
					$("#svgWrapper").css("height","255px");
					isFullScrn = 0;
				}
			});	
		}
		
		
		
	});//end of load	
	
	//zoom map by mouse wheel
    $("#map").mousewheel(function (event) {
		if(event.deltaY > 0){
			snpReset = snpReset * (1.0/1.005);
			mapTrans.scale(1.005, 1.005, 618.12, 108);
			mapGroup.transform(mapTrans);
			return false;
		}else{
			snpReset = snpReset * (1.0/0.9945);
			mapTrans.scale(0.9945, 0.9945, 618.12, 108);
			mapGroup.transform(mapTrans);
			return false;
		}
	});
    
    //zoom in button
    $("#feZoomIn").click(function () {
		snpReset = snpReset * (1.0/1.25);
		mapTrans.scale(1.25, 1.25, 618.12, 108);
		mapGroup.transform(mapTrans);
	});	
	//zoom out button
	$("#feZoomOut").click(function () {
		snpReset = snpReset * (1.0/0.75);
		mapTrans.scale(0.75, 0.75, 618.12, 108);
		mapGroup.transform(mapTrans);
	});
	//zoom reset button
	$("#feZoomReset").click(function () {
		mapTrans.scale(snpReset, snpReset, 618.12, 108);
		mapGroup.transform(mapTrans);
		snpReset = 1.0;
	});
});