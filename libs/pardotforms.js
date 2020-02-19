var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
eventer(messageEvent, function(e) {
	if (isNaN(e.data)) return;
	document.getElementById('intercom').style.height = e.data + 'px';
}, false);