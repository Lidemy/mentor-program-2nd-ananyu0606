/*
實作的函式有兩個：join 以及 repeat。
join 會接收兩個參數：一個陣列跟一個字串，會在陣列的每個元素中間插入一個字串，最後回傳合起來的字串。
repeat：回傳重複 n 次之後的字串。
*/

function join(str, concatStr) {
    var result = ''
    for (var i = 0; i <str.length -1; i++){
        result = result + str[i] + concatStr         
    }
    return(result+str[str.length -1])
}

// console.log(join(["a", "b", "c"], "!"))


function repeat(str, times) {
    var result = ''
    for (var i = 1; i <= times; i++){
        result += str
    }
    return(result)
}
// console.log(repeat('a', 5))
