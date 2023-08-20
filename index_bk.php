<?php
require("core/config.core.php");
require("core/connect.core.php");
require("core/functions.core.php");
require("core/alert.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
$system_info = $getdata->my_sql_query($connect, null, 'system_info', null);
$system_detail = $getdata->my_sql_query($connect, null, 'detail_index', null);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="light-style" data-theme="theme-default" data-assets-path="assets/" data-template="horizontal-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="<?php echo @$system_info->site_name; ?>">

    <link rel="icon" type="image/x-icon" href="resource/system/favicon/<?php echo @$system_info->site_favicon; ?>" />
    <title><?php echo @$system_info->site_name; ?></title>
    <?php include 'core/header.php' ?>

    <style>
        :root {
            --cmplz_banner_width: 400px;
            --cmplz_banner_background_color: #ffffff;
            --cmplz_banner_border_color: #f2f2f2;
            --cmplz_banner_border_width: 0px 0px 0px 0px;
            --cmplz_banner_border_radius: 12px 12px 12px 12px;
            --cmplz_banner_margin: 10px;
            --cmplz_categories-height: 163px;
            --cmplz_title_font_size: 15px;
            --cmplz_text_line_height: calc(var(--cmplz_text_font_size) * 1.5);
            --cmplz_text_color: #222222;
            --cmplz_hyperlink_color: #1E73BE;
            --cmplz_text_font_size: 14px;
            --cmplz_link_font_size: 14px;
            --cmplz_category_body_font_size: 14px;
            --cmplz_button_accept_background_color: #1E73BE;
            --cmplz_button_accept_border_color: #1E73BE;
            --cmplz_button_accept_text_color: #ffffff;
            --cmplz_button_deny_background_color: #f9f9f9;
            --cmplz_button_deny_border_color: #f2f2f2;
            --cmplz_button_deny_text_color: #222222;
            --cmplz_button_settings_background_color: #f9f9f9;
            --cmplz_button_settings_border_color: #f2f2f2;
            --cmplz_button_settings_text_color: #333333;
            --cmplz_button_border_radius: 6px 6px 6px 6px;
            --cmplz_button_font_size: 15px;
            --cmplz_category_header_always_active_color: green;
            --cmplz_category_header_title_font_size: 14px;
            --cmplz_category_header_active_font_size: 12px;
            --cmplz-manage-consent-height: 50px;
            --cmplz-manage-consent-offset: -35px;
            --cmplz_slider_active_color: #1e73be;
            --cmplz_slider_inactive_color: #F56E28;
            --cmplz_slider_bullet_color: #ffffff;
        }

        #cmplz-manage-consent .cmplz-manage-consent {
            margin: unset;
            z-index: 9998;
            color: var(--cmplz_text_color);
            background-color: var(--cmplz_banner_background_color);
            border-style: solid;
            border-color: var(--cmplz_banner_border_color);
            border-width: var(--cmplz_banner_border_width);
            border-radius: var(--cmplz_banner_border_radius);
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            line-height: initial;
            position: fixed;
            bottom: var(--cmplz-manage-consent-offset);
            min-width: 100px;
            height: var(--cmplz-manage-consent-height);
            right: 40px;
            padding: 15px;
            cursor: pointer;
            animation: mc_slideOut 0.5s forwards;
        }

        #cmplz-manage-consent .cmplz-manage-consent:active {
            outline: none;
            border: none;
        }

        #cmplz-manage-consent .cmplz-manage-consent.cmplz-dismissed {
            display: none;
        }

        #cmplz-manage-consent .cmplz-manage-consent:hover {
            animation: mc_slideIn 0.5s forwards;
            animation-delay: 0;
        }

        @-webkit-keyframes mc_slideIn {
            100% {
                bottom: 0;
            }
        }

        @keyframes mc_slideIn {
            100% {
                bottom: 0;
            }
        }

        @-webkit-keyframes mc_slideOut {
            100% {
                bottom: var(--cmplz-manage-consent-offset);
            }
        }

        @keyframes mc_slideOut {
            100% {
                bottom: var(--cmplz-manage-consent-offset);
            }
        }

        @media (max-width: 425px) {
            .cmplz-cookiebanner .cmplz-header .cmplz-title {
                display: none;
            }
        }

        .cmplz-cookiebanner {
            max-height: calc(100vh - 20px);
            position: fixed;
            height: auto;
            left: 50%;
            top: 50%;
            -ms-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            grid-template-rows: minmax(0, 1fr);
            z-index: 99999;
            background: var(--cmplz_banner_background_color);
            border-style: solid;
            border-color: var(--cmplz_banner_border_color);
            border-width: var(--cmplz_banner_border_width);
            border-radius: var(--cmplz_banner_border_radius);
            padding: 15px 20px;
            display: grid;
            grid-gap: 10px;
        }

        .cmplz-cookiebanner a {
            transition: initial;
        }

        .cmplz-cookiebanner .cmplz-buttons a.cmplz-btn.tcf {
            display: none;
        }

        .cmplz-cookiebanner.cmplz-dismissed {
            display: none;
        }

        .cmplz-cookiebanner .cmplz-body {
            width: 100%;
            grid-column: span 3;
            overflow-y: auto;
            overflow-x: hidden;
            max-height: 55vh;
        }

        .cmplz-cookiebanner .cmplz-body::-webkit-scrollbar-track {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0);
            background-color: transparent;
        }

        .cmplz-cookiebanner .cmplz-body::-webkit-scrollbar {
            width: 5px;
            background-color: transparent;
        }

        .cmplz-cookiebanner .cmplz-body::-webkit-scrollbar-thumb {
            background-color: var(--cmplz_button_accept_background_color);
            border-radius: 10px;
        }

        @media (min-width: 350px) {
            .cmplz-cookiebanner .cmplz-body {
                min-width: 300px;
            }
        }

        .cmplz-cookiebanner .cmplz-divider {
            margin-left: -20px;
            margin-right: -20px;
        }

        .cmplz-cookiebanner .cmplz-header {
            grid-template-columns: 100px 1fr 100px;
            align-items: center;
            display: grid;
            grid-column: span 3;
        }

        .cmplz-cookiebanner .cmplz-logo svg {
            max-height: 35px;
            width: inherit;
        }

        .cmplz-cookiebanner .cmplz-logo img {
            max-height: 40px;
            width: inherit;
        }

        .cmplz-cookiebanner .cmplz-title {
            justify-self: center;
            grid-column-start: 2;
            font-size: var(--cmplz_title_font_size);
            color: var(--cmplz_text_color);
            font-weight: 500;
        }

        .cmplz-cookiebanner .cmplz-close {
            line-height: 20px;
            justify-self: end;
            grid-column-start: 3;
            font-size: 20px;
            cursor: pointer;
            width: 20px;
            height: 20px;
            color: var(--cmplz_text_color);
        }

        .cmplz-cookiebanner .cmplz-close svg {
            width: 20px;
            height: 20px;
        }

        .cmplz-cookiebanner .cmplz-close:hover {
            text-decoration: none;
            line-height: initial;
            font-size: 18px;
        }

        .cmplz-cookiebanner .cmplz-message {
            word-wrap: break-word;
            font-size: var(--cmplz_text_font_size);
            line-height: var(--cmplz_text_line_height);
            color: var(--cmplz_text_color);
            margin-bottom: 5px;
        }

        .cmplz-cookiebanner .cmplz-message a {
            color: var(--cmplz_hyperlink_color);
        }

        .cmplz-cookiebanner .cmplz-message,
        .cmplz-cookiebanner .cmplz-categories,
        .cmplz-cookiebanner .cmplz-links,
        .cmplz-cookiebanner .cmplz-buttons,
        .cmplz-cookiebanner .cmplz-divider {
            grid-column: span 3;
        }

        .cmplz-cookiebanner .cmplz-categories.cmplz-tcf .cmplz-category .cmplz-category-header {
            grid-template-columns: 1fr auto;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category {
            background-color: rgba(239, 239, 239, 0.5);
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category:not(:last-child) {
            margin-bottom: 10px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header {
            display: grid;
            grid-template-columns: 1fr auto 15px;
            grid-template-rows: minmax(0, 1fr);
            align-items: center;
            grid-gap: 10px;
            padding: 10px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-category-title {
            font-weight: 500;
            grid-column-start: 1;
            justify-self: start;
            font-size: var(--cmplz_category_header_title_font_size);
            color: var(--cmplz_text_color);
            margin: 0;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-always-active {
            font-size: var(--cmplz_category_header_active_font_size);
            font-weight: 500;
            color: var(--cmplz_category_header_always_active_color);
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-always-active label {
            display: none;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-banner-checkbox {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-banner-checkbox label>span {
            display: none;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-banner-checkbox input[data-category=cmplz_functional] {
            display: none;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-category-header .cmplz-icon.cmplz-open {
            grid-column-start: 3;
            cursor: pointer;
            content: '';
            transform: rotate(0deg);
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            background-size: cover;
            height: 18px;
            width: 18px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category[open] .cmplz-icon.cmplz-open {
            transform: rotate(180deg);
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category summary {
            display: block;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category summary::marker {
            display: none;
            content: '';
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category summary::-webkit-details-marker {
            display: none;
            content: '';
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-description {
            font-size: var(--cmplz_category_body_font_size);
            color: var(--cmplz_text_color);
            margin: 0;
            max-width: 100%;
            padding: 10px;
        }

        @media (max-width: 425px) {
            .cmplz-cookiebanner .cmplz-category .cmplz-category-header {
                grid-template-columns: 1fr !important;
            }
        }

        @media (max-width: 425px) {
            .cmplz-cookiebanner .cmplz-message {
                margin-right: 5px;
            }
        }

        .cmplz-cookiebanner .cmplz-buttons {
            display: flex;
            gap: var(--cmplz_banner_margin);
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn {
            height: 45px;
            padding: 10px;
            margin: initial;
            width: 100%;
            white-space: nowrap;
            border-radius: var(--cmplz_button_border_radius);
            cursor: pointer;
            font-size: var(--cmplz_button_font_size);
            font-weight: 500;
            text-decoration: none;
            line-height: 20px;
            text-align: center;
            flex: initial;
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn:hover {
            text-decoration: none;
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn.cmplz-accept {
            background-color: var(--cmplz_button_accept_background_color);
            border: 1px solid var(--cmplz_button_accept_border_color);
            color: var(--cmplz_button_accept_text_color);
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn.cmplz-deny {
            background-color: var(--cmplz_button_deny_background_color);
            border: 1px solid var(--cmplz_button_deny_border_color);
            color: var(--cmplz_button_deny_text_color);
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn.cmplz-view-preferences {
            background-color: var(--cmplz_button_settings_background_color);
            border: 1px solid var(--cmplz_button_settings_border_color);
            color: var(--cmplz_button_settings_text_color);
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn.cmplz-save-preferences {
            background-color: var(--cmplz_button_settings_background_color);
            border: 1px solid var(--cmplz_button_settings_border_color);
            color: var(--cmplz_button_settings_text_color);
        }

        .cmplz-cookiebanner .cmplz-buttons .cmplz-btn.cmplz-manage-options {
            background-color: var(--cmplz_button_settings_background_color);
            border: 1px solid var(--cmplz_button_settings_border_color);
            color: var(--cmplz_button_settings_text_color);
        }

        .cmplz-cookiebanner .cmplz-buttons a.cmplz-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: initial;
        }

        @media (max-width: 425px) {
            .cmplz-cookiebanner .cmplz-links.cmplz-information {
                display: initial;
                text-align: center;
            }
        }

        .cmplz-cookiebanner .cmplz-links {
            display: flex;
            gap: var(--cmplz_banner_margin);
        }

        .cmplz-cookiebanner .cmplz-links.cmplz-information {
            justify-content: space-between;
        }

        .cmplz-cookiebanner .cmplz-links.cmplz-documents {
            justify-content: center;
        }

        .cmplz-cookiebanner .cmplz-links .cmplz-link {
            color: var(--cmplz_hyperlink_color);
            font-size: var(--cmplz_link_font_size);
            text-decoration: underline;
            margin: 0;
        }

        .cmplz-cookiebanner .cmplz-links .cmplz-link.cmplz-read-more-purposes {
            display: none;
        }

        .cmplz-categories .cmplz-category .cmplz-description-statistics-anonymous {
            display: none;
        }

        .cmplz-categories .cmplz-category .cmplz-description-statistics {
            display: block;
        }

        .cmplz-cookiebanner {
            top: initial;
            left: 10px;
            bottom: 10px;
            transform: initial;
        }

        @media (min-width: 768px) {
            .cmplz-cookiebanner {
                min-width: var(--cmplz_banner_width);
                max-width: 100%;
                display: grid;
                grid-row-gap: 10px;
            }
        }

        @media (max-width: 768px) {
            .cmplz-cookiebanner {
                left: initial;
                right: initial;
                bottom: 0;
                width: 100%;
            }

            .cmplz-cookiebanner .cmplz-buttons {
                flex-direction: column;
            }
        }

        @media (min-width: 768px) {

            .cmplz-message,
            .cmplz-categories {
                width: calc(var(--cmplz_banner_width) - 42px);
            }
        }

        #cmplz-manage-consent .cmplz-manage-consent {
            left: 40px;
            right: initial;
        }

        .cmplz-cookiebanner .cmplz-categories,
        .cmplz-cookiebanner .cmplz-save-preferences,
        .cmplz-cookiebanner .cmplz-link.cmplz-manage-options,
        .cmplz-cookiebanner .cmplz-manage-vendors,
        .cmplz-cookiebanner .cmplz-read-more,
        .cmplz-cookiebanner .cmplz-btn.cmplz-manage-options {
            display: none;
        }

        .cmplz-cookiebanner .cmplz-categories.cmplz-fade-in {
            animation: fadeIn 1s;
            -webkit-animation: fadeIn 1s;
            -moz-animation: fadeIn 1s;
            -o-animation: fadeIn 1s;
            -ms-animation: fadeIn 1s;
            display: block;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-o-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .cmplz-cookiebanner .cmplz-links.cmplz-information {
            display: none;
        }

        .cmplz-cookiebanner-container .cmplz-cookiebanner {
            bottom: -50vh;
            -webkit-animation: slideIn 1s forwards;
            -webkit-animation-delay: 0s;
            animation: slideIn 1s forwards;
            animation-delay: 0s;
        }

        @-webkit-keyframes slideIn {
            100% {
                bottom: 0;
            }
        }

        @keyframes slideIn {
            100% {
                bottom: 0;
            }
        }

        .cmplz-cookiebanner .cmplz-preferences,
        .cmplz-manage-consent-container .cmplz-preferences {
            display: none;
        }

        @media (max-width: 768px) {
            #cmplz-manage-consent .cmplz-manage-consent {
                display: none;
            }
        }

        .cmplz-logo {
            display: none !important;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox {
            position: relative;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox input.cmplz-consent-checkbox {
            opacity: 0;
            margin: 0;
            margin-top: -10px;
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            -khtml-opacity: 0;
            position: absolute;
            z-index: 1;
            top: 0px;
            left: 0px;
            width: 40px;
            height: 20px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox input.cmplz-consent-checkbox:focus+.cmplz-label:before {
            box-shadow: 0 0 0 2px #245fcc;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox input.cmplz-consent-checkbox:checked+.cmplz-label::before {
            display: block;
            background-color: var(--cmplz_slider_active_color);
            content: "";
            padding-left: 6px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox input.cmplz-consent-checkbox:checked+.cmplz-label:after {
            left: 14px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox .cmplz-label {
            position: relative;
            padding-left: 30px;
            margin: 0;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox .cmplz-label:before,
        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox .cmplz-label:after {
            position: absolute;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            transition: background-color 0.3s, left 0.3s;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox .cmplz-label:before {
            display: block;
            content: "";
            color: #fff;
            box-sizing: border-box;
            font-family: 'FontAwesome', sans-serif;
            padding-left: 23px;
            font-size: 12px;
            line-height: 20px;
            background-color: var(--cmplz_slider_inactive_color);
            left: 0px;
            top: -7px;
            height: 15px;
            width: 28px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }

        .cmplz-cookiebanner .cmplz-categories .cmplz-category .cmplz-banner-checkbox .cmplz-label:after {
            display: block;
            content: "";
            letter-spacing: 20px;
            background: var(--cmplz_slider_bullet_color);
            left: 4px;
            top: -5px;
            height: 11px;
            width: 11px;
        }

        #cmplz-manage-consent .cmplz-manage-consent {
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }

        .cmplz-cookiebanner.cmplz-show {
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }

        .cmplz-cookiebanner.cmplz-show:hover {
            transition-duration: 1s;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        .cmplz-message {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        @media only screen and (min-width: 769px) {
            .cmplz-message {
                width: 400px;
            }
        }

        .cmplz-categories {
            margin-left: auto;
            margin-right: auto;
        }

        .cmplz-message p {
            margin-bottom: 0;
        }
    </style>

    <!-- <style>
        .cookies-eu-banner {
            background: #444;
            color: #fff;
            padding: 6px;
            font-size: 13px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 10;
        }

        .cookies-eu-banner button {
            text-decoration: none;
            background: #222;
            color: #fff;
            border: 1px solid #000;
            cursor: pointer;
            padding: 4px 7px;
            margin: 2px 0;
            font-size: 13px;
            font-weight: 700;
            transition: background 0.07s, color 0.07s, border-color 0.07s;
        }

        .cookies-eu-banner button:hover {
            background: #fff;
            color: #222;
        }
    </style> -->
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <?php include 'layout/nav.php'; ?>
            </nav>
            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0 bg-menu-theme">
                        <?php include 'layout/menu.php' ?>
                    </aside>
                    <!-- / Menu -->

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4 class="fw-semibold"> รายการแสดงข้อมูลห้องและการเข้าพัก</h3>
                                        <hr class="mt-0" />
                                </div>
                            </div>
                            <div class="card-body">
                                <?php require_once 'layout/listroom/showall.php'; ?>
                            </div>
                        </div>

                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-column flex-md-row flex-wrap justify-content-between py-2">
                            <div class="mb-2 mb-md-0">
                                <?php echo @$system_info->site_name; ?> สำนักจัดการอุทยานรังสรรค์นวัตกรรมอวกาศ : สจอ. © <script>
                                    document.write(new Date().getFullYear());
                                </script> Information System Design & Develop By <a href="https://line.me/ti/p/-cfquTAxAJ" target="_blank" class="footer-link fw-bolder">Ekapong</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>
            <!--/ Layout container -->
        </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    <!--/ Layout wrapper -->
    <!-- <div class="cookies-eu-banner">
        <span>
            เว็บไซต์นี้ใช้งานคุกกี้ในการใช้งานสามารถใช้งานเว็บไซต์อย่างต่อเนื่องและมีประสิทธิภาพ เว็บไซต์นี้จะมีการเก็บค่าคุกกี้เพื่อให้การใช้เว็บไซต์ของท่านเป็นไปอย่างราบรื่น <br>และเป็นส่วนตัวมากขึ้น
            จึงขอให้ท่านรับรองว่าท่านได้อ่านและทำความเข้าใจนโยบายการใช้งานคุกกี้ <br> <a href="https://www.gistda.or.th/download/article/article_20220613093807.pdf" target="_blank" rel="noopener noreferrer" style="color:#ff8d26"> นโยบายการคุ้มครองข้อมูลส่วนบุคคล GISTDA </a>
        </span>
        <br>
        <button class="btn btn-label-success" type="button">
            <i class='bx bxs-user-check'></i> <strong>ตกลง</strong>
        </button>
    </div> -->
    <div id="cmplz-cookiebanner-container">
        <div class="cmplz-cookiebanner banner-1 optin cmplz-bottom-left cmplz-categories-type-view-preferences cmplz-show" aria-modal="true" data-nosnippet="true" role="dialog" aria-live="polite" aria-labelledby="cmplz-header-1-optin" aria-describedby="cmplz-message-1-optin">
            <div class="cmplz-header">
                <div class="cmplz-logo"></div>
                <div class="cmplz-title" id="cmplz-header-1-optin"><strong>การอนุญาตคุกกี้ในการใช้งาน</strong></div>

            </div>
            <div class="cmplz-divider cmplz-divider-header"></div>
            <div class="cmplz-body text-center">
                <span>
                    เว็บไซต์นี้ใช้งานคุกกี้ในการใช้งานสามารถใช้งานเว็บไซต์อย่างต่อเนื่องและมีประสิทธิภาพ เว็บไซต์นี้จะมีการเก็บค่าคุกกี้เพื่อให้การใช้เว็บไซต์ของท่านเป็นไปอย่างราบรื่น <br>และเป็นส่วนตัวมากขึ้น
                    จึงขอให้ท่านรับรองว่าท่านได้อ่านและทำความเข้าใจนโยบายการใช้งานคุกกี้ <br> <a href="https://www.gistda.or.th/download/article/article_20220613093807.pdf" target="_blank" rel="noopener noreferrer" style="color:#ff8d26"> นโยบายการคุ้มครองข้อมูลส่วนบุคคล GISTDA </a>
                </span>

            </div>
            <div class="text-center">
                <button class="btn btn-label-success" id="accep" type="button">
                    <i class='bx bxs-user-check'></i> <strong>ตกลง</strong>
                </button>

                <button class="btn btn-label-danger" id="noaccep" type="button">
                    <i class='bx bxs-user-x'></i> <strong>ปฏิเสธ</strong>
                </button>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel4">นโยบายความเป็นส่วนตัว (Privacy Policy)</h2>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <?php echo $system_detail->detail; ?>
                    <div class="text-center">
                        <input class="form-check-input mt-1" type="checkbox" id="acceptCheckbox" value="">
                        <label class="form-check-label" for="acceptCheckbox">
                            <strong>ยอมรับเงื่อนไข</strong>
                        </label>
                        <br>
                        <br>
                        <button class="btn btn-label-success" id="acceptButton" type="button" disabled data-bs-dismiss="modal">
                            <i class='bx bxs-user-check'></i> <strong>ยอมรับเงื่อนไข</strong>
                        </button>

                        <button class="btn btn-label-success" id="acceptButton" type="button" disabled data-bs-dismiss="modal">
                            <i class='bx bxs-user-check'></i> <strong>ยอมรับเงื่อนไข</strong>
                        </button>


                    </div>

                </div>

            </div>
        </div>
    </div>




</body>
<?php include 'core/footer.php' ?>
<?php echo @$alert; ?>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // ตรวจสอบว่ามีคุกกี้ยินยอมหรือไม่
    //     if (!getCookie("cookieConsent")) {
    //         Swal.fire({
    //             title: 'นโยบายคุกกี้ (Cookies Policy)',
    //             icon: 'info',
    //             showCancelButton: false,
    //             confirmButtonText: "<i class='bx bxs-book-bookmark'></i> อ่านรายละเอียด",
    //             // cancelButtonText: 'ปฏิเสธ'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 // If user accepts, show the Bootstrap Modal
    //                 $('#myModal').modal('show');


    //                 $('#acceptCheckbox').on('change', function() {
    //                     if ($(this).is(':checked')) {
    //                         $('#acceptButton').prop('disabled', false);
    //                     } else {
    //                         $('#acceptButton').prop('disabled', true);
    //                     }
    //                 });



    //             } else if (result.isDismissed) {
    //                 // If user dismisses, reload the page
    //                 location.reload();
    //             }
    //         });
    //     }
    // });

    // function setCookie(name, value, days) {
    //     let date = new Date();
    //     date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    //     let expires = "expires=" + date.toUTCString();
    //     document.cookie = name + "=" + value + ";" + expires + ";path=/";
    // }

    // function getCookie(name) {
    //     let cookieArray = document.cookie.split(';');
    //     for (let i = 0; i < cookieArray.length; i++) {
    //         let cookie = cookieArray[i];
    //         while (cookie.charAt(0) == ' ') {
    //             cookie = cookie.substring(1);
    //         }
    //         if (cookie.indexOf(name + "=") == 0) {
    //             return cookie.substring(name.length + 1, cookie.length);
    //         }
    //     }
    //     return "";
    // }



    (() => {
        const getCookie = (name) => {
            const value = " " + document.cookie;
            console.log("value", `==${value}==`);
            const parts = value.split(" " + name + "=");
            return parts.length < 2 ? undefined : parts.pop().split(";").shift();
        };

        const setCookie = function(name, value, expiryDays, domain, path, secure) {
            const exdate = new Date();
            exdate.setHours(
                exdate.getHours() +
                (typeof expiryDays !== "number" ? 365 : expiryDays) * 24
            );
            document.cookie =
                name +
                "=" +
                value +
                ";expires=" +
                exdate.toUTCString() +
                ";path=" +
                (path || "/") +
                (domain ? ";domain=" + domain : "") +
                (secure ? ";secure" : "");
        };

        const $cookiesBanner = document.querySelector(".cookies-eu-banner");
        const $cookiesBannerButton = $cookiesBanner.querySelector("button");
        const cookieName = "cookiesBanner";
        const hasCookie = getCookie(cookieName);

        if (!hasCookie) {
            $cookiesBanner.classList.remove("hidden");
        }

        $cookiesBannerButton.addEventListener("click", () => {
            setCookie(cookieName, "closed");
            $cookiesBanner.remove();
        });
    })();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var acceptButton = document.getElementById("accep");
        var rejectButton = document.getElementById("noaccep");
        acceptButton.addEventListener("click", function() {
            var cookieBanner = document.getElementById("cmplz-cookiebanner-container");
            cookieBanner.style.display = "none"; // ซ่อนกล่อง cmplz-cookiebanner-container
        });

        rejectButton.addEventListener("click", function() {
            // รีโหลดหน้าเว็บ
            location.reload();
        });
    });
</script>


</html>