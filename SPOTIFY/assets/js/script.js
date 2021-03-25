var currentPlaylist = array();
var audioElement;


//class in js
function Audio() {
//variables
	this.currentlyPlaying;
	this.audio = document.createElement('audio');

//methods
	this.setTrack = function(src) {
		this.audio.src = src;
	}	

}