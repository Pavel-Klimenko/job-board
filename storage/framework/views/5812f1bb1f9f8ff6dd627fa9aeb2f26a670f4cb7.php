<div class="apply_job_form white-bg">
    <?php if(isset($candidateInvitation) && $candidateInvitation->STATUS == 'no_status'): ?>
        <h4>
            <b>You have already applied for this vacancy!<br/>
                Wait for a response from the company.</b>
        </h4>
    <?php elseif(isset($candidateInvitation) && $candidateInvitation->STATUS == 'accepted'): ?>
        <h4>
            <b>Congrats! Company <u style="color: green">ACCEPTED</u> you interview request.
                Please contact with company HR.</b>
        </h4>
        <p>Email: <a href="mailto:<?php echo e($company->EMAIL); ?>"><?php echo e($company->EMAIL); ?></a></p>
        <p>Phone: <a href="tel:<?php echo e($company->PHONE); ?>"><?php echo e($company->PHONE); ?></a></p>
    <?php elseif(isset($candidateInvitation) && $candidateInvitation->STATUS == 'rejected'): ?>
        <h4>
            <b>Unfortunately company <u style="color: red">REJECTED</u> you interview request.
                Don`t worry. You should look other <a href="<?php echo e(route('browse-job')); ?>">vacancies.</a></b>
        </h4>
    <?php else: ?>
    <h4>Apply for the job</h4>
    <form action="<?php echo e(route('invite-to-interview')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <input type="hidden" name="COMPANY_ID" value="<?php echo e($company->id); ?>">
            <input type="hidden" name="VACANCY_ID" value="<?php echo e($vacancy->ID); ?>">
            <div class="col-md-12">
                <div class="input_field">
                    <textarea name="CANDIDATE_COVERING_LETTER" id="" cols="30" rows="10" placeholder="Coverletter"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="submit_btn">
                    <button class="boxed-btn3 w-100" type="submit">Apply this vacancy</button>
                </div>
            </div>
        </div>
    </form>

    <?php endif; ?>
</div><?php /**PATH /var/www/Laravel-projects/JobBoard/resources/views/forms/jobApply.blade.php ENDPATH**/ ?>