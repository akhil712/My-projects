$('#form').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            alert('Registration successful!');
            window.location.href = '/home';
        },
        error: function(xhr) {
            $('#nameError').text('');
            $('#emailError').text('');
            $('#passwordError').text('');

            var errors = xhr.responseJSON.errors;
            if (errors.name) {
                $('#nameError').text(errors.name[0]);
            }
            if (errors.email) {
                $('#emailError').text(errors.email[0]);
            }
            if (errors.password) {
                $('#passwordError').text(errors.password[0]);
            }
        }
    });
});