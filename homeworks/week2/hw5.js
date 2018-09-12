function add(a, b) {
  
}

module.exports = add;

var a = '12312383813881381387'
var b = '129018313819319838'


if(a.length - b.length < 0){ // = 0 兩個字串一樣長 ; > 0 a字串比較長 ; < 0 b字串比較長，交換a、b，a、b字串交換之後，b字串變短了
    var temp = a
    a = b
    b = temp
}
console.log('replaced a:', a)
console.log('replaced b:', b)


var a_arr = a.split('')
var b_arr = b.split('')
console.log('a_array:', a_arr)

var int_a = Number(a_arr[a.length-1])
var int_b = Number(b_arr[b.length-1])
console.log('add:', int_a + int_b)


//從尾巴開始相加
var result =int_a + int_b
console.log('adding result:', result)
var virtual = 0  //判斷是否進位的虛擬變數

for (var i = 0; i < b.length; i++){
    if(result < 10){
        a_arr[a.length-1] = result
        virtual = 0
        console.log('a_tail:', a_arr[a.length-1])
    }
    if(result >= 10){
        result = result -10
        a_arr[a.length-1] = result
        virtual = 1  //判斷是否進位的虛擬變數
        console.log('a_tail:', a_arr[a.length-1])
        console.log(virtual)
    } //取相加後的尾數
}

if (virtual = 1)
1. a較長，相加到b的最後一次還有進位
2. a、b相同長度，加完之後還有進位
3. a的前兩碼為9，持續進位



