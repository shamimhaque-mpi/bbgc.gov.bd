<div class="col-md-9">
    <div class="row single search">
        <h3>Change Present Address</h3>

        <form action="" class="general">

            <div class="col-md-3">
                <div class="row">Village/Town</div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <input type="text" name="present_vill_or_town" value="" placeholder="Vill/Town" required />
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">Post Office</div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <input type="text" name="present_post_office" value="" placeholder="Post Office" required />
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">Police Station</div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <input type="text" name="present_police_station" value="" placeholder="Police Station" required />
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">District</div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <select class="form-control" name="present_district" required >
                        <option value="">-- Select District --</option>
                        <option value="Sunamgang">Sunamgang</option>
                        <option value="Sylhet" >Sylhet</option>
                        <option value="Tangail" >Tangail</option>
                        <option value="Thakurgaon">Thakurgaon</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">Post Code</div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <input type="text" name="present_post_code" value="" placeholder="Post Code" required />
                </div>
            </div>

            <div class="col-md-offset-3 col-md-9">
                <div class="row">
                    <input type="submit" value="Change" name="change_present_address" style="margin-top:5px;" />
                </div>
            </div>
        </form>


        <h3>Change Password</h3>

        <form action="" class="general">

        <div class="col-md-3">
            <div class="row">Old Password</div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <input type="password" name="current_password" placeholder="Current Password" required />
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">New Password</div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <input type="password" name="new_password" placeholder="New Password" required />
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">Confirm New Password</div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <input type="password" name="confirm_password" placeholder="New Password Again" required />
            </div>
        </div>

        <div class="col-md-offset-3 col-md-9">
            <div class="row">
                <input type="submit" value="Save" name="change_password" style="margin-top:5px;" />
            </div>
        </div>
        </form>

        <h3>Change Photo</h3>

            
       <form action="" class="general">

        <div class="col-md-3">
            <div class="row">Your Photo</div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <input type="file" name="photo" required />
            </div>
        </div>

        <div class="col-md-offset-3 col-md-9">
            <div class="row">
                <input type="submit" value="Save" name="change_photo" style="margin-top:5px;" />
            </div>
        </div>
        </form>
        
        
    </div>
</div>