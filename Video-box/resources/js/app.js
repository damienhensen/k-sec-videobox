require('./bootstrap');

function uploadVideo() {
    var valid = false;
    var video = jQuery('#r_video');
    var props = video.prop('files')[0];
    var name = props['name'];
    var type = props['type'];

    var extension = name.substr( (name.lastIndexOf('.') +1) );

    var supported = ['video/mp4', 'video/webm'];
    var supported2 = ['mp4', 'webm'];

    if (jQuery.inArray(type, supported) !== -1 ) {
        if (jQuery.inArray(extension, supported2) !== -1 ) {
            valid = true;
        }
    }

    if (valid) {
        return true;
    }
}

jQuery('.uploadVideoForm').on('submit', function(e) {
    e.preventDefault();

    if (jQuery('.alert-error li').length) {
        jQuery('.alert-error li').remove();
    }

    var hasError = false;

    if (jQuery('input[name=video]').val() === "") {
        hasError = true;

        jQuery('.alert-error ul').append('<li></li>');

        jQuery('.alert-error li:last-of-type').append('Je rapportage heeft natuurlijk wel een video nodig ;)');
    }

    if (!hasError) {
        if (!uploadVideo()) {
            hasError = true;
    
            jQuery('.alert-error ul').append('<li></li>');
        
            jQuery('.alert-error li:last-of-type').append('De video moet een mp4 of webm zijn');
        }
    }

    if (jQuery('input[name=title]').val() === "") {
        hasError = true;

        jQuery('.alert-error ul').append('<li></li>');

        jQuery('.alert-error li:last-of-type').append('Je rapportage heeft een titel nodig');
    }

    if (!hasError) {
        jQuery('.alert-error').hide();
        this.submit();
    } else {
        jQuery('.alert-error').show();
    }
});