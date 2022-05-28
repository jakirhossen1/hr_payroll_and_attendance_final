function Admission() {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var Father = document.getElementById('FF').value;
    var Mother = document.getElementById('MM').value;
    var Gender = document.getElementById('gen').value;
    var classs = document.getElementById('secs').value;
    var phone = document.getElementById('phone').value;
    var dob = document.getElementById('dob').value;
    var presentAddress = document.getElementById('presentAdd').value;
    var parmanetAddress = document.getElementById('parAdd').value;



    if (fname == '' || fname == null) {
        document.getElementById('FnId').innerHTML = "Enter Student First Name";
        return false;
    } else {
        document.getElementById('FnId').innerHTML = "";

    }
    if (lname == "" || lname == null) {
        document.getElementById('LnId').innerHTML = "Enter Student Last Name";
        return false;
    } else {
        document.getElementById('LnId').innerHTML = "";
    }

    if (Father == '' || Father == null) {
        document.getElementById('FFnId').innerHTML = "Enter Student Father's Name";
        return false;
    } else {
        document.getElementById('FFnId').innerHTML = "";
    }
    if (Mother == '' || Mother == null) {
        document.getElementById('MMId').innerHTML = "Enter Student Mother's Name";
        return false;
    } else {
        document.getElementById('MMId').innerHTML = "";
    }

    if (Gender == '' || Gender == null) {
        document.getElementById('GenderId').innerHTML = "Select Student Gender";
        return false;
    } else {
        document.getElementById('GenderId').innerHTML = "";
    }


    if (classs == '' || classs == null) {

        document.getElementById('klassId').innerHTML = "Select Student Class";
        return false;
    } else {
        document.getElementById('klassId').innerHTML = "";
    }

    if (phone == '' || phone == null) {
        document.getElementById('PhoneId').innerHTML = "Enter Phone Number";
        return false;
    } else {
        document.getElementById('PhoneId').innerHTML = "";
    }

//    if (!phone.length <= 11) {
    //        document.getElementById('PhoneId').innerHTML = "Enter 11 digit Phone Number";
    //        return false;
    //    } else {
    //        document.getElementById('PhoneId').innerHTML = "";
    //    }

    if (dob == '' || dob == null) {

        document.getElementById('DobId').innerHTML = "Select Student Date Of Birth";
        return false;
    } else {

        document.getElementById('DobId').innerHTML = "";
    }
    if (presentAddress == '' || presentAddress == null) {
        document.getElementById('presentId').innerHTML = "Enter Student Present Address";
        return false;
    } else {
        document.getElementById('presentId').innerHTML = "";
    }

    if (parmanetAddress == "" || parmanetAddress == null) {
        document.getElementById('parmanetId').innerHTML = "Enter Student Parmanent Address";
        return false;
    } else {

        document.getElementById('parmanetId').innerHTML = "";
    }


};
