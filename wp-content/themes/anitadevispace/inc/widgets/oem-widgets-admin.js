(function($) {
    
    // Image Sample
    // widgetUploadHandler('#image-upload-button','.image-url', 'Choose Image');
    
}) (jQuery);

// Upload handler function
function widgetUploadHandler(buttonID, urlField, uploaderTitle) {

    var custom_uploader;

    jQuery('body').on('click',buttonID,function(e) {
        
        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: uploaderTitle,
            button: {
                text: uploaderTitle
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery(urlField).val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });

}