/*
給定一個數字 n（1<=n<=100000），請回傳 n 是否為質數（質數的定義：除了 1 以外，所有小於他的數都無法整除）

n = 2 => true
n = 3 => true
n = 10 => false
n = 37 => true
n = 38 => false
*/

function isPrime(n) {
    var m = 0    
    for (var i = 1 ; i <= n ; i++){
        if (n % i == 0){
            m++  //計算該數值的的因數有幾個
        }    
    }   
    if (m == 2){
        return true        
    }else{  //如果有超過2個以上的因數就不是質數
        return false
    }
        
}

module.exports = isPrime

// console.log(isPrime(3))
// console.log(isPrime(8))
// console.log(isPrime(38))
