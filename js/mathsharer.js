var maxEditorHeight = 500,
    minEditorHeight = 100; // in pixel
var Preview = {
    delay: 100, // delay after keystroke before updating

    preview: null, // filled in by Init below
    buffer: null, // filled in by Init below

    timeout: null, // store setTimout id
    mjRunning: false, // true when MathJax is processing
    mjPending: false, // true when a typeset has been queued
    oldText: null, // used to check if an update is needed

    //
    //  Get the preview and buffer DIV's
    //
    Init: function() {
        this.preview = document.getElementById("MathPreview");
        this.buffer = document.getElementById("MathBuffer");
    },

    //
    //  Switch the buffer and preview, and display the right one.
    //  (We use visibility:hidden rather than display:none since
    //  the results of running MathJax are more accurate that way.)
    //
    SwapBuffers: function() {
        var buffer = this.preview,
            preview = this.buffer;
        this.buffer = buffer;
        this.preview = preview;
        buffer.style.visibility = "hidden";
        buffer.style.position = "absolute";
        preview.style.position = "";
        preview.style.visibility = "";
    },

    //
    //  This gets called when a key is pressed in the textarea.
    //  We check if there is already a pending update and clear it if so.
    //  Then set up an update to occur after a small delay (so if more keys
    //    are pressed, the update won't occur until after there has been 
    //    a pause in the typing).
    //  The callback function is set up below, after the Preview object is set up.
    //
    Update: function() {
        if (this.timeout) {
            clearTimeout(this.timeout)
        }
        this.timeout = setTimeout(this.callback, this.delay);
    },

    //
    //  Creates the preview and runs MathJax on it.
    //  If MathJax is already trying to render the code, return
    //  If the text hasn't changed, return
    //  Otherwise, indicate that MathJax is running, and start the
    //    typesetting.  After it is done, call PreviewDone.
    //  
    CreatePreview: function() {
        Preview.timeout = null;
        if (this.mjPending) return;
        var text = document.getElementById("textarea").value;
        text = text.replace(/(\r\n|\n)/g, "<br />");
        if (text === this.oldtext) return;
        if (this.mjRunning) {
            this.mjPending = true;
            MathJax.Hub.Queue(["CreatePreview", this]);
        } else {
            this.buffer.innerHTML = this.oldtext = text;
            this.mjRunning = true;
            MathJax.Hub.Queue(
                ["Typeset", MathJax.Hub, this.buffer], ["PreviewDone", this]
            );
        }
    },

    //
    //  Indicate that MathJax is no longer running,
    //  and swap the buffers to show the results.
    //
    PreviewDone: function() {
        this.mjRunning = this.mjPending = false;
        this.SwapBuffers();
    }

};

//
//  Cache a callback to the CreatePreview action
//
Preview.callback = MathJax.Callback(["CreatePreview", Preview]);
Preview.callback.autoReset = true; // make sure it can run more than once

var textArea = document.getElementById('textarea');
var sendText = new XMLHttpRequest();
// on keyup in textarea
textArea.addEventListener('keyup', function(e) {
    conf.isTyping = true;
    conf.typingTime = Math.floor(new Date / 1000);
    var content = document.getElementById('textarea').value;
    // send content from textarea 
    sendText.open('POST', 'action.php?user=' + conf.user + '&state=send&type=math', true);
    var formData = new FormData();
    formData.append('data', content);
    sendText.send(formData);
    // update mathjax preview
    Preview.Update();

    sendText.onreadystatechange = function() {}
    // expand textarea
    resizeTextarea(this);
});
// Typing checker
var typingCheck = function() {
    var curtime = Math.floor(new Date / 1000);
    if (conf.isTyping && (curtime - conf.typingTime) >= 1) {
        conf.isTyping = false;
        conf.typingTime = 0;
    }
    clearTimeout(atld);
    var atld = setTimeout(function() {
        typingCheck();
    }, 1);
}
typingCheck();
var sendReq = new XMLHttpRequest();
var reqData = function() {
    var content = document.getElementById('textarea').value;
    // send content to validate 
    sendReq.open('POST', 'action.php?user=' + conf.user + '&state=get&type=math', true);
    var formData = new FormData();
    formData.append('data', content);
    sendReq.send(formData);
    sendReq.onreadystatechange = function() {
        if (sendReq.readyState === 4 && sendReq.status === 200 && !conf.isTyping) {
            document.getElementById('textarea').value = sendReq.responseText;

            // update mathjax preview
            Preview.Update();

            var Frm = document.getElementById('textarea');
            // expand textarea
            resizeTextarea(Frm);
            // call reqData() function again 
            clearTimeout(fdre);
            var fdre = setTimeout(function() {
                reqData();
            }, 1);
        } else {
            // call reqData() function again
            clearTimeout(fdre);
            var fdre = setTimeout(function() {
                reqData();
            }, 1);
        }
    }
}
reqData();
Preview.Init();
Preview.Update();

function clearEditor() {
    var sendReset = new XMLHttpRequest();
    var textBox = document.getElementById('textarea');
    textBox.value = '';
    // send data
    sendReset.open('POST', 'action.php?user=' + conf.user + '&state=send&type=math', true);
    var formData = new FormData();
    formData.append('data', '');
    sendReset.send(formData);
    // update mathjax preview
    Preview.Update();

    sendReset.onreadystatechange = function() {}
    // resize textarea
    resizeTextarea(textBox);
}

function saveAsPdf() {
    var doc = new jsPDF();
    // All units are in the set measurement for the document
    // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
    doc.fromHTML($('.mathpreview').get(0), 15, 15, {
        'width': 170
    });
    doc.save('math' + conf.user + '.pdf');
}

function resizeTextarea(t) {
    var textBox = document.getElementById('textarea'),
        iH = 0;
    textBox.style.height = 0;
    if (textBox.scrollHeight < minEditorHeight) {
        iH = minEditorHeight;
    } else if (textBox.scrollHeight > minEditorHeight && textBox.scrollHeight <= maxEditorHeight) {
        iH = textBox.scrollHeight;
    } else {
        iH = maxEditorHeight;
    }
    textBox.style.height = iH + 'px';
    textBox.style.overflow = (textBox.scrollHeight > maxEditorHeight) ? 'auto' : 'hidden';
}
// on content load
window.onload = function() {
    var textBox = document.getElementById('textarea');
    resizeTextarea(textBox);
}