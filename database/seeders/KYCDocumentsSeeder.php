<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KYCDocumentsSeeder extends Seeder
{
    public function run()
    {
        $documents = [
            'Aadhaar Card',
            'Voter ID Card (Election Card)',
            'Passport',
            'Driver\'s License (Driving License)',
            'PAN Card (Permanent Account Number)',
            'Ration Card',
            'Utility Bill (Electricity Bill, Water Bill, Gas Bill, etc.)',
            'Bank Statement',
            'Rent Agreement',
            'Property Tax Receipt',
            'Municipal Corporation Receipt',
            'Income Tax Return (ITR)',
            'Form 16 (Salary Certificate)',
            'School Leaving Certificate',
            'Birth Certificate',
            'Marriage Certificate',
            'Voter Slip',
            'Identity Card issued by Government Departments',
            'Pension Document',
            'Any other document issued by a government authority for KYC purposes.'
        ];

        foreach ($documents as $document) {
            DB::table('documents')->insert([
                'doc_type' => $document,
            ]);
        }
    }
}
