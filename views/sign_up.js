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
    if (document.forms["authority"]["name"]=="" ||
        document.forms["authority"]["email"]=="" ||
        document.forms["authority"]["password"]=="" ||
        document.forms["authority"]["confirm_password"]=="" ||
        document.forms["authority"]["website"]=="" ||
        document.forms["authority"]["address"]=="" ||
        document.forms["authority"]["phone"]=="" ||
        document.forms["authority"]["password"]!=document.forms["authority"]["confirm_password"]){
        alert("Please complete all fields!");
        return false;
    }
}

function citizenValidate(){
    if (document.forms["citizen"]["first_name"]=="" ||
        document.forms["citizen"]["email"]=="" ||
        document.forms["citizen"]["password"]=="" ||
        document.forms["citizen"]["confirm_password"]=="" ||
        document.forms["citizen"]["last_name"]=="" ||
        document.forms["citizen"]["city"]=="" ||
        document.forms["citizen"]["country"]=="" ||
        document.forms["citizen"]["zip"]=="" ||
        document.forms["citizen"]["phone"]=="" ||
        document.forms["citizen"]["password"]!=document.forms["citizen"]["confirm_password"]){
        alert("Please complete all fields!");
        return false;
    }
}