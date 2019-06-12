function displayAuthority(){
    var authorityForm = document.getElementById("authority_form");
    var citizenForm = document.getElementById("citizen_form");
    authorityForm.style.display="block";
    citizenForm.style.display="none";
}

function displayCitizen(){
    var authorityForm = document.getElementById("authority_form");
    var citizenForm = document.getElementById("citizen_form");
    authorityForm.style.display="none";
    citizenForm.style.display="block";
}

function authorityValidate(){
    if (document.forms["authority"]["name"].value==="" ||
        document.forms["authority"]["email"].value==="" ||
        document.forms["authority"]["password"].value==="" ||
        document.forms["authority"]["confirm_password"].value==="" ||
        document.forms["authority"]["website"].value==="" ||
        document.forms["authority"]["address"].value==="" ||
        document.forms["authority"]["phone"].value===""){
        alert("Please complete all fields!");
        return false;
    }
    if (document.forms["authority"]["password"].value!==document.forms["authority"]["confirm_password"].value){
        alert("Passwords don't match!");
        return false;
    }
}

function citizenValidate(){
    if (document.forms["citizen"]["first_name"].value==="" ||
        document.forms["citizen"]["email"].value==="" ||
        document.forms["citizen"]["password"].value==="" ||
        document.forms["citizen"]["confirm_password"].value==="" ||
        document.forms["citizen"]["last_name"].value==="" ||
        document.forms["citizen"]["city"].value==="" ||
        document.forms["citizen"]["country"].value==="Default" ||
        document.forms["citizen"]["zip"].value==="" ||
        document.forms["citizen"]["phone"].value===""){
        alert("Please complete all fields!");
        return false;
    }
    if (document.forms["citizen"]["password"].value!=document.forms["citizen"]["confirm_password"].value){
        alert("Passwords don't match!");
        return false;
    }
}