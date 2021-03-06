<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Control_Structure extends Control_Base {

	public function get_type() {
		return 'structure';
	}

	public function content_template() {
		?>
		<div class="elementor-control-field">
			<div class="elementor-control-input-wrapper">
				<div class="elementor-control-structure-title"><?php \BitElementorWpHelper::_e( 'Structure', 'elementor' ); ?></div>
				<# var currentPreset = elementor.presetsFactory.getPresetByStructure( data.controlValue ); #>
				<div class="elementor-control-structure-preset elementor-control-structure-current-preset">
					{{{ elementor.presetsFactory.getPresetSVG( currentPreset.preset, 233, 72, 5 ).outerHTML }}}
				</div>
				<div class="elementor-control-structure-reset"><i class="fa fa-undo"></i><?php \BitElementorWpHelper::_e( 'Reset Structure', 'elementor' ); ?></div>
				<#
				var morePresets = getMorePresets();

				if ( morePresets.length > 1 ) { #>
					<div class="elementor-control-structure-more-presets-title"><?php \BitElementorWpHelper::_e( 'More Structures', 'elementor' ); ?></div>
					<div class="elementor-control-structure-more-presets">
						<# _.each( morePresets, function( preset ) { #>
							<div class="elementor-control-structure-preset-wrapper">
								<input id="elementor-control-structure-preset-{{ data._cid }}-{{ preset.key }}" type="radio" name="elementor-control-structure-preset-{{ data._cid }}" data-setting="structure" value="{{ preset.key }}">
								<label class="elementor-control-structure-preset" for="elementor-control-structure-preset-{{ data._cid }}-{{ preset.key }}">
									{{{ elementor.presetsFactory.getPresetSVG( preset.preset, 102, 42 ).outerHTML }}}
								</label>
								<div class="elementor-control-structure-preset-title">{{{ preset.preset.join( ', ' ) }}}</div>
							</div>
						<# } ); #>
					</div>
				<# } #>
			</div>
		</div>
		
		<# if ( data.description ) { #>
			<div class="elementor-control-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}

	protected function get_default_settings() {
		return [
			'separator' => 'none',
		];
	}
}
