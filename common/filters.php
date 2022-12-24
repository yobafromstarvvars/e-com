<div class="filters">
    <section class="filter-section">
        <button class="filters-row active">All</button>
        <?php 
            //Every select element (5 of them) should have its own id for the
            // script that does resizing to fit to content won't work
            $filterIDs = array('instrument', 'manufacturer', 'country', 'type');
            for($i=0; $i < count($filterIDs); $i++){
                $_SESSION['filterID'] = $filterIDs[$i];
                include FILTER;
            }
        ?>

        <select  id="width_tmp_select">
            <option id="width_tmp_option"></option>
        </select>
    </section>
</div>