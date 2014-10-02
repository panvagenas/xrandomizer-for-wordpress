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
/** @var \randomizer\menu_pages\panels\random_set $this */

?>
	<p class="bg-info text-center col-sm-12"><?php echo $this->__( 'Set Options' ); ?></p>
	<div class="form-group">
		<label class="control-label col-sm-3" for="<?php echo $setIdx; ?>"><?php echo $this->__( 'Name' ); ?></label>
		<div class="col-sm-9">
			<?php
			echo $menu_page->option_form_fields->markup(
				$menu_page->option_form_fields->value( $name ),
				array(
					'required'    => true,
					'type'        => 'text',
					'name'        => '[name]',
					'title'       => $this->__( 'Name' ),
					'placeholder' => $this->__( 'Enter the name of the set' ),
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
		       for="randomPolicy-<?php echo $setIdx; ?>"><?php echo $this->__( 'Randomize policy' ); ?>
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
					'title'       => $this->__( 'Randomize policy' ),
					'placeholder' => $this->__( 'Choose how the items will be displayed' ),
					'name_prefix' => $fieldNamePrefix,
					'class'       => 'form-control',
					'id'          => 'randomPolicy-' . $setIdx,
					'options'     => array(
						array(
							'label' => $this->__( 'Random' ),
							'value' => 'random'
						),
						array(
							'label' => $this->__( 'Cyclic' ),
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
		       for="numOfElmsToDspl-<?php echo $setIdx; ?>"><?php echo $this->__( 'Number of elements to display' ); ?></label>

		<div class="col-sm-9">
			<?php
			$numOfElmsToDspl = $options['numOfElmsToDspl'];
			echo $menu_page->option_form_fields->markup(
				$menu_page->option_form_fields->value( $numOfElmsToDspl ),
				array(
					'required'    => true,
					'type'        => 'number',
					'name'        => '[numOfElmsToDspl]',
					'title'       => $this->__( 'Choose the number of elements you want to display (this should <= of total elements and bigger that zero' ),
					'placeholder' => $this->__( 'Number of elements to display' ),
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