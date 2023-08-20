<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Buat Akun | Damai Jaya Super App</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-icons/font/bootstrap-icons.css') ?>">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/theme.min.css') ?>">
</head>

<body>
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(<?= base_url('assets/svg/components/card-6.svg') ?>);">
            <!-- Shape -->
            <div class="shape shape-bottom zi-1">
                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                    <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
                </svg>
            </div>
            <!-- End Shape -->
        </div>

        <!-- Content -->
        <div class="container py-5 py-sm-7">
            <a class="d-flex justify-content-center mb-5" href="<?= base_url(); ?>">
                <img class="zi-2" src="<?= base_url('/assets/svg/logos/logo.svg') ?>" alt="Damai Jaya Super App" style="width: 15rem;">
            </a>
            <div class="mx-auto" style="max-width: 50rem;">
                <!-- Card -->
                <div class="card card-lg mb-5">
                    <div class="card-body" id="card-repleace">
                        <!-- Form -->
                        <div class="text-center">
                            <div class="mb-5">
                                <h1 class="display-5">Buat Akun</h1>
                                <p>Sudah memiliki akun? <a class="link" href="<?= base_url('auth/') ?>">Masuk</a></p>
                            </div>


                            <!-- <div class="d-grid mb-4">
                                    <a class="btn btn-white btn-lg" href="#">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img class="avatar avatar-xss me-2" src="./assets/svg/brands/google-icon.svg" alt="Image Description">
                                            Masuk dengan akun Google
                                        </span>
                                    </a>
                                </div>

                                <span class="divider-center text-muted mb-4">Atau</span> -->
                        </div>
                        <div class="row">
                            <!-- Form -->
                            <div class="mb-4 col-12">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg form-control-light" name="name" id="form-name" tabindex="1" placeholder="Nama Lengkap...">
                                <small class="text-danger pl-3 d-none" id="alert-name">Mohon masukkan nama yang valid!</small>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4 col-12 col-lg-6">
                                <label class="form-label" for="signinSrEmail">Email Anda</label>
                                <input type="email" class="form-control form-control-lg form-control-light" name="email" id="form-email" tabindex="1" placeholder="email@address.com">
                                <small class="text-danger pl-3 d-none" id="alert-email">Mohon masukkan email yang valid!</small>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="form-wa" class="form-label">Nomor WhatsApp</label>

                                <div class="input-group input-group-merge" id="form-wa-group">
                                    <div class="input-group-prepend input-group-text" id="form-waAddOn">
                                        +62
                                    </div>
                                    <input type="number" class="form-control form-control-lg form-control-light" id="form-wa" placeholder="8XXXXXXX">
                                </div>
                                <small class="text-danger pl-3 d-none" id="alert-wa">Mohon masukkan nomor WhatsApp yang valid!</small>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4 col-12 col-lg-6">
                                <label class="form-label w-100" for="signupSrPassword" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                        <span>Kata Sandi</span>
                                    </span>
                                </label>

                                <div class="input-group input-group-merge" id="form-password1-wrapper">
                                    <input type="password" class="js-toggle-password form-control form-control-lg form-control-light" name="password1" id="form-password1" placeholder="Kata Sandi..." data-hs-toggle-password-options='{
                           "target": "#changePassTarget1",
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": "#changePassIcon1"
                         }'>
                                    <a id="changePassTarget1" class="input-group-append input-group-text" href="javascript:;">
                                        <i id="changePassIcon1" class="bi-eye"></i>
                                    </a>
                                </div>
                                <small class="text-danger pl-3 d-none" id="alert-password1">Mohon masukkan kata sandi yang valid!</small>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4 col-12 col-lg-6">
                                <label class="form-label w-100" for="signupSrPassword" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                        <span>Ulangi Kata Sandi</span>
                                    </span>
                                </label>

                                <div class="input-group input-group-merge " id="form-password2-wrapper">
                                    <input type="password" class="js-toggle-password form-control form-control-lg form-control-light" name="password2" id="form-password2" placeholder="Ulangi Kata Sandi..." data-hs-toggle-password-options='{
                           "target": "#changePassTarget2",
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": "#changePassIcon2"
                         }'>
                                    <a id="changePassTarget2" class="input-group-append input-group-text" href="javascript:;">
                                        <i id="changePassIcon2" class="bi-eye"></i>
                                    </a>
                                </div>
                                <small class="text-danger pl-3 d-none" id="alert-password2">Mohon masukkan kata sandi yang valid!</small>
                            </div>
                            <!-- End Form -->
                        </div>



                        <!-- Form Check -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="form-terms" name="terms" onclick="isChecked()">
                            <label class="form-check-label" for="form-terms">
                                Saya memerima <a href="#">Syarat dan Ketentuan</a>
                            </label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="submit-register">
                                Masuk
                            </button>
                        </div>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->

                <!-- Footer -->
                <div class="position-relative text-center zi-1">
                    <small class="text-cap text-body mb-4">Crafted with <span class="text-danger">❤️</span> by</small>
                    <div class="w-85 mx-auto">
                        <div class="row justify-content-between">
                            <div class="col">
                                <img class="img-fluid" src="<?= base_url('assets/img/artspace-logo.png') ?>" alt="Logo">
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Footer -->
            </div>
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- Toast -->
    <div id="liveToast" class="position-fixed toast hide" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;" data-bs-autohide="true">
        <div class="toast-header toast-login-bg">
            <div class="d-flex align-items-center flex-grow-1">
                <div class="flex-shrink-0 toast-login-icon">
                    <span class="icon icon-primary">
                        <i class="bi bi-brush-fill"></i>
                    </span>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0 toast-login-title">{title}</h5>
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="toast-body toast-login-body">
            {body}
        </div>
    </div>
    <!-- End Toast -->

    <!-- JS Global Compulsory  -->
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- JS Implementing Plugins -->
    <script src="<?= base_url('assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js') ?>"></script>

    <!-- JS Front -->
    <script src="<?= base_url('assets/js/theme.min.js') ?>"></script>

    <!-- JS Plugins Init. -->
    <script>
        // CHECKED TERMS
        var terms = false;

        function isChecked() {
            // Get the checkbox
            var checkBox = document.getElementById("form-terms");
            // Get the output text
            var text = document.getElementById("text");



            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                terms = true;
            } else {
                terms = false;
            }
        }

        (function() {
            var baseurl = '<?= base_url() ?>';
            window.onload = function() {
                // INITIALIZATION OF TOGGLE PASSWORD
                // =======================================================
                new HSTogglePassword('.js-toggle-password')


                function validateEmail(inputText) {
                    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (inputText.match(mailFormat)) {
                        return true;
                    } else {
                        return false;
                    }
                }

                // VALIDASI EMAIL OnChange Value
                $('#form-email').on('change', function() {
                    if (validateEmail($('#form-email').val()) == true) {
                        $('#form-email').removeClass('border border-danger');
                        $('#alert-email').addClass('d-none');

                        // check duplikat email
                        $.ajax({
                            method: "post",
                            url: baseurl + "auth/ajaxregistercheckemail",
                            data: {
                                email: $('#form-email').val()
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.success == true) {
                                    $('#form-email').addClass('border border-success');
                                    $('#alert-email').html('');
                                    $('#alert-email').append(data.detail);
                                    $('#alert-email').removeClass('d-none text-danger');
                                    $('#alert-email').addClass('text-success');
                                } else {
                                    $('#form-email').addClass('border border-danger');
                                    $('#alert-email').html('');
                                    $('#alert-email').append(data.detail);
                                    $('#alert-email').removeClass('d-none text-success');
                                    $('#alert-email').addClass('text-danger');
                                }
                            }
                        });
                    } else {
                        $('#form-email').addClass('border border-danger');
                        $('#alert-email').addClass('text-danger');
                        $('#alert-email').html('');
                        $('#alert-email').append('Mohon masukkan email yang valid!');
                        $('#alert-email').removeClass('d-none');
                    }
                });

                // VALIDASI WA OnChange Value
                $('#form-wa').on('change', function() {
                    // check duplikat email
                    $.ajax({
                        method: "post",
                        url: baseurl + "auth/ajaxregistercheckwhatsapp",
                        data: {
                            whatsapp: $('#form-wa').val()
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            console.log(data);
                            if (data.success == true) {
                                $('#form-wa-group').removeClass('border border-danger');
                                $('#form-wa-group').addClass('border border-success');
                                $('#alert-wa').html('');
                                $('#alert-wa').append(data.detail);
                                $('#alert-wa').removeClass('d-none text-danger');
                                $('#alert-wa').addClass('text-success');
                            } else {
                                $('#form-wa-group').addClass('border border-danger');
                                $('#alert-wa').removeClass('d-none text-success');
                                $('#alert-wa').addClass('text-danger');
                                $('#alert-wa').html('');
                                $('#alert-wa').append(data.detail);

                            }
                        }
                    });
                });

                // VALIDASI
                $('#submit-register').on('click', function() {
                    $('#alert-name').addClass('d-none');
                    $('#form-name').removeClass('border border-danger');
                    $('#alert-password1').addClass('d-none');
                    $('#form-password1').removeClass('border border-danger');
                    $('#alert-password2').addClass('d-none');
                    $('#form-password2').removeClass('border border-danger');

                    var name = $('#form-name').val();
                    var email = $('#form-email').val();
                    var whatsapp = $('#form-wa').val();
                    var password1 = $('#form-password1').val();
                    var password2 = $('#form-password2').val();

                    if (name != '' && validateEmail(email) == true && whatsapp != '' && password1 != '' && password2 != '' && terms == true) {
                        if (password1 == password2) {
                            $(this).attr('disabled', 'true');
                            $(this).html('');
                            $(this).append('Loading... <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

                            let dataSet = {
                                name: name,
                                email: email,
                                whatsapp: whatsapp,
                                password: password1,
                            }
                            $.ajax({
                                method: "post",
                                url: baseurl + "auth/ajaxregister",
                                data: dataSet,
                                dataType: 'JSON',
                                success: function(data) {
                                    if (data.status == 200 && data.success == true) {
                                        $('#card-repleace').html('');
                                        $('#card-repleace').append('<div class="text-center"><h1 class="display-3 mb-5">Registrasi Berhasil!</h1><img class="card-img mb-5" src="<?= base_url('assets/svg/illustrations/oc-hi-five.svg') ?>" data-hs-theme-appearance="default" style="max-width: 15rem;"><br /><a href="" class="btn btn-lg btn-primary"><i class="bi bi-envelope-open-heart-fill"></i> &nbsp;&nbsp;Aktivasi lewat Email</a>&nbsp;&nbsp;<a href="" class="btn btn-lg btn-primary"><i class="bi bi-whatsapp"></i> &nbsp;&nbsp;Aktivasi lewat WhatsApp</a></div>');
                                    } else {
                                        $('#submit-login').prop("disabled", false);
                                        $('#submit-login').html('');
                                        $('#submit-login').append('Masuk');
                                        $('.toast-login-bg').addClass('bg-soft-danger');
                                        $('.toast-login-title').html('');
                                        $('.toast-login-title').append('Gagal!');
                                        $('.toast-login-body').html('');
                                        $('.toast-login-body').append('Galat server!');
                                        $('.toast-login-icon').html('');
                                        $('.toast-login-icon').append('<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>');
                                        const liveToast = new bootstrap.Toast($('#liveToast'));
                                        liveToast.show();
                                    }

                                }
                            });
                        } else {
                            $('#alert-password1').html('');
                            $('#alert-password1').append('Kata Sandi tidak sama!');
                            $('#form-password1-wrapper').addClass('border border-danger');
                            $('#alert-password1').removeClass('d-none');
                            $('#alert-password2').html('');
                            $('#alert-password2').append('Kata Sandi tidak sama!');
                            $('#form-password2-wrapper').addClass('border border-danger');
                            $('#alert-password2').removeClass('d-none');
                        }


                    } else {
                        if ($('#form-name').val() == '') {
                            $('#form-name').addClass('border border-danger');
                            $('#alert-name').removeClass('d-none');
                        }
                        if (validateEmail(email) == false) {
                            $('#form-email').addClass('border border-danger');
                            $('#alert-email').removeClass('d-none');
                        }
                        if ($('#form-wa').val() == '') {
                            $('#form-wa-group').addClass('border border-danger');
                            $('#alert-wa').removeClass('d-none');
                        }
                        if (password1 == '') {
                            $('#form-password1-wrapper').addClass('border border-danger');
                            $('#alert-password1').removeClass('d-none');
                        }
                        if (password2 == '') {
                            $('#form-password2-wrapper').addClass('border border-danger');
                            $('#alert-password2').removeClass('d-none');
                        }
                        if (terms == false) {
                            $('.toast-login-bg').addClass('bg-soft-danger');
                            $('.toast-login-title').html('');
                            $('.toast-login-title').append('Error!');
                            $('.toast-login-body').html('');
                            $('.toast-login-body').append('Mohon setujui dan centang bagian Syarat dan ketentuan');
                            $('.toast-login-icon').html('');
                            $('.toast-login-icon').append('<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>');

                            const liveToast = new bootstrap.Toast($('#liveToast'));
                            liveToast.show();
                        }
                    }


                })
            }
        })()
    </script>
</body>

</html>