firebase.initializeApp({
    messagingSenderId: '150045376761'
});

if ('Notification' in window) {
    var messaging = firebase.messaging();
    if (Notification.permission === 'granted') {
        subscribe();
    }    
    subscribe();    
}
function subscribe() {
    messaging.requestPermission()
        .then(function () {
            messaging.getToken()
                .then(function (currentToken) { 
                    if (currentToken) {
                        sendTokenToServer(currentToken);
                    } else {
                        setTokenSentToServer(false);
                    }
                })
                .catch(function (err) {
                    setTokenSentToServer(false);
                });
    }).catch(function (err) {
		
    });
}
function sendTokenToServer(currentToken) {
	
    if (!isTokenSentToServer(currentToken)) {
        var url = 'https://qalampir.uz/subscribe/save-token';
		var data = {
			token: currentToken,
			date: getDate(),
			lang: 'oz'
		};		
		$.ajax({
		  type: "POST",
		  url: url,
		  data: data,
		  success: function(resp) {}
		});
        setTokenSentToServer(currentToken);
    } else {
		
    }
}
function isTokenSentToServer(currentToken) {
    return window.localStorage.getItem('sentFirebaseMessagingToken') == currentToken;
}

function setTokenSentToServer(currentToken) {
    window.localStorage.setItem(
        'sentFirebaseMessagingToken',
        currentToken ? currentToken : ''
    );
}

function getLang() {
	if(str.indexOf("/uz/") == -1) {
		return 'oz';
	} else {
		return 'uz';
	}
}

function getDate() {
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; 
	var yyyy = today.getFullYear();
	if(dd < 10) {
		dd= '0' + dd;
	} 
	if(mm < 10) {
		mm = '0' + mm;
	} 
	return mm + '-' + dd + '-' + yyyy;
}