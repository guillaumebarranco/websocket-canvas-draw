var Twit = require('twit')

var T = new Twit({
	  consumer_key:         '...',
	  consumer_secret:      '...',
	  access_token:         '...',
	  access_token_secret:  '...',
	  timeout_ms:           60*1000,  // optional HTTP request timeout to apply to all requests.
})


T.get('search/tweets', {

	q: 'banana since:2011-07-11',
	count: 100

}, function(err, data, response) {
	console.log(data);
}

