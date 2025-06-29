<?php

namespace App\Jobs;

use App\Mail\EmailTiketPelapor;
use App\Models\User;
use App\Models\Komplain;
use Illuminate\Bus\Queueable;
use App\Mail\NewComplaintEmail;
use App\Models\Pelapor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class KirimEmailKomplainBaru implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $komplain;
    public $pelapor;

    /**
     * Create a new job instance.
     */
    public function __construct(Komplain $komplain, Pelapor $pelapor)
    {
        $this->pelapor = $pelapor;
        $this->komplain = $komplain;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $officers = User::where('role', 'Officer')->get();

        foreach ($officers as $officer){
        Mail::to($officer->email)
            ->send(new NewComplaintEmail($this->komplain, $this->pelapor));
        }

        if ($this->pelapor && $this->pelapor->email) {
            Mail::to($this->pelapor->email)
                ->send(new EmailTiketPelapor($this->komplain, $this->pelapor));
        }
    }
}