// Check cart and liked product in session of user.
function Check(id) {
    let like_button = document.getElementById('like' + id)
    let cart_button = document.getElementById('cart' + id)
    let url = `/check/${id}`

    fetch(url).then(response => response.json()).then(data => {
        if (data["answer_for_like"] == 200) {
            like_button.style.display = "none"
        }
        if (data["answer_for_like"] == 400) {
            like_button.style.display = "block"
        }

        if (data["answer_for_cart"] == 200) {
            cart_button.style.display = "none"
        }
        if (data["answer_for_cart"] == 400) {
            cart_button.style.display = "block"
        }
    })
}

// Put to liked product in session of user.
function Put_to_Liked(id) {
    let url = `/put_to_liked/${id}`

    fetch(url).then(response => response.json()).then(data => {
        if (data["answer"] == 200) {
            alert("Success")
        }
        if (data["answer"] == 400) {
            alert('Something wrong with request')
        }
    })
}

// Put to cart product in session of user.
function Put_to_Cart(id) {
    let url = `/put_to_cart/${id}`

    fetch(url).then(response => response.json()).then(data => {
        if (data["answer"] == 200) {
            alert("Success")
        }
        if (data["answer"] == 400) {
            alert('Something wrong with request')
        }
    })
}