<?php

namespace Database\Seeders;

use App\Models\Common;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commons = [
            'Complete', 'Confirm', 'Update', 'Cancel', 'Delete', 'Log', 'Active', 'Suspend', 'Deny', 'Pending', 'Error', 'Yearly', 'Monthly', 'Credit Card', 'Debit Card', 'Cash', 'Bank Transfer', 'System Admin', 'Management Level', 'Senior Level', 'Mid-Senior Level', 'Entry Level', 'Editor', 'User', 'Employer', 'Visitor', 'Trial', 'Premium', 'Draft', 'Published', 'Approved', 'Closed', 'Opened', 'Submitted', 'Received', 'Viewed', 'Shortlisted', 'Interviewed', 'Hired', 'Immediate', 'Certificate', 'Diploma', 'Advanced Diploma', 'Bachelor Degree', 'Master Degree', 'Ph. D', 'Doctorate Degree', 
            'Myanmar Kyat (MMK)', 'US Dollar (USD)', 'Euro (EUR)', 'British Pound (GBP)', 'Australian Dollar (AUD)', 'Singapore Dollar (SGD)', 'Thai Baht (THB)', 'Malaysian Ringgit (MYR)',
            'Full-time', 'Part-time', 'Contract', 'Temporary', 'Permanent' 
        ];

        foreach ($commons as $common) {
            Common::firstOrCreate([
                'details' => $common
            ]);
        }
    }
}
