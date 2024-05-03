<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('/')->namespace('App\Http\Controllers\Admin')->group(function(){

    Route::match(['get','post'],'/','AdminLoginController@login');
    Route::group(['middleware'=> ['admin']],function(){

        Route::controller(\DashboardController::class)->group(function(){
            Route::get('/Dashboard','dashboard');
            Route::get('/school-admin-dashboard','SchoolAdminDashboard');
            Route::get('/teacher-dashboard','TeacherDashboard');
            Route::get('/Student-dashboard','StudentDashboard');
            Route::get('/accountant-dashboard','AccountantDashboard');
        });


     
        Route::get('/logout','AdminLoginController@logout');

        Route::controller(\AdminController::class)->group(function(){
            Route::get('/admin','adminIndex');
            Route::match(['get','post'],'/add-edit-admin/{id?}','AddEditAdmin');
            Route::post('/Change-admin-status','Changestatus');
            Route::post('/Delete-admin/{id}','delete');
            Route::get('details-of-subscription/{id}','DetailsOfSubscription');
        });

        Route::controller(\SchoolRegistrationController::class)->group(function(){

            Route::get('/School-List','SchoolIndex');
            Route::match(['get','post'],'/add-edit-school-reg/{id?}','AddEditSchoolReg');
            Route::get('/FSD-List','UpdateFSDList');
            Route::match(['get','post'],'/add-edit-fsd/{id?}','AddEditSchoolfsd');
            Route::post('/apply-fsd/{id}','ApplyNewFSD');
        });
        Route::controller(\ClassConfigerController::class)->group(function(){
            Route::get('/Class-List','classIndex');
            Route::match(['get','post'],'/add-edit-class/{id?}','AddEditclass');
            Route::post('/Change-class-status','Changestatus');
            Route::post('/Delete-class/{id}','delete');

            Route::get('/Subject-List','SubjectIndex');
            Route::match(['get','post'],'/add-edit-Subject/{id?}','AddEditSubject');
            Route::post('/Delete-Subject/{id}','deleteSubject');

           
        });

        Route::controller(\AssignSubjectController::class)->group(function(){

            Route::get('assign/subject/view',  'ViewAssignSubject')->name('assign.subject.view');

            Route::get('assign/subject/add',  'AddAssignSubject')->name('assign.subject.add');

            Route::post('assign/subject/store',  'StoreAssignSubject')->name('store.assign.subject');

            Route::get('assign/subject/edit/{class_id}',  'EditAssignSubject')->name('assign.subject.edit');

            Route::post('assign/subject/update/{class_id}',  'UpdateAssignSubject')->name('update.assign.subject');


        });

        
Route::get('assign/subject/details/{class_id}', [App\Http\Controllers\Admin\AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');
        Route::controller(\StreamConfigerController::class)->group(function(){
            
            Route::match(['get','post'],'/add-edit-stream/{id?}','AddEditstream');
            Route::post('/Change-stream-status','Changestatus');
            Route::post('/Delete-stream/{id}','deleteStream');
        });

        Route::controller(\SectionConfigerController::class)->group(function(){
            
            Route::match(['get','post'],'/add-edit-section/{id?}','AddEditsection');
            Route::post('/Change-section-status','Changestatus');
            Route::post('/Delete-section/{id}','deletesection');
        });

        Route::controller(\StudentRegistrationController::class)->group(function(){
            
            Route::get('/student-list','Index');
            Route::match(['get','post'],'/add-edit-student-reg/{id?}','AddEditstudentReg');
            Route::post('/Change-student-reg-status','Changestatus');
            Route::post('/Delete-student-reg/{id}','deletestudentReg');
            Route::get('/reg/details/{id}',  'StudentRegDetails');
            
        });
        Route::controller(\SubscriptionController::class)->group(function(){
            
            Route::get('/School-Subscription','SchoolSubscription');
            Route::get('/School-unSubscription','SchoolUnSubscription');
            Route::get('/subcription/{id}','subcriptionlist');
             Route::post('/save-subs-one/{id}','subscriptionsave');
             Route::post('/save-subs-two/{id}','subscriptionsavetwo');
             Route::post('/save-subs-three/{id}','subscriptionsavethree');

             Route::get('/fix-payment-subcription/{id}','FixPaymentSubscription');
             Route::post('/save-fixsubs-one/{id}','fixsubscriptionsave');
             Route::post('/save-fixsubs-two/{id}','fixsubscriptionsavetwo');
             Route::post('/save-fixsubs-three/{id}','fixsubscriptionsavethree');

            
           
        });

        Route::controller(\FeeController::class)->group(function(){
            
            Route::get('/Fee-list','Index');
            Route::get('/Get-Class-Wise-Fee/{id}','GetClasswisefeedata');
            Route::post('/add-edit-fee/{id?}','AddEditFee');
            Route::post('/fee-search','feesearch');
        
        });

        Route::controller(\StaffContoller::class)->group(function(){
            
            Route::get('/staff-list','Index');
            Route::match(['get','post'],'/add-edit-staff-reg/{id?}','AddEditstaff');
            Route::post('/Change-staff-status','Changestatus');
            Route::post('/Delete-staff/{id}','deletestaff');

            Route::get('/Configure-Staff-Salary','ConfigureStaffSalary');
            Route::post('/salary-configure-save/{id}','ConfigureSalarySave');
            Route::get('/pay-salary/{id}','PaySalary');
            Route::post('/monthwise-pay-salary/{id}','MonthwisePaySalary');
            Route::get('/Monthwise-Salary-Histroy/{id}','MonthwiseSalaryHistroy');
            Route::get('/MWSSDownload/{id}','MWSSDownload');

            Route::get('/staff-reg/details/{id}',  'StaffRegDetails');

            Route::get('/Staff-Salary-Report','StaffSalaryReport');
            Route::get('Staff-Id-card/{id}','StaffIdCard');
            Route::get('view-teacher-wise-timetable/','ViewTeacherWiseTimetable');

            

        });
        Route::controller(\AssignTeacherSubjectController::class)->group(function(){
            
            Route::get('/Teacher-Assign-Subject-List','TeacherList');
            Route::get('TeacherAssign-subject-add',  'AddAssignSubject');
            Route::post('TeacherAssign-subject-save',  'AddAssignSubjectSave');
            Route::get('getclasswisesubject/{class_id}',  'getclasswisesubject');
            Route::get('view-details-assign-techsub/{teacher_id}',  'ViewDetailsAssignTechSub');
            Route::get('delete-assign-techsub/{id}',  'DeleteAssignTechSub');

            Route::get('assign/teachersubject/edit/{teacher_id}',  'EditAssignTechSubject')->name('assign.teachersubject.edit');
            Route::post('assign/teachersubject/update/{teacher_id}',  'UpdateAssignTechSubject')->name('update.assign.teachersubject');

        });

        Route::controller(\EmployeeAttendanceController::class)->group(function(){
            // Employee Attendance All Routes 
            Route::get('attendance/employee/view','AttendanceView');
            Route::get('attendance/employee/add','AttendanceAdd');
            Route::post('attendance/employee/store','AttendanceStore');
            Route::get('attendance/employee/edit/{date}','AttendanceEdit');
            Route::get('attendance/employee/details/{date}','AttendanceDetails');

            Route::get('view-teacher-attendance','teacherAttendance');
            Route::get('view-teacher-salary','salaryteacher');
    
        });

        Route::controller(\StudentAttendanceController::class)->group(function(){
            // student Attendance All Routes
            Route::get('Class-Wise-Student','Classlist');
            Route::get('Add-Student-Attendance/{id}','StudentAttendanceAdd');
            Route::post('Store-Student-Attendance/','StudentAttendanceStore');
            Route::get('Class-Wise-Student-Attendance/','StudentAttendanceClassWise');
            Route::get('Edit-Student-Attendance/{id}','StudentAttendanceEdit');
            Route::post('Edit-Store-Student-Attendance/{id}','StudentAttendanceEditStore');
            Route::get('Details-Student-Attendance/{id}','StudentAttendanceDetails');
        });

        Route::controller(\AttenReportController::class)->group(function(){
             
                Route::get('attendance/report/view','AttenReportView')->name('attendance.report.view');
                Route::get('report/attendance/get','AttenReportGet')->name('report.attendance.get');

                Route::get('student/report/view','StudentAttenReportView')->name('stdattendance.report.view');
                Route::get('report/stdattendance/get','StdAttenReportGet')->name('report.stdattendance.get');
             
        });
        Route::controller(\StudentYearController::class)->group(function(){
            Route::get('student/year/view', 'ViewYear')->name('student.year.view');

            Route::get('student/year/add', 'StudentYearAdd')->name('student.year.add');

            Route::post('student/year/store', 'StudentYearStore')->name('store.student.year');

            Route::get('student/year/edit/{id}', 'StudentYearEdit')->name('student.year.edit');

            Route::post('student/year/update/{id}', 'StudentYearUpdate')->name('update.student.year');

            Route::get('student/year/delete/{id}', 'StudentYearDelete')->name('student.year.delete');

        });
        Route::prefix('students')->group(function(){

            Route::get('/reg/view', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
            
            Route::get('/reg/Add', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
            
            Route::post('/reg/store', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
             
            Route::get('/year/class/wise', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
            
            Route::get('/reg/edit/{student_id}', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
            
            Route::post('/reg/update/{student_id}', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
            
            Route::get('/reg/promotion/{student_id}', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
            
            Route::post('/reg/update/promotion/{student_id}', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
            
            Route::get('/reg/details/{student_id}', [App\Http\Controllers\Admin\StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

            Route::get('student-Id-card/{id}',[App\Http\Controllers\Admin\StudentRegController::class, 'StudentIdCard']);

            Route::match(['get','post'],'/previous-school-details/{student_id}', [App\Http\Controllers\Admin\StudentRegController::class, 'Previousschooldetails'])->name('student.previousschooldetails');

            Route::get('student-Profile/{std_id}',[App\Http\Controllers\Admin\StudentRegController::class, 'StudentProfile']);
            Route::post('search-attendance_bydate/{std_id}',[App\Http\Controllers\Admin\StudentRegController::class, 'StudentProfileattensearch']);

            Route::get('Fee-Submission/{std_id}',[App\Http\Controllers\Admin\StudentRegController::class, 'StudentFeeSubmission']);
            Route::get('student-list-fee',[App\Http\Controllers\Admin\StudentRegController::class, 'studentlist']);
            Route::post('Searchstudent-byclassyearSID',[App\Http\Controllers\Admin\StudentRegController::class, 'Searchstudent']);

            Route::match(['get','post'],'Payfeebymonth/{std_id}/{feeid}',[App\Http\Controllers\Admin\StudentRegController::class, 'MonthwisePayfee']);
            Route::get('student-fee-report-byID',[App\Http\Controllers\Admin\StudentRegController::class, 'studentfeereportid']);
            Route::get('fee-paid-list/{std_id}',[App\Http\Controllers\Admin\StudentRegController::class, 'studentfeereportlist']);
            Route::get('fee-paid-receipt/{feepaid_id}',[App\Http\Controllers\Admin\StudentRegController::class, 'FeePaidReceipt']);
          
            
        }); 


        
        Route::controller(\ExamTypeController::class)->group(function(){
            
            Route::get('exam/type/view', 'ViewExamType')->name('exam.type.view');

            Route::get('exam/type/add', 'ExamTypeAdd')->name('exam.type.add');

            Route::post('exam/type/store', 'ExamTypeStore')->name('store.exam.type');

            Route::get('exam/type/edit/{id}', 'ExamTypeEdit')->name('exam.type.edit');

            Route::post('exam/type/update/{id}', 'ExamTypeUpdate')->name('update.exam.type');

            Route::get('exam/type/delete/{id}', 'ExamTypeDelete')->name('exam.type.delete');


        });

        Route::controller(\MarksController::class)->group(function(){

            
            Route::get('marks/entry/add', 'MarksAdd')->name('marks.entry.add');
            
            Route::post('marks/entry/store', 'MarksStore')->name('marks.entry.store'); 
            
            Route::get('marks/entry/edit', 'MarksEdit')->name('marks.entry.edit'); 
            
            Route::get('marks/getstudents/edit', 'MarksEditGetStudents')->name('student.edit.getstudents');
            
            Route::post('marks/entry/update', 'MarksUpdate')->name('marks.entry.update');  

            Route::get('student/marks/getstudentsdata', 'GetStudents')->name('student.marks.getstudentsdata');  
            Route::get('marks/getsubject', 'GetSubject')->name('marks.getsubject'); 
            

            Route::get('marks/report', 'markreportlist');
            Route::get('student/marks/report', 'GetStudentsmarkreport')->name('student.marks.report');  
            
            

        });

        // Student ID Card Routes 
        Route::get('student/idcard/view', [App\Http\Controllers\Admin\ResultReportController::class, 'IdcardView'])->name('student.idcard.view');

        Route::get('student/idcard/get', [App\Http\Controllers\Admin\ResultReportController::class, 'IdcardGet'])->name('report.student.idcard.get');


        Route::controller(\PromotionController::class)->group(function(){
            Route::get('student-promotion', 'StudentPromotion');  
            Route::post('student-promotion-store', 'MarksStore'); 
            Route::get('student/marks/getstudents', 'GetStudents')->name('student.marks.getstudents');  

        });

        Route::controller(\UnitController::class)->group(function(){
            Route::get('Unit-List', 'UnitIndex');  
            Route::get('getsubject/{class_id}', 'getsubject');  
            Route::match(['get','post'],'add-edit-unit/{id?}','AddEditUnit');
            Route::post('Delete-unit/{id}', 'delete'); 
        });

        Route::controller(\UploadContentController::class)->group(function(){
            Route::get('ContentList-Classwise', 'Uploadcontentclasswsie');  
            Route::get('Upload-Content-List/{class_id}', 'UploadContentIndex');  
            Route::get('getassignsubject/{class_id}', 'getassignsubject');  
            Route::get('getunit/{class_id}/{subject_id}', 'getunit');  
            Route::match(['get','post'],'add-edit-uploadcontent/{id?}','AddEditUploadContent');
            Route::post('Delete-UploadContent/{id}', 'delete'); 
        });
           

        Route::controller(\StudentHomeController::class)->group(function(){
            Route::get('ContentList-Subjectwise', 'ContentSubjectwise');  
            Route::get('student-subjectwise-unit/{class_id}/{subject_id}', 'StudentSubjectwiseUnit');  
            Route::get('student-subjectwise-unit-content/{unit_id}', 'StudentSubjectUnitContent');  
            Route::get('student-subjectwise-unit-content', 'StudentSubjectUnitContent');  

            //attendace--
            Route::get('student-attendance-subjectwise', 'AttendanceSubjectWise'); 
            Route::get('student-subjectwise-attendance/{class_id}/{subject_id}', 'StudentSubjectwiseAttendance');   

            //Student Got Mark
            Route::get('Student-ExamType', 'ExamType'); 
            Route::get('Student-mark-ExamType/{examid}', 'markExamType'); 

             /// student class wise timeable
             Route::get('st-timetable', 'StudentTimetableView'); 

             //Profile
             Route::get('st-profile', 'StudentProfile'); 
             //fee report 
             Route::get('studentfee-paid-list', 'studentfeepaidlist'); 
             Route::get('studentfee-paid-receipt/{feepaid_id}', 'studentfeepaidReceipt'); 
             //Result
             Route::get('Student-Result/{examtype_id}', 'StudentResult'); 
           

        });

        Route::controller(\TimetableController::class)->group(function(){
            Route::get('week-days','getweek');
            Route::get('time-table','getclass');
            Route::match(['get','post'],'time-table/{classid}','TimetableAdd');
            Route::get('view-time-table/{classid}','ViewTimetable');
            Route::get('Update-time-table','ViewSearchTimetable');
            Route::post('SaveUpdated-time-table','ViewSearchSaveTimetable');
            Route::get('Get-timetbaledata', 'Gettimetabledata');  


            Route::get('view-time-table-with-search','viewtimetablewithsearch');
            Route::post('view-time-table-with-search','savetimetablewithsearch');
            Route::get('view-timetbaledata', 'Viewtimetabledata'); 
        });

        Route::controller(\LeaveController::class)->group(function(){
             Route::get('Leave-List','LeaveIndex');
             Route::get('stLeave-List','stLeaveIndex');
             Route::match(['get','post'],'add-edit-leave-request/{id?}','AddEditLeaveRequest');
             Route::post('Delete-LeaveRequest/{id}', 'delete'); 

             Route::get('staffLeave-List','staffLeaveIndex');
             Route::get('approvel-list','ApprovelList');
             Route::get('cancel-list','Cancellist');

                          
             Route::get('StdLeave-List','StdLeaveIndex');
             Route::get('Stdapprovel-list','StdApprovelList');
             Route::get('Stdcancel-list','StdCancellist');

            
             Route::post('admin-change-leavestatus/{id}','adminChangeleavestatus');
             
        });

        // new controller  start 

        Route::controller(\GenerateCertificateController::class)->group(function(){
            Route::get('Generate-Certificate-List','GenCertificateIndex');
            Route::match(['get','post'],'add-edit-leave-gen_certificate/{id?}','AddEditGenCertificate');
            Route::get('Download-Certificate/{id}','DownloadCertificate');

            Route::get('Character-Certificate','CharacterCertificateIndex');
            Route::get('Character-Certificate/{stdid}','GenCharacterCertificate');

            Route::get('Transfer-Certificate','TransferCertificateIndex');
            Route::get('generate-TC/{student_id}',  'GenerateStudentTc');
            
       });


       Route::controller(\MainOwnerController::class)->group(function(){
        Route::get('school_owner_dashboard','Dashboard');
        
        Route::get('All-Data-School/{school_id}','AllDataSchool');
        Route::get('get-school-wise-student/{school_id}','GetSchoolWiseStudent');
        Route::get('get-fee-paid-list/{school_id}/{std_id}', 'Getstudentfeereportlist');
        Route::get('get-studentleave-list/{school_id}/{std_id}', 'Getstudentleavelist');
        Route::get('get-studentattendance-list/{school_id}/{std_id}', 'Getstudentattendacelist');
        Route::get('get-overall-fee-report/{school_id}','GetOverAllFeeReport');
        Route::get('get-monthwise-fee-report/{school_id}','GetMonthwiseFeeReport');
        Route::get('get-yearwise-fee-report/{school_id}','GetYearWiseFeeReport');

        Route::get('get-school-wise-teacher/{school_id}','GetSchoolWiseTeacher');
        Route::get('get-schoolwise-teacherleave/{school_id}/{teachid}','GetSchoolWiseTeacherLeave');
        Route::get('get-schoolwise-teacherattendance/{school_id}/{teachid}','GetSchoolWiseTeacherAttendance');
        Route::get('get-schoolwise-teachersalary/{school_id}/{teachid}','GetSchoolWiseTeacherSalary');
        Route::get('get-overall-salary-report/{school_id}','GetOverAllsalaryReport');
        Route::get('get-monthwise-salary-report/{school_id}','GetMonthwisesalaryReport');
        Route::get('get-yearwise-salary-report/{school_id}','GetYearWisesalaryReport');
        
   });



       


     


           


       



    });

});

