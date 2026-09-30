<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Do you travel outside Ahmedabad?',
                'answer'   => 'Yes, we regularly travel to nearby cities and across India for weddings, events, and commercial projects. We specialize in destination shoots and have extensive experience working in different locations.',
                'category' => 'General',
            ],
            [
                'question' => 'Do you cover destination weddings?',
                'answer'   => 'Absolutely! We have covered destination weddings across India and internationally. We handle all logistics and provide comprehensive coverage for your special day, no matter where you choose to celebrate.',
                'category' => 'Weddings',
            ],
            [
                'question' => 'Do you provide both photography and cinematography?',
                'answer'   => 'Yes, we specialize in providing both photography and cinematography services. You can book either service individually or combine them for comprehensive coverage with beautifully coordinated styles.',
                'category' => 'Services',
            ],
            [
                'question' => 'Do you offer pre-wedding shoots?',
                'answer'   => 'Yes, we offer beautifully curated pre-wedding shoots at locations of your choice. We create romantic, cinematic content that tells your love story and can be used for invitations, albums, and social media.',
                'category' => 'Weddings',
            ],
            [
                'question' => 'Do you work with brands and advertising agencies?',
                'answer'   => 'Absolutely! We work extensively with advertising agencies, creative houses, and brands to produce high-quality commercial content, brand campaigns, and advertising materials tailored to your requirements.',
                'category' => 'Commercial',
            ],
            [
                'question' => 'How can we get a quotation?',
                'answer'   => "You can contact us through our contact form, WhatsApp, or email with details of your project. We'll review your requirements and provide a customized quotation within 24-48 hours.",
                'category' => 'Booking',
            ],
            [
                'question' => 'How far in advance should we book?',
                'answer'   => 'For weddings, we recommend booking 3-6 months in advance. For events and commercial projects, 2-4 weeks is typically sufficient. However, we accept requests based on availability, so feel free to reach out even with shorter notice.',
                'category' => 'Booking',
            ],
            [
                'question' => 'What is your response time?',
                'answer'   => 'We typically respond to all inquiries within 24 hours during business days. For urgent queries, you can reach us directly via WhatsApp or phone call.',
                'category' => 'General',
            ],
            [
                'question' => 'Do you offer customized packages?',
                'answer'   => "Yes! Every project is unique. We create customized packages based on your specific needs, budget, and vision. Let's discuss what works best for you.",
                'category' => 'Booking',
            ],
            [
                'question' => 'What is your cancellation policy?',
                'answer'   => "Our cancellation policy is discussed during the booking process and included in the agreement. We're flexible and understand that circumstances can change. Contact us to discuss your specific situation.",
                'category' => 'Booking',
            ],
            [
                'question' => 'How long does post-production take?',
                'answer'   => 'Post-production timelines vary based on project complexity. Typically, edited photos are delivered within 2-3 weeks, and cinematic videos within 4-6 weeks. Rush deliveries can be arranged for additional fees.',
                'category' => 'Delivery',
            ],
            [
                'question' => 'Do you provide albums and prints?',
                'answer'   => 'We can arrange premium albums, prints, and other physical deliverables through our trusted vendors. Quality and customization options are available across all price ranges.',
                'category' => 'Delivery',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            FAQ::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'answer'    => $faq['answer'],
                    'category'  => $faq['category'],
                    'order'     => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
