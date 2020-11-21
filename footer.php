<?php noo_get_layout('footer', 'widgetized'); ?>
<?php
$image_logo = noo_get_image_option('noo_bottom_bar_logo_image', '');
$noo_bottom_bar_content = noo_get_option('noo_bottom_bar_content', '');
?>
<?php if ($image_logo || $noo_bottom_bar_content) : ?>
    <footer class="colophon site-info" role="contentinfo">
        <div class="container-full">
            <?php if ($noo_bottom_bar_content != '' || $noo_bottom_bar_social) : ?>
                <div class="footer-more">
                    <div class="container-boxed max">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($noo_bottom_bar_content != '') : ?>
                                    <div class="noo-bottom-bar-content">
                                        <?php echo $noo_bottom_bar_content; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-1"><a href="#" class="go-to-top on"><i class="fa fa-angle-up"></i></a></div>
                            <div class="col-md-5 text-right">
                                <?php if ($image_logo) : ?>
                                    <?php
                                    echo '<img src="' . $image_logo . '" alt="' . get_bloginfo('name') . '">';
                                    ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div> <!-- /.container-boxed -->
    </footer> <!-- /.colophon.site-info -->
<?php endif; ?>
</div> <!-- /#top.site -->
<?php wp_footer(); ?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--<script src="//geodata.solutions/includes/countrystatecity.js"></script>-->


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
<!---- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --->
<script src="//geodata.solutions/includes/statecity.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    jQuery.validate({
        lang: 'en'
    });

    


    // Fir the code to start Send OTP
    jQuery(document).ready(function () {
        // --------------------------------------
        console.log("ready!");
        jQuery("#frmAddAuthor").on("submit", function (event) {

            if (jQuery('input[name="dfrat_id"]').val() != "" && jQuery('input[name="status"]').val() != "") {
                var strtwo = jQuery("#frmAddAuthor").serialize();

                jQuery.ajax({
                    type: "POST",
                    url: nooL10n.ajax_url,
                    data: strtwo,
                    success: function (data) {
                        var results = jQuery.parseJSON(data);
                        console.log(results);

                        if (results.status === 'success') {
                            jQuery(document).find('.register_message_area').removeClass('error').addClass('success').html(results.msg);
                            if (results.link !== "") {
                                window.location.href = results.link;
                            }
                        } else {
                            jQuery(document).find('.register_message_area').removeClass('success').addClass('error').html(results.msg);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }

                });
                return false;
            }
            else {
                event.preventDefault();
                var user_mobile = jQuery('.r_mobile').val();
                var username = jQuery('input[name="user_login"]').val();
                var str = jQuery("#frmAddAuthor").serialize();

                jQuery.ajax({
                    type: "POST",
                    url: nooL10n.ajax_url,
                    data: str,
                    success: function (data) {
                        var result = jQuery.parseJSON(data);
                        console.log(result);
                        if (result.status) {
                            jQuery('input[name="otp_number"]').css('display', 'block');
                            jQuery('input[name="dfrat_id"]').val(result.dfrat_id);
                            jQuery('input[name="status"]').val(result.status);
                            jQuery('input[name="action"]').val('webmingo_register_user');
                        } else {
                            alert('Error,Please refill all deatils.');
                            jQuery('input[name="action"]').val('mobileotppostajax');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }

                });
                return false;
            }
        });
        /*-------- Price Min - Max Changes Disable/ Enabled ------*/
        jQuery(document).on('change','.gprice_min', function(){
                var min = jQuery(this).children("option:selected").val();
                jQuery('.gprice_max option').removeAttr("disabled");
                console.log(parseInt(min)+ ' selected !!');
                jQuery.each(jQuery(".gprice_max option"), function(){            
                    if(parseInt(jQuery(this).val()) < parseInt(min)){
                            jQuery(this).attr('disabled','true');
                          }
                 });
        });
        /*------------ Choose category -------------*/
        jQuery('#category').change(function () {
             var category1 = jQuery('#category').val();
                 if (category1 == "Sale") {
                    console.log('Sale');
                jQuery('.subcat1').hide();
                jQuery('#sub_category').show();
               }
                else if (category1 == 'Rent') {
                console.log('Rent');
                jQuery('.subcat1').hide();
                jQuery('#sub_category_rent').show();
                  }
                  else if (category1 == 'Projects') {
                console.log('Projects');
                jQuery('.subcat1').hide();
                jQuery('#sub_category_projects').show();
                  }
         });
        /*------------ Choose category -------------*/
      //Code for Setup for Sale
    

/*-------------------------ON SUB CAT CNAGED 1----------------------------*/

        jQuery('#sub_category').change(function () {

            console.log('sub_category changed');

            var sdata = jQuery(this).children("option:selected").val();
            var category = jQuery('#category').children("option:selected").val();

            if (category == "") {
                alert('Please Select Property Type');
                return false;
            }
            console.log(category);
            if (sdata == 'Residential' && category == 'sale') {
                console.log('sale + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_sale').show();
            } 

            else if (sdata == 'Residential' && category == 'Sale') {
                console.log('sale + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_sale').show();
            }

             else if (sdata == 'Residential' && category == 'rent') {
                console.log('rent + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_rent').show();
            } 

            else if (sdata == 'Residential' && category == 'Rent') {
                console.log('rent + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_rent').show();
            } 

            else if (sdata == 'Commercial' && category == 'sale') {
                console.log('sale + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_sale').show();
            }

             else if (sdata == 'Commercial' && category == 'Sale') {
                console.log('sale + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_sale').show();
            } 

            else if (sdata == 'Commercial' && category == 'rent') {
                console.log('rent + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_rent').show();
            }

             else if (sdata == 'Commercial' && category == 'Rent') {
                console.log('rent + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_rent').show();
            }
        });

        

/*-------------------------ON SUB CAT CNAGED 1----------------------------*/
        /*-------------------------ON SUB CAT CNAGED 2----------------------------*/

        jQuery('#sub_category_rent').change(function () {

            console.log('sub_category changed');

            var sdata = jQuery(this).children("option:selected").val();
            var category = jQuery('#category').children("option:selected").val();

            if (category == "") {
                alert('Please Select Property Type');
                return false;
            }
            console.log(category);
            if (sdata == 'Residential' && category == 'sale') {
                console.log('sale + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_sale').show();
            } 

            else if (sdata == 'Residential' && category == 'Sale') {
                console.log('sale + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_sale').show();
            }

             else if (sdata == 'Residential' && category == 'rent') {
                console.log('rent + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_rent').show();
            } 

            else if (sdata == 'Residential' && category == 'Rent') {
                console.log('rent + residential');
                jQuery('.subcat').hide();
                jQuery('#residential_category_rent').show();
            } 

            else if (sdata == 'Commercial' && category == 'sale') {
                console.log('sale + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_sale').show();
            }

             else if (sdata == 'Commercial' && category == 'Sale') {
                console.log('sale + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_sale').show();
            } 

            else if (sdata == 'Commercial' && category == 'rent') {
                console.log('rent + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_rent').show();
            }

             else if (sdata == 'Commercial' && category == 'Rent') {
                console.log('rent + Commercial');
                jQuery('.subcat').hide();
                jQuery('#commercial_category_rent').show();
            }

        });


        /*-------------------------ON SUB CAT CNAGED ----------------------------*/


        /** For responsive **/
        /*-------- Price Min - Max Changes Disable/ Enabled ------*/
        jQuery(document).on('change','.gprice_min', function(){
                var min = jQuery(this).children("option:selected").val();
                jQuery('.gprice_max option').removeAttr("disabled");
                console.log(parseInt(min)+ ' selected !!');
                jQuery.each(jQuery(".gprice_max option"), function(){            
                    if(parseInt(jQuery(this).val()) < parseInt(min)){
                            jQuery(this).attr('disabled','true');
                          }
                 });
        });
        /*------------ Choose category -------------*/
        jQuery('#category1').change(function () {
             var category1 = jQuery('#category1').val();
                 if (category1 == "Sale") {
                    console.log('Sale');
                jQuery('.subcat11').hide();
                jQuery('#sub_category1').show();
               }
                else if (category1 == 'Rent') {
                console.log('Rent');
                jQuery('.subcat11').hide();
                jQuery('#sub_category_rent1').show();
                  }
         });
        /*------------ Choose category -------------*/


/*-------------------------ON SUB CAT CNAGED 1----------------------------*/

        jQuery('#sub_category1').change(function () {

            console.log('sub_category changed');

            var sdata = jQuery(this).children("option:selected").val();
            var category = jQuery('#category1').children("option:selected").val();

            if (category == "") {
                alert('Please Select Property Type');
                return false;
            }
            console.log(category);
            if (sdata == 'Residential' && category == 'sale') {
                console.log('sale + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_sale1').show();
            } 

            else if (sdata == 'Residential' && category == 'Sale') {
                console.log('sale + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_sale1').show();
            }

             else if (sdata == 'Residential' && category == 'rent') {
                console.log('rent + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_rent1').show();
            } 

            else if (sdata == 'Residential' && category == 'Rent') {
                console.log('rent + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_rent1').show();
            } 

            else if (sdata == 'Commercial' && category == 'sale') {
                console.log('sale + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_sale1').show();
            }

             else if (sdata == 'Commercial' && category == 'Sale') {
                console.log('sale + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_sale1').show();
            } 

            else if (sdata == 'Commercial' && category == 'rent') {
                console.log('rent + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_rent1').show();
            }

             else if (sdata == 'Commercial' && category == 'Rent') {
                console.log('rent + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_rent1').show();
            }

        });

/*-------------------------ON SUB CAT CNAGED 1----------------------------*/
        /*-------------------------ON SUB CAT CNAGED 2----------------------------*/

        jQuery('#sub_category_rent1').change(function () {

            console.log('sub_category changed');

            var sdata = jQuery(this).children("option:selected").val();
            var category = jQuery('#category1').children("option:selected").val();

            if (category == "") {
                alert('Please Select Property Type');
                return false;
            }
            console.log(category);
            if (sdata == 'Residential' && category == 'sale') {
                console.log('sale + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_sale1').show();
            } 

            else if (sdata == 'Residential' && category == 'Sale') {
                console.log('sale + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_sale1').show();
            }

             else if (sdata == 'Residential' && category == 'rent') {
                console.log('rent + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_rent1').show();
            } 

            else if (sdata == 'Residential' && category == 'Rent') {
                console.log('rent + residential');
                jQuery('.subcat1').hide();
                jQuery('#residential_category_rent1').show();
            } 

            else if (sdata == 'Commercial' && category == 'sale') {
                console.log('sale + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_sale1').show();
            }

             else if (sdata == 'Commercial' && category == 'Sale') {
                console.log('sale + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_sale1').show();
            } 

            else if (sdata == 'Commercial' && category == 'rent') {
                console.log('rent + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_rent1').show();
            }

             else if (sdata == 'Commercial' && category == 'Rent') {
                console.log('rent + Commercial');
                jQuery('.subcat1').hide();
                jQuery('#commercial_category_rent1').show();
            }

        });

        /*-------------------------ON SUB CAT CNAGED ----------------------------*/

        /*---------   ----fisrt send otp--------------------------------------------*/
        jQuery(document).on('click', '#property_submit_front_web_final', function (e) {
            e.preventDefault();
            if (jQuery('#setaction').val() == 'webmingopostsmsotp') {
                event.preventDefault();
                //var strtwo = jQuery("#free_propertise_post").serialize();
                var form = $('#free_propertise_post')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                jQuery.ajax({
                    type: "POST",
                    url: nooL10n.ajax_url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        var results = jQuery.parseJSON(data);
                        console.log(results);
                        if (results.status === 'success') {
                            jQuery('.otp_set').show();
                            jQuery('#setaction').val('webmingoaddproperty');
                            jQuery('#mobiile_ver_id').val(results.mobiile_ver_id);
                            jQuery(document).find('.register_message_area').removeClass('error').addClass('success').html(results.msg);
                            //alert(results.msg);
                        } else {
                            //alert(results.msg);
                            jQuery(document).find('.register_message_area').removeClass('success').addClass('error').html(results.msg);
                            //window.location.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            } else if (jQuery('#setaction').val() == 'webmingoaddproperty') {
                var form = $('#free_propertise_post')[0]; // You need to use standard javascript object here
                var formData_step_two = new FormData(form);
                jQuery.ajax({
                    type: "POST",
                    url: nooL10n.ajax_url,
                    data: formData_step_two,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        var results = jQuery.parseJSON(data);
                        if (results.status === 'success') {
                            jQuery(document).find('.register_message_area').removeClass('error').addClass('success').html(results.msg);
                        } else {
                            jQuery(document).find('.register_message_area').removeClass('error').addClass('success').html(results.msg);
                            jQuery('#setaction').val('webmingopostsmsotp');
                            //window.location.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            }
            return false;
        })
    });
    /*------------------------------------------------------------------------------------------**/
    jQuery(document).ready(function () {
       /* jQuery(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });*/
        jQuery('.search-button').on('click', function () {
            jQuery('.searchbar').toggleClass('hide');
        });

    });
    //------------Set Enquiry Form----------------------------------*/
    jQuery(document).ready(function () {
        jQuery(document).on("click", ".button_getno", function (event) {
           // event.preventDefault();

            if (jQuery('#namebox').val() == '') {
                alert('Please Input Name!!');
                return false;

            } else if (jQuery('#numberbox').val() == '') {
                alert('Please Input Valid Mobile No.!!');
                return false;
            }

            var postdata = jQuery("#frmRequest").serialize();
            jQuery.post(nooL10n.ajax_url, postdata, function (response) {
                var data = jQuery.parseJSON(response);
                    console.log(data);
                       jQuery('.owner_no_display').html('').append(data.show_owner_no_val);
                       jQuery('.owner_name_display').html('').append(data.show_owner_name_val);
                       jQuery('input.close').click();
                    if (data.status == 'success') {
                    console.log(data.show_otp);
                    jQuery('#param').val('save_request');
                    // if ((data.show_otp == 1) && (data.show_owner_no == 1)) {

                    //    // jQuery('#show_otp').show();
                    //       jQuery('#param').val('save_request');
                    //     //jQuery('#param').val('show_number_check');
                    //    // alert('An OTP Sent to your Mobile No. Please use this for get owner contact details !!, Thanks You.');
                    // }
                    // if (data.show_otp == 0) {
                    //    // jQuery('#show_otp').hide();
                    //    // jQuery('#show_otp').val('');
                    //    // jQuery('#param').val('save_request');
                    //  }
                    if (data.show_owner_no == 1) {
                        jQuery('.owner_no_display').html('').append(data.show_owner_no_val);
                        jQuery('.owner_name_display').html('').append(data.show_owner_name_val);
                        jQuery('input.close').click();
                    }
                     if ((data.show_owner_no == 1) && (data.show_otp == 0) ) {
                        jQuery('.owner_no_display').html('').append(data.show_owner_no_val);
                        jQuery('.owner_name_display').html('').append(data.show_owner_name_val);
                        jQuery('input.close').click();
                    }
                }
            });
        });
    });

// =====================Share feedback js============================
    jQuery(document).ready(function () {
        jQuery(document).on("click", "#get_feed", function () {
            event.preventDefault();

            var postdata = "action=feedbacklibrary&param=save_feedback&" + jQuery("#frmfeedback").serialize();
            jQuery.post(nooL10n.ajax_url, postdata, function (response) {
                alert("Thank you for your valuable feedback");
                location.reload();

            });
        });
    });

    jQuery(".filter-cat").change(function(){
   if(jQuery(this).val()=="Setup-for-Sale")
   {    
       jQuery("#sub_category_setup_for_sale").show();
       jQuery("#sub_category").hide();
       jQuery("#sub_category_rent").hide();
       jQuery("#type-sub-listing").hide();
   }
    else
    {
        jQuery("#sub_category_setup_for_sale").hide();
    }
});

</script>
</body>
</html>
