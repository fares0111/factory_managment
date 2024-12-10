<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Backup extends Controller
{
    public function backup()
    {
        $time = date("Y_m_d_H_i_s");
        // المسار الكامل لأداة mysqldump
        $mysqldumpPath = 'D:\\xampp\\mysql\\bin\\mysqldump';
        // اسم قاعدة البيانات التي تريد إنشاء نسخة احتياطية لها
        $dbName = 'elhkmdar';
        // مسار الملف الذي ستتم كتابة النسخة الاحتياطية فيه
        $backupPath = "D:\\backup\\{$time}.sql";

        // الأمر الذي سيتم تشغيله
        $command = "$mysqldumpPath --host=localhost --user=root $dbName > \"$backupPath\"";

        // تشغيل الأمر باستخدام exec
        exec($command, $output, $resultCode);

return redirect()->back();

    }
}
