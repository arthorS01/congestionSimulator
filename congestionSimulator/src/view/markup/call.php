<section class="main-container">
    <div class="overlay"></div>
    <input type="hidden" id="active-tab" value="call">
    <input type="hidden" id="user-phone" value=<?= $_SESSION["phone-number"] ?> >
    <span id="hidden-span"><?= src\core\App::$session->get("user-name") ?></span>
    <input type="hidden" id="user-name" value=<?= src\core\App::$session->get("user-name") ?> >
    <section id="user-controll-area">

        <div id="user-area">
            <div id="user-details">
                <div id="img">
                    <img src=<?= SITE_NAME."assets/images/user.png" ?> height="200px" width="200px">
                </div>
                <div id="user-info">
                    <h3><?=src\core\App::$session->get("user-name")?></h3>
                    <h4 id="phone-number"><?= $_SESSION["phone-number"] ?></h4>
                </div>
            </div>
            <div id="main-controll-btn-area">
                
                <button class="buttons faint"><img src=<?=SITE_NAME."assets/images/video.png"?> height="30px" width="30px"> </button>
                <button class="buttons" id="simulate-call-btn" title="simulate a call"><img src=<?=SITE_NAME."assets/images/conference.png"?> height="80px" width="80px"> </button>
                <button class="buttons faint"><img src=<?=SITE_NAME."assets/images/voice-search.png"?> height="30px" width="30px"> </button>
            
                
                <div id="settings">
                    <div id="box">
                        <div class="setting-row">
                            <label>Bandwidth</label>
                            <input type="number" id="bandwidth" value="3" min="3">
                        </div>
                        <button class="save-btn">Save</button>
                    </div>
                    <button id="settings-btn"><img src=<?=SITE_NAME."assets/images/settings.png"?> height="20px" width="20px"></button>
                </div>
            </div>
        </div>
       
    </section>
</section>
<div id="simulation-report">
<button><img src=<?=SITE_NAME."assets/images/exit.png"?> height="20px" width="20px"></button> 
        <div id="report">
      
        </div>
</div>