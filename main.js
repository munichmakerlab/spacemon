function getControls(id,lang) {
	$( '#box-' + id + ' .controls'  ).load( 'modules/' + id + '/controls.php?lang=' + lang );
}
function getContent(id) {
	$( '#content-' + id  ).load( 'modules/' + id + '/content.php?lang=' + lang + '&dev=' + dev);

}
function refreshmodule(id,lang) {
	getControls(id,lang);
}

// clock stuff

function setTime() {
	var d = new Date();
    $("#clock").html(d.toLocaleTimeString());
}
function closeAll() {
  	$(".box").removeClass("active");
  	$(".box").addClass("inactive");
  	$('html, body').animate({
	    scrollTop: 0
    }, 1000);
    $(".contentbox").html("");
}
function toggleContent(id) {
	if ($(id).parent().hasClass("active")) {
	  	closeAll();
	} else {
	  	contentid = $(id).parent().attr("id").replace("box-","");
	  	$(".box").removeClass("active");
	  	$(".box").addClass("inactive");
	  	$('#content-' + contentid ).html("<span class=\"contentloading\">Content loading</span>");
	  	$(id).parent().removeClass("inactive");
	  	$(id).parent().addClass("active");
	  	getContent(contentid);
	  	$('html, body').animate({
    	    scrollTop: $(id).offset().top
	    }, 1000);


	}
}
function randomizer() {
  	$("body").removeClass();
  	$("body").addClass("random" +  Math.floor((Math.random() * 10) + 1));



}
$( document ).ready(function() {
	$( "h2" ).click(function() {
		toggleContent(this);
	});
	randomizer();
	window.setInterval("randomizer();",60000);
});
 
