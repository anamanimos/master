<!-- Content -->
<div class="content container-fluid" style="padding-bottom: 100px;">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-end mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Super Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu</li>
                    </ol>
                </nav>

                <h1 class="page-header-title">Manajemen Menu</h1>
            </div>
            <!-- End Col -->
            <div class="col-sm-auto" aria-label="Button group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMenu">
                    <i class="bi bi-plus-lg"></i> Tambah Menu
                </button>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- Nav -->
        <!-- Nav -->
        <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="bi-chevron-left"></i>
                </a>
            </span>

            <span class="hs-nav-scroller-arrow-next" style="display: none;">
                <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="bi-chevron-right"></i>
                </a>
            </span>

            <ul class="nav nav-tabs page-header-tabs" id="projectsTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" href="#">Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Role</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Pengaturan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Aktivitas</a>
                </li>
            </ul>
        </div>
        <!-- End Nav -->
    </div>
    <!-- End Page Header -->

    <div class="row">
        <div class="col-lg-4">
            <!-- Card -->
            <div class="card mb-3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Jumlah Menu</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"><?= $count_menu ?></span>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <!-- Circle -->
                            <div class="circle" id="circle-menu" data-value="100"></div>
                            <!-- End Circle -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card mb-3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Jumlah SubMenu</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"><?= $count_submenu ?></span>
                            <span class="d-block" id="count-submenu-active"><?= $count_submenu_active ?> Aktif</span>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <!-- Circle -->
                            <div class="circle" id="circle-submenu" data-value="<?= ($count_submenu_active / $count_submenu) * 100 ?>"></div>
                            <!-- End Circle -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->

        </div>
        <div class="col-lg-8">
            <div class="card mb-3" style="overflow: hidden;">
                <!-- Body -->
                <div class="card-body p-0">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody id="menuSortable">
                                <?php
                                foreach ($list_menu as $m) {
                                    $submenu = $this->db->get_where('user_sub_menu', ['menu_id' => $m['id']])->result_array();
                                    $count_every_submenu = $this->db->get_where('user_sub_menu', ['menu_id' => $m['id'], 'is_deleted' => 0])->num_rows();
                                ?>
                                    <tr id="menuid-<?= $m['id'] ?>" data-sort="<?= $m['sort'] ?>" data-count="<?= $count_every_submenu ?>">
                                        <td class="expand">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-dark btn-submenu" data-id="<?= $m['id'] ?>" data-sort="<?= $m['sort'] ?>" data-show="false" id="switchermenu-<?= $m['id'] ?>">
                                                <i class="bi bi-caret-right-fill"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <!-- Media -->
                                            <div class="flex-grow-1">
                                                <h5 class="text-inherit mb-0" id="menu-<?= $m['id'] ?>-title"><?= $m['menu'] ?> &nbsp;&nbsp;&nbsp;<span class="badge bg-soft-secondary text-secondary"><?= $count_every_submenu ?> Item</span></h5>
                                            </div>
                                            <!-- End Media -->
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-soft-primary btn-sm btn-icon btn-new-submenu" menu-id="<?= $m['id'] ?>" data-slug="<?= $m['slug'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Sub Menu"><i class="bi bi-plus-lg"></i></button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm btn-icon btn-edit-menu" id="btn-edit-menu-<?= $m['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-id="<?= $m['id'] ?>" data-value="<?= $m['menu'] ?>" data-count="<?= $count_every_submenu ?>" data-slug="<?= $m['slug'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button type="button" class="btn btn-soft-danger btn-sm btn-icon btn-delete-menu" id="btn-delete-menu-<?= $m['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" data-id="<?= $m['id'] ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                        <td>
                                            <i class="bi bi-grip-vertical handle" style="font-size: 20px;" data-id="<?= $m['id'] ?>"></i>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Content -->


<!-- MODAL ADD MENU -->
<!-- Modal -->
<div class="modal fade" id="modalMenu" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-menu-title">Tambah Menu</h5>
                <button type="button" class="btn-close closeSaveMenu" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" id="namaMenu" class="form-control form-control-light" placeholder="Nama menu...">
                    <small class="text-danger pl-3 d-none" id="alert-menu">Nama menu tidak boleh kosong!</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <div class="input-group">
                        <span class="input-group-text bg-soft-secondary" id="slug-domain"><?= base_url() ?></span>
                        <input type="text" class="form-control form-control-light" id="slug-value" placeholder="slug">
                    </div>
                    <small class="text-danger pl-3 d-none" id="alert-slug">Slug tidak boleh kosong!</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white closeSaveMenu">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveMenu" data-action="new">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- MODAL SUBMENU -->
<div class="modal fade" id="modalSubMenu" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-submenu-title">Tambah Sub Menu</h5>
                <button type="button" class="btn-close closeSaveSubMenu" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Sub Menu</label>
                    <input type="text" id="submenunama" class="form-control form-control-light" placeholder="Nama sub menu...">
                    <small class="text-danger pl-3 d-none" id="alert-submenunama">Nama sub menu tidak boleh kosong!</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ikon Sub menu</label>
                    <div class="input-group">
                        <span class="input-group-text h-100 selected-icon bg-soft-secondary" id="submenuiconshow"></span>
                        <input type="text" class="form-control iconpicker form-control-light" id="submenuicon" value="bi bi-alarm">
                    </div>
                    <small class="text-danger pl-3 mb-3 d-none" id="alert-submenuicon">Ikon tidak boleh kosong!</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe tautan</label>
                    <div class="input-group input-group-sm-vertical">
                        <!-- Radio Check -->
                        <label class="form-control" for="submenutypeinternal">
                            <span class="form-check">
                                <input type="radio" class="form-check-input" name="submenutype[]" id="submenutypeinternal" value="0" checked>
                                <span class="form-check-label">Internal</span>
                            </span>
                        </label>
                        <!-- End Radio Check -->

                        <!-- Radio Check -->
                        <label class="form-control" for="submenutypeexternal">
                            <span class="form-check">
                                <input type="radio" class="form-check-input" name="submenutype[]" id="submenutypeexternal" value="1">
                                <span class="form-check-label">Eksternal</span>
                            </span>
                        </label>
                        <!-- End Radio Check -->
                        <input type="hidden" id="hiddensubmenuslug" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <div class="input-group" id="submenuslugwrapper">
                        <span class="input-group-text bg-soft-secondary" id="submenuurlpreview">url/</span>
                        <input type="text" class="form-control form-control-light" id="submenuslug" placeholder="slug">
                    </div>
                    <small class="text-danger pl-3 d-none" id="alert-submenuslug">Slug tidak boleh kosong!</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Target</label>
                    <div class="input-group input-group-sm-vertical">
                        <!-- Radio Check -->
                        <label class="form-control" for="submenutargetself">
                            <span class="form-check">
                                <input type="radio" class="form-check-input" name="submenutarget[]" id="submenutargetself" value="_self" checked>
                                <span class="form-check-label">_self</span>
                            </span>
                        </label>
                        <!-- End Radio Check -->

                        <!-- Radio Check -->
                        <label class="form-control" for="submenutargetblank">
                            <span class="form-check">
                                <input type="radio" class="form-check-input" name="submenutarget[]" id="submenutargetblank" value="_blank">
                                <span class="form-check-label">_blank</span>
                            </span>
                        </label>
                        <!-- End Radio Check -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white closeSaveSubMenu">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveSubMenu" data-action="new">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

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