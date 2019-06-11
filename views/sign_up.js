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