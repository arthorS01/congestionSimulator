<section class="main-container">

    <input type="hidden" id="active-tab" value="call-report">

    <div id="table-container">
        <div id="view-selection-pane">
            <ul>
                <li class="active-view"><button>All</button></li>
                <li><button>Successful</button></li>
                <li><button>Blocked</button></li>
            </ul>
        </div>

        <div id="table-view">
            <table>
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
        
                <tbody>
                    <?php foreach($param as $entry):?>
                    <tr>
                        <div class="row">
                            <td><img src=<?=SITE_NAME."assets/images/user.png"?> height="30px" width="30px"></td>
                            <td><?=$entry["name"]?></td>
                            <td><?=$entry["phone_number"]?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("name",$entry["receiver_id"])?></td>
                            <td><?= (new \src\controller\Subscribe())->getData("phone_number",$entry["receiver_id"])?></td>
                            <td><?=$entry["date"]?></td>

                            <td><button title="delete" data-call-id=<?=$entry["id"]?> class="delete-btn"><img src=<?=SITE_NAME."assets/images/delete.png"?> heigth="20px" width="20px"></button></td>
                        </div>
                    </tr>
                    <?php endforeach;?>
                    
                </tbody>
            </table>
    
        </div>
    </div>
    <div id="user-function-area"> <button class="print-btn">Print</button> </div>
</section>
    