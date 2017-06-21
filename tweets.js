let Twit = require('twit');

var config = require('./config.json').twitter;

console.log(config);


var express = require('express');

var app = express();

app.get('/', function(req, res) {
    res.setHeader('Content-Type', 'text/plain');

    getTweets(function(response) {
	res.end(JSON.stringify(response));
	});
});

app.listen(2222);

function getTweets(callback) {
var T = new Twit({
	  consumer_key:         config.consumer_key,
	  consumer_secret:      config.consumer_secret,
	  access_token:         config.access_token,
	  access_token_secret:  config.access_token_secret,
	  timeout_ms:           60*1000,  // optional HTTP request timeout to apply to all requests.
});


T.get('search/tweets', {

	q: '#CCSPACESFAQ since:2011-07-11',
	count: 100

}, function(err, data, response) {
	console.log(data);
callback(data);
});
}



