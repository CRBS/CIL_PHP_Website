<!-- Modal -->
<div id="item_type_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Item type</h4>
      </div>
      <div class="modal-body">
        <div id="item_type_tree_container"></div>

<script>
$(function() {
  $('#item_type_tree_container').jstree({
    'core' : {
      'data' : {
        "url" : "/ontology_tree/item_types?lazy",
        "data" : function (node) {
          return { "id" : node.id };
        }
      }
    }
  });
    $('#item_type_tree_container').on("changed.jstree", function (e, data) {
    console.log(data.instance.get_selected(true)[0].text);
    //console.log(data.instance.get_node(data.selected[0]).text);
    document.getElementById('image_search_parms_item_type_bim').value = data.instance.get_selected(true)[0].text;
    setCookie('image_search_parms_item_type_bim', data.instance.get_selected(true)[0].text);
    
    });
});
</script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

