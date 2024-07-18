<section class="main-container">

    <input type="hidden" id="active-tab" value="call-report">
    <h2 id="caption">All calls</h2>
    <div id="table-container">
        <div id="view-selection-pane">
            <ul>
                <li class="active-view"><button title="All simulated calls" id="all-btn" >All <span class="call-count"><?=count($param["all"])?></span></button></li>
                <li><button title="All successful calls" id="successful-btn">Successful <span class="call-count"><?=count($param["successful"])?></span></button></li>
                <li><button title="All blocked calls" id="blocked-btn">Blocked <span class="call-count"><?=count($param["blocked"])?></span></button></li>
            </ul>
        </div>

        <div id="table-view">
            <table>
                <caption>This is the table caption</caption>
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Caller</th>
                        <th>Phone Number</th>
                        <th>Receiver</th>
                        <th>Receiver Phone number</th>
                        <th>Time</th>
                        <th>&nbsp;</th>
                    </tr>
        
                </thead>
        
                <tbody id="all-btn-tbody">
                    <?php foreach($param["all"] as $entry):?>
                    <tr  class="row" data-call-id=<?=$entry["id"]?>>
                        <div>
                            <td><img src=<?=SITE_NAME."assets/images/user.png"?> height="30px" width="30px"></td>
                            <td><?=$entry["name"]?></td>
                            <td><?=$entry["phone_number"]?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("name",$entry["receiver_id"])?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("phone_number",$entry["receiver_id"])?></td>
                            <td><?=$entry["date"]?></td>

                            <td></td>
                        </div>
                    </tr>
                    <?php endforeach;?>
                    
                </tbody>

                <tbody class="hidden" id="successful-btn-tbody">
                    <?php foreach($param["successful"] as $entry):?>
                    <tr class="row" data-call-id=<?=$entry["id"]?>>
                        <div >
                            <td><img src=<?=SITE_NAME."assets/images/user.png"?> height="30px" width="30px"></td>
                            <td><?=$entry["name"]?></td>
                            <td><?=$entry["phone_number"]?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("name",$entry["receiver_id"])?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("phone_number",$entry["receiver_id"])?></td>
                            <td><?=$entry["date"]?></td>

                            <td></td>
                        </div>
                    </tr>
                    <?php endforeach;?>
                    
                </tbody>

                <tbody class="hidden" id="blocked-btn-tbody">

                        
                    <?php foreach($param["blocked"] as $entry):?>
                    <tr>
                        <div>
                            <td><img src=<?=SITE_NAME."assets/images/user.png"?> height="30px" width="30px"></td>
                            <td><?=$entry["name"]?></td>
                            <td><?=$entry["phone_number"]?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("name",$entry["receiver_id"])?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("phone_number",$entry["receiver_id"])?></td>
                            <td><?=$entry["date"]?></td>

                            <td></td>
                        </div>
                    </tr>
                    <?php endforeach;?>
                    
                </tbody>
            </table>
    
        </div>
    </div>
    <div id="user-function-area"> <button class="print-btn">Print</button> </div>
</section>
    