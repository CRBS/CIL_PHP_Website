<!-- Modal -->
<div id="parameter_imaged_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Parameter imaged</h4>
      </div>
      <div class="modal-body">
        <div id="parameter_imaged_container"></div>

<script>
$(function() {
  $('#parameter_imaged_container').jstree({
    'core' : {
      'data' : {
        "url" : "/ontology_tree/parameter_imaged?lazy",
        "data" : function (node) {
          return { "id" : node.id };
        }
      }
    }
  });
    $('#parameter_imaged_container').on("changed.jstree", function (e, data) {
    console.log(data.instance.get_selected(true)[0].text);
    //console.log(data.instance.get_node(data.selected[0]).text);
    document.getElementById('image_search_parms_parameter_imaged_bim').value = data.instance.get_selected(true)[0].text;
    setCookie('image_search_parms_parameter_imaged_bim', data.instance.get_selected(true)[0].text);
    
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


