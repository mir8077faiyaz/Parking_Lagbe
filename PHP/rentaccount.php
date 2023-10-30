<div class="card">
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <h1>Account Settings</h1>
        <form class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">First name</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="" required />
              <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Last name</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="" required />
              <div class="valid-feedback">Looks good!</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationemail">E-mail</label>
              <input type="text" class="form-control" id="validationemail" placeholder="example@gmail.com" required />
              <div class="invalid-feedback">Please enter your e-mail.</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationPhoneNumber">Phone Number</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">+880</span>
                </div>
                <input type="text" class="form-control" id="validationPhoneNumber" placeholder="Phone number" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please enter a valid phone number.
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
          <label class="form-check-label" for="invalidCheck">
            Remind me to leave feedback about where I have parked.
          </label>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Update</button>
      </form>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

    </div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

    </div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

    </div>
  </div>
</div>