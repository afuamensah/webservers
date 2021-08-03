"use strict";

var $ = function(id) {
    return document.getElementById(id);
}

window.onload = function() {
    var listNode = $("imglist");
    var imageNode = $("enlarged");
    var captionNode = $("caption");

    var imageLinks = listNode.getElementsByTagName("a");

    var i, image, linkNode, link;
    var imageCache = [];
    for (i = 0; i < imageLinks.length; i++) {
        linkNode = imageLinks[i];

        image = new Image();
        image.src = linkNode.getAttribute("href");
        image.title = linkNode.getAttribute("title");
        imageCache[imageCache.length] = image;

        linkNode.onclick = function(evt) {
            link = this;

            imageNode.src = link.getAttribute("href");
            captionNode.firstChild.nodeValue = link.getAttribute("title");

            if (!evt) {
                evt = window.event;
            }

            if (evt.preventDefault) {
                evt.preventDefault();
            }
            else {
                evt.returnFalse = false;
            }
        }
    }
    var imageCounter = 0;
    var timer = setInterval(
        function() {
            imageCounter = (imageCounter + 1) % imageCache.length;
            image = imageCache[imageCounter];
            imageNode.src = image.src;
            captionNode.firstChild.nodeValue = image.title;
        },
        2000);
    imageLinks[0].focus();
}