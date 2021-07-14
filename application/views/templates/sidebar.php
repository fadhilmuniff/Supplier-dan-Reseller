<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">FIT RESELLER</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FIT</a>
        </div>
        <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id_menu`, `menu`
                            FROM `user_menu` JOIN `user_access_menu` 
                            ON  `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`. `role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php foreach ($menu as $m) : ?>
                <?php
                $menuId = $m['id_menu'];
                $querySubMenu = "SELECT * FROM `user_sub_menu`
                   WHERE `menu_id` = $menuId
                   AND `is_active` = 1 
                   ORDER BY `id` ASC";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <!-- $data = pg_query($dbconn, "SELECT *
                FROM public.`IPK`"); -->

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($judul == $sm['tittle']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a class="nav-link " href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon'] ?>"></i><span><?= $sm['tittle'] ?></span></a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <!-- <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-user"></i><span>Data Produk</span></a></li>
            <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-parachute-box"></i><span>Data Supplier</span></a></li>
            <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-user"></i><span>Data Reseller</span></a></li>
            <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-user"></i><span>My Profile</span></a></li> -->
                <!-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Starter</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                            </ul>
                        </li>
                        <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                                <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                                <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                                <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                                <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                                <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                                <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                                <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                                <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                                <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                                <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                                <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                                <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                                <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                                <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                                <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                                <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                                <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                                <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                                <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                            </ul>
                        </li> -->


                <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                                <i class="fas fa-rocket"></i> Documentation
                            </a>
                        </div> -->
    </aside>
</div>