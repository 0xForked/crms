<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function index()
    {
        $settings = site_setting();

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $backups = [];
        foreach ($disk->files(config('backup.backup.name')) as $k => $f) {
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('backup.backup.name') . '/', '', $f),
                    'file_size' => $disk->size($f),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }
        $backups = array_reverse($backups);

        return view('admin.settings.index', compact('settings', 'backups'));
    }

    public function general(Request $request)
    {
        $data = (Object)$request->only(
            'site_title',
            'site_description',
            'site_analytics_id',
            'site_logo',
            'site_favicon'
        );
        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($value != NULL) {
                if ($setting->value != $value) {
                    if ($key == 'site_logo') {
                        $this->validate($request, [
                            'site_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                        ]);
                    }
                    if ($key == 'site_favicon') {
                        $this->validate($request, [
                            'site_favicon' => 'required|image|mimes:jpeg,png,jpg,svg,ico|max:128',
                        ]);
                    }
                    if (is_file($value)) {
                        $file_name = time()."_{$key}.{$value->getClientOriginalExtension()}";
                        $file_path = 'assets/img/sites';
                        $value->move($file_path, $file_name);
                        $value = $file_name;
                    }
                    $setting->value = $value;
                    $setting->save();
                }
            }
        }
        return redirect()->back()->with('success', 'General settings updated with out errors');
    }

    public function backup()
    {
        try {
            Artisan::call('backup:run --only-db');
            Artisan::output();
            Setting::where(
                'key',
                'site_db_last_backup'
            )->update([
                'value' => Carbon::now()->toDateTimeString()
            ]);
            return redirect()->back()->with('success', 'Database backup successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Failed create new backup ${e}.");
        }
    }

    public function restore(Request $request)
    {
        // store function
        $file_original_ext = $request->site_database->getClientOriginalExtension();
        if($file_original_ext !== SQL) { // pathinfo($file_original_name, PATHINFO_EXTENSION)
            return redirect()->back()->with('error', "Failed to restore database, Invalid sql file.");
        }

        $file_new_name = "_database_restore.{$file_original_ext}";
        $request->site_database->storeAs('restore/', $file_new_name);

        // validate function
        $disk = Storage::disk('restore');
        if (!$disk->exists($file_new_name)) {
            return redirect()->back()->with('error', "Failed to restore database, Sql file not found.");
        }

        return true;
        // success store .sql to storage folder
        // todo restore database
        // migration/database restore function
    }

    public function download($name)
    {
        $file = config('backup.backup.name') . '/' . $name;
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            return redirect()->back()->with('error', "The backup file doesn't exist.");
        }
    }

    public function delete($name)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists(config('backup.backup.name') . '/' . $name)) {
            $disk->delete(config('backup.backup.name') . '/' . $name);
            return redirect()->back()->with('success', 'Database delete successfully');
        } else {
            return redirect()->back()->with('error', "The backup file doesn't exist.");
        }
    }
}
