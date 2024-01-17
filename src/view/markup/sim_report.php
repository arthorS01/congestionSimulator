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
                    <th>&nbsp;</th>
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
                        <td><img src=<?=SITE_NAME."assets/images/check.png"?> height="20px" width="20px"></td>
                        <td><button class="block-btn"><img src=<?=SITE_NAME."assets/images/missed-call.png"?> heigth="20px" width="20px"></button></td>
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
