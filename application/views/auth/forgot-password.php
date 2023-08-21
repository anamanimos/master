<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Lupa Kata sandi? | Damai Jaya Super App</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-icons/font/bootstrap-icons.css') ?>">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/theme.min.css') ?>">

    <!-- custom css-->
    <style>
        .cursor-pointer:hover {
            cursor: pointer;
        }
    </style>
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
                    <div class="card-body " id="form-forgotpassword">
                        <div class="text-center">
                            <form method="post">
                                <div class="mb-1">
                                    <h1 class="display-5">Lupa Kata sandi?</h1>
                                    <p class="mb-0">Masukkan email yang Anda gunakan saat mendaftar dan kami akan mengirimkan instruksi selanjutnya melalui email.</p><br />
                                </div>
                                <div class="mb-3 text-start">
                                    <?php
                                    $adjust = '';
                                    if ($disabled == '') {
                                        $adjust = 'd-none';
                                    }
                                    ?>
                                    <input type="email" class="form-control form-control-lg form-control-light" name="email" id="form-email" tabindex="1" placeholder="Masukkan email Anda..." <?= $disabled ?>>
                                    <small class="text-danger pl-3 d-none" id="alert-email">Mohon masukkan email yang valid!</small>
                                    <small class="text-danger pl-3 <?= $adjust ?>" id="alert-email2">Terlalu banyak percobaan, ulangi 60 menit lagi.</small>
                                </div>
                                <div class="mb-1">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg" id="btn-send" <?= $disabled ?>>Kirim</button>

                                        <div class="text-center">
                                            <a class="btn btn-link" href="<?= base_url('auth') ?>">
                                                <i class="bi-chevron-left"></i> Masuk
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="card-body text-center d-none" id="success-forgotpassword">
                        <div class="mb-4">
                            <img class="avatar avatar-xxl avatar-4x3" src="<?= base_url('assets/svg/illustrations/oc-unlock.svg'); ?>" alt="Image Description" data-hs-theme-appearance="default">
                        </div>
                        <div class="mb-1">
                            <h1 class="display-5 text-success">Email terkirim!</h1>
                            <p class="mb-0">Silahkan cek email Anda untuk mengganti kata sandi.</p><br />
                        </div>
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

    <!-- JS Front -->
    <script src="<?= base_url('assets/js/theme.min.js') ?>"></script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            var baseurl = '<?= base_url() ?>';
            window.onload = function() {

                //validate email
                function validateEmail(inputText) {
                    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (inputText.match(mailFormat)) {
                        return true;
                    } else {
                        return false;
                    }
                }

                $('#form-email').on('change', function() {
                    if (validateEmail($('#form-email').val()) == false) {
                        $('#form-email').addClass('border border-danger');
                        $('#alert-email').addClass('text-danger');
                        $('#alert-email').html('');
                        $('#alert-email').append('Mohon masukkan email yang valid!');
                        $('#alert-email').removeClass('d-none');
                    } else {
                        $('#alert-email').addClass('d-none');
                        $('#form-email').removeClass('border border-danger');
                    }
                });

                // process form
                $('#btn-send').on('click', function(e) {
                    e.preventDefault;
                    $(this).attr('disabled', 'true');
                    $(this).html('');
                    $(this).append('Loading... <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
                    const email = $('#form-email').val();

                    $.ajax({
                        method: "post",
                        url: baseurl + "auth/ajaxforgotpassword",
                        data: {
                            email: email
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.status == 201) {
                                $('#btn-send').html('');
                                $('#btn-send').append('Kirim');
                                $('#form-email').prop('disabled', true);
                                $('#alert-email2').removeClass('d-none');
                            } else {
                                if (data.success == true) {
                                    $('#form-forgotpassword').addClass('d-none');
                                    $('#success-forgotpassword').removeClass('d-none');
                                } else {
                                    $('#btn-send').html('');
                                    $('#btn-send').append('Kirim');
                                    $('#btn-send').prop('disabled', false);
                                    $('.toast-login-bg').addClass('bg-soft-danger');
                                    $('.toast-login-title').html('');
                                    $('.toast-login-title').append('Gagal!');
                                    $('.toast-login-body').html('');
                                    $('.toast-login-body').append(data.detail);
                                    $('.toast-login-icon').html('');
                                    $('.toast-login-icon').append('<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>');
                                    const liveToast = new bootstrap.Toast($('#liveToast'));
                                    liveToast.show();
                                }
                            }
                        }
                    });
                });
            }
        })()
    </script>
</body>

</html>