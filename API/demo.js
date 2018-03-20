	const url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&interval=30min&symbol=NKE&apikey=2WK5AEMHKZZFGRIK';
	function getAlphaVantagedata() {
		const symbol = inpSymbol.value;
		const url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=' + symbol + '&interval=30min&apikey=2WK5AEMHKZZFGRIK';
		requestFile( url );
	}
	function requestFile( url ) {
		const xhr = new XMLHttpRequest();
		xhr.open( 'GET', url, true );
		xhr.onerror = function( xhr ) { console.log( 'error:', xhr  ); };
		xhr.onprogress = function( xhr ) { console.log( 'bytes loaded:', xhr.loaded  ); }; /// or something
		xhr.onload = callback;
		xhr.send( null );
		function callback( xhr ) {
		let response, json, lines;
		response = xhr.target.response;
		divContents.innerText = response;
	    }
	}