var DEBUG = true; 

function debug_log(str) {
	if(DEBUG) {
		$("#debug_log_window").html(str);
	}
}

function initGridSystem() {

	$("#canvas").css({
		"background":"-moz-linear-gradient(top, transparent "+(YHB.gridSize-0.5)+"px, #eee "+YHB.gridSize+"px), \
            		  -moz-linear-gradient(left,transparent "+(YHB.gridSize-0.5)+"px, #eee "+YHB.gridSize+"px)",
		"background-size": ""+YHB.gridSize+"px "+YHB.gridSize+"px", 
		"display":"block"});

}

function setCurrentComId(comid) {
	YHB.previousComId = YHB.currentComId;
	YHB.currentComId = comid;
}


jQuery.fn.outerHTML = function(s) {
    return s
        ? this.before(s).remove()
        : jQuery("<p>").append(this.eq(0).clone()).html();
};
