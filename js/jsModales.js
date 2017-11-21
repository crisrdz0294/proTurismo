function modalRegistro() {
	var modal = document.getElementById('myModal');
	var span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
	span.onclick = function() {
    	modal.style.display = "none";
	}

	window.onclick = function(event) {
    	if (event.target == modal) {
        	modal.style.display = "none";
    	}
	}

	$(document).bind('keydown',function(e){
		if ( e.which == 27 ) {
            modal.style.display = "none";
        };
	});
}