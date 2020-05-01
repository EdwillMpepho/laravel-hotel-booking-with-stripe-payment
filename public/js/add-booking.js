
function getNrOfDays(){
  var end = document.getElementById('end').value;
  var start = document.getElementById('start').value;
  var msg = document.getElementById('message');
  var days;
  var today = new Date();
  var checkIn = new Date(start);
  var checkOut = new Date(end);

  // check if check in date is less than or to todays date
  if (today <= checkIn) {
  //check if check out date is less than check in date
      if (checkIn < checkOut) {
          if (checkIn.getDate() > checkOut.getDate()) {
              days = checkIn.getDate() - (checkIn.getDate() - checkOut.getDate());
          }else if (checkOut.getDate() > checkIn.getDate()) {
              days = checkOut.getDate() - checkIn.getDate();
          }else if (checkIn.getDate() === checkOut.getDate()) {

          }
          var nrOfDays = document.getElementById('nrOfDays').value = days;
      }else{
        msg.innerHTML='Check Out date must be greater than check in date';
      }
  }else{
     msg.innerHTML = 'You need to book for another day not for today!!';
  }
}

function clearMessage() {
    var msg = document.getElementById('message');
    msg.innerHTML = "";
}
