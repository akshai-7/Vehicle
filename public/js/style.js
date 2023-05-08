//sidebar
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


  $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

//admin update
function checkadmin(val) {
    document.getElementById('sam1').style.display="flex"
    document.getElementById('id').value = val['id']
    document.getElementById('name').value = val['name']
    document.getElementById('gender').value = val['gender']
    document.getElementById('date_of_birth').value = new Date(val['date_of_birth']).toLocaleDateString()
    document.getElementById('company').value = val['company']
    document.getElementById('address').value = val['address']
    document.getElementById('address').value = val['address']
    document.getElementById('email').value = val['email']
    document.getElementById('city').value = val['city']
    document.getElementById('mobile').value = val['mobile']
    document.getElementById('postcode').value = val['postcode']
    document.getElementById('updateImage').src = "http://127.0.0.1:8000/images/" + val['license']
    document.getElementById('role').value=val['role']
    }
//user update
function check(val) {
    document.getElementById('sam1').style.display="flex"
    document.getElementById('id').value = val['id']
    document.getElementById('name').value = val['name']
    document.getElementById('gender').value = val['gender']
    document.getElementById('date_of_birth').value = new Date(val['date_of_birth']).toLocaleDateString()
    document.getElementById('company').value = val['company']
    document.getElementById('address').value = val['address']
    document.getElementById('address').value = val['address']
    document.getElementById('email').value = val['email']
    document.getElementById('city').value = val['city']
    document.getElementById('mobile').value = val['mobile']
    document.getElementById('postcode').value = val['postcode']
    document.getElementById('updateImage').src = "http://127.0.0.1:8000/images/" + val['license']
    document.getElementById('role').value=val['role']
}

//update vehicle
function check1(val) {

    document.getElementById('sam1').style.display="flex"
    document.getElementById('id').value = val['id']
    document.getElementById('number_plate').value = val['number_plate']
    document.getElementById('vehicle_type').value = val['vehicle_type']
    document.getElementById('make').value = val['make']
    document.getElementById('vehicle_model').value = val['vehicle_model']
    document.getElementById('mileage').value = val['mileage']
    document.getElementById('service').value = new Date(val['servicedate']).toLocaleDateString()
}

//update visual check
function visual(val) {
    document.getElementById('updatePopup1').style.display="flex"
    document.getElementById('id').value = val['id']
    document.getElementById('inspection_id').value = val['inspection_id']
    document.getElementById('view').value = val['view']
    document.getElementById('feedback').value = val['feedback']
    document.getElementById('action').value = val['action']
    document.getElementById('image').value = val['image']
}

//update vehicle check
function vehicle(val) {
    document.getElementById('updatePopup2').style.display="flex"
    document.getElementById('id1').value = val['id']
    document.getElementById('inspection_id1').value = val['inspection_id']
    document.getElementById('view1').value = val['view']
    document.getElementById('feedback1').value = val['feedback']
    document.getElementById('action1').value = val['action']
    document.getElementById('image1').value = val['image']
}

//update cabin check
function cabin(val) {
    document.getElementById('updatePopup3').style.display="flex"
    document.getElementById('id2').value = val['id']
    document.getElementById('inspection_id2').value = val['inspection_id']
    document.getElementById('view2').value = val['view']
    document.getElementById('feedback2').value = val['feedback']
    document.getElementById('action2').value = val['action']
    document.getElementById('image2').value = val['image']
}

//assign
function assign(val) {
    document.getElementById('updatePopup4').style.display="flex"
    document.getElementById('user_id').value = val['id']
    document.getElementById('name').value = val['name']
    document.getElementById('email').value = val['email']
    document.getElementById('mobile').value = val['mobile']
    document.getElementById('vehicle_id').value = val['vehicle_id']
    document.getElementById('number_plate').value = val['number_plate']
    document.getElementById('mileage').value = val['mileage']
    document.getElementById('date').value = val['created_at']
}

//report
function report(val) {
    document.getElementById('updatePopup5').style.display="flex"
    document.getElementById('id').value = val['id']
    document.getElementById('date').value = new Date(val['date']).toLocaleDateString()
    document.getElementById('location').value = val['location']
    document.getElementById('mobile').value = val['mobile']
    document.getElementById('witnessed_by').value = val['witnessed_by']
    document.getElementById('mobile').value = val['mobile']
    document.getElementById('statement').value = val['statement']
}

function image(val) {
    document.getElementById('sam2').style.display = "flex"
    document.getElementById('licenseimage').src = "http://127.0.0.1:8000/images/" + val['license']
}





