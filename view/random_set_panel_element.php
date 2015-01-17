<?php
/**
 * Project: randomizer
 * File: random_set_panel_element.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 17/1/2015
 * Time: 10:16 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}
/* @var $callee \randomizer\menu_pages\panels\random_set */
/* @var $this \xd_v141226_dev\views */
/* @var int $index */
/* @var string $content */
/* @var bool $pined */
/* @var bool $disabled */

$elementFieldProps = array(
	'required'    => ! $callee->isDefault,
	'type'        => 'textarea',
	'name'        => '[elements][' . $index . '][content]',
	'title'       => $this->__( 'Add some text or HTML markup to this element' ),
	'placeholder' => $this->__( 'Add some text or HTML markup to this element' ),
	'name_prefix' => $callee->fieldNamePrefix,
	'classes'     => 'text-area form-control',
	'id'          => 'elements-' . $callee->setIdx . '-' . $index,
	'rows'        => 4
);
?>
<div id="element-row-<?php echo $callee->slug . '-' . $index; ?>" class="form-group" data-index="<?php echo $index; ?>">
	<div class="col-sm-10 text-area-wrapper">
		<?php echo $callee->menu_page->option_form_fields->markup( $callee->menu_page->option_form_fields->value( $content ), $elementFieldProps ); ?>
	</div>
	<?php
	$btnCtrlAttr = ' data-setid="' . $callee->setIdx . '" data-set="' . $callee->slug . '" data-index="' . $index . '" ';

	$pinedActive    = $pined ? 'active' : '';
	$disabledActive = $disabled ? 'active' : '';
	$pinedClass     = $pined ? 'fa-lock' : 'fa-unlock';
	?>
	<div class="col-sm-2 text-center element-control">
		<div class="row b-margin-sm">
			<div class="col-sm-6">
				<button type="button" <?php echo $btnCtrlAttr; ?> style="font-size: 1em;" value="1" name="pin"
				        class="btn btn-success element-pin <?php echo $pinedActive; ?>" title="Pin element">
					<i class="fa <?php echo $pinedClass; ?>"></i>
				</button>
			</div>
			<div class="col-sm-6">
				<button type="button" <?php echo $btnCtrlAttr; ?> style="font-size: 1em;" type="button"
				        class="btn btn-success element-add" title="Add new element">
					<i class="fa fa-plus"></i>
				</button>
			</div>
		</div>

		<div class="row">
			<?php
			if ( $index != 0 ) {
				?>
				<div class="col-sm-6">
					<button type="button" <?php echo $btnCtrlAttr; ?> style="font-size: 1em;"
					        class="btn btn-warning element-disable <?php echo $disabledActive; ?>"
					        title="Disable element">
						<i class="fa fa-power-off"></i>
					</button>
				</div>
				<div class="col-sm-6">
					<button type="button" <?php echo $btnCtrlAttr; ?> style="font-size: 1em;"
					        class="btn btn-danger element-delete" title="Delete element">
						<i class="fa fa-trash-o"></i>
					</button>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		echo $callee->menu_page->option_form_fields->markup( $callee->menu_page->option_form_fields->value( $pined ), array(
			'type'        => 'hidden',
			'name'        => '[elements][' . $index . '][pined]',
			'name_prefix' => $callee->fieldNamePrefix,
			'classes'     => 'form-control pined',
			'id'          => 'pined-' . $callee->setIdx . '-' . $index
		) );

		echo $callee->menu_page->option_form_fields->markup( $callee->menu_page->option_form_fields->value( $disabled ), array(
			'type'        => 'hidden',
			'name'        => '[elements][' . $index . '][disabled]',
			'name_prefix' => $callee->fieldNamePrefix,
			'classes'     => 'form-control pined',
			'id'          => 'disabled-' . $callee->setIdx . '-' . $index
		) );
		?>
	</div>

</div>