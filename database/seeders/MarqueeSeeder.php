<?php

namespace Database\Seeders;
use App\Models\MarqueeText;
use Illuminate\Database\Seeder;

class MarqueeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marquees = [
            ['page_name' => 'dashboard', 'marquee_text' => 'Start Earning money by submitting job'],
            ['page_name' => 'may_task', 'marquee_text' => 'Hello Sir, Each task can take a maximum of 48 hours to complete rating, Please wait ! For the information of all, it is informed that in the case of job report, all should report using appropriate and fluent words. If payment is
            not received within 48 hours of completion of work then report should be made. If someone uses any kind of obscene words before the specified time or in case of report, his user ID will be banned. Thank you.'],
            ['page_name' => 'accepted_task', 'marquee_text' => 'Hello Sir, Each task can take a maximum of 48 hours to complete rating, Please wait ! For the information of all, it is informed that in the case of job report, all should report using appropriate and fluent words. If payment is
            not received within 48 hours of completion of work then report should be made. If someone uses any kind of obscene words before the specified time or in case of report, his user ID will be banned. Thank you.'],
            ['page_name' => 'deposit', 'marquee_text' => 'NOTICE : Minimum deposit amount: 100tk . Any deposits less then the minimum will not be credited or refunded.Thank You'],
            ['page_name' => 'withdraw', 'marquee_text' => 'NOTICE : Minimum withdraw amount: 100tk with 15% commission. Thank You'],
            ['page_name' => 'deposit_history', 'marquee_text' => 'Your deposit requests'],
            ['page_name' => 'withdraw_history', 'marquee_text' => 'Your withdraw requests'],
        ];

        MarqueeText::insert($marquees);
    }
}
