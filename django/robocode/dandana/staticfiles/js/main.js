let elBurger = document.querySelector(".burger")
elBurger.addEventListener("click", function() {
    elBurger.classList.toggle("burger-active")
})

let elPageBox = document.querySelector(".left-page_box")
elBurger.addEventListener("click", function() {
    elPageBox.classList.add("left-page-active")
})

let elPage = document.querySelector(".left-page_home")
elPage.addEventListener("click", () => {
    elPage.classList.toggle("left-page_home-active")
} )


let elRemovePage = document.querySelector(".remove-left-page_btn")
elRemovePage.addEventListener("click", () => {
    elPageBox.classList.remove("left-page-active")
    elBurger.classList.remove("burger-active")
})


