<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Wizard Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-magic"></i>Form Wizard<br><small>Break easily your forms into steps!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Forms</li>
        <li><a href="">Wizard</a></li>
    </ul>
    <!-- END Wizard Header -->

    <!-- Wizards Row -->
    <div class="row">
        <div class="col-md-6">
            <!-- Basic Wizard Block -->
            <div class="block">
                <!-- Basic Wizard Title -->
                <div class="block-title">
                    <h2><strong>Basic</strong> Wizard</h2>
                </div>
                <!-- END Basic Wizard Title -->

                <!-- Basic Wizard Content -->
                <form id="basic-wizard" action="page_forms_wizard.php" method="post" class="form-horizontal form-bordered">
                    <!-- First Step -->
                    <div id="first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-4 active">
                                    <span>1. Account</span>
                                </div>
                                <div class="col-xs-4">
                                    <span>2. Personal</span>
                                </div>
                                <div class="col-xs-4">
                                    <span>3. Extras</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-username">Username</label>
                            <div class="col-md-6">
                                <input type="text" id="example-username" name="example-username" class="form-control" placeholder="Your username..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-email">Email</label>
                            <div class="col-md-6">
                                <input type="text" id="example-email" name="example-email" class="form-control" placeholder="test@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-password">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="example-password" name="example-password" class="form-control" placeholder="Choose a crazy one..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-password2">Retype Password</label>
                            <div class="col-md-6">
                                <input type="password" id="example-password2" name="example-password2" class="form-control" placeholder="..and confirm it!">
                            </div>
                        </div>
                    </div>
                    <!-- END First Step -->

                    <!-- Second Step -->
                    <div id="second" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-4 done">
                                    <span><i class="fa fa-check"></i></span>
                                </div>
                                <div class="col-xs-4 active">
                                    <span>2. Personal</span>
                                </div>
                                <div class="col-xs-4">
                                    <span>3. Extras</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-firstname">Firstname</label>
                            <div class="col-md-6">
                                <input type="text" id="example-firstname" name="example-firstname" class="form-control" placeholder="John..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-lastname">Lastname</label>
                            <div class="col-md-6">
                                <input type="text" id="example-lastname" name="example-lastname" class="form-control" placeholder="Doe..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-address">Address</label>
                            <div class="col-md-6">
                                <input type="text" id="example-address" name="example-address" class="form-control" placeholder="Where do you live?">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-city">City</label>
                            <div class="col-md-6">
                                <input type="text" id="example-city" name="example-city" class="form-control" placeholder="Which one?">
                            </div>
                        </div>
                    </div>
                    <!-- END Second Step -->

                    <!-- Third Step -->
                    <div id="third" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-4 done">
                                    <span><i class="fa fa-check"></i></span>
                                </div>
                                <div class="col-xs-4 done">
                                    <span><i class="fa fa-check"></i></span>
                                </div>
                                <div class="col-xs-4 active">
                                    <span>3. Extras</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-bio">Bio</label>
                            <div class="col-md-8">
                                <textarea id="example-bio" name="example-bio" rows="5" class="form-control" placeholder="Tell us your story.."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-newsletter">Newsletter</label>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label for="example-newsletter">
                                        <input type="checkbox" id="example-newsletter" name="example-newsletter"> Sign up
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                            <div class="col-md-6">
                                <label class="switch switch-primary" for="example-terms">
                                    <input type="checkbox" id="example-terms" name="example-terms" value="1">
                                    <span data-toggle="tooltip" title="I agree to the terms!"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- END Third Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="reset" class="btn btn-sm btn-warning" id="back" value="Back">
                            <input type="submit" class="btn btn-sm btn-primary" id="next" value="Next">
                        </div>
                    </div>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Basic Wizard Content -->
            </div>
            <!-- END Basic Wizard Block -->
        </div>
        <div class="col-md-6">
            <!-- Wizard with Validation Block -->
            <div class="block">
                <!-- Wizard with Validation Title -->
                <div class="block-title">
                    <h2><strong>Validation</strong> Wizard</h2>
                </div>
                <!-- END Wizard with Validation Title -->

                <!-- Wizard with Validation Content -->
                <form id="advanced-wizard" action="page_forms_wizard.php" method="post" class="form-horizontal form-bordered">
                    <!-- First Step -->
                    <div id="advanced-first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 active">
                                    <span>1. Account</span>
                                </div>
                                <div class="col-xs-6">
                                    <span>2. Info</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Username <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="val_username" class="form-control" placeholder="Your username.." required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_email" name="val_email" class="form-control" placeholder="test@example.com" required>
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_password">Password <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="password" id="val_password" name="val_password" class="form-control" placeholder="Choose a crazy one.." required>
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_confirm_password">Retype Password <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="password" id="val_confirm_password" name="val_confirm_password" class="form-control" placeholder="..and confirm it!" required>
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END First Step -->

                    <!-- Second Step -->
                    <div id="advanced-second" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 done">
                                    <span>1. Account</span>
                                </div>
                                <div class="col-xs-6 active">
                                    <span>2. Info</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-advanced-bio">Bio</label>
                            <div class="col-md-8">
                                <textarea id="example-advanced-bio" name="example-advanced-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-advanced-newsletter">Newsletter</label>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label for="example-advanced-newsletter">
                                        <input type="checkbox" id="example-advanced-newsletter" name="example-advanced-newsletter">  Sign up
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a> <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <label class="switch switch-primary" for="val_terms">
                                    <input type="checkbox" id="val_terms" name="val_terms" value="1">
                                    <span data-toggle="tooltip" title="I agree to the terms!"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- END Second Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="reset" class="btn btn-sm btn-warning" id="back2" value="Back">
                            <input type="submit" class="btn btn-sm btn-primary" id="next2" value="Next">
                        </div>
                    </div>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Wizard with Validation Content -->
            </div>
            <!-- END Wizard with Validation Block -->
        </div>
    </div>
    <!-- END Wizards Row -->

    <!-- Terms Modal -->
    <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><i class="gi gi-pen"></i> Service Terms</h3>
                </div>
                <div class="modal-body">
                    <h4 class="sub-header">1.1 | General</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4 class="sub-header">1.2 | Account</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4 class="sub-header">1.3 | Service</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4 class="sub-header">1.4 | Payments</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Ok, I've read them!</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsWizard.js"></script>
<script>$(function(){ FormsWizard.init(); });</script>

<?php include 'inc/template_end.php'; ?>