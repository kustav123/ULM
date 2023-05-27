
$(document).ready(function() {
    $('input[id$="-make"]').each(function() {
      var $input = $(this);
      var type = $input.data('type');
      $input.autocomplete({
        source: function(request, response) {
          $.ajax({
            url: 'ajax/ajax.php',
            type: 'GET',
            dataType: 'json',
            data: {
              name: request.term,
              type: type
            },
            success: function(data) {
              response($.map(data, function(item) {
                return {
                  label: item.name,
                  value: item.name
                }
              }));
            }
          });
        },
        minLength: 2
      }).data('ui-autocomplete')._renderItem = function(ul, item) {
        return $('<li>').append('<div>' + item.label + '</div>').appendTo(ul);
      };
    });
  });
  