<?php
/**
 * User: vagenas
 * Date: 9/15/14
 * Time: 11:32 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/15/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer\menu_pages\panels {

    use wsc_v000000_dev\menu_pages\panels\panel;

	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

    /**
     *
     * @package randomizer\menu_pages\panels
     * @author pan.vagenas <pan.vagenas@gmail.com>
     */
    class random_set extends panel
    {
        /**
         * @var string Heading/title for this panel.
         * @extenders Should be overridden by class extenders.
         */
        public $heading_title = 'Random Set: ';

        /**
         * @var string Content/body for this panel.
         * @extenders Should be overridden by class extenders.
         */
        public $content_body = '';

        /**
         * @var string Additional documentation for this panel.
         * @extenders Can be overridden by class extenders.
         */
        public $documentation = '';

        /**
         * @var string Field name prefix to use in field markups
         */
        protected $fieldNamePrefix;

        protected $setIdx;

        /**
         * @var array Set options
         */
        protected $setOptions = array();

        protected $isDefault = true;

        /**
         * @var array Default options
         */
        protected $defaultOptions = array();

        public function __construct($instance, $menu_page, $setId, $options)
        {
            parent::__construct($instance, $menu_page);

            /**
             * Modify slug in order to display multiple sets
             */
            $this->slug .= '-' . $setId;

            $this->setIdx = $setId;
            $this->setOptions = $options;

            $this->defaultOptions = $this->©options->get('sets', true);
            $this->heading_title .= '<strong>' . $this->getOption('name') . '</strong>';

            $dif = $this->©arrays->array_dif_assoc_deep($options, $this->©options->get('sets', true)[0]);// array_diff_assoc($options, $this->©options->get( 'sets', true )[0]);
            $this->isDefault = empty($dif);

            /**
             * Prefix in order to assemble sets array
             */
            $this->fieldNamePrefix = $this->menu_page->option_form_fields->name_prefix . '[' . $setId . ']';

            /**
             * Add the content
             */
            $this->content_body .= $this->header();
            $this->content_body .= $this->main();
            $this->content_body .= $this->footer();
        }

        protected function header()
        {
//			return $this->©views->view( 'random_set_header.php', array(
//				'setIdx'          => $this->setIdx,
//				'fieldNamePrefix' => $this->fieldNamePrefix,
//				'menu_page'       => $this->menu_page,
//				'options'         => array_merge( $this->defaultOptions, $this->setOptions )
//			) );
            // Name
            $name = $this->getOption('name');
            $nameFieldProps = array(
                'required' => !$this->isDefault,
                'type' => 'text',
                'name' => '[name]',
                'title' => $this->__('Name'),
                'placeholder' => $this->__('Enter the name of the set'),
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'form-control',
                'id' => 'name-' . $this->setIdx
            );
            $out = '<div class="form-horizontal">';

            $out .= $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($this->isDefault), array(
                'type' => 'hidden',
                'name' => '[isDefault]',
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'form-control',
                'id' => 'isDefault-' . $this->setIdx
            ));

            $out .= '<p class="bg-info text-center row">' . $this->__('Set Options') . '</p>
			        <div class="form-group row">
			            <label class="control-label col-sm-3" for="name-' . $this->setIdx . '">' . $this->__('Name') . '</label>
			            <div class="col-sm-9">'
                . $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($name), $nameFieldProps) . '
			            </div>
		            </div>';

            // Randomize policy
            $randomPolicy = $this->getOption('randomPolicy');
            $policyFieldProps = array(
                'required' => !$this->isDefault,
                'type' => 'select',
                'name' => '[randomPolicy]',
                'title' => $this->__('Randomize policy'),
                'placeholder' => $this->__('Choose how the items will be displayed'),
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'form-control',
                'id' => 'randomPolicy-' . $this->setIdx,
                'options' => array(
                    array(
                        'label' => $this->__('Random'),
                        'value' => 'random'
                    ),
                    array(
                        'label' => $this->__('Cyclic'),
                        'value' => 'cyclic'
                    ),
                )
            );

            $out .= '<div class="form-group">
						<label class="control-label col-sm-3" for="randomPolicy-' . $this->setIdx . '">' . $this->__('Randomize policy') . '</label>
	                    <div class="col-sm-9">'
                . $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($randomPolicy), $policyFieldProps)
                . '</div>
			        </div>';


            // Element to display
            $numOfElmsToDspl = $this->getOption('numOfElmsToDspl');
            $numOfElmsFieldOpts = array(
                'required' => !$this->isDefault,
                'type' => 'number',
                'name' => '[numOfElmsToDspl]',
                'title' => $this->__('Choose the number of elements you want to display (this should be <= of total elements and >= zero. Set to 0 to display all elements'),
                'placeholder' => $this->__('Number of elements to display <i>(zero to display all)</i>'),
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'form-control',
                'id' => 'numOfElmsToDspl-' . $this->setIdx,
                'attrs' => ' min="0" '
            );

            $out .= '<div class="form-group">
						<label class="control-label col-sm-3" for="numOfElmsToDspl-' . $this->setIdx . '">' . $this->__('Number of elements to display <br><small>(zero to display all)</small>') . '</label>
			            <div class="col-sm-9">'
                . $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($numOfElmsToDspl), $numOfElmsFieldOpts)
                . '</div>
			       </div>
		       </div>';

            return $out;
        }

        protected function main()
        {
            // Elements
            $out = '<p class="bg-info text-center row">' . $this->__('Set Elements') . '</p>';
            $out .= '<div class="form-horizontal">';
            foreach ($this->getOption('elements') as $k => $v) {
                $out .= $this->element($k, $v['content'], (bool)$v['pined'], (bool)$v['disabled']);
            }

            if (!count($this->getOption('elements'))) {
                $out .= $this->element(0, '', false, false);
            }
            $out .= '</div>';
            return $out;
        }

        protected function footer()
        {
            // Set related actions
            if ($this->isDefault) {
                return '';
            }
            $out = '<p class="bg-info text-center row">' . $this->__('Set Actions') . '</p>
			       <div class="text-right row-fluid">';
            if (!$this->isDefault) {
                $out .= '<button type="button" class="btn btn-danger btn-sm col-sm-3 col-sm-offset-9 set-delete" data-setidx="' . $this->setIdx . '" data-setselector="panel--' . $this->slug . '">' . $this->__('Delete Set') . '</button>';
            }
//			$out .= '<button type="button" class="btn btn-success btn-sm col-sm-3 set-add '.($this->isDefault ? 'col-sm-offset-9' : 'col-sm-offset-1').'" data-setidx="'.$this->setIdx.'" data-setselector="panel--'.$this->slug.'">' . $this->__( 'Add New Set' ) . '</button>';
            $out .= '</div>';

            return $out;
        }

        protected function element($index, $content, $pined, $disabled)
        {
            $elementFieldProps = array(
                'required' => !$this->isDefault,
                'type' => 'textarea',
                'name' => '[elements][' . $index . '][content]',
                'title' => $this->__('Add some text or HTML markup to this element'),
                'placeholder' => $this->__('Add some text or HTML markup to this element'),
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'text-area form-control',
                'id' => 'elements-' . $this->setIdx . '-' . $index,
                'rows' => 4
            );

            $out = '<div id="element-row-' . $this->slug . '-' . $index . '" class="form-group" data-index="' . $index . '">';
            $out .= '<div class="col-sm-10 text-area-wrapper">';
            $out .= $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($content), $elementFieldProps);
            $out .= '</div>';

            $btnCtrlAttr = ' data-setid="' . $this->setIdx . '" data-set="' . $this->slug . '" data-index="' . $index . '" ';

            $pinedActive = $pined ? 'active' : '';
            $disabledActive = $disabled ? 'active' : '';
            $pinedClass = $pined ? 'fa-lock' : 'fa-unlock';

            $out .= '<div class="col-sm-2 text-center element-control">
                        <div class="row b-margin-sm">';
			$out .=         '<div class="col-sm-6">';
            $out .=             '<button type="button"'.$btnCtrlAttr.'style="font-size: 1em;" value="1" name="pin" class="btn btn-success element-pin '.$pinedActive.'" title="Pin element">
                                    <i class="fa '.$pinedClass.'"></i>
                                </button>';
            $out .=         '</div>';
            $out .=         '<div class="col-sm-6">';
			$out .=             '<button type="button"'.$btnCtrlAttr.'style="font-size: 1em; " type="button" class="btn btn-success element-add" title="Add new element">
			                        <i class="fa fa-plus"></i>
                                </button>';
			$out .=         '</div>';
			$out .=     '</div>';

            $out .=     '<div class="row">';
            if ($index != 0) {
                $out .=     '<div class="col-sm-6">';
                $out .=         '<button type="button"'.$btnCtrlAttr.'style="font-size: 1em;" class="btn btn-warning element-disable '.$disabledActive.'" title="Disable element">
                                    <i class="fa fa-power-off"></i>
                                </button>';
                $out .=     '</div>';
                $out .=     '<div class="col-sm-6">';
                $out .=         '<button type="button"'.$btnCtrlAttr.'style="font-size: 1em;" class="btn btn-danger element-delete" title="Delete element">
                                    <i class="fa fa-trash-o"></i>
                                </button>';
                $out .=     '</div>';
            }
            $out .=     '</div>';
            $out .= $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($pined), array(
                'type' => 'hidden',
                'name' => '[elements][' . $index . '][pined]',
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'form-control pined',
                'id' => 'pined-' . $this->setIdx . '-' . $index
            ));

            $out .= $this->menu_page->option_form_fields->markup($this->menu_page->option_form_fields->value($disabled), array(
                'type' => 'hidden',
                'name' => '[elements][' . $index . '][disabled]',
                'name_prefix' => $this->fieldNamePrefix,
                'classes' => 'form-control pined',
                'id' => 'disabled-' . $this->setIdx . '-' . $index
            ));
			$out .= '</div>';

            $out .= '</div>';

			return $out;
		}

        protected function getOption($optionName)
        {
            if (isset($this->setOptions[$optionName])) {
                return $this->setOptions[$optionName];
            }

            return $this->defaultOptions[$optionName];
        }
    }
}