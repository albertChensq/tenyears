/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.entities = true;
	config.toolbar = 'Basic';
	config.height = 300;
	config.language = 'zh-cn';
	config.extraPlugins= 'autogrow,pastetext';
	config.removePlugins= 'resize';									
    config.autoGrow_minHeight = 300;
    config.autoGrow_onStartup = true;
    config.forcePasteAsPlainText = true;
	config.toolbar_Basic =  
	[  
	    ['Bold', 'Italic', 'Underline','Blockquote', 'NumberedList', 'BulletedList']  
	];
};