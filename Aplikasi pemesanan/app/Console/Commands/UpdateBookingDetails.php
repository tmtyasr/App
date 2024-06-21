<?php

namespace App\Console\Commands;

use App\Models\Booking;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UpdateBookingDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:update-details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perbarui rincian booking dari Midtrans';

    /**
     * Execute the console command.
     */
    
     public function __construct()
     {
         parent::__construct();
     }

     public function handle()
    {
        $client = new Client();
        $serverKey = config('services.midtrans.server_key');
        $bookings = Booking::whereNull('product_details')->get(); // Misalnya 'product_details' adalah kolom

        foreach ($bookings as $booking) {
            $response = $client->request('GET', "https://api.sandbox.midtrans.com/v2/{$booking->id}/status", [
                'auth' => [$serverKey, '']
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['transaction_status'])) {
                $booking->status = $data['transaction_status'];
                $booking->product_details = json_encode($data['item_details']); // Simpan rincian produk
                $booking->save();

                $this->info("Diperbarui booking ID: {$booking->id}");
            }
        }

        $this->info('Semua booking berhasil diperbarui.');
    }
}
