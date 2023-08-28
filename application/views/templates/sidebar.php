    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Navbar Vertical -->
        <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
            <div class="navbar-vertical-container">
                <div class="navbar-vertical-footer-offset">
                    <!-- Logo -->

                    <a class="navbar-brand" href="<?= base_url() ?>" aria-label="Front">
                        <img class="navbar-brand-logo" src="<?= base_url('assets/svg/logos/logo.svg') ?>" alt="Logo" data-hs-theme-appearance="default" style="min-width: 9rem;max-width: 9rem;">
                        <img class="navbar-brand-logo-mini" src="<?= base_url('assets/svg/logos/logo-short.svg') ?>" alt="Logo" data-hs-theme-appearance="default">
                    </a>

                    <!-- End Logo -->

                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                        <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                        <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                    </button>

                    <!-- End Navbar Vertical Toggle -->

                    <!-- Content -->
                    <div class="navbar-vertical-content">
                        <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                            <div class="nav-item">
                                <a class="nav-link" href="<?= base_url('dashboard') ?>" data-placement="left">
                                    <i class="bi-house-door nav-icon"></i>
                                    <span class="nav-link-title">Dashboards</span>
                                </a>
                            </div>

                            <!-- QUERY MENU -->
                            <?php
                            $role_id = $this->session->userdata('role_id');
                            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id AND `user_menu`.`is_deleted` = 0
                        ORDER BY `user_menu`.`sort` ASC
                        ";
                            $menu = $this->db->query($queryMenu)->result_array();
                            ?>
                            <?php foreach ($menu as $m) :
                            ?>


                                <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                                <?php
                                $menuId = $m['id'];
                                $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menuId AND `user_sub_menu`.`is_deleted` = 0
                                AND `user_sub_menu`.`is_active` = 1 ORDER BY `user_sub_menu`.`sort` ASC
                        ";
                                if ($this->db->query($querySubMenu)->num_rows() > 0) {
                                    $subMenu = $this->db->query($querySubMenu)->result_array();
                                ?>
                                    <span class="dropdown-header mt-4"><?= $m['menu']; ?></span>
                                    <small class="bi-three-dots nav-subtitle-replacer"></small>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <?php
                                        if ($sm['type'] == 'internal') {
                                            $link = base_url($sm['url']);
                                        } else {
                                            $link = $sm['url'];
                                        }
                                        ?>
                                        <div class="nav-item">
                                            <a class="nav-link " href="<?= $link; ?>" data-placement="left">
                                                <i class="<?= $sm['icon']; ?> nav-icon"></i>
                                                <span class="nav-link-title"><?= $sm['title']; ?></span>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                            <?php }
                            endforeach; ?>

                            <span class="dropdown-header mt-4">Pages</span>
                            <small class="bi-three-dots nav-subtitle-replacer"></small>
                            <div id="navbarVerticalMenuPagesMenu">
                                <!-- Collapse -->
                                <div class="nav-item">
                                    <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                                        <i class="bi-people nav-icon"></i>
                                        <span class="nav-link-title">Users</span>
                                    </a>

                                    <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                        <a class="nav-link " href="#">Overview</a>
                                        <a class="nav-link " href="#">Leaderboard</a>
                                        <a class="nav-link " href="#">Add User <span class="badge bg-info rounded-pill ms-1">Hot</span></a>
                                    </div>
                                </div>
                                <!-- End Collapse -->
                            </div>
                            <!-- End Collapse -->

                            <span class="dropdown-header mt-4">Apps</span>
                            <small class="bi-three-dots nav-subtitle-replacer"></small>

                            <div class="nav-item">
                                <a class="nav-link " href="#" data-placement="left">
                                    <i class="bi-kanban nav-icon"></i>
                                    <span class="nav-link-title">Kanban</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- End Content -->

                </div>
            </div>
        </aside>

        <!-- End Navbar Vertical -->