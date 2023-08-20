<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Masuk | Damai Jaya Super App</title>

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
            <div class="mx-auto" style="max-width: 30rem;">
                <!-- Card -->
                <div class="card card-lg mb-5">
                    <div class="card-body">
                        <!-- Form -->
                        <div class="text-center">
                            <div class="mb-5">
                                <h1 class="display-5">Masuk</h1>
                                <p>Belum memiliki akun? <a class="link" href="<?= base_url('auth/registration') ?>">Buat Akun</a></p>
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

                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label" for="signinSrEmail">Email Anda</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="form-email" tabindex="1" placeholder="email@address.com">
                            <small class="text-danger pl-3 d-none" id="alert-email">Mohon masukkan email yang valid!</small>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label w-100" for="signupSrPassword" tabindex="0">
                                <span class="d-flex justify-content-between align-items-center">
                                    <span>Kata Sandi</span>
                                    <a class="form-label-link mb-0" href="<?= base_url('auth/forgotpassword') ?>">Forgot Password?</a>
                                </span>
                            </label>

                            <div class="input-group input-group-merge">
                                <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="form-password" placeholder="Kata Sandi..." data-hs-toggle-password-options='{
                           "target": "#changePassTarget",
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": "#changePassIcon"
                         }'>
                                <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                                    <i id="changePassIcon" class="bi-eye"></i>
                                </a>
                            </div>
                            <small class="text-danger pl-3 d-none" id="alert-password">Mohon masukkan password yang valid!</small>
                        </div>
                        <!-- End Form -->

                        <!-- Form Check -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="form-remember" name="remember" onclick="isChecked()">
                            <label class="form-check-label" for="form-remember">
                                Ingat saya
                            </label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="submit-login">
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
        // CHECKED REMEMBER ME
        var remember = false;
        var dataSet;

        function isChecked() {
            // Get the checkbox
            var checkBox = document.getElementById("form-remember");
            // Get the output text
            var text = document.getElementById("text");



            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                remember = true;
            } else {
                remember = false;
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

                // VALIDASI
                $('#submit-login').on('click', function() {
                    $('#alert-email').addClass('d-none');
                    $('#form-email').removeClass('border border-danger');
                    $('#alert-password').addClass('d-none');
                    $('#form-password').removeClass('border border-danger');

                    var email = $('#form-email').val();
                    var password = $('#form-password').val();

                    if (validateEmail(email) == true && password != '') {
                        $(this).attr('disabled', 'true');
                        $(this).html('');
                        $(this).append('Loading... <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');


                        if (remember == true) {
                            dataSet = {
                                email: email,
                                password: password,
                                remember: remember
                            }
                        } else {
                            dataSet = {
                                email: email,
                                password: password,
                            }
                        }
                        $.ajax({
                            method: "post",
                            url: baseurl + "auth/ajaxlogin",
                            data: dataSet,
                            dataType: 'JSON',
                            success: function(data) {
                                console.log(data);
                                if (data.status == 200 && data.success == true) {
                                    $('.toast-login-bg').addClass('bg-soft-success');
                                    $('.toast-login-title').html('');
                                    $('.toast-login-title').append('Berhasil Masuk!');
                                    $('.toast-login-body').html('');
                                    $('.toast-login-body').append('Mohon menunggu, Anda akan dialihkan!');
                                    $('.toast-login-icon').html('');
                                    $('.toast-login-icon').append('<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>');
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 1500);
                                } else {
                                    $('#submit-login').prop("disabled", false);
                                    $('#submit-login').html('');
                                    $('#submit-login').append('Masuk');
                                    $('.toast-login-bg').addClass('bg-soft-danger');
                                    $('.toast-login-title').html('');
                                    $('.toast-login-title').append('Gagal!');
                                    $('.toast-login-body').html('');
                                    $('.toast-login-body').append(data.detail);
                                    $('.toast-login-icon').html('');
                                    $('.toast-login-icon').append('<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>');
                                }
                                const liveToast = new bootstrap.Toast($('#liveToast'));
                                liveToast.show();
                            }
                        });

                    } else {
                        if (validateEmail(email) == false) {
                            $('#form-email').addClass('border border-danger');
                            $('#alert-email').removeClass('d-none');
                        }
                        if (password == '') {
                            $('#form-password').addClass('border border-danger');
                            $('#alert-password').removeClass('d-none');
                        }
                    }


                })
            }
        })()
    </script>
</body>

</html>