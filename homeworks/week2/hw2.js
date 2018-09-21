/*
給定一字串，把小寫字母轉成大寫，大寫字母轉成小寫之後回傳，若不是英文字母則忽略。
input: ,hEllO123
output: ,HeLLo123
*/

function alphaSwap(str) {
    var reverse = ''
    for (var i = 0; i < str.length; i++) {
        if (str[i] >= 'A' && str[i] <= 'Z') {
            reverse += str[i].toLowerCase()
        } else {
            reverse += str[i].toUpperCase()
        }
    }
    return reverse
}

module.exports = alphaSwap
console.log(alphaSwap('hEllO123'))
console.log(alphaSwap('abcdEFGH1245:!?'))
