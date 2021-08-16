    <!-- PAGE LEVEL STYLES -->
    
 <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />


    <!-- END PAGE LEVEL  STYLES -->
     <!--PAGE CONTENT --> 
    <div id="content">
                <div class="inner">
               <div class="row">
               <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-8" align="center">

        <div>
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Normal Input Field</label>

                    <div class="col-lg-8">
                        <input type="text" id="text1" placeholder="Email" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">Password Field</label>

                    <div class="col-lg-8">
                        <input class="form-control" type="password" id="pass1"
                               data-original-title="Please use your secure password" data-placement="top"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-4">Read only input</label>

                    <div class="col-lg-8">
                        <input type="text" value="read only" readonly class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-4">Disabled input</label>

                    <div class="col-lg-8">
                        <input type="text" value="disabled" disabled="disabled" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">With Placeholder</label>

                    <div class="col-lg-8">
                        <input type="text" id="text2" placeholder="placeholder text" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-4">Input limiter</label>

                    <div class="col-lg-8">
                        <textarea id="limiter" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text4" class="control-label col-lg-4">Default Textarea</label>

                    <div class="col-lg-8">
                        <textarea id="text4" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Textarea With Autosize</label>

                    <div class="col-lg-8">
                        <textarea id="autosize" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Tags</label>

                    <div class="col-lg-8">
                        <input name="tags" id="tags" value="foo,bar,baz" class="form-control" />
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-8">
                        <input type="submit" id="tags" value="Submit" class="btn btn-primary pull-right" />
                    </div>
                </div>
            </form>
    </div>
</div>
   
    </div>

           </div>
              </div>
                    <!-- END PAGE CONTENT -->