<!-- Modal -->
<div id="biological_process_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Biological process</h4>
      </div>
      <div class="modal-body">
        <div id="biological_tree_container"></div>

<script>
$(function() {
  $('#biological_tree_container').jstree({
    'core' : {
      'data' : {
        "url" : "/ontology_tree/biological_processes?lazy",
        "data" : function (node) {
          return { "id" : node.id };
        }
      }
    }
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

