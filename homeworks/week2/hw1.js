/* 給定 n（1<=n<=30），依照規律「回傳」正確圖形（每一行是一個陣列的元素）
 n = 1 回傳["*"]
 n = 3 回傳["*", "**", "***"]
 */

function stars(n) {
    var arr = []
    for (var i = 1; i <= n; i++) {
        arr.push('*'.repeat(i))
    }
    return arr
}

module.exports = stars;
// console.log(stars(1))
// console.log(stars(3))
