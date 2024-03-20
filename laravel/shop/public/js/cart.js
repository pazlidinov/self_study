//Drop product from cart product in session of user.
function Drop_from_cart(id) {
    let remove_price = document.getElementById('product' + id);
    let url = `/drop_from_cart/${id}`

    fetch(url).then(response => response.json()).then(data => {
        if (data["answer"] == 200) {
            document.getElementById('subtotal').innerHTML -= remove_price.children[3].innerHTML;
            document.getElementById('total').innerHTML -= remove_price.children[3].innerHTML;
            remove_price.remove();
        }
        if (data["answer"] == 400) {
            alert('Something wrong with request')
        }
    })
}
