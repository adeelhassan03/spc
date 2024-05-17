
<script src="https://spc.devstags.com/public/public/modules/spc/js/jquery.js"></script>
<script src="https://spc.devstags.com/public/public/modules/spc/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('.menu-group').closest('.form-group').hide();
    var uniqueID = generateUniqueID();
    $('.menu-group').val(uniqueID);

    $(".clone-btn").on("click", function() {
        var clonedRow = $(this).closest('.form-row').clone();

        clonedRow.find('label[for="title"]').text('Sub Menu Title');
        clonedRow.find('label[for="slug"]').text('Sub Menu URL');
        clonedRow.find('label[for="group"]').text('Sub Menu Group');
        clonedRow.find('label[for="status"]').text('Sub Menu Status'); 
        clonedRow.find('.menu-group').val(uniqueID);
        clonedRow.find('input[name="category"]').val("Sub Menu");

        var newIndex = $('.sub-menu-fields .form-row').length; 
        clonedRow.find('input[name="category"]').attr("name", "category[" + newIndex + "]"); 

        clonedRow.find('input[type="text"]').each(function(index, element) {
            var fieldName = $(this).attr('name');
            var newName = fieldName.replace(/_\d+$/, "") + "_" + newIndex;
            $(this).attr('name', newName);
        });
        clonedRow.find('select[name="status"]').attr('name', 'sub_menu_status_' + newIndex);

        clonedRow.appendTo('.sub-menu-fields');

        var removeButton = '<button type="button" class="btn btn-danger remove-btn"><i class="fas fa-times"></i></button>';
        clonedRow.find('.hb-btn-box').append(removeButton);
        clonedRow.find('.clone-btn').remove();
    });

    $(document).on("click", ".remove-btn", function() {
        $(this).closest('.form-row').remove();
    });

    function generateUniqueID() {
        return 'group_' + Math.random().toString(36).substr(2, 9);
    }
});



    </script>



<script>
    $(document).ready(function() {
        $(".clone-btn").on("click", function() {
            var lastRow = $('.sub-menu-fields .form-row:last');
            var clonedRow = lastRow.clone();
            var newIndex = $('.sub-menu-fields .form-row').length;

            clonedRow.find('input, select').each(function () {
                var name = $(this).attr('name');
                if (name) {
                    var newName = name.replace(/\[\d+\]/g, '[' + newIndex + ']');
                    $(this).attr('name', newName);
                }
            });

            // Reset values in text inputs and selects
            clonedRow.find('input[type="text"]').val('');
            clonedRow.find('select').prop('selectedIndex', 0);

            // Set the category for the sub-menu explicitly
            clonedRow.find('input[name^="sub_menus[' + newIndex + '][category]"]').val('Sub Menu');

            clonedRow.appendTo('.sub-menu-fields');
        });

       
        $(document).on("click", ".remove-btn", function() {
            var subMenuId = $(this).closest('.form-row').find('input[name*="[id]"]').val(); // Assuming each sub-menu row has an hidden input with the sub-menu ID
            if (subMenuId) {
                $('#deleted-sub-menus').append('<input type="hidden" name="deleted_sub_menus[]" value="' + subMenuId + '">');
            }
            $(this).closest('.form-row').remove();
        });
    });
</script>
