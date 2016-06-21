jQuery(document).ready(function(){
    var $ = jQuery;

    $('body').on('click', 'a[data-uploader]', function(e) {
        var file_frame;
        e.preventDefault();
        var $this = $(this);

            // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Upload de midia',
            button: {
                text: 'Inserir',
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();

            // Do something with attachment.id and/or attachment.url here
            $('input[name=' + $this.data('input') + ']').val(attachment.url);
        });

        // Finally, open the modal
        file_frame.open();
    });
});
