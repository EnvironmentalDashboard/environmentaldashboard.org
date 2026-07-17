const cookiesEnabled = navigator.cookieEnabled;

const cookieOverlay = document.getElementById('cookie-overlay');
if (cookiesEnabled)
    cookieOverlay.style.display = 'none';
else
    cookieOverlay.style.display = 'block';

const timeoutOverlay = document.getElementById('timeout-overlay');
const queueOverlay = document.getElementById('queue-overlay');
const initOverlay = document.getElementById('init-overlay');
const disconnectedOverlay = document.getElementById('disconnected-overlay');

let queueOverlayTimeout = null;

var sessionConn = null;
var uuid = getCookie('sessionUuid38');

function initSessionConn() {
    if (sessionConn === null) {
        const uuidExtension = uuid ? `?uuid=${uuid}` : '';

        sessionConn = new WebSocket("wss://oberlin.communityhub.cloud/digital-signage/websockets/session/38" + uuidExtension);
        // onclose will always fire when onerror does (https://stackoverflow.com/a/40084550/2624391)
        // so don't try reconnecting in both methods
        sessionConn.onerror = function () { return; }
        sessionConn.onclose = function () {
            document.getElementById('error-overlay').style.display = 'block';
            var secondsRemaining = document.getElementById('remaining');
            for (let seconds = 1; seconds <= 10; seconds++) {
                setTimeout(function () {
                    secondsRemaining.innerText = 10 - seconds;
                }, seconds * 1000);
            }
            sessionConn = null;
            setTimeout(initSessionConn, 10000);
        }
        sessionConn.onopen = function () {
            document.getElementById('error-overlay').style.display = 'none';
        }
        sessionConn.onmessage = sessionConnReceiver;
    }
}

function sessionConnReceiver(e) {
    var command = JSON.parse(e.data);

    if (command.type === 'restart') {
        location.reload(true);
    } else if (command.type === 'load') {
        location.href = command.controller;
    } else if (command.type === 'uuid') {
        // Make our cookie last 10 years (3650 days, estimated).
        uuid = command.uuid;
        setCookie('sessionUuid38', command.uuid, 3650);
    } else if (command.type === 'recode') {
        refreshNoClick();
    } else if (command.type === 'timeout') {
        timeout(command.until);
    } else if (command.type === 'queue') {
        if (command.position === 1) {
            unqueue();
        } else {
            queue(command.position, command.until);
        }
    } else if (command.type === 'initialized') {
        document.getElementById('init-overlay').style.display = 'none';
    } else if (command.type === 'displayConnected' && command.value === false) {
        document.getElementById('disconnected-overlay').style.display = 'block';

        setTimeout(() => {
            document.getElementById('disconnected-overlay').style.display = 'none';
        }, 10000);
    } else if (command.type === 'error') {
        // Probably should not silently fail later on.
        console.error(command.message);
    }
}

const timeout = unixUntil => {
    const until = new Date(unixUntil * 1000);

    timeoutOverlay.style.display = 'block';
    timeoutOverlay.innerHTML = timeoutOverlay.innerHTML.replace('a later time', until.toLocaleDateString('en-US') + ' ' + until.toLocaleTimeString('en-US'));
};

const queue = (position, unixUntil) => {
    const until = new Date(unixUntil * 1000);

    queueOverlay.style.display = 'block';
    document.getElementById('a-later-time').innerHTML = until.toLocaleDateString('en-US') + ' ' + until.toLocaleTimeString('en-US');
    document.getElementById('in-the-queue').innerHTML = 'in the queue at position ' + position;

    // When we are allowed, we will bring control back.
    queueOverlayTimeout = setTimeout(() => {
        queueOverlay.style.display = 'none';
    }, until.getTime() - (new Date()).getTime());
}

const unqueue = () => {
    clearTimeout(queueOverlayTimeout);
    queueOverlayTimeout = null;

    queueOverlay.style.display = 'none';
}


var clicked = function () {

    // This is a weird condition - not sure why it would exist.
    if (this.style.top === '15px') {
        return;
    }
    var button_id = this.getAttribute("data-id");
    var button_type = this.getAttribute("data-type");
    var button_active_image = this.getAttribute("data-active_src");
    var button_image = this.getAttribute("data-src");
    var that = this;
    that.style.top = '15px';
    that.style.opacity = '0.7';
    if (button_active_image !== '') {
        if ('/' + that.src.split('/').splice(3).join('/') === button_active_image) {
            that.src = button_image;
        } else {
            that.src = button_active_image;
        }
    }
    setTimeout(function () {
        that.style.top = '';
        that.style.opacity = '1';
    }, 1500);
    if (button_type === "2") {
        var fn = that.getAttribute('src').replace(/^.*[\\\/]/, '');
        if (fn === 'play.svg') {
            that.setAttribute('src', "\/digital\u002Dsignage\/images/pause.svg");
        } else {
            that.setAttribute('src', "\/digital\u002Dsignage\/images/play.svg");
        }
    }
    if (button_type === "buttonValues.TRIGGER_URL}}") {
        if (that.getAttribute('data-fullscreen') === '1') {
            location.href = that.getAttribute("data-url");
        } else {
            that.classList = 'animated slideOutUp';
            var subsection = document.getElementById(that.getAttribute('data-subsection'));
            subsection.style.display = 'initial';
            subsection.classList = 'animated slideInUp';
        }
    } else if (button_type === "buttonValues.TRIGGER_SUBSECTION}}") {
        var subsection = document.getElementById(that.getAttribute('data-subsection'));
        if (subsection.style.display === 'none') {
            subsection.style.display = '';
            subsection.classList = 'animated slideInUp';
        } else {
            subsection.classList = 'animated slideOutUp';
            subsection.addEventListener('animationend', function () {
                if (subsection.classList.value === 'animated slideOutUp') {
                    subsection.style.display = 'none';
                }
            });
        }
    } else {
        sessionConn.send(JSON.stringify({
            button: button_id
        }));
    }
}


var inIframe = function () {
    try {
        return window.self !== window.top;
    } catch (e) {
        return true;
    }
}
if (!inIframe() && cookiesEnabled) {
    initSessionConn();
}
if (cookiesEnabled) {
    var buttons = document.getElementsByTagName("IMG");
    for (var i = 0; i < buttons.length; i++) {
        var el = buttons[i];

        if (el.classList.contains('noclick'))
            continue;

        el.addEventListener('click', clicked, false);
        if (el.getAttribute("data-type") === "3") {
            if (inIframe()) {
                el.setAttribute('data-fullscreen', '1');
            } else {
                el.setAttribute('data-fullscreen', '0');
                var rand = Math.random().toString(36).substr(2, 9),
                    rand2 = Math.random().toString(36).substr(2, 9);
                var iframe = document.createElement("iframe");
                var button = document.createElement("button");
                iframe.src = el.getAttribute("data-url");
                iframe.style.border = 'none';
                iframe.style.height = '100%';
                iframe.style.width = '100%';
                iframe.style.position = 'absolute';
                iframe.style.top = '0px';
                iframe.style.left = '0px';
                iframe.id = rand;
                el.setAttribute('data-subsection', rand);
                el.id = rand2;
                iframe.setAttribute('data-subsection-trigger', rand2);
                iframe.classList = 'animated slideOutUp';
                button.innerText = 'Close';
                button.style = 'position:absolute;top:0;right:0;background:#5aba50;color:white;width:10%;height:12%;font-family:sans-serif;font-size:2vw;border:none;border-radius:3px;cursor:pointer';
                button.onclick = function () {
                    iframe.classList = 'animated slideOutUp';
                    var subsectionTrigger = document.getElementById(iframe.getAttribute('data-subsection-trigger'));
                    subsectionTrigger.style.display = 'initial';
                    subsectionTrigger.classList = 'animated slideInUp';
                }
                iframe.onload = function () {
                    this.contentWindow.document.getElementsByTagName('body')[0].appendChild(button);
                }
                document.getElementsByTagName('body')[0].appendChild(iframe);
            }
        } else if (el.getAttribute("data-type") === "6") {
            var iframe = document.createElement("iframe");
            iframe.src = el.getAttribute("data-url");
            iframe.style.border = 'none';
            iframe.style.height = '80vh';
            iframe.style.width = '100%';
            iframe.style.display = 'none';
            iframe.classList = 'animated slideOutUp';
            var rand = Math.random().toString(36).substr(2, 9);
            iframe.id = rand;
            el.setAttribute('data-subsection', rand);
            el.parentElement.parentElement.parentNode.insertBefore(iframe, el.parentElement.parentElement.nextSibling);
        }
    }
}


function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

const refreshNoClick = () => {
    const elements = document.getElementsByClassName('noclick');

    for (let i = 0; i < elements.length; i++) {
        elements[i].src = elements[i].src.replace(/#.*/, '') + '#' + Date.now();
    }
};