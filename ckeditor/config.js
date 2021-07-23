/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = 'http://localhost/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://localhost/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://localhost/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://localhost/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://localhost/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
