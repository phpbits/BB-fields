<?php


function zestsms_pdf_field( $name, $value, $field ) { ?>
<?php $pdf = FLBuilderPhoto::get_attachment_data($value); ?>
<div class="fl-pdf-field fl-builder-custom-field<?php if(empty($value) || !$pdf) echo ' fl-pdf-empty'; if(isset($field['class'])) echo ' ' . $field['class']; ?>">
	<a class="fl-pdf-select" href="javascript:void(0);" onclick="return false;"><?php _e('Select PDF', 'fl-builder'); ?></a>
	<div class="fl-pdf-preview">
		<?php if(!empty($value) && $pdf) : ?>
		<div class="fl-pdf-preview-img">
			<img src="<?php echo $pdf->icon; ?>" />
		</div>
		<span class="fl-pdf-preview-filename"><?php echo $pdf->filename; ?></span>
		<?php else : ?>
		<div class="fl-pdf-preview-img">
			<img src="<?php echo FL_BUILDER_URL; ?>img/spacer.png" />
		</div>
		<span class="fl-pdf-preview-filename"></span>
		<?php endif; ?>
		<br />
		<a class="fl-pdf-replace" href="javascript:void(0);" onclick="return false;"><?php _e('Replace PDF', 'fl-builder'); ?></a>
		<a class="fl-pdf-remove" href="javascript:void(0);" onclick="return false;"><?php _e('Remove PDF', 'fl-builder'); ?></a>
		<div class="fl-clear"></div>
	</div>
	<input name="<?php echo $name; ?>" type="hidden" value='<?php echo $value; ?>' />
</div>
<?php
}
add_action( 'fl_builder_control_zestsms-pdf', 'zestsms_pdf_field', 1, 3 );


function zestsms_pdf_field_assets() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
    		wp_enqueue_style( 'zestsms-pdf', ZESTSMS_FIELDS_URL . 'zestsms-pdf/css/zestsms-pdf.css', array(), '' );
        wp_enqueue_script( 'zestsms-pdf', ZESTSMS_FIELDS_URL . 'zestsms-pdf/js/zestsms-pdf.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'zestsms_pdf_field_assets' );
