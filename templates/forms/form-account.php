<?php
/**
 * The Template for displaying the account forms.
 *
 * This template can be overridden by copying it to yourtheme/wpum/forms/form-account.php
 *
 * HOWEVER, on occasion WPUM will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="wpum-template wpum-form wpum-account-form">

	<!-- Account page navigation -->
	<?php
		WPUM()->templates
			->set_template_data( $data )
			->get_template_part( 'account', 'tabs' );
	?>
	<!-- end account page navigation -->

	<div class="wpum-account-form-container wpum_two_third last">

		<?php do_action( 'wpum_before_account_form' ); ?>

		<form action="<?php echo esc_url( $data->action ); ?>" method="post" id="wpum-submit-account-form" enctype="multipart/form-data">

			<?php foreach ( $data->fields as $key => $field ) : ?>
				<fieldset class="fieldset-<?php echo esc_attr( $key ); ?>">

					<?php if( $field['type'] == 'checkbox' ) : ?>

						<label for="<?php echo esc_attr( $key ); ?>">
							<span class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
								<?php
									// Add the key to field.
									$field[ 'key' ] = $key;
									WPUM()->templates
										->set_template_data( $field )
										->get_template_part( 'form-fields/' . $field['type'], 'field' );
								?>
							</span>
							<?php echo esc_html( $field['label'] ); ?>
							<?php if( isset( $field['required'] ) && $field['required'] ) : ?>
								<span class="wpum-required">*</span>
							<?php endif; ?>
						</label>

					<?php else : ?>

						<label for="<?php echo esc_attr( $key ); ?>">
							<?php echo esc_html( $field['label'] ); ?>
							<?php if( isset( $field['required'] ) && $field['required'] ) : ?>
								<span class="wpum-required">*</span>
							<?php endif; ?>
						</label>
						<div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
							<?php
								// Add the key to field.
								$field[ 'key' ] = $key;
								WPUM()->templates
									->set_template_data( $field )
									->get_template_part( 'form-fields/' . $field['type'], 'field' );
							?>
						</div>

					<?php endif; ?>

				</fieldset>
			<?php endforeach; ?>

			<input type="hidden" name="wpum_form" value="<?php echo $data->form; ?>" />
			<input type="hidden" name="step" value="<?php echo esc_attr( $data->step ); ?>" />
			<input type="submit" name="submit_account" class="button" value="<?php esc_html_e( 'Update profile' ); ?>" />

			<?php do_action( 'wpum_after_account_form' ); ?>

		</form>

	</div>

	<div class="wpum_clearfix"></div>

</div>
