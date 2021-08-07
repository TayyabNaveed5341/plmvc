$('#userDesignationForm').submit(function(e){
    e.preventDefault();
    $.post( "./users", $(e.target).serialize()).done(function( data ) {
            $('#usersTableWrapper').html(data)
    });
});