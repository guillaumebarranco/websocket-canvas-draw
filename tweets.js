var Twit = require('twit');

var config = require('./config.json').twitter;

console.log(config);

var T = new Twit({
	  consumer_key:         config.consumer_key,
	  consumer_secret:      config.consumer_secret,
	  access_token:         config.access_token,
	  access_token_secret:  config.access_token_secret,
	  timeout_ms:           60*1000,  // optional HTTP request timeout to apply to all requests.
});


T.get('search/tweets', {

	q: 'banana since:2011-07-11',
	count: 100

}, function(err, data, response) {
	console.log(data);
});

