<?php

namespace App\Console\Commands;

use App\Mail\AdminMail;
use App\Models\Sale;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAdminEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-admin-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email para o administrador com o total de vendas do dia.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $total_sales = Sale::where('sale_date', date('Y-m-d'))->count();

        Mail::send(new AdminMail($total_sales));
    }
}
