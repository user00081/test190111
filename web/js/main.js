var Printer = {
    targetElementId: "",
    setTargetElement: function ( elementId ) {
        this.targetElementId = elementId;
        this.displayWaiting();
    },
    displayWaiting: function() {
        document.getElementById(this.targetElementId).classList.add("waiting");
    },
    removeWaiting: function() {
        document.getElementById(this.targetElementId).classList.remove("waiting");
    },
    displayContent: function( content ) {
        this.removeWaiting();
        document.getElementById( this.targetElementId ).innerHTML = content;
    }
};

var Ajax = {
    endpoint: "",
    encodePostParams: function(data) {
        return typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]); }
        ).join('&');
    },
    simpleSendRequest: function(params) {
        Printer.setTargetElement("results");
        var xhttp =  window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        xhttp.open("POST", this.endpoint, true);
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState>3 && xhttp.status==200) {
                Printer.displayContent(xhttp.responseText);
            }
        };
        xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
        xhttp.send(params);
        console.log("From Ajax.simpleSendRequest(): "+params);
        console.log(xhttp);
    },
    performRequest: function(arr) {
        var encodedParams = this.encodePostParams(arr);
        this.endpoint = "http://heroku.devel/endpoint.php";
        this.simpleSendRequest(encodedParams);
    }
};

var CollectURLs = {
    isTouchDevice: function() {
        return (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch)?true:false;
    },
    selectEvent: function() {
        return this.isTouchDevice()?"touchend":"click";
    },
    getInputText: function(id) {
        return document.getElementById(id).value;
    },
    URLRegExPattern: function() {
        return new RegExp("^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?");
    },
    isURL: function(inputText) {
        return this.URLRegExPattern().test(inputText)?true:false;
    },
    attachEvent: function(id) {
        var event = this.selectEvent();
        document.getElementById(id).addEventListener(event, function( e ){
            var url1 = CollectURLs.getInputText("url1");
            var url2 = CollectURLs.getInputText("url2");
            if (CollectURLs.isURL(url1) && CollectURLs.isURL(url2)) {
                e.preventDefault();
                paramObj = { url1: url1, url2: url2 };
                Ajax.performRequest(paramObj);
                console.log("From CollectURLS.attachEvent(): url1="+url1+"&url2="+url2);
            } else {
                alert("Please check URL syntax before submitting compare request!");
            }
        }, true);
    }
};

window.addEventListener( "load", function() {
    console.log("init");
    CollectURLs.attachEvent("compare-trigger");
}, true );