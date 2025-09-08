function validation() {

let enrollment = document.getElementById("enumber").value;
let dob        = document.getElementById("dob").value;
let password   = document.getElementById("password").value;
let error      = document.getElementById("error");

error.innerText = ""

if (enrollment==="") {
        error.innerText = "**Please Enter Enrollment No.";
        return false ;
    }

    if (enrollment.length !== 15){
        error.innerText = "**Enrollment Must be 15 Characters";
        return false;
    }

    if (dob === "") {
        error.innerText = "**Please Select Date Of Birth";
        return false;
    }

    if (password==="") {
        error.innerText = "**Please Enter Password";
        return false;
    }

    
   
    return true;

}
