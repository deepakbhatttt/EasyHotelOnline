<?php 
    require('inc/essentials.php');
    adminLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Setting</title>
    <?php require("inc/links.php")?>
</head>

<body class="bg-light">

    <?php require('inc/header.php')?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>
                <!-- General Settigs Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-setting"><i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title">Arahnyam</p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about">About Us Content</p>
                    </div>
                </div>

                <!-- Modal for General Settigs -->
                <div class="modal fade" id="general-setting" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_setting_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Setting</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" id="site_title_inp" name="site_title"
                                            class="form-control shadow-none" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">About Us</label>
                                        <textarea type="text" id="site_about_inp" name="site_about"
                                            class="form-control shadow-none" rows="8" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal"
                                        onclick="site_title.value=general_data.site_title, site_about.value=general_data.site_about">CANCEL</button>
                                    <button type="submit" class="btn bg-dark text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shutdown Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <form action="">
                                <div class="form-check form-switch">
                                    <input onchange="update_shutdown(this.value)" class="form-check-input"
                                        type="checkbox" role="switch" id="shutdown-toggle">
                                </div>
                            </form>
                        </div>
                        <p class="card-text">No Coustomer Will Be allowed to book hotel rooms, when shutdown mode is
                            turned on</p>
                    </div>
                </div>

                <!-- Contact Detail Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contacts Setting</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#contacts-setting"><i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="g-map"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="phn-1"></span>
                                    </p>
                                    <p class="card-text"><i class="bi bi-telephone-fill"></i>
                                        <span id="phn-2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="ig"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame Links</h6>
                                    <iframe frameborder="0" loading="lazy" class="border p-2 w-100"
                                        id="iframe"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Contact Details -->
                <div class="modal fade" id="contacts-setting" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contact_seeting_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Contact Setting</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address</label>
                                                    <input type="text" id="address-inp" name="address"
                                                        class="form-control shadow-none" required></input>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Link</label>
                                                    <input type="text" id="g-map-inp" name="address"
                                                        class="form-control shadow-none" required></input>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Phone Numbers</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" class="form-control shadow-none" id="phn-1-inp"
                                                            placeholder="Phone Number" aria-label="Phone Number"
                                                            required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" class="form-control shadow-none" id="phn-2-inp"
                                                            placeholder="Phone Number" aria-label="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email</label>
                                                    <input type="email" id="email-inp" name="Email"
                                                        class="form-control shadow-none" required></input>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" class="form-control shadow-none" id="fb-inp"
                                                            placeholder="Facebook" aria-label="Phone Number">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" class="form-control shadow-none" id="ig-inp"
                                                            placeholder="Instagram" aria-label="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iFrame Src</label>
                                                    <input type="text" id="iframe-inp" name="iframe src"
                                                        class="form-control shadow-none" required></input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal"
                                        onclick="contacts_inp(contacts_data)">CANCEL</button>
                                    <button type="submit" class="btn bg-dark text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php require('inc/scripts.php')?>

    <script>
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let general_setting_form = document.getElementById('general_setting_form');
        let contact_seeting_form = document.getElementById('contact_seeting_form');

        function get_general() {
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');

            let shutdown_toggle = document.getElementById('shutdown-toggle');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                general_data = JSON.parse(this.responseText);

                //Updating the fetched data 

                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;

                //Updating the fetched data into modal form
                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;
                // general_data = this.responseText;
                // console.log(general_data);

                //Site Shutdown Setting
                if (general_data.shutdown == 0) {
                    shutdown_toggle.checked = false;
                    shutdown_toggle.value = 0;
                } else {
                    shutdown_toggle.checked = true;
                    shutdown_toggle.value = 1;
                }
            }
            xhr.send('get_general');
        }

        function get_contact_details() {
            let contacts_id = ['address', 'g-map', 'phn-1', 'phn-2', 'email', 'fb', 'ig'];
            let iframe = document.getElementById('iframe');
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                contacts_data = JSON.parse(this.responseText);
                contacts_data = Object.values(contacts_data);

                for (i = 0; i < contacts_id.length; i++) {
                    document.getElementById(contacts_id[i]).innerHTML = contacts_data[i + 1];
                }
                iframe.src = contacts_data[9];
                contacts_inp(contacts_data);
            }
            xhr.send('get_contacts');
        }

// After Submit is pressed 
        // General Setting Form Event Handling
        general_setting_form.addEventListener('submit', function (e) {
            e.preventDefault();
            update_general(site_title_inp.value, site_about_inp.value);
        });

        // Contact Setting Form Event Handling
        contact_seeting_form.addEventListener('submit', function (e) {
            e.preventDefault();
            update_contacts();
        });


// Data Updation from modal forms after submission of form
        function update_general(site_title_val, site_about_val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                //Hiding Modal
                var myModal = document.getElementById('general-setting');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if (this.responseText == 1) {
                    alertmsg('success', 'Changes Made Successfully');
                    get_general();
                } else {
                    alertmsg('error', 'No Changes Made');
                }
            }
            xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&update_general');
        }

        function update_shutdown(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {

                // if (this.responseText == 0 && general_data.shutdown==0)
                if (general_data.shutdown == 0) {
                    alertmsg('error', 'Site is Offline Now !');
                }
                else {
                    alertmsg('success', 'Site is Online Now !');
                }
                get_general();
            }
            xhr.send('update_shutdown=' + val);
        }

        function update_contacts(){
            let index = ['address', 'g-map', 'phn-1', 'phn-2', 'email', 'fb', 'ig', 'iframe'];
            let contacts_inp_id = ['address-inp', 'g-map-inp', 'phn-1-inp', 'phn-2-inp', 'email-inp', 'fb-inp', 'ig-inp', 'iframe-inp'];

            let str = "";
            
            for(i=0;i<index.length;i++){
                str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + "&";
            }
            str += "update_contacts";
            // console.log(str);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function(){
                //Hiding modal
                var myModal = document.getElementById('contacts-setting');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                // console.log("response text - " + this.responseType);
                if (this.responseText == 1) {
                    alertmsg('success', 'Changes Made Successfully');
                    get_contact_details();
                } else {
                    alertmsg('error', 'No Changes Made');
                }
            }
            xhr.send(str);
        }

        function contacts_inp(data){
            let contacts_inp_id = ['address-inp', 'g-map-inp', 'phn-1-inp', 'phn-2-inp', 'email-inp', 'fb-inp', 'ig-inp', 'iframe-inp'];
            for(i=0;i<contacts_inp_id.length;i++)
            {
                document.getElementById(contacts_inp_id[i]).value = data[i+1];
            }
        }

        window.onload = function () {
            get_general();
            get_contact_details();
        }
    </script>
</body>

</html>