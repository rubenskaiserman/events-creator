function showForm(){
    document.querySelector("#adding").style.display = "block"
    document.querySelector("#title").focus()

    document.querySelectorAll(".time")[0].style.display = "flex"
    document.querySelectorAll(".time")[1].style.display = "flex"

}

function hideForm(){
    document.querySelector("form").style.display = "none"
}

function unableTime(){
    if(document.querySelectorAll(".time")[0].style.display == "flex"){
        document.querySelectorAll(".time")[0].style.display = "none"
        document.querySelectorAll(".time")[1].style.display = "none"
        document.querySelectorAll(".time")[0].value = '00:00:00';
    } else {
        document.querySelectorAll(".time")[0].style.display = "flex"
        document.querySelectorAll(".time")[1].style.display = "flex"
    }
}