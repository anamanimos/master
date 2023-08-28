<!-- Footer -->
<div class="footer" id="footer" data-url="<?= base_url() ?>">
    <div class="row justify-content-between align-items-center">
        <div class="col"></div>
        <!-- End Col -->
        <div class="col-auto">
            <p class="fs-6 mb-0">&copy; Copyright. <span class="d-none d-sm-inline-block"><?= date('Y') ?> Damai Jaya - Super App.</span></p>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Footer -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Global Compulsory  -->
<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

<!-- JS Implementing Plugins -->
<script src="<?= base_url('assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>

<?php
if (count($js_plugin) > 0) {
    for ($i = 0; $i < count($js_plugin); $i++) {
        echo '<script src="' . $js_plugin[$i] . '"></script>';
    }
}
?>

<!-- JS Front -->
<script src="<?= base_url('assets/js/theme.min.js') ?>"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()

        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()

        // SWEETALERT LOGOUT
        $('#btn-logout').on('click', function() {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.toast-login-bg').addClass('bg-soft-success');
                    $('.toast-login-title').html('');
                    $('.toast-login-title').append('Berhasil Keluar!');
                    $('.toast-login-body').html('');
                    $('.toast-login-body').append('Mohon menunggu, Anda akan dialihkan!');
                    $('.toast-login-icon').html('');
                    $('.toast-login-icon').append('<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>');
                    const liveToast = new bootstrap.Toast($('#liveToast'));
                    liveToast.show();
                    setTimeout(function() {
                        window.location = '<?= base_url('auth/logout') ?>';
                    }, 1500);
                }
            })
        });

    })()
</script>

<!-- JS Inject -->
<?php
if (count($js_plugin_init) > 0) {
    for ($i = 0; $i < count($js_plugin_init); $i++) {
        echo '<script src="' . $js_plugin_init[$i] . '"></script>';
    }
}
?>
</body>

</html>