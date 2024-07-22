let prevScrollpos = window.pageYOffset;
    let navbar = document.querySelector("nav");

    window.onscroll = function() {
        let currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            navbar.style.transform = "translateY(0)";
        } else {
            navbar.style.transform = "translateY(-100%)";
        }
        prevScrollpos = currentScrollPos;
    }

    document.getElementById("userIcon").addEventListener("click", function() {
        document.getElementById("userPopup").style.display = "flex";
    });

    document.getElementById("closeBtn").addEventListener("click", function() {
        document.getElementById("userPopup").style.display = "none" ;
    });