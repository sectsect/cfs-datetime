<?php

class cfs_datetime_picker extends cfs_field
{

    function __construct() {
        $this->name = 'datetime_picker';
        $this->label = __( 'Date Time', 'cfs' );
    }


    function html( $field ) {
?>
	<input name="<?php echo $field->input_name; ?>" class=flatpickr<?php if($this->get_option($field, 'placeholder')): ?>
		placeholder="<?php echo $this->get_option($field, 'placeholder'); ?>"<?php endif; ?>
		<?php if($this->get_option($field, 'dateFormat')): ?> data-dateFormat="<?php echo $this->get_option($field, 'dateFormat'); ?>"<?php endif; ?>
		<?php if($this->get_option($field, 'mindate')): ?> data-mindate="<?php echo $this->get_option($field, 'mindate'); ?>"<?php endif; ?>
		<?php if($this->get_option($field, 'maxdate')): ?> data-maxdate="<?php echo $this->get_option($field, 'maxdate'); ?>""<?php endif; ?>
		<?php if($this->get_option($field, 'enabletime') == "true"): ?> data-enabletime=<?php echo $this->get_option($field, 'enabletime'); ?><?php endif; ?>
		<?php if($this->get_option($field, 'time_24hr') == "true"): ?> data-time_24hr=<?php echo $this->get_option($field, 'time_24hr'); ?><?php endif; ?>
		<?php if($this->get_option($field, 'timeFormat')): ?> data-timeFormat="<?php echo $this->get_option($field, 'timeFormat'); ?>"<?php endif; ?>
		<?php if($this->get_option($field, 'nocalendar') == "true"): ?> data-nocalendar=<?php echo $this->get_option($field, 'nocalendar'); ?><?php endif; ?>
		<?php if($this->get_option($field, 'altinput') == "true"): ?> data-altinput=<?php echo $this->get_option($field, 'altinput'); ?><?php endif; ?>
		<?php if($this->get_option($field, 'altFormat')): ?> data-altFormat="<?php echo $this->get_option($field, 'altFormat'); ?>"<?php endif; ?>
		<?php if($this->get_option($field, 'weeknumbers') == "true"): ?> data-weeknumbers=<?php echo $this->get_option($field, 'weeknumbers'); ?><?php endif; ?>
		<?php if($this->get_option($field, 'inline') == "true"): ?>  data-inline=<?php echo $this->get_option($field, 'inline'); ?><?php endif; ?>
		<?php if($this->get_option($field, 'hourIncrement')): ?> data-hourIncrement=<?php echo intval($this->get_option($field, 'hourIncrement')); ?><?php endif; ?>
		<?php if($this->get_option($field, 'minuteIncrement')): ?> data-minuteIncrement=<?php echo intval($this->get_option($field, 'minuteIncrement')); ?><?php endif; ?>
		 value="<?php echo $field->value; ?>">

<?php
    }

	function options_html( $key, $field ) {
?>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'placeholder', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][placeholder]",
					'value'            => ("" !== $this->get_option( $field, 'placeholder' )) ? $this->get_option( $field, 'placeholder' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-dateFormat', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][dateFormat]",
					'value'            => ("" !== $this->get_option( $field, 'dateFormat' )) ? $this->get_option( $field, 'dateFormat' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>Y-m-d</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-mindate', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][mindate]",
					'value'            => ("" !== $this->get_option( $field, 'mindate' )) ? $this->get_option( $field, 'mindate' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-maxdate', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][maxdate]",
					'value'            => ("" !== $this->get_option( $field, 'maxdate' )) ? $this->get_option( $field, 'maxdate' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-enabletime', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][enabletime]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option( $field, 'enabletime', 'true' ),
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-time_24hr', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][time_24hr]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option( $field, 'time_24hr', 'false' )
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-timeFormat', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][timeFormat]",
					'value'            => ("" !== $this->get_option( $field, 'timeFormat' )) ? $this->get_option( $field, 'timeFormat' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>H:i</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-nocalendar', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][nocalendar]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option( $field, 'nocalendar', 'false' )
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-altinput', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][altinput]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option( $field, 'altinput', 'false' )
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-altFormat', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][altFormat]",
					'value'            => ("" !== $this->get_option( $field, 'altFormat' )) ? $this->get_option( $field, 'altFormat' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>F j, Y</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-defaultDate', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][defaultDate]",
					'value'            => ("" !== $this->get_option( $field, 'defaultDate' )) ? $this->get_option( $field, 'defaultDate' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-weeknumbers', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][weeknumbers]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option( $field, 'weeknumbers', 'false' )
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-inline', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][inline]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option( $field, 'inline', 'false' )
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-hourIncrement', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][hourIncrement]",
					'value'            => ("" !== $this->get_option( $field, 'hourIncrement' )) ? $this->get_option( $field, 'hourIncrement' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>1</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'data-minuteIncrement', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][minuteIncrement]",
					'value'            => ("" !== $this->get_option( $field, 'minuteIncrement' )) ? $this->get_option( $field, 'minuteIncrement' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>5</code></p>
		</td>
	</tr>

	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e( 'l10n.firstDayOfWeek', 'cfs-datetime' ); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field( array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][l10nfirstDayOfWeek]",
					'value'            => ("" !== $this->get_option( $field, 'l10nfirstDayOfWeek' )) ? $this->get_option( $field, 'l10nfirstDayOfWeek' ) : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>0</code><br>Start the calendar on a different weekday (0 = Sunday, 1 = Monday, 2 = Tuesday, etc.)</p>
		</td>
	</tr>


<?php
    }

    function input_head( $field = null ) {
?>
		<link href="//cdnjs.cloudflare.com/ajax/libs/flatpickr/1.8.6/flatpickr.min.css" rel="stylesheet">
		<script src="//cdnjs.cloudflare.com/ajax/libs/flatpickr/1.8.6/flatpickr.min.js"></script>
		<script>
			jQuery(function(){
				<?php if($this->get_option($field, 'l10nfirstDayOfWeek') && $this->get_option($field, 'l10nfirstDayOfWeek') != 0): ?>
				flatpickr.init.prototype.l10n.firstDayOfWeek = <?php echo intval($this->get_option($field, 'l10nfirstDayOfWeek')); ?>;
				<?php endif; ?>
			    flatpickr('.flatpickr');
			});
		</script>
<?php
    }
}
