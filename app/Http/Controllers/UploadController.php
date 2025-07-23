<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'studentName' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|min:10|max:10|unique:users,mobile',
            'nationalID' => 'required|min:10|max:10|unique:users,nationalID',
            'type' => 'required',

            'high_school_certificate' => ['required_if:type,ثانوي', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'high_school_aptitudes' => ['required_if:type,ثانوي', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'high_school_achievement' => ['required_if:type,ثانوي', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],

            'bmt_certificate' => ['required_if:type,دبلوم تقنية الأجهزة الطبية', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'bmt_transcript' => ['required_if:type,دبلوم تقنية الأجهزة الطبية', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'bmt_high_school_certificate' => ['required_if:type,دبلوم تقنية الأجهزة الطبية', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'bmt_sce' => ['required_if:type,دبلوم تقنية الأجهزة الطبية', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'bmt_language' => ['required_if:type,دبلوم تقنية الأجهزة الطبية', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],

            'other_high_school_certificate' => ['required_if:type,الدبومات الاخرى', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'other_aptitudes_certificate' => ['required_if:type,الدبومات الاخرى', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'other_achievement_certificate' => ['required_if:type,الدبومات الاخرى', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
            'other_tramscript_certificate' => ['required_if:type,الدبومات الاخرى', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],

        ], [
            'studentName.required' => 'يرجى إدخال اسم الطالب',
            'email.required' => 'يرجى إدخال البريد الإلكتروني',
            'email.unique' => 'البريد الإلكتروني موجود بالفعل',
            'mobile.required' => 'يرجى إدخال رقم الجوال',
            'mobile.unique' => 'رقم الجوال موجود بالفعل',
            'mobile.min' => 'يرجى إدخال رقم الجوال الصحيح',
            'mobile.max' => 'يرجى إدخال رقم الجوال الصحيح',
            'nationalID.min' => 'يرجى إدخال رقم الجوال الصحيح',
            'nationalID.required' => 'يرجى إدخال الهوية الوطنية',
            'nationalID.unique' => 'الهوية الوطنية موجودة بالفعل',
            'type.required' => 'يرجى إدخال نوع الشهادة',


            'high_school_certificate.required_if' => 'يرجى إرفاق شهادة الثانوية',
            'high_school_aptitudes.required_if' => 'يرجى إرفاق شهادة القدرات',
            'high_school_achievement.required_if' => 'يرجى إرفاق  شهادة التحصيلي',
            'high_school_certificate.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'high_school_aptitudes.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'high_school_achievement.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'high_school_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'high_school_aptitudes.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'high_school_achievement.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',

            'bmt_certificate.required_if' => 'يرجى إرفاق شهادة دبلوم تقنية الأجهزة الطبية',
            'bmt_transcript.required_if' => 'يرجى إرفاق شهادة سجل دبلوم تقنية الاجهزة الطبية',
            'bmt_high_school_certificate.required_if' => 'يرجى إرفاق شهادة الثانوية',
            'bmt_sce.required_if' => 'يرجى إرفاق شهادة  تصنيف الهيئة السعودية للمهندسين',
            'bmt_language.required_if' => 'يرجى إرفاق شهادة اختبار اللغة الانجليزية',
            'bmt_certificate.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'bmt_transcript.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'bmt_high_school_certificate.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'bmt_sce.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'bmt_language.mimes' => 'الملف غير صالح يرجى إرفاق صورة أو pdf',
            'bmt_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'bmt_transcript.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'bmt_high_school_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'bmt_sce.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'bmt_language.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',


            'other_high_school_certificate.required_if' => 'يرجى إرفاق شهادة الثانوية',
            'other_aptitudes_certificate.required_if' => 'يرجى إرفاق شهادة القدرات',
            'other_achievement_certificate.required_if' => 'يرجى إرفاق  شهادة التحصيلي',
            'other_trascript_certificate.required_if' => 'يرجى إرفاق شهادة السجل الاكاديمي',
            'other_high_school_certificate.mimes' => 'الملف غير صالح يرجىإرفاق صورة او pdf',
            'other_aptitudes_certificate.mimes' => 'الملف غير صالح يرجىإرفاق صورة او pdf',
            'other_achievement_certificate.mimes' => 'الملف غير صالح يرجىإرفاق صورة او pdf',
            'other_trascript_certificate.mimes' => 'الملف غير صالح يرجىإرفاق صورة او pdf',
            'other_high_school_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'other_aptitudes_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'other_achievement_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
            'other_trascript_certificate.max' => 'حجم الملف يجب ان يكون اقل من 2 ميجا',
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'studentName' => $validated['studentName'],
                'email' => $validated['email'],
                'mobile' => $validated['mobile'],
                'nationalID' => $validated['nationalID'],
                'type' => $validated['type'],
            ]);

            if ($validated['type'] == 'دبلوم تقنية الأجهزة الطبية') {
                $this->upload($validated['bmt_certificate'], $validated['nationalID'], $validated['email'], 'bmt_certificate', $user->id);
                $this->upload($validated['bmt_transcript'], $validated['nationalID'], $validated['email'], 'bmt_transcript', $user->id);
                $this->upload($validated['bmt_high_school_certificate'], $validated['nationalID'], $validated['email'], 'bmt_high_school_certificate', $user->id);
                $this->upload($validated['bmt_sce'], $validated['nationalID'], $validated['email'], 'bmt_sce', $user->id);
                $this->upload($validated['bmt_language'], $validated['nationalID'], $validated['email'], 'bmt_language', $user->id);
            } else if ($validated['type'] == 'الدبومات الاخرى') {
                $this->upload($validated['other_high_school_certificate'], $validated['nationalID'], $validated['email'], 'other_high_school_certificate', $user->id);
                $this->upload($validated['other_aptitudes_certificate'], $validated['nationalID'], $validated['email'], 'other_aptitudes_certificate', $user->id);
                $this->upload($validated['other_achievement_certificate'], $validated['nationalID'], $validated['email'], 'other_achievement_certificate', $user->id);
                $this->upload($validated['other_tramscript_certificate'], $validated['nationalID'], $validated['email'], 'other_tramscript_certificate', $user->id);
            } else if ($validated['type'] == 'ثانوي') {
                $this->upload($validated['high_school_certificate'], $validated['nationalID'], $validated['email'], 'high_school_certificate', $user->id);
                $this->upload($validated['high_school_aptitudes'], $validated['nationalID'], $validated['email'], 'high_school_aptitudes', $user->id);
                $this->upload($validated['high_school_achievement'], $validated['nationalID'], $validated['email'], 'high_school_achievement', $user->id);
            }
        });

        return back()->with('success', 'تم التسجيل بنجاح');

    }

    private function upload($file, $id, $email, $type, $user_id): void
    {
        $extention = $file->getClientOriginalExtension();
        $fileName = $id . '|' . $email . '|' . $type . '.' . $extention;
        $path = $file->storePubliclyAs($fileName);
        Attachment::create([
            'user_id' => $user_id,
            'link' => $path
        ]);
    }

    public function download(Request $request)
    {
        return Storage::download($request->link);
    }

    public function admin()
    {
        return view('admin', [
            'users' => User::with('attachments')->get()
        ]);
    }

    public function readbleName($string)
    {
        $parts = explode('|', $string);
        $filename = $parts[2];
        $filenameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
        return str_replace('_', ' ', $filenameWithoutExt);
    }
}
