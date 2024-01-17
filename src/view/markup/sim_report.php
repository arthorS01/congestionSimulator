<section class="main-container">
<input type="hidden" id="active-tab" value="sim-report">
    <div id="table-container">
        <table>
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Phone Number</th>
                    <th>User</th>
                    <th>Service Provider</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
    
            </thead>
    
            <tbody>
                <?php foreach($param as $entry):?>
                
                <tr>
                    <div class="row">
                        <td><img src=<?=SITE_NAME."assets/images/user.png"?> height="30px" width="30px"></td>
                        <td><?=$entry["phone_number"]?></td>
                        <td><?=$entry["name"]?></td>
                        <td><?=$entry["service_provider"]?></td>
                        <?php 
                            $status_image;
                            $control_image;
                            $class;

                            if($entry["status"] == 0){
                                $status = "Blocked";
                                $control_image = "check.png";
                                $class = "activate-btn";
                            }else{
                                $control_image = "block.png";
                                $status = "Active";
                                $class = "block-btn";
                            }
                        ?>
                        <td class="report-status"><span><?= $status ?></span></td>
                        <td><button class=<?= $class ?> data-id=<?=$entry["id"]?>><img src=<?=SITE_NAME."assets/images/".$control_image?> heigth="20px" width="20px"></button></td>
                    </div>
                </tr>
                <?php endforeach;?>
                
            </tbody>
        </table>
    
    </div>
    <div id="user-functions">
        <button class="print-btn">Print</button>
    </div>
    </section>
