

    var toggleBtn = document.getElementById("toggle-container");
    var isOpen = true;
    toggleBtn.addEventListener("click", () => {
        if (isOpen) {
            var divsToHide = document.getElementsByClassName("nav_name");
            document.getElementById("div-1").style.width = "5%";
            document.getElementById("div-1").style.transition = "0.6s";
            document.getElementById("div-2").style.width = "95%";

            document.getElementById("toggle-container").innerHTML =
                "<i class='fa-solid fa-chevron-right header_toggle'></i>";
            for (var i = 0; i < divsToHide.length; i++) {

                divsToHide[i].style.display = "none";
            }
            isOpen = !isOpen;
        } else {
            document.getElementById("div-1").style.width = "15%";
            document.getElementById("div-2").style.transition = "0.6s";
            var divsToHide = document.getElementsByClassName("nav_name");
            document.getElementById("toggle-container").innerHTML =
                "<i class='fa-solid fa-chevron-left  header_toggle'></i>";

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
        $(id).style.display = 'flex';
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



      function openCheck(evt, Name) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(Name).style.display = "block";
            evt.currentTarget.className += " active";

        }
        document.getElementById("defaultOpen").click();



//show password
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


    var imagePopup = document.getElementById('imagePopup')
function popUpImage(val) {

    imagePopup.style.display="flex"
}
    imagePopup.addEventListener('click',()=>{imagePopup.style.display="none"})





  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function check(val) {
    document.getElementById('sam1').style.display="flex"
    document.getElementById('tag').value = val['id']
    document.getElementById('tag1').value = val['name']
    document.getElementById('tag2').value = val['gender']
    document.getElementById('tag3').value = val['date_of_birth']
    document.getElementById('tag4').value = val['company']
    document.getElementById('tag5').value = val['address']
    document.getElementById('tag6').value = val['email']
    document.getElementById('tag7').value = val['mobile']
}

