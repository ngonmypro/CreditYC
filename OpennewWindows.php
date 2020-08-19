<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function openw1(){
	 	var myWindow = window.open("", "MsgWindow", "fullscreen='yes'"); //window.open(src, 'newWin', 'fullscreen="yes"')
    	myWindow.document.write("<p>This is 'MsgWindow'. I am 200px wide and 100px tall!</p>");
	}
</script>
</head>

<body onLoad="javascript:openw1();">
	
</body>
</html>