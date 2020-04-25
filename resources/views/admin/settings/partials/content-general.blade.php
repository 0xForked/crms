<div
    class="tab-pane fade show active"
    id="pills-general"
    role="tabpanel"
    aria-labelledby="pills-general-tab">
    <form id="setting-form" action="{{url('/settings/general')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card" id="settings-card">

            <div class="card-header">
                <h4>General setting form</h4>
            </div>

            <div class="card-body">
                <p class="text-muted">
                    General setting to change site title, description, keyword, etc.
                </p>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site title</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="site_title" class="form-control" value="{{ $settings['site_title']->value }}">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Site description</label>
                    <div class="col-sm-6 col-md-9">
                        <textarea class="form-control h-auto" name="site_description" id="site-description" rows="3">{{ $settings['site_description']->value }}</textarea>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label class="form-control-label col-sm-3 text-md-right">Site logo</label>
                    <div class="col-sm-6 col-md-9">
                        <div class="custom-file">
                            <input type="file" name="site_logo" class="custom-file-input" id="site-logo">
                            <label class="custom-file-label" id="site-logo-label">{{ $settings['site_logo']->value }}</label>
                        </div>
                        <div class="form-text text-muted">Maximum file size is less than 2mb.</div>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label class="form-control-label col-sm-3 text-md-right">Site Favicon</label>
                    <div class="col-sm-6 col-md-9">
                        <div class="custom-file">
                            <input type="file" name="site_favicon" class="custom-file-input" id="site-favicon">
                            <label class="custom-file-label" id="site-favicon-label">{{ $settings['site_favicon']->value }}</label>
                        </div>
                        <div class="form-text text-muted">Maximum file size is less than 128kb.</div>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Analytics code </label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="site_analytics_id" class="form-control" value="{{ $settings['site_analytics_id']->value }}">
                        <div class="form-text text-muted">Code for <a href="https://support.google.com/analytics/answer/7372977?hl=en">google analitics</a> to tract front-office site traffic.</div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-whitesmoke text-md-right">
                <button onclick="showLoading()" type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
            </div>
        </div>
    </form>
</div>
