// 給定一字串，把第一個字轉成大寫之後回傳，若第一個字不是英文字母則忽略。

function capitalize(str) {
    if (str[0] >= 'a' && str[0] <= 'z'){
        var cap = str[0].toUpperCase()
        // console.log(cap)
        var str = str.replace(str[0], cap)
        return str
    }else{
        return str
    }
}

// var cap_str = capitalize('123')
// console.log(cap_str)


