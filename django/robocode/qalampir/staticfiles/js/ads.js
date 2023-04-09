var adShow = true;
$(".new-ads").each(function () {
    var elem = $(this);
    $.getJSON(elem.data("url"), function (result) {
		if(result.length > 0) {
			elem.addClass("reklama-bor");
		}
        var key = getRandomInt(result.length);
        $.each(result, function (i, ad) {
            if (key != i) {
                return;
            }
            if (ad.content == "") {
                elem.append('<a href="' + elem.data("click") + ad.id + '" target="_blank" rel="nofollow"><img src="' + elem.data("site-cdn") + ad.media + '" /></a>');
                if (ad.campaign_location == 8 || ad.campaign_location == 9) {
                    adShow = false;
                    var unix = Math.round(+new Date() / 1000);
                    console.log(localStorage.getItem("popup2"));
                    if (localStorage.getItem("popup2") === null) {
                        localStorage.setItem("popup2", unix);
                        $(".reklama-popup-mark").show();
                        adShow = true;
                        console.log('first');
                    } else {
                        time = localStorage.getItem("popup2");
                        var range = unix - time;
                        if (range >= 600) {
                            localStorage.setItem("popup2", unix);
                            $(".reklama-popup-mark").show();
                            adShow = true;
                            console.log('second');
                        }
                    }
                }
            } else {
                elem.html(ad.content);
                elem.find("script").each(function () {
                    //eval($(this).text());
                });
            }
            if (adShow) {
                $.get(elem.data("show") + ad.id, function (r) {

                });
            }
        });
    });
});

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}