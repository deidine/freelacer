 
/**
 * Add Booking To booking.php to process further
 * @send XML object
 */
$("#book-button").on("click", function addBooking() {
    
       
    console.log( document.getElementById("fName").value)
    var fName = document.getElementById("fName").value;
    var lName = document.getElementById("lName").value;
    var customerName = fName + " " + lName;

    // generate booking date/time
    // get client's current date/time for booking date & booking time
    var currentDate = new Date();
    var dd = String(currentDate.getDate()).padStart(2, '0');
    var mm = String(currentDate.getMonth() + 1).padStart(2, '0');
    var yyyy = currentDate.getFullYear();
    var bookingDate = yyyy + '-' + mm + '-' + dd; // formatted this way because MySQL uses yyyy-mm-dd format

    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var bookingTime = hours + ':' + minutes + ':' + seconds; // formated this way because MySQL uses HH:MM:SS format

    var phone = document.getElementById("phone").value;
     var email = document.getElementById("email").value;
    
    var inlineRadioOptions = document.querySelector('input[name="inlineRadioOptions"]:checked').value;
// validate number inputs
        if (!/^[0-9]+$/.test(phone)  ) {
            Swal.fire({
                title: 'Oopss...',
                icon: 'error',
                html: 'Please only enter numeric characters only for <b>Contact Phone</b> and <b>Street Number</b>! (Allowed input:0-9)',
            })

            
        } else {
            // if number inputs are corect
          
                // encodeURIComponent(bookingDate)
                var url = "includes/backend/booking.php";
                var params = "customerName=" + customerName +
                    "&fName=" + encodeURIComponent(fName) +
                    "&lName=" + encodeURIComponent(lName)  +
                    "&phone=" + encodeURIComponent(phone) +
                    "&email=" + encodeURIComponent(email) +
                    "&inlineRadioOptions=" + encodeURIComponent(inlineRadioOptions);
                        console.log('count')
                        // alert('ff')
                        $.ajax({
                            type: "POST",
                            // dataType: "json",
                            url: url, 
                            data:params , 
                            cache: false,
 
                            success: function (result) {
                                // Swal.fire(
                                //     'Thank you for your booking!',
                                  
                                //     'success'
                                // ).then(function () {
                                //     location.reload();
                                // });
                                // alert(result);
                            }
                            
                        });
                        // return nbre_chaise;
                        
                        
                        location.reload();
                    } 
                    
                } 
                
            );
    

/**
* validateDate
* @returns true or false
*/
function validateDate(date, todaysdate) {
if (date < todaysdate) {
    $(document).ready(function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Date error, please recheck your pick-up DATE'
        })
    });
    return false;
}
return true;
}

/**
* validateTime
* @returns true or false
*/
function validateTime(inputTime, currentTime) {
if (inputTime < currentTime) {
    $(document).ready(function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Date error, please recheck your pick-up Time'
        })
    });
    return false;
}
return true;
}

/**
* Get Today Date in DD/MM/YYYY.
* @returns new Date().toDateInputValue();
*/
function getTodayDate() {
// Add this for correct timezone support
Date.prototype.toDateInputValue = (function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

return new Date().toDateInputValue();
}

/**
* Get Today Time Dependin On User Device Time Format.
* @returns time
*/
function getTodayTime() {
var today = new Date();
var hours = today.getHours();
var minutes = today.getMinutes();

return time = (hours < 10 ? `0${hours}` : hours) + ':' + (minutes < 10 ? `0${minutes}` : minutes);
}

/**
* Initialize XML 
* @returns XML object
*/
function createRequest() {
var xhr = false;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    // code for IE6, IE5
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
return xhr;
} // end function createRequest()