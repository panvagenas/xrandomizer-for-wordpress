<?php
/**
 * Project: randomizer
 * File: random_set_panel.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 17/1/2015
 * Time: 12:58 μμ
 * Since: 140914
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}
/* @var $callee \randomizer\menu_pages\panels\random_set */
/* @var $this \xd_v141226_dev\views */

?>
<div class="modal fade" id="editorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="xd-v141226-dev-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo $this->__('Code Editor'); ?></h4>
			</div>
			<div class="modal-body">
				<pre id="editor" style="height: 300px;"></pre>
			</div>
			<div class="modal-footer">
				<button id="modal-btn-close" type="button" class="btn btn-default" data-dismiss="xd-v141226-dev-modal"><?php echo $this->__('Close'); ?></button>
				<button id="modal-btn-update" type="button" class="btn btn-primary" data-dismiss="xd-v141226-dev-modal"><?php echo $this->__('Update Item'); ?></button>
			</div>
		</div>
	</div>
</div>
<?php // TODO Is there a js way to launch modal ?>
<a id="launch-modal" class="btn btn-primary btn-lg" data-toggle="xd-v141226-dev-modal" data-target="#editorModal" style="display: none;"></a>
