$('#form').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            alert('Login successful!');
            window.location.href = "/home";
        },
        error: function(xhr) {
            $('#emailError').text('');
            $('#passwordError').text('');

            var errors = xhr.responseJSON.errors;
            if (errors.email) {
                $('#emailError').text(errors.email[0]);
            }
            if (errors.password) {
                $('#passwordError').text(errors.password[0]);
            }
        }
    });
});