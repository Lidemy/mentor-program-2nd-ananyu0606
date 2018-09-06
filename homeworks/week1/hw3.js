// 給定一個字串，請輸出反轉之後的樣子（不能使用內建的 reverse 函式）
function reverse(str) {
    var reversestr = ''
    for (var i = str.length-1 ; i >= 0 ; i--){
        reversestr += str[i]    
    }
    console.log(reversestr)
}

// reverse('今天天氣晴')
