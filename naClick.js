$(window).load(function(){

	var popx = 0, popy = 0, winx = 0, winy = 0, duration = 400, sended = false;
	$("#overlay,#popup").css({opacity: 0});
	
	function show(){
		$("#overlay, #popup").css({'display':'block'});
		$("#overlay, #popup").animate({opacity: 0.9}, duration);
	}
	
	function hide(){
		$("#overlay,#popup").animate({opacity: 0}, duration, function(){
			$(this).css({'display':'none'}); 
			clear();
		});
	}
	
	function clear(){
		$(".inp-txt").attr({value:''});
	}
	
	function size(){
		popx = $("#popup").outerWidth();
		popy = $("#popup").outerHeight();
		winx = $(window).width();
		winy = $(window).height();
	}
	
	function position(){
		size();
		var x = winx/2 - popx/2;
		var y = winy/2 - popy/2;
		$("#popup").css({ 'top': y, 'left': x });
	}
	
	function checksend(table, error, occasion){
		$(table).find('.required').each( function(){ 
			if ($(this).val() == '') { 
				alert('Вы не заполнили поле "'+$(this).attr('name')+'"!'); 
				error = true;
			}
		});		
		if(error!=true){
			var massive = $(table).serialize();
			$.post( template_path+"/order-form.php", massive, function(data) {result(data, occasion);} );
		}
	}
	
	function result(data, occasion){
		sended = true;
		$("form").css({'display':'none'});
		$("#close").css({'display':'none'});
		$("#thanks").css({'display':'block'});
		position();
		if (occasion == 2) {position(); show();}
		
		setTimeout(function() {
			hide();
		} ,1500);
	}

	$(".btn1").click(function(){
		position(); show(); 
	});
	
	$(".btn3").click(function(){
		var error = false;
		var table = "#form3";
		var occasion = 2;
		if (sended == false) checksend(table, error, occasion);
		clear();
	});
	
	$(".btn2").click(function(){		
		var error = false;	
		if ($("#table1").css('display') != 'none') {var table = "#form1";} else {var table = "#form2";}
		checksend(table, error);	
	});
	
	$("#close").click(function(){
		hide();
	});
	
	$("#overlay").click(function(){
		hide(); 
	});
	
	$(window).resize(function(){
		position();
	})
});