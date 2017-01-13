/*
 * Copyright (C) eZ Systems AS. All rights reserved.
 * For full copyright and license information view LICENSE file distributed with this source code.
 */
YUI.add('md-markdown-view', function (Y) {
    'use strict';

    /**
     * Provides the Markdown Field View class
     *
     * @module md-markdown-view
     */
    Y.namespace('eZ');

    var FIELDTYPE_IDENTIFIER = 'ezmarkdown';

    /**
     * The markdown view
     *
     * @namespace eZ
     * @class MarkdownView
     * @constructor
     * @extends eZ.FieldView
     */
    Y.md.MarkdownView = Y.Base.create('mdMarkdownView', Y.eZ.FieldView, [], {
        /**
         * Returns the value to display
         *
         * @method _getFieldValue
         * @protected
         * @return {String}
         */
        _getFieldValue: function () {
            return this.get('markdownConverter').makeHtml(this.get('field').fieldValue);
        }
    }, {
        ATTRS: {
            /**
             * Markdown converter
             *
             * @attribute markdownConverter
             * @type Y.md.Markdown
             * @readOnly
             */
            markdownConverter: {
                valueFn: () => new Y.md.Markdown.Converter(),
                readOnly: true
            }
        }
    });

    Y.eZ.FieldView.registerFieldView(FIELDTYPE_IDENTIFIER, Y.md.MarkdownView);
});
