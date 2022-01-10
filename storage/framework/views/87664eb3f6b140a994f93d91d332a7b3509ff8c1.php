<div class="apply_job_form white-bg">

    <?php if($invitations ?? ''): ?>
        <?php if($invitations->STATUS == 'accepted'): ?>
            <h5>You have already <u>INVITED</u> this candidate for vacancy: </h5>
            - <a href="<?php echo e(route('show-vacancy', ['id' => $invitations->VACANCY_ID])); ?>">
                <?php echo e($invitations->VACANCY_NAME); ?>

            </a>
        <?php elseif($invitations->STATUS == 'rejected'): ?>
            <h5>You have <u>REFUSED</u> this candidate for vacancy: </h5>
            - <a href="<?php echo e(route('show-vacancy', ['id' => $invitations->VACANCY_ID])); ?>">
                <?php echo e($invitations->VACANCY_NAME); ?>

            </a>
        <?php elseif($invitations->STATUS == 'no_status'): ?>
            <h5>This candidate has <u>APPLIED</u> for the vacancy: </h5>
            - <a href="<?php echo e(route('show-vacancy', ['id' => $invitations->VACANCY_ID])); ?>">
                <?php echo e($invitations->VACANCY_NAME); ?>

            </a>
            <?php if($invitations->CANDIDATE_COVERING_LETTER): ?>
                <br/><br/>
                <h5>Candidate`s covering letter: </h5>
                <p><?php echo e($invitations->CANDIDATE_COVERING_LETTER); ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>

        <?php if($companyVacancies ?? ''): ?>
            <h4>Select a specific vacancy:</h4>
            <form action="<?php echo e(route('invite-to-interview')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="single_field input_field">
                            <select name="VACANCY_ID" class="wide">
                                <option selected disabled>Choose your vacancy</option>
                                <?php $__currentLoopData = $companyVacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vacancy->ID); ?>"><?php echo e($vacancy->NAME); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <input type="hidden" name="CANDIDATE_ID" value="<?php echo e($candidate->id); ?>">
                    <input type="hidden" name="CANDIDATE_NAME" value="<?php echo e($candidate->NAME); ?>">

                    <div class="col-md-12">
                        <div class="submit_btn">
                            <button class="boxed-btn3 w-100" type="submit">Invite candidate to interview</button>
                        </div>
                    </div>

                </div>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</div><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/forms/inviteCandidate.blade.php ENDPATH**/ ?>