function validateFirstName(){
    let firstName = document.forms['info']['firstName'].value
    let len = firstName.length
    let letter_count = countLetters(firstName)
    return(letter_count == len && letter_count > 0)
}
function validateLastName(){
    let lastName = document.forms['info']['lastName'].value
    let len = lastName.length
    let letter_count = countLetters(lastName)
    return(letter_count == len && letter_count > 0)
}
function validatePhoneNumber(){
    let phoneNumber = document.forms['info']['phoneNumber'].value
    if (phoneNumber.match(/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/)){ 
        return true
    }
    return false
}
function reformatPhone(){
    let phoneNumber = document.forms['info']['phoneNumber'].value
    let formattedNum = phoneNumber.slice(1,4) +'-'+ phoneNumber.slice(6,9)+'-' + phoneNumber.slice(10,14)
    return formattedNum
}
function validateEmail(){
    let email = document.forms['info']['email'].value
    if (email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,63}$/)){
        return true
    }
    return false
}
function validateForm(){
    let errors = {'firstName': false, 'lastName':false, 'phoneNumber':false, 'email': false}
    var errorStr = ''
    if (!validateFirstName()) {errors.firstName = true; errorStr+='-first name '}
    if (!validateLastName()) {errors.lastName = true; errorStr+='-last name '}
    if (!validatePhoneNumber()) {errors.phoneNumber = true; errorStr+='-phone number '}
    if (!validateEmail()) {errors.email = true; errorStr+='-email '}
    console.log(errors)
    if (!errors.firstName && !errors.lastName && !errors.phoneNumber && !errors.email){
        displayErrors(null)
        displayResults()
    }
    else{
        displayErrors(errorStr)
    }
}
function displayErrors(string){
    console.log('here')
    labelErrors = document.getElementById("errors")
    if (string) labelErrors.innerHTML = 'fields to fix: ' + string
    else labelErrors.innerHTML = ''
}
function updateCounts(){
    let textBoxText = document.forms['info']['specialInstructs'].value
    updateCharCount(textBoxText)
    updateLetterCount(textBoxText)
}
function updateCharCount(str){
    let count = str.length
    let charCountLabel = document.getElementById("charCount")
    charCountLabel.innerText = `Length: ${count}/300`
}
function updateLetterCount(str){
    let count = countLetters(str)
    let letterCountLabel = document.getElementById("letterCount")
    letterCountLabel.innerText = `Letter Count: ${count}`
}
function countLetters(str){
    count = 0 
    for (let i = 0; i < str.length; i++){
        str = str.toLowerCase()
        let ascii = str.charCodeAt(i)
        if((ascii > 96 && ascii < 123)){
            count += 1 
        }
    }
    return count 
}

function displayResults(str){
    let fullNameDisplay = document.getElementById("labelFullName")
    fullNameDisplay.innerHTML = document.forms['info']['firstName'].value + " " + document.forms['info']['lastName'].value
    let emailDisplay = document.getElementById("labelEmail")
    emailDisplay.innerHTML = document.forms['info']['email'].value
    let phoneDisplay = document.getElementById("labelPhone")
    phoneDisplay.innerHTML = reformatPhone()
    let addressDisplay = document.getElementById("labelAddress")
    addressDisplay.innerHTML = document.forms['info']['addr1'].value + " " + document.forms['info']['addr2'].value
    let labelInstructions = document.getElementById("labelInstructions")
    labelInstructions.innerHTML = document.forms['info']['specialInstructs'].value
}