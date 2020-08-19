// JavaScript Document
function show2(){
  new window.Notification('This is a test');
}

function request(){
	window.Notification.requestPermission(function() {
        alert('Permissions state: ' + window.Notification.permission);
    });
}

function show(){
	if(window.Notification.permission !== 'granted') {
            alert('Permissions hasnt been granted');
        }

        new window.Notification('This is a test');        
}


$(function() {

    $('.request').on('click', function() {
        window.Notification.requestPermission(function() {
            alert('Permissions state: ' + window.Notification.permission);
        });
    });

    $('.show').on('click', function() {

        if(window.Notification.permission !== 'granted') {
            alert('Permissions hasnt been granted');
        }

        new window.Notification('This is a test');        
    });    

})
