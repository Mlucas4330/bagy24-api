<?php

namespace App\Console\Commands;

use App\Mail\SellerMail;
use App\Models\Sale;
use App\Models\SaleCommission;
use App\Models\Seller;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSellersEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-sellers-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email para todos os vendedores com o total de vendas e a sua comissão';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = date('Y-m-d');

        $sellers = Seller::all();

        $total_sales = Sale::where('sale_date', $today)->count();
        $total_commissions = SaleCommission::where('commission_date', $today)->sum('value');

        foreach ($sellers as $seller) {
            Mail::to($seller->email)->send(new SellerMail($total_sales, $total_commissions));
        }
    }
}
