

    console.log(document.querySelector(".burger-menu"));

    document.querySelector('.burger-menu').onclick = function(){
        let mobile_bars = document.querySelectorAll('.burger-menu span');
        const body = document.querySelector("body");

        for(const mobile_bar of mobile_bars){
            mobile_bar.classList.toggle('active');
        }

        let mobile_menu = document.querySelector('.main-nav')

        mobile_menu.classList.toggle('active');

        body.classList.toggle('mobile-menu-active');
    }

    document.querySelector('.edit-options button').onclick = function(){
        document.querySelector('.edit-image').classList.toggle('open');
    }