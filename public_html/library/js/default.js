$(document).ready(function() {
    $('button[role="BackButton"]').click(function() {
        window.location = "/";
    });
    
    $('button[role="ClientsList"]').click(function() {
        window.location = "/clientes";
    });
    
    $('button[role="ClientDetail"]').click(function() {
        window.location = "/clientes/" + $(this).val();
    });
    
    $("#ClientsTable").tablesorter();
});
