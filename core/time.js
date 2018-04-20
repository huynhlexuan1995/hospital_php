function run(){
	run_start = setInterval(function(){
		width = $("#slider > div > div").css("width");
		$("#slider > div").animate({marginLeft: '-' + width},1000,function(){
			$('#slider > div div:last-child').after($('#slider > div div:first-child'));
			$(this).css("margin-left","0px");
		});
	},5000);
}
	
function stop(){
		clearInterval(run_start);
}

run();