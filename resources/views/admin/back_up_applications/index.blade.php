@extends('layouts.leaseApplications')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
@yield('css')
<style>
:root {
  --marineBlue: hsl(213, 96%, 18%);
  --purplishBlue: hsl(243, 100%, 62%);
  --pastelBlue: hsl(228, 100%, 84%);
  --lightBlue: hsl(206, 94%, 87%);
  --strawberryRed: hsl(354, 84%, 57%);
  --coolGray: hsl(231, 11%, 70%);
  --lightGray: hsl(229, 24%, 87%);
  --magnolia: hsl(217, 100%, 97%);
  --alabaster: hsl(231, 100%, 99%);
  --white: hsl(0, 0%, 100%);
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}



.formParentWrapper {
  display: flex;
  flex-direction: row;
  min-width: 65%;
  min-height: 520px;
  border-radius: 14px;
  padding: 12px;
  background-color: var(--white);
  margin-top: 20px;
}

.steps {
  display: flex;
  flex-direction: column;
  ;
  gap: 24px;
  width: 30%;
  padding: 28px;
  object-fit: cover;
  background-repeat: no-repeat;
  background-position-y: center;
  border-radius: 12px;
  padding-block: 32px;
}
.step {
    cursor: pointer; /* Makes the step clickable */
}
@media all and (max-width: 630px) {

  body {
    margin: 0;
    padding: 0;

    /* background-color: var(--pastelBlue); */
    background: linear-gradient(135deg, #435463, #6a798f, #91a0b6, #b8c8de, #dfeef8);

    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;

    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .formParentWrapper {
    display: flex;
    flex-direction: column;
    width: 100%;
    min-height: 520px;
    border-radius: 14px;
    padding: 0;
    margin-top: 0px;
    /* background-color: var(--pastelBlue) !important; */
    background: linear-gradient(135deg, #435463, #6a798f, #91a0b6, #b8c8de, #dfeef8);

  }



  .steps {
    display: flex;
    flex-direction: row;
    align-items: flex-start !important;
    justify-content: center !important;
    gap: 0;
    width: 100% !important;
    padding-inline: 28px;
    /* background-image: url(assets/images/bg-sidebar-mobile.svg); */
    /* background-image: url("https://multi-step-form98.netlify.app/assets/bg-sidebar-mobile.f8e29a05.svg"); */
    background-image: url("https://img.freepik.com/free-photo/golden-rectangular-frame-abstract-background_53876-165442.jpg?t=st=1719859232~exp=1719862832~hmac=a7153bd7e77bd1ce1d15268f6f7d85ffa260c4e80b806345b2ae731af7142acf&w=996");
    background-repeat: repeat-x;
    object-fit: cover;
    -o-object-fit: cover !important;
    background-position: top;
    background-size: cover;
    border-radius: 0;
    min-height: 180px !important;
  }

  .rightSectionParent {
    position: absolute;
    top: 82px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    align-self: center;
    border-radius: 12px;
    gap: 24px;
  }

  .rightSectionWrapper {
    width: 92% !important;
    align-self: center;
    background-color: var(--white);
    border-radius: 12px;
    padding-block: 32px;
    padding-bottom: 40px;
  }

  .mainForm {
    display: flex;
    flex-direction: column;
    gap: 24px;
    padding-inline: 24px;
  }

  .info {
    display: none;
  }

  .btnWrapper {
    width: 100% !important;
    background-color: var(--white);
    padding-bottom: 0 !important;
    padding-inline: 14px;
    padding-block: 16px !important;
  }

  .planParent {
    flex-direction: column !important;
  }

  .plan {
    padding-top: 24px !important;
    flex-direction: row !important;
    gap: 16px !important;
    min-height: 90px !important;
  }

  .checkBoxInfo {
    gap: 16px !important;
  }

  .thankMsg {
    max-width: 375px !important;
    padding-inline: 16px;
  }

  .thankContainer {
    align-items: center !important;
  }

  .label {
    display: none;
  }

}

.step {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  align-items: center;
  display: flex;
  flex-direction: row;
  justify-content: center;
  border: 1px solid var(--white);
  color: white;
}

.step.active {
  background-color: var(--lightBlue);
  border: 1.875px solid var(--lightBlue);
  color: var(--marineBlue);
}

.stepInfo {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 20px;
}

.lastStep {
  visibility: hidden;
}

.label {
  font-size: 10px;
  color: var(--lightGray);
  font-weight: 400;
}

.info {
  margin-top: 4px;
  color: var(--white);
  font-weight: 550;
  font-size: 12px;
  letter-spacing: 1px;
}

.rightSectionParent {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  flex: 1;
}

.rightSectionWrapper {
  margin-top: 32px;
  width: 75%;
  align-self: center;
}

.formContainer {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.mainForm {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.personal {
  font-size: 20px;
  font-weight: 700;
  font-variant: normal;
  margin-bottom: 8px;
  color: var(--marineBlue);
}

.personalInfo {
  color: var(--coolGray);
  font-size: 14px;
  font-weight: 450;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.fieldParent input {
  width: 100%;
  padding-inline: 8px;
  padding-block: 12px;
  border-radius: 8px;
  border: 1.5px solid var(--lightGray);
  outline: none;
  font-size: 14px;
  font-weight: 600;
  color: var(--marineBlue);
  cursor: pointer;
}

.fieldParent input:focus {
  border: 1.5px solid var(--purplishBlue);
}

.fieldParent input::placeholder {
  color: var(--coolGray);
  font-size: 14px;
  font-weight: 550;
}

.labelErrorParent {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 0.5rem;
  align-items: center;
}

label {
  font-weight: 500;
  font-size: 14px !important;
  color: var(--marineBlue) !important;
}

input[type=number] {
  appearance: textfield;
}

.error {
  display: none;
  color: var(--strawberryRed);
  font-weight: 600;
}

.showError {
  display: block;
  font-weight: 600;
  font-size: 14px;
}

.borderError {
  border: 1.875px solid var(--strawberryRed) !important;
}

.hide {
  display: none;
}

.blue {
  color: var(--marineBlue) !important;
  font-size: 12px;
}

.hideBtn {
  visibility: hidden;
}

.showPrice {
  display: block;
}

.btnWrapper {
  width: 75%;
  display: flex;
  flex-direction: row;
  align-items: center;
  align-self: center;
  justify-content: space-between;
  padding-bottom: 16px;
}

.next {
  width: 100px;
  font-size: 14px;
  padding-inline: 4px;
  height: 44px;
  border-radius: 5px;
  font-weight: 700;
  color: var(--white);
  background-color: var(--marineBlue);
  border: 1px solid var(--marineBlue);
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all ease-out 0.2s;
}

.next.confirm {
  background-color: var(--purplishBlue) !important;
  border: 1px solid var(--purplishBlue) Im !important;
}

.prev {
  color: var(--coolGray);
  font-weight: 700;
  cursor: pointer;
  transition: all ease-out 0.2s;
}

.prev:hover {
  color: var(--marineBlue);
}

.prev:active {
  transform: translateY(2px);
}

button:active {
  transform: translateY(2px);
}

.planParent {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  gap: 16px;
  margin-top: 16px;
}

.plan {
  padding: 16px;
  border-radius: 8px;
  background-color: var(--white);
  cursor: pointer;
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 40px;
  min-height: 100px;
  border: 1.875px solid var(--lightGray);
  box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 0px 0px;
}

.price {
  font-weight: 500;
  color: gray;
}

.plan img {
  width: 32px;
  height: 32px;
}

.planTitle {
  font-weight: 700;
  color: var(--marineBlue);
}

.innerPlan {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.plan.border {
  border: 1.875px solid var(--purplishBlue);
  background-color: var(--magnolia);
}


.random {
  font-size: 14px;
  color: var(--coolGray);
  font-weight: 500;
}

/* Check Box UI*/

.planTypeParent {
  display: flex;
  flex-direction: row;
  justify-content: center;
  gap: 24px;
  align-items: center;
  margin-top: 16px;
}

.switchType {
  color: var(--coolGray);
  font-weight: 700;
}

.activeType {
  color: var(--marineBlue);
}

.switch {
  position: relative;
  display: inline-block;
  width: 48px;
  height: 24px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: var(--marineBlue);
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: var(--white);
  -webkit-transition: .4s;
  transition: .4s;
}

input[type="checkbox"]:checked+.slider::before {
  -webkit-transform: translateX(24px);
  -ms-transform: translateX(24px);
  transform: translateX(24px);
}

.slider.round {
  border-radius: 16px;
}

.slider.round::before {
  border-radius: 50%;
}

/* Check Boxes*/
.checkBoxesParent {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.checkBoxContainer {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding: 16px;
  border-radius: 8px;
  border: 1.875px solid var(--lightGray);
  cursor: pointer;
}

.checkBoxInfo {
  display: flex;
  gap: 24px;
  cursor: pointer;
}

.checkBoxInfo p {
  margin: 0;
  margin-block: 4px;
  align-items: center;
}

.checkBoxContainer.cardBorder {
  border: 1.875px solid var(--purplishBlue);
  background-color: var(--alabaster);
}

.checkBoxInfo input[type="checkbox"] {
  width: 20px;
  height: 20px;
  border-radius: 4px;
  vertical-align: middle;
  cursor: pointer;
  accent-color: var(--purplishBlue);
  margin-top: 8px;
  border: 1.875px solid var(--lightGray) !important;
}

.addTitle {
  font-weight: 700;
  color: var(--marineBlue);
}

.addOnPrice {
  color: var(--purplishBlue);
  font-weight: 600;
}

/* Summary  */

.billingContainer {
  display: flex;
  flex-direction: column;
  gap: 16px;
  border-radius: 8px;
}

.billingParent {
  display: flex;
  width: 100%;
  flex-direction: column;
  padding: 24px;
  background-color: var(--magnolia);
  border-radius: 8px;
}

.planInfo {
  display: flex;
  justify-content: space-between;
  border-bottom: 1.875px solid var(--lightGray);
  padding-bottom: 20px;
}

.planInfo p {
  margin: 0;
}

.selectedPlan {
  font-weight: 700;
  font-size: 14px;
  color: var(--marineBlue);
}

.billingContainer {
  margin-top: 16px;
}

.selectedPlanBill {
  color: var(--marineBlue);
  font-weight: 700;
  font-size: 14px;
}

.changeLink {
  text-decoration: underline;
  cursor: pointer;
  color: var(--coolGray);
  font-weight: 500;
  padding-top: 4px;
}

.changeLink:hover {
  color: var(--purplishBlue);
}

.ON {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.ON p {
  margin: 0;
}

.totalBill {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 20px;
  padding-top: 8px;
}

.planError {
  color: var(--strawberryRed);
  display: none;
  font-weight: 700;
  margin-bottom: -8px;
}

.dynamicData {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding-top: 16px;
}

.adTitle {
  color: var(--coolGray);
  font-weight: 500;
  font-size: 14px;
  margin-left: 4px;
}

.adPrice {
  color: var(--marineBlue);
  font-weight: 500;
  font-size: 14px;
}

.finalPrice {
  color: var(--purplishBlue);
  font-size: 20px;
  font-weight: 700;
}

/*Thank you*/
.thankContainer {
  min-height: 300px;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  justify-content: center;
}

.thankParent {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
}

.thankParent img {
  width: 64px;
  height: 64px;
}

.thankyou {
  font-size: 32px;
  font-weight: 700;
  margin-top: 12px;
}

.thankMsg {
  max-width: 390px;
  text-align: center;
  font-size: 14px;
  color: var(--coolGray);
  font-weight: 450;
  line-height: 20px;
}
</style>
@section('content')
<!-- Content Header (Page header) -->

<!-- /.content-header -->

    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                <p>{{ session('status') }}</p>
                    </div>
                @endif
                <div class="formParentWrapper">

                    <div class="steps bg-info">

                      <div class="stepInfo" onclick="showStep(1)">
                        <div class="step active" data-step="1">1</div>
                        <div>
                          <p class="label">STEP 1</p>
                          <p class="info">Submit application, fee, and company documents</p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(2)">
                        <div class="step" data-step="2">2</div>
                        <div>
                          <p class="label">STEP 2</p>
                          <p class="info">Map preparation and overlap check by the surveyor</p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(3)">
                        <div class="step" data-step="3">3</div>
                        <div>
                          <p class="label">STEP 3</p>
                          <p class="info">Submit required documents to the concerned district AD</p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(4)">
                        <div class="step" data-step="4">4</div>
                        <div>
                          <p class="label">STEP 4</p>
                          <p class="info">Forward complete cases to Director</p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(5)">
                        <div class="step" data-step="5">5</div>
                        <div>
                          <p class="label">STEP 5</p>
                          <p class="info">Place complete cases to Mines Committee </p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(6)">
                        <div class="step" data-step="6">6</div>
                        <div>
                          <p class="label">STEP 6</p>
                          <p class="info">Submit Mines Committee recommendation to Secretary, MICL</p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(7)">
                        <div class="step" data-step="7">7</div>
                        <div>
                          <p class="label">STEP 7</p>
                          <p class="info">Grant of approval by Licensing Authority</p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(8)">
                        <div class="step" data-step="8">8</div>
                        <div>
                          <p class="label">STEP 8</p>
                          <p class="info">Signing of Minerals Agreement by applicant </p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(9)">
                        <div class="step" data-step="9">9</div>
                        <div>
                          <p class="label">STEP 9</p>
                          <p class="info">Submit NOCs, fees, deposit, guarantee, bank statement, and rent </p>
                        </div>
                      </div>

                      <div class="stepInfo" onclick="showStep(10)">
                        <div class="step" data-step="10">10</div>
                        <div>
                          <p class="label">STEP 10</p>
                          <p class="info">Step-10 Issue of work order </p>
                        </div>
                      </div>

                      <div class="step lastStep" data-step="11">11</div>

                    </div>

                    <div class="rightSectionParent">
                      <div class="rightSectionWrapper">
                        <div class="formContainer" data-step="1">
                            <div class="mainForm">
                              <div>
                              <p class="personal">Step-1. Submission of application along with application processing fee and company documents</p>
                                <p class="">
                                  <ul class="personalInfo">
                                      <li>
                                          Application Processing Fee (APF): Rs 50,000 (non-refundable).
                                      </li>
                                      <li>
                                          Company Documents:
                                          <ul>
                                              <li>
                                                  If the applicant is a company, the required documents are the Registration Documents from SECP.
                                              </li>
                                              <li>
                                                  If the applicant is a firm, the required documents are Form-C of the firm.
                                              </li>
                                          </ul>
                                      </li>
                                  </ul>
                                  </p>
                                <p></p>
                                <p class="personal">Step-1. Status &amp; Progress</p>
                                  <div class="card card-secondary">
                                    <div class="card-header">
                                      <h3 class="card-title">Application progress at Applicant Level</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      <form>
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                              <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input custom-control-input-success" type="checkbox" id="customCheckbox4" checked disabled>
                                                <label for="customCheckbox4" class="custom-control-label">Application Registered</label>
                                              </div>
                                              <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input custom-control-input-success" type="checkbox" id="customCheckbox4" checked disabled>
                                                <label for="customCheckbox4" class="custom-control-label">Coordinates Added</label>
                                              </div>
                                              <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input custom-control-input-success" type="checkbox" id="customCheckbox4" checked disabled>
                                                <label for="customCheckbox4" class="custom-control-label">Challan Generated</label>
                                              </div>
                                              <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input custom-control-input-success" type="checkbox" id="customCheckbox4" checked disabled>
                                                <label for="customCheckbox4" class="custom-control-label">Fee Submitted & Challan Uploaded</label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  </div>
                              </div>
                        </div>

                        <div class="formContainer hide" data-step="2">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-2: Checking of overlapping and preparation of map by departmental surveyor</p>
                              <p class="personalInfo">Checking of overlapping and preparation of map by departmental surveyor</p>
                            </div>
                            <div class="callout callout-danger">
                            <h5>Surveyor Recommendations</h5>
                            <p>The coordinates are fine and only 5% of the land is overlapping</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Application progress at Surveyor Level</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Received By Surveyor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Coordinates Examined</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Forwarded the application to AC Office with Recommendations</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                                  <!-- /.card-body -->
                            </div>
                          </div>
                        </div>

                        <div class="formContainer hide" data-step="3">

                          <div class="mainForm">

                            <div>
                              <p class="personal">Step-3. Submission of all required documents as per check list to AD concerned district</p>
                              <p class="personalInfo">Upon submission of all required documents as per the checklist to the Assistant Director (AD) of the concerned district, the AD will thoroughly review the application. This includes verifying that all necessary documents, such as the application form, fees, area map, company registration certificates, and financial statements, have been submitted in compliance with the relevant rules and regulations. The AD will also check that the documents are properly attested and ensure that the company meets the required capital and financial thresholds, whether for small or large-scale operations.</p>
                            </div>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
                                  Click to see check list
                                </button>
                            <div class="callout callout-danger">
                            <h5>Assistant Director Recommendations</h5>
                            <p>No recommendation received yet</p>
                            </div>
                                  <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <h5>CHECKLIST FOR APPLICATION</h5>
                                        <ol>
                                          <li>Application Form fee of Rs. 2000/- containing all information/data about the Company as required under rules 23, sub rule (1).</li>
                                          <li>Bank Receipt of application processing Fee of Rs.50000/-</li>
                                          <li>Area Map (15 copies) attested by the concerned AD of the Directorate and Director/M. D/C.E. O of the Company.</li>
                                          <li>Verified Company Registration Certificate (Article of Memorandum) from SECP, and at least one GB member in the Board for International and National Companies.</li>
                                          <li>Capital cost (Paid of Capital) should be 1.000 Million for small scale and 2.000 Million for large scale.</li>
                                          <li>Financial Resources (Bank statement) of Rs. 1.000 Million for small scale, Rs. 2.000 Million for large scale, for each Company case.</li>
                                          <li>Appointment letter of Geologist.</li>
                                          <li>CV of Geologist.</li>
                                          <li>Attested copy of Degree of Geologist.</li>
                                          <li>Geological Description of the concerned area.</li>
                                          <li>Work Program/Plan.</li>
                                          <li>Realistic business plan for Rs. 20 Million investment for large scale.</li>
                                          <li>Anticipated environmental impact and measures to minimize adverse effects.</li>
                                          <li>List of available Machinery/Equipment as required.</li>
                                          <li>List of hired human resources.</li>
                                        </ol>
                                        
                                        <h5>CHECKLIST FOR RECONNAISSANCE LICENSE</h5>
                                        <ol>
                                          <li>Application Form fee of Rs. 2000/- with Company data as per rules 23, sub rule (1).</li>
                                          <li>Application processing Fee receipt of Rs. 50000/-</li>
                                          <li>15 copies of Area Map, attested by the concerned AD and Director/M.D/C.E.O of the Company.</li>
                                          <li>Verified Company Registration Certificate from SECP, with one GB member in the Board.</li>
                                          <li>Capital cost should be 1.000 Million for small scale and 2.000 Million for large scale.</li>
                                          <li>Financial Resources (Bank statement) for Rs. 1.000 Million for small scale, Rs. 2.000 Million for large scale.</li>
                                          <li>Appointment letter of Geologist.</li>
                                          <li>CV of Geologist.</li>
                                          <li>Attested Degree of Geologist.</li>
                                          <li>Geological Description.</li>
                                          <li>Work Program/Plan.</li>
                                          <li>Realistic business plan for Rs. 20 Million investment for large scale.</li>
                                          <li>Anticipated environmental impact and mitigation measures.</li>
                                          <li>List of available Machinery/Equipment.</li>
                                          <li>List of hired human resources.</li>
                                        </ol>
                                        
                                        <h5>CHECKLIST FOR MINERAL DEPOSIT RETENTION LICENSE</h5>
                                        <ol>
                                          <li>Application Form fee of Rs. 2000/- with all Company information as per rules 23, sub rule (1).</li>
                                          <li>Application processing Fee receipt of Rs. 50000/-</li>
                                          <li>15 copies of Area Map attested by the AD and Director/M.D/C.E.O of the Company.</li>
                                          <li>Verified Company Registration Certificate from SECP, with one GB member in the Board.</li>
                                          <li>Capital cost of 1.000 Million for small scale and 2.000 Million for large scale.</li>
                                          <li>Financial Resources (Bank statement) of Rs. 1.000 Million for small scale, Rs. 2.000 Million for large scale.</li>
                                          <li>Appointment letter of Geologist.</li>
                                          <li>CV of Geologist.</li>
                                          <li>Attested Degree of Geologist.</li>
                                          <li>Geological Description.</li>
                                          <li>Work Program/Plan.</li>
                                          <li>Realistic business plan for Rs. 20 Million investment for large scale.</li>
                                          <li>Environmental impact and mitigation measures.</li>
                                          <li>Machinery/Equipment List.</li>
                                          <li>Hired human resources list.</li>
                                        </ol>

                                        <h5>CHECKLIST FOR MINING LEASE</h5>
                                        <ol>
                                          <li>Application Form fee of Rs. 2000/- with all required Company information.</li>
                                          <li>Bank Receipt of application processing Fee of Rs. 50000/-</li>
                                          <li>15 copies of Area Map, attested by the AD and Director/M.D/C.E.O of the Company.</li>
                                          <li>Verified Company Registration Certificate from SECP.</li>
                                          <li>Capital cost of 1.000 Million for small scale and 2.000 Million for large scale.</li>
                                          <li>Financial Resources (Bank statement) of Rs. 1.000 Million for small scale, Rs. 2.000 Million for large scale, for each case.</li>
                                          <li>Appointment letter of Geologist/Mining Engineer.</li>
                                          <li>C.V. of Geologist/Mining Engineer.</li>
                                          <li>Attested Degree of Geologist/Mining Engineer.</li>
                                          <li>Geological Report produced during exploration.</li>
                                          <li>Work Program/Plan.</li>
                                          <li>Realistic business plan for Rs. 20 Million investment for large scale Mining.</li>
                                          <li>Realistic plan for Rs. 30 Million investment for explored area of metallic Minerals; Rs. 10 Million for Dimension Stones & Industrial Minerals.</li>
                                          <li>Environmental impact assessment report, including hazards, safety, risk, as per rule 44 sub rule 2 (g)-(i).</li>
                                          <li>Machinery/Equipment List for mining operation.</li>
                                          <li>Hired human resources list.</li>
                                          <li>Provisional NOC from GB-EPA, and final NOC from GB-EPA and Forest Department before work order issuance.</li>
                                        </ol>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                  <div class="card card-secondary">
                                <div class="card-header">
                                  <h3 class="card-title">Application progress at AD Office</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <form>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <!-- checkbox -->
                                        <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                            <label for="customCheckbox4" class="custom-control-label">Application reached AD Office from Surveyor</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                            <label for="customCheckbox4" class="custom-control-label">Documents Verified By AD Office</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4">
                                            <label for="customCheckbox4" class="custom-control-label">Application Sent to Director Office</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.card-body -->
                              </div>
                          </div>
                        </div>

                        <div class="formContainer hide" data-step="4">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-4: Forward complete cases to Director</p>
                              <p class="personalInfo">After receiving the completed case from the Assistant Director, the Director will review the submitted documents to ensure they meet all necessary requirements. Once the review is complete, the Director will forward the case to the Mines Committee for further evaluation and decision-making. The Director's role includes confirming that the application is thoroughly verified by the surveyor, and that all aspects of the application, including technical, financial, and regulatory compliance, are in order before it proceeds to the committee.</p>
                            </div>
                            <div class="callout callout-danger">
                            <h5>Director Recommendations</h5>
                            <p>No recommendation received yet</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Application progress at Director Office</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Received By Director MICL</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Reviewed</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Forwarded the application to Mines Committee</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        </div>
                        </div>
                        <!--Step 5 Starts -->
                        <div class="formContainer hide" data-step="5">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-5 Place complete cases to Mines Committee</p>
                              <p class="personalInfo">The Mines Committee is a key decision-making body responsible for evaluating and approving applications related to mining and exploration licenses. Comprised of experts and representatives from various relevant departments, the committee plays a critical role in assessing the technical, financial, and environmental aspects of each application.</p>
                            </div>
                            <div class="callout callout-danger">
                            <h5>Committee Recommendations</h5>
                            <p>No recommendation received yet</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Application progress at Committee Level</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Received By Mines Committee</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Reviewed</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Forwarded the recommendations to Licensing Authority (Secretary MICL, GB)</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        </div>
                        </div>
                      <!--Step 5 Ends -->

                      <!--Step 6 Starts -->
                      <div class="formContainer hide" data-step="6">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-6 Submission of mines Committee recommendation to Licensing Authority (Secretary MICL, GB)</p>
                              <p class="personalInfo">At this stage, the Mines Committee has completed its thorough evaluation of the application and submitted its recommendation to the Licensing Authority, represented by the Secretary of Mines and Mineral Concessions Licensing (MICL), Gilgit-Baltistan. The recommendation reflects the committee’s assessment of the technical, financial, and environmental compliance of the applicant, along with their proposed mining or exploration activities.</p>
                            </div>
                            <div class="callout callout-danger">
                            <h5>Licensing Authority Recommendations</h5>
                            <p>No recommendation received yet</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Application progress at Licensing Authority Level</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Received By Licensing Authority</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Reviewed</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Application Approved</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        </div>
                        </div>
                      <!--Step 6 Ends -->

                      <!--Step 7 Starts -->
                      <div class="formContainer hide" data-step="7">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-7 Grant of approval by Licensing Authority</p>
                              <p class="personalInfo">The Licensing Authority, represented by the Secretary MICL, Gilgit-Baltistan, grants the final approval for the mining or exploration license. This approval is based on a comprehensive review of the Mines Committee's recommendations, the submitted documents, and the applicant's compliance with all legal and regulatory requirements.</p>
                            </div>
                            <div class="callout callout-danger">
                            <h5>Final Comments</h5>
                            <p>No comments received yet</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Grant Approval Checklist</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-default" type="checkbox" id="customCheckbox4" >
                                          <label for="customCheckbox4" class="custom-control-label">Grant approval by Licensing Authority</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        </div>
                        </div>
                      <!--Step 7 Ends -->

                      <!--Step 8 Starts -->
                      <div class="formContainer hide" data-step="8">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-8 Signing of Minerals Agreement by applicant</p>
                              <p class="personalInfo">The applicant signs the Minerals Agreement, formalizing their commitment to adhere to the terms and conditions set forth by the Licensing Authority. This agreement outlines the rights and responsibilities of the applicant, including operational guidelines, environmental safeguards, and financial obligations. Signing the agreement marks the final step before commencing mining or exploration activities, ensuring legal and regulatory compliance throughout the project.</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Mineral Agreement Upload</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Upload Minerals Agreement</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        </div>
                        </div>
                      <!--Step 8 Ends -->

                      <!--Step 9 Starts -->
                      <div class="formContainer hide" data-step="9">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-9 Submission of NOCs and required fee (A. granting fee and other fee), Security Deposit, Performance Guarantee, Closing Bank statement, yearly rent.</p>
                              <p class="personalInfo">The applicant submits the necessary NOCs, along with the required fees (including the granting fee and any additional charges), security deposit, performance guarantee, closing bank statement, and annual rent. These submissions are essential to fulfill the financial and legal obligations before the commencement of mining or exploration activities.</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">NOC Upload</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Upload NOC from wildlife/forester Department </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Upload NOC from EPA GB</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#step8">
                                      Fee Structure Details
                          </button>
                          <div class="modal fade" id="step8" tabindex="-1" role="dialog" aria-labelledby="step8Title" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="step8LongTitle">Fee Structure Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          <table class="table table-stripped table-bordered" border="1">
                                              <thead>
                                                <tr>
                                                  <th>S#</th>
                                                  <th>Category</th>
                                                  <th>New Fee</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td>Reconnaissance License</td>
                                                  <td>Rs. 50,000 Local & National, Rs. 100,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td>3</td>
                                                  <td>Mineral Deposit Retention License</td>
                                                  <td>Rs. 100,000 Local & National, Rs. 150,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="3">4</td>
                                                  <td>Exploration License (Small scale)</td>
                                                  <td>Rs. 150,000 Local & National, Rs. 200,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td>Exploration License (Medium scale)</td>
                                                  <td>Rs. 200,000 Local & National, Rs. 300,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td>Exploration License (Large scale)</td>
                                                  <td>Rs. 300,000 Local & National, Rs. 400,000 International Investor (as Joint Venture)</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="3">5</td>
                                                  <td>Mining Lease (Small scale)</td>
                                                  <td>Rs. 200,000 Local & National, Rs. 300,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td>Mining Lease (Medium scale)</td>
                                                  <td>Rs. 400,000 Local & National, Rs. 500,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td>Mining Lease (Large scale)</td>
                                                  <td>Rs. 600,000 Local & National, Rs. 700,000 International Investor</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3"><strong>Other Fees:</strong></td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>Demarcation Fee</td>
                                                  <td>Rs. 7,000</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td>Demarcation Fine</td>
                                                  <td>Rs. 10,000 Up to 100,000</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td>Joint Venture Fee (JV)</td>
                                                  <td>Rs. 50,000 Local, National, Rs. 100,000 International</td>
                                                </tr>
                                                <tr>
                                                  <td>3</td>
                                                  <td>Application Fee for assignment/transfer of mineral title</td>
                                                  <td>Rs. 200,000 Local & National, Rs. 400,000 International</td>
                                                </tr>
                                                <tr>
                                                  <td>4</td>
                                                  <td>Form Fee</td>
                                                  <td>Rs. 2,000</td>
                                                </tr>
                                                <tr>
                                                  <td>5</td>
                                                  <td>Tender Form Fee for auction of minerals and area</td>
                                                  <td>Rs. 10,000</td>
                                                </tr>
                                                <tr>
                                                  <td>6</td>
                                                  <td>Amendment Fee for:</td>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>a. Reconnaissance License</td>
                                                  <td>Rs. 50,000 (Small), Rs. 100,000 (Medium), Rs. 200,000 (Large)</td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>b. Exploration License</td>
                                                  <td>Rs. 200,000 (Small), Rs. 300,000 (Medium), Rs. 400,000 (Large)</td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>c. Mineral Deposit Retention License</td>
                                                  <td>Rs. 200,000 (Small), Rs. 300,000 (Medium), Rs. 400,000 (Large)</td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>d. Mining Lease</td>
                                                  <td>Rs. 400,000 (Small), Rs. 500,000 (Medium), Rs. 600,000 (Large)</td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>e. Minor Amendments (Address, person to title company etc.)</td>
                                                  <td>Rs. 12,000</td>
                                                </tr>
                                                <tr>
                                                  <td>7</td>
                                                  <td>Appeal Fee before “Appellate Authority (Chief Secretary GB)</td>
                                                  <td>Rs. 6,000</td>
                                                </tr>
                                                <tr>
                                                  <td>8</td>
                                                  <td>Fee for Registration Card Renewal</td>
                                                  <td>Rs. 10,000/year (New), Rs. 5,000/year (Renewal)</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3"><strong>Security Deposit:</strong></td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td>License</td>
                                                  <td>Rs. 100/Acre Local/National, Rs. 150/Acre International</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td>Lease</td>
                                                  <td>Varies (See details)</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3"><strong>Performance Guarantees:</strong></td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td>Reconnaissance License, Mineral Deposit Retention License</td>
                                                  <td>Rs. 100,000 (Local & National), Rs. 300,000 (International)</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td>Exploration License (Small, Medium, Large)</td>
                                                  <td>Varies (See details)</td>
                                                </tr>
                                                <tr>
                                                  <td>3</td>
                                                  <td>Mining Lease</td>
                                                  <td>Rs. 400,000 to 600,000 Local & National, Rs. 500,000 to 700,000 International</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3"><strong>Closing Balance of Bank Statement:</strong></td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td>Reconnaissance License</td>
                                                  <td>Varies (See details)</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td>Exploration License (Small, Medium, Large)</td>
                                                  <td>Rs. 1,000,000 to 4,000,000 Local & National, Rs. 10,000,000 to 40,000,000 International</td>
                                                </tr>
                                                <tr>
                                                  <td>3</td>
                                                  <td>Mining Lease</td>
                                                  <td>Rs. 5,000,000 to 15,000,000 Local & National, Rs. 30,000,000 to 50,000,000 International</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3"><strong>Yearly Rent:</strong></td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td>Reconnaissance License</td>
                                                  <td>Rs. 400 Local & National, Rs. 600 International (1 year)</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td>Exploration License (First & Second Renewal)</td>
                                                  <td>Varies by scale and investor type (See details)</td>
                                                </tr>
                                                <tr>
                                                  <td>3</td>
                                                  <td>Mineral Deposit Retention License</td>
                                                  <td>Varies by scale and investor type (See details)</td>
                                                </tr>
                                                <tr>
                                                  <td>4</td>
                                                  <td>Mining Lease</td>
                                                  <td>Varies by scale and investor type (See details)</td>
                                                </tr>
                                              </tbody>
                                            </table>

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        </div>
                        </div>
                      <!--Step 9 Ends -->
<!--Step 10 Starts -->
                        <div class="formContainer hide" data-step="10">
                          <div class="mainForm">
                            <div>
                              <p class="personal">Step-10 Issue of work order</p>
                              <p class="personalInfo">The Issue of Work Order takes place after the applicant has submitted all required documents, fees, and guarantees. Upon verification and approval by the Licensing Authority, a formal work order is issued. This document grants the applicant the official authorization to commence operations related to exploration or mining activities as per the terms and conditions specified in the minerals agreement. The work order outlines the scope of work, timelines, and obligations of the license holder.</p>
                            </div>
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Work Order Upload</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <form>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <!-- checkbox -->
                                      <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Upload Work Order</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.card-body -->
                        </div>
                        </div>
                        </div>
                      <!--Step 10 Ends -->
                        <div class="formContainer hide" data-step="11">

                          <div class="thankContainer">

                            <div class="thankParent">
                              <img src="/assets/images//icon-thank-you.svg" alt="">
                              <p class="thankyou">Finish!</p>
                              <p class="thankMsg">Your Lease application life cycle ends here</p>
                            </div>


                          </div>

                        </div>
                      </div>
                    </div>

                  </div>

                  </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('scripts')
<script>
    function showStep(stepNumber) {
  // Get all the step elements
  const steps = document.querySelectorAll('.step');
  const contentSteps = document.querySelectorAll('.formContainer');
  // Loop through all steps to hide and deactivate them
  steps.forEach(step => {
    step.classList.remove('active');  // Remove active class
  });
  contentSteps.forEach(contentStep => {
    contentStep.classList.add('hide');  // Remove active class
  });


  // Now activate the current step based on the stepNumber
  const currentStep = document.querySelector(`.step[data-step="${stepNumber}"]`);
  const formStep = document.querySelector(`.formContainer[data-step="${stepNumber}"]`);
  if (currentStep) {
    currentStep.classList.add('active');  // Add active class to the clicked step
    formStep.classList.remove('hide'); 
  }
}
</script>
@endpush
