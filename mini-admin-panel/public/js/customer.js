$('.send-btn').on('click', function() {
    var url = $(this).attr('url');
    
    $.ajax({
        url: url,
        type: 'PUT',
        data: {
            _token: window.csrf_token
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        },
        error: function(xhr) {
            alert('Something went wrong. Please try again.');
        }
    });
});