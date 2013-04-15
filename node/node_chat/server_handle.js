var chatMultiApp = require('http').createServer(handleMultiChat);
var url = require('url');
var io = require('socket.io').listen(chatMultiApp);
var fs = require('fs');

chatMultiApp.listen(8056);
 
var connectedClients = [];
var userList = [];
var userBranch = {}; //Este json contendra los usuarios agrupados por sucursal.

Object.prototype.size = function () {
  var len = this.length ? --this.length : -1;
    for (var k in this)
      len++;
  return len;
}

function readMessagesAll(socket,data)
{
   var date = new Date();
   var file = 'Hashtag/'  + data.idParent + "-" +  date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate()+'.txt';
   socket.emit('writeMessagesAll',fs.readFileSync(file,"utf-8").toString());
}

function newMsg(socket, data) {
 if(connectedClients.hasOwnProperty(data.from)) {
  var clientFrom = connectedClients[data.from];
  if(data.from == clientFrom.userName) {
    if(data.type == 'PRIVATE') {
     for(client in connectedClients) {
      if(connectedClients[client].userName == data.to)
        SendMessagesToSoket(connectedClients[client].socket,data);
      else if(connectedClients[client].userName == data.from)
        SendMessagesToSoketMe(socket.id,connectedClients[client].socket,data);
     }
    } else {
        console.log('-------------');
        console.log(userBranch[data.idParen]);
        console.log('-------------');
        var date = new Date();
        data['userName'] = userBranch[data.idParen][data.from].userName;
        var file = 'Hashtag/'  + data.idParen + "-" +  date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate()+'.txt';
        var SendObj = {};
        var fd = fs.openSync(file, 'a+', 777);
        fs.writeSync(fd, JSON.stringify(data) + '$\n');
        fs.closeSync(fd);
        
        SendObj['Hashtag'] = fs.readFileSync(file,"utf-8").toString() + JSON.stringify(data) + '$\n';
        SendObj['data'] = data; 
        SendObj['type'] = data.type;
        for(user in userBranch[data.idParen]){
            SendMessagesToSoket(connectedClients[user].socket,SendObj);
        }
    }
    }
  }
}
function SendMessagesToSoketMe(socketid,data,DataSend)
{
  for(socket in data)
  {
    if(socket != 'size' && socketid != data[socket].id)
      data[socket].emit('MessageMe',DataSend);
  } 
}
function SendMessagesToSoket(data,DataSend)
{
  for(socket in data)
  {
    if(socket != 'size')
    data[socket].emit('msg',DataSend);
  }
}
 
function handleMultiChat(request, response) {
 var args = url.parse(request.url, true);
 var queryString = args.query;
   
  if(request.url == "/login") {
    response.end("TODO... SOON... ");
  }
  
 if(queryString.hasOwnProperty("user")) {
  if(queryString.user == "test" && queryString.pass == "test") {
   response.writeHead(200);
   var debugData = {};
   debugData.users = connectedClients;
   debugData.userNames = userList;
   response.end(JSON.stringify(debugData));
  }
 } else {
  response.writeHead(404);
  response.end("404 NOT FOUND");
 }
}
 
function assignUserName(userName, Socket, idParent) {
 connectedClients[userName] = {};
 connectedClients[userName].socketid = Socket.id;
 connectedClients[userName].socket = {};
 connectedClients[userName].socket[connectedClients[userName].socket.size()] = Socket;
 connectedClients[userName].userName = userName;
 connectedClients[userName].idParent = idParent;

}
 
function isUserNameAvailable(userName) {
  if(connectedClients.hasOwnProperty(userName))
    return false;
  else
    return true;
}

function ValidExistBranch(idParen)
{
   if(!userBranch.hasOwnProperty(idParen)){
      userBranch[idParen] = {};
   }   

    
}
 
function makeUserList() {
 userList = [];
  var i = 0;
 for(var client in connectedClients) {
  userList[i] = {"userName" : connectedClients[client].userName};
    i++;
 }
}

io.sockets.on('connection', function(socket) {
  
  
 socket.on('authData', function(data) {
      ValidExistBranch(data.idParent);
      if(isUserNameAvailable(data.userEmail) == true) {
        console.log(data.userIP);
       userBranch[data.idParent][data.userEmail] = {"userIP":data.userIP,"userName" : data.userName, "userEmail":data.userEmail, "userType":data.userType};
       userList.push({"userEmail" : data.userEmail});
       assignUserName(data.userEmail, socket,data.idParent);

       var SendObj = {};
       var date = new Date();
       var file = 'Hashtag/' + data.idParent + "-" + date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate()+'.txt';
       if (!fs.existsSync(file))
        fs.writeFile('Hashtag/' + data.idParent + "-" + date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate()+'.txt', '');

       SendObj['userList'] = userBranch[data.idParent];


       for(user in userBranch[data.idParent])
       {
          if(user != 'size')
          {
           for(soc in connectedClients[userBranch[data.idParent][user].userEmail].socket)
           {
             if(soc != 'size')
              connectedClients[userBranch[data.idParent][user].userEmail].socket[soc].emit('userList', userBranch[data.idParent]);
           }
         }
       }
      } else{
         connectedClients[data.userEmail].socket[connectedClients[data.userEmail].socket.size()] = socket;
         socket.emit('userList', userBranch[data.idParent])
      }
 });
  
 socket.on('msg', function(data) {
  newMsg(socket, data);
 });
 
 socket.on('readMessagesAll',function(data){
  readMessagesAll(socket,data);
 });

 socket.on('disconnect', function(data) {
  var sw = false; // 
  var parent = undefined;
  var email;
  loop1:
  for(user in connectedClients)
  {
    if(user != 'size')
    {
      loop2:
      for(soc in connectedClients[user].socket)
      {
        if(soc != 'size')
        { 
          if(connectedClients[user].socket[soc].id == socket.id) 
          {
            delete connectedClients[user].socket[soc];
            parent = connectedClients[user].idParent;
            email = user;
            if(connectedClients[user].socket.size() == 0)
            {
              delete userBranch[parent][email]; 
              sw = true;
            }
            break loop1;
          }
        } 
      }
    }
    
  }
  if(sw)
  {  
    for(branch in userBranch[parent])
    {
      if(branch != 'size')
      {
        sw = false; 
        for(soc in connectedClients[branch].socket) 
        {
          if(soc != 'size')
            connectedClients[branch].socket[soc].emit('userList', userBranch[parent]);
        }
      }
    }
  }  
  if(sw)delete userBranch[parent];
  if(connectedClients[email] != undefined)
  {
    if(connectedClients[email].socket.size() == 0)
      delete connectedClients[email];
  }
 });
});