var menuToggle = document.querySelector(".toggle-menu");

if(window.matchMedia("(min-width : 980px)").matches){
    // GSAP

    var tlmenu = new TimelineMax({
        paused : true
    })
    tlmenu.fromTo(".nav .menu .li span, .logo span", 0.2,
    {
        opacity : 1,
        display : "block"
    },
    {
        opacity : 0,
        display : "none",
        ease : "power2.out"
    })

    tlmenu.fromTo(".logo .bi", 0.3,
        {css : {marginRight: "15px"}},
        {css : {marginRight : 0}, ease : "power2.out"}, .01)

    tlmenu.fromTo(".nav", 0.5,
        {width : "280px"},
        {width : "60px", ease : "power2.out"}, .1)

    tlmenu.fromTo(".content, .footer", 0.5,
        {width: "calc(100% - 280px)"},
        {width : "calc(100% - 60px)", ease : "power2.out"}, .1)

    menuToggle.onclick = () => {
        menuToggle.classList.toggle("active");

        if(menuToggle.classList.contains("active")){
            tlmenu.reverse(0)
        } else {
            tlmenu.play(0)
        }
    }

    }else {
        // gsap mobile 
        var tlmenuMob = new TimelineMax({
            paused : true
        })

        tlmenuMob.fromTo(".nav .menu li span, .logo span", 0.2, {
            opacity : 0,
            display : "none"
        },
        {
            opacity : 1,
            display : "block",
            ease : "power2.out"
        })

        tlmenuMob.fromTo(".logo .b", 0.3,
        {css : {marginRight : "0"}},
        {css : {marginRight : "15px"}, ease : "power2.out"}, .01)

        tlmenuMob.fromTo(".nav", 0.5,
        {width : "60px"},
        {width : "200px", ease : "power2.out"}, .1)

        tlmenuMob.fromTo(".content, .footer", 0.5,
        {width : "calc(100% - 80px)"}, 
        {width : "calc(100% - 200px)", ease : "power2.out"}, .1)

        menuToggle.onclick = () => {
            menuToggle.classList.toggle("active");
            if(menuToggle.classList.contains("active")){
                tlmenuMob.reverse(0)
            } else {
                tlmenuMob.play(0)
            }
        }
}