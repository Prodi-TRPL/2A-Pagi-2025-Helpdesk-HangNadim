<?php

namespace App\Jobs;

use App\Models\Pelapor;
use App\Models\Komplain;
use App\Mail\EmailKomplainSelesai;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class KirimEmailKomplainSelesai implements ShouldQueue
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
        Mail::to($this->pelapor->email)
            ->send(new EmailKomplainSelesai($this->komplain, $this->pelapor));
    }
}
