<?php
class cfs_datetime_picker extends cfs_field
{

    function __construct() {
        $this->name = 'datetime_picker';
		$this->label = __('DateTime (Advanced)', 'cfs-datetime');
    }

    function html($field) {
?>
	<script>
		jQuery(function(){
			flatpickr('.flatpickr', {
				locale: {
					firstDayOfWeek: <?php if ( $this->get_option( $field, 'l10nfirstDayOfWeek' ) ) { echo $this->get_option( $field, 'l10nfirstDayOfWeek' ); } else { echo '0'; } ?>,
				},
				dateFormat: '<?php if ( $this->get_option( $field, 'dateFormat' ) ) { echo $this->get_option( $field, 'dateFormat' ); } else { echo 'Y-m-d'; } ?>',
				minDate: <?php if ( $mindate ) { echo $min; } else { echo 'null'; } ?>,
				maxDate: <?php if ( $maxdate ) { echo $max; } else { echo 'null'; } ?>,
				enableTime: <?php echo $this->get_option( $field, 'enabletime' ); ?>,
				time_24hr: <?php echo $this->get_option( $field, 'time_24hr' ); ?>,
				timeFormat: '<?php if ( $this->get_option( $field, 'timeformat' ) ) { echo $this->get_option( $field, 'timeformat' ); } else { echo 'h:i A'; } ?>',
				nocalendar: <?php echo $this->get_option( $field, 'nocalendar' ); ?>,
				altinput: <?php echo $this->get_option( $field, 'altinput' ); ?>,
				altFormat: '<?php if ( $this->get_option( $field, 'altformat' ) ) { echo $this->get_option( $field, 'altformat' ); } else { echo 'F j, Y'; } ?>',
				defaultDate: <?php if ( $default ) { echo $default; } else { echo 'null'; } ?>,
				utc: <?php if ( $this->get_option( $field, 'utc' ) ) { echo $this->get_option( $field, 'utc' ); } else { echo 'false'; } ?>,
				weeknumbers: <?php if ( $this->get_option( $field, 'weeknumbers' ) ) { echo $this->get_option( $field, 'weeknumbers' ); } else { echo 'false'; } ?>,
				inline: <?php echo $this->get_option( $field, 'inline' ); ?>,
				allowInput: <?php echo $this->get_option( $field, 'allowInput' ); ?>,
				hourIncrement: <?php if ( $this->get_option( $field, 'hourIncrement' ) ) { echo $this->get_option( $field, 'hourIncrement' ); } else { echo '1'; } ?>,
				minuteIncrement: <?php if ( $this->get_option( $field, 'minuteIncrement' ) ) { echo $this->get_option( $field, 'minuteIncrement' ); } else { echo '5'; } ?>,
			});
		});
	</script>
		<div class="flatpickr" data-wrap="true">
			<input
				type="text"
				name="<?php echo $field->input_name; ?>"
				class="form-control"<?php if($this->get_option($field, 'placeholder')): ?>
				placeholder="<?php echo $this->get_option($field, 'placeholder'); ?>"<?php endif; ?>
				data-input
				data-open
				value="<?php echo $field->value; ?>"
			>
			<a class="input-btn" data-toggle>
				<?php if($this->get_option($field, 'nocalendar') != "true"): ?>
					<i class="lnr lnr-calendar-full"></i>
				<?php else: ?>
					<i class="lnr lnr-clock"></i>
				<?php endif; ?>
			</a>
			<a class="input-btn" data-clear>
				<i class="lnr lnr-cross"></i>
			</a>
		</div>
<?php
    }

	function options_html($key, $field) {
?>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('placeholder', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][placeholder]",
					'value'            => ("" !== $this->get_option($field, 'placeholder')) ? $this->get_option($field, 'placeholder') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-dateFormat', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][dateFormat]",
					'value'            => ("" !== $this->get_option($field, 'dateFormat')) ? $this->get_option($field, 'dateFormat') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>Y-m-d</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-mindate', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][mindate]",
					'value'            => ("" !== $this->get_option($field, 'mindate')) ? $this->get_option($field, 'mindate') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
			<h4>Example:</h4>
			<div>
				<code>today</code>, <code>+1 days</code>, <code>-1 days</code>, <code>+1 weeks</code>, <code>+1 months + 2 days</code>, <code>first day of this months</code>, <code>last day of this months</code>, <code>first day of next months</code>, <code>first day of last months</code>, <code>sunday</code>, <code>monday of this week</code>, <code>third sunday of this months</code>
			</div>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label>
				<?php _e('data-maxdate', 'cfs-datetime'); ?>
				<div class="cfs_tooltip">
                    <div class="tooltip_inner">In case of inputted to mindate field, This field is relative (time) to value of mindate field.</div>
                </div>
			</label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][maxdate]",
					'value'            => ("" !== $this->get_option($field, 'maxdate')) ? $this->get_option($field, 'maxdate') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
			<h4>Example:</h4>
			<div>
				<code>today</code>, <code>+1 days</code>, <code>-1 days</code>, <code>+1 weeks</code>, <code>+1 months + 2 days</code>, <code>first day of this months</code>, <code>last day of this months</code>, <code>first day of next months</code>, <code>first day of last months</code>, <code>sunday</code>, <code>monday of this week</code>, <code>third sunday of this months</code>
			</div>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-enabletime', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][enabletime]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'enabletime', 'true'),
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-time_24hr', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][time_24hr]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'time_24hr', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-timeFormat', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][timeFormat]",
					'value'            => ("" !== $this->get_option($field, 'timeFormat')) ? $this->get_option($field, 'timeFormat') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>h:i A</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-nocalendar', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][nocalendar]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'nocalendar', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-altinput', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][altinput]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'altinput', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-altFormat', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][altFormat]",
					'value'            => ("" !== $this->get_option($field, 'altFormat')) ? $this->get_option($field, 'altFormat') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>F j, Y</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-defaultDate', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][defaultDate]",
					'value'            => ("" !== $this->get_option($field, 'defaultDate')) ? $this->get_option($field, 'defaultDate') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>null</code></p>
			<h4>Example:</h4>
			<div>
				<code>current</code>, <code>today</code>, <code>+1 days</code>, <code>-1 days</code>, <code>+1 weeks</code>, <code>+1 months + 2 days + 3 hours</code>, <code>noon</code> <code>first day of this months</code>, <code>last day of this months</code>, <code>first day of next months</code>, <code>first day of last months</code>, <code>sunday</code>, <code>monday of this week</code>, <code>third sunday of this months</code>
			</div>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-utc', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][utc]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'utc', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-weeknumbers', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][weeknumbers]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'weeknumbers', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-inline', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][inline]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'inline', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-hourIncrement', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][hourIncrement]",
					'value'            => ("" !== $this->get_option($field, 'hourIncrement')) ? $this->get_option($field, 'hourIncrement') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>1</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-minuteIncrement', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][minuteIncrement]",
					'value'            => ("" !== $this->get_option($field, 'minuteIncrement')) ? $this->get_option($field, 'minuteIncrement') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>5</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('data-allowInput', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][allowInput]",
					'options'     => array(
						'choices' => array(
							'false'  => 'false',
							'true'   => 'true'
						),
						'force_single' => true,
					),
					'value' => $this->get_option($field, 'allowInput', 'false')
				));
			?>
			<p style="margin-top: 5px;">Default: <code>false</code></p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('l10n.firstDayOfWeek', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'             => 'text',
					'input_name'       => "cfs[fields][$key][options][l10nfirstDayOfWeek]",
					'value'            => ("" !== $this->get_option($field, 'l10nfirstDayOfWeek')) ? $this->get_option($field, 'l10nfirstDayOfWeek') : ""
				));
			?>
			<p style="margin-top: 5px;">Default: <code>0</code><br>Start the calendar on a different weekday (0 = Sunday, 1 = Monday, 2 = Tuesday, etc.)</p>
		</td>
	</tr>
	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label">
			<label><?php _e('Localization', 'cfs-datetime'); ?></label>
		</td>
		<td>
			<?php
				CFS()->create_field(array(
					'type'        => 'select',
					'input_name'  => "cfs[fields][$key][options][localize]",
					'options'     => array(
						'choices' => array(
							'ar'  => 'Arabic',
							'bn'  => 'Bangla',
							'de'  => 'German',
							'en'  => 'English',
							'es'  => 'Spanish',
							'fr'  => 'French',
							'hi'  => 'Hindi',
							'ja'  => 'Japanese',
							'pa'  => 'Punjabi',
							'pt'  => 'Portuguese',
							'ru'  => 'Russian',
							'zh'  => 'Mandarin'
						),
						'force_single' => true,
					),
					'value' => ("" !== $this->get_option($field, 'localize')) ? $this->get_option($field, 'localize') : "en"
				));
			?>
			<p style="margin-top: 5px;">Default: <code>English</code></p>
		</td>
	</tr>

	<tr class="field_option field_option_<?php echo $this->name; ?>">
		<td class="label"></td>
		<td>
			<dl style="width: 100%;display:table;font-size: 15px;">
				<dt style="display: table-cell; font-weight: bold; width: 135px;">Documentation</dt>
				<dd style="display: table-cell;">
					See <a href="https://chmln.github.io/flatpickr/" target="_blank">flatpickr</a> Page.
				</dd>
			</dl>
		</td>
	</tr>

<?php
    }

	function input_head($field = null) {
		wp_enqueue_style('cfs-datetime-flatpickr', '//cdnjs.cloudflare.com/ajax/libs/flatpickr/1.8.8/flatpickr.min.css', array());
		wp_enqueue_style('cfs-datetime-iconfont', '//cdn.linearicons.com/free/1.0.0/icon-font.min.css', array());
		wp_enqueue_style('cfs-datetime-styles', plugins_url('cfs-datetime') . '/assets/css/styles.css', array());
		wp_enqueue_script('cfs-datetime-flatpickr', '//cdnjs.cloudflare.com/ajax/libs/flatpickr/1.8.8/flatpickr.min.js', array('jquery'));
		if($this->get_option($field, 'localize') && $this->get_option($field, 'localize') != "en"){
			wp_enqueue_script('cfs-datetime-flatpickr-l10n', '//cdnjs.cloudflare.com/ajax/libs/flatpickr/1.8.8/flatpickr.l10n.' . $this->get_option($field, 'localize') . '.js', array('cfs-datetime-flatpickr'));
		}
	}
}
