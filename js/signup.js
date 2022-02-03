function getError(){
    var search = window.location.search.substring(1).split("?")
    if(search == "error=1"){
        document.querySelector("#error-message").innerHTML = "This email is already in use, please log in"
    }
}

function verifyPassword(){
    console.log("Oi")
    var password = document.querySelector("#password").value
    var repetition = document.querySelector("#repetition").value
    if(password == repetition){
        document.querySelector("#submit").disabled = false
    }
    else {
        document.querySelector("#submit").disabled = true
    }
}