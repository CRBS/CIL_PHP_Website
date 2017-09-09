


<div class="pull-left">
    <div class="pagination_per_page_label">
    Results per page:
    </div>
    <div class="pagination_per_page_select">
    <select id="per_page" name="per_page" onchange="if(this.value){window.location='?k=<?php echo $queryString;  ?>&amp;simple_search=Search&amp;per_page_change=1&amp;per_page='+this.value;}">
    <option value="10">10</option>
    <option value="20">20</option>
    <option value="50">50</option>
    <option value="100" selected="selected">100</option></select>
    </div>
</div>