<section class="main-container">
<input type="hidden" id="active-tab" value="subscribe">

    <div id="subscriber-form">
        <div id="image-container">
            <img src=<?= SITE_NAME."assets/images/add-user.png" ?> alt="subscriber image" height="100px" width="100px">
        </div>

        <div id="form">
            <form name="subscriber_form" method="POST" action="subscriber/">
                <label>
                    Enter user name*
                </label>

                <div class="input-collection">
                    <input type="text" id="fname" name="fname" placeholder="Firstname" id="fname" required> 
                    <input type="text" id="lname" name="lname" placeholder="Lastname" id="lname">
                </div>

                <label>
                    Enter phone number*
                </label>
                <div class="input-collection">
                    <input type="text" id="phonenum"name="phonenum" placeholder="XXX-XXX-XXX-XX">
                   
                    <select id="service-provider" name="service-provider">
                        <option>MTN</option>
                        <option>GLO</option>
                        <option>Airtel</option>
                    </select>
                </div>

                <div>
                   <p class="error-msg"> </p>
                </div>
                <input type="submit" value="Add Subscriber"id="add-subscriber-btn">
            </form>
        </div>
    </div>
</section>