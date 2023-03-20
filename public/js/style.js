

    var toggleBtn = document.getElementById("toggle-container");
    var isOpen = true;
    toggleBtn.addEventListener("click", () => {
        if (isOpen) {
            var divsToHide = document.getElementsByClassName("nav_name");
            document.getElementById("div-1").style.width = "5%";
            document.getElementById("div-1").style.transition = "0.6s";
            document.getElementById("div-2").style.width = "95%";

            document.getElementById("toggle-container").innerHTML =
                "<i class='bx bx-menu' id='header-toggle'></i>";
            for (var i = 0; i < divsToHide.length; i++) {

                divsToHide[i].style.display = "none";
            }
            isOpen = !isOpen;
        } else {
            document.getElementById("div-1").style.width = "15%";
            document.getElementById("div-2").style.transition = "0.6s";
            var divsToHide = document.getElementsByClassName("nav_name");
            document.getElementById("toggle-container").innerHTML =
                "<i class='bx bx-x' id='header-toggle'></i>";

            for (var i = 0; i < divsToHide.length; i++) {
                divsToHide[i].style.display = "block";

            }
            document.getElementById("div-2").style.width = "85%";
            isOpen = !isOpen;
        }
    })

    //create user
    $ = function(id) {
        return document.getElementById(id);
    }
    var show = function(id) {
        $(id).style.display = 'block';
    }
    var hide = function(id) {
        $(id).style.display = 'none';
    }

    //admin popup
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

