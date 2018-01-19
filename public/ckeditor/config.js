/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
   var public_path   = 'http://localhost/ems/public';

CKEDITOR.editorConfig = function( config ) {

    config.removeDialogTabs = 'image:advanced;link:advanced';
	config.filebrowserBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=flash';
};
