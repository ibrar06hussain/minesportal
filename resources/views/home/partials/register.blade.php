<div class="row">
    <div class="col-md-12  bg-info">
        <div class="card-title">
            <h3 class="mt-2 mb-2">Required Documents</h3>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="firm_registration" class="col-sm-6 col-form-label">Firm/Company Registration Certificate:</label>
            <div class="col-sm-6">
                <input id="firm_registration" type="file" name="firm_registration" value="" class="form-control ">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="deed_partnership" class="col-sm-6 col-form-label">Firm/Company Form/MOA/Deed Partnership:</label>
            <div class="col-sm-6">
                <input id="deed_partnership" type="file" name="deed_partnership" value="" class="form-control" placeholder="Enter Your Firm Deed_partnership">
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12  bg-info">
        <div class="card-title">
            <h3 class="mt-2 mb-2">Title Category</h3>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="licence" class="col-sm-6 col-form-label">Type of Concession:</label>
            <div class="col-sm-6">
                <select id="licence" name="licence" class="form-control " fdprocessedid="s6mqn">
                    <option value="">Select Status</option>
                    <option value="Reconnaissance">Reconnaissance License</option>
                    <option value="Exploration">Exploration License</option>
                    <option value="Mineral Deposit Retention">Mineral Deposit Retention License</option>
                    <option value="Minning">Minning lease</option>
                    <option value="Gem Stone Permit">Gem Stone Permit</option>
                    <option value="Registration of Traders">Registration of Traders</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="name_mineral" class="col-sm-6 col-form-label">Mineral:</label>
            <div class="col-sm-6">
            <div class="col-sm-6">
                <select class="form-control " id="name_mineral" name="name_mineral" fdprocessedid="mge2rf">
                    <option value="">Select Mineral</option>
                    @foreach($minerals as $mineral)
                        <option value="{{$mineral->category_id}}">{{$mineral->category_name}}</option>
                    @endforeach
                </select>
            </div>
                <input id="name_mineral" type="text" name="name_mineral" value="" class="form-control " placeholder="Enter Name of Mineral for which title is required" fdprocessedid="z92vz">
            </div>
        </div>
    </div>
    </div>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="location" class="col-sm-6 col-form-label">Site Location:</label>
            <div class="col-sm-6">
                <input id="location" type="text" name="location" value="" class="form-control " placeholder="Enter your Location" fdprocessedid="z92vz">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="covered_area" class="col-sm-6 col-form-label">Covered Area:</label>
            <div class="col-sm-6">
                <input id="covered_area" type="text" name="covered_area" value="" class="form-control " placeholder="Covered Area" fdprocessedid="z92vz">
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="district" class="col-sm-6 col-form-label">Site District:</label>
                        <div class="col-sm-6">
                            <select class="form-control " id="district" name="district" fdprocessedid="mge2rf">
                                <option value="">Select Site District</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->District}}">{{$district->DistrictName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="tehsil" class="col-sm-6 col-form-label">Site Tehsil:</label>
                        <div class="col-sm-6">
                            <select class="form-control " id="tehsil" name="tehsil" fdprocessedid="mge2rf">
                                <option value="">Select Site Tehsil</option>
                            </select>
                        </div>
                    </div>
                </div>
</div>