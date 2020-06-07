

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
                    <form name="quiz_form" action="<?php echo base_url('user/quiz/'.$question_no); ?>" method="post">
                        <div class="body">

                            <!-- BEGIN -->
                            <div class="col-md-8 col-md-offset-2">
                                <?php if ($user) { ?>
                                <h1 style="margin-bottom: 40px;"><img src="<?php echo base_url('inc/img/user/'.$user->picture)?>" width="80px"> <?php echo $user->surname.' '.$user->firstname ?> <small>(Dept: <?php echo $department ?>)</small></h1>
                                <hr />
                            <?php } ?>
                                <!-- Question and answer -->
                            <?php if(isset($question_list) && isset($question_list[$question_no])): 
                                    $question = $question_list[$question_no];
                                    $answered = false;
                                    $correct = false;
                                    $disabled = '';
                                    $remark['A'] = '';
                                    $remark['B'] = '';
                                    $remark['C'] = '';
                                    $remark['D'] = '';
                                    if(isset($user_answer[$question->id]) ){
                                        $answered = true;
                                        $disabled = 'disabled';
                                        if($question->answer == $user_answer[$question->id]->answer){//if the answer was correct
                                            $correct = true;
                                            $remark[$question->answer] ='<i class="fa fa-check text-success"></i>';
                                        }else{
                                            $remark[$user_answer[$question->id]->answer] ='<i class="fa fa-times text-danger"></i>';                                      
                                            $remark[$question->answer] ='<i class="fa fa-check text-success"></i>';
                                        }                                   
                                    } 
                                  ?>
                                <div>
                                    <p>
                                        <h2 style="margin-bottom: 40px;"> <?php echo (isset($question_no)?$question_no:'0')?> of <?php echo (isset($question_list)?count($question_list):'0')?> MTN Quiz Questions</h2>
                                    </p>
                                </div>
                                <!-- to show error -->
                                <?php if(isset($error_msg)){ ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $error_msg; ?>
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php } ?>
                                <!-- to show error -->
                                <?php if($answered){
                                        if($correct){?>
                                            <!-- <div class="alert alert-success alert-dismissable">
                                                <i class="fa fa-check"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Answer: <?php echo $question->answer; ?> </strong> - <?php echo $question->answer_description; ?>
                                            </div> -->
                                    <?php }else{ ?>
                                            <!-- <div class="alert alert-danger alert-dismissable">
                                                <i class="fa fa-times"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Answer: <?php echo $question->answer; ?> </strong> - <?php echo $question->answer_description; ?>
                                            </div> -->
                                    <?php } ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="answer-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Answer review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <?php if($correct){?>
                                                <div class="alert alert-success alert-dismissable">
                                                    <i class="fa fa-check"></i>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Answer: <?php echo $question->answer; ?> </strong> - <?php echo $question->answer_description; ?>
                                                </div>
                                            <?php }else{ ?>
                                                    <div class="alert alert-danger alert-dismissable">
                                                        <i class="fa fa-times"></i>
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <strong>Answer: <?php echo $question->answer; ?> </strong> - <?php echo $question->answer_description; ?>
                                                    </div>
                                            <?php } ?>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div><!-- Modal End -->
                                <?php } ?>
                                <div>
                                    <h3><?php echo $question->question; ?></h3>
                                    <p>
                                        <label for="option_A"><input type="radio" value="A" name="answer" <?php echo $disabled ?>> A. <?php echo $question->option_A; ?> <?php echo $remark['A']; ?></label>
                                    </p>
                                    <p>
                                        <label for="option_A"><input type="radio" value="B" name="answer" <?php echo $disabled ?>> B. <?php echo $question->option_B; ?> <?php echo $remark['B']; ?></label>
                                    </p>
                                    <p>
                                        <label for="option_A"><input type="radio" value="C" name="answer" <?php echo $disabled ?>> C. <?php echo $question->option_C; ?> <?php echo $remark['C']; ?></label>
                                    </p>
                                    <p>
                                        <label for="option_A"><input type="radio" value="D" name="answer" <?php echo $disabled ?>> D. <?php echo $question->option_D; ?> <?php echo $remark['D']; ?></label>
                                    </p>
                                </div>
                                <?php if($answered){ ?>
                                <div style="margin-top: 30px;">
                                    <a href="<?php echo base_url('user/quiz/'.($question_no+1)) ?>" class="btn btn-primary btn-lg pull-right">Next <i class='fa fa-arrow-right'></i></a>
                                </div>
                                <?php }else{ ?>
                                <input type="hidden" name="question_id" value="<?php echo $question->id ?>">
                                <div style="margin-top: 30px;">
                                    <input type="submit" class="btn btn-primary btn-lg pull-right" name="Answer" value="Answer">
                                </div>
                                <?php } ?>
                            <?php else: ?>

                                    <!-- Question and answer -->
                                <?php if(isset($question_list) && $question_list):
                                    echo "<h3>SUMMARY: You answered ".(isset($user->score)?$user->score:'0')." correctly out of ".(isset($question_list)?count($question_list):'0')." Questions asked.</h3>";
                                    echo "<h3>Your Percentage Performance is ".(isset($user->percentage_score)?$user->percentage_score:'0')."%</h3>";
                                    echo "<h2 class='text-center'><u>Question Review</u></h2>";
                                    $counter = 0;
                                    foreach ($question_list as $question):
                                        $counter++;
                                        $answered = false;
                                        $correct = false;
                                        $disabled = '';
                                        $remark['A'] = '';
                                        $remark['B'] = '';
                                        $remark['C'] = '';
                                        $remark['D'] = '';
                                        if(isset($user_answer[$question->id]) ){
                                            $answered = true;
                                            $disabled = 'disabled';
                                            if($question->answer == $user_answer[$question->id]->answer){//if the answer was correct
                                                $correct = true;
                                                $remark[$question->answer] ='<i class="fa fa-check text-success"></i>';
                                            }else{
                                                $remark[$user_answer[$question->id]->answer] ='<i class="fa fa-times text-danger"></i>';                                      
                                                $remark[$question->answer] ='<i class="fa fa-check text-success"></i>';
                                            }                                   
                                        } 
                                      ?>
                                    <div>
                                        <p>
                                            <h2 style="margin-bottom: 40px;"> No. <?php echo $counter ?></h2>
                                        </p>
                                    </div>
                                    <!-- to show error -->
                                    <?php if(isset($error_msg)){ ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo validation_errors(); ?>
                                    </div>
                                    <?php } ?>
                                    <!-- to show error -->
                                    <?php if($answered){ 
                                            if($correct){?>
                                                <div class="alert alert-success alert-dismissable">
                                                    <i class="fa fa-check"></i>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Answer: <?php echo $question->answer; ?> </strong> - <?php echo $question->answer_description; ?>
                                                </div>
                                        <?php }else{ ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <i class="fa fa-times"></i>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Answer: <?php echo $question->answer; ?> </strong> - <?php echo $question->answer_description; ?>
                                                </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <div>
                                        <h3><?php echo $question->question; ?></h3>
                                        <p>
                                            <label for="option_A">A. <?php echo $question->option_A; ?> <?php echo $remark['A']; ?></label>
                                        </p>
                                        <p>
                                            <label for="option_A">B. <?php echo $question->option_B; ?> <?php echo $remark['B']; ?></label>
                                        </p>
                                        <p>
                                            <label for="option_A">C. <?php echo $question->option_C; ?> <?php echo $remark['C']; ?></label>
                                        </p>
                                        <p>
                                            <label for="option_A">D. <?php echo $question->option_D; ?> <?php echo $remark['D']; ?></label>
                                        </p>
                                    </div>
                                <?php endforeach;//end of summary question loop ?>
                                    <div style="margin-bottom: 100px;"><a href="<?php echo base_url('user') ?>" class="btn btn-primary btn-lg pull-right">Done</a></div>
                                <?php else: ?>
                                    <h3>No questions was found for this user.</h3>
                                <?php endif; ?>
                            <?php endif;//end of if for summary page ?>
                            </div>
                            <!-- END -->
                        </div>
                    </form>
					<div>&nbsp;</div>


                </section><!-- /.content -->
            </aside><!-- /.right-side driftUscpanel!@#-->
        