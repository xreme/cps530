const bookmarks = ['https://www.youtube.com', 'https://www.twitter.com','http://neverssl.com','https://www.ssense.com/', 'https://www.ilovepdf.com']

function display_bookmarks(){
    const bookmarkList = document.getElementById("bookmarkList")
    for (let bookmark of bookmarks){
        var listElement = document.createElement("li")
        var bookmarkLink = document.createElement('a')
        bookmarkLink.href = bookmark
        bookmarkLink.text = bookmark
        var image = document.createElement("img")
        image.id = "icon"
        
        if (bookmark.startsWith("https://")){
            bookmarkLink.style = "color: green;"
            image.src = "./images/secure.png"
            image.style = "width: 20px;"
        }
        else{
            bookmarkLink.style = "color: red"
            image.src = "./images/non-secure.png"
            image.style = "width: 13px;"
        }
        listElement.appendChild(bookmarkLink)
        listElement.appendChild(image)
        bookmarkList.appendChild(listElement)
    }
}
function isPalindrome(str){
    str_normalized = normalize(str)
    return str_normalized == str_normalized.split('').reverse().join('')
}
function normalize(str){
    res = ""
    str = str.toLowerCase()
    for (let i = 0; i < str.length; i++){
        let ascii = str.charCodeAt(i)
        if(
            (ascii > 96 && ascii < 123)||   //range for lowercase letters
            (ascii > 47 && ascii < 58)      //range for numbers
        ){
            res += str.charAt(i)
        }
    }
    return res
}
function checkIsPalendrone(str){
    const palindromeList = document.getElementById("palindromeList")
    var listElement = document.createElement("li")
    var palindrome = document.createElement('p')
    palindrome.textContent += str
    if (isPalindrome(str)){
        palindrome.style = "color: green"
    }
    else{
        palindrome.style = "color: red"
    }
    listElement.appendChild(palindrome)
    palindromeList.appendChild(listElement) 
}
function checkValue(){
    var input = document.getElementById("inputField") 
    var inputValue = input.value
    checkIsPalendrone(inputValue)
    input.value = ""
}

function runScript(){
    display_bookmarks()
    // lab exanples 
    checkIsPalendrone('Drab as a fool, aloof as a bard.')
    checkIsPalendrone("It ain't over till it's over.")
    checkIsPalendrone("radar")
    checkIsPalendrone("When you come to a fork in the road, take it.")
    checkIsPalendrone("Marge lets Norah see Sharon’s telegram.")
}
