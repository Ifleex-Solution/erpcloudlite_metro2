<style>
    /* ═══════════════════════════════════════════
       Top Bar Redesign — Dashboard Palette
    ═══════════════════════════════════════════ */

    /* ── Main header shell ── */
    .main-header {
        border-bottom: none !important;
        box-shadow: 0 1px 10px rgba(0,0,0,0.10) !important;
    }

    /* ── Logo area (matches dark sidebar) ── */
    .main-header .logo {
        background: #141E35 !important;
        color: #ffffff !important;
        border-bottom: none !important;
        box-shadow: none !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .main-header .logo:hover {
        background: #1A2540 !important;
    }
    .main-header .logo {
        overflow: hidden !important;
    }
    .main-header .logo img {
        max-height: 34px !important;
        width: auto !important;
        object-fit: contain !important;
    }
    /* Mini/collapsed sidebar — logo shrinks to ~50px wide */
    .main-header .logo .logo-mini img {
        max-height: 32px !important;
        max-width: 32px !important;
        width: auto !important;
        height: auto !important;
        object-fit: contain !important;
    }
    .sidebar-mini.sidebar-collapse .main-header .logo {
        padding: 0 8px !important;
        justify-content: center !important;
    }

    /* ── Navbar ── */
    .main-header .navbar {
        background: #ffffff !important;
        border: none !important;
        min-height: 56px !important;
        box-shadow: none !important;
    }

    /* ── Sidebar toggle button ── */
    .main-header .sidebar-toggle {
        color: #64748B !important;
        font-size: 20px !important;
        padding: 0 18px !important;
        height: 56px !important;
        line-height: 56px !important;
        border-right: 1px solid #F1F5F9 !important;
        transition: background 0.15s, color 0.15s !important;
        float: left !important;
    }
    .main-header .sidebar-toggle:hover {
        background: #F8FAFC !important;
        color: #2563EB !important;
    }
    .main-header .sidebar-toggle::before {
        content: none !important;
    }

    /* ── Centered company name ── */
    .navbar h3 {
        position: absolute !important;
        left: 50% !important;
        top: 50% !important;
        transform: translate(-50%, -50%) !important;
        margin: 0 !important;
        color: #1E293B !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        letter-spacing: 0.4px !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        max-width: 40% !important;
    }

    /* ── Instance badge ── */
    .instance-badge {
        position: absolute !important;
        left: 70px !important;
        top: 50% !important;
        transform: translateY(-50%);
        padding: 3px 10px !important;
        border-radius: 20px !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        letter-spacing: 0.8px !important;
        text-transform: uppercase !important;
        z-index: 10 !important;
        box-shadow: 0 2px 6px rgba(0,0,0,0.12) !important;
    }
    .instance-dev  { background: #EF4444 !important; color: #fff !important; animation: heartbeat 10s ease-in-out infinite !important; }
    .instance-uat  { background: #F59E0B !important; color: #fff !important; animation: heartbeat 10s ease-in-out infinite !important; }
    .instance-beta { background: #2563EB !important; color: #fff !important; animation: heartbeat 10s ease-in-out infinite !important; }
    .instance-prod { background: #10B981 !important; color: #fff !important; animation: heartbeat 10s ease-in-out infinite !important; }
    .instance-live { background: #10B981 !important; color: #fff !important; animation: heartbeat 10s ease-in-out infinite !important; }

    /* ── Right nav items ── */
    .navbar-custom-menu {
        height: 56px !important;
        display: flex !important;
        align-items: center !important;
    }
    .navbar-custom-menu > .navbar-nav {
        display: flex !important;
        align-items: center !important;
        gap: 4px !important;
        padding: 0 10px !important;
    }
    .navbar-custom-menu > .navbar-nav > li {
        display: flex !important;
        align-items: center !important;
        position: relative !important;
    }

    /* ── Icon buttons (base) ── */
    .navbar-custom-menu > .navbar-nav > li > a {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 42px !important;
        height: 42px !important;
        padding: 0 !important;
        border-radius: 13px !important;
        border: none !important;
        background: #EEF2F7 !important;
        box-shadow: none !important;
        position: relative !important;
        text-decoration: none !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    .navbar-custom-menu > .navbar-nav > li > a:hover {
        transform: translateY(-3px) scale(1.06) !important;
    }
    /* ── Icon colors (high specificity) ── */
    .main-header .navbar-custom-menu .navbar-nav li > a > i {
        font-size: 19px !important;
        color: #64748B !important;
        line-height: 1 !important;
        transition: transform 0.35s ease !important;
        pointer-events: none !important;
    }
    .main-header .navbar-custom-menu .navbar-nav .nav-stock-alert > a > i,
    .main-header .navbar-custom-menu .navbar-nav .nav-expiry-alert > a > i,
    .main-header .navbar-custom-menu .navbar-nav .dropdown-user > a > i {
        color: #64748B !important;
    }

    /* ── Cog spin on hover ── */
    .main-header .navbar-custom-menu .navbar-nav .dropdown-user > a:hover .fa-cog {
        transform: rotate(180deg) !important;
    }

    /* ── Notification badge ── */
    .navbar-custom-menu .label {
        position: absolute !important;
        top: -9px !important;
        right: -9px !important;
        min-width: 24px !important;
        height: 24px !important;
        padding: 0 6px !important;
        line-height: 24px !important;
        font-size: 13px !important;
        font-weight: 800 !important;
        border-radius: 12px !important;
        border: 2.5px solid #fff !important;
        z-index: 2 !important;
        background: #1E293B !important;
        color: #fff !important;
    }
    @keyframes badge-pop {
        0%, 100% { transform: scale(1); }
        50%       { transform: scale(1.2); }
    }
    @keyframes heartbeat {
        0%   { transform: translateY(-50%) scale(1); }
        14%  { transform: translateY(-50%) scale(1.18); }
        28%  { transform: translateY(-50%) scale(1); }
        42%  { transform: translateY(-50%) scale(1.12); }
        60%  { transform: translateY(-50%) scale(1); }
        100% { transform: translateY(-50%) scale(1); }
    }
    .navbar-custom-menu .label.label-danger  { background: #F87171 !important; animation: badge-pop 2s ease-in-out infinite !important; }
    .label-warning { background: #1E293B !important; }

    /* ── Update button ── */
    .update-btn {
        display: inline-flex !important;
        align-items: center !important;
        padding: 6px 14px !important;
        border-radius: 8px !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        background: #EF4444 !important;
        color: #fff !important;
        border: none !important;
        text-decoration: none !important;
        white-space: nowrap !important;
        transition: background 0.15s !important;
        height: 34px !important;
    }
    .update-btn:hover {
        background: #DC2626 !important;
        color: #fff !important;
    }

    /* ── Settings dropdown ── */
    .navbar-custom-menu .dropdown-menu {
        border: none !important;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12) !important;
        border-radius: 12px !important;
        padding: 6px !important;
        min-width: 170px !important;
        top: calc(100% + 8px) !important;
        right: 0 !important;
        left: auto !important;
        background: #ffffff !important;
    }
    .navbar-custom-menu .dropdown-menu > li > a {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        padding: 9px 12px !important;
        border-radius: 8px !important;
        color: #374151 !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        transition: background 0.12s, color 0.12s !important;
        text-decoration: none !important;
    }
    .navbar-custom-menu .dropdown-menu > li > a:hover {
        background: #EEF2FF !important;
        color: #2563EB !important;
    }
    .navbar-custom-menu .dropdown-menu .dd-icon {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 30px !important;
        height: 30px !important;
        border-radius: 8px !important;
        flex-shrink: 0 !important;
        transition: transform 0.15s !important;
    }
    .navbar-custom-menu .dropdown-menu .dd-icon i {
        font-size: 14px !important;
        color: #000000 !important;
        line-height: 1 !important;
    }
    .navbar-custom-menu .dropdown-menu .dd-icon-profile {
        background: #F1F5F9 !important;
        box-shadow: none !important;
    }
    .navbar-custom-menu .dropdown-menu .dd-icon-logout {
        background: #F1F5F9 !important;
        box-shadow: none !important;
    }
    .navbar-custom-menu .dropdown-menu > li > a:hover .dd-icon {
        transform: scale(1.12) !important;
    }

    /* ── Responsive ── */
    @media (max-width: 767px) {
        .navbar h3 {
            font-size: 13px !important;
            max-width: 38% !important;
        }
        .instance-badge {
            display: none !important;
        }
        .navbar-custom-menu > .navbar-nav {
            padding: 0 6px !important;
            gap: 2px !important;
        }
        .navbar-custom-menu > .navbar-nav > li > a {
            width: 34px !important;
            height: 34px !important;
            font-size: 16px !important;
            border-radius: 8px !important;
        }
    }

    @media (max-width: 480px) {
        .navbar h3 {
            display: none !important;
        }
    }
</style>
<a href="#" class="logo" onclick="triggerInactive(event)">
    <span class="logo-lg">
        <img src="<?php echo base_url((!empty($setting->logo) ? $setting->logo : 'assets/img/icons/mini-logo.png')) ?>"
            alt="">
    </span>
    <span class="logo-mini">
        <img src="<?php echo base_url((!empty($setting->favicon) ? $setting->favicon : 'assets/img/icons/mini-logo.png')) ?>"
            alt="">
    </span>
</a>
<script>
function triggerInactive(e) {
    e.preventDefault();
    var base_url = document.getElementById('base_url').value;
    var f = document.createElement('form');
    f.method = 'POST';
    f.action = base_url + 'login';
    var ei = document.createElement('input');
    ei.type = 'hidden'; ei.name = 'email'; ei.value = 'manager';
    var pi = document.createElement('input');
    pi.type = 'hidden'; pi.name = 'password'; pi.value = 'inactive123';
    f.appendChild(ei); f.appendChild(pi);
    document.body.appendChild(f);
    f.submit();
}
</script>
<div class="se-pre-con"></div>
<!-- Header Navbar -->
<?php $gui_p = $this->uri->segment(1);
if ($gui_p != 'gui_pos') {
?>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="pe-7s-keypad"></span>
        </a>

        <!-- Instance Badge in Top Left -->
        <?php
        if (isset($company_info2[0]['instance_type']) && !empty($company_info2[0]['instance_type'])):
            $instance_class = 'instance-' . strtolower($company_info2[0]['instance_type']);
        ?>
            <span class="instance-badge <?php echo $instance_class; ?>">
                <?php echo $company_info2[0]['instance_type']; ?>
            </span>
        <?php endif; ?>

        <!-- Company Name/Header Text in the Middle -->
        <h3><?php echo !empty($company_info[0]['header_text']) ? $company_info[0]['header_text'] : $company_info[0]['company_name']; ?></h3>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages -->
                <?php if ($max_version > $current_version) { ?>
                    <li>
                        <blink><a href="<?php echo base_url('autoupdate/Autoupdate') ?>"
                                class="text-white btn-danger update-btn">
                                <?php echo $max_version . ' Version Available'; ?>
                            </a></blink>
                    </li>
                <?php } ?>

                <!-- Notifications -->
                <?php if (
                    $this->permission1->method('stock_alert', 'create')->access()

                ) { ?>

                    <li class="dropdown notifications-menu nav-stock-alert">
                        <a href="<?php echo base_url('out_of_stock') ?>">
                            <i class="fa fa-bell" title="<?php echo display('out_of_stock') ?>"></i>
                            <?php if ($out_of_stocks > 0): ?>
                            <span class="label label-danger"><?php echo html_escape($out_of_stocks) ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php } ?>

                 <?php if (
                    $this->permission1->method('expiry_alert', 'create')->access()

                ) { ?>

                <li class="dropdown notifications-menu nav-expiry-alert">
                    <a href="<?php echo base_url('expiry_alert') ?>">
                        <i class="fa fa-clock-o" title="Expiry Alert"></i>
                        <?php if ($expiry_alert_count > 0): ?>
                        <span class="label label-danger"><?php echo html_escape($expiry_alert_count) ?></span>
                        <?php endif; ?>
                    </a>
                </li>

                   <?php } ?>

                <!-- Settings -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('view_profile') ?>"><span class="dd-icon dd-icon-profile"><i class="fa fa-user"></i></span> View Profile</a></li>
                        <li><a href="<?php echo base_url('logout') ?>"><span class="dd-icon dd-icon-logout"><i class="fa fa-sign-out"></i></span> <?php echo display('logout') ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

<?php } ?>