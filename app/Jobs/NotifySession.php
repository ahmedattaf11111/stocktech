<?php

namespace App\Jobs;

use App\Commons\Traits\SMS;
use App\Models\Employee;
use App\Models\Session;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifySession implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SMS;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $session;
    public function __construct(Session $session)
    {

        $this->session = $session;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if ($this->session) {
            $employee = Employee::with("students")->find($this->session->employee_id);
            $students = $employee->students;
            foreach ($students as $student) {
                $this->send($student->phone, "اشعار محاضرة", "ستبدا محاضرة الشيخ $employee->name من بعد عشر دقائق من الان");
            }
        }
    }
}
