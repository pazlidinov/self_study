// Check that the phone number is
// entered in the correct order
function Check_phone_number() {
    let send_button = document.getElementById("submit");
    let user_input = document.getElementsByName('phone_number')[0];
    let user_phone_number = user_input.value.trim();
    let num = /^[0-9,+]+$/;

    user_input.classList.remove("border-0");
    user_input.classList.add("border-2");    

    for (let i = 0; i < user_phone_number.length; i++) {
        if (!(user_phone_number[i].match(num)) ||
            (user_phone_number.length < 9) ||
            (user_phone_number.length > 13)) {
            user_input.style.borderColor = 'red';
            send_button.setAttribute('disabled', true);            
            break;
        }
        else {
            user_input.style.borderColor = 'green';
            send_button.removeAttribute('disabled');            
        }
    }
}
