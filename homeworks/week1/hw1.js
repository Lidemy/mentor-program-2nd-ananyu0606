// 給定 n（1<=n<=30），依照規律印出正確圖形

function printStars(n) {
    if ( 1<= n && n<=30 ){
        var i = 1
        while (i < n+1){
            var m = 1
            console.log('n = ', i)
            while (m < i+1){
                console.log('*')
                m++
            };
            console.log(' ')
            i++
        }
    }
        // console.log('final count:', i)
}

// printStars(0)