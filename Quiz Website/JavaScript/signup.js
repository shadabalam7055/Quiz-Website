function validation() {
let username = document.getElementById("username").value;
let enrollment = document.getElementById("enumber").value;
let dob        = document.getElementById("dob").value;
let branch     = document.getElementById("branch").value;
let year       = document.getElementById("year").value;
let gender     = document.getElementById("gender").value;
let password   = document.getElementById("password").value;
let cpassword  = document.getElementById("cpassword").value;
let error      = document.getElementById("error");

error.innerText = "";
    if (username==="") {
        error.innerText = "**Please Enter Your Name.";
        return false ;
    }

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

    if (branch === "") {
        error.innerText = "**Please Select Branch";
        return false;
    }

    if (year === "") {
        error.innerText = "**Please Select Year & Semester";
        return false;
    }

    if (gender === "") {
        error.innerText = "**Please Select Gender";
        return false;
    }

    if (password === "") {
        error.innerText = "**Please Enter Password";
        return false;
    }

    if (password.length < 8) {
        error.innerText = "**Password Must Be Atleast 8 Character";
        return false;
    }

    if (password != cpassword) {
        error.innerText = "**Confirm Password Not Matched";
        return false;
    }
   
    return true;

}
