function setCookie(name, value, days = 30) {
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
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function remove_array_item_from_cookie(pair) {
    let last_pairs = JSON.parse(getCookie('pairs') ?? "[]")

    last_pairs = last_pairs.filter((_pair) => {
        return _pair !== pair
    })

    setCookie('pairs', JSON.stringify(last_pairs))
}

function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function getPairInUrl() {
    const arr = getFullUrl()
    return arr[arr.length - 1].split('?');
}

function getFullUrl() {
    const URL = window.location.href;
    return URL.split('/')
}

function change_pair(new_pair, url) {

    const new_url = url + "/" + new_pair

    window.history.pushState('data', 'ds', new_url);
}

$.fn.hasAttr = function (name) {
    return this.attr(name) !== undefined;
}

function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;

    // Avoid scrolling to bottom
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Fallback: Copying text command was ' + msg);
    } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
}

function copyTextToClipboard(text) {
    if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text);
        return;
    }
    navigator.clipboard.writeText(text).then(function () {
        console.log('Async: Copying to clipboard was successful!');
        $(".copy_text").show()
    }, function (err) {
        console.error('Async: Could not copy text: ', err);
    });
}