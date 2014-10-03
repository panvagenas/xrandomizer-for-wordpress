/**
 * Menu Pages Extension
 *
 * Copyright: © 2012 (coded in the USA)
 * {@link http://www.websharks-inc.com WebSharks™}
 *
 * @author JasWSInc
 * @package WebSharks\Core
 * @since 120318
 */

(function ($) // Begin extension closure.
{
    /**
     * Random element manager
     * @param elementIndex
     * @param elementSet
     * @param elementSetId
     * @constructor
     */
    function RandomElement(elementIndex, elementSet, elementSetId) {
        this.elementSet = elementSet.toString();
        this.elementSetId = elementSetId.toString();

        this.oldElement = {};
        this.oldElement.elementIndex = parseInt(elementIndex);

        this.oldElement.$wrapper = $('#element-row-' + elementSet + '-' + this.oldElement.elementIndex.toString());
        this.oldElement.$wrapper.textAreaWrapper = this.oldElement.$wrapper.children('.text-area-wrapper');
        this.oldElement.$wrapper.textArea = this.oldElement.$wrapper.textAreaWrapper.children('.text-area');
        this.oldElement.$wrapper.elementControls = this.oldElement.$wrapper.children('.element-control');
        this.oldElement.$wrapper.elementControls.addButton = this.oldElement.$wrapper.elementControls.children('.element-add');
        this.oldElement.$wrapper.elementControls.deleteButton = this.oldElement.$wrapper.elementControls.children('.element-delete');

        this.newElement = {
            elementIndex: parseInt(elementIndex) + 1,
            closeButtonHtml: '<button type="button" data-setid="' + this.elementSetId.toString() + '" data-set="' + elementSet + '" data-index="' + (this.oldElement.elementIndex + 1).toString() + '" style="font-weight: bold; width: 35px; margin-bottom:5px;" class="btn btn-danger col-sm-12 element-delete" title="Delete element">-</button>',
            openButtonHtml: '<button data-setid="' + this.elementSetId.toString() + '" data-set="' + elementSet + '" data-index="' + (this.oldElement.elementIndex + 1).toString() + '"  style="font-weight: bold; width: 35px;" type="button" class="btn btn-success col-sm-12 element-add" title="Add new element">+</button>',
            $wrapper: null
        };
    }

    RandomElement.prototype.addNewElementAfterOld = function () {
        this.formNewElement('');
        this.addAfterOld();
        this.updateNextElements();
        this.bindClickEvent();
    };

    RandomElement.prototype.formNewElement = function (textAreaContent) {
        this.newElement.$wrapper = this.oldElement.$wrapper.clone();
        this.newElement.$wrapper.textAreaWrapper = this.newElement.$wrapper.children('.text-area-wrapper');
        this.newElement.$wrapper.textArea = this.newElement.$wrapper.textAreaWrapper.children('.text-area');
        this.newElement.$wrapper.elementControls = this.newElement.$wrapper.children('.element-control');

        this.newElement.$wrapper.attr('data-index', this.newElement.elementIndex);
        this.newElement.$wrapper.attr('id', 'element-row-' + this.elementSet + '-' + this.newElement.elementIndex);

        this.newElement.$wrapper.textArea.attr('id', 'elements-' + this.newElement.elementIndex);
        this.newElement.$wrapper.textArea.attr('name', 'rz[a][a][0][' + this.elementSetId + '][elements][]');
        this.newElement.$wrapper.textArea.val(textAreaContent);

        this.newElement.$wrapper.elementControls.html(this.newElement.closeButtonHtml + this.newElement.openButtonHtml);

        this.newElement.$wrapper.elementControls.addButton = this.newElement.$wrapper.elementControls.children('.element-add');
        this.newElement.$wrapper.elementControls.deleteButton = this.newElement.$wrapper.elementControls.children('.element-delete');

        this.bindClickEvent();
    };

    RandomElement.prototype.addAfterOld = function () {
        this.oldElement.$wrapper.after(this.newElement.$wrapper);
        this.newElement.$wrapper.textArea.focus();
    };

    RandomElement.prototype.getNewRandomElement = function (element, oldIndex, newIndex, setId, setName) {

    };

    RandomElement.prototype.bindClickEvent = function () {
        $('.element-add').unbind('click').click(function () {
            var index = $(this).attr('data-index');
            var elemSet = $(this).attr('data-set');
            var elemSetId = $(this).attr('data-setid');

            var el = new RandomElement(index, elemSet, elemSetId);
            el.addNewElementAfterOld();
        });

        $('.element-delete').unbind('click').click(function () {
            var index = $(this).attr('data-index');
            var elemSet = $(this).attr('data-set');
            var elemSetId = $(this).attr('data-setid');

            var el = new RandomElement(index, elemSet, elemSetId);
            el.oldElement.$wrapper.remove();
        });
    };

    RandomElement.prototype.updateNextElements = function () {
        var that = this;
        var length = this.newElement.$wrapper.nextAll('.form-group').length;

        this.newElement.$wrapper.nextAll('.form-group').each(function (idx) {

            var prevElemIndex = that.newElement.elementIndex + idx;
            var curElemIndex = prevElemIndex + 1;
            var $wrapper = $(this);

            $wrapper.textAreaWrapper = $wrapper.children('.text-area-wrapper');
            $wrapper.textArea = $wrapper.textAreaWrapper.children('.text-area');
            $wrapper.elementControls = $wrapper.children('.element-control');
            $wrapper.elementControls.addButton = $wrapper.elementControls.children('.element-add');
            $wrapper.elementControls.deleteButton = $wrapper.elementControls.children('.element-delete');

            $wrapper.attr('data-index', curElemIndex);
            $wrapper.attr('id', 'element-row-' + that.elementSet + '-' + curElemIndex.toString());

            $wrapper.textArea.attr('id', 'elements-' + curElemIndex.toString());
            $wrapper.textArea.attr('name', 'rz[a][a][0][' + that.elementSetId + '][elements][]');

            $wrapper.elementControls.addButton.attr('data-index', curElemIndex);
            $wrapper.elementControls.deleteButton.attr('data-index', curElemIndex);

        });
        //this.bindClickEvent();
    };

    RandomElement.prototype.bindClickEvent();

    /**
     * Set Manager
     * @param setIdx
     * @constructor
     */
    function SetManager(setIdx, $selector){
        this.setIdx = setIdx;
        this.$selector = $selector;
    }

    SetManager.prototype = {
        /**
         * Autoincrement number of sets
         */
        sets: {
            0: true
        },

        bindDeleteEvent: function(){
            $('.set-delete').unbind('click').click(function () {
                var setIdx = parseInt($(this).attr('data-setidx'));
                var selector = $('#'+$(this).attr('data-setselector'));
                var newSet = new SetManager(setIdx, selector);
                newSet.deleteSet();
            });
        },

        bindAddEvent: function(){
            $('.set-add').unbind('click').click(function () {
                var setIdx = parseInt($(this).attr('data-setidx'));
                var selector = $('#'+$(this).attr('data-setselector'));
                var newSet = new SetManager(setIdx, selector);
                newSet.addNewSet();
            });
        },

        addNewSet: function(){
            console.log(this.$selector);
            //this.$selector.after(this.$selector.clone());
            // In the end
            SetManager.prototype.bindAddEvent();
            SetManager.prototype.bindDeleteEvent();
        },

        deleteSet: function(){
            console.log(2)
            // In the end
            this.$selector.remove();
            SetManager.prototype.bindAddEvent();
            SetManager.prototype.bindDeleteEvent();
        },

        getAnIdForNewSet: function(){
            return SetManager.prototype.sets.length + 1;
        },

        setsStashId: function(id){
            id = parseInt(id);
            SetManager.prototype.sets[id] = true;
        }
    };

    SetManager.prototype.bindAddEvent();
    SetManager.prototype.bindDeleteEvent();

})(jQuery); // End extension closure.