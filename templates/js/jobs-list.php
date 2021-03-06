<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<script type="text/template" id="tmpl-jb-jobs-list-line">
	<# if ( data.length > 0 ) { #>
		<# _.each( data, function( job, key, list ) { #>
			<div class="jb-job-list-row<?php if ( $jb_js_jobs_list['no-logo'] ) { ?> jb-job-list-no-logo<?php } else { ?><# if ( ! job.logo ) { #> jb-job-list-no-logo<# } #><?php } ?><# if ( job.actions.length > 0 ) { #> jb-job-list-with-actions<# } #>">
				<?php if ( ! $jb_js_jobs_list['no-logo'] ) { ?>
					<# if ( job.logo ) { #>
						<div class="jb-job-logo">
							{{{job.logo}}}
						</div>
					<# } #>
				<?php } ?>
				<div class="jb-row-data">
					<div class="jb-job-title">
						<span class="jb-job-title-link-line"><a href="{{{job.permalink}}}" class="jb-job-title-link">{{{job.title}}}</a></span>
						<?php if ( ! $jb_js_jobs_list['hide-job-types'] ) { ?>
							<# if ( job.types.length > 0 ) { #>
								<div class="jb-job-types jb-responsive jb-ui-m jb-ui-l jb-ui-xl">
									<# _.each( job.types, function( type, t_key, t_list ) { #>
										<div class="jb-job-type" style="color:{{{type.color}}};background:{{{type.bg_color}}};">
											{{{type.name}}}
										</div>
									<# }); #>
								</div>
							<# } #>
						<?php } ?>
					</div>
					<div class="jb-row-info">
						<div class="jb-row-left-side">
							<# if ( job.company.name ) { #>
								<div class="company">
									<i class="far fa-building"></i>
									<p>Company Name:&nbsp; </p>
									<span title="{{{job.company.tagline}}}">
										{{{job.company.name}}}
									</span>
								</div>
							<# } #>

							<# if ( job.amount ) { #>
								<div class="amount">
									<i class="fa fa-usd"></i>
									<p>Amount:&nbsp; </p>
									{{{job.amount}}}
								</div>
							<# } #>

							<div class="jb-responsive jb-ui-s jb-ui-xs date" title="<?php esc_attr_e( 'Posted', 'jobboardwp' ) ?>">
								<i class="far fa-calendar-alt"></i>
								<?php _e( 'Posted', 'jobboardwp' ) ?> {{{job.date}}}
							</div>

							<# if ( job.expires ) { #>
								<div class="expires" title="<?php esc_attr_e( 'Expires', 'jobboardwp' ) ?>">
<!--									<i class="far fa-calendar-alt"></i>-->
									<i class="fa fa-calendar-times-o"></i>
									<?php _e( 'Closing on', 'jobboardwp' ) ?> {{{job.expires}}}
								</div>
							<# } #>
						</div>
						<div class="jb-row-right-side">


							<div class="date jb-responsive jb-ui-m jb-ui-l jb-ui-xl date" title="<?php esc_attr_e( 'Posted', 'jobboardwp' ) ?>">
								{{{job.date}}}
							</div>

							<?php if ( ! $jb_js_jobs_list['hide-job-types'] ) { ?>
								<# if ( job.types.length > 0 ) { #>
									<div class="jb-job-types jb-responsive jb-ui-s jb-ui-xs">
										<# _.each( job.types, function( type, t_key, t_list ) { #>
											<div class="jb-job-type" style="color:{{{type.color}}};background:{{{type.bg_color}}};">
												{{{type.name}}}
											</div>
										<# }); #>
									</div>
								<# } #>
							<?php } ?>

						</div>
					</div>
				</div>
				<# if ( job.actions.length > 0 ) { #>
					<div class="jb-row-actions">
						<# _.each( job.actions, function( action, a_key, a_list ) { #>
							<# if ( action.html ) { #>
								{{{action.html}}}
							<# } else { #>
								<a href="{{{action.url}}}" class="{{{action.class}}}">
									<i class="{{{action.img}}}"></i>
								</a>
							<# } #>
						<# }); #>
					</div>
				<# } #>
			</div>
		<# }); #>
	<# } #>
</script>