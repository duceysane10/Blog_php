/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	//config.uiColor = '#AADC6E';
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools','Youtube'  ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ,'Youtube' ] },
		{ name: 'insert', groups: [ 'insert','Youtube'  ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing','Youtube'  ] },
		{ name: 'forms', groups: [ 'forms' ,'Youtube' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup','Youtube'  ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ,'Youtube' ] },
		{ name: 'links', groups: [ 'links','Youtube' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ,'Youtube' ] },
		{ name: 'colors', groups: [ 'colors' ,'Youtube' ] },
		{ name: 'tools', groups: [ 'tools' ,'Youtube' ] },
		{ name: 'others', groups: [ 'others' ,'Youtube' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
	config.extraPlugins = 'filebrowser';
	config.extraPlugins = 'youtube';
	config.removePlugins = 'iframe';
	config.removeButtons = 'About';

};
		