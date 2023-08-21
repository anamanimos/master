<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Aktivasi Akun | Damai Jaya Super App</title>

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
                    <div class="text-end m-3">
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i>&nbsp;&nbsp;&nbsp;Keluar</a>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="mb-4">
                                <img class="avatar avatar-xxl avatar-4x3" src="<?= base_url('assets/svg/illustrations/oc-unlock.svg'); ?>" alt="Image Description" data-hs-theme-appearance="default">
                            </div>
                            <div class="mb-1">
                                <h1 class="display-5">Akun Nonaktif</h1>
                                <p class="mb-0">Aktivasi akun Anda untuk dapat menggunakan situs ini. Aktivasi dapat dilakukan melalui Email atau nomor WhatsApp Anda.</p><br />
                            </div>
                            <div id="btn-activate-wrapper" class="mb-1">
                                <button class="btn btn-sm btn-primary btn-send" id="send-email"><i class="bi bi-envelope-open-heart-fill"></i> Aktivasi lewat Email</button>
                                <span class="divider-center text-muted mb-2 mt-2">Atau</span>
                                <button class="btn btn-sm btn-primary btn-send" id="send-wa"><i class="bi bi-whatsapp"></i> Aktivasi lewat WhatsApp</button>
                                <p class="mb-0 mt-5">Sudah memiliki kode Aktivasi? <span id="go-to-form" class="text-primary cursor-pointer">Masukkan Kode</span></p>
                            </div>
                            <div id="form-activate-wrapper" class="mb-3 d-none">
                                <div class="row gx-2 gx-sm-3">
                                    <div class="col">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-single-number form-control-light" name="code1" id="a1" maxlength="1" autocomplete="off" autocapitalize="off" spellcheck="false" autofocus <?= $disabled ?>>
                                        </div>
                                        <!-- End Form -->
                                    </div>

                                    <div class="col">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-single-number form-control-light" name="code2" id="a2" maxlength="1" autocomplete="off" autocapitalize="off" spellcheck="false" <?= $disabled ?>>
                                        </div>
                                        <!-- End Form -->
                                    </div>

                                    <div class="col">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-single-number form-control-light" name="code3" id="a3" maxlength="1" autocomplete="off" autocapitalize="off" spellcheck="false" <?= $disabled ?>>
                                        </div>
                                        <!-- End Form -->
                                    </div>

                                    <div class="col">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-single-number form-control-light" name="code4" id="a4" maxlength="1" autocomplete="off" autocapitalize="off" spellcheck="false" <?= $disabled ?>>
                                        </div>
                                        <!-- End Form -->
                                    </div>

                                    <div class="col">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-single-number form-control-light" name="code5" id="a5" maxlength="1" autocomplete="off" autocapitalize="off" spellcheck="false" <?= $disabled ?>>
                                        </div>
                                        <!-- End Form -->
                                    </div>

                                    <div class="col">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-single-number form-control-light" name="code6" id="a6" maxlength="1" autocomplete="off" autocapitalize="off" spellcheck="false" <?= $disabled ?>>
                                        </div>
                                        <!-- End Form -->
                                    </div>
                                </div>
                                <div class="d-grid mb-3">
                                    <button class="btn btn-primary btn-lg" id="btn-activate" <?= $disabled ?>>Aktivasi Akun</button>
                                    <?php
                                    $adjust = '';
                                    if ($disabled == '') {
                                        $adjust = 'd-none';
                                    }
                                    ?>
                                    <span class="text-danger <?= $adjust ?>">Terlalu banyak percobaan gagal. Tunggu 60 menit untuk mencoba lagi.</span>
                                </div>


                                <div class="text-center">
                                    <p>Belum menerima kode aktivasi? <a href="<?= base_url('auth/activate') ?>">Kirim Kode aktivasi</a></p>
                                </div>
                            </div>
                            <div id="loading-activate-wrapper" class="mb-3 d-none">
                                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"> <span class="visually-hidden"> Loading... < /span>
                                </div><br /><span class="text-primary">Mengirim kode aktivasi...</span>
                            </div>
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

                // open form
                $('#go-to-form').on('click', function() {
                    $('#btn-activate-wrapper').addClass('d-none');
                    $('#form-activate-wrapper').removeClass('d-none');
                });

                // send code
                $('.btn-send').on('click', function() {
                    $('#btn-activate-wrapper').addClass('d-none');
                    $('#loading-activate-wrapper').removeClass('d-none');
                    const action = $(this).attr('id');
                    $.ajax({
                        method: "post",
                        url: baseurl + "auth/ajaxsendcode",
                        data: {
                            action: action
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.success == true) {
                                $('#loading-activate-wrapper').addClass('d-none');
                                $('#form-activate-wrapper').removeClass('d-none');
                                $('.toast-login-bg').addClass('bg-soft-success');
                                $('.toast-login-title').html('');
                                $('.toast-login-title').append('Sukses!');
                                $('.toast-login-body').html('');
                                $('.toast-login-body').append(data.detail);
                                $('.toast-login-icon').html('');
                                $('.toast-login-icon').append('<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>');
                            } else {
                                $('#loading-activate-wrapper').addClass('d-none');
                                $('#btn-activate-wrapper').removeClass('d-none');
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
                });

                // activate
                $('#btn-activate').on('click', function() {
                    $(this).attr('disabled', 'true');
                    $(this).html('');
                    $(this).append('Loading... <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
                    const code = $('#a1').val() + $('#a2').val() + $('#a3').val() + $('#a4').val() + $('#a5').val() + $('#a6').val();
                    $.ajax({
                        method: "post",
                        url: baseurl + "auth/ajaxactivate",
                        data: {
                            code: code
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.success == true) {
                                $('.toast-login-bg').addClass('bg-soft-success');
                                $('.toast-login-title').html('');
                                $('.toast-login-title').append('Aktivasi akun berhasil!');
                                $('.toast-login-body').html('');
                                $('.toast-login-body').append('Mohon menunggu, Anda akan dialihkan!');
                                $('.toast-login-icon').html('');
                                $('.toast-login-icon').append('<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>');
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1500);
                            } else {
                                if (data.status == 201) {
                                    $('#a1').prop("disabled", true);
                                    $('#a2').prop("disabled", true);
                                    $('#a3').prop("disabled", true);
                                    $('#a4').prop("disabled", true);
                                    $('#a5').prop("disabled", true);
                                    $('#a6').prop("disabled", true);
                                    $('#btn-activate').html('');
                                    $('#btn-activate').append('Aktivasi Akun');
                                } else {
                                    $('#btn-activate').prop("disabled", false);
                                    $('#btn-activate').html('');
                                    $('#btn-activate').append('Aktivasi Akun');
                                }

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
                });
            }
        })()
    </script>
</body>

</html>