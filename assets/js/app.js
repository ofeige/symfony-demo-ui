require('../css/app.scss');
var $ = require('jquery');
require('popper.js');
require('bootstrap');
require('font-awesome/css/font-awesome.css');

/*
var AUTOBAHN_DEBUG = true;

var autobahn = require('autobahn');

var connection = new autobahn.Connection({
    url: 'ws://192.168.56.151:8081/',
    realm: 'realm1',
    on_user_error: function (error, customErrorMessage) {
        console.log('on_user_error: ' + error + ' ' + customErrorMessage);
    },
    on_internal_error: function (error, customErrorMessage) {
        console.log('Error: ' + error + ' ' + customErrorMessage);
    }
});

window.connection = connection;

connection.onopen = function (session, details) {
    document.getElementById('wsStatus').innerHTML = '-- connected ---<br/>AuthId: ' + details.authid + '<br/>AuthRole: ' + details.authrole;
    document.getElementById('btConnect').disabled = true;
    document.getElementById('btDisconnect').disabled = false;

    // 1) subscribe to a topic
    function onevent(args, kwargs, details) {
        session.log("Got event, publication ID " +
            details.publication + ", publisher " +
            details.publisher + ": " + args[0])
        session.log(details);
    }
    session.subscribe('com.chat.hello', onevent, {disclose_publisher: true}, {disclose_publisher: true});
};

connection.onclose = function (reason, message) {
    if(reason == 'closed') {
        msg = 'connection closed <b>manually</b>';
    }
    else if(reason == 'lost') {
        msg = 'connection closed <b>lost connection</b>';
    }
    else {
        msg = reason;
    }
    document.getElementById('wsStatus').innerHTML = msg;
    document.getElementById('btConnect').disabled = false;
    document.getElementById('btDisconnect').disabled = true;
};

window.ws_ping = function() {alert(document.getElementById('wsPing').innerHTML);
    connection.session.call('chat24.rpc.ping').then(
        function (res) {
            document.getElementById('wsPing').innerHTML = res;
        },
        function (err) {
            console.log("error:", err);
        }
    );
}

window.ws_time = function() {
    connection.session.call('chat24.rpc.time').then(
        function (res) {
            document.getElementById('wsTime').innerHTML = res;
        },
        function (err) {
            console.log("error:", err);
        }
    );
}

window.ws_add = function(num1, num2) {
    connection.session.call('chat24.rpc.add', [num1, num2]).then(
        function (res) {
            document.getElementById('wsAdd').innerHTML = res;
        },
        function (err) {
            console.log("error:", err);
        }
    );
}

window.ws_div = function(num1, num2) {
    connection.session.call('chat24.rpc.div', [num1, num2]).then(
        function (res) {
            document.getElementById('wsDiv').innerHTML = res;
        },
        function (error) {
            document.getElementById('wsDiv').innerHTML = error.args;
            console.log("error:", error);
        }
    );
}

window.ws_subscribe = function(args, kwargs, details) {
    document.getElementById('wsOutput').innerHTML += args + '<br/>';
    console.log(details);
}

window.ws_chat = function(msg) {
    var options = {acknowledge: true, exclude_me: false, disclose_publisher: false};
    connection.session.publish('chat24.all', [msg], {}, options).then(connection.session.log);
}

connection.open();

*/