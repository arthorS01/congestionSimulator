
   <section class="main-container">
   <input type="hidden" id="active-tab" value="index">
        <section id="user-section">
                <div id="intro-section">
                    <div id="text">
                        <h1>
                            Network Congestion Simulator
                        </h1>
                        <h3>Select a phone number to get Started</h3>
                    </div>
                    
                </div>

                <div id="intro-form">
                    <form action="call/" method="GET">
                        <label>Select a phone number</label>
                        <div class="form-field">
                            <select name="phone-number">
                                <?php foreach($param as $entry): ?>

                                <option><?=$entry["phone_number"]?></option>

                               <?php endforeach;?>
                                
                            </select>
                        </div>
                        <input type="submit" value="done" id="select-phone-number-btn">
                    </form>
                </div>
            </section>
    </section>