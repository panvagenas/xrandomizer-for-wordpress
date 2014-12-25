<?php
/**
 * Content for random-set panel header
 * User: vagenas
 * Date: 20/9/2014
 * Time: 3:52 πμ
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 20/9/2014 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */
/* @var \randomizer\menu_pages\panels\random_set $callee */
/* @var int $setIdx */
/* @var string $fieldNamePrefix */
/* @var \randomizer\menu_pages\random_sets $menu_page */
/* @var array $options */

if(!defined('WPINC'))
	exit('Do NOT access this file directly: '.basename(__FILE__));
?>
	<p class="bg-info text-center col-sm-12"><?php echo $callee->__( 'Set Options' ); ?></p>
	<div class="form-group">
		<label class="control-label col-sm-3" for="<?php echo $setIdx; ?>"><?php echo $callee->__( 'Name' ); ?></label>
		<div class="col-sm-9">
			<?php
			$name = $callee->getOption('name');
			echo $menu_page->option_form_fields->markup(
				$menu_page->option_form_fields->value( $name ),
				array(
					'required'    => true,
					'type'        => 'text',
					'name'        => '[name]',
					'title'       => $callee->__( 'Name' ),
					'placeholder' => $callee->__( 'Enter the name of the set' ),
					'name_prefix' => $fieldNamePrefix,
					'class'       => 'form-control',
					'id'          => 'name-' . $setIdx
				)
			);
			?>
		</div>
	</div>

<?php // Randomize policy ?>

	<div class="form-group">
		<label class="control-label col-sm-3"
		       for="randomPolicy-<?php echo $setIdx; ?>"><?php echo $callee->__( 'Randomize policy' ); ?>
		</label>

		<div class="col-sm-9">
			<?php
			$randomPolicy = $options['randomPolicy'];
			echo $menu_page->option_form_fields->markup(
				$menu_page->option_form_fields->value( $randomPolicy ),
				array(
					'required'    => true,
					'type'        => 'select',
					'name'        => '[randomPolicy]',
					'title'       => $callee->__( 'Randomize policy' ),
					'placeholder' => $callee->__( 'Choose how the items will be displayed' ),
					'name_prefix' => $fieldNamePrefix,
					'class'       => 'form-control',
					'id'          => 'randomPolicy-' . $setIdx,
					'options'     => array(
						array(
							'label' => $callee->__( 'Random' ),
							'value' => 'random'
						),
						array(
							'label' => $callee->__( 'Cyclic' ),
							'value' => 'cyclic'
						),
					)
				)
			);
			?>
		</div>
	</div>


<?php // Element to display ?>

	<div class="form-group">
		<label class="control-label col-sm-3"
		       for="numOfElmsToDspl-<?php echo $setIdx; ?>"><?php echo $callee->__( 'Number of elements to display' ); ?></label>

		<div class="col-sm-9">
			<?php
			$numOfElmsToDspl = $options['numOfElmsToDspl'];
			echo $menu_page->option_form_fields->markup(
				$menu_page->option_form_fields->value( $numOfElmsToDspl ),
				array(
					'required'    => true,
					'type'        => 'number',
					'name'        => '[numOfElmsToDspl]',
					'title'       => $callee->__( 'Choose the number of elements you want to display (this should <= of total elements and bigger that zero' ),
					'placeholder' => $callee->__( 'Number of elements to display' ),
					'name_prefix' => $fieldNamePrefix,
					'class'       => 'form-control',
					'id'          => 'numOfElmsToDspl-' . $setIdx,
					'attrs'       => ' min="1" '
				)
			);
			?>
		</div>
	</div>

<?php