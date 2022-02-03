function getError(){
    var search = window.location.search.substring(1).split("?")
    if(search == "error=1"){
        document.querySelector("#error-message").innerHTML = "User or Passoword incorrect, please try again."
    }
}