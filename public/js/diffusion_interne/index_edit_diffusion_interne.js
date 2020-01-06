 //add document to list
 $('#add_piece_btn').on('click', function () {
     data_modes_receptions = getModeReceptions();
     data_documents_types = getDocumentsTypes();

     let i = 0;
     let item_document_type = 0;

     let markup_select_option = '';
     let markup_select_option_document_types = '';

     $('.table-piece tr:last').after(
         '<tr>' +
         '<td> ' +
         '<div class = "form-group"> ' +
         '<input type="text"   name="ref_documents[]" class="form-control" value="sans reference"> ' +
         '</div>' +
         '</td>' +


         '<td> ' +
         '<div class = "form-group"> ' +
         '<input type="text"   name="intitules_documents_fournis[]" class="form-control" value="document sans nom"> ' +
         '</div>' +
         '</td>' +


         '<td>' +
         '<div class="form-group">' +
         '<input type="file" name="documents_ulpoad_documents_fournis[]" class="form-control-file">' +
         '</div>' +
         '</td>' +
         '</tr>'
     );




 })
