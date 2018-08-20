const loginBtn = document.querySelector('#loginBtn')

/* $('#exampleModal').modal('show')
 */

/* Authourization validation */

let login = e => {
  e.preventDefault()

  let email = document.querySelector('#email').value
  let password = document.querySelector('#password').value

  const emailHelp = document.querySelector('#email-help')
  const passwordHelp = document.querySelector('#password-help')

  // State of inputs
  let emailOk = false
  let passwordOk = false

  // Regular expressions
  const reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
  const rePassword = /^[0-9a-zA-Z]{8,}$/

  if (!email) {
    emailHelp.textContent = 'Email field must not be empty!'
  } else if (!reEmail.test(email)) {
    emailHelp.textContent = 'Invalid email format'
  } else {
    emailOk = true
    emailHelp.textContent = ''
  }

  if (!password) {
    passwordHelp.textContent = 'Password field must not be empty!'
  } else if (!rePassword.test(password)) {
    passwordHelp.textContent = 'Invalid password format'
  } else {
    passwordOk = true
    passwordHelp.textContent = ''
  }

  if (emailOk && passwordOk) {
    // ajax call to DB
    loginBtn.innerHTML = 'Logging in<i class="fas fa-circle-notch fa-spin ml-3"></i>'
    $('#login-success').modal('show')
    setTimeout(() =>  {
      //$('#login-success').modal('hide')
      //location.reload()
      console.log('reload ...');
      
    },1500)
    

  }
// change button innerHTML to Logging in<i class="fas fa-circle-notch fa-spin ml-3"></i>
}

window.onload = () => {
  try {
    //loginBtn.addEventListener('click', login)
  } catch (error) {
    console.log(`Error: ${error}`)
  }
}