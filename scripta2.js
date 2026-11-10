
$(document).ready(function() {

    $("#registrationForm").submit(function(event) {

        let name = $("input[name='name']").val().trim();
        let email = $("input[name='email']").val().trim();
        let phone = $("input[name='phone']").val().trim();
        let dob = $("input[name='dob']").val();
        let gender = $("select[name='gender']").val();
        let course = $("select[name='course']").val();
        let address = $("textarea[name='address']").val().trim();

        if (name === "" || email === "" || phone === "" ||
            dob === "" || gender === "" || course === "" ||
            address === "") {

            alert("Please fill all the fields.");
            event.preventDefault();
        }
        else if (!/^[0-9]{10}$/.test(phone)) {

            alert("Enter a valid 10-digit phone number.");
            event.preventDefault();
        }
        else {
            return true;
        }

    });

});
