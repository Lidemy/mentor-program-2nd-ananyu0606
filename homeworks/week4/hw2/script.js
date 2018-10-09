document.addEventListener('DOMContentLoaded', function(){
    document.querySelector('.form__submit').addEventListener('click', function(e){
         
        const email = document.querySelector('#email')
        const nickname = document.querySelector('#nickname')
        const job = document.querySelector('#job')
        const experience = document.querySelector('#experience')
        const othercomments = document.querySelector('#othercomments')

        // 檢查使用者是否有輸入內容
        if (email.value === ''){
            email.parentNode.style.background = 'rgb(255, 235, 238)'
            email.parentNode.children[3].innerHTML = '這是必填問題'
            e.preventDefault()
        }

        if (nickname.value === ''){
            nickname.parentNode.style.background = 'rgb(255, 235, 238)'
            nickname.parentNode.children[3].innerHTML = '這是必填問題'
            e.preventDefault()
        }

        if (job.value === ''){
            job.parentNode.style.background = 'rgb(255, 235, 238)'
            job.parentNode.children[3].innerHTML = '這是必填問題'
            e.preventDefault()
        }

        if (experience.value === ''){
            experience.parentNode.style.background = 'rgb(255, 235, 238)'
            experience.parentNode.children[3].innerHTML = '這是必填問題'
            e.preventDefault()
        }

        // 檢查使用者是否有圈選 radio 選項
        const radiocheck = document.getElementById('radioSet')
        const radio__input = radiocheck.querySelectorAll('.radio__input')
        let type = ''

        for (var i=0; i<radio__input.length; i++){
            if(radio__input[i].checked){
                type = radio__input[i].value
            }
        }

        if (type === ''){
            radiocheck.parentNode.style.background = 'rgb(255, 235, 238)'
            radiocheck.parentNode.children[3].innerHTML = '這是必填問題'
            e.preventDefault()
        }

        // e.preventDefault()
        console.log(
            'email:', email.value,
            'nickname:', nickname.value,
            'tyep:', type,
            'job:', job.value,
            'experience:', experience.value,
            'othercomments:', othercomments.value
        )
    
    })
})
