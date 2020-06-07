

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

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo $user->percentage_score;	?>%
                                    </h3>
                                    <p>
                                        Quiz performance
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="<?php echo base_url('user/quiz') ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $total_question;	?>
                                    </h3>
                                    <p>
                                        Question(s) for <?php echo $department;   ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-question"></i>
                                </div>
                                <a href="<?php echo base_url('user/quiz') ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->