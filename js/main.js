function showForm(){
    document.querySelector("form").style.display = "block"
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
    } else {
        document.querySelectorAll(".time")[0].style.display = "flex"
        document.querySelectorAll(".time")[1].style.display = "flex"
    }
}