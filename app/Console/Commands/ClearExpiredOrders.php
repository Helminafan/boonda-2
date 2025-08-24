<?php

namespace App\Console\Commands;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClearExpiredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-expired-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus pesanan belum bayar yang lebih dari 15 menit dan kembalikan stok produk';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredOrders = Pemesanan::with('event')
            ->where('status', 'belum_bayar')
            ->where('created_at', '<', Carbon::now()->subMinutes(15))
            ->get();
        
        

        foreach ($expiredOrders as $order) {
            $jumlah_tiket = $order->jumlah;
            if ($order->event) {
                // kembalikan kuota
                $order->event->kuota += $jumlah_tiket; // atau jumlah tiket yg dipesan
                $order->event->save();
            }

            // hapus pesanan
            $order->delete();
        }
        $this->info("Expired event orders cleared: " . $expiredOrders->count());
    }
}
