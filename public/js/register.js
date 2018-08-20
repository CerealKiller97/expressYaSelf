const registerBtn = document.querySelector('#registerBtn')
const modal = document.querySelector('#register-success')

let register = e => {
  // ako je sve ok uspesno registrovan
  $('#register-success').modal('show')
  setTimeout(() => $('#register-success').modal('hide'), 3500)
}

window.onload = () => {
  try {
    registerBtn.addEventListener('click', register)
  } catch (error) {
    console.log(`Error: ${error}`)
  }
}