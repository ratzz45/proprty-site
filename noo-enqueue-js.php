<?php

/**
 * NOO Framework Site Package.
 *
 * Register Script
 * This file register & enqueue scripts used in NOO Themes.
 *
 * @package    NOO Framework
 * @version    1.0.0
 * @author     RATz
 * @copyright  Copyright (c) 2014, NooTheme
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       http://nootheme.com
 */
// =============================================================================
//
// Site scripts
//
if (!function_exists('noo_enqueue_site_scripts')) :

    function noo_enqueue_site_scripts() {

        $js_folder_uri = SCRIPT_DEBUG ? NOO_ASSETS_URI . '/js' : NOO_ASSETS_URI . '/js/min';
        $js_suffix = SCRIPT_DEBUG ? '' : '.min';

        // vendor script
        wp_register_script('vendor-modernizr', NOO_FRAMEWORK_URI . '/vendor/modernizr-2.7.1.min.js', null, null, false);

        wp_register_script('vendor-bootstrap', NOO_FRAMEWORK_URI . '/vendor/bootstrap.min.js', array('jquery'), null, true);
        wp_register_script('vendor-hoverIntent', NOO_FRAMEWORK_URI . '/vendor/hoverIntent-r7.min.js', array('jquery'), null, true);
        wp_register_script('vendor-superfish', NOO_FRAMEWORK_URI . '/vendor/superfish-1.7.4.min.js', array('jquery', 'vendor-hoverIntent'), null, true);
        wp_register_script('vendor-jplayer', NOO_FRAMEWORK_URI . '/vendor/jplayer/jplayer-2.5.0.min.js', array('jquery'), null, true);

        wp_register_script('vendor-imagesloaded', NOO_FRAMEWORK_URI . '/vendor/imagesloaded.pkgd.min.js', null, null, true);
        wp_register_script('vendor-isotope', NOO_FRAMEWORK_URI . '/vendor/isotope-2.0.0.min.js', array('vendor-imagesloaded'), null, true);
        wp_register_script('vendor-infinitescroll', NOO_FRAMEWORK_URI . '/vendor/infinitescroll-2.0.2.min.js', null, null, true);
        wp_register_script('vendor-TouchSwipe', NOO_FRAMEWORK_URI . '/vendor/TouchSwipe/jquery.touchSwipe.min.js', array('jquery'), null, true);
        wp_register_script('vendor-carouFredSel', NOO_FRAMEWORK_URI . '/vendor/carouFredSel/jquery.carouFredSel-6.2.1-packed.js', array('jquery', 'vendor-TouchSwipe'), null, true);

        wp_register_script('vendor-easing', NOO_FRAMEWORK_URI . '/vendor/easing-1.3.0.min.js', array('jquery'), null, true);
        wp_register_script('vendor-appear', NOO_FRAMEWORK_URI . '/vendor/jquery.appear.js', array('jquery', 'vendor-easing'), null, true);
        wp_register_script('vendor-countTo', NOO_FRAMEWORK_URI . '/vendor/jquery.countTo.js', array('jquery', 'vendor-appear'), null, true);
        wp_register_script('vc_pie_custom', "{$js_folder_uri}/jquery.vc_chart.custom{$js_suffix}.js", array('jquery', 'progressCircle', 'vendor-appear'), null, true);
        wp_enqueue_script('vendor-appear');
        /**
         * Register owl carousel
         */
        wp_register_script('owlcarousel', NOO_FRAMEWORK_URI . '/vendor/owl-carousel/owl.carousel.min.js', array('jquery'), null, true);
        wp_register_style('owlcarousel', NOO_FRAMEWORK_URI . '/vendor/owl-carousel/owl.carousel.css', array(), NULL, 'all');
        // owl Carousel 2
        wp_register_script('owlcarousel2', NOO_FRAMEWORK_URI . '/vendor/owl-carousel-2/owl.carousel.min.js', array('jquery'), null, true);
        wp_register_style('owlcarousel2', NOO_FRAMEWORK_URI . '/vendor/owl-carousel-2/owl.carousel.css', array(), NULL, 'all');
        wp_register_style('owlcarousel2-theme', NOO_FRAMEWORK_URI . '/vendor/owl-carousel-2/owl.theme.default.min.css', array(), NULL, 'all');

        wp_register_script('3dcarousel', NOO_FRAMEWORK_URI . '/vendor/video-slider.js', array('jquery'), null, true);
        wp_register_style('3dcarousel', NOO_FRAMEWORK_URI . '/vendor/jquery-feature-carousel/carousel.css', array(), NULL, 'all');
        //wp_register_script( 'mousewheelAgent', NOO_FRAMEWORK_URI . '/vendor/jquery-feature-carousel/jquery.min.js', array( 'jquery' ), null, true );
        wp_register_script('counter', NOO_FRAMEWORK_URI . '/vendor/counter.js', array('jquery'), null, true);


        wp_register_script('afterglow', NOO_FRAMEWORK_URI . '/vendor/afterglow/afterglow.min.js', array('jquery'), null, true);

        //masonry Grid
        wp_register_script('masonry', NOO_FRAMEWORK_URI . '/vendor/masonry/masonry.pkgd.min.js', array('jquery'), null, true);
        wp_register_script('isotope', NOO_FRAMEWORK_URI . '/vendor/masonry/isotope.pkgd.min.js', array('jquery'), null, true);
        /**
         * Register tooltipster
         */
        wp_register_script('tooltipster', NOO_FRAMEWORK_URI . '/vendor/tooltipster/tooltipster.bundle.min.js', array('jquery'), null, true);
        wp_register_style('tooltipster', NOO_FRAMEWORK_URI . '/vendor/tooltipster/tooltipster.bundle.min.css', array(), NULL, 'all');

        wp_register_style('bootstrap-335', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');

        wp_register_script('vendor-nivo-lightbox-js', NOO_FRAMEWORK_URI . '/vendor/nivo-lightbox/nivo-lightbox.min.js', array('jquery'), null, true);

        wp_register_script('vendor-parallax', NOO_FRAMEWORK_URI . '/vendor/jquery.parallax-1.1.3.js', array('jquery'), null, true);
        wp_register_script('vendor-nicescroll', NOO_FRAMEWORK_URI . '/vendor/nicescroll-3.5.4.min.js', array('jquery'), null, true);

        // BigVideo scripts.
        wp_register_script('vendor-bigvideo-video', NOO_FRAMEWORK_URI . '/vendor/bigvideo/video-4.1.0.min.js', array('jquery', 'jquery-ui-slider', 'vendor-imagesloaded'), NULL, true);
        wp_register_script('vendor-bigvideo-bigvideo', NOO_FRAMEWORK_URI . '/vendor/bigvideo/bigvideo-1.0.0.min.js', array('jquery', 'jquery-ui-slider', 'vendor-imagesloaded', 'vendor-bigvideo-video'), NULL, true);

        // Bootstrap WYSIHTML5
        wp_register_script('vendor-bootstrap-wysihtml5', NOO_FRAMEWORK_URI . '/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.custom.min.js', array('jquery', 'vendor-bootstrap'), null, true);

        wp_register_script('noo-script', "{$js_folder_uri}/noo{$js_suffix}.js", array('jquery', 'vendor-bootstrap', 'vendor-superfish', 'vendor-jplayer', 'jquery-ui-slider', 'jquery-touch-punch'), null, true);

        // Bing map

        $latitude = re_get_property_map_setting('latitude', '40.714398');
        $longitude = re_get_property_map_setting('longitude', '-74.005279');
        $zoom = re_get_property_map_setting('zoom', '17');
        $bing_api = re_get_property_map_setting('bing_api', '');
        wp_register_script('bing-map-api', 'https://www.bing.com/api/maps/mapcontrol?key=' . $bing_api . '&callback=Noo_Bing_Map', array('jquery'), null, true);
        wp_register_script('bing-map', "{$js_folder_uri}/bing-map{$js_suffix}.js", array('jquery'), null, true);
        $nooBingMap = array(
            'latitude' => $latitude,
            'longitude' => $longitude,
            'zoom' => $zoom,
        );
        wp_localize_script('bing-map', 'nooBingMap', $nooBingMap);

        wp_localize_script('bing-map', 'NooPropertyBingMap', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('noo-property-map'),
            'loading' => get_template_directory_uri() . '/assets/images/loading.gif',
            'results_search' => esc_html__('We found %d results. Do you want to load the results now?', 'noo'),
            'no_results_search' => esc_html__('We found no results', 'noo'),
            'icon_bedrooms' => get_stylesheet_directory_uri() . '/assets/images/bedroom-icon.png',
            'icon_bathrooms' => get_stylesheet_directory_uri() . '/assets/images/bathroom-icon.png',
            'icon_area' => get_stylesheet_directory_uri() . '/assets/images/size-icon.png'
        ));

        $google_api = re_get_property_map_setting('google_api', '');
        $name_script_map = 'googleapis';
        // if ( defined( 'DSIDXPRESS_PLUGIN_URL' ) ) {
        //     $name_script_map = 'googlemaps3';
        // }
        wp_register_script($name_script_map, 'http' . (is_ssl() ? 's' : '') . '://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places' . (!empty($google_api) ? '&key=' . $google_api : '' ), array('jquery'), null, true);

        wp_register_script('google-map-infobox', "{$js_folder_uri}/infobox{$js_suffix}.js", array('jquery', $name_script_map), null, true);
        wp_register_script('vendor-form', NOO_FRAMEWORK_URI . '/vendor/jquery.form.min.js', array('jquery'), null, true);
        wp_register_script('google-map-markerclusterer', "{$js_folder_uri}/markerclusterer{$js_suffix}.js", array('jquery', $name_script_map), null, true);

        wp_register_script('noo-property-map', "{$js_folder_uri}/property-map{$js_suffix}.js", array('jquery', 'vendor-form', 'google-map-infobox', 'google-map-markerclusterer'), null, true);
        wp_register_script('noo-property', "{$js_folder_uri}/property{$js_suffix}.js", array('jquery', 'vendor-carouFredSel', 'vendor-imagesloaded'), null, true);

        wp_register_script('vendor-chosen', NOO_FRAMEWORK_URI . '/vendor/chosen/chosen.jquery.min.js', array('jquery'), null, true);

        wp_localize_script('vendor-chosen', 'noo_chosen', array(
            'multiple_text' => __('Select Some Options', 'noo'),
            'single_text' => __('Select an Option', 'noo'),
            'no_result_text' => __('No results match', 'noo')
        ));

        wp_register_script('noo-img-uploader', "{$js_folder_uri}/noo-img-uploader{$js_suffix}.js", array('jquery', 'plupload-all', 'jquery-ui-sortable'), null, true);

        wp_localize_script('noo-img-uploader', 'noo_img_upload', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('aaiu_upload'),
            'remove' => wp_create_nonce('aaiu_remove'),
            'max_files' => 0,
            'upload_enabled' => true,
            'confirmMsg' => __('Are you sure you want to delete this?', 'noo'),
            'file_ext_thumbnail' => get_stylesheet_directory_uri() . '/assets/images/file-icon.png',
            'plupload' => array(
                'runtimes' => 'html5,flash,html4',
                'browse_button' => 'aaiu-uploader',
                'container' => 'aaiu-upload-container',
                'file_data_name' => 'aaiu_upload_file',
                'max_file_size' => (100 * 1000 * 1000) . 'b',
                'url' => admin_url('admin-ajax.php') . '?action=noo_upload&nonce=' . wp_create_nonce('aaiu_allow'),
                'flash_swf_url' => includes_url('js/plupload/plupload.flash.swf'),
                'filters' => array(array('title' => __('Allowed Files', 'noo'), 'extensions' => "jpg,jpeg,gif,png")),
                'multipart' => true,
                'urlstream_upload' => true,
            )
        ));

        /**
         * Localize map
         */
        wp_localize_script('noo-property-map', 'NooPropertyMap', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('noo-property-map'),
            'loading' => get_template_directory_uri() . '/assets/images/loading.gif',
            'results_search' => esc_html__('We found %d results. Do you want to load the results now?', 'noo'),
            'no_results_search' => esc_html__('We found no results', 'noo'),
            'icon_bedrooms' => get_stylesheet_directory_uri() . '/assets/images/bedroom-icon.png',
            'icon_bathrooms' => get_stylesheet_directory_uri() . '/assets/images/bathroom-icon.png',
            'icon_area' => get_stylesheet_directory_uri() . '/assets/images/size-icon.png'
        ));

        if (!is_admin()) {
            // Post type Property
            wp_enqueue_script('vendor-modernizr');

            if (noo_get_option('noo_smooth_scrolling', true)) {
                wp_enqueue_script('vendor-nicescroll');
            }

            // Required for nested reply function that moves reply inline with JS
            if (is_singular())
                wp_enqueue_script('comment-reply');

            //if ( is_masonry_style() ) {
            //	wp_enqueue_script('vendor-infinitescroll');
            //	wp_enqueue_script('vendor-isotope');
            //}

            $is_agents = is_post_type_archive('noo_agent');
            $is_properties = is_post_type_archive('noo_property');
            $is_property = is_singular('noo_property');
            $is_shop = NOO_WOOCOMMERCE_EXIST && is_shop();
            $is_product = NOO_WOOCOMMERCE_EXIST && is_product();

            $nooL10n = array(
                'ajax_url' => admin_url('admin-ajax.php', 'relative'),
                'security' => wp_create_nonce('noo-security'),
                'home_url' => noo_citilights_get_current_url(),
                'theme_dir' => get_template_directory(),
                'theme_uri' => get_template_directory_uri(),
                'is_logged_in' => is_user_logged_in() ? 'true' : 'false',
                'is_blog' => is_home() ? 'true' : 'false',
                'is_archive' => is_post_type_archive('post') ? 'true' : 'false',
                'is_single' => is_single() ? 'true' : 'false',
                'is_agents' => $is_agents ? 'true' : 'false',
                'is_properties' => $is_properties ? 'true' : 'false',
                'is_property' => $is_property ? 'true' : 'false',
                'is_shop' => $is_shop ? 'true' : 'false',
                'is_product' => $is_product ? 'true' : 'false',
                'wrong_pass' => esc_html__('Password do not match', 'noo'),
                'notice_empty' => esc_html__('Not an empty value, please enter a value', 'noo')
            );

            wp_localize_script('noo-script', 'nooL10n', $nooL10n);
            wp_enqueue_script('noo-script');

            if (class_exists('NooProperty')) {
                $nooPropertyL10n = array(
                    'ajax_url' => admin_url('admin-ajax.php', 'relative'),
                    'ajax_finishedMsg' => __('All posts displayed', 'noo'),
                    'security' => wp_create_nonce('property_security'),
                    'notice_max_compare' => esc_html__('The maximum number of properties compared to the main property is 4', 'noo')
                );
                wp_localize_script('noo-property', 'nooPropertyL10n', $nooPropertyL10n);
                wp_enqueue_script('noo-property');

                wp_register_script('noo-dashboard', "{$js_folder_uri}/dashboard{$js_suffix}.js", array('jquery', 'vendor-bootstrap-wysihtml5', 'noo-img-uploader', 'vendor-chosen'), null, true);
                wp_localize_script('noo-dashboard', 'noo_dashboard', array(
                    'delete_property' => wp_create_nonce('noo_delete_property'),
                    'featured_property' => wp_create_nonce('noo_featured_property'),
                    'status_property' => wp_create_nonce('noo_status_property'),
                    'listing_payment' => wp_create_nonce('noo_listing_payment'),
                    'confirmDeleteMsg' => __('Are you sure you want to delete this Property? This action can\'t be undone.', 'noo'),
                    'confirmFeaturedMsg' => __('The number of featured items will be subtracted from your package. This action can\'t be undone. Are you sure you want to do it?', 'noo'),
                    'confirmStatusMsg' => __('Are you sure you want to mark this property as Sold/Rent? This action can\'t be undone.', 'noo'),
                    'style_rtl' => is_rtl() ? NOO_FRAMEWORK_URI . '/vendor/bootstrap-wysihtml5/stylesheet-rtl.css' : '',
                    'chosen_multiple_text' => __('Select Some Options', 'noo'),
                    'chosen_single_text' => __('Select an Option', 'noo'),
                    'chosen_no_result_text' => __('No results match', 'noo')
                ));

                if (re_is_dashboard_page()) {
                    wp_enqueue_script('noo-dashboard');
                }
            }
        }

        /**
         * Upload
         */
        wp_register_style('noo-upload', NOO_ASSETS_URI . '/css/noo-upload.css', NULL, NULL, 'all');

        wp_register_script('noo-upload', NOO_ASSETS_URI . '/js/noo-upload.js', array('jquery', 'plupload-all', 'jquery-ui-sortable'), null, false);
        wp_localize_script('noo-upload', 'NooUpload', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('noo-upload'),
            'text_max_size_upload' => wp_create_nonce('noo-upload'),
            'remove_image' => esc_html__('Remove image', 'noo'),
            'allow_format' => 'jpg,jpeg,gif,png',
            'flash_swf_url' => includes_url('js/plupload/plupload.flash.swf'),
            'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
        ));
    }

    add_action('wp_enqueue_scripts', 'noo_enqueue_site_scripts');
endif;
//
////send otp to the otp
//function mobile_otp_post_ajax() {
//
//
//    global $wpdb;
//
//    if (isset($_POST["user_login"]) && $_POST["user_login"] != "") {
//        $user_login = $_POST["user_login"];
//    }
//    if (isset($_POST["user_email"]) && $_POST["user_email"] != "") {
//        $user_email = $_POST["user_email"];
//    }
//    if (isset($_POST["user_password"]) && $_POST["user_password"] != "") {
//        $user_password = $_POST["user_password"];
//    }
//    if (isset($_POST["user_password_retype"]) && $_POST["user_password_retype"] != "") {
//        $user_password_retype = $_POST["user_password_retype"];
//    }
//    if (isset($_POST["user_mobile_ccd"]) && $_POST["user_mobile_ccd"] != "") {
//        $user_mobile_ccd = $_POST["user_mobile_ccd"];
//    }
//    if (isset($_POST["user_mobile"]) && $_POST["user_mobile"] != "") {
//        $user_mobile = $_POST["user_mobile"];
//    }
//
//    //print_r($user_login);
//    // print_r($user_email);
//    // print_r($user_password);
//    //print_r($user_password_retype);
//    //print_r($user_mobile_ccd);
//    //  print_r($user_mobile);
//
//    if ($user_mobile !== '') {
//
//        $otp = mt_rand(1000, 9999);
//        //create draft user
//        $table = $wpdb->prefix . 'visitors';
//
//        $str = 'This is an encoded string';
//        $url_token = base64_encode($str);
//
//
//        // Add database entry
//        $data = array(
//            'username' => $user_login,
//            'password' => $user_password,
//            'mobile_no' => $user_mobile_ccd . $user_mobile,
//            'email' => $user_email,
//            'token' => $url_token,
//            'verified_email' => 0,
//            'verified_mobile' => 0,
//            'otp' => $otp,
//            'status' => 'inactive'
//        );
//        // print_r($data);
//        /* ---------------------------- */
//        $format = array('%s', '%d');
//        $rt = $wpdb->insert('wp_visitors', $data);
//        $my_id = $wpdb->insert_id;
//
//
//        /* ----------send the code for mobile verify----- */
//        $message = "Hello your OTP for Mobile verification is : " . $otp . " kindly use this to complete registration. Thank You";
//        //Your authentication key
//        $authKey = "313628A7WtKF7KjDv5e219680P1";
//        //Sender ID,While using route4 sender id should be 6 characters long.
//        $senderId = "JIYOPT";
//        //Your message to send, Add URL encoding here.
//        $message = urlencode($message);
//        //Define route
//        $route = "4";
//        //Prepare you post parameters
//        $postData = array(
//            'authkey' => $authKey,
//            'mobiles' => $user_mobile_ccd . $user_mobile,
//            'message' => $message,
//            'sender' => $senderId,
//            'route' => $route
//        );
//        sendmail($user_login, $url_token);
//        //API URL
//        //print_r($postData);
//        $url = "http://sms.webmingo.in/api/sendhttp.php";
//
//        // init the resource
//        $ch = curl_init();
//        curl_setopt_array($ch, array(
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_POST => true,
//            CURLOPT_POSTFIELDS => $postData
//                //,CURLOPT_FOLLOWLOCATION => true
//        ));
//        //Ignore SSL certificate verification
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        //get response
//        $output = curl_exec($ch);
//        //Print error if any
//        if (curl_errno($ch)) {
//            echo json_encode(array('dfrat_id' => $my_id,
//                'sratus' => 'false',
//                'error' => curl_error($ch)));
//        }
//        curl_close($ch);
//        /* -------Check if mail sent--------------- */
//        echo json_encode(array('dfrat_id' => $my_id, 'status' => true, 'otp' => $otp));
//    } else {
//        echo json_encode(array('dfrat_id' => $my_id, 'status' => false));
//    }
//    wp_die();
//}
//
//add_action('wp_ajax_nopriv_mobileotppostajax', 'mobile_otp_post_ajax');
//add_action('wp_ajax_mobileotppostajax', 'mobile_otp_post_ajax');
//
//function sendmail($username, $url_token) {
//    /* ------------------------------- */
//
//    #send user confirmation email
//    $basuerl = get_site_url();
//    $message = "Hi " . $username . ",
//                     You have registered on 'Jiyo Properties'.
//                     Please click on this verification link :" . $basuerl . "/email_verify?ur_token=" . $url_token . " to confirm registration.
//                     Thank You!";
//
//    $to = $email;
//    $from_name = get_bloginfo('name');
//    $from_email = get_bloginfo('admin_email');
//    /* ----------------------------- */
//    $subject = "Registrartion Details";
//    $headers = "From: '$from_name' <$from_email>";
//    // Send Confirmation email
//    wp_mail($to, $subject, $message, $headers);
//    /* ------------------------------ */
//    return true;
//}
//
//function webmingo_register_user() {
//
//    $user_login = !empty($_POST['user_login']) ? sanitize_text_field($_POST['user_login']) : '';
//    $user_password = !empty($_POST['user_password']) ? sanitize_text_field($_POST['user_password']) : '';
//    $user_mobile = !empty($_POST['user_mobile']) ? sanitize_text_field($_POST['user_mobile']) : '';
//    $user_email = !empty($_POST['user_email']) ? sanitize_text_field($_POST['user_email']) : '';
//
//    $user_id = username_exists($user_login);
//    if (!$user_id && email_exists($user_email) == false) :
//
//        $user_id = wp_create_user($user_login, $user_password, $user_email);
//        if (!empty($user_id)) :
//            /**
//             * Create agent
//             */
//            NooAgent::create_agent_from_user($user_id);
//            update_user_meta($user_id, '_noo_agent_phone', $user_mobile);
//            /**
//             * Login
//             */
//            $info_user = array(
//                'user_login' => $user_login,
//                'user_password' => $user_password,
//                'remember' => true
//            );
//            wp_signon($info_user, false);
//            $response['msg'] = esc_html__('Create user successfully. You are logging into...', 'noo');
//            //$response['link'] = get_site_url().'/agent-profile/';
//
//            $response['link'] = get_site_url() . '/submit-property/';
//            $response['status'] = 'success';
//        else :
//            $response['msg'] = esc_html__('Not insert user to database, please contact admin!', 'noo');
//            $response['status'] = 'error';
//        endif;
//    elseif (email_exists($user_email)) :
//        $response['msg'] = esc_html__('Email already exists, please check again!', 'noo');
//        $response['status'] = 'error';
//    elseif (!empty($user_id)) :
//        $response['msg'] = esc_html__('User already exists, please check again!', 'noo');
//        $response['status'] = 'error';
//    else :
//        $response['msg'] = esc_html__('Create user error, please contact admin!', 'noo');
//        $response['status'] = 'error';
//    endif;
//    echo json_encode($response);
//    wp_die();
//}
//
//add_action('wp_ajax_webmingo_register_user', 'webmingo_register_user');
//add_action('wp_ajax_nopriv_webmingo_register_user', 'webmingo_register_user');
//
//
///* ---------Submit post Front--- */
//function webmingo_post_sms_otp() {
//
//    if (isset($_POST['_noo_property_field_owner_number']) && $_POST['_noo_property_field_owner_number'] && isset($_POST['_noo_property_field_owner_name']) && $_POST['_noo_property_field_owner_name'] && isset($_POST['_noo_property_field_email']) && $_POST['_noo_property_field_email']) {
//
//        $user_mobile = $_POST['_noo_property_field_owner_number'];
//        $user_name = $_POST['_noo_property_field_owner_name'];
//        $user_email = $_POST['_noo_property_field_email'];
//
//        $base = webmingo_otp_send($user_mobile, $user_name, $user_email);
//        //print_r(json_decode($base,'true'));
//        $base_data = json_decode($base, 'true');
//        if ($base_data['status'] == 1) {
//            $response['msg'] = esc_html__('OTP Sent Successfully!, Please Insert OTP in OTP box and resubmit the form.', 'noo');
//            $response['mobiile_ver_id'] = $base_data['mobiile_ver_id'];
//            $response['status'] = 'success';
//        } else {
//            $response['msg'] = esc_html__('OTP Sent Failed!', 'noo');
//            $response['mobiile_ver_id'] = 0;
//            $response['status'] = 'error';
//        }
//    } else {
//        $response['msg'] = esc_html__('Please input required  fields!', 'noo');
//        $response['status'] = 'error';
//    }
//    echo json_encode($response);
//    wp_die();
//}
//
//add_action('wp_ajax_webmingopostsmsotp', 'webmingo_post_sms_otp');
//add_action('wp_ajax_nopriv_webmingopostsmsotp', 'webmingo_post_sms_otp');
//
//function webmingo_otp_send($user_mobile, $user_name, $user_email) {
//    global $wpdb;
//    // Add database entry
//    if ($user_mobile !== '') {
//        $otp = mt_rand(1000, 9999);
//        //create draft user
//        $table = $wpdb->prefix . 'visitors';
//        $str = 'This is an encoded string';
//        $url_token = base64_encode($str);
//
//        // Add database entry
//        $data = array(
//            'username' => $user_name,
//            'password' => null,
//            'mobile_no' => $user_mobile,
//            'email' => $user_email,
//            'token' => null,
//            'verified_email' => 0,
//            'verified_mobile' => 0,
//            'otp' => $otp,
//            'status' => 'inactive'
//        );
//
//        /* ---------------------------- */
//        $format = array('%s', '%d');
//        $rt = $wpdb->insert('wp_visitors', $data);
//        $my_id = $wpdb->insert_id;
//        /* ----------send the code for mobile verify----- */
//        $message = "Hello, Your OTP for Mobile verification is : " . $otp . " kindly use this to complete registration. Thank You";
//        //Your authentication key
//        $authKey = "313628A7WtKF7KjDv5e219680P1";
//        //Sender ID,While using route4 sender id should be 6 characters long.
//        $senderId = "JIYOPT";
//        //Your message to send, Add URL encoding here.
//        $message = urlencode($message);
//        //Define route
//        $route = "4";
//        //Prepare you post parameters
//        $postData = array(
//            'authkey' => $authKey,
//            'mobiles' => $user_mobile_ccd . $user_mobile,
//            'message' => $message,
//            'sender' => $senderId,
//            'route' => $route
//        );
//        sendmail($user_login, $url_token);
//        //API URL
//        //print_r($postData);
//        $url = "http://sms.webmingo.in/api/sendhttp.php";
//
//        // init the resource
//        $ch = curl_init();
//        curl_setopt_array($ch, array(
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_POST => true,
//            CURLOPT_POSTFIELDS => $postData
//                //,CURLOPT_FOLLOWLOCATION => true
//        ));
//        //Ignore SSL certificate verification
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        //get response
//        $output = curl_exec($ch);
//        //Print error if any
//        if (curl_errno($ch)) {
//            echo json_encode(array('mobiile_ver_id' => $my_id,
//                'sratus' => 'false',
//                'error' => curl_error($ch)));
//        }
//        curl_close($ch);
//        /* -------Check if mail sent--------------- */
//        return json_encode(array('mobiile_ver_id' => $my_id, 'status' => true, 'otp' => $otp));
//    } else {
//        return json_encode(array('mobiile_ver_id' => $my_id, 'status' => false));
//    }
//}
//
//function webmingo_function_verify_mob($otp, $mobiile_ver_id, $mobile_no) {
//    global $wpdb;
//    $results = $wpdb->get_results("SELECT * FROM wp_visitors WHERE otp='$otp' AND mobile_no='$mobile_no' ORDER BY id desc LIMIT 1", ARRAY_A);
//    //print_r($results);
//    if (!empty($results)) {
//        return 'true';
//    } else {
//        return 'false';
//    }
//}
//
///* ------------Add PROPERISE --------- */
//
//function webmingo_add_property() {
//    $post_status = 'pending';
//    // Check nonce
//    if (!isset($_POST['_noo_property_nonce']) || !wp_verify_nonce($_POST['_noo_property_nonce'], 'submit_property')) {
//        $response['msg'] = esc_html__('Sorry, your session is expired or you submitted an invalid property form.', 'noo');
//        $response['status'] = 'error';
//        echo json_encode($response);
//        exit(1);
//    }
//
//    if (!isset($_POST['_noo_property_field_owner_number']) || !isset($_POST['_verfiy_otp'])) {
//        // Create user if mobile verified + post property 
//        $response['msg'] = esc_html__('Please input Mobile no And OTP fields!', 'noo');
//        $response['status'] = 'error';
//        echo json_encode($response);
//        wp_die();
//    }
//    // Validity check
//    $mobile_no = $_POST['_noo_property_field_owner_number'];
//    $otp = $_POST['_verfiy_otp'];
//    $mobiile_ver_id = $_POST['mobiile_ver_id'];
//    $ret_vr = webmingo_function_verify_mob($otp, $mobiile_ver_id, $mobile_no);
//    if ($ret_vr == 'false') {
//        $response['msg'] = esc_html__('Please  Mobile no And OTP not Verified!', 'noo');
//        $response['status'] = 'error';
//        echo json_encode($response);
//        wp_die();
//    }
//
//    //Create user if mobile verified + post property 
//    $user_login = $_POST['_noo_property_field_owner_name'];
//    $user_email = $_POST['_noo_property_field_email'];
//    $user_password = $_POST['_noo_property_field_password'];
//    $user_mobile = $_POST['_noo_property_field_owner_number'];
//
//    if (email_exists($user_email) == false) {
//        $user_id = wp_create_user($user_login, $user_password, $user_email);
//        webmingo_save_post_callback_sendemail($user_mobile, $user_password, $user_login, $user_email);
//    }
//    /* --------------------------------------- */
//    // variable
//    $no_html = array();
//    $allowed_html = array(
//        'a' => array(
//            'href' => array(),
//            'target' => array(),
//            'title' => array(),
//            'rel' => array(),
//        ),
//        'img' => array(
//            'src' => array()
//        ),
//        'h1' => array(),
//        'h2' => array(),
//        'h3' => array(),
//        'h4' => array(),
//        'h5' => array(),
//        'p' => array(),
//        'br' => array(),
//        'hr' => array(),
//        'span' => array(),
//        'em' => array(),
//        'strong' => array(),
//        'small' => array(),
//        'b' => array(),
//        'i' => array(),
//        'u' => array(),
//        'ul' => array(),
//        'ol' => array(),
//        'li' => array(),
//        'blockquote' => array(),
//    );
//
//    // Submit data
//    $title = wp_kses($_POST['_title'], $no_html);
//    $desc = wp_kses($_POST['_desc'], $allowed_html);
//    $price = wp_kses($_POST['_price'], $no_html);
//    $price_label = wp_kses($_POST['_price_label'], $no_html);
//    $before_price_label = wp_kses($_POST['_before_price_label'], $no_html);
//
//    if (!isset($_POST['_status'])) {
//        $status = '';
//    } else {
//        $status = wp_kses($_POST['_status'], $no_html);
//    }
//    if (!isset($_POST['category'])) {
//        $type = '';
//    } else {
//        $type = wp_kses($_POST['category'], $no_html);
//    }
//    $address = wp_kses($_POST['_address'], $no_html);
//
//    if (!isset($_POST['_location'])) {
//        $location = '';
//    } else {
//        $location = wp_kses($_POST['_location'], $no_html);
//    }
//    if (!isset($_POST['_sub_location'])) {
//        $sub_location = '';
//    } else {
//        $sub_location = wp_kses($_POST['_sub_location'], $no_html);
//    }
//    $submit_features = array();
//    if (isset($_POST['_' . $features_prefix]) && is_array($_POST['_' . $features_prefix])) {
//        foreach ($_POST['_' . $features_prefix] as $key => $feature) {
//            if (in_array($key, $features_checklist)) {
//                $submit_features[$key] = wp_kses($feature, $no_html);
//                $features[$key]['value'] = $submit_features[$key];
//            }
//        }
//    }
//    // Error data checking
//    if (empty($title)) {
//        $has_err = true;
//        $response['msg'] = __('Please submit a title for your property', 'noo');
//    }
//
//    if (empty($desc)) {
//        $has_err = true;
//        $response['msg'] = __('Please input a description for your property', 'noo');
//    }
//
//    if (empty($featured_img) && empty($gallery)) {
//        $has_err = false;
//        $response['msg'] = __('Your property needs at least one image', 'noo');
//    }
//
//    if (empty($address)) {
//        $has_err = true;
//        $response['msg'] = __('Your property needs a specific address', 'noo');
//    }
//    if (!$has_err) {
//        $post = array(
//            'post_title' => $title,
//            'post_content' => $desc,
//            'post_status' => $post_status,
//            'post_type' => 'noo_property'
//        );
//        $prop_id = wp_insert_post($post);
//
//        if ($_POST['action'] == 'webmingoaddproperty') {
//
//            if (!$prop_id) {
//                $has_err = true;
//                $err_message[] = __('There\'s an unknown error when inserting your property to database. Please resubmit your property or contact Administrator.', 'noo');
//            } else {
//                $success = true;
//                //update_post_meta($prop_id, '_agent_responsible', $agent_id);
//                update_post_meta($prop_id, '_featured', '');
//
//                //                if (NooMembership::is_submission()) {
//                //                    update_post_meta($prop_id, '_paid_listing', '');
//                //                }
//                // Membership action
//                //NooAgent::decrease_listing_remain($agent_id);
//                // Email
//                $admin_email = get_option('admin_email');
//                $site_name = get_option('blogname');
//                $property_admin_link = admin_url('post.php?post=' . $prop_id) . '&action=edit';
//
//                //Notification mail sent to admin after property post
//                if ($need_approve) {
//                    $message .= sprintf(__("A user has just submitted a listing on %s and it's now waiting for your approval. To approve or reject it, please follow this link: %s", 'noo'), $site_name, $property_admin_link) . "<br/><br/>";
//                    noo_mail($admin_email, sprintf(__('[%s] New submission needs approval', 'noo'), $site_name), $message);
//                } else {
//                    $message .= sprintf(__("A user has just submitted a listing on %s. You can check it at %s", 'noo'), $site_name, $property_admin_link) . "<br/><br/>";
//                    noo_mail($admin_email, sprintf(__('[%s] New property submission', 'noo'), $site_name), $message);
//                }
//            }
//            // Update property meta when insert/update succeeded
//            if ($success) {
//                update_post_meta($prop_id, '_price', $price);
//                update_post_meta($prop_id, '_price_label', $price_label);
//                update_post_meta($prop_id, '_before_price_label', $before_price_label);
//
//                if (!empty($status)) {
//                    wp_set_object_terms($prop_id, $status, 'property_status');
//                }
//                if (!empty($type)) {
//                    //Set top Catgory Lable for the propertise
//                    wp_set_object_terms($prop_id, $type, 'property_label');
//
//                    //Set Sales + Rent Top for the propertise
//                    update_post_meta($prop_id, 'category', $type);
//
//                    $sub_category = $_POST['sub_category'];
//                    if (!empty($sub_category)) {
//                        if ($type == 'sale') {
//                            update_post_meta($prop_id, 'sub_category_sale', $sub_category);
//                        } elseif ($type = 'rent') {
//                            update_post_meta($prop_id, 'sub_category_rent', $sub_category);
//                        }
//                    }
//
//                    $residential_category_sale = $_POST['residential_category_sale'];
//                    if (!empty($residential_category_sale)) {
//                        wp_set_object_terms($prop_id, $residential_category_sale, 'property_category');
//                        update_post_meta($prop_id, 'sub_category_for_sale_residential', $sub_category);
//                    }
//                    $commercial_category_sale = $_POST['commercial_category_sale'];
//                    if (!empty($commercial_category_sale)) {
//                        wp_set_object_terms($prop_id, $commercial_category_sale, 'property_category');
//                        update_post_meta($prop_id, 'sub_category_for_sale_commercial', $sub_category);
//                    }
//
//                    $residential_category_rent = $_POST['residential_category_rent'];
//                    if (!empty($residential_category_rent)) {
//                        wp_set_object_terms($prop_id, $residential_category_rent, 'property_category');
//                        update_post_meta($prop_id, 'sub_category_for_rent_residential', $sub_category);
//                    }
//
//                    $commercial_category_rent = $_POST['commercial_category_rent'];
//                    if (!empty($commercial_category_rent)) {
//                        wp_set_object_terms($prop_id, $commercial_category_rent, 'property_category');
//                        update_post_meta($prop_id, 'sub_category_for_rent_residential', $sub_category);
//                    }
//                }
//
//
//                /* ------ *add property data-*** */
//                re_property_save_custom_fields($prop_id, $_POST);
//                update_post_meta($prop_id, '_address', $address);
//
//                if (!empty($location)) {
//                    wp_set_object_terms($prop_id, $location, 'property_location');
//                }
//                if (!empty($sub_location)) {
//                    wp_set_object_terms($prop_id, $sub_location, 'property_sub_location');
//                }
//                foreach ($submit_features as $feature_key => $submit_feature) {
//                    update_post_meta($prop_id, "_{$features_prefix}_{$feature_key}", $submit_feature);
//                }
//                if (isset($_POST['sub_listing']) && is_array($_POST['sub_listing'])) {
//                    update_post_meta($prop_id, 'sub_listing', array_values($_POST['sub_listing']));
//                }
//                if (isset($_POST['additional_features']) && is_array($_POST['additional_features'])) {
//                    update_post_meta($prop_id, 'additional_features', array_values($_POST['additional_features']));
//                }
//
//                // Featured property + IMAGE
//                // Check that the nonce is valid, and the user can edit this post.
//                // You can use WP's wp_handle_upload() function:
////                $file = $_FILES['file'];
////                $file_attr = wp_handle_upload($file, array('test_form' => true, 'action' => 'plupload_image_upload'));
////                $attachment = array('guid' => $file_attr['url'], 'post_mime_type' => $file_attr['type'], 'post_title' => preg_replace('/\\.[^.]+$/', '', basename($file['name'])), 'post_content' => '', 'post_status' => 'inherit');
////
////                // Adds file as attachment to WordPress
////                $id = wp_insert_attachment($attachment, $file_attr['file'], $prop_id);
////
////                // Only update if change from no featured to featured
////                if (!$featured) {
////                    $submit_featured = isset($_POST['_featured']) ? (bool) wp_kses($_POST['_featured'], $no_html) : $featured;
////
////                    if ($submit_featured && $featured_permision['allow']) {
////                        update_post_meta($prop_id, '_featured', 'yes');
////                        NooAgent::decrease_featured_remain($agent_id);
////                    } elseif (!$submit_featured) {
////                        update_post_meta($prop_id, '_featured', '');
////                    }
////                }0
//
//                wp_reset_query();
//                $response['msg'] = esc_html__('Property Posted Successfully, Thanks for register Your username and password will be sent to your email.', 'noo');
//                $response['status'] = 'succcess';
//
//                update_user_meta($user_id, '_noo_agent_phone', $user_mobile);
//                /**
//                 * Login
//                 */
//                $info_user = array(
//                    'user_login' => $user_login,
//                    'user_password' => $user_password,
//                    'remember' => true
//                );
//                wp_signon($info_user, false);
//
//                $response['link'] = get_site_url() . '/agent-dashboard/';
//                echo json_encode($response);
//
//                $url = get_site_url() . '/agent-dashboard/';
//                wp_redirect($url);
//                wp_die();
//            }
//        }
//    } else {
//        $response['status'] = 'error';
//        echo json_encode($response);
//        wp_die();
//    }
//}
//
//add_action('wp_ajax_webmingoaddproperty', 'webmingo_add_property');
//add_action('wp_ajax_nopriv_webmingoaddproperty', 'webmingo_add_property');

//
///* ---------------Admin Add user email + password ----------------------- */
//
//function count_digit($number) {
//    return strlen($number);
//}
//
//function divider($number_of_digits) {
//    $tens = "1";
//    if ($number_of_digits > 8) {
//        return 10000000;
//    }
//
//    while (($number_of_digits - 1) > 0) {
//        $tens.="0";
//        $number_of_digits--;
//    }
//    return $tens;
//}
//
//add_action('save_post', 'webmingo_save_post_callback', 100, 10);
//
//function webmingo_save_post_callback() {
//
//    global $post;
//    if ($post->post_type != 'noo_property') {
//        return;
//    }
//
//    /* ----------function call to change the currency in tags---------- */
//    $num = get_post_meta(get_the_ID(), '_price', true);
//    $ext = ""; //thousand,lac, crore
//    $number_of_digits = count_digit($num); //this is call :)
//    if ($number_of_digits > 3) {
//        if ($number_of_digits % 2 != 0) {
//            $divider = divider($number_of_digits - 1);
//        } else {
//            $divider = divider($number_of_digits);
//        }
//    } else {
//        $divider = 1;
//    }
//    $fraction = $num / $divider;
//    $fraction = number_format($fraction, 2);
//
//    if ($number_of_digits == 4 || $number_of_digits == 5) {
//        $ext = "K";
//    } else if ($number_of_digits == 6 || $number_of_digits == 7) {
//        $ext = "Lakh";
//    } else if ($number_of_digits == 8 || $number_of_digits == 9) {
//        $ext = "Cr";
//    }
//    $price_tag_text = $fraction . " " . $ext;
//    update_post_meta(get_the_ID(), '_price_tag_text', $price_tag_text);
//    /* ----------Update currency----- */
//
//
//
//    $type = get_post_meta(get_the_ID(), 'category', true);
//    if ($type == '') {
//        $type = '';
//    }
//
//    if (!empty($type)) {
//
//        //Set top Catgory Lable for the propertise
//        wp_set_object_terms(get_the_ID(), strtolower($type), '_label');
//
//        //wp_die();
//
//        $residential_category_sale = get_post_meta(get_the_ID(), 'sub_category_for_sale_residential', true);
//        if (!empty($residential_category_sale)) {
//            wp_set_object_terms(get_the_ID(), $residential_category_sale, 'property_category');
//        }
//
//        $commercial_category_sale = get_post_meta(get_the_ID(), 'sub_category_for_sale_commercial', true);
//
//        if (!empty($commercial_category_sale)) {
//            wp_set_object_terms(get_the_ID(), $commercial_category_sale, 'property_category');
//        }
//
//        $residential_category_rent = get_post_meta(get_the_ID(), 'sub_category_for_rent_residential', true);
//        if (!empty($residential_category_rent)) {
//            wp_set_object_terms(get_the_ID(), $residential_category_rent, 'property_category');
//        }
//
//        $commercial_category_rent = get_post_meta(get_the_ID(), 'sub_category_for_rent_commercial', true);
//        if (!empty($commercial_category_rent)) {
//            wp_set_object_terms(get_the_ID(), $commercial_category_rent, 'property_category');
//        }
//    }
//
//    /* ----------function call to change the currency in tags---------- */
//    $num = get_post_meta(get_the_ID(), '_price', true);
//    $ext = ""; //thousand,lac, crore
//    $number_of_digits = count_digit($num); //this is call :)
//    if ($number_of_digits > 3) {
//        if ($number_of_digits % 2 != 0) {
//            $divider = divider($number_of_digits - 1);
//        } else {
//            $divider = divider($number_of_digits);
//        }
//    } else {
//        $divider = 1;
//    }
//    $fraction = $num / $divider;
//    $fraction = number_format($fraction, 2);
//
//    if ($number_of_digits == 4 || $number_of_digits == 5) {
//        $ext = "K";
//    } else if ($number_of_digits == 6 || $number_of_digits == 7) {
//        $ext = "Lakh";
//    } else if ($number_of_digits == 8 || $number_of_digits == 9) {
//        $ext = "Cr";
//    }
//    $price_tag_text = $fraction . " " . $ext;
//    update_post_meta(get_the_ID(), '_price_tag_text', $price_tag_text);
//    /* ----------Update currency----- */
//
//    // print_r($post->ID);
//    // print_r(get_post_meta( $post->ID ));
//    // print_r(get_post_meta( get_the_ID(), '_noo_property_field_owner_name', true ));
//    // If you get here then it's your post type so do your thing....
//    // Owner_number
//    $user_mobile = get_post_meta(get_the_ID(), '_noo_property_field_owner_number', true);
//    $user_login = get_post_meta(get_the_ID(), '_noo_property_field_owner_name', true);
//
//    // Email Get_field('search_keyword', $post_ID);
//    $user_email = get_post_meta(get_the_ID(), '_noo_property_field_email', true);
//    // owner_password
//    $user_password = get_post_meta(get_the_ID(), '_noo_property_field_owner_password', true);
//
//    if ($user_password !== "") {
//        // Create user
//        $respons_id = email_exists($user_email);
//        if ($respons_id == false) {
//            $user_id = wp_create_user($user_login, $user_password, $user_email);
//            if (!empty($user_id)) {
//                /* Create agent */
//                //NooAgent::create_agent_from_user($user_id);
//                //update_user_meta($user_id, '_noo_agent_phone', $user_mobile);
//            }
//        } else {
//            $user_data = wp_update_user(array('ID' => $respons_id, 'user_pass' => $user_password));
//            // Send SMS Confirmation to prperty owner
//        }
//        webmingo_save_post_callback_sendsms($user_mobile, $user_password, $user_login, $user_email);
//        // Send owner An email
//        webmingo_save_post_callback_sendemail($user_mobile, $user_password, $user_login, $user_email);
//    }
//}
//
//function webmingo_save_post_callback_sendsms($user_mobile, $user_password, $user_login, $user_email) {
//
//    global $wpdb;
//    // Add database entry
//    /* ----------send the code for mobile verify----- */
//    $message = "Hello,Admin has apporved property. Kindly use >> Username: " . $user_login . " And Password : " . $user_password . " for login, Thank You";
//    //Your authentication key
//    $authKey = "313628A7WtKF7KjDv5e219680P1";
//    //Sender ID,While using route4 sender id should be 6 characters long.
//    $senderId = "JIYOPT";
//    //Your message to send, Add URL encoding here.
//    $message = urlencode($message);
//    //Define route
//    $route = "4";
//    //Prepare you post parameters
//    $postData = array(
//        'authkey' => $authKey,
//        'mobiles' => $user_mobile,
//        'message' => $message,
//        'sender' => $senderId,
//        'route' => $route
//    );
//    //API URL
//    //print_r($postData);
//    $url = "http://sms.webmingo.in/api/sendhttp.php";
//
//    // init the resource
//    $ch = curl_init();
//    curl_setopt_array($ch, array(
//        CURLOPT_URL => $url,
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_POST => true,
//        CURLOPT_POSTFIELDS => $postData
//            //,CURLOPT_FOLLOWLOCATION => true
//    ));
//    //Ignore SSL certificate verification
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//    //get response
//    $output = curl_exec($ch);
//
//    //Print error if any
//    if (curl_errno($ch)) {
//        echo json_encode(array('mobiile_ver_id' => $my_id,
//            'sratus' => 'false',
//            'error' => curl_error($ch)));
//    }
//    curl_close($ch);
//    return true;
//}
//
//function webmingo_save_post_callback_sendemail($user_mobile, $user_password, $user_login, $user_email) {
//    /* ------------------------------- */
//    #send user confirmation email after password added
//    $message = "Hi " . $user_login . ",
//                You have registered on 'Jiyo Properties'.Kindly use >> Username: " . $user_login . " And Password : " . $user_password . " for login, Thank You!";
//
//
//    $to = $user_email;
//    $from_name = get_bloginfo('name');
//    $from_email = get_bloginfo('admin_email');
//
//    $subject = "Logins Details";
//    $headers = "From: '$from_name' <$from_email>";
//    // Send Confirmation email
//    wp_mail($to, $subject, $message, $headers);
//    /* ------------------------------ */
//    return true;
//}
