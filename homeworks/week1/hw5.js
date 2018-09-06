/*
實作的函式有兩個：join 以及 repeat。
join 會接收兩個參數：一個陣列跟一個字串，會在陣列的每個元素中間插入一個字串，最後合起來。
repeat 的話就是輸出重複 n 次之後的字串。
*/

function join(str, concatStr) {
    var result = ''
    for (var i = 0; i <str.length -1; i++){
        result = result + str[i] + concatStr         
    }
    console.log(result+str[str.length -1])
}

// join([1, 2, 3], '')
// join(["a", "b", "c"], "!")
// join(["a", 1, "b", 2, "c", 3], ',')


function repeat(str, times) {
    var result = ''
    for (var i = 1; i <= times; i++){
        result += str
    }
    console.log(result)
}
// repeat('a', 5)
// repeat('yoyo', 2)