<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$property_favorites = noo_get_page_link_by_template('property_favorites.php');
$property_id = empty($property_id) ? get_the_ID() : $property_id;

while ($query->have_posts()): $query->the_post();

    global $post;
    $is_favorites = get_user_meta($user_id, 'is_favorites', true);
    $check_is_favorites = (!empty($is_favorites) && in_array(get_the_ID(), $is_favorites) ) ? true : false;
    $class_favorites = $check_is_favorites ? 'is_favorites' : 'add_favorites';
    $text_favorites = $check_is_favorites ? esc_html__('View favorites', 'noo') : esc_html__('Add to favorites', 'noo');
    $icon_favorites = $check_is_favorites ? 'fa-heart' : 'fa-heart-o';
    ?>
    <article id="post-<?php the_ID(); ?>" class="property utf-listing-details">

        <?php
        $gallery = noo_get_post_meta(get_the_ID(), '_gallery', '');
        $gallery_ids = explode(',', $gallery);
        $gallery_ids = array_filter($gallery_ids);
        $featured_image = get_post_thumbnail_id();

        $floor_plan = noo_get_post_meta(get_the_ID(), '_floor_plan', '');
        $floor_plan_ids = explode(',', $floor_plan);
        $floor_plan_ids = array_filter($floor_plan_ids);


        $_pdf_file = noo_get_post_meta(get_the_ID(), '_pdf_file', '');
        $_pdf_file_ids = explode(',', $_pdf_file);
        $_pdf_file_ids = array_filter($_pdf_file_ids);

        $property_price_tag_text = get_post_meta(get_the_ID(), '_price_tag_text', true);

        $property_category = get_the_term_list(get_the_ID(), 'property_category', '<span class="detail-field-value type-value">', ', ', '</span>');
        $property_status = get_the_term_list(get_the_ID(), 'property_status', '<span class="detail-field-value status-value">', ', ', '</span>');
        $property_location = get_the_term_list(get_the_ID(), 'property_location', '', ', ');
        $property_sub_location = get_the_term_list(get_the_ID(), 'property_sub_location', '', ', ');
        $property_price = re_get_property_price_html(get_the_ID());
        $property_area = trim(re_get_property_area_html(get_the_ID()));
        $property_bedrooms = noo_get_post_meta(get_the_ID(), '_bedrooms');
        $property_owner_name = noo_get_post_meta(get_the_ID(), '_noo_property_field_owner_name');
        $property_ownership = noo_get_post_meta(get_the_ID(), '_noo_property_field_ownership');
        $property_bathrooms = noo_get_post_meta(get_the_ID(), '_bathrooms');
        

        if (!empty($featured_image) || !empty($gallery_ids)) :
            ?>
            <script type="text/javascript">
                jQuery('.container-wrap').addClass('bg-grey');
                jQuery(".col-st").parent().append("<div class='col-sm-6'>");
                jQuery(".col-en").append("</div>");
            </script>
            <div class="single-property-d">
                <div class="row">
                    <div class="col-md-12">
                        <div class="list-details-title v3">
                            <div class="row">
                                <div class="col-lg-6 col-md-7 col-sm-12">
                                    <div class="single-listing-title float-left">
                                        <h2><?php the_title(); ?></h2>
                                        <?php
                                        $_label = noo_get_post_meta(get_the_ID(), '_label');
                                        if (!empty($_label) && ($property_label = get_term($_label, 'property_label'))):
                                            $noo_property_label_colors = get_option('noo_property_label_colors');
                                            $color = isset($noo_property_label_colors[$property_label->term_id]) ? $noo_property_label_colors[$property_label->term_id] : '';
                                            ?>
                                            <span class="property-label btn v5" <?php echo (!empty($color) ? ' style="background-color:' . $color . '"' : '') ?>>
                                                <?php echo $property_label->name ?>
                                            </span>

                                        <?php endif; ?>
                                        <p><i class="fa fa-map-marker"></i> <?php echo noo_get_post_meta(null, '_address') ?> &nbsp;&nbsp; <i class="fa fa-home"></i> <span id="property_id">Property ID: <?php echo get_the_ID(); ?></span></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5 col-sm-12">
                                    <div class="list-details-btn text-right sm-left">
                                        <div class="trend-open">
                                            <?php
                                            if (!empty($property_price_tag_text)) {
                                                echo '<p> ₹ ' . $property_price_tag_text . '</p>';
                                            } else if (!empty($property_price)) {
                                                echo '<p>' . $property_price . '</p>';
                                            }
                                            ?>

                                        </div>
                                        <?php re_property_social_share(get_the_id()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="listing-desc-wrap mr-30">
                            <div class="list-details-wrap">
                                <div class="list-details-section">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <?php
                                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                            if (!empty($featured_img_url)) {
                                                echo '<img src="' . $featured_img_url . '" class="img-fluid feature-po">';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="property-top-det">
                                                <div class="row">
                                                    <?php
                                                    $custom_fields = re_get_property_custom_fields();
                                                    //print_r($custom_fields);
                                                    $property_id = get_the_ID();
                                                    if (function_exists('pll_get_post'))
                                                        $property_id = pll_get_post($property_id);
                                                    ?>
                                                    <?php
                                                    foreach ((array) $custom_fields as $field) {
                                                        if (!isset($field['name']) || empty($field['name']))
                                                            continue;
                                                        $field['type'] = isset($field['type']) ? $field['type'] : 'text';
                                                        if ($field['name'] == '_area' || $field['name'] == '_bedrooms' || $field['name'] == '_bathrooms' || $field['name'] == 'lot_area' || $field['name'] == 'year_built' || $field['name'] == 'floor' || $field['name'] == 'style') {

                                                            $id = re_property_custom_fields_name($field['name']);
                                                            if (isset($field['is_default'])) {
                                                                if (isset($field['is_disabled']) && ($field['is_disabled'] == 'yes'))
                                                                    continue;
                                                                if (isset($field['is_tax']))
                                                                    continue;
                                                                $id = $field['name'];
                                                            }
                                                            $value = noo_get_post_meta($property_id, $id, null);
                                                            $field['prop'] = '1';
                                                            $args = array(
                                                                'label_tag' => 'div',
                                                                'label_class' => 'col-st detail-field-label',
                                                                'value_tag' => 'div',
                                                                'value_class' => 'col-en detail-field-value',
                                                            );
                                                            noo_display_field($field, $id, $value, $args);
                                                        }
                                                    }
                                                    ?>
                                                    <div class="col-sm-6">
                                                        <div class="label-_noo_property_field_year_built col-st detail-field-label">City</div>
                                                        <div class="value-_noo_property_field_year_built col-en detail-field-value"><?php echo $property_location ?></div>
                                                    </div>
                                                    <?php if($property_sub_location != "")  {  ?>
                                                    <div class="col-sm-6">
                                                        <div class="label-_noo_property_field_year_built col-st detail-field-label">Area</div>
                                                        <div class="value-_noo_property_field_year_built col-en detail-field-value"><?php echo $property_sub_location ?></div>
                                                    </div>
                                                <?php } ?>
                                                     <div class="col-sm-6">
                                                        <div class="label-_noo_property_field_year_built col-st detail-field-label"><?php echo $property_ownership; ?> Name</div>
                                                         <div class="value-_noo_property_field_year_built col-en detail-field-value owner_name_display">XXXXXXXXXX</div>

                                                      <!--   <div class="value-_noo_property_field_year_built col-en detail-field-value owner_no_display"><?php // echo $property_owner_name ?></div> -->
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-_noo_property_field_year_built col-st detail-field-label"><?php echo $property_ownership; ?> Mobile</div>
                                                        <div class="value-_noo_property_field_year_built col-en detail-field-value owner_no_display">+91-XXXXXXXXXX</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="utf-listing-det-ac">

                                                            <?php
                                                            $br_tag = "<br>";
                                                            $text= urlencode("For Property detail kindly visit www.jiyoproperty.com           ");
                                                             $url = urlencode(get_the_permalink()); $title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>
         
        <div class='social-share'>

            <style>     
            .label-_noo_property_field_owner_name.col-sm-3.detail-field-label {
                display: none;
            }   
            .value-_noo_property_field_owner_name.col-sm-3.detail-field-value {
                display: none;
            }                               
    .property-top-det .utf-listing-det-ac button {
        color: #d8232a !important;
        background-color: #fff  !important;
        border: 1px solid #d8232a  !important;
        cursor: pointer  !important;
        font-weight: 600 !important;
        padding: 7px 20px  !important;
         font-family: 'Lato'; 
        margin-right: 10px !important;
         line-height: 15px; 
        border-radius: 3px !important;
        float: left !important;
    }
            </style>
        </div>
                                                            <!--<!========== Enquiry form button + Modal--------->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                                Enquiry Now
                                                            </button>

                                                            <div class="modal" id="myModal" style="background: transparent;">
                                                                <!--  <div id="modal-quickview" class="modal fade" role="dialog"> -->
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Enquiry Now</h4>
                                                                            <input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="×">
                                                                        </div>  

                                                                        <!-- Modal body -->
                                                                        <div class="modal-body">
                                                                            <form class="form-group <?php echo $class_register_wrap = uniqid('class-register-wrap-'); ?>" method="post" action="javascript:void(0)"  id="frmRequest" required>
                                                                                <div class="row">
                                                                                    <input type="hidden" class="form-control" name="user_id" value="<?php
                                                                                    global $wpdb;
                                                                                    $user = wp_get_current_user();
                                                                                    $user1 = $user->ID;
                                                                                    //  print_r($user1);
                                                                                    ?>" required>
                                                                                    <input type="hidden" class="form-control" name="prop_id" value="<?php echo get_the_ID(); ?>" required>
                                                                                                                                                                
                                                                                    <div class="col-sm-12">
                                                                                        <label>Name *</label>
                                  <input type="text" class="form-control" value="<?php if(isset($_COOKIE['name'])){ echo $_COOKIE['name'];}?>" name="name" id="namebox" placeholder="Enter Name" required>
                                                                                    </div>

                                                                                    <div class="col-sm-12">
                                                                                        <label>Email</label>
          <input type="email" class="form-control" name="email" id="emailbox" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>" placeholder="Enter Email">
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <label>Phone Number *</label>
                                                                                        <div class="input-group mb-20">
                                                                                            <div class="input-group-prepend">
                                                                                                <select id="Country_Code" name="user_mobile_ccd" class="user_mobile_ccd form-control" required="true">
                                                                                                    <option value="91" selected="">+91 IND</option>
                                                                                                    <!-- <option value="44">+44 GBR</option> -->
                                                                                                    <!-- <option value="1">+1 USA</option> -->

                                                                                                    <!-- <option value="61">+61 AUS</option><option value="60">+60 MYS</option><option value="971">+971 ARE</option><option value="93">+93 AFG</option><option value="355">+355 ALB</option><option value="213">+213 DZA</option><option value="1684">+1684 ASM</option><option value="376">+376 AND</option><option value="244">+244 AGO</option><option value="1264">+1264 AIA</option><option value="672">+672 ATA</option><option value="1268">+1268 ATG</option><option value="54">+54 ARG</option><option value="374">+374 ARM</option><option value="297">+297 ABW</option><option value="43">+43 AUT</option><option value="994">+994 AZE</option><option value="1242">+1242 BHS</option><option value="973">+973 BHR</option><option value="880">+880 BGD</option><option value="1246">+1246 BRB</option><option value="375">+375 BLR</option><option value="32">+32 BEL</option><option value="501">+501 BLZ</option><option value="229">+229 BEN</option><option value="1441">+1441 BMU</option><option value="975">+975 BTN</option><option value="591">+591 BOL</option><option value="387">+387 BIH</option><option value="267">+267 BWA</option><option value="55">+55 BRA</option><option value="1284">+1284 VGB</option><option value="673">+673 BRN</option><option value="359">+359 BGR</option><option value="226">+226 BFA</option><option value="95">+95 MMR</option><option value="257">+257 BDI</option><option value="855">+855 KHM</option><option value="237">+237 CMR</option><option value="1">+1 CAN</option><option value="238">+238 CPV</option><option value="1345">+1345 CYM</option><option value="236">+236 CAF</option><option value="235">+235 TCD</option><option value="56">+56 CHL</option><option value="86">+86 CHN</option><option value="61">+61 CXR</option><option value="61">+61 CCK</option><option value="57">+57 COL</option><option value="269">+269 COM</option><option value="682">+682 COK</option><option value="506">+506 CRC</option><option value="385">+385 HRV</option><option value="53">+53 CUB</option><option value="357">+357 CYP</option><option value="420">+420 CZE</option><option value="243">+243 COD</option><option value="45">+45 DNK</option><option value="253">+253 DJI</option><option value="1767">+1767 DMA</option><option value="1809">+1809 DOM</option><option value="593">+593 ECU</option><option value="20">+20 EGY</option><option value="503">+503 SLV</option><option value="240">+240 GNQ</option><option value="291">+291 ERI</option><option value="372">+372 EST</option><option value="251">+251 ETH</option><option value="500">+500 FLK</option><option value="298">+298 FRO</option><option value="679">+679 FJI</option><option value="358">+358 FIN</option><option value="33">+33 FRA</option><option value="689">+689 PYF</option><option value="241">+241 GAB</option><option value="220">+220 GMB</option><option value="995">+995 GEO</option><option value="49">+49 DEU</option><option value="233">+233 GHA</option><option value="350">+350 GIB</option><option value="30">+30 GRC</option><option value="299">+299 GRL</option><option value="1473">+1473 GRD</option><option value="1671">+1671 GUM</option><option value="502">+502 GTM</option><option value="224">+224 GIN</option><option value="245">+245 GNB</option><option value="592">+592 GUY</option><option value="509">+509 HTI</option><option value="39">+39 VAT</option><option value="504">+504 HND</option><option value="852">+852 HKG</option><option value="36">+36 HUN</option><option value="354">+354 IS</option><option value="62">+62 IDN</option><option value="98">+98 IRN</option><option value="964">+964 IRQ</option><option value="353">+353 IRL</option><option value="44">+44 IMN</option><option value="972">+972 ISR</option><option value="39">+39 ITA</option><option value="225">+225 CIV</option><option value="1876">+1876 JAM</option><option value="81">+81 JPN</option><option value="962">+962 JOR</option><option value="7">+7 KAZ</option><option value="254">+254 KEN</option><option value="686">+686 KIR</option><option value="965">+965 KWT</option><option value="996">+996 KGZ</option><option value="856">+856 LAO</option><option value="371">+371 LVA</option><option value="961">+961 LBN</option><option value="266">+266 LSO</option><option value="231">+231 LBR</option><option value="218">+218 LBY</option><option value="423">+423 LIE</option><option value="370">+370 LTU</option><option value="352">+352 LUX</option><option value="853">+853 MAC</option><option value="389">+389 MKD</option><option value="261">+261 MDG</option><option value="265">+265 MWI</option><option value="960">+960 MDV</option><option value="223">+223 MLI</option><option value="356">+356 MLT</option><option value="692">+692 MHL</option><option value="222">+222 MRT</option><option value="230">+230 MUS</option><option value="262">+262 MYT</option><option value="52">+52 MEX</option><option value="691">+691 FSM</option><option value="373">+373 MDA</option><option value="377">+377 MCO</option><option value="976">+976 MNG</option><option value="382">+382 MNE</option><option value="1664">+1664 MSR</option><option value="212">+212 MAR</option><option value="258">+258 MOZ</option><option value="264">+264 NAM</option><option value="674">+674 NRU</option><option value="977">+977 NPL</option><option value="31">+31 NLD</option><option value="599">+599 ANT</option><option value="687">+687 NCL</option><option value="64">+64 NZL</option><option value="505">+505 NIC</option><option value="227">+227 NER</option><option value="234">+234 NGA</option><option value="683">+683 NIU</option><option value="672">+672 NFK</option><option value="850">+850 PRK</option><option value="1670">+1670 MNP</option><option value="47">+47 NOR</option><option value="968">+968 OMN</option><option value="92">+92 PAK</option><option value="680">+680 PLW</option><option value="507">+507 PAN</option><option value="675">+675 PNG</option><option value="595">+595 PRY</option><option value="51">+51 PER</option><option value="63">+63 PHL</option><option value="870">+870 PCN</option><option value="48">+48 POL</option><option value="351">+351 PRT</option><option value="1">+1 PRI</option><option value="974">+974 QAT</option><option value="242">+242 COG</option><option value="40">+40 ROU</option><option value="7">+7 RUS</option><option value="250">+250 RWA</option><option value="590">+590 BLM</option><option value="290">+290 SHN</option><option value="1869">+1869 KNA</option><option value="1758">+1758 LCA</option><option value="1599">+1599 MAF</option><option value="508">+508 SPM</option><option value="1784">+1784 VCT</option><option value="685">+685 WSM</option><option value="378">+378 SMR</option><option value="239">+239 STP</option><option value="966">+966 SAU</option><option value="221">+221 SEN</option><option value="381">+381 SRB</option><option value="248">+248 SYC</option><option value="232">+232 SLE</option><option value="65">+65 SGP</option><option value="421">+421 SVK</option><option value="386">+386 SVN</option><option value="677">+677 SLB</option><option value="252">+252 SOM</option><option value="27">+27 ZAF</option><option value="82">+82 KOR</option><option value="34">+34 ESP</option><option value="94">+94 LKA</option><option value="249">+249 SDN</option><option value="597">+597 SUR</option><option value="268">+268 SWZ</option><option value="46">+46 SWE</option><option value="41">+41 CHE</option><option value="963">+963 SYR</option><option value="886">+886 TWN</option><option value="992">+992 TJK</option><option value="255">+255 TZA</option><option value="66">+66 THA</option><option value="670">+670 TLS</option><option value="228">+228 TGO</option><option value="690">+690 TKL</option><option value="676">+676 TON</option><option value="1868">+1868 TTO</option><option value="216">+216 TUN</option><option value="90">+90 TUR</option><option value="993">+993 TKM</option><option value="1649">+1649 TCA</option><option value="688">+688 TUV</option><option value="256">+256 UGA</option><option value="380">+380 UKR</option><option value="598">+598 URY</option><option value="1340">+1340 VIR</option><option value="998">+998 UZB</option><option value="678">+678 VUT</option><option value="58">+58 VEN</option><option value="84">+84 VNM</option><option value="681">+681 WLF</option><option value="967">+967 YEM</option><option value="260">+260 ZMB</option><option value="263">+263 ZWE</option> -->
                                                                                                </select>

                                                                                            </div>
      <input type="text" name="mobile" value="<?php if(isset($_COOKIE['mobile'])){ echo $_COOKIE['mobile'];}?>"
        id="numberbox" required="true" class="user_mobile r_mobile form-control" placeholder="Your Mobile no. *" maxlength="10">

                                                                                          <!--   <span class="w100" style="color:red;">OTP will sent to your registered Mobile No.</span> -->	
                                                                                     <!--        <input class="form-control" style="display:none;" type="text" placeholder="OTP" id="show_otp" name="otp" value="" maxlength="4"> -->
                                                                                          <!--   <button style="display:none;type="button" id="submit" name="submit" class="button_getno btn btn-danger">Resend</button>  
 -->
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-sm-12">
                                                                                        <label for="comment">Motive</label>
                                                                                        <select class="form-control" id="sel1" name="type">
                                                                                            <option value="Interested In">Interested In</option>
                                                                                            <option value="Site Visit">Site Visit</option>
                                                                                            <option value="Immediate purchase"> Immediate purchase</option>
                                                                                        </select>
                                                                                    </div>
                                                                                 <div class="col-sm-12" style="height: 79px;">
                                                                                    <label for="comment" style="margin-top: 20px;">Are You ? </label>
                                                                                    Individual
                     <input type="radio" name="visitor_type" value="Individual" <?php if(isset($_COOKIE['visitor_type']) && $_COOKIE['visitor_type'] == 'Individual'){ echo 'checked'; } ?> > 
                                                                                    Agent
                     <input type="radio" name="visitor_type" value="Agent" <?php if(isset($_COOKIE['visitor_type']) && $_COOKIE['visitor_type'] == 'Agent'){ echo 'checked'; } ?> > 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input hidden type="text" name="param" id="param" value="save_request">
                                                                                    <input hidden type="text" name="action" id="action" value="requestlibrary">
                                                                                    <button type="button" id="submit" name="submit" class="button_getno btn btn-danger">Submit</button>  
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </form> 
                                                                        </div>     
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" data-target="#share_feedback" data-toggle="modal">Share Feedback</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="listing-desc-wrap mr-30">
                            <div class="list-details-wrap">

                                <div id="gallery" class="list-details-section">
                                    <h4>Gallery</h4>
                                    <div class="overview-content">
                                        <div class="images">
                                            <div class="caroufredsel-wrap">
                                                <ul class="row">
                                                    <?php
                                                    if (!empty($featured_image) && empty($gallery_ids)) :
                                                        $image = wp_get_attachment_image_src($featured_image, 'full');
                                                        ?>
                                                        <li class="col-sm-12 img-full-fea">
                                                            <a class="thumbnail" data-fancybox="gallery"  href="<?php echo $image[0] ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'full') ?></a>

                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($gallery_ids)): ?>
                                                        <?php
                                                        foreach ($gallery_ids as $gallery_id):
                                                            $gallery_image = wp_get_attachment_image_src($gallery_id, 'full');
                                                            if ($gallery_image) :
                                                                ?>
                                                                <li class="col-sm-3">
                                                                    <a class="thumbnail" data-fancybox="gallery" href="<?php echo $gallery_image[0] ?>"><?php echo wp_get_attachment_image($gallery_id, 'full'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="description" class="list-details-section">
                                    <h4>Property Brief</h4>
                                    <div class="overview-content">
                                        <p class="mb-10"><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div id="property-desc" class="list-details-section">
                                <h4>Property Details</h4>
                                <div class="overview-content">
                                    <ul class="property-info row">
                                        <?php if (!empty($property_location)) : ?>
                                            <div class="col-sm-3 detail-field-label">
                                                <?php echo __('Location', 'noo') ?>
                                            </div>
                                            <div class="col-sm-3 detail-field-value">
                                                <?php echo $property_location ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($property_sub_location)) : ?>
                                            <div class="col-sm-3 detail-field-label">
                                                <?php echo __('Sub Location', 'noo') ?>
                                            </div>
                                            <div class="col-sm-3 detail-field-value">
                                                <?php echo $property_sub_location ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($property_status)) : ?>
                                            <div class="col-sm-3 detail-field-label">
                                                <?php echo __('Status', 'noo') ?>
                                            </div>
                                            <div class="col-sm-3 detail-field-value">
                                                <?php echo $property_status ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        $custom_fields = re_get_property_custom_fields();
                                        //print_r($custom_fields);
                                        $property_id = get_the_ID();
                                        if (function_exists('pll_get_post'))
                                            $property_id = pll_get_post($property_id);
                                        ?>
                                        <?php
                                        foreach ((array) $custom_fields as $field) {
                                            if (!isset($field['name']) || empty($field['name']))
                                                continue;
                                            $field['type'] = isset($field['type']) ? $field['type'] : 'text';
                                            $id = re_property_custom_fields_name($field['name']);
                                            if (isset($field['is_default'])) {
                                                if (isset($field['is_disabled']) && ($field['is_disabled'] == 'yes'))
                                                    continue;
                                                if (isset($field['is_tax']))
                                                    continue;
                                                $id = $field['name'];
                                            }

                                            $value = noo_get_post_meta($property_id, $id, null);
                                            $args = array(
                                                'label_tag' => 'div',
                                                'label_class' => 'col-sm-3 detail-field-label',
                                                'value_tag' => 'div',
                                                'value_class' => 'col-sm-3 detail-field-value'
                                            );
                                            noo_display_field($field, $id, $value, $args);
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="listing-desc-wrap mr-30">
                            <div class="list-details-wrap">
                                <!-- <div id="enquiry" class="list-details-section">
                                    <h4>Enquiry</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" placeholder="Name" class="form-control" name="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" placeholder="Email" class="form-control" name="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" placeholder="Mobile No." class="form-control" name="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <select class="form-control">
                                                <option selected="">Interested In</option>
                                                <option>Immediate Purchase</option>
                                                <option>Site Visit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-enq-sub">Submit</button>
                                        </div>
                                    </div> -->
                            </div>
                            <div id="floor-plan" class="list-details-section">
                                <h4>Floor Plan</h4>
                                <div class="overview-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
                                            if (!empty($floor_plan_ids)) :
                                                wp_enqueue_style('owlcarousel');
                                                wp_enqueue_script('owlcarousel');

                                                foreach ($floor_plan_ids as $floor_plan_id) :

                                                    $floor_plan_image = wp_get_attachment_image_src($floor_plan_id, 'full');
                                                    if ($floor_plan_image) :
                                                        ?>

                                                        <a class="floor-plan-item noo-lightbox-item" data-lightbox-gallery="floor_plan_<?php the_ID() ?>" href="<?php echo $floor_plan_image[0] ?>">
                                                            <?php echo wp_get_attachment_image($floor_plan_id, 'property-floor'); ?>
                                                        </a>

                                                        <?php
                                                    endif;

                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $features = (array) re_get_property_feature_fields();
                            if (!empty($features) && is_array($features)) :
                                ?>
                                <div id="features" class="list-details-section">
                                    <h4>Property Features</h4>
                                    <div class="overview-content">
                                           <ul class="features-pro">
                                                <?php $show_no_feature = ( re_get_property_feature_setting('show_no_feature') == 'yes' ); ?>
                                                <?php foreach ($features as $key => $feature) : 
                                                
                                                #print_r(noo_get_post_meta(get_the_ID(), '_noo_property_feature_' . $key));
                                                
                                                ?>
                                                    <?php if (noo_get_post_meta(get_the_ID(), '_noo_property_feature_' . $key)) : ?>
                                                                                            <li>
                                                                                                <i class="fa fa-check-circle"></i> <?php echo $feature; ?>
                                                                                            </li>
                                                        <?php elseif ($show_no_feature) : ?>
                                                                                            <li>
                                                                                                <i class="fa fa-times-circle"></i> <?php echo $feature; ?>
                                                                                            </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php
                                                additional_feature($property_id);
                                                ?>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
    </article> <!-- /#post- -->
    <div class="modal" id="share_feedback">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Share Feedback</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form-group <?php echo $class_register_wrap = uniqid('class-register-wrap-'); ?>" method="post" action="javascript:void(0)"  id="frmfeedback" required>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label>Are the details of the listing correct?</label>
                                <select class="form-control" id="feedback_select" name="feedback_select">
                                    <option value="">Select</option>
                                    <option name="yes" value="yes">Yes</option>
                                    <option name="no" value="no">No</option>
                                    <option name="not_reachable" value="not_reachable">Not Reachable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row yes_feedback" style="display: none;" >
                            <div class="col-sm-12">
                                <label><b>That's Good!</b> How about sharing your experience with us.</label>
                                <textarea cols="6" rows="3" name="feedback_desc" class="form-control" placeholder="Share Your experience"></textarea>
                            </div>
                        </div>

                        <div class="form-group row no_feedback" style="display: none;" >
                            <div class="col-sm-12">
                                <label><b>Ohh!!</b> What wasn't correct in the listing?</label>
                                <ul class="no_listfeed" name="feedback">
                                    <li><label><input type="checkbox" name="feedback_issues[]" value="Property Sold/Rented Out"> Property Sold/Rented Out</label></li>
                                    <li><label><input type="checkbox" name="feedback_issues[]" value="Fake/Incorrect Photos"> Fake/Incorrect Photos</label></li>
                                    <li><label><input type="checkbox" name="feedback_issues[]" value=" Incorrect Location/Address"> Incorrect Location/Address</label></li>
                                    <li><label><input type="checkbox" name="feedback_issues[]" value="Broker property as Owner"> Broker property as Owner</label></li>
                                    <li><label><input type="checkbox" name="feedback_issues[]" value=" Others* (Floor,Amenities,Furnished" > Others* (Floor,Amenities,Furnished</label></li>
                                    <li><label><input type="checkbox" name="feedback_issues[]" value="Incorrect Price"> Incorrect Price</label></li>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="prop_id" value="<?php echo get_the_ID(); ?>" required>
                        <input type="hidden" class="form-control" name="prop_name" value="<?php echo get_the_title(); ?>" required>
                        <div class="form-group row no_feedback" style="display: none;" >
                            <div class="col-sm-12">
                                <label>Share Experience</label>
                                <textarea cols="6" rows="3" class="form-control" name="issues_desc" placeholder="Share Your experience"></textarea>
                            </div>
                        </div>

                        <div class="form-group row nr_feedback" style="display: none;" >
                            <div class="col-sm-12">
                                <label><b>Uh_Oh!</b> What was wrong?</label>
                                <ul class="no_listfeed" >
                                    <li><label><input type="checkbox" name="nr_feedback[]" value="Wrong or Invalid Number"> Wrong or Invalid Number</label></li>
                                    <li><label><input type="checkbox" name="nr_feedback[]" value="Switched off / Not Reachable"> Switched off / Not Reachable</label></li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row nr_feedback" style="display: none;" >
                            <div class="col-sm-12">
                                <label>Share Experience</label>
                                <textarea cols="6" rows="3" name="nr_desc" class="form-control" placeholder="Share Your experience"></textarea>
                            </div>
                        </div>

                        <div class="form-action row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-fed-submit" class="get_feed" id="get_feed">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    rp_addons_nearby_places_yelp_nearby($property_id);
    rp_addons_nearby_places_walkscore($property_id);
    ?>
    <?php re_property_contact_agent() ?>
    <?php re_similar_property(); ?>
    <?php
endwhile;
