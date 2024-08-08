$(document).ready(function() {
    // Handle create contact
    $('#create-contact-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Display success message
                $('#flash-messages').html('<div class="alert alert-success">' + response.message + '</div>');
                // Clear form fields
                $('#create-contact-form')[0].reset();
                // Optionally, refresh the contact list
            },
            error: function(response) {
                // Display validation errors
                var errors = response.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorHtml += '<li>' + value[0] + '</li>';
                });
                errorHtml += '</ul></div>';
                $('#flash-messages').html(errorHtml);
            }
        });
    });

    // Handle edit contact
    $('#edit-contact-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                // Display success message
                $('#flash-messages').html('<div class="alert alert-success">' + response.message + '</div>');
                // Optionally, refresh the contact list
            },
            error: function(response) {
                // Display validation errors
                var errors = response.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorHtml += '<li>' + value[0] + '</li>';
                });
                errorHtml += '</ul></div>';
                $('#flash-messages').html(errorHtml);
            }
        });
    });

    // Handle delete contact
    $('.delete-contact-form').on('submit', function(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this contact?')) {
            $.ajax({
                url: $(this).attr('action'),
                method: 'DELETE',
                data: $(this).serialize(),
                success: function(response) {
                    // Display success message
                    $('#flash-messages').html('<div class="alert alert-success">' + response.message + '</div>');
                    // Optionally, remove the deleted contact from the list
                },
                error: function(response) {
                    // Display error message
                    $('#flash-messages').html('<div class="alert alert-danger">An error occurred while deleting the contact.</div>');
                }
            });
        }
    });
});
