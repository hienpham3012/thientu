var http = require("http");
var server = http.createServer(function(request, response) {
  response.write("Xin chào!");
  response.end();
});

server.listen(8080);
console.log("NodeJS Server đang chạy trên cổng 8080");