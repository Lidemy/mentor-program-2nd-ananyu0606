document.addEventListener('DOMContentLoaded', function(){
    let cookie = document.querySelector('.no_cookie')
    let loginblock = document.querySelectorAll('.loginblock')
    // let goto_comments = document.querySelector('.goto_comments')
    // let logout = document.querySelector('.logout')
    let logged_in = document.querySelector('.logged_in')

    console.log(cookie)
    console.log(logged_in)
    // console.log(loginblock[0])
    // console.log("l", loginblock.length)
    
    // 如果狀態為未登入(cookie 的狀態為 null)，顯示登入或註冊對話框
    if (cookie === null){
        console.log('logged in')        
        for (i = 0; i< loginblock.length; i++){
            loginblock[i].style.display = "none";          
        }
    } else{
        console.log("not login yet")
        cookie.style.display = "show"
        for (i = 0; i< loginblock.length; i++){
            loginblock[i].style.display = "show"
        } 
        // goto_comments.style.display = "none"
        // logout.style.display = "none"
        logged_in.style.display = "none"
    }
})

