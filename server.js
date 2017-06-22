
  var io;
  io = require('socket.io').listen(4000, () => {
    console.log('listening on port 4000');
  });
  io.sockets.on('connection', function(socket) {
    console.log('okok');
    socket.on('drawClick', function(data) {
      socket.broadcast.emit('draw', {
        x: data.x,
        y: data.y,
        type: data.type
      });
    });
  });

  console.log('ok');