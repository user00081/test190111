var Ajax = {
    encodeJSONparams: function(arr) {
        return JSON.stringify(arr);
    },
    simpleSendRequest: function(params) {
        xhttp.open("POST", "index.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(params);
    },
    performRequest: function(arr) {
        var encodedParams = this.encodeJSONparams(arr)
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
        document.getElementById(id).addEventListener(event, function(){
            var url1 = CollectURLs.getInputText("url1");
            var url2 = CollectURLs.getInputText("url2");
            if (CollectURLs.isURL(url1) && CollectURLs.isURL(url2)) {
                console.log("test passed");
                Ajax.performRequest([url1, url2]);
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


