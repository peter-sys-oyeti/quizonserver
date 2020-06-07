

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
                    <form name="quiz_form" action="<?php echo base_url('admin/quiz_user'); ?>" method="post">
                        <div class="body">
                            <!-- BEGIN -->
                            <div class="col-md-6 col-md-offset-3">
                                <!-- Unanswered -->
                                <h3>Select Participant</h3>
                            <?php if(isset($user_list) && $user_list != false):

                                  ?>
                                <!-- to show error -->
                                <?php if(isset($error_msg)){ ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <select name="user_id"class="user_id form-control" id="user_id">
                                            <option value="" <?php echo  set_select('user_id', ''); ?> >-Select-</option>
                                            <?php foreach ($user_list as $user) { ?>
                                            <option value="<?php echo $user->id_user ?>" <?php echo  set_select('user_id', $user->id_user); ?> ><?php echo $user->surname.' '.$user->firstname ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div  class="col-sm-3">
                                        <input type="submit" name="choose" value="Choose" class="btn btn-primary btn-lg">
                                    </div>
                                    Click <a href="<?php echo base_url('admin/user/add') ?>">here</a> to register new participant.
                                </div>
                            <?php else: ?>
                                <h3>No Participant registered. Click <a href="<?php echo base_url('admin/user/add') ?>">here</a> to add.</h3>
                            <?php endif; ?>
                            </div>
                            <!-- END -->
                        </div>
                    </form>
					<div>&nbsp;</div>


                </section><!-- /.content -->
            </aside><!-- /.right-side driftUscpanel!@#-->
        