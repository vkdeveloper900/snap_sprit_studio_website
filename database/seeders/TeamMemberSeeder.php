<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $teamMembers = [
            ['name' => 'Rajesh Kumar', 'designation' => 'Photographer', 'bio' => 'Passionate photographer with 10+ years of experience in wedding and event photography.', 'order' => 1],
            ['name' => 'Priya Singh', 'designation' => 'Cinematographer', 'bio' => 'Expert cinematographer specializing in documentary and commercial films.', 'order' => 2],
            ['name' => 'Amit Patel', 'designation' => 'Video Editor', 'bio' => 'Creative video editor with expertise in post-production and visual effects.', 'order' => 3],
            ['name' => 'Neha Sharma', 'designation' => 'Creative Director', 'bio' => 'Visionary creative director leading innovative storytelling projects.', 'order' => 4],
            ['name' => 'Vikram Reddy', 'designation' => 'Photographer', 'bio' => 'Specialized in portrait and fashion photography with international exposure.', 'order' => 5],
            ['name' => 'Anjali Verma', 'designation' => 'Cinematographer', 'bio' => 'Award-winning cinematographer known for stunning visual compositions.', 'order' => 6],
            ['name' => 'Arjun Nair', 'designation' => 'Color Grader', 'bio' => 'Expert in color grading and post-production workflow optimization.', 'order' => 7],
            ['name' => 'Divya Iyer', 'designation' => 'Photographer', 'bio' => 'Specialized in architectural and landscape photography.', 'order' => 8],
            ['name' => 'Sanjay Gupta', 'designation' => 'Drone Operator', 'bio' => 'Professional drone pilot with certification and aerial photography expertise.', 'order' => 9],
            ['name' => 'Kavya Menon', 'designation' => 'Video Editor', 'bio' => 'Creative editor passionate about storytelling through motion.', 'order' => 10],
            ['name' => 'Rohan Desai', 'designation' => 'Cinematographer', 'bio' => 'Experienced in commercial and advertising cinematography.', 'order' => 11],
            ['name' => 'Sneha Kapoor', 'designation' => 'Photographer', 'bio' => 'Specialized in wedding photography and pre-wedding shoots.', 'order' => 12],
            ['name' => 'Nikhil Chatterjee', 'designation' => 'Sound Designer', 'bio' => 'Professional sound designer and audio engineer for films and commercials.', 'order' => 13],
            ['name' => 'Aisha Khan', 'designation' => 'Creative Director', 'bio' => 'Innovative creative mind behind numerous award-winning campaigns.', 'order' => 14],
            ['name' => 'Varun Malhotra', 'designation' => 'Photographer', 'bio' => 'Event photographer with expertise in live coverage and fast-paced environments.', 'order' => 15],
            ['name' => 'Pooja Sethi', 'designation' => 'Cinematographer', 'bio' => 'Specialized in music videos and short films production.', 'order' => 16],
            ['name' => 'Harsh Pandey', 'designation' => 'Motion Graphics Designer', 'bio' => 'Expert in motion graphics and animation for video content.', 'order' => 17],
            ['name' => 'Shruti Bhat', 'designation' => 'Photographer', 'bio' => 'Portrait and studio photographer with an eye for detail.', 'order' => 18],
            ['name' => 'Akshay Singh', 'designation' => 'Videographer', 'bio' => 'Multi-talented videographer skilled in all aspects of video production.', 'order' => 19],
            ['name' => 'Ritika Mehta', 'designation' => 'Cinematographer', 'bio' => 'Creative cinematographer with a unique visual style and approach.', 'order' => 20],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::create([
                'name' => $member['name'],
                'designation' => $member['designation'],
                'bio' => $member['bio'],
                'order' => $member['order'],
                'is_active' => true,
            ]);
        }
    }
}