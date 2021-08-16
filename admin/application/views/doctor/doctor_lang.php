           
       <select name="language[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
           <?php if(!empty($doc_lang)) { $all_dat = unserialize($doc_lang['language']);} ?>
												    <option <?php if(in_array('odia',$all_dat)) echo "selected"; ?> value="odia">Odia</option>
												     <option <?php if(in_array('hindi',$all_dat)) echo "selected"; ?>  value="hindi">Hindi</option>
												     <option <?php if(in_array('english',$all_dat)) echo "selected"; ?> value="english">English</option>
												</select>
         
											
											      <script src="https://themesbrand.com/skote/layouts/horizontal/assets/libs/select2/js/select2.min.js"></script>

        <!-- dropzone plugin -->
        <script src="https://themesbrand.com/skote/layouts/horizontal/assets/libs/dropzone/min/dropzone.min.js"></script>

        <!-- init js -->
        <script src="https://themesbrand.com/skote/layouts/horizontal/assets/js/pages/ecommerce-select2.init.js"></script>