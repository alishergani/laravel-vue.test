const http = require('http').Server();
const io = require('socket.io')(http);
const Redis = require('ioredis');

const redis = new Redis();
redis.subscribe('news-action');
redis.on('message', function(channel, message) {
	console.log('Message:' + message);
	console.log('Channel:' + channel);
	message = JSON.parse(message);
	io.emit(channel + ':' + message.event, message.data);
})


http.listen(8000, function() {
	console.log('Server on port: /8000');
})