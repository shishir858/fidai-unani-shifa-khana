    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <ul class="sidebar-menu">
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>dashboard.php" class="menu-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="menu-item">
                <hr class="my-2 mx-3">
                <small class="text-muted px-3 d-block mb-2">CLINIC MANAGEMENT</small>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>appointment/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/appointment/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>treatments/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/treatments/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-stethoscope"></i>
                    <span>Treatments</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>categories/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/categories/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-folder"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>gallery/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/gallery/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-images"></i>
                    <span>Gallery</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>faqs/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/faqs/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-question-circle"></i>
                    <span>FAQs</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>doctor/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/doctor/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-user-md"></i>
                    <span>Doctor</span>
                </a>
            </li>
            <li class="menu-item">
                <hr class="my-2 mx-3">
                <small class="text-muted px-3 d-block mb-2">SETTINGS</small>
            </li>
            <li class="menu-item">
                <a href="<?php echo BASE_URL; ?>settings/index.php" class="menu-link <?php echo (strpos($_SERVER['PHP_SELF'], '/settings/') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-cog"></i>
                    <span>Website Settings</span>
                </a>
            </li>
        </ul>
    </aside>
    
    <!-- Main Content -->
    <main class="admin-content">
