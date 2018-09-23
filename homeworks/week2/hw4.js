/*
給定一個長度小於 100 的字串 s，請回傳 s 是否為迴文（迴文的定義：正著唸倒著念都一樣）

abcba => true
apple => false
aaaaa => true
applppa => true
*/

function isPalindromes(str) {
    var m = 0
    for (var i = 0; i < str.length; i++) {
        if (str[i] !== str[str.length - 1 - i]) {  //在依序檢查的程序中，只要檢查到兩個不一樣的字母就回傳false並終止for loop
            // console.log(str[i], str[str.length-1-i]) 檢查不相同的字母是哪兩個
            return false
            break;
        } else {
            m += 1
        }
    }
    if (m == str.length) {
        return true
    }
}

module.exports = isPalindromes

// console.log('applppa:', isPalindromes('applppa'))
// console.log('apple:', isPalindromes('apple'))

