<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Rajesh Kumar',
                'designation' => 'Wedding Client',
                'testimonial_text' => 'Snap Spirit Studio captured our wedding day perfectly! Every moment was preserved with such elegance and professionalism. We absolutely loved working with the team.',
                'order' => 1,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Priya Sharma',
                'designation' => 'Brand Manager',
                'testimonial_text' => 'The commercial shoot was outstanding. The team understood our brand vision completely and delivered exactly what we needed. Highly recommended!',
                'order' => 2,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Aditya Patel',
                'designation' => 'Event Organizer',
                'testimonial_text' => 'From pre-event planning to final delivery, Snap Spirit Studio handled everything with expertise. The videography was cinematic and beautifully edited.',
                'order' => 3,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Sneha Desai',
                'designation' => 'Fashion Designer',
                'testimonial_text' => 'Working with their fashion photography team was a dream. They brought my collections to life with stunning visuals that told a story.',
                'order' => 4,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Vikram Singh',
                'designation' => 'Corporate Head',
                'testimonial_text' => 'We hired them for our corporate event photography and they exceeded all expectations. Professional, punctual, and incredibly talented.',
                'order' => 5,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Neha Joshi',
                'designation' => 'Bride',
                'testimonial_text' => 'Every photo from our wedding is a masterpiece. Snap Spirit Studio has a gift for capturing raw emotions and turning them into timeless memories.',
                'order' => 6,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Arjun Mehta',
                'designation' => 'Real Estate Developer',
                'testimonial_text' => 'Their architectural photography perfectly showcases our properties. The quality is outstanding and they understand the real estate market well.',
                'order' => 7,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Isha Kapoor',
                'designation' => 'Influencer',
                'testimonial_text' => 'The content they create is absolutely stunning. My engagement rates went up significantly after posting their professionally shot photos and videos.',
                'order' => 8,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Rohan Deshmukh',
                'designation' => 'Startup Founder',
                'testimonial_text' => 'We needed professional promotional videos and Snap Spirit Studio delivered beyond our expectations. Great team, great work!',
                'order' => 9,
                'is_approved' => true,
            ],
            [
                'client_name' => 'Ananya Verma',
                'designation' => 'Photography Enthusiast',
                'testimonial_text' => 'As someone who knows photography, I was impressed by their technical expertise and creative eye. They truly are masters of their craft.',
                'order' => 10,
                'is_approved' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
