function getError(){
    var search = window.location.search.substring(1).split("?")
    if(search == "error=1"){
        document.querySelector("#error-message").innerHTML = "This email is already in use, please log in"
    }
}