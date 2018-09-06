/* 給定一個數字 n，因數就是所有小於等於 n 又可以被 n 整除的數，
所以最明顯的例子就是 1 跟 n，這兩個數一定是 n 的因數。
現在請寫出一個函式來印出所有的因數 */

function printFactor(n) {
    for (var i = 1; i <= n; i++){
        var result = n % i
        if (result == 0){
            console.log(i)
        }
    }
}

// printFactor(7)

