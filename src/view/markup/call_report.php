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
                        <th>&nbsp;</th>
                    </tr>
        
                </thead>
        
                <tbody>
                    <tr>
                        <div class="row">
                            <td><img src=<?=SITE_NAME."assets/images/user.png"?> height="30px" width="30px"></td>
                            <td>John doe</td>
                            <td>080 000 000 00</td>
                            <td>Mercy doe</td>
                            <td>080 565 000 00</td>
                            <td>02:00pm</td>
                            <td><button title="delete" class="delete-btn"><img src=<?=SITE_NAME."assets/images/delete.png"?> heigth="20px" width="20px"></button></td>
                            <td><button title="block line" class="block-btn"><img src=<?=SITE_NAME."assets/images/missed-call.png"?> heigth="20px" width="20px"></button></td>
                        </div>
                    </tr>
        
                    
                </tbody>
            </table>
    
        </div>
    </div>
    <div id="user-function-area"> <button class="print-btn">Print</button> </div>
</section>
    