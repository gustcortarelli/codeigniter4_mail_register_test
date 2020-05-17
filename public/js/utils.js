function loadScripts(srcScript){
    let script = document.createElement('script');
    script.src = srcScript;
    script.async = true;
    document.body.append(script);
}

function getReturnedMessage(message) {
    let alertMessage = message;
    if(Array.isArray(message)) {
        alertMessage = message.join("<br/>");
    } else if(message instanceof Object) {
        alertMessage = [];
        for (i in message) {
            alertMessage.push(message[i]+"<br>");
        };
    }
    return alertMessage;
}