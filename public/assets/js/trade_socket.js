let socket = io(node_url);

// let socket = io('http://localhost:3000');

function emit_order_book() {
    socket.emit('order_book', {coin: coin.symbol, vs_coin: vs_coin.symbol, is_internal: false})
}

socket.on('connect', () => {
    console.log("connection established")
    emit_order_book()
});

socket.on('coin_pair', data => {
    // console.log("coin_pair:" + JSON.stringify(data))

    price = data.price
    document.title = `${price} | ${coin.symbol.toUpperCase()}-${vs_coin.symbol.toUpperCase()} | Caspian Crypto`
    update_symbol()
})

socket.on('fill_order', data => {
    console.log('fill order: ' + JSON.stringify(data));
    fill_order(data.id);

    (new Audio('/assets/coin.wav')).play();
})

socket.on('order_book', data => {

    // console.log("order_book : " + JSON.stringify(data))
    if (data.is_bid) {

        bids.push({
            amount: parseFloat(data.amount),
            total_amount: parseFloat(data.amount),
            price: parseFloat(data.price)
        })

        merge_bids(bids, true)

    } else {
        offers.push({
            amount: parseFloat(data.amount),
            total_amount: parseFloat(data.amount),
            price: parseFloat(data.price)
        })
        merge_offers(offers, true)
    }

})
