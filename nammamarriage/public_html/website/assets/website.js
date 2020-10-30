function gobrowsepage() {
    location.href='browse.php?l='+$("#browse_allitems_categorywise").val()+'&o='+$("#browse_allitems_orderby").val()+'&s='+$('#searchkeyword').val()+page;
}
$(document).ready(function(){
    $('#searchkeyword').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        gobrowsepage();
    }
});
});

	function showHidePwd(pwd,btn) {
    
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    
    btn.html('<i class="glyphicon glyphicon-eye-close"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="glyphicon glyphicon-eye-open"></i>');
  }
}
        /*Facebook Start*/
        //Whatsspp
    function postToWhatsApp(sharemessage) {

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var text =sharemessage;// $(".Article_Headline ").text();
            var url = location.href;
            var message = encodeURIComponent(text) + encodeURIComponent(url);           
            var whatsapp_url = "whatsapp://send?text=" + message;
            window.location.href = whatsapp_url;
        } else {
            alert("You are not in Mobile Device");
        }
    }
        /*Twitter*/
function postToTWTTR(placement, url, title, shareObject) {
    // social_button_clicked('twitter', placement);

    var width = 575,
                    height = 400,
                    left = (window.outerWidth - width) / 2,
                    top = (window.outerHeight - height) / 2,
                    url = url,
                    opts = 'resizable=1,scrollbars=1,status=1' +
                             ',width=' + width +
                             ',height=' + height +
                             ',top=' + top +
                             ',left=' + left, twitterVia = 'dt_next';

    var articleSharingUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(' ' + url + '');
    var shareObjectSharingUrl = getSharingUrl(shareObject);
    var sharingUrl = shareObjectSharingUrl || articleSharingUrl;
    var newwindow = window.open(sharingUrl, "", opts);

    function getSharingUrl(shareObject) {
        var sharingUrl = null;
        if (shareObject) {
            var parsedShareObject = JSON.parse(shareObject);
            sharingUrl = 'https://twitter.com/share?' +
                                 (parsedShareObject.url ? 'url=' + encodeURIComponent(parsedShareObject.url) : '');
        }
        return sharingUrl;
    }
}
/*End*/

function postToFB(placement, url, shareObject) {
    var caption = $("#item_title").text();
    var picture = $("#item_image").attr('src');
    var description = $("#item_shortdesc").text();
    var link = window.location.href;
    var width = 600,
                    height = 450,
                    left = (window.outerWidth - width) / 2,
                    top = (window.outerHeight - height) / 2,
                    url = url,
                    opts = 'resizable=1,scrollbars=1,status=1' +
                             ',width=' + width +
                             ',height=' + height +
                             ',top=' + top +
                             ',left=' + left;

    var sharingUrl = getSharingUrl(shareObject) || ("https://www.facebook.com/sharer/sharer.php?u=" + url);

    var newwindow = window.open(sharingUrl, "", opts);

    function getSharingUrl(shareObject) {
        var sharingUrl = null;
        if (shareObject) {
            shareObject = JSON.parse(shareObject);
            sharingUrl = 'https://www.facebook.com/dialog/feed?app_id=146202712090395' +
                                 (shareObject.link ? '&link=' + encodeURIComponent(link) : '') +
                                 (shareObject.picture ? '&picture=' + encodeURIComponent(picture) : '') +
                                 (shareObject.name ? '&name=' + encodeURIComponent(link) : '') +
                                 (shareObject.caption ? '&caption=' + encodeURIComponent(caption) : '') +
                                 (shareObject.description ? '&description=' + encodeURIComponent(description) : '') +
                                 (shareObject.redirect_uri ? '&redirect_uri=' + encodeURIComponent(link) : '');
        }
        return sharingUrl;
    };

}

/*Google Plus*/
function postToGPlus(placement, url, shareObject) {
    
    var width = 300,
                    height = 500,
                    left = (window.outerWidth - width) / 2,
                    top = (window.outerHeight - height) / 2,
                    url = url,
                    opts = 'resizable=1,scrollbars=1,status=1' +
                             ',width=' + width +
                             ',height=' + height +
                             ',top=' + top +
                             ',left=' + left;
    var headline = $("#item_title").text();
    var Abstract = $("#item_shortdesc ").text();
    var sharingUrl = getSharingUrl(shareObject) || ("https://plus.google.com/share?url=" + url);

    var newwindow = window.open(sharingUrl, "", opts);

    function getSharingUrl(shareObject) {
        var sharingUrl = null;
        if (shareObject) {
            shareObject = JSON.parse(shareObject);
            sharingUrl = (shareObject.link ? '&link=' + encodeURIComponent(shareObject.link) : '') +
                                 (shareObject.picture ? '&picture=' + encodeURIComponent(shareObject.picture) : '') +
                                 (shareObject.name ? '&name=' + encodeURIComponent(shareObject.name) : '') +
                                 (shareObject.caption ? '&caption=' + encodeURIComponent(shareObject.caption) : '') +
                                 (shareObject.description ? '&description=' + encodeURIComponent(shareObject.description) : '') +
                                 (shareObject.redirect_uri ? '&redirect_uri=' + encodeURIComponent(shareObject.redirect_uri) : '');
        }
        return sharingUrl;
    };
} 