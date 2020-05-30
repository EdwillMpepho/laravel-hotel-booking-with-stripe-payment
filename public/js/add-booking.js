function getNrOfDays() {
    var end = document.getElementById("end").value;
    var start = document.getElementById("start").value;
    var msg = document.getElementById("message");
    var days;
    var today = new Date();
    var checkIn = new Date(start);
    var checkOut = new Date(end);
    // put the returned number of days to the variable month days
    var monthDays = this.getDaysOfTheMonth(checkIn);
    // checkIn months number
    var checkInMonth = checkIn.getMonth();
    // checkOut months number
    var checkOutMonth = checkOut.getMonth();
    // get  check In full year
    var checkInYear = checkIn.getFullYear();
    // get check Out full year
    var checkOutYear = checkOut.getFullYear();
    // check if check in date is less than or to todays date
    if (today <= checkIn) {
        //check if check out date is less than check in date
        if (checkIn < checkOut) {
            if (checkIn.getDate() > checkOut.getDate()) {
               if (checkIn.getFullYear() <= (checkOut.getFullYear() + 1)) {
                   if ((checkInMonth == checkOutMonth) || ( checkOutMonth == (checkInMonth + 1)) ) {
                       days = checkIn.getDate() - (checkIn.getDate() - checkOut.getDate());
                   } else {
                       msg.innerHTML = 'Your booking days exceeds the limit of 32 days';
                   }
                } else{
                    msg.innerHTML = 'Please rebook again an error occurred';
                }
            } else if (checkOut.getDate() > checkIn.getDate()) {
                days = checkOut.getDate() - checkIn.getDate();
            } else if (checkIn.getDate() === checkOut.getDate()) {
                if (monthDays == 30) {
                    days = 30;
                }
                if (monthDays == 31) {
                    days = 31;
                }
                if (monthDays == 29) {
                    days = 29;
                }
                if (monthDays == 28) {
                    days = 28;
                }
            }
            var nrOfDays = (document.getElementById("nrOfDays").value = days);
        } else {
            msg.innerHTML = "Check Out date must be greater than check in date";
            checkIn = '';
            checkOut = '';
        }
    } else {
        msg.innerHTML = "You need to book for another day not for today!!";
        checkIn = '';
        checkOut = '';
    }
}

function clearMessage() {
    var msg = document.getElementById("message");
    msg.innerHTML = "";
}

//get the days of the months via checkIn
function getDaysOfTheMonth(checkIn) {
    return new Date(checkIn.getFullYear(), checkIn.getMonth(), 0).getDate();
}

