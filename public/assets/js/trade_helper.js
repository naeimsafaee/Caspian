$(".buy_percent").on('click', function () {
    $("#amount_buy_input").val($(this).attr('data-percent') + "%").trigger('input')
})

$(".sell_percent").on('click', function () {
    $("#amount_sell_input").val($(this).attr('data-percent') + "%").trigger('input')
})


$("#amount_buy_input").on("input", configure_buy);
$("#amount_sell_input").on("input", configure_sell);

$("#price_buy_input").on("input", configure_buy);
$("#price_sell_input").on("input", configure_sell);


function configure_sell() {

    let entered_sell_amount = calculate_total_amount($("#amount_sell_input").val(), account_amount)

    let price = get_updated_price(false)


    $("#max_sell").text((account_amount).toFixed(6))
    $("#account_amount_sell").text(account_amount)

    if ($("#amount_sell_input").val().trim() != '' && $("#amount_sell_input").val() != '.') {
        //update amount texts
        $("#total_amount_sell").text((entered_sell_amount * price).toFixed(2))
        $("#total_amount_of_coin_sell").text(entered_sell_amount.toFixed(2))

        //update max text
        $("#max_sell").text((account_amount).toFixed(6))
        $("#account_amount_sell").text(account_amount)
    } else {
        $("#total_amount_of_coin_sell").text(0)
        $("#total_amount_sell").text(0)
    }

    detect_range_slider_trade((entered_sell_amount.toFixed(2) / (account_amount).toFixed(6)), false)

}

function configure_buy() {

    let entered_buy_amount = calculate_total_amount($("#amount_buy_input").val(), account_vs_amount, true)

    let price = get_updated_price(true)
    $("#max_buy").text((account_vs_amount / (price == 0 ? 1 : price)).toFixed(6))
    $("#account_amount_buy").text(account_vs_amount)

    if ($("#amount_buy_input").val().trim() != '' && $("#amount_buy_input").val() != '.') {
        //update amount texts
        $("#total_amount_buy").text(entered_buy_amount.toFixed(2))
        $("#total_amount_of_coin").text((entered_buy_amount / (price == 0 ? 1 : price)).toFixed(6))

        //update max text
        $("#max_buy").text((account_vs_amount / (price == 0 ? 1 : price)).toFixed(6))
        $("#account_amount_buy").text(account_vs_amount)
    } else {
        $("#total_amount_of_coin").text(0)
        $("#total_amount_buy").text(0)
    }

    detect_range_slider_trade((entered_buy_amount.toFixed(2) / (account_amount).toFixed(6)), false)


}


function calculate_total_amount(value, account, is_buy = false) {
    if (value.includes("%")) {
        const percent = parseFloat(value.replace("%", ''))
        return (account * percent / 100)
    } else {
        if (is_buy)
            return parseFloat(value) * get_updated_price(is_buy)
        return parseFloat(value)
    }
}


function is_buy_based_on_market() {
    return $("#price_buy_input").hasAttr("disabled")
}

function is_sell_based_on_market() {
    return $("#price_sell_input").hasAttr("disabled")
}

function update_symbol() {
    $(".coin_symbol").text(coin.symbol.toUpperCase())
    $(".persian_name").text(coin.persian_name)

    $(".vs_coin_symbol").text(vs_coin.symbol.toUpperCase())

    $(".coin_icon").attr('src', coin.icon)
    $(".coin_price").text(price)

}

function update_price() {
    if (!is_sell_based_on_market())
        $("#price_sell_input").val(price).trigger('input')
    if (!is_buy_based_on_market())
        $("#price_buy_input").val(price).trigger('input')
}

function get_updated_price(is_buy) {
    if (is_buy)
        return is_buy_based_on_market() ? price : $("#price_buy_input").val();
    else
        return is_sell_based_on_market() ? price : $("#price_sell_input").val();
}

function set_market_sell(market) {
    if (market) {
        $("#price_sell_input").val("بهترین قیمت بازار").attr("disabled", true)
    } else {
        $("#price_sell_input").val(price).attr("disabled", false)
    }
    configure_sell()
}

function set_market_buy(market) {
    if (market) {
        $("#price_buy_input").val("بهترین قیمت بازار").attr("disabled", true)
    } else {
        $("#price_buy_input").val(price).attr("disabled", false)
    }
    configure_buy()
}

function load_coins_list() {
    const last_pairs = JSON.parse(getCookie('pairs') ?? "[]")

    const current_pair = getPairInUrl()[0]

    let is_exist = false
    for (let i = 0; i < last_pairs.length; i++) {
        if (last_pairs[i] === current_pair)
            is_exist = true;
    }

    if (!is_exist) {
        last_pairs.push(current_pair)
        setCookie('pairs', JSON.stringify(last_pairs))
    }

    let template = ``;

    for (let i = 0; i < last_pairs.length; i++) {
        template += `
            <a class="margin-left flex-box remove-chart coin_item" ${last_pairs[i] === current_pair ? 'style="background: #493E61;"' : ''} 
                data-text="${last_pairs[i]}">
                <img class="margin-left" src="/assets/icon/close-btn.svg">
                <p class="white-text no-margin">
                   ${last_pairs[i].replace('-', '')}
                </p>
            </a>
            <div class="flex-box tags-row"></div>
        `
    }

    template += `
        <a data-toggle="modal" data-target="#add-crypto" class="flex-box add-chart new_coin">
            <img src="/assets/icon/white-pluse.svg">
            <p class="white-text no-margin ">
                ارز جدید
            </p>
        </a>`

    $("#pairs_container").html(template)

    // $(".new_coin").on('click', add_coin)

    $(".remove-chart img").click(function () {

        remove_array_item_from_cookie($(this).parent().attr('data-text'))
        show_filter_item_coin();
        let active_coin = window.location.pathname.split('/')

        let last_pairs = JSON.parse(getCookie('pairs') ?? "[]")

        if (last_pairs.length == 0) {
            add_coin(active_coin[active_coin.length - 1])
        } else {
            if (active_coin[active_coin.length - 1] == $(this).parent().data('text')) {
                $(`.coin_item[data-text=${last_pairs[last_pairs.length - 1]}]`).click()
            }
        }

        $(this).parent().remove()
    });

    $(".coin_item").on("click", function () {

        $('.coin_item').removeAttr('style')

        $(this).css('background', '#493E61')

        get_coin($(this).attr('data-text'))
    })

}

function load_trading_view_chart() {
    let trading_array = {
        "autosize": true,
        "symbol": "",
        "interval": "D",
        "timezone": "Etc/UTC",
        "theme": "dark",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "withdateranges": true,
        "hide_side_toolbar": false,
        "allow_symbol_change": true,
        "container_id": "tradingview_e692f",
        "show_popup_button": true,
        "popup_width": "1000",
        "popup_height": "650",
    }

    trading_array.symbol = getPairInUrl()[0].replace("-", '');
    new TradingView.widget(
        trading_array
    )

}

function fetch_bids() {

    let template = ``;
    bids.map(bid => {
        const percent = bid.amount / bid.total_amount * 100;
        template += `
            <ul>
                <li class="order-list-item text-right" data-label="جمع(${coin.symbol})">${bid.total_amount.toFixed(4)}</li>
                <li class="order-list-item text-center" data-label="اندازه(${coin.symbol})">${bid.amount.toFixed(4)}</li>
                <li class="green order-list-item text-left" data-label=" قیمت(${vs_coin.symbol})">
                    ${bid.price.toFixed(6)}
                </li>
                <li class="bg-line green-item" data-progress="${percent}" style="width: ${percent}%;"></li>
            </ul>
        `
    })

    $("#bid_book").html(template)
}

function fetch_offers() {

    let template = ``;
    offers.map(offer => {
        const percent = offer.amount / offer.total_amount * 100
        template += `
            <ul>
                <li class="order-list-item text-right" data-label="جمع(${coin.symbol})">${offer.total_amount.toFixed(4)}</li>
                <li class="order-list-item text-center" data-label="اندازه(${coin.symbol})">${offer.amount.toFixed(4)}</li>
                <li class="red order-list-item text-left" data-label=" قیمت(${vs_coin.symbol})">
                    ${offer.price.toFixed(6)}
                </li>
                <li class="bg-line pink-item" data-progress="${percent}" style="width: ${percent}%;"></li>
            </ul>
        `
    })

    $("#offer_book").html(template)
}

function merge_bids(_bids , is_socket = false) {

    let temp_bids = _.groupBy(_bids, 'price');

    let index = 0;

    const new_bids = _.map(temp_bids, grouped_bid => {

        if (index > 5)
            return;

        let total_amount = 0;
        let last_bid = {};

        grouped_bid.map(bid => {
            if (is_socket)
                total_amount += parseFloat(bid.total_amount);
            else
                total_amount += parseFloat(bid.amount);

            last_bid = {
                amount: parseFloat(bid.amount),
                total_amount: total_amount,
                price: parseFloat(bid.price)
            }
        })
        index++;

        return last_bid
    }).slice(0 , 5)

    bids = new_bids;

    fetch_bids()
}

function merge_offers(_offers , is_socket = false) {

    let temp_offers = _.groupBy(_offers, 'price');

    let index = 0;

    const new_offers = _.map(temp_offers, grouped_offer => {

        if (index > 5)
            return ;

        let total_amount = 0;
        let last_offer = {};

        grouped_offer.map(offer => {
            if (is_socket)
                total_amount += parseFloat(offer.total_amount);
            else
                total_amount += parseFloat(offer.amount);

            last_offer = {
                amount: parseFloat(offer.amount),
                total_amount: total_amount,
                price: parseFloat(offer.price)
            }
        })
        index++;

        return last_offer;
    }).slice(0 , 5)

    offers = new_offers;

    fetch_offers()
}

function detect_range_slider_trade(percent_no, is_buy) {
    let sliderItemClass = is_buy ? '.buy_percent' : '.sell_percent';
    let percent_no1 = percent_no * 100;
    let itemActive = 0;

    $(sliderItemClass).removeClass('active');
    if (!isNaN(percent_no)) {
        if (percent_no1 < 20) {
            itemActive += 1;
        }
        if (20 <= percent_no1 && percent_no1 < 50) {
            itemActive += 2;
        }
        if (50 <= percent_no1 && percent_no1 < 75) {
            itemActive += 3;
        }
        if (75 <= percent_no1 && percent_no1 < 100) {
            itemActive += 4;
        }
        if (percent_no1 == 100) {
            itemActive += 5;
        }

        for (let i = 0; i < itemActive; i++) {
            $(sliderItemClass).eq(i).addClass('active');
        }

        if (percent_no1 <= 100) {
            $(sliderItemClass).parent().parent().find(".noUi-origin").css('left', percent_no1 + "%");
        }


    } else {
        $(sliderItemClass).eq(0).addClass('active');
        $(sliderItemClass).parent().parent().find(".noUi-origin").css('left', 0);
    }

}

