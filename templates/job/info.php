<?php if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! empty( $jb_job_info['job_id'] ) ) {

	$job_id = $jb_job_info['job_id']; ?>

	<div class="jb-job-info">
		<div class="jb-job-info-row jb-job-info-row-first">
			<div class="jb-job-posted">
				<i class="far fa-calendar-alt"></i>
				<p>Posted On:&nbsp; </p>
				<time datetime="<?php echo esc_attr( JB()->common()->job()->get_html_datetime( $job_id ) ) ?>">
					<?php echo JB()->common()->job()->get_posted_date( $job_id ) ?>
				</time>
			</div>

			<div class="jb-scholarship-amount">
				<i class="fa fa-usd"></i>
				<p>Scholarship Amount:&nbsp; </p>
					<?php echo JB()->common()->job()->get_amount( $job_id ) ?>
			</div>
			
		</div>

		<div class="jb-job-info-row jb-job-info-row-second">
			<div class="jb-job-types">
				<?php echo JB()->common()->job()->display_types( $job_id ); ?>
			</div>

			<div class="jb-job-categories">
				<strong>Categories:</strong> <?php echo JB()->common()->job()->display_categories( $job_id ); ?>
			</div>
		</div>

		
	</div>

<?php }