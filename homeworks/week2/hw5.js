function add(a, b) {
    if(a.lenth - b.length < 0){ 
        // = 0 兩個字串一樣長 ; 
        // > 0 a字串比較長 ; 
        // < 0 b字串比較長，交換a、b，a、b字串交換之後，b字串變短了
        var temp = a
            a = b
            b = temp
            // console.log('replaced a:', a)
            // console.log('replaced b:', b)
        }
        
        var a_arr = a.split('').reverse()
        var b_arr = b.split('').reverse()  //將字串轉為 array ，且將兩個 array 都反轉，方便從尾數開始相加
        
        a_arr.push('0')  //考慮可能有進位的問題，新的 array 的長度必須向後增加一位
        for (var i = 0; i <= a.length - b.length ; i++){
            b_arr.push('0')  //因 b 的位數較短，以 0 將 b 的位數補齊，與新的 a 位數相同
        }
        
        // console.log('a_array:', a_arr)
        // console.log('b_array:', b_arr)
        
        var a_len = a_arr.length
        var b_len = b_arr.length
        
        var carry = 0  //判斷是否進位的虛擬變數 flag ，carry 為 0 的時候不進位，為 1 的時候須進位
        var result_arr = []   //另立一個新的array來存放相加完的結果
        
        for (var i = 0; i < a_len; i++){
            
            var int_a = Number(a_arr[i])  //將 array 中的字串轉為數字型態
            var int_b = Number(b_arr[i])
            // console.log('int_a:', int_a , 'int_b:' , int_b)
                
            //從尾巴開始相加
            var result =int_a + int_b + carry
            // console.log('adding result:', result)
             
        
            if(result < 10){
                result_arr[i] = result
                // console.log('result =', result_arr[i])
                carry = 0  //因為沒有進位，故 carry 為 0
                // console.log('不進位,','round:', i, 'result_arr:', result_arr)
            }
            if(result >= 10){
                result = result % 10  //取相加後的尾數
                result_arr[i] = result
                // console.log('result =', result_arr[i])
                carry = 1  //因為進位，故 carry 為 1
                // console.log('有進位,','round:', i, 'result_arr:', result_arr)
             } 
        }
        result_arr.reverse()
        var result_str = ''
        // console.log(result_arr)
        if (result_arr[0] == 0){
            result_arr = result_arr.slice(1, )
        }
        result_str = result_arr.join('')
        // console.log(result_str)
        return result_str
    

}

 module.exports = add;


console.log('answer:', add('9876543','123459'))

