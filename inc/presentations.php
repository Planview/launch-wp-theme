<?php 
/**
 * Extras for the resources
 */

/**
 * Reload the form for questions
 */
function launch_form_reload_script() {
	global $post;
	if ( ! is_single() || $post->post_type !== 'presentations' )
		return; ?>
<script>
	jQuery(document).ready(function ($) {
		$(document).on('gform_confirmation_loaded', function () {
			var ajaxData = {
				url: '<?php echo esc_js( admin_url('admin-ajax.php')); ?>',
				data: {
					'action': 'launch_get_gravity_form',
					'id': '<?php echo esc_js( get_the_id() ); ?>',
					'form_id': '<?php $form = get_field('pv_event_presentation_qa_form', get_the_id()); echo $form->id; ?>'
				},
				method: 'post',
				success: function (data, dataType, status) {
					$('.presentation-question-inner').html(data);
				}
			}
			console.log("Fire 1");
			$.ajax(ajaxData);
		})
	});
</script>
<?php }
add_action( 'wp_footer', 'launch_form_reload_script', 100 );

/**
 * The function that returns the form
 */
function launch_get_gravity_form() {
	if ( ! isset( $_POST['id'] ) ) return;

	$id = intval( $_POST['id'] );
	$form_id = intval( $_POST['form_id'] );
	if ( $launch_question_form = get_field( 'pv_event_presentation_qa_form', $id ) && class_exists( 'RGForms' ) ) {
		echo RGForms::get_form( $form_id, false, false, true, null, true, 1 );
	}
	die();
}
add_action( 'wp_ajax_launch_get_gravity_form', 'launch_get_gravity_form' );