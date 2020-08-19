<!DOCTYPE html>
<html>
<head>
<meta "charset=utf-8" />
<title>Untitled Document</title>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="notifyfunction.js"></script>
<script src="ajax/function.js"></script>
</head>

<body>

<button onclick="javascript:shownotif();">Test Show Notify</button><br>
<button onClick="javascript:show();">ตรวจสอบก่อน Notify</button><br>
<button onClick="javascript:request();">แสดงสินธิ ว่า Notify ได้ไหม</button><br>
<hr>
<button onClick="javascript:notifyMe();">Notify and Link to Application</button><br>
<button onClick="javascript:spawnNotification();">Notify and Link to Application and auto close</button><br>
<button onClick="javascript:openWord('fileword.docx');">Open file word</button><br>
<button onClick="javascript:myFunction();">Open Window Instant</button><br>
<button onclick="openWin();">Open "myWindow"</button>
<button onclick="closeWin();">Close "myWindow"</button><br>
<button onClick="javascript:openMywWin();">Open MyWindows</button><br>
<button onClick="javascript:closemyindex();">Close App</button>
<button onClick="javascript:windowslocationtest();">Windows Location</button>
<hr>
<button onClick="javascript:notify();">Notify and Link to Application2</button><br>
<button onClick="javascript:notifyMe2();">Notify and Link to Application3</button><br>

<A HREF="javascript:onClick=Minimize()">Minimize</A>
<A HREF="javascript:onClick=Maximize()">Maximize</A> 


<script>

//setInterval(show2(), 3000); // 1000 = 1 second
//setInterval(function(){ alert("Hello"); }, 3000);

/*setInterval(function(){ 
  var mytxt ='Test this this';
  new window.Notification(mytxt); 
}, 3000); //ให้แสดง popup alert ทุก 3 วินาที
*/

 /*
 notify('title', {
    body: 'Notification Text',
    icon: 'path/to/image.png',
    onclick: function(e) {}, // e -> Notification object
    onclose: function(e) {},
    ondenied: function(e) {}
 });
 
 var options = {
  body: 'Do you like my body?',
  noscreen: true
}

var n = new Notification('Test notification',options);

n.noscreen // should return true
 
 */

function shownotif(){
  var mytxt ="Test this this";
  new window.Notification(mytxt);			
}

function notifyMe() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('Notification title', {
      icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
      body: "Hey there! You've been notified!",
    });

    notification.onclick = function () {
      //window.open("http://stackoverflow.com/a/13328397/1269037");  
	  //window.open("index.php");
	  window.open("C:\Users\<username>\AppData\Local\Google\Chrome\Application\chrome.exe  --app-id=iafbpjhdfblgncoahannldojojlkknmf");
	  //"C:\Program Files (x86)\Google\Chrome\Application?app-id=iafbpjhdfblgncoahannldojojlkknmf"); //Default --app-id=iafbpjhdfblgncoahannldojojlkknmf");  
	  //notification.hide();  
	  //notification.cancel();
	  notification.close(); 
    };

  }

}

function notify(){

if (Notification.permission !== "granted") {
Notification.requestPermission();
}
 else{
var notification = new Notification('hello', {
  body: "Hey there!",
});
notification.onclick = function () {
  window.open("http://google.com");
  //notification.hide(); 
  //notification.cancel();
  notification.close();
};
}
}

function spawnNotification(theBody,theIcon,theTitle) {
	
  //var dts = Date.now(); //Math.floor(Date.now());	
  var theTitle = "Day jakkrit Notify";	
  var options = {
      body: "Day Jakkrit Nodify", //theBody
      icon: "http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png",  //theIcon
	  //noscreen: true,
	  //renotify: true,
	  //silent: true,
	  sound: 'audio/alert.mp3'
	  //timestamp: dts
  }

  var n = new Notification(theTitle,options);
  //n.noscreen // should return true ตรวจสอบว่า มีการแสดงบนหน้าจอแจ้ว
  //n.renotify // should return true
  //n.silent // should return true
   n.sound // should return 'audio/alert.mp3'
  //n.timestamp // should return original timestamp
  
  setTimeout(n.close.bind(n), 4000);
   
}

function myFunction() {
    var myWindow = window.open("", "MsgWindow", "width=200,height=100");
    myWindow.document.write("<p>This is 'MsgWindow'. I am 200px wide and 100px tall!</p>");
}

 function openWord(file) {
    try {
        var objword = new ActiveXObject("Word.Application");
    } catch (e) {
        alert(e + 'Cannot open Word');
    }

    if (objword != null) {
        objword.Visible = true;
        objword.Documents.Open(file);
    }
}

var myWindow;

function openWin() {
    myWindow = window.open("", "myWindow", "width=200,height=100");
    myWindow.document.write("<p>This is 'myWindow'</p>");
}

function closeWin() {
    myWindow.close();
}

function openMywWin(){
var myWindow = window.open("", "myWindow", "width=200,height=100");   // Opens a new window
myWindow.document.write("<p>This is 'myWindow'</p>");   // Text in the new window
myWindow.opener.document.write("<p>This is the source window!</p>");  // Text in the window that created the new window	
}

function closemyindex(){
	//AppWindow.close();
	for(var i = 0; i < windows.length; i++){
    	windows[i].close()
	}
}

function Minimize()
{
window.innerWidth = 100;
window.innerHeight = 100;
window.screenX = screen.width;
window.screenY = screen.height;
alwaysLowered = true;
}

function Maximize()
{
window.innerWidth = screen.width;
window.innerHeight = screen.height;
window.screenX = 0;
window.screenY = 0;
alwaysLowered = false;
}

function windowslocationtest(){
	alert(window.location.href);
	alert(document.title);	
}

</script>
</body>
</html>