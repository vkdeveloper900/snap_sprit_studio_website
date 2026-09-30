<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Company Identity
            'company_name'      => 'Snap Spirit Studio',
            'legal_name'        => 'Snap Spirit Studio',
            'tagline'           => 'Photography & Cinematography for Weddings, Events, Brands & Creative Productions.',
            'about_short'       => 'Based in Ahmedabad, Gujarat, we specialize in capturing cinematic stories through premium photography and videography.',

            // Contact
            'contact_email'     => 'snapstudio@gmail.com',
            'enquiry_email'     => 'snapstudio@gmail.com',
            'support_email'     => 'snapstudio@gmail.com',
            'contact_phone'     => '+91 8488888494',
            'enquiry_phone'     => '+91 8488888494',
            'whatsapp_number'   => '918488888494', // digits only for wa.me link

            // Address
            'address_line_1'    => '8th Floor, 834 to 838 Krupal Pathsala',
            'address_line_2'    => 'Near Kheti Bank, Ashram Road',
            'city'              => 'Ahmedabad',
            'state'             => 'Gujarat',
            'pincode'           => '380005',
            'country'           => 'India',
            'google_map_url'    => 'https://maps.google.com/?q=Snap+Spirit+Studio+Ahmedabad',

            // Business
            'gst_number'        => '',
            'business_hours'    => "Monday - Saturday: 10:00 AM - 7:00 PM\nSunday: 12:00 PM - 6:00 PM",

            // Social Media
            'facebook_url'      => 'https://facebook.com/snapspiritstudio',
            'instagram_url'     => 'https://instagram.com/snapspiritstudio',
            'instagram_handle'  => '@snapspiritstudio',
            'youtube_url'       => 'https://youtube.com/@snapspiritstudio',
            'linkedin_url'      => 'https://linkedin.com/company/snapspiritstudio',
            'twitter_url'       => 'https://twitter.com/snapspirit',

            // Footer / Misc
            'copyright_text'    => '© ' . date('Y') . ' Snap Spirit Studio. All Rights Reserved.',
            'developer_name'    => 'Adois Studio',
            'developer_url'     => 'https://adoisstudio.com/',
            'location_short'    => 'Ahmedabad, Gujarat',
        ];

        foreach ($settings as $key => $value) {
            CompanySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
