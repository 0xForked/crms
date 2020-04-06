<div
    class="tab-pane fade"
    id="pills-backup"
    role="tabpanel"
    aria-labelledby="pills-backup-tab"
>
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Backup Manager</h4>
            <div class="card-header-form">
                <a
                    onclick="showLoading()"
                    href="{{url('/settings/database/backup')}}"
                    class="btn btn-primary pull-right float-right"
                >
                    <span class="ladda-label">
                        <i class="fa fa-plus"></i> Backup
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover pb-0 mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Time</th>
                        <th class="text-right">Size</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($backups as $k => $b)
                        <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>
                                {{ $b['file_name'] }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}
                            </td>
                            <td class="text-right">
                                {{ round((int)$b['file_size']/1048576, 2).' MB' }}
                            </td>
                            <td class="text-right">
                                <a
                                    class="btn btn-sm btn-success"
                                    href="{{ url('/settings/database/download/' . urlencode($b['file_name'])) }}"
                                >
                                    <i class="fas fa-cloud-download-alt"></i>
                                    Download
                                </a>
                                <a
                                    onclick="showLoading()"
                                    class="btn btn-sm btn-danger"
                                    href="{{ url('/settings/database/delete/' . urlencode($b['file_name'])) }}"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Restore Database</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body bg-whitesmoke">
                            <div class="empty-state" data-height="400">
                                <div class="empty-state-icon">
                                    <i class="fas fa-download"></i>
                                </div>
                                <h2>Import Database</h2>
                                <p class="lead">
                                    Import database schema from latest backup/export.
                                    <br>
                                    (file type must be an <a target="_blank" href="https://fileinfo.com/extension/sql">.sql</a>).
                                </p>
                                <form
                                    id="setting-form"
                                    action="{{url('/settings/database/restore')}}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <div class="custom-file text-left mt-3" >
                                            <input type="file" name="site_database" class="custom-file-input" id="site-database">
                                            <label class="custom-file-label" id="site-database-label">Choose</label>
                                        </div>
                                    </div>
                                    <span class="input-group-btn">
                                        <button onclick="" type="submit" class="btn btn-primary mt-4 ml-2">Start Restoration Proses </button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

