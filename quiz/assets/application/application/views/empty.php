

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
					
					
					<?php 
						// echo '<pre>';print_r($output);echo '</pre>'; 
						if(isset($output->output))echo $output->output; 
					?>

                </section><!-- /.content -->
            </aside><!-- /.right-side driftUscpanel!@#-->
        