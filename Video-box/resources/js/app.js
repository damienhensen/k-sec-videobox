/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./melding')

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

jQuery('input[type="file"]').on('change', function(e){
    var fileName = e.target.files[0].name;
    jQuery('.custom-file-label').html(fileName);
});

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

    if (jQuery('.alert-danger li').length) {
        jQuery('.alert-danger li').remove();
    }

    var hasError = false;

    if (jQuery('input[name=video]').val() === "") {
        hasError = true;

        jQuery('.alert-danger ul').append('<li></li>');

        jQuery('.alert-danger li:last-of-type').append('Je rapportage heeft natuurlijk wel een video nodig ;)');
    }

    if (!hasError) {
        if (!uploadVideo()) {
            hasError = true;
    
            jQuery('.alert-danger ul').append('<li></li>');
        
            jQuery('.alert-danger li:last-of-type').append('De video moet een mp4 of webm zijn');
        }
    }

    if (jQuery('input[name=title]').val() === "") {
        hasError = true;

        jQuery('.alert-danger ul').append('<li></li>');

        jQuery('.alert-danger li:last-of-type').append('Je rapportage heeft een titel nodig');
    }

    if (!hasError) {
        jQuery('.alert-danger').hide();
        this.submit();
    } else {
        jQuery('.alert-danger').show();
    }
});

jQuery('.editVideo').on('submit', function() {
    var title = jQuery(this).find('input[name=title]');

    if (title.val() == "") {
        alert('Titel mag niet leeg zijn');
        return false;
    }
});

jQuery('.editVideo button[value=delete]').on('click', function() {
    if(!confirm('Wil je echt deze rapportage verwijderen?')) {
        return false;
    }
})

jQuery('.account-edit').on('submit', function(e) {
    e.preventDefault();

    if (jQuery('.alert-danger li').length) {
        jQuery('.alert-danger li').remove();
    }

    var hasError = false;

    if (jQuery('#name').val() == "") {
        hasError = true;

        jQuery('.alert-danger ul').append('<li></li>');

        jQuery('.alert-danger li:last-of-type').append('Je naam is niet ingevuld');
    }

    if (jQuery('#email').val() == "") {
        hasError = true;

        jQuery('.alert-danger ul').append('<li></li>');

        jQuery('.alert-danger li:last-of-type').append('Je email is niet ingevuld');
    }

    if (jQuery('#changePassword:checked').length > 0) {
        var password1 = jQuery('#password');
        var password2 = jQuery('#password2');
        if (password1.val().length < 8) {
            hasError = true;
    
            jQuery('.alert-danger ul').append('<li></li>');
    
            jQuery('.alert-danger li:last-of-type').append('Je wachtwoord heeft minstens 8 karakters nodig');
        } else {
            if (password1.val() !== password2.val()) {
                hasError = true;
    
                jQuery('.alert-danger ul').append('<li></li>');
    
                jQuery('.alert-danger li:last-of-type').append('De wachtwoorden komen niet overeen');
            }
        }
    }

    if (!hasError) {
        jQuery('.alert-danger').hide();
        
        HTMLFormElement.prototype.submit.call(this);
    } else {
        jQuery('.alert-danger').show();
    }

    return false;
});