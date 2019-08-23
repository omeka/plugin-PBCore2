function pbcoreEnsureElements(elementIds) {
    jQuery('form[method=post]').on('submit', function () {
       elementIds.forEach(function (id) {
           var inputs = jQuery('#element-' + id + ' .input :input');
           var hasAnyValues = false;
           inputs.each(function () {
               if (jQuery(this).val() !== '') {
                   hasAnyValues = true;
                   return false;
               }
           });
           if (hasAnyValues) {
               inputs.each(function () {
                   if (jQuery(this).val() === '') {
                       jQuery(this).val('[none]');
                   }
               });
           }
       });
    });
}
