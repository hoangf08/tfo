//tripla booking widget 

function formatDate(date) {
  const yyyy = date.getFullYear();
  const mm = ('0' + (date.getMonth() + 1)).slice(-2)
  const dd = ('0' + date.getDate()).slice(-2)
  return yyyy + '/' + mm + '/' + dd
}

function setPram(date) {

  let pram = {
    checkIn: '',
    checkOut: '',
    adults: 1
  };

  pram.checkIn = formatDate(date)
  date.setDate(date.getDate() + 1)
  pram.checkOut = formatDate(date)

  return pram
}

$(document).ready(function () {
  $('#planlink-shinbanba, #planlink-daimon').attr('href', '#')

  $('#planlink-shinbanba').click(function () {
    const pram = setPram(new Date());
    window.TriplaBookingWidget('search', pram, '2aa87ee7bc6bd4603caf62d804094f24');
    return false
  });

  $('#planlink-daimon').click(function () {
    const pram = setPram(new Date())
    window.TriplaBookingWidget('search', pram, '4d39111bd4c48d991dd08c75d6212490')
    return false
  });
});