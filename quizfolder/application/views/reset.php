

            <!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $title; ?>
                        <small><?php echo $sub_title; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                         <li><a href="<?php echo base_url('') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $title; ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <form name="quiz_form" action="<?php echo base_url('admin/reset'); ?>" method="post">
                        <div class="body">
                            <!-- BEGIN -->
                            <div class="col-md-6 col-md-offset-3">
                                <!-- to show error -->
                                <?php if(isset($error_msg)){ ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php } ?>
                                <?php if(isset($success_msg)){ ?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $success_msg; ?>
                                </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <p>
                                        <strong>Are you sure you want to reset the system? This will reset participation record(s) for the quiz.</strong>
                                        <input type="hidden" name="answer" value="Yes">
                                    </p>
                                    <p>
                                        <a href="<?php echo base_url('admin') ?>" class="btn btn-default">Cancel</a> | <input type="submit" name="choose" value="Choose" class="btn btn-primary">
                                    </p>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                    </form>
					<div>&nbsp;</div>


                </section><!-- /.content -->
            </aside><!-- /.right-side driftUscpanel!@#-->
        