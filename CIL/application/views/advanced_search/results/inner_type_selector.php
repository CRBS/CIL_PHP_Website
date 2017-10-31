       <div class="refresh_div">
        <div class="image_toggle_container">
        <div class="image_toggle_image">
        </div>
        <div class="image_toggle_text_checkbox">
        <label class="image_toggle_label">
        Still Images
        </label>
        <input id="refresh_still" name="refresh_still" type="checkbox" value="true" <?php 
            if(isset($basic_still) && $basic_still)
                echo "checked";
        ?>>
        </div>
        </div>
        <div class="image_toggle_container">
        <div class="image_toggle_image">
        <img src="/pix/movie.jpg">
        </div>
        <div class="image_toggle_text_checkbox">
        <label class="image_toggle_label">
        Video/Animation
        </label>
        <input id="refresh_video" name="refresh_video" type="checkbox" value="true" <?php 
            if(isset($basic_video) && $basic_video)
                echo "checked";
        ?>>
        </div>
        </div>
        <div class="image_toggle_container">
        <div class="image_toggle_image">
        <img src="/pix/zstack.jpg">
        </div>
        <div class="image_toggle_text_checkbox">
        <label class="image_toggle_label">
        Z-Stack
        </label>
        <input id="refresh_zstack" name="refresh_zstack" type="checkbox" value="true" <?php
            if(isset($basic_zstack) && $basic_zstack)
                echo "checked";
        ?>>
        </div>
        </div>
        <div class="image_toggle_container">
        <div class="image_toggle_image">
        <img src="/pix/clock.jpg">
        </div>
        <div class="image_toggle_text_checkbox">
        <label class="image_toggle_label">
        Time Series
        </label>
        <input id="refresh_time" name="refresh_time" type="checkbox" value="true" <?php
             if(isset($basic_time) && $basic_time)
                echo "checked";
        ?>>
        </div>
        </div>
        <div class="refresh_button_div">
        <input onclick="SearchByDataTypeFilter('<?php echo $base_url;?>','<?php echo $queryString; ?>')" type="button" value="Refresh Results">
        </div>
    </div>


